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
        DB::statement('UPDATE `subproducts` JOIN `products` ON subproducts.product = products.name SET subproducts.product = products.id');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
