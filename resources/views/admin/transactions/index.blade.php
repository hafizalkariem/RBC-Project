@extends('layouts.admin')

@section('title', 'Manage Transactions')

@section('content')
<div class="mt-6">
    <x-admin.transaction.transaction-stats :stats="$stats" />
</div>

<!-- Transaction Chart Component -->
<x-admin.transaction.transaction-chart :chartData="$chartData ?? []" />

<!-- Customer Analysis Component -->
<x-admin.transaction.customer-analysis :topCustomers="$topCustomers ?? []" :customerStats="$customerStats ?? []" />

<!-- Transaction Table -->
<div class="glass-dark rounded-xl p-6 mb-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-white">Daftar Transaksi</h2>
        <div class="flex space-x-4">
            <div class="red-gradient-hover px-4 py-2 rounded-lg cursor-pointer glow-red">
                <i class="fas fa-filter mr-2"></i>Filter
            </div>
            <div class="red-gradient-hover px-4 py-2 rounded-lg cursor-pointer glow-red">
                <i class="fas fa-download mr-2"></i>Export
            </div>
        </div>
    </div>

    <x-admin.transaction.transactions-table :transactions="$transactions" />
</div>

<!-- Top Products Component -->
<x-admin.transaction.top-products :topProducts="$topProducts ?? []" />

<!-- Payment Methods Component -->
<x-admin.transaction.payment-methods :paymentData="$paymentData ?? []" />
@endsection