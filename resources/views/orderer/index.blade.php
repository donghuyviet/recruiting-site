@extends('layouts.app')

@section('content')
	<div class="row">
        <div class="col-md-2">
            @include('sidebar.index');

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
                    <table class="table table-bordered table-hover">
                    	<thead>
                        <tr>
                            <th>#</th>
                            <th>名前</th>
                            <th>住所</th>
                            <th>電話</th>
                            <th>会社名</th>
                            <th>メール</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>	
                        @foreach($orderer as $or)			      
					      <tr>
					        <td>{{$or->id}}</td>
					        <td>{{$or->name}}</td>
					        <td>{{$or->address}} </td>
					        <td>{{$or->tel}} </td>
					        <td>{{$or->address}}</td>
					        <td>{{$or->email}} </td>
					        <td>
                                <button class="btn btn-default">Edit</button>
                                <button class="btn btn-danger">Del</button>
                            </td>
					      </tr>
					     @endforeach
					     </tbody>
                    </table>
                    <div class="text-right">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li>
                                    <a href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                    <a href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>

        </div>
        <div class="clearfix"></div>
    </div>

@endsection