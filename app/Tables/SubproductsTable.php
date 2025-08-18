<?php

namespace App\Tables;

use Ro749\SharedUtils\Tables\StatisticTable;
use Ro749\SharedUtils\Statistics\BaseStatistic;
use Ro749\SharedUtils\Getters\StatisticsGetter;
use Ro749\SharedUtils\Statistics\StatisticType;
use Ro749\SharedUtils\Tables\Column;
use Ro749\SharedUtils\Tables\Delete;
use Ro749\SharedUtils\Tables\View;
use Ro749\SharedUtils\Filters\CategoryFilter;
use Ro749\SharedUtils\FormRequests\Selector;
use Ro749\SharedUtils\Filters\BackendFilters\BasicFilter;
use \Illuminate\Database\Query\Builder; 
use App\Http\Requests\SubproductInventoryForm;
class SubproductsTable extends StatisticTable
{
    public function __construct()
    {
        parent::__construct(
            id: 'SubproductsTable', 
            getter: new StatisticsGetter(
                category_table: 'subproducts',
                category_column: 'name',
                data_table: 'inventory',
                data_column: 'subproduct',
                value_column: 'value',
                type: StatisticType::TOTAL,
                category_column_desc: new Column(display:"Productos"),
                data_column_desc: new Column(display:"Cantidad"),
                backend_filters: [
                    'product' => new BasicFilter(
                        id: 'product',
                        filter: function(Builder $query,array $data) {
                            $query->where('product', $data['product']);
                        }
                    ),
                ],
                filters:[
                    'location' => new CategoryFilter(
                        id: 'location',
                        display: 'Ubicación',
                        column: 'location',
                        session: 'location',
                        selector: Selector::fromDB(
                            id: 'location',
                            table: 'locations',
                            label_column: 'name',
                        )
                    ),
                ]
            ),
            form: SubproductInventoryForm::instanciate(),
            view: new View('/inventory','id','subproduct'),
            delete: new Delete(
                warning: 'seguro que quieres eliminar {name}?'
            )
        );
    }
    protected static ?SubproductsTable $instance = null;

    public static function instance(): SubproductsTable
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}