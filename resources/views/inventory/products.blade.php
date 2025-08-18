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
        <div style="display: flex; flex-direction: row; align-items: center; justify-content: space-between;">
            <div style="display: flex; flex-direction: row;  gap: 36px; align-items: center;">
                @if(isset($back))
                <button onclick="window.location.href = '{{ $back }}'" class="btn btn-light" style="height:100%">
                    <iconify-icon icon="iconamoon:arrow-left-6-circle-thin" width="4rem" height="4rem"></iconify-icon>
                </button>
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
        @if(!empty($form))
        @include('shared-utils::components.ajax-form', ['form' => $form, 'style' => 'display: flex; flex-direction: row; gap:6px; margin-top :36px; margin-bottom:36px;'])
        @endif    
    </div>
        @include('shared-utils::components.tables.smartTable', ['table' => $table])
        @if(isset($statistic))
        <div style="height: 6vh;"></div>
        @include('shared-utils::components.statistic-chart', [
            'statistics' => $statistic,
            'type'=>'horizontalBar',
            'style' => 'height:33.333vh; width:100%'
        ])
        @endif
    </div>
    @stack('script-includes')
    @stack('scripts')
</body>
</html>