<!DOCTYPE html>
<html>
<head>
    <title>Smart Table Test</title>
    <script enum="text/javascript" src="{{ asset('js/enums.js') }}"></script>
    
    @include('shared-utils::includes.smartTableInclude')
    @include('shared-utils::includes.forms')
    @include('shared-utils::includes.statistics')
    @stack('styles')
    <style>
        .filter-on{
            background-color: gray;
        }
    </style>
</head>


<body style="padding: 36px;">
    <div style="display: flex; flex-direction: row; align-items: center; justify-content: space-between;">
        <div style="display: flex; flex-direction: row;  gap: 36px; align-items: center;">
            @if(isset($back))
            <button onclick="history.back()" class="btn btn-light" style="height:100%"><i class="bx bx-chevron-left" style="font-size: 2rem;"></i></button>
            @endif
            <h1>{{ $title }}</h1>
            
        </div>
        <a href="{{ route('logout') }}"><button onclick="history.back()" class="btn btn-light" style="height:100%">
            <div style="display: flex; flex-direction: row; align-items: center; align-items: center; gap: 6px;">   
                <i class="bx bx-log-out" style="font-size: 1rem;"></i>
                <p style="margin-bottom: 0px;">Cerrar sesion</p>
            </div>
        </button></a>
    </div>
    @if(isset($statistic))
     @include('shared-utils::components.statistic-chart', [
        'statistics' => $statistic,
        'type'=>'horizontalBar',
        'style' => 'height:33.333vh; width:100%'
    ])
    @endif
    @include('shared-utils::components.ajax-form', ['form' => $form, 'style' => 'display: flex; flex-direction: row; gap:6px; margin-top :36px; margin-bottom:36px;'])
    @include('shared-utils::components.smartTable', ['table' => $table])

    @stack('scripts')
</body>
</html>