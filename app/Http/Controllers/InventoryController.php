<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tables\InventaryTable;
use App\Http\Requests\ColorRegister;
use Ro749\SharedUtils\Statistics\BaseStatistic;
use Ro749\SharedUtils\Getters\StatisticsGetter;
class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $title = DB::table('subproducts')->where('id', $request->query('subproduct'))->first()->name;
        $table = new InventaryTable();
        $form = ColorRegister::instanciate();
        return view('inventory/products', [
            'table' => $table,
            'title' => $title,
            'form' => $form,
            'back'=> '/subproducts']
        );
    }
}
