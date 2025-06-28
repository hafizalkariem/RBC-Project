<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('payment_id')->nullable()->after('payment_method');
            $table->string('payment_status')->default('pending')->after('payment_id');
            $table->timestamp('paid_at')->nullable()->after('payment_status');
            $table->json('payment_details')->nullable()->after('paid_at');
            $table->string('snap_token')->nullable()->after('payment_details');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'payment_id',
                'payment_status', 
                'paid_at',
                'payment_details',
                'snap_token'
            ]);
        });
    }
};
