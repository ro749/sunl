<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tables\SubproductsTable;
use App\Http\Requests\SubproductRegister;
use Ro749\SharedUtils\Statistics\BaseStatistic;

class SubproductsController extends Controller
{
    public function index(Request $request)
    {
        $title = DB::table('products')->where('id', $request->query('product'))->first()->name;
        $table = new SubproductsTable();
        $form = SubproductRegister::instanciate();
        $statistic = new BaseStatistic(
            id: 'SubproductsStatistics',
            getter: $table->getter,
            filters: ["product" => $request->query('product')]
        );
        return view('inventory/products', [
            'title' =>  $title,
            'table' => $table,
            'form' => $form,
            'statistic' => $statistic,
            'back'=> '/products',
        ]);
    }
}
