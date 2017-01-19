@extends('layouts.app')

@section('content')
<div class="bootstrap-iso">
 <div class="container-fluid">
    <div class="row">
    	<div class="col-md-2">
            @include('sidebar.jobs');
        </div>
        <div class="col-md-10">
            <div class="box">
                <div class="container">
                  <div class="table-responsive">          
                      <table class="table">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>名前</th>
                            <th>会社名</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>{{$author->id}}</td>
                            <td>{{$author->name}}</td>
                            <td>{{$author->companyname}}</td>
                          </tr>
                        </tbody>
                      </table>
                      </div>
                      <div class="table-responsive">          
                          <table class="table">
                            <thead>
                              <tr>
                                <th>タイトル</th>
                                <th>内容 </th>
                                
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($jobs_author as $or)               
                              <tr>
                                <td>{{$or->title}}</td>
                                <td>{{$or->description}} </td>
                              </tr>
                             @endforeach
                            </tbody>
                          </table>
                      </div>
                    <a href="/jobs"><button type="button" class="btn btn-primary">Back List</button></a>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection