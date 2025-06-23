<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Technology;
use App\Models\TechCategory;

class CleanTechnologySeeder extends Seeder
{
    public function run(): void
    {
        // Hapus duplikat berdasarkan nama
        Technology::select('name')
            ->groupBy('name')
            ->havingRaw('COUNT(*) > 1')
            ->get()
            ->each(function ($tech) {
                Technology::where('name', $tech->name)
                    ->orderBy('id')
                    ->skip(1)
                    ->delete();
            });
    }
}