<!DOCTYPE html>
<html>
<head>
    @include('shared-utils::components.head')
    @stack('styles')
</head>


<body>
    @include('header')
    @include('shared-utils::components.tables.smartTable', ['table' => $table])
    @stack('script-includes')
    @stack('scripts')
</body>
</html>