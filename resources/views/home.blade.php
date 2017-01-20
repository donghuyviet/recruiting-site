@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            @include('sidebar.index');
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <!-- <div class="col-sm-6 text-center" style="background: rgba(231, 76, 60, 0.9);">
                         <div class="content-sub">
                                <h1>仕事を探す</h1>
                               <a href = "{{ url('/jobs') }}"><button type="button" class="btn btn-info">仕事のリストを見る。</button></a>
                        </div>
                    </div>
                    <div class="col-sm-6 text-center" style="background: rgba(44, 62, 80, 0.9);">
                        <div class="content-sub">
                                <h1>仕事を依頼する。</h1>
                                <a href = "{{ url('/seeker/entry') }}"><button type="button" class="btn btn-info">新しい仕事を依頼する。</button></a>
                        </div>
                    </div> -->
                     You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
