<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tables\InventaryTable;
use App\Forms\ColorRegister;
use App\Tables\ProductsTable;
use App\Forms\ProductRegister;
use App\Tables\SubproductsTable;
use App\Forms\SubproductRegister;
use Ro749\SharedUtils\Statistics\BaseStatistic;

class InventoryController extends Controller
{
    public function products()
    {
        $table = ProductsTable::instance();
        $form = ProductRegister::instanciate();
        //$statistic = new BaseStatistic(
        //    getter: $table->getter
        //);
        return view('inventory/products', [
            'title' => 'Productos',
            'table' => $table,
            'form' => $form,
            //'statistic' => $statistic
        ]);
    }

    public function subproducts(Request $request)
    {
        $title = DB::table('products')->where('id', $request->query('product'))->first()->name;
        $table = new SubproductsTable();
        $form = SubproductRegister::instanciate();
        //$statistic = new BaseStatistic(
        //    getter: $table->getter,
        //    filters: ["product" => $request->query('product')]
        //);
        return view('inventory/products', [
            'title' =>  $title,
            'table' => $table,
            'form' => $form,
            //'statistic' => $statistic,
            'back'=> '/products',
        ]);
    }
    public function inventory(Request $request)
    {
        $subproduct = DB::table('subproducts')->where('id', $request->query('subproduct'))->first();
        $table = new InventaryTable();
        $form = ColorRegister::instanciate();
        return view('inventory/products', [
            'table' => $table,
            'title' => $subproduct->name,
            'form' => $form,
            'back'=> '/subproducts?product='.$subproduct->product,]
        );
    }
}
