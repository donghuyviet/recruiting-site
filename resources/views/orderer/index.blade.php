@extends('layouts.app')

@section('content')
	<div class="row">
        <div class="col-md-2">
            @include('sidebar.index')

        </div>
        <div class="col-md-10">
            <div class="box">
                
                <div class="box-content">
                      <div class="table-responsive">          
                          <table class="table">
                            <tbody>
                              @foreach($orderer as $or) 
                              <tr>
                                <td>{{$or->user_id}}</td>
                                <td>{{$or->name}}</td>
                                <td>{{$or->companyname}} </td>
                              </tr>
                             @endforeach
                            </tbody>
                          </table>
                      </div>
                      <div class="table-responsive">          
                          <table class="table">
                            <thead>
                              <tr>
                                <th>title</th>
                                <th>description</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($jobs as $or)               
                              <tr>
                                <td>{{$or->title}}</td>
                                <td>{{$or->description}} </td>
                              </tr>
                             @endforeach
                            </tbody>
                          </table>
                      </div>
                    <div class="text-right">
                        {{$orderer->links()}}
                    </div>

                </div>
            </div>

        </div>
        <div class="clearfix"></div>
    </div>

@endsection
