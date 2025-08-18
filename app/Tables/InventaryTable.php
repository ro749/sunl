<?php

namespace App\Tables;

use Ro749\SharedUtils\Tables\BaseTableDefinition;
use Ro749\SharedUtils\Getters\ArrayGetter;
use Ro749\SharedUtils\Tables\Column;
use Ro749\SharedUtils\Models\LogicModifiers\ForeignKey;
use Ro749\SharedUtils\Models\Modifier;
use Ro749\SharedUtils\Tables\Delete;
use Ro749\SharedUtils\Tables\View;
use Ro749\SharedUtils\Filters\CategoryFilter;
use Ro749\SharedUtils\Filters\BackendFilters\BasicFilter;
use Ro749\SharedUtils\FormRequests\Selector;
use \Illuminate\Database\Query\Builder; 
use App\Http\Requests\InventoryForm;
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
                        logic_modifier: new ForeignKey(
                            table: 'colors',
                            column: 'color',
                        )
                    ),
                    'value' => new Column(
                        display: 'Cantidad',
                        modifier:Modifier::NUMBER
                    ),
                ],
                backend_filters: [
                    'subproduct' => new BasicFilter(
                        id: 'subproduct',
                        filter: function(Builder $query,array $data) {
                            $query->where('subproduct', $data["subproduct"]);
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
            form: InventoryForm::instanciate(),
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