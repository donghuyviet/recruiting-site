@extends('layouts.app')

@section('content')
  <div class="row wrapper">
        <div class="col-md-2 wrapper">
            @include('sidebar.index')

        </div>
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
                        <div class="middinfo info-top">
                            <p class="linkTlt"> 人気エリア ：</p>
                            <ul class="linkCont">
                                <li> <a href="#">渋谷エリア</a></li>
                                <li> <a href="#">新宿エリア</a></li>
                                <li> <a href="#">池袋エリア</a></li>
                                <li> <a href="#">丸の内エリア</a></li>
                                <li> <a href="#">銀座エリア</a></li>
                                <li> <a href="#">中野・荻窪エリア</a></li>
                            </ul>
                        </div>
                        <div class="viewCond">
                            <ul class="maincond">
                                <li class="linklist">
                                    <div class="tabbable tabs-left">
                                        <ul class="nav nav-tabs">
                                          <li class="active"><a href="#link-tabs-01" data-toggle="tab">東京都</a></li>
                                          <li class=""><a href="#link-tabs-02" data-toggle="tab">神奈川県</a></li>
                                          <li><a href="#ink-tabs-03" data-toggle="tab">埼玉県</a></li>
                                          <li><a href="#link-tabs-04" data-toggle="tab">千葉県</a></li>
                                          <li><a href="#link-tabs-05" data-toggle="tab">茨城県</a></li>
                                          <li><a href="#link-tabs-06" data-toggle="tab">栃木県</a></li>
                                          <li><a href="#link-tabs-07" data-toggle="tab">群馬県</a></li>
                                    </ul>
                                </li>
                                <li class="condRight">
                                    <ul class="condLyer_01 tab-content">
                                        <li class="tab-pane active" id="link-tabs-01">
                                            <label>
                                                <ul class="linkcell">
                                                    <li>
                                                        <input value="1307" name="A3" type="checkbox" class="">
                                                    </li>
                                                    <li data-toggle="collapse" data-target="#listAll" aria-expanded="false" aria-controls="collapseExample">
                                                        <a href="" class="" onclick=""><p class="condlink">23区 (20650)</p>
                                                        </a>
                                                    </li>
                                                    <li data-toggle="collapse" data-target="#listAll" aria-expanded="false" aria-controls="collapseExample">
                                                    <a class="openClick" href="#"><p class="open"></p></a>
                                                    </li>
                                                </ul>
                                            </label>
                                            <ul class="condLyer_02" class="collapse" id="listAll">
                                                <li>
                                                    <label>
                                                        <ul class="linkcell">
                                                            <li>
                                                                <input value="1307" name="A3" type="checkbox" class="">
                                                            </li>
                                                            <li data-toggle="collapse" data-target="#listAll_01" aria-expanded="false" aria-controls="collapseExample">
                                                                <a href="#" class="" onclick=""><p class="condlink">23区 (20650)</p>
                                                                </a>
                                                            </li>
                                                            <li data-toggle="collapse" data-target="#listAll_01" aria-expanded="false" aria-controls="collapseExample">
                                                            <a class="openClick" href="#listAll_01"><p class="open"></p></a>
                                                            </li>
                                                        </ul>
                                                    </label>
                                                    <ul class="condLyer_03" id="listAll_01">
                                                        <li>
                                                            <label>
                                                                <ul class="linkcell">
                                                                    <li>
                                                                        <input value="1307" name="A3" type="checkbox" class="">
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" class="" onclick=""><p class="condlink">23区 (20650)</p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="icon-blue">
                                                                    <a href="#"><img src="/src/image/item/arrow_blue.png"></a>
                                                                    </li>
                                                                </ul>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label>
                                                                <ul class="linkcell">
                                                                    <li>
                                                                        <input value="1307" name="A3" type="checkbox" class="">
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" class="" onclick=""><p class="condlink">23区 (20650)</p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="icon-blue">
                                                                    <a href="#"><img src="/src/image/item/arrow_blue.png"></a>
                                                                    </li>
                                                                </ul>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label>
                                                                <ul class="linkcell">
                                                                    <li>
                                                                        <input value="1307" name="A3" type="checkbox" class="">
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" class="" onclick=""><p class="condlink">23区 (20650)</p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="icon-blue">
                                                                    <a href="#"><img src="/src/image/item/arrow_blue.png"></a>
                                                                    </li>
                                                                </ul>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label>
                                                                <ul class="linkcell">
                                                                    <li>
                                                                        <input value="1307" name="A3" type="checkbox" class="">
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" class="" onclick=""><p class="condlink">23区 (20650)</p>
                                                                        </a>
                                                                    </li>
                                                                    <li class="icon-blue">
                                                                    <a href="#"><img src="/src/image/item/arrow_blue.png"></a>
                                                                    </li>
                                                                </ul>
                                                            </label>
                                                        </li>

                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="tab-pane " id="link-tabs-02">sdfasdfas</li<li class="tab-pane " id="link-tabs-03">s</li>
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
                <p class="logo-bottom text-center">
                    <a href="#">
                        <img src="/src/image/item/tmp_gfooter_img_logo_01.gif">
                    </a>
                </p>
                <p class="copyright text-center">
                    <a href="">@timefuns.net</a>
                </p>
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
                <li class="kaizen-clone"><a href="#"><p>検索</p></a></li>
                <li class="kaizen"><a href="#"><p>希望条件を追加</p></a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>

@endsection
<link rel="stylesheet" type="text/css" href="/{{config('app.source')}}/css/search.css">
<script src="/{{ config('app.source') }}/js/customize/search.js"></script>
