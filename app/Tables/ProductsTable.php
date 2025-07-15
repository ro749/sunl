<?php

namespace App\Tables;

use Ro749\SharedUtils\Tables\StatisticTable;
use Ro749\SharedUtils\Tables\Column;
use Ro749\SharedUtils\Getters\StatisticsGetter;
use Ro749\SharedUtils\Statistics\StatisticType;
use Ro749\SharedUtils\Tables\Delete;
use Ro749\SharedUtils\Tables\View;
class ProductsTable extends StatisticTable
{
    public function __construct()
    {
        parent::__construct(
            id: 'ProductsTable', 
            getter: new StatisticsGetter(
                category_table: 'products',
                category_column: 'name',
                data_table: 'inventory',
                data_column: 'subproduct',
                value_column: 'value',
                joins: [["table"=>"subproducts","column"=>"product"]],
                type: StatisticType::TOTAL,
                category_column_desc: new Column(display:"Productos",editable:true),
                data_column_desc: new Column(display:"Cantidad"),
            ),
            view: new View('/subproducts','id','product'),
            delete: new Delete(
                warning: 'seguro que quieres eliminar {name}?'
            )
        );
    }
    protected static ?ProductsTable $instance = null;

    public static function instance(): ProductsTable
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}