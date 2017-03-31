@extends('layouts.app')

@section('content')
	<div class="row">
        <div class="col-md-2">
            @include('sidebar.index');

        </div>
        <div class="col-md-10" ng-controller="JobListCtrl" id="main-job-list">
            <div class="box">
                <div class="box-header">
                    List
                </div>
                <div class="box-content">
                    <div class="table-responsive">          
                      <table class="table">
                    	<thead>
                        <tr>
                            <th>求人番号</th>
                            <th>求人者</th>
                            <th>タイトル</th>
                            <th>開始日</th>
                            <th>終了日</th>
                            <th>仕事の申し込み</th>
                        </tr>
                        </thead>
                        <tbody>	
                        @foreach($Jobs as $job)			      
					      <tr>
					        <td>{{$job->id}}</td>
					        <td><a href = "/jobAuthor/{{$job->orderer_id}}">{{$job->name}}</a></td>
					        <td><a href="/jobDetails/{{$job->id}}">{{$job->title}}</a></td>
					        <td>{{$job->start_date}} </td>
					        <td>{{$job->end_date}}</td>
					      </tr>
					     @endforeach
					     </tbody>
                    </table>
                   </div>
                </div>
            </div>

        </div>
        <div class="clearfix"></div>
    </div>
<script src="/{{ config('app.source') }}/js/customize/job-list.js"></script>
@endsection