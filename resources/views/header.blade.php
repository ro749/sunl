@php
    $items = [
        [
            'label' => 'Inventario',
            'url' => route('inventory')
        ],
        [
            'label' => 'Venta',
            'url' => route('venta')
        ]
    ];
@endphp

@include('shared-utils::components.sidebar',['items' => $items])
@include('shared-utils::components.navbar')