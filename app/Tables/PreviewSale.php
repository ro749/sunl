<?php

namespace App\Tables;

use Ro749\SharedUtils\Tables\LocalTable;
use Ro749\SharedUtils\Getters\ArrayGetter;
use Ro749\SharedUtils\Tables\Column;
use Ro749\SharedUtils\Tables\Delete;
use Ro749\SharedUtils\FormRequests\BaseFormRequest;
use Ro749\SharedUtils\FormRequests\FormField;
use Ro749\SharedUtils\FormRequests\InputType;
use App\Forms\PaymentForm;
class PreviewSale extends LocalTable
{
    public function __construct(){
        parent::__construct(
            parent_form: new PaymentForm(),
            parent_column: 'sale',
            owner: 'user',
            getter: new ArrayGetter(
                table: 'sold_products',
                columns : [
                    'name' => new Column(
                        display: 'Producto',
                    ),
                    'price' => new Column(
                        display: 'Precio por unidad',
                    ),
                    'quantity' => new Column(
                        display: 'Cantidad',
                    ),
                    'total' => new Column(
                        display: 'Total',
                        fillable: true
                    ),
                ],
                filters: [],
                backend_filters: []
            ),
            
            form: new BaseFormRequest(
                table: "sold_products",
                fields: [
                    'product' => new FormField(
                        type: InputType::HIDDEN,
                    ),
                    'price' => new FormField(
                        type: InputType::NUMBER,
                    ),
                    'quantity' => new FormField(
                        type: InputType::QUANTITY,
                    ),
                ],
            ),
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