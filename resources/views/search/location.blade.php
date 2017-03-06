@extends('layouts.app')

@section('content')
  <div class="row wrapper">
        <div class="col-md-2 wrapper">
            @include('sidebar.index')

        </div>
        <div class="col-md-10 wrapper vdh">

            <div class="mainContents" ng-controller="LocationCtrl">
                <form class="" name="" method="" action="">
                    <h1 class="pageTitle-loca text-bold">
                        <a href="#">
                            <span class="local-header">戻る</span>
                        </a>
                            エリアを選択する
                    </h1>
                    <div class="sppopulararea">
                        <div class="middinfo info-top">
                            <p class="linkTlt"> 人気エリア ：</p>
                            <ul class="linkCont">
                                <li ng-repeat="popu in popularArea.popular" > <a href="#" ng-click="doSearchKey(popu)">// popu //</a></li>
                            </ul>
                        </div>
                        <div class="viewCond">
                            <ul class="maincond">
                                <li class="linklist">
                                    <div class="tabbable tabs-left">
                                        <ul class="nav nav-tabs">
                                          <li ng-repeat="dist in districts"><a href="#link-tabs-0//dist.id_district//" data-toggle="tab">// dist.name_district //</a></li>
                                    </ul>
                                </li>
                                <li class="condRight">
                                    <ul class="condLyer_01 tab-content">
                                        <li ng-repeat="item in districts" id="link-tabs-0//item.id_district//"  class="tab-pane active" >
                                            <label ng-repeat="city in item.city">
                                                <ul class="linkcell">
                                                    <li>
                                                        <input value="1307" name="A3" type="checkbox" class=""/ ng-click="doClick()" ng-model="searchString.all">
                                                    </li>
                                                    <li data-toggle="collapse" data-target="#listAll-//city.id_city//" aria-expanded="false" aria-controls="collapseExample">
                                                        <a href="" class="" onclick=""><p class="condlink">//city.name_city//</p>
                                                        </a>
                                                    </li>
                                                    <li data-toggle="collapse" data-target="#listAll-//city.id_city//" aria-expanded="false" aria-controls="collapseExample">
                                                    <a class="openClick" href="#"><p class="open"></p></a>
                                                    </li>
                                                </ul>
                                                <ul class="condLyer_02" class="collapse" id="listAll-//city.id_city//" >
                                                <li ng-repeat="loca in city.location" >
                                                    <ul class="condLyer_03" id="listAll_01">
                                                        <li>
                                                            <label>
                                                                <ul class="linkcell">
                                                                    <li>
                                                                        <input value="1307" name="A3" type="checkbox" class=""ng-click="doClick()"  ng-checked="searchString.all">
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" class=""><p class="condlink">//loca.name_location//</p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="icon-blue rosen"><a href="./career">
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
                <!-- <p class="logo-bottom text-center">
                    <a href="#">
                        <img src="/src/image/item/tmp_gfooter_img_logo_01.gif">
                    </a>
                </p> -->
                <!-- <p class="copyright text-center">
                    <a href="">@timefuns.net</a>
                </p> -->
                <div class="hidden-bottom text-center" id="hidden-bottom" style="display: none;">
                <div class="kaizen-mod text-center">
                    検索数
                    <span class="kaizen-mod-text">485</span>
                    <span class="kaizen-mod-text">件</span>
                </div>
            <ul>
                <li class="kaizen-clone"><a href="./career"><p>検索</p></a></li>
                <li class="kaizen"><a href="#" ng-click="doSearch()"><p>希望条件を追加</p></a></li>
            </ul>
        </div>
            </div>
            </div>


        </div>
        
        <div class="clearfix"></div>
    </div>

<link rel="stylesheet" type="text/css" href="/{{config('app.source')}}/css/search.css">
<script src="/{{ config('app.source') }}/js/customize/location.js"></script>
@endsection
