@extends('layouts.app')

@section('content')
	<div class="row">
        <div class="col-md-2">
            @include('sidebar.index');
        </div>
        <div class="col-md-10" ng-controller="ListUserApply">
            <div class="box">
                <div class="box-header">
                    List
                </div>
                <div class="box-content">
                    <select id="listuserapply" class="form-control defaultpicker" data-placeholder="Items">                                 
                     @foreach($listjob as $job)
                          <option value="{{$job->id}}">{{$job->title}}</option>
                       @endforeach
                    </select>
                    <div class="table-responsive">          
                      <table class="table">
                        <tbody>  
                         @foreach($users as $user)            
                          <tr>
                            <td><a href = "">{{$user->name}}</a></td>
                            <td> 
                                <button class="btn btn-primary apply-job-button" data-id="">仕事の申し込み</button>
                                <button class="btn btn-primary apply-job-button" data-id="">仕事の申し込み</button>
                            </td>
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