@extends('layouts.app')

@section('content')
	<div class="row">
        <div class="col-md-3">
            @include('sidebar.index');
        </div>
        <div class="col-md-8" ng-controller="ListUserApply">
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
                    <div class="help-block"></div>
                      <div class="panel panel-default">
                          <div class="panel-heading text-center">
                              <h3 class="panel-title">
                                 List User Appy</h3>
                          </div>
                          <ul class="list-group">                              
                             <li class="list-group-item" ng-repeat="user in ListUser.users">
                             <a href="/profileUser?id=//user.user_apply//">// user.name //</a>
                                <span class="pull-right">
                                  <button class="btn btn-xs btn-info">Apply</button>
                                  <button class="btn btn-xs btn-danger">Cancel</button>
                                </span>
                              </li>                   
                          </ul>
                      </div>
                  
                </div>
            </div>

        </div>
        <div class="clearfix"></div>
    </div>
<script src="/{{ config('app.source') }}/js/customize/job-list.js"></script>
@endsection