@extends('layouts.app')

@section('content')
  <div class="row ">
        <div class="col-md-2 wrapper">
            @include('sidebar.index')

        </div>
        <div class="col-md-10 wrapper vdh" ng-controller="ConditionCtrl">
            
            <div class="mainContents">
            	<h1 class="pageTitle" alt="絞り込み条件検索">絞り込み条件検索</h1>
                <h2 class="headerType">エリア/路線・駅</h2>
                <div class="lineBox">
                	<ul class="linkLine">
                		<li><a href="#">//listname//</a></li>
                	</ul>
                </div>

                <h2 class="headerType">職種</h2>
                <div class="lineBox">
                	<ul class="linkLine">
                		<li><a href="#">選択している条件はありません</a></li>
                	</ul>
                </div>

                <h2 class="headerType">職種</h2>
                <div class="lineBox">
                	<ul class="linkLine">
                		<li><a href="#">選択している条件はありません</a></li>
                	</ul>
                </div>
                <h2 class="headerType">職種</h2>
                <div class="lineBox">
                	<ul class="linkLine">
                		<li><a href="#">選択している条件はありません</a></li>
                	</ul>
                </div>
                 <h2 class="headerType">職種</h2>
                <div class="lineBox">
                	<ul class="linkLine">
                		<li><a href="#">選択している条件はありません</a></li>
                	</ul>
                </div>
                 <h2 class="headerType">職種</h2>
                <div class="lineBox">
                	<ul class="linkLine">
                		<li><a href="#">選択している条件はありません</a></li>
                	</ul>
                </div>
                
                <h2 class="headerType">給与</h2>
                <div class="numberwork">
                    <span class="text">
                        <input type="text" id="freewordInput" class="freeword" name="F1" value="" maxlength="50">
                    </span>
                </div>
                <p class="pagetop">
                <a id="back-to-top" href="#top" class="back-to-top">ページ上部へ戻る</a>
                </p>
	            <div class="gfooter">
	                <nav class="unav">
	                    <ul>
	                        <li> <a href="#">求人情報サービス「an」トップへ</a></li>
	                        <li> <a href="#">お問い合わせ</a></li>
	                    </ul>
	                    <ul>
	                        <li> <a href="#">個人情報保護方針</a></li>
	                        <li> <a href="#">免責事項</a></li>
	                        <li> <a href="#">利用規約</a></li>
	                    </ul>
	                    <ul>
	                        <li> <a href="#">推奨環境</a></li>
	                        <li> <a href="#">サイトマップ</a></li>
	                        <li> <a href="#">会社概要</a></li>
	                    </ul>
	                </nav>
	                <!-- <p class="copyright text-center">
	                    <a href="">@timefuns.net</a>
	                </p> -->
	            </div>
            </div>
                
        </div>
        <div class="hidden-bottom">
            <ul>
                <li id="search"><a href="#"><img src="/src/image/item/mod_btn_search_02.png"></a></li>
                <li id="clear"><a href="#"><img src="/src/image/item/mod_btn_clear_01.png"></a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
<link rel="stylesheet" type="text/css" href="/{{config('app.source')}}/css/search.css">
<script src="/{{ config('app.source') }}/js/customize/result-condition.js"></script>
@endsection

