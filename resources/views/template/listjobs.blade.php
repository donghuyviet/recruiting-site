@extends('layouts.app')

@section('content')
	<div class="row">
        <div class="col-md-2">
            @include('sidebar.jobs');

        </div>
        <div class="col-md-10">
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

@endsection