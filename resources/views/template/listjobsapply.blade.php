@extends('layouts.app')

@section('content')
	<div class="row">
        <div class="col-md-2">
            @include('sidebar.index');

        </div>
        {{$user}}
<script src="/{{ config('app.source') }}/js/customize/job-list.js"></script>
@endsection