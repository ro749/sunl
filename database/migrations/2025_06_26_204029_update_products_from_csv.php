<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
                if (!Schema::hasColumn('products', 'name')) {
        $table->string('name')->nullable();
    }
        });

        DB::table('products')->insert([
        ['name' => 'ATVS'],
        ['name' => 'ARENEROS O GO KARTS'],
        ['name' => 'UTVS'],
        ['name' => 'MINI CROSS'],
        ['name' => 'MOTOCICLETA'],
        ['name' => 'MOTOTAXIS'],
        ['name' => 'MOTOCARROS'],
        ['name' => 'UTV TIPO KAS'],
        ['name' => 'SILLA DE RUEDAS ELECTRICA'],
        ['name' => 'PATIN ELECTRICO'],
        ['name' => 'BICICLETA ELECTRICA']
        ]);
    }

    public function down(): void
    {
        // This down only removes inserted rows; you can customize this
        DB::table('products')->truncate();
    }
};