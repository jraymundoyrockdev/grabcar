<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="token" content="{{ Session::token() }}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>TNVS Transactions Monitoring System</title>

    {!! Html::style('css/libraries.css') !!}

    @section('module-styles')@show

</head>

<body class="wysihtml5-supported">

<div class="logo">
    <h4>
        {!! Html::decode(link_to_route('dashboard.index', 'TNVS Transactions <strong> Monitoring System</strong>', [], [])) !!}
    </h4>
</div>

@include('layouts.partials.navigation')

<div class="wrap">

    @include('layouts.partials.header')

    {!! csrf_field() !!}

    <div class="content container">
        @section('main-body')@show
    </div>

    {!! Html::script('js/libraries.js') !!}


    @section('module-scripts')@show

</div>
</body>
</html>
