<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        if (!$user) return;

        $order = Order::create([
            'user_id' => $user->id,
            'total_amount' => 430000,
            'status' => 'completed',
            'payment_method' => 'bank_transfer',
        ]);

        $products = Product::take(2)->get();
        foreach ($products as $product) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'price' => $product->price,
                'quantity' => 1,
            ]);
        }
    }
}