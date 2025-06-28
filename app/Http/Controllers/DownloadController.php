<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class DownloadController extends Controller
{
    public function downloadProduct(Product $product)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Check if user has purchased this product
        $hasPurchased = Order::where('user_id', Auth::id())
            ->where('status', 'completed')
            ->whereHas('orderItems', function($query) use ($product) {
                $query->where('product_id', $product->id);
            })
            ->exists();

        if (!$hasPurchased) {
            return redirect()->back()->with('error', 'You need to purchase this product first');
        }

        // Check if product has source code
        if (!$product->hasSourceCode()) {
            return redirect()->back()->with('error', 'Source code not available for this product');
        }

        $filePath = storage_path('app/public/' . $product->source_code_path);
        
        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'Source code file not found');
        }

        return response()->download($filePath, $product->name . '_source_code.zip');
    }

    public function downloadAllFromOrder(Order $order)
    {
        if (!Auth::check() || $order->user_id !== Auth::id()) {
            return redirect()->route('login');
        }

        if ($order->status !== 'completed') {
            return redirect()->back()->with('error', 'Order not completed yet');
        }

        // Get products with source code
        $productsWithCode = $order->orderItems()
            ->with('product')
            ->get()
            ->filter(function($item) {
                return $item->product && $item->product->hasSourceCode();
            });

        if ($productsWithCode->isEmpty()) {
            return redirect()->back()->with('error', 'No source code available in this order');
        }

        // If only one product, download directly
        if ($productsWithCode->count() === 1) {
            return $this->downloadProduct($productsWithCode->first()->product);
        }

        // Create combined zip for multiple products
        return $this->createCombinedZip($productsWithCode, $order);
    }

    private function createCombinedZip($productsWithCode, $order)
    {
        $tempPath = storage_path('app/temp');
        if (!file_exists($tempPath)) {
            mkdir($tempPath, 0755, true);
        }

        $zipFileName = 'order_' . $order->id . '_source_codes.zip';
        $zipPath = $tempPath . '/' . $zipFileName;

        $zip = new ZipArchive;
        if ($zip->open($zipPath, ZipArchive::CREATE) === TRUE) {
            foreach ($productsWithCode as $item) {
                $product = $item->product;
                $sourceCodePath = storage_path('app/public/' . $product->source_code_path);
                
                if (file_exists($sourceCodePath)) {
                    $zip->addFile($sourceCodePath, $product->name . '_source_code.zip');
                }
            }
            $zip->close();

            return response()->download($zipPath, $zipFileName)->deleteFileAfterSend(true);
        }

        return redirect()->back()->with('error', 'Failed to create download package');
    }
}