<?php

namespace App\Forms;

use Ro749\SharedUtils\FormRequests\BaseFormRequest;
use Ro749\SharedUtils\FormRequests\FormField;
use Ro749\SharedUtils\FormRequests\Selector;
use Ro749\SharedUtils\FormRequests\InputType;
use App\Models\User;
use App\Models\Client;

class ColorRegister extends BaseFormRequest
{
    public function __construct()
    {
        parent::__construct(
            table: 'inventory',
            fields: [
                'color' => Selector::fromDB(
                    id: 'color',
                    table: 'colors',
                    label_column: 'color',
                    placeholder: 'agregar color',
                ),
                'subproduct'=> new FormField(
                    type: InputType::HIDDEN,
                )
            ],
            submit_text: 'Agregar',
            callback: "$('#InventaryTable').DataTable().ajax.reload();",
        );
    }
    protected static ?ColorRegister $instance = null;

    public static function instanciate(): ColorRegister
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
