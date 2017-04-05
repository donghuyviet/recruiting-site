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
                                   <button id="apply_user_//user.user_apply//" class="btn btn-xs btn-info" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Processing" ng-click="confirm($event , user)" ng-if="user.status == 0 ">Accept</button>
                                   <button class="btn btn-xs btn-info" ng-if="user.status == 1 ">Accepted</button>
                                   <button class="btn btn-xs btn-warning" ng-if="user.status == 2 ">deined</button>
                                   <button id="load_denied_//user.user_apply//" class="btn btn-xs btn-danger" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Processing" ng-click="denied($event , user)" ng-if="user.status == 0">Cancel</button>
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