<?php

namespace App\Http\Controllers;
use App\Tables\ProductsTable;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRegister;
use Ro749\SharedUtils\Statistics\BaseStatistic;
class ProductsController extends Controller
{
    public function index()
    {
        $table = ProductsTable::instance();
        $form = ProductRegister::instanciate();
        $statistic = new BaseStatistic(
            id: 'ProductsStatistics',
            getter: $table->getter
        );
        return view('inventory/products', [
            'title' => 'Products',
            'table' => $table,
            'form' => $form,
            'statistic' => $statistic
        ]);
    }
}