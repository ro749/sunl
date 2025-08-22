<?php

namespace App\Tables;


use Ro749\SharedUtils\Tables\LayeredTable;
use Ro749\SharedUtils\Getters\ArrayGetter;
use Ro749\SharedUtils\Tables\Column;
use Ro749\SharedUtils\Tables\Layer;
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
                new Layer(
                    getter: new ArrayGetter(
                        table: 'products',
                        columns: [
                            'name' => new Column(display: 'Producto')
                        ],
                        filters:[],
                        backend_filters:[]
                    ),
                    title: 'name',
                    parent: ''
                ),
                new Layer(
                    new ArrayGetter(
                        table: 'subproducts',
                        columns: [
                            'name' => new Column(display: 'Producto')
                        ],
                        filters:[],
                        backend_filters:[]
                    ),
                    title: 'name',
                    parent: 'product'
                ),
                new Layer(
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
                        backend_filters:[]
                    ),
                    title: '',
                    parent: 'subproduct'
                ),
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