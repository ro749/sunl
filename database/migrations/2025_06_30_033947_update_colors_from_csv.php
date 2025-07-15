<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('colors', function (Blueprint $table) {
                if (!Schema::hasColumn('colors', 'color')) {
        $table->string('color')->nullable();
    }
        });

        DB::table('colors')->insert([
        ['color' => 'BLANCO'],
        ['color' => 'BLANCO C'],
        ['color' => 'AZUL X'],
        ['color' => 'AZUL'],
        ['color' => 'PLATA'],
        ['color' => 'NEGRO'],
        ['color' => 'ROJO'],
        ['color' => 'ROJO X'],
        ['color' => 'ROSA'],
        ['color' => 'VERDE'],
        ['color' => 'VERDE X'],
        ['color' => 'VERDE C'],
        ['color' => 'NARANJA'],
        ['color' => 'TINTO'],
        ['color' => 'AMARILLO']
        ]);
    }

    public function down(): void
    {
        // This down only removes inserted rows; you can customize this
        DB::table('colors')->truncate();
    }
};