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
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>name</th>
                                <th>companyname</th>
                              </tr>
                            </thead>
                             <tr>
                                <td>{{$detail->name}}</td>
                                <td>{{$detail->companyname}}</td>
                              </tr>
                            </tbody>
                          </table>
                      </div>
                    <div class="text-right">
                    </div>

                </div>
            </div>

        </div>
        <div class="clearfix"></div>
    </div>

@endsection
