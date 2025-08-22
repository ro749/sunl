<?php

namespace App\Tables;

use Ro749\SharedUtils\Tables\LocalTable;
use Ro749\SharedUtils\Getters\ArrayGetter;
use Ro749\SharedUtils\Tables\Column;
use Ro749\SharedUtils\Tables\Delete;
use Ro749\SharedUtils\FormRequests\BaseFormRequest;
use Ro749\SharedUtils\FormRequests\FormField;
use Ro749\SharedUtils\FormRequests\InputType;
class PreviewSale extends LocalTable
{
    public function __construct(){
        parent::__construct(
            id: 'PreviewSale',
            getter: new ArrayGetter(
                table: 'sold_products',
                columns : [
                    'name' => new Column(
                        display: 'Producto',
                    )
                ],
                filters: [],
                backend_filters: []
            ),
            
            #form: new BaseFormRequest(
            #    id: "NewProducts",
            #    table: "sold_products",
            #    formFields: [
            #        'id' => new FormField(
            #            type: InputType::TEXT,
            #            rules: ['required', 'integer', 'exists:sold_products,id'],
            #        ),
            #    ],
            #),
        );
    }

    protected static ?LocalTable $instance = null;

    public static function instance(): LocalTable
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}