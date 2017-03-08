@extends('layouts.app')

@section('content')
  <div class="row wrapper">
        <div class="col-md-2 wrapper">
            @include('sidebar.index')

        </div>
        <div class="col-md-10 wrapper vdh" ng-controller="SearchTrain">

            <div class="mainContents">
            	<form class="" name="" method="" action="">
                    <h1 class="pageTitle-loca text-bold">
                        <a href="/search">
                            <span class="local-header">戻る</span>
                        </a>
                            エリアを選択する
                    </h1>
                    <div class="viewCond" ng-init="station = getstation({{$id}})">
                        <ul class="maincond">
                            <li class="linklist">
                                <div class="tabbable tabs-left">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#link-tabs-01" data-toggle="tab">// router.name_router //</a></li>
                                </ul>
                            </li>
                            <li class="condRight">
                                <ul class="condLyer_01 tab-content">
                                    <li id="link-tabs-01"  class="tab-pane active" >
                                        <label>
                                            <ul class="linkcell">
                                                <li>
                                                    <input value="//router.id//" ng-true-value="//router.id//" type="checkbox">
                                                </li>
                                                <li data-toggle="collapse" data-target="#listAll-//router.id//" aria-expanded="false" aria-controls="collapseExample">
                                                    <a href="" class="" onclick=""><p class="condlink">//router.name_router//の全ての駅</p>
                                                    </a>
                                                </li>
                                                <li data-toggle="collapse"  data-target="#listAll-//router.id//" aria-expanded="false" aria-controls="collapseExample">
                                                <a class="openClick" href="#"><p class="open"></p></a>
                                                </li>
                                            </ul>
                                            <ul class="condLyer_02" class="collapse" id="listAll-//router.id//" >
                                                <li ng-repeat="item in stations" >
                                                    <ul class="condLyer_03" id="listAll_01">
                                                        <li>
                                                            <label>
                                                                <ul class="linkcell">
                                                                    <li>
                                                                        <input value="//item.id//" ng-true-value="//item.id//" type="checkbox">
                                                                    </li>
                                                                    <li>
                                                                        <a href="" class=""><p class="condlink">//item.name_station//</p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="icon-blue rosen"><a href="">
                                                                        <img src="/src/image/item/arrow_blue.png">
                                                                    </a></li>
                                                                </ul>
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </label>                                           
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </form>
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
                
               <!--  <p class="copyright text-center">
                    <a href="">@timefuns.net</a>
                </p> -->
            </div>
            </div>


        </div>
        <div class="hidden-bottom text-center" id="hidden-bottom">
                <div class="kaizen-mod text-center">
                    検索数
                    <span class="kaizen-mod-text">485</span>
                    <span class="kaizen-mod-text">件</span>
                </div>
            <ul>
                <li class="kaizen-clone"><a href="./career"><p>検索</p></a></li>
                <li class="kaizen"><a href="#"><p>希望条件を追加</p></a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
<script src="/{{ config('app.source') }}/js/customize/search-train.js"></script>
@endsection
<link rel="stylesheet" type="text/css" href="/{{config('app.source')}}/css/search.css"
