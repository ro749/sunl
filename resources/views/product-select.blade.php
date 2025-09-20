<!DOCTYPE html>
<html>
<head>
    @include('shared-utils::components.head')
    @stack('styles')
    <style>
        .filter-on{
            background-color: gray;
        }
        p{
            margin: 0;
        }
        #PaymentForm{
            display: flex;
            flex-direction: row;
            gap: 1em;
        }
        #pay-area{
            display: flex; 
            flex-direction: row; 
            justify-content: space-between; 
            align-items: end; 
            gap: 2em; 
            background-color: white; 
            border-radius: 1em; 
            padding: .5em;
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
            @include('shared-utils::components.tables.layeredSmartTable', ['table' => $select_table])
        </x-sharedutils::modal>
        @include('shared-utils::components.tables.localSmartTable', ['table' => $preview_table])
        <div id="pay-area">
            @include('shared-utils::components.ajax-form', ['form' => $payment_form])
            <p>Total: $<span id="total">0</span></p>
        </div>
        <button class="btn btn-success" id="save-PreviewSale" >Confirmar Compra</button>
        
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

        $('#method').on('change', function(event) {
            switch (event.target.value) {
                case '0':
                    $('#form-field-reference').hide();
                    $('#form-field-bank').hide();
                    break;
                case '1':
                    $('#form-field-reference').show();
                    $('#form-field-bank').hide();
                    break;
                case '2':
                    $('#form-field-reference').show();
                    $('#form-field-bank').show();
                    break;
            }
        });

        $('#save-PreviewSale').on('click', function(event) {
            Alpine.$data($('#PaymentForm')[0]).submit();
        });
    </script>
    @endpush
    @stack('script-includes')
    @stack('scripts')
</body>
</html>