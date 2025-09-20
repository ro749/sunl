<?php

namespace App\Forms;

use Ro749\SharedUtils\FormRequests\BaseFormRequest;
use Ro749\SharedUtils\FormRequests\FormField;
use Ro749\SharedUtils\FormRequests\InputType;
use Ro749\SharedUtils\FormRequests\Selector;
use App\Models\User;
use App\Models\Client;
use App\Enums\Options;

class PaymentForm extends BaseFormRequest
{
    public function __construct()
    {
        parent::__construct(
            table: "sales",
            submit_text: "",
            fields: [
                'method'=> new Selector(
                    options: Options::PaymentMethods,
                    id: "method",
                    label: "Método de pago: ",
                ),
                'reference'=> new FormField(
                    type: InputType::TEXT,
                    label: "Referencia: "
                ),
                'bank'=>Selector::fromDB(
                    id: 'bank',
                    table: 'banks',
                    label_column: 'name',
                    label: 'Banco: '
                )

            ],
        );
    }
    protected static ?PaymentForm $instance = null;

    public static function instanciate(): PaymentForm
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
