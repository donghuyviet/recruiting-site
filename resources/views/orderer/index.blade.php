@extends('layouts.app')

@section('content')
	<div class="row">
        <div class="col-md-2">
            @include('sidebar.index')

        </div>
        <div class="col-md-10">
            <div class="box">
                <div class="box-header">
                    List
                </div>
                <div class="box-content">
                	@if(Session('success'))
                		<div class="alert alert-success alert-dismissible" role="alert">
	                	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                			{{session('success')}}
                		</div>
                	@endif
                      <div class="table-responsive">          
                          <table class="table">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>指名</th>
                                <th>住所</th>
                                <th>電話番号</th>
                                <th>メール</th>
                                <th>タイトル</th>
                                <th>求人目的</th>
                                <th></th>
                                
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($orderer as $or)               
                              <tr>
                                <td>{{$or->user_id}}</td>
                                <td>{{$or->name}}</td>
                                <td>{{$or->address}} </td>
                                <td>{{$or->tel}} </td>
                                <td>{{$or->email}} </td>
                                <td>{{$or->title}} </td>
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
