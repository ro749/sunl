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
        @include('shared-utils::components.tables.localSmartTable', ['table' => $preview_table])
        <div style="display: flex; flex-direction: row; justify-content: end;">
            <p>Total: $<span id="total">0</span></p>
        </div>
        <button class="btn btn-success" id="save-PreviewSale">Gonfirmar Compra</button>
        <x-sharedutils::modal innerStyle="width: 90%; height: 90%;" id="select-product-popup" onclose="closePopup('select-product-popup');">
            @include('shared-utils::components.tables.layeredSmartTable', ['table' => $select_table])
        </x-sharedutils::modal>
    </div>
    @push('scripts')
    <script>
        function open_select_product() {
            openPopup('select-product-popup');
            $('#{{ $select_table->id }}').refreshLayeredSmartTable();
            
        }
        $(document).on('selected-ProductSelect', function(e, data) {
            closePopup('select-product-popup');
            $('#{{ $preview_table->id }}').addElementToTable({
                'product': data.labels[2].id,
                'name': data.labels[1].name+' '+data.labels[2].color
            });
        });
        $(document).on('input','.input-price', function(event) {
            update_data(event.target.closest('tr'));
        });
        $(document).on('input','.input-quantity', function(event) {
            update_data(event.target.closest('tr'));
        });

        function update_data(tr){
            var price = tr.querySelector('.input-price').value;;
            var quantity = tr.querySelector('.input-quantity').value;
            var total = price*quantity;
            tr.querySelector('.total').innerText = '$'+formatNumber(total);
            calc_total();
        }

        function calc_total(){
            var total = 0;
            $('.total').each(function() {
                total += parseFloat($(this).text().replace(/[$,]/g, '')) || 0; 
            });
            $('#total').text(formatNumber(total));
        }
        
        $('#{{ $preview_table->id }}').on('click', '.delete-btn', function(event) {
            calc_total();
        });
    </script>
    @endpush
    @stack('script-includes')
    @stack('scripts')
</body>
</html>