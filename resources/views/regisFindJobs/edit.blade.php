@extends('layouts.app')

@section('content')
	<div class="row">
        <div class="col-md-2">
            @include('sidebar.index')

        </div>
        <div class="col-md-10">
            <div class="box">
                <div class="box-header">
                </div>
                <div class="box-content">
                	@if(count($errors)>0)
	                	<div class="alert alert-danger alert-dismissible" role="alert">
	                	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                		@foreach($errors->all() as $err)
	                			{{$err}} </br>
	                		@endforeach
	                	</div>
                	@endif
                    @if(Session('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{session('success')}}
                        </div>
                    @endif
                    <form class="form-horizontal"  method="POST" action="{{ url('/') }}/findjobsdetail/edit/{{ $edit->id }}">
                    {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">氏名</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="name" value="{{$edit->name}}" id="" placeholder="氏名">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">住所</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="address" value="{{$edit->address}}" id="" placeholder="住所">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">電話番号 </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="tel" value="{{$edit->tel}} " id="" placeholder="電話番号 ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">メール</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" value="{{$edit->email}} " name="email" id="" placeholder="メール">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">自己紹介</label>
                            <div class="col-sm-6">
                            <textarea class="form-control" rows="5" id="comment"  value="{{$edit->text}} " name="text"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="hidden" name="userid" >
                                <button type="submit" class="btn btn-primary" name="submit">更新</button>
                                <a href="/orderer" type="submit" class="btn btn-default">閉じる</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
        <div class="clearfix"></div>
    </div>
<!-- <script src="/{{ config('app.source') }}/js/customize/orderer.js"></script> -->
@endsection