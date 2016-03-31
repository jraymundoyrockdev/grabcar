<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="token" content="{{ Session::token() }}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>Grab Car Jem</title>

    {!! Html::style('css/libraries.css') !!}

    @section('module-styles')@show

</head>

<body class="wysihtml5-supported">

<div class="logo">
    <h4>
        <a href="index.html">GrabCar <strong>Jem</strong></a>
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
