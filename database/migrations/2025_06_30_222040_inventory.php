<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('inventory', function (Blueprint $table) {
            if (!Schema::hasColumn('inventory', 'subproduct')) {
                $table->integer('subproduct');
            }
            if (!Schema::hasColumn('inventory', 'color')) {
                $table->integer('color');
            }
            if (!Schema::hasColumn('inventory', 'value')) {
                $table->integer('value');
            }
        });

        DB::table('inventory')->insert([
            ['subproduct' => '1', 'color' => '3', 'value' => '29'],
['subproduct' => '1', 'color' => '8', 'value' => '11'],
['subproduct' => '1', 'color' => '11', 'value' => '25'],
['subproduct' => '1', 'color' => '13', 'value' => '19'],
['subproduct' => '1', 'color' => '15', 'value' => '42'],
['subproduct' => '2', 'color' => '4', 'value' => '39'],
['subproduct' => '2', 'color' => '6', 'value' => '36'],
['subproduct' => '2', 'color' => '7', 'value' => '30'],
['subproduct' => '3', 'color' => '3', 'value' => '4'],
['subproduct' => '3', 'color' => '8', 'value' => '50'],
['subproduct' => '3', 'color' => '11', 'value' => '41'],
['subproduct' => '4', 'color' => '3', 'value' => '30'],
['subproduct' => '4', 'color' => '8', 'value' => '27'],
['subproduct' => '4', 'color' => '11', 'value' => '23'],
['subproduct' => '5', 'color' => '4', 'value' => '13'],
['subproduct' => '5', 'color' => '7', 'value' => '8'],
['subproduct' => '6', 'color' => '2', 'value' => '4'],
['subproduct' => '6', 'color' => '6', 'value' => '1'],
['subproduct' => '6', 'color' => '7', 'value' => '15'],
['subproduct' => '6', 'color' => '12', 'value' => '10'],
['subproduct' => '7', 'color' => '1', 'value' => '6'],
['subproduct' => '7', 'color' => '4', 'value' => '1'],
['subproduct' => '7', 'color' => '7', 'value' => '5'],
['subproduct' => '8', 'color' => '4', 'value' => '13'],
['subproduct' => '8', 'color' => '6', 'value' => '11'],
['subproduct' => '8', 'color' => '7', 'value' => '8'],
['subproduct' => '8', 'color' => '13', 'value' => '10'],
['subproduct' => '9', 'color' => '6', 'value' => '4'],
['subproduct' => '9', 'color' => '7', 'value' => '17'],
['subproduct' => '9', 'color' => '13', 'value' => '8'],
['subproduct' => '9', 'color' => '15', 'value' => '7'],
['subproduct' => '10', 'color' => '4', 'value' => '11'],
['subproduct' => '10', 'color' => '6', 'value' => '11'],
['subproduct' => '10', 'color' => '13', 'value' => '4'],
['subproduct' => '12', 'color' => '4', 'value' => '3'],
['subproduct' => '12', 'color' => '7', 'value' => '1'],
['subproduct' => '12', 'color' => '10', 'value' => '2'],
['subproduct' => '12', 'color' => '13', 'value' => '2'],
['subproduct' => '13', 'color' => '4', 'value' => '3'],
['subproduct' => '13', 'color' => '7', 'value' => '2'],
['subproduct' => '13', 'color' => '10', 'value' => '1'],
['subproduct' => '14', 'color' => '10', 'value' => '1'],
['subproduct' => '14', 'color' => '13', 'value' => '1'],
['subproduct' => '15', 'color' => '4', 'value' => '1'],
['subproduct' => '15', 'color' => '7', 'value' => '1'],
['subproduct' => '15', 'color' => '10', 'value' => '1'],
['subproduct' => '16', 'color' => '4', 'value' => '3'],
['subproduct' => '16', 'color' => '7', 'value' => '6'],
['subproduct' => '16', 'color' => '10', 'value' => '39'],
['subproduct' => '16', 'color' => '13', 'value' => '42'],
['subproduct' => '16', 'color' => '15', 'value' => '33'],
['subproduct' => '17', 'color' => '4', 'value' => '101'],
['subproduct' => '17', 'color' => '6', 'value' => '48'],
['subproduct' => '17', 'color' => '7', 'value' => '110'],
['subproduct' => '17', 'color' => '10', 'value' => '20'],
['subproduct' => '17', 'color' => '13', 'value' => '23'],
['subproduct' => '17', 'color' => '15', 'value' => '18'],
['subproduct' => '18', 'color' => '1', 'value' => '11'],
['subproduct' => '18', 'color' => '6', 'value' => '7'],
['subproduct' => '18', 'color' => '13', 'value' => '24'],
['subproduct' => '19', 'color' => '1', 'value' => '18'],
['subproduct' => '19', 'color' => '3', 'value' => '13'],
['subproduct' => '19', 'color' => '6', 'value' => '17'],
['subproduct' => '19', 'color' => '8', 'value' => '13'],
['subproduct' => '19', 'color' => '11', 'value' => '10'],
['subproduct' => '19', 'color' => '13', 'value' => '20'],
['subproduct' => '20', 'color' => '11', 'value' => '1'],
['subproduct' => '21', 'color' => '4', 'value' => '9'],
['subproduct' => '21', 'color' => '7', 'value' => '9'],
['subproduct' => '21', 'color' => '9', 'value' => '1'],
['subproduct' => '21', 'color' => '10', 'value' => '3'],
['subproduct' => '21', 'color' => '15', 'value' => '16'],
['subproduct' => '22', 'color' => '4', 'value' => '69'],
['subproduct' => '22', 'color' => '6', 'value' => '87'],
['subproduct' => '22', 'color' => '7', 'value' => '85'],
['subproduct' => '22', 'color' => '15', 'value' => '41'],
['subproduct' => '26', 'color' => '1', 'value' => '1'],
['subproduct' => '27', 'color' => '1', 'value' => '4'],
['subproduct' => '28', 'color' => '1', 'value' => '76'],
['subproduct' => '28', 'color' => '4', 'value' => '11'],
['subproduct' => '28', 'color' => '7', 'value' => '3'],
['subproduct' => '28', 'color' => '14', 'value' => '7'],
['subproduct' => '29', 'color' => '1', 'value' => '6'],
['subproduct' => '29', 'color' => '4', 'value' => '1'],
['subproduct' => '31', 'color' => '1', 'value' => '5'],
['subproduct' => '36', 'color' => '1', 'value' => '1'],
['subproduct' => '36', 'color' => '4', 'value' => '5'],
['subproduct' => '36', 'color' => '14', 'value' => '5'],
['subproduct' => '37', 'color' => '7', 'value' => '1'],
['subproduct' => '37', 'color' => '14', 'value' => '4'],
['subproduct' => '38', 'color' => '1', 'value' => '18'],
['subproduct' => '38', 'color' => '7', 'value' => '6'],
['subproduct' => '38', 'color' => '14', 'value' => '7'],
['subproduct' => '42', 'color' => '10', 'value' => '1'],
['subproduct' => '43', 'color' => '1', 'value' => '5'],
['subproduct' => '44', 'color' => '4', 'value' => '4'],
['subproduct' => '44', 'color' => '5', 'value' => '3'],
['subproduct' => '44', 'color' => '7', 'value' => '1'],
['subproduct' => '45', 'color' => '1', 'value' => '7'],
['subproduct' => '45', 'color' => '7', 'value' => '7'],
['subproduct' => '45', 'color' => '13', 'value' => '13'],
['subproduct' => '46', 'color' => '4', 'value' => '2'],
['subproduct' => '46', 'color' => '7', 'value' => '1'],
['subproduct' => '47', 'color' => '1', 'value' => '2'],
['subproduct' => '47', 'color' => '7', 'value' => '4'],
['subproduct' => '48', 'color' => '1', 'value' => '2'],
['subproduct' => '48', 'color' => '6', 'value' => '2'],
['subproduct' => '48', 'color' => '7', 'value' => '3']
        ]);
    }

    public function down(): void
    {
        // This down only removes inserted rows; you can customize this
        DB::table('inventory')->truncate();
    }
};