@extends('layouts.app')

@section('content')
  <div class="row wrapper">
        <div class="col-md-2 wrapper">
            @include('sidebar.index')

        </div>
        <div class="col-md-10 wrapper vdh">
            <div class="mainContents" ng-controller="zenkokuCtrl">
                <div class="zenkoku">
                    <h2 class="allTom">全国のアルバイト・バイト求人</h2>
                    <div class="">
                        <ul class="buttonListTypeC01 weban accordionUnit01">
                            <li ng-repeat="item in district" class="areaTopLink accordionBtn collapsed" data-toggle="collapse" data-parent="#accordion" href="#demo-0//item.id_district//" aria-expanded="false" aria-controls="demo-0//item.id_district//">
                                <p class="actived">//item.name_district//</p>
                                <ul  id="demo-0//item.id_district//" class="collapse">
                                    <li ng-repeat="city in item.city" ng-click="dosearch(city.name_city)"><a href="./"><p>//city.name_city//</p></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
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
<script src="/{{ config('app.source') }}/js/customize/zenkoku.js"></script>
@endsection
