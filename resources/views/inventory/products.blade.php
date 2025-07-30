<!DOCTYPE html>
<html>
<head>
    <title>Smart Table Test</title>
    
    
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
            <button onclick="window.location.href = '{{ $back }}'" class="btn btn-light" style="height:100%"><i class="bx bx-chevron-left" style="font-size: 2rem;"></i></button>
            @endif
            <h1>{{ $title }}</h1>
            
        </div>
        <a href="{{ route('logout') }}"><button class="btn btn-light" style="height:100%">
            <div style="display: flex; flex-direction: row; align-items: center; align-items: center; gap: 6px;">   
                <i class="bx bx-log-out" style="font-size: 1rem;"></i>
                <p style="margin-bottom: 0px;">Cerrar sesion</p>
            </div>
        </button></a>
    </div>
    <div style="max-width:33.33%">
    @include('shared-utils::components.ajax-form', ['form' => $form, 'style' => 'display: flex; flex-direction: row; gap:6px; margin-top :36px; margin-bottom:36px;'])
    </div>
    @include('shared-utils::components.smartTable', ['table' => $table])
    @if(isset($statistic))
    <div style="height: 6vh;"></div>
    @include('shared-utils::components.statistic-chart', [
        'statistics' => $statistic,
        'type'=>'horizontalBar',
        'style' => 'height:33.333vh; width:100%'
    ])
    @endif
    
    @stack('script-includes')
    @stack('scripts')
</body>
</html>