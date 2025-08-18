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
        
        @include('shared-utils::components.tables.layeredSmartTable', ['table' => $table])
        
    </div>
    @push('scripts')
    <script>
        $(document).on('selected-ProductSelect', function(e, data) {
            console.log(data);
        });
    </script>
    @endpush
    @stack('script-includes')
    @stack('scripts')
</body>
</html>