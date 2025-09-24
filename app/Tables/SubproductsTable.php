<?php

namespace App\Tables;

use Ro749\SharedUtils\Tables\BaseTableDefinition;
use Ro749\SharedUtils\Getters\ArrayGetter;
use Ro749\SharedUtils\Statistics\StatisticType;
use Ro749\SharedUtils\Tables\Column;
use Ro749\SharedUtils\Tables\Delete;
use Ro749\SharedUtils\Tables\View;
use Ro749\SharedUtils\Filters\CategoryFilter;
use Ro749\SharedUtils\FormRequests\Selector;
use Ro749\SharedUtils\Filters\BackendFilters\BasicFilter;
use \Illuminate\Database\Query\Builder; 
use App\Forms\SubproductInventoryForm;
use Ro749\SharedUtils\Statistics\Statistic;
use Ro749\SharedUtils\Statistics\StatisticColumn;
use Ro749\SharedUtils\Models\LogicModifiers\ForeignKey;
class SubproductsTable extends BaseTableDefinition
{
    public function __construct()
    {
        parent::__construct(
            getter: new ArrayGetter(
                table: 'subproducts',
                statistics:[
                    'stat'=> new Statistic(
                        table: 'inventory',
                        group_column: 'subproduct',
                        columns: [
                            'value'=> new StatisticColumn(
                                type: StatisticType::SUM
                            )
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
                    )
                ],
                columns: [
                    'name'=> new Column(display:"Producto"),
                    'value'=>new Column(
                        display: 'Cantidad',
                        logic_modifier: new ForeignKey(
                            table: 'stat',
                            column: 'value'
                        )
                    )
                ],
                backend_filters: [
                    'product' => new BasicFilter(
                        id: 'product',
                        filter: function(Builder $query,array $data) {
                            $query->where('product', $data['product']);
                        }
                    ),
                ],
                
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