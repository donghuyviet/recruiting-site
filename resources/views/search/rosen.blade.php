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
                    <div class="tabUnit">
                        <ul class="unitList nav nav-tabs">
                              <li class="active"><a href="#tab-unit-01" data-toggle="tab">路線・駅から探す</a></li>
                              <li class=""><a href="#tab-unit-02" data-toggle="tab">駅名を入力して探す</a></li>
                        </ul>
                        <ul>
                            <li class="tab-pane active" id="tab-unit-01">
                                <div class="sppopulararea">
                                    <div class="areaHeader">
                                        <div class="middinfo">
                                            <p class="linkTlt">  人気の駅 ：</p>
                                            <ul class="linkCont">
                                                <li> <a href="#">新宿駅</a></li>
                                                <li> <a href="#">渋谷駅</a></li>
                                                <li> <a href="#">池袋駅</a></li>
                                                <li> <a href="#">銀座駅</a></li>
                                                <li> <a href="#">中野駅</a></li>
                                                <li> <a href="#">新橋駅</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="viewCond">
                                        <ul class="maincond">
                                            <li class="linklist">
                                                <div class="tabbable tabs-left">
                                                    <ul class="nav nav-tabs">
                                                        <li ng-repeat="train in listTrains" ng-class='rowClass(train, $index,1)'>
                                                            <a href="#link-tabs-0//train.id_location//" data-toggle="tab">// train.name_location // </a>
                                                        </li>
                                                    </ul>
                                            </li>
                                        <li class="condRight">
                                            <ul class="condLyer_01 tab-content">
                                                <li ng-repeat="item in listTrains" ng-class='rowClass(item, $index,2)' id="link-tabs-0//item.id_location//">
                                                    <label ng-repeat="comp in item.company">
                                                        <ul class="linkcell">
                                                            <li>
                                                                <input value="//comp.id//" name="id_location" type="checkbox" >
                                                            </li>
                                                            <li data-toggle="collapse" data-target="#listAll-//comp.id//" aria-expanded="false" aria-controls="collapseExample">
                                                                <a href="" class="" onclick=""><p class="condlink">// comp.name //</p>
                                                                </a>
                                                            </li>
                                                            <li data-toggle="collapse" data-target="#listAll-//comp.id//" aria-expanded="false" aria-controls="collapseExample">
                                                            <a class="openClick" href="#"><p class="open"></p></a>
                                                            </li>
                                                        </ul>
                                                        <ul class="condLyer_02" class="collapse" id="listAll-//comp.id//" >
                                                            <li ng-repeat="router in comp.router" >
                                                                <ul class="condLyer_03" id="listAll_01">
                                                                    <li>
                                                                        <label>
                                                                            <ul class="linkcell">
                                                                                <li>
                                                                                    <input value="//router.id//" ng-true-value="//router.id//" type="checkbox">
                                                                                </li>
                                                                                <li>
                                                                                    <a href="/search/rosen/ //router.id//" class=""><p class="condlink">//router.name_router//</p>
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
                                    </li>
                                    </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="tab-pane" id="tab-unit-02">
                                <div class="boxSearch">
                                    <div class="box-header text-bold text-left">
                                        駅名を入力して探す
                                    </div>
                                    <div class="boxType">
                                        <p class="itInput text-center">
                                            <input type="text" name="" id="" placeholder="例：東京 (駅という文字は入れないでください。)">
                                        </p>
                                        <p class="scressBtn text-center">検索する</p>
                                    </div>
                                </div>
                                <div class="boxSearch">
                                    <div class="box-header text-bold text-left">
                                        区間を入力して探す
                                    </div>
                                    <div class="boxType">
                                        <p class="itInput text-center un-arrow">
                                            <input type="text" name="" id="" placeholder="乗車駅 例：東京">
                                        </p>
                                        <p class="itInput text-center">
                                            <input type="text" name="" id="" placeholder="降車駅 例：大手町">
                                        </p>
                                        <p class="scressBtn text-center">検索する</p>
                                    </div>
                                </div>
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
