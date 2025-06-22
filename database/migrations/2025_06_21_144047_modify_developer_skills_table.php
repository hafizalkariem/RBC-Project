<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('developer_skills', function (Blueprint $table) {
            // Drop skill_name column
            $table->dropColumn('skill_name');
            
            // Add foreign key to technologies
            $table->foreignId('technology_id')->after('developer_id')->constrained()->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('developer_skills', function (Blueprint $table) {
            // Drop foreign key
            $table->dropForeign(['technology_id']);
            $table->dropColumn('technology_id');
            
            // Add back skill_name
            $table->string('skill_name')->after('developer_id');
        });
    }
};