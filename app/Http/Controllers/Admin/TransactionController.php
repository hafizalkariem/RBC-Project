<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');
        $period = $request->query('period', 30);

        $transactions = Order::query()
            ->with(['user', 'orderItems.product' => function ($query) {
                $query->withTrashed();
            }])
            ->when($status, function ($query) use ($status) {
                return $query->where('status', $status);
            })
            ->latest()
            ->paginate(10);

        // Get transaction statistics
        $stats = $this->getTransactionStats();
        
        // Get chart data
        $chartData = $this->getChartData();
        
        // Get top customers
        $topCustomers = $this->getTopCustomers();
        
        // Get customer stats
        $customerStats = $this->getCustomerStats();
        
        // Get top products with period filter
        $topProducts = $this->getTopProducts(5, $period);
        
        // Get payment methods data
        $paymentData = $this->getPaymentMethodsData();

        // If AJAX request, return data based on type
        if ($request->ajax()) {
            $type = $request->query('type');
            
            if ($type === 'chart') {
                $chartPeriod = $request->query('chart_period', 30);
                $chartData = $this->getChartData($chartPeriod);
                return response()->json([
                    'chartData' => $chartData
                ]);
            }
            
            return response()->json([
                'topProducts' => $topProducts
            ]);
        }

        return view('admin.transactions.index', [
            'transactions' => $transactions,
            'stats' => $stats,
            'chartData' => $chartData,
            'topCustomers' => $topCustomers,
            'customerStats' => $customerStats,
            'topProducts' => $topProducts,
            'paymentData' => $paymentData
        ]);
    }

    private function getTransactionStats()
    {
        // Total transactions
        $totalTransactions = Order::count();
        
        // Pending orders
        $pendingOrders = Order::where('status', 'pending')->count();
        
        // Completed orders
        $completedOrders = Order::where('status', 'completed')->count();
        
        // Total revenue
        $totalRevenue = Order::where('status', 'completed')->sum('total_amount');
        
        // Get previous month data for trend calculation
        $lastMonth = now()->subMonth();
        $lastMonthTotalTransactions = Order::whereMonth('created_at', $lastMonth->month)
            ->whereYear('created_at', $lastMonth->year)
            ->count();
        
        $lastMonthPendingOrders = Order::where('status', 'pending')
            ->whereMonth('created_at', $lastMonth->month)
            ->whereYear('created_at', $lastMonth->year)
            ->count();
            
        $lastMonthCompletedOrders = Order::where('status', 'completed')
            ->whereMonth('created_at', $lastMonth->month)
            ->whereYear('created_at', $lastMonth->year)
            ->count();
            
        $lastMonthTotalRevenue = Order::where('status', 'completed')
            ->whereMonth('created_at', $lastMonth->month)
            ->whereYear('created_at', $lastMonth->year)
            ->sum('total_amount');
        
        // Calculate trends
        $transactionTrend = $this->calculateTrend($totalTransactions, $lastMonthTotalTransactions);
        $pendingTrend = $this->calculateTrend($pendingOrders, $lastMonthPendingOrders);
        $completedTrend = $this->calculateTrend($completedOrders, $lastMonthCompletedOrders);
        $revenueTrend = $this->calculateTrend($totalRevenue, $lastMonthTotalRevenue);
        
        return [
            [
                'title' => 'Total Transaksi',
                'value' => number_format($totalTransactions),
                'icon' => 'fas fa-shopping-cart',
                'color' => 'red',
                'trend' => abs($transactionTrend) . '%',
                'trendUp' => $transactionTrend >= 0
            ],
            [
                'title' => 'Pending Orders',
                'value' => number_format($pendingOrders),
                'icon' => 'fas fa-clock',
                'color' => 'yellow',
                'trend' => abs($pendingTrend) . '%',
                'trendUp' => $pendingTrend >= 0
            ],
            [
                'title' => 'Completed',
                'value' => number_format($completedOrders),
                'icon' => 'fas fa-check-circle',
                'color' => 'green',
                'trend' => abs($completedTrend) . '%',
                'trendUp' => $completedTrend >= 0
            ],
            [
                'title' => 'Total Revenue',
                'value' => 'Rp ' . number_format($totalRevenue, 0, ',', '.'),
                'icon' => 'fas fa-dollar-sign',
                'color' => 'blue',
                'trend' => abs($revenueTrend) . '%',
                'trendUp' => $revenueTrend >= 0
            ]
        ];
    }
    
    private function calculateTrend($current, $previous)
    {
        if ($previous == 0) {
            return $current > 0 ? 100 : 0;
        }
        
        return round((($current - $previous) / $previous) * 100);
    }
    
    private function getChartData($period = 30)
    {
        // Calculate date range based on period
        $days = (int) $period;
        $startDate = Carbon::now()->subDays($days)->startOfDay();
        $endDate = Carbon::now()->endOfDay();
        
        // Get daily revenue and transaction count
        $dailyData = Order::where('status', 'completed')
            ->where('created_at', '>=', $startDate)
            ->where('created_at', '<=', $endDate)
            ->selectRaw('DATE(created_at) as date, SUM(total_amount) as revenue, COUNT(*) as transactions')
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        
        // Format data for chart
        $labels = [];
        $revenue = [];
        $transactions = [];
        
        // Fill in missing dates
        $currentDate = clone $startDate;
        while ($currentDate <= $endDate) {
            $dateStr = $currentDate->format('Y-m-d');
            $dayData = $dailyData->firstWhere('date', $dateStr);
            
            // Format label based on period
            if ($days <= 7) {
                $labels[] = $currentDate->format('d M');
            } elseif ($days <= 30) {
                $labels[] = $currentDate->format('d M');
            } else {
                // For longer periods, show weekly data
                if ($currentDate->dayOfWeek === 1) { // Monday
                    $labels[] = $currentDate->format('d M');
                    $revenue[] = $dayData ? $dayData->revenue : 0;
                    $transactions[] = $dayData ? $dayData->transactions : 0;
                }
                $currentDate->addDay();
                continue;
            }
            
            $revenue[] = $dayData ? $dayData->revenue : 0;
            $transactions[] = $dayData ? $dayData->transactions : 0;
            
            $currentDate->addDay();
        }
        
        return [
            'labels' => $labels,
            'revenue' => $revenue,
            'transactions' => $transactions
        ];
    }
    
    private function getTopCustomers($limit = 5)
    {
        // Get customers with highest total spending
        $topCustomers = Order::where('status', 'completed')
            ->select('user_id', DB::raw('SUM(total_amount) as total_spent'), DB::raw('COUNT(*) as orders_count'))
            ->with('user:id,name,email')
            ->groupBy('user_id')
            ->orderByDesc('total_spent')
            ->limit($limit)
            ->get()
            ->map(function ($order) {
                return [
                    'id' => $order->user_id,
                    'name' => $order->user->name ?? 'Unknown',
                    'email' => $order->user->email ?? 'N/A',
                    'total_spent' => $order->total_spent,
                    'orders_count' => $order->orders_count
                ];
            });
            
        return $topCustomers;
    }
    
    private function getCustomerStats()
    {
        // Get basic customer stats
        $totalCustomers = User::count();
        
        // Get returning customers (more than 1 order)
        $returningCustomers = DB::table('orders')
            ->select('user_id', DB::raw('COUNT(*) as order_count'))
            ->groupBy('user_id')
            ->having('order_count', '>', 1)
            ->count();
            
        // Get new customers (last 30 days)
        $newCustomers = User::where('created_at', '>=', Carbon::now()->subDays(30))
            ->count();
            
        // Calculate retention rate
        $retentionRate = $totalCustomers > 0 ? round(($returningCustomers / $totalCustomers) * 100) : 0;
        
        // Sample acquisition data (in a real app, this would come from actual tracking)
        $organicAcquisition = 65;
        $referralAcquisition = 20;
        $socialAcquisition = 15;
        
        // Sample customer lifetime value and acquisition cost
        $avgOrderValue = Order::where('status', 'completed')->avg('total_amount') ?? 0;
        $avgOrdersPerCustomer = $totalCustomers > 0 ? 
            Order::where('status', 'completed')->count() / $totalCustomers : 0;
        $customerLifetimeValue = $avgOrderValue * $avgOrdersPerCustomer;
        
        return [
            'total_customers' => $totalCustomers,
            'returning_customers' => $returningCustomers,
            'new_customers' => $newCustomers,
            'retention_rate' => $retentionRate,
            'organic_acquisition' => $organicAcquisition,
            'referral_acquisition' => $referralAcquisition,
            'social_acquisition' => $socialAcquisition,
            'customer_lifetime_value' => $customerLifetimeValue,
            'avg_acquisition_cost' => $customerLifetimeValue * 0.2 // Sample calculation
        ];
    }
    
    private function getTopProducts($limit = 5, $period = 30)
    {
        // Calculate date ranges based on period
        if ($period === 'all') {
            $currentStart = Carbon::create(2020, 1, 1); // Far back date
            $currentEnd = Carbon::now();
            $previousStart = Carbon::create(2020, 1, 1);
            $previousEnd = Carbon::create(2020, 1, 1);
        } else {
            $days = (int) $period;
            $currentStart = Carbon::now()->subDays($days);
            $currentEnd = Carbon::now();
            $previousStart = Carbon::now()->subDays($days * 2);
            $previousEnd = Carbon::now()->subDays($days);
        }
        
        // Get current period sales
        $currentSales = DB::table('order_items')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->where('orders.status', 'completed')
            ->whereBetween('orders.created_at', [$currentStart, $currentEnd])
            ->select(
                'order_items.product_id',
                DB::raw('SUM(order_items.quantity) as current_sold')
            )
            ->groupBy('order_items.product_id')
            ->pluck('current_sold', 'product_id');
            
        // Get previous period sales (skip for 'all' period)
        $previousSales = collect();
        if ($period !== 'all') {
            $previousSales = DB::table('order_items')
                ->join('orders', 'order_items.order_id', '=', 'orders.id')
                ->where('orders.status', 'completed')
                ->whereBetween('orders.created_at', [$previousStart, $previousEnd])
                ->select(
                    'order_items.product_id',
                    DB::raw('SUM(order_items.quantity) as previous_sold')
                )
                ->groupBy('order_items.product_id')
                ->pluck('previous_sold', 'product_id');
        }
        
        // Get top products with real trend calculation
        $topProducts = DB::table('order_items')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->where('orders.status', 'completed')
            ->whereBetween('orders.created_at', [$currentStart, $currentEnd])
            ->select(
                'products.id',
                'products.name',
                'products.image_url',
                'categories.name as category',
                DB::raw('SUM(order_items.quantity) as sold'),
                DB::raw('SUM(order_items.price * order_items.quantity) as revenue')
            )
            ->groupBy('products.id', 'products.name', 'products.image_url', 'categories.name')
            ->orderByDesc('sold')
            ->limit($limit)
            ->get()
            ->map(function ($product) use ($currentSales, $previousSales, $period) {
                $currentSold = $currentSales[$product->id] ?? 0;
                $previousSold = $previousSales[$product->id] ?? 0;
                
                // Calculate real trend (skip for 'all' period)
                $trend = $period === 'all' ? 0 : $this->calculateTrend($currentSold, $previousSold);
                
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'image_url' => $product->image_url,
                    'category' => $product->category,
                    'sold' => $product->sold,
                    'revenue' => $product->revenue,
                    'trend' => $trend
                ];
            });
            
        return $topProducts;
    }
    
    private function getPaymentMethodsData()
    {
        // Get real payment methods data from completed orders
        $paymentMethods = Order::where('status', 'completed')
            ->whereNotNull('payment_method')
            ->select('payment_method', DB::raw('COUNT(*) as count'), DB::raw('SUM(total_amount) as amount'))
            ->groupBy('payment_method')
            ->get();
        
        $totalAmount = $paymentMethods->sum('amount');
        $totalCount = $paymentMethods->sum('count');
        
        if ($totalAmount == 0 || $totalCount == 0) {
            return [];
        }
        
        $paymentData = [];
        
        foreach ($paymentMethods as $method) {
            $percentage = round(($method->amount / $totalAmount) * 100);
            
            $paymentData[$method->payment_method] = [
                'amount' => $method->amount,
                'count' => $method->count,
                'percentage' => $percentage
            ];
        }
        
        // Ensure we have the main categories even if no data
        $defaultMethods = ['bank_transfer', 'credit_card', 'e_wallet', 'qris', 'other'];
        
        foreach ($defaultMethods as $method) {
            if (!isset($paymentData[$method])) {
                $paymentData[$method] = [
                    'amount' => 0,
                    'count' => 0,
                    'percentage' => 0
                ];
            }
        }
        
        return $paymentData;
    }
}