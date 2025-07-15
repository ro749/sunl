<?php

namespace App\Tables;

use Ro749\SharedUtils\Tables\BaseTableDefinition;
use Ro749\SharedUtils\Getters\ArrayGetter;
use Ro749\SharedUtils\Tables\Column;
use Ro749\SharedUtils\Tables\ColumnModifier;
use Ro749\SharedUtils\Tables\Delete;
use Ro749\SharedUtils\Tables\View;
use Ro749\SharedUtils\Filters\Filters;
use Ro749\SharedUtils\Filters\BasicFilter;
use \Illuminate\Database\Query\Builder; 
class InventaryTable extends BaseTableDefinition
{
    public function __construct()
    {
        parent::__construct(
            id: 'InventaryTable', 
            getter: new ArrayGetter(
                table: 'inventory',
                columns: [
                    'color' => new Column(
                        display: 'Color',
                        table:'colors',
                        column: 'color',
                    ),
                    'value' => new Column(
                        display: 'Cantidad',
                        editable:true,
                        modifier: ColumnModifier::NUMBER
                    ),
                ],
                backend_filters: [
                    'subproduct' => new BasicFilter(
                        id: 'subproduct',
                        filter: function(Builder $query,string $data) {
                            $query->where('subproduct', $data);
                        }
                    ),
                ],
            ),
            delete: new Delete(
                warning: 'seguro que quieres eliminar {color}?'
            )
        );
    }
    protected static ?InventaryTable $instance = null;

    public static function instance(): InventaryTable
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}