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
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo_path')->nullable();
            $table->timestamps();
        });
        
        DB::table('banks')->insert([
            ['name' => 'BBVA'],
            ['name' => 'Banorte'],
            ['name' => 'Santander'],
            ['name' => 'Banamex'],
            ['name' => 'HSBC'],
            ['name' => 'Scotiabank'],
            ['name' => 'Inbursa'],
            ['name' => 'Citi'],
            ['name' => 'Banco Azteca'],
            ['name' => 'Afirme'],
        ]);
    }
};
