@extends('layouts.app')

@section('content')
    <div class="row" >
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 menu-item" style="z-index: 11">
            @include('shared.sidebar')
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 droppable sortable" data-position = "2">
            <div class="emty">Drop here</div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 droppable sortable" data-position = "3">
            <div class="emty">Drop here</div>
        </div>
        <div class="clearfix"></div>
    </div>
    {!! Form::open(['url' => 'foo/bar', 'method' => 'POST', 'id' => 'myForm' ]) !!}
    {!! Form::close() !!}

    <script src="/{{ config('app.source') }}/js/customize/topmenu.js"></script>

@endsection