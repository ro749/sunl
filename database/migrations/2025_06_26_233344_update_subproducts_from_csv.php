<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('subproducts', function (Blueprint $table) {
                if (!Schema::hasColumn('subproducts', 'product')) {
        $table->string('product')->nullable();
    }
                if (!Schema::hasColumn('subproducts', 'name')) {
        $table->string('name')->nullable();
    }
        });

        DB::table('subproducts')->insert([
        ['product' => 'ATVS', 'name' => 'ATV 110CC LINGSUN'],
        ['product' => 'ATVS', 'name' => 'ATV 125CC SPIDER LINGSUN'],
        ['product' => 'ATVS', 'name' => 'ATV 125CC XTREM LINGSUN'],
        ['product' => 'ATVS', 'name' => 'ATV 125 CC XTREME FANG POWER'],
        ['product' => 'ATVS', 'name' => 'ATV 200CC LINGSUN SIN PARRILLA RAPTOR'],
        ['product' => 'ATVS', 'name' => 'ATV 200CC CON EQUIPO  FANG POWER'],
        ['product' => 'ATVS', 'name' => 'ATV 250CC LINGSUN'],
        ['product' => 'ARENEROS O GO KARTS', 'name' => 'GO KART 125 CC AUTO'],
        ['product' => 'ARENEROS O GO KARTS', 'name' => 'GO KART 125 CC SEMI'],
        ['product' => 'ARENEROS O GO KARTS', 'name' => 'GO KART 200 CC'],
        ['product' => 'ARENEROS O GO KARTS', 'name' => 'ARENERO 300 CC'],
        ['product' => 'UTVS', 'name' => 'UTV 200CC  FANG POWER'],
        ['product' => 'UTVS', 'name' => 'UTV 250CC  FANG POWER'],
        ['product' => 'UTVS', 'name' => 'UTV 400CC  FANG POWER 4 PLAZAS'],
        ['product' => 'UTVS', 'name' => 'UTV 400CC  FANG POWER'],
        ['product' => 'MINI CROSS', 'name' => 'MINI CROSS 50CC ANWA'],
        ['product' => 'MINI CROSS', 'name' => 'MINI CROSS 50CC LS'],
        ['product' => 'MINI CROSS', 'name' => 'MINI ATV 50CC'],
        ['product' => 'MINI CROSS', 'name' => 'MINI ATV 50CC ENCENDIDO ELECTRICO'],
        ['product' => 'MINI CROSS', 'name' => 'MINI ATV 50 CC TREK'],
        ['product' => 'MINI CROSS', 'name' => 'MINI ATV ELECTRICA LINGSUN'],
        ['product' => 'MOTOCICLETA', 'name' => 'CROSS 125 CC LING SUN'],
        ['product' => 'MOTOTAXIS', 'name' => 'MOTOTAXI ELECTRICO'],
        ['product' => 'MOTOTAXIS', 'name' => 'MOTOTAXI 110'],
        ['product' => 'MOTOTAXIS', 'name' => 'MOTOTAXI MINI'],
        ['product' => 'MOTOTAXIS', 'name' => 'MOTOTAXI 200 CC'],
        ['product' => 'MOTOCARROS', 'name' => 'ASIENTO CORRIDO 150 CC'],
        ['product' => 'MOTOCARROS', 'name' => 'MOTOCARRO 200 CC ASIENTO NORMAL'],
        ['product' => 'MOTOCARROS', 'name' => 'MOTOCARRO 200 CC CON CABINA'],
        ['product' => 'MOTOCARROS', 'name' => 'MOTOCARROS ESPECIALES'],
        ['product' => 'MOTOCARROS', 'name' => 'MOTOPIPA DOBLE RODADO SIN CABINA'],
        ['product' => 'MOTOCARROS', 'name' => 'MOTOPIPA DOBLE RODADO CON CABINA TIPO B'],
        ['product' => 'MOTOCARROS', 'name' => 'MOTOPIPA DOBLE RODADO CON CABINA TIPO A'],
        ['product' => 'MOTOCARROS', 'name' => 'MOTOCARRO CON DOS EJES DOBLES RODADOS SIN CABINA'],
        ['product' => 'MOTOCARROS', 'name' => 'MOTOCARRO CON DOS EJES DOBLES RODADOS CON CABINA TIPO B'],
        ['product' => 'MOTOCARROS', 'name' => 'MOTOCARRO CON DOS EJES DOBLES RODADOS CON CABINA TIPO A'],
        ['product' => 'MOTOCARROS', 'name' => 'MOTOCARRO 300 CABINA CERRADA'],
        ['product' => 'MOTOCARROS', 'name' => 'DOBLE RODADO DAYANG REFORZADO CON HIDRAULICO 1200 KILOS'],
        ['product' => 'MOTOCARROS', 'name' => 'DOBLE RODADO DAYANG REFORZADO SIN HIDRAULICO 1200 KILOS'],
        ['product' => 'UTV TIPO KAS', 'name' => 'UTV K1'],
        ['product' => 'UTV TIPO KAS', 'name' => 'UTV K3'],
        ['product' => 'UTV TIPO KAS', 'name' => 'UTV K5'],
        ['product' => 'SILLA DE RUEDAS ELECTRICA', 'name' => 'SILLA DE RUEDAS ELECTRICA'],
        ['product' => 'PATIN ELECTRICO', 'name' => 'PATIN ELECTRICO  TOM'],
        ['product' => 'PATIN ELECTRICO', 'name' => 'PATIN ELECTRICO  PIOLIN'],
        ['product' => 'PATIN ELECTRICO', 'name' => 'PATIN ELECTRICO  JERRY'],
        ['product' => 'PATIN ELECTRICO', 'name' => 'PATIN ELECTRICO  TRIBILIN'],
        ['product' => 'PATIN ELECTRICO', 'name' => 'PATIN ELECTRICO MICKEY'],
        ['product' => 'BICICLETA ELECTRICA', 'name' => 'BICICLETA ELECTRICA CON PEDAL 200W']
        ]);
    }

    public function down(): void
    {
        // This down only removes inserted rows; you can customize this
        DB::table('subproducts')->truncate();
    }
};