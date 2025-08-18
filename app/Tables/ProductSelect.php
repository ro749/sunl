<?php

namespace App\Tables;


use Ro749\SharedUtils\Tables\LayeredTable;
use Ro749\SharedUtils\Getters\ArrayGetter;
use Ro749\SharedUtils\Tables\Column;
use Ro749\SharedUtils\Filters\BackendFilters\BasicFilter;
use \Illuminate\Database\Query\Builder; 
use Ro749\SharedUtils\Models\LogicModifiers\ForeignKey;
class ProductSelect extends LayeredTable
{
    public function __construct()
    {
        parent::__construct(
            id: 'ProductSelect', 
            layers: [
                new ArrayGetter(
                    table: 'products',
                    columns: [
                        'name' => new Column(display: 'Producto')
                    ],
                    filters:[],
                    backend_filters:[]
                ),
                new ArrayGetter(
                    table: 'subproducts',
                    columns: [
                        'name' => new Column(display: 'Producto')
                    ],
                    filters:[],
                    backend_filters:[
                        'product' => new BasicFilter(
                            id: 'product',
                            filter: function(Builder $query,array $data) {
                                $query->where('product', $data[0]);
                            }
                        ),
                    ]
                ),
                new ArrayGetter(
                    table: 'inventory',
                    columns: [
                        'color' => new Column(
                            display: 'Producto',
                            logic_modifier: new ForeignKey(
                                table: 'colors',
                                column: 'color',
                            )
                        )
                    ],
                    filters:[],
                    backend_filters:[
                        'product' => new BasicFilter(
                            id: 'product',
                            filter: function(Builder $query,array $data) {
                                $query->where('subproduct', $data[1]);
                            }
                        ),
                    ]
                )
            ],
            titles:[
                'name',
                'name',
            ]
        );
    }
    protected static ?ProductSelect $instance = null;

    public static function instance(): ProductSelect
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}