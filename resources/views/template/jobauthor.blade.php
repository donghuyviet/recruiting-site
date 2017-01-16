@extends('layouts.app')

@section('content')
<div class="bootstrap-iso">
 <div class="container-fluid">
    <div class="row">
    	<div class="col-md-2">
            @include('sidebar.jobs');
        </div>
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$author->name}}</div>
                <div class="panel-body">
                   <table class="table table-user-information">
	                    <tbody>
	                      <tr>
	                        <td>Address:</td>
	                        <td>{{$author->address}}</td>
	                      </tr>
	                      <tr>
	                        <td>Phone Number:</td>
	                        <td>{{$author->tel}}</td>
	                      </tr>
	                      <tr>
	                        <td>Company name</td>
	                        <td>{{$author->companyname}}</td>
	                      </tr>	                      
	                      <tr>
	                        <td>Email</td>
	                        <td>{{$author->email}}</td>
	                      </tr>	                      
	                    </tbody>
                  </table>
                  <a href="/jobs"><button type="button" class="btn btn-primary">Back List</button></a>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection