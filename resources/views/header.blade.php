@php
    $items = [
        [
            'label' => 'Inventario',
            'url' => route('inventory')
        ],
        [
            'label' => 'Venta',
            'url' => route('venta')
        ],
        [
            'label' => 'Registrar usuario',
            'url' => route('register-user')
        ],
        [
            'label' => 'Usuarios',
            'url' => route('users')
        ]
    ];
@endphp

@include('shared-utils::components.sidebar',['items' => $items])
@include('shared-utils::components.navbar')