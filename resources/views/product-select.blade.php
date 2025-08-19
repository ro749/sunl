<!DOCTYPE html>
<html>
<head>
    @include('shared-utils::components.head')
    @stack('styles')
    <style>
        .filter-on{
            background-color: gray;
        }
    </style>
</head>

<body >
    @include('header')
    <div class="content" style="padding: 36px;">
        <button class="btn btn-primary" onclick="open_select_product();">
            Añadir Producto
        </button>
        <x-sharedutils::modal innerStyle="width: 90%; height: 90%;" id="select-product-popup" onclose="closePopup('select-product-popup');">
            @include('shared-utils::components.tables.layeredSmartTable', ['table' => $table])
        </x-sharedutils::modal>
    </div>
    @push('scripts')
    <script>
        function open_select_product() {
            openPopup('select-product-popup');
            $('#{{ $table->id }}').refreshLayeredSmartTable();
        }
        $(document).on('selected-ProductSelect', function(e, data) {
            
        });
    </script>
    @endpush
    @stack('script-includes')
    @stack('scripts')
</body>
</html>