@extends('layouts.app')

@section('content')
	<div class="row">
        <div class="col-md-2">
            @include('sidebar.index')

        </div>
        <div class="col-md-10">
            <div class="box">
                <div class="container">
                  <div class="table-responsive">          
                      <table class="table">
                        <thead>
                          <tr>
                            <th>求人番号</th>
                            <th>タイトル</th>
                            <th>求人者</th>
                            <th>開始日</th>
                            <th>終了日</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>{{$detail->id}}</td>
                            <td>{{$detail->title}}</td>
                            <td>{{$detail->name}}</td>
                            <td>{{$detail->start_date}}</td>
                            <td>{{$detail->end_date}}</td>
                          </tr>
                        </tbody>
                      </table>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                            <h4>Project description:</h4>
                            <p>{{$detail->description}}</p>
                        </div>
                    </div>
                    <a href="/jobs"><button type="button" class="btn btn-primary">Back List</button></a>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

@endsection