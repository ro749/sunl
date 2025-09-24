<?php

namespace App\Tables;

use Ro749\SharedUtils\Tables\BaseTableDefinition;
use Ro749\SharedUtils\Tables\Column;
use Ro749\SharedUtils\Getters\ArrayGetter;
use Ro749\SharedUtils\Tables\Delete;
use Ro749\SharedUtils\Tables\View;
use App\Forms\ProductInventoryForm;
use Ro749\SharedUtils\Models\LogicModifiers\ForeignKey;
use Ro749\SharedUtils\Statistics\Statistic;
use Ro749\SharedUtils\Statistics\StatisticColumn;
use Ro749\SharedUtils\Statistics\StatisticType;
use Ro749\SharedUtils\Statistics\StatisticLink;
use Ro749\SharedUtils\Filters\CategoryFilter;
use Ro749\SharedUtils\FormRequests\Selector;
class ProductsTable extends BaseTableDefinition
{
    public function __construct()
    {
        parent::__construct(
            getter: new ArrayGetter(
                table: 'products',
                statistics:[
                    'stat'=> new Statistic(
                        table: 'inventory',
                        group_column: 'subproduct',
                        link: new StatisticLink(
                            table: 'subproducts',
                            column: 'product',
                        ),
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
            ),
            form: ProductInventoryForm::instanciate(),
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