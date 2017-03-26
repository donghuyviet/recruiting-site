@extends('layouts.app')

@section('content')
	<div class="row">
        <div class="col-md-3">
            @include('sidebar.index');
        </div>
        <div class="col-md-8" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">{{$user->name}}</h3>
            </div>
            <div class="panel-body">
              <div class="row">
              <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://oasisguir.ma/wp-content/uploads/2017/03/user.png" class="img-circle img-responsive"> </div>
               
                <div class=" col-md-6 col-lg-6 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Home Address</td>
                        <td>{{$user->address}}</td>
                      </tr>
                      <tr>
                        <tr>
                          <td>Email</td>
                          <td><a>{{$user->email}}</a></td>
                        </tr>
                        <tr>
                          <td>Phone Number</td>
                          <td>{{$user->tel}}
                        </tr>
                          <td>Description</td>
                          <td>{{$user->text}}</td>
                          </td>                           
                      </tr>               
                    </tbody>
                  </table>               
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="clearfix"></div>
</div>
@endsection