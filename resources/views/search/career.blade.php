@extends('layouts.app')

@section('content')
  <div class="row ">
        <div class="col-md-2 wrapper">
            @include('sidebar.index')

        </div>
        <div class="col-md-10 wrapper vdh" ng-controller="SearchResultCtrl">
            
            <div class="mainContents">
                <h1 class="pageTitle" alt="検索結果"></h1>
                <div class="boxSearch" ng-repeat="job in results">
                    <div class="box-header text-bold text-left">
                       // job.title //
                    </div>
                    <div class="boxType">
                        <div class="type-header text-left">
                            <div class="heading-pic"><p class="image">
                                <img src="/src/image/item/7325886.jpg">
                            </p></div>
                            <div class="header-right">
                                <div class="header-right-title">
                                    <p><!-- アルバイト/パート/正社員 -->
                                        // '' //
                                    </p>
                                </div>
                                <ul class="ListType-Right text-bold">
                                    <li><a href="#">// job.description | limitTo:100 // //(job.description.length) > 100 ? '...':'' //</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="summerBox">
                            <table class="summer-table">
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <img src="/src/image/item/ico_category_g.png">
                                            <br>
                                            <span>職種</span>
                                        </th>
                                        <td><p ng-repeat="cate in job.category">
                                           <!--  1.カウンターレディ※お店のお手伝い感覚でOK♪ <br>
                                            2.ホールSTAFF -->
                                            // cate.name_specializations //
                                        </p></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <img src="/src/image/item/ico_pay.png">
                                            <br>
                                            <span>給与</span>
                                        </th>
                                        <td><p ng-repeat="sala in job.salary">
                                            <!-- 1.カウンターレディ※お店のお手伝い感覚でOK♪ <br>
                                            2.ホールSTAFF -->
                                            //sala.price//
                                        </p></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <img src="/src/image/item/ico_train_g.png">
                                            <br>
                                            <span>交通</span>
                                        </th>
                                        <td><p ng-repeat="ben in job.benefit">
                                            <!-- 1.カウンターレディ※お店のお手伝い感覚でOK♪ <br>
                                            2.ホールSTAFF -->
                                            // ben.name_benefit //
                                        </p></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <img src="/src/image/item/ico_shiftinfo.png">
                                            <br>
                                            <span>時間</span>
                                        </th>
                                        <td><p>
                                           <!--  1.カウンターレディ※お店のお手伝い感覚でOK♪ <br>
                                            2.ホールSTAFF -->
                                           //job.time.time_work || job.time.number_day//
                                        </p></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="itemsave">
                            <a href="#">
                                <p class=" star text-center">とりあえず保存</p>
                            </a>
                        </div>
                        <div class="itemsave appbtn">
                            <a href="#">
                                <p class=" star apply_btn text-center">とりあえず保存</p>
                            </a>
                        </div>
                        <div class="itemsave appbtn">
                            <a href="#">
                                <p class=" star apply_btn text-center apply-job-button" data-id="//job.id_job//">仕事の申し込み</p>
                            </a>
                        </div>
                        <div class="table-bottom text-center">
                            <table>
                                <tbody>
                                    <tr align="right">
                                        <td align="right">
                                            <span>掲載期間</span>
                                            <span>：</span>
                                            <span>//job.start_date //～ //job.end_date //</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
                    <!-- <p class="copyright text-center">
                        <a href="">@timefuns.net</a>
                    </p> -->
                </div>
            </div>
                
        </div>
        
        <div class="clearfix"></div>
    </div>
<link rel="stylesheet" type="text/css" href="/{{config('app.source')}}/css/search.css">
<script src="/{{ config('app.source') }}/js/customize/search-result.js"></script>
@endsection