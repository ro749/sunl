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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
        
        DB::table('locations')->insert([
            ['name' => 'GRANJA'],
            ['name' => 'WASHINGTON'],
            ['name' => 'ZAPOPAN'],
            ['name' => 'QUERETARO'],
            ['name' => 'MORELIA'],
            ['name' => 'TEPIC'],
            ['name' => 'AGUASCALIENTES'],
            ['name' => 'PUEBLA'],
            ['name' => 'MAZATLAN'],
        ]);

        
        Schema::table('inventory', function (Blueprint $table) {
            $table->integer('location')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
