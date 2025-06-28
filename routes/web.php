<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Shop\ShopController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Portfolio\PortfolioController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TokoController;

// Home Page
Route::get('/', [PageController::class, 'home'])->name('home');

// Toko Page
Route::get('/toko', [TokoController::class, 'index'])->name('toko');
Route::get('/toko/search', [TokoController::class, 'search'])->name('toko.search');
Route::get('/toko/product/{product}', [TokoController::class, 'show'])->name('toko.product.show');
Route::post('/toko/product/{product}/views', [TokoController::class, 'incrementViews'])->name('toko.product.views');

// Cart routes
Route::middleware('auth')->group(function () {
    Route::post('/cart/add/{product}', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.add');
    Route::delete('/cart/remove/{orderItem}', [App\Http\Controllers\CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/cart/count', [App\Http\Controllers\CartController::class, 'getCartCount'])->name('cart.count');
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
});

// Checkout routes
Route::middleware('auth')->group(function () {
    Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/checkout/success', [App\Http\Controllers\CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('/checkout/pending', [App\Http\Controllers\CheckoutController::class, 'pending'])->name('checkout.pending');
    Route::get('/checkout/error', [App\Http\Controllers\CheckoutController::class, 'error'])->name('checkout.error');
});

// Webhook routes (no auth needed)
Route::post('/webhook/midtrans', [App\Http\Controllers\WebhookController::class, 'handle'])->name('webhook.midtrans');
Route::get('/webhook/test', [App\Http\Controllers\WebhookController::class, 'test']);
Route::post('/webhook/test', [App\Http\Controllers\WebhookController::class, 'test']);

// Download routes
Route::middleware('auth')->group(function () {
    Route::get('/download/product/{product}', [App\Http\Controllers\DownloadController::class, 'downloadProduct'])->name('download.product');
    Route::get('/download/order/{order}', [App\Http\Controllers\DownloadController::class, 'downloadAllFromOrder'])->name('download.order');
});

// Debug routes
Route::get('/debug/orders', function() {
    $orders = \App\Models\Order::whereNotNull('payment_id')->get(['id', 'payment_method', 'payment_status', 'status', 'created_at']);
    return response()->json($orders);
});

Route::get('/debug/pending-orders', function() {
    $orders = \App\Models\Order::where('payment_status', 'pending')
        ->whereNotNull('payment_details')
        ->get(['id', 'payment_status', 'payment_details', 'created_at'])
        ->map(function($order) {
            $expiry = null;
            $isExpired = false;
            
            if (isset($order->payment_details['expiry_time'])) {
                $expiry = $order->payment_details['expiry_time'];
                $isExpired = \Carbon\Carbon::parse($expiry)->isPast();
            }
            
            return [
                'id' => $order->id,
                'payment_status' => $order->payment_status,
                'expiry_time' => $expiry,
                'is_expired' => $isExpired,
                'created_at' => $order->created_at
            ];
        });
    return response()->json($orders);
});

Route::get('/debug/webhook-logs', function() {
    $webhookLogPath = storage_path('logs/webhook.log');
    if (file_exists($webhookLogPath)) {
        $logs = file_get_contents($webhookLogPath);
        return response()->json(['logs' => explode("\n", $logs)]);
    }
    return response()->json(['error' => 'Webhook log file not found']);
});

// Check and update expired payments (only pending orders)
Route::get('/debug/check-expired', function() {
    $expiredCount = 0;
    
    $pendingOrders = \App\Models\Order::where('payment_status', 'pending')
        ->where('status', '!=', 'completed')
        ->whereNotNull('payment_details')
        ->get();
        
    foreach ($pendingOrders as $order) {
        $paymentDetails = $order->payment_details;
        
        if (isset($paymentDetails['expiry_time'])) {
            $expiryTime = \Carbon\Carbon::parse($paymentDetails['expiry_time']);
            
            if ($expiryTime->isPast()) {
                $order->update([
                    'status' => 'cancelled',
                    'payment_status' => 'expire'
                ]);
                $expiredCount++;
            }
        }
    }
    
    return response()->json([
        'message' => "Checked expired payments. {$expiredCount} orders expired.",
        'expired_count' => $expiredCount
    ]);
});

// Fix inconsistent payment status
Route::get('/debug/fix-payment-status', function() {
    $fixed = 0;
    
    // Fix completed orders with wrong payment_status
    $completedOrders = \App\Models\Order::where('status', 'completed')
        ->where('payment_status', '!=', 'settlement')
        ->get();
        
    foreach ($completedOrders as $order) {
        $order->update(['payment_status' => 'settlement']);
        $fixed++;
    }
    
    return response()->json([
        'message' => "Fixed {$fixed} completed orders with wrong payment status",
        'fixed_count' => $fixed
    ]);
});

// Sync payment status from Midtrans API
Route::get('/debug/sync-midtrans/{orderId}', function($orderId) {
    $order = \App\Models\Order::where('payment_id', $orderId)->first();
    
    if (!$order) {
        return response()->json(['error' => 'Order not found']);
    }
    
    try {
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        
        $status = \Midtrans\Transaction::status($orderId);
        
        $paymentStatus = strtolower($status->transaction_status);
        $paymentMethod = isset($status->payment_type) ? $status->payment_type : null;
        
        $updateData = [
            'payment_status' => $paymentStatus,
            'payment_details' => json_decode(json_encode($status), true)
        ];
        
        if ($paymentMethod) {
            $paymentMap = [
                'qris' => 'qris',
                'gopay' => 'e_wallet',
                'shopeepay' => 'e_wallet',
                'dana' => 'e_wallet',
                'bca' => 'bank_transfer',
                'bni' => 'bank_transfer',
                'bri' => 'bank_transfer',
                'mandiri' => 'bank_transfer',
                'credit_card' => 'credit_card'
            ];
            $updateData['payment_method'] = $paymentMap[$paymentMethod] ?? 'other';
        }
        
        // Update order status based on payment status
        if ($paymentStatus === 'settlement') {
            $updateData['status'] = 'completed';
            $updateData['paid_at'] = now();
        } elseif (in_array($paymentStatus, ['expire', 'cancel', 'deny'])) {
            $updateData['status'] = 'cancelled';
        }
        
        $order->update($updateData);
        
        return response()->json([
            'message' => 'Order synced with Midtrans',
            'midtrans_status' => $paymentStatus,
            'order' => $order->fresh()
        ]);
        
    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Failed to sync with Midtrans: ' . $e->getMessage()
        ]);
    }
});

// Check payment status for real-time updates with auto-sync
Route::get('/api/payment-status/{orderId}', [App\Http\Controllers\PaymentSyncController::class, 'checkStatus']);

// Manual sync single order
Route::get('/api/sync-payment/{orderId}', [App\Http\Controllers\PaymentSyncController::class, 'checkStatus']);

// Auto-sync all pending orders
Route::get('/debug/auto-sync-pending', function() {
    \Artisan::call('payments:sync-expired');
    $output = \Artisan::output();
    
    return response()->json([
        'message' => 'Sync command executed',
        'output' => $output
    ]);
});

// Run sync command manually
Route::get('/debug/sync-expired', function() {
    \Artisan::call('payments:sync-expired');
    return response()->json([
        'message' => 'Sync completed',
        'output' => \Artisan::output()
    ]);
});

// Get payment status summary
Route::get('/debug/payment-summary', function() {
    $summary = \App\Models\Order::whereNotNull('payment_id')
        ->selectRaw('payment_status, COUNT(*) as count')
        ->groupBy('payment_status')
        ->get();
        
    return response()->json($summary);
});

// Manual fix for orders without payment_method (TEMPORARY)
Route::get('/debug/fix-payment-methods', function() {
    $orders = \App\Models\Order::where('status', 'completed')
        ->whereNull('payment_method')
        ->get();
    
    $updated = 0;
    foreach ($orders as $order) {
        // Set payment method based on order ID pattern for demo
        $methods = ['qris', 'bank_transfer', 'e_wallet', 'credit_card'];
        $method = $methods[$order->id % 4];
        
        $order->update(['payment_method' => $method]);
        $updated++;
    }
    
    return response()->json([
        'message' => "Updated {$updated} orders with payment methods",
        'updated_orders' => $updated
    ]);
});

// Force complete pending order with QRIS
Route::get('/debug/complete-qris/{orderId}', function($orderId) {
    $order = \App\Models\Order::where('payment_id', $orderId)->first();
    
    if (!$order) {
        return response()->json(['error' => 'Order not found']);
    }
    
    $order->update([
        'status' => 'completed',
        'payment_status' => 'settlement',
        'payment_method' => 'qris',
        'paid_at' => now()
    ]);
    
    return response()->json([
        'message' => 'Order completed with QRIS payment method',
        'order' => $order
    ]);
});

// About Page
Route::get('/about', [PageController::class, 'about'])->name('about');

// Service Page
Route::get('/service', [PageController::class, 'service'])->name('service');

// portfolio Page
Route::get('/portfolio', [PageController::class, 'portfolio'])->name('portfolio');
Route::get('/portofolio', [PageController::class, 'portfolio'])->name('portofolio');
// blog Page
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.detail');

// Login Page
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');

// Authentication Routes
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/services', function () {
    return view('pages.services');
})->name('services.index');

// Developer routes
Route::get('/developer/{id}', [App\Http\Controllers\DeveloperController::class, 'show'])->name('developer.profile');

// Profile routes (protected)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', function () {
        return view('profile.edit');
    })->name('profile.edit');
    Route::get('/profile/transactions', [App\Http\Controllers\ProfileController::class, 'transactions'])->name('profile.transactions');
    Route::put('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

// Admin routes (protected)
Route::middleware(['auth', App\Http\Middleware\AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/products', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.products');
    Route::get('/transactions', [App\Http\Controllers\Admin\TransactionController::class, 'index'])->name('admin.transactions.index');
    Route::get('/products/search', [App\Http\Controllers\Admin\ProductController::class, 'search'])->name('admin.products.search');
    Route::get('/products/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{product}', [App\Http\Controllers\Admin\ProductController::class, 'show'])->name('admin.products.show');
    Route::get('/products/{product}/edit', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{product}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('admin.products.update');
    Route::post('/products/{product}', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('admin.products.destroy');
    
    // Categories
    Route::post('/categories', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.categories.store');
    
    // Technologies
    Route::post('/technologies', [App\Http\Controllers\Admin\TechnologyController::class, 'store'])->name('admin.technologies.store');
    Route::get('/technologies/{technology}/stats', [App\Http\Controllers\Admin\TechnologyController::class, 'stats'])->name('admin.technologies.stats');
    Route::post('/technologies/{technology}', [App\Http\Controllers\Admin\TechnologyController::class, 'destroy'])->name('admin.technologies.destroy');
    Route::post('/products/detect-technologies', [App\Http\Controllers\Admin\ProductController::class, 'detectTechnologies'])->name('admin.products.detect-technologies');
});