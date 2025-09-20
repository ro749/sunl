<!DOCTYPE html>
<html>
<head>
    @include('shared-utils::components.head')
    @stack('styles')
    <style>
        
        p{
            margin: 0;
        }
        
    </style>
</head>

<body >
    @include('header')
    <div class="content" style="padding: 36px;">
    </div>
    @include('shared-utils::components.tables.smartTable', ['table' => $bancos])
    <p>Total: $<span>{{ number_format($total_bancos, 2) }}</span></p>
    @include('shared-utils::components.tables.smartTable', ['table' => $tarjetas])
    <p>Total: $<span>{{ number_format($total_tarjetas, 2) }}</span></p>
    <p>Efectivo: $<span>{{ number_format($total_efectivo, 2) }}</span></p>
    @stack('script-includes')
    @stack('scripts')
</body>
</html>