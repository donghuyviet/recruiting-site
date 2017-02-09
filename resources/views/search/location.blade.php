@extends('layouts.app')

@section('content')
  <div class="row wrapper">
        <div class="col-md-10 wrapper vdh">

            <div class="mainContents">
            	<form class="" name="" method="" action="">
                    <h1 class="pageTitle-loca text-bold">
                        <a href="#">
                            <span class="local-header">戻る</span>
                        </a>
                            エリアを選択する
                    </h1>
                    <div class="sppopulararea">
                        <div class="middinfo">

                        </div>
                    </div>
                </form>
            </div>


        </div>
        <div class="hidden-bottom">
            <ul>
                <li ><a href="#"><img src="src/image/item/mod_btn_search_02.png"></a></li>
                <li><a href="#"><img src="src/image/item/mod_btn_clear_01.png"></a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>

@endsection
<link rel="stylesheet" type="text/css" href="/{{config('app.source')}}/css/search.css">
<script type="text/javascript">
$(document).ready(function(e) {
        $('#back-to-top').scrollTop();

});
</script>
