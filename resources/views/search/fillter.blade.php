@extends('layouts.app')

@section('content')
  <div class="row ">
        <div class="col-md-2 wrapper">
            @include('sidebar.index')

        </div>
        <div class="col-md-10 wrapper vdh" ng-controller="SearchLocationCtrl">
            <div class="mainContents">
            	<h1 class="pageTitle" alt="一発検索">一発検索</h1>
                <h2 class="headerType">エリア</h2>
                <div class="aseaSelect">
                    <div class="aseamain">
                        <div class="aseaLeft">
                            <h1>東京都</h1>
                        </div>
                        <div class="aseaRight">
                            <a href="./zenkoku">都道府県を変更する</a>
                        </div>
                    </div>
                    <br>
                    <p>
                        地域
                        <select id="" selected="selected" ng-repeat="list in ListCity">
                            <option  value="//ListCity.id//" >//ListCity.name_city//</option>
                        </select>
                    </p>
                    <p>
                        市区
                        <select id="" selected="selected" name="repeatSelect" ng-model="searchString">
                            <option value="">---Please select---</option>
                            <option ng-repeat="loca in ListLocation" value="// loca.id //" name="//loca.name_location//"> // loca.name_location //</option>
                        </select>
                    </p>
                </div>
                <h2 class="headerType">職種</h2>
                <div class="tablemain" id="main-search-category">
                    <div class="numberwork tableJobcate ">
                        <form>
                            <label class="salary first">
                                <input type="checkbox" value="" id="" name="" ng-model="searchCategory.all">
                                <span class="name">すべての職種</span>
                            </label>
                            <label class="salary" ng-repeat="item in category" >
                                <input type="checkbox" name="status" value="// item.id //" ng-model="searchCategory.id" ng-checked="searchCategory.all"  ng-true-value="//item.id//">
                                <span class="name">// item.name_specializations //</span>
                            </label>
                        </form>
                    </div>
                </div>
                <h2 class="headerType">こだわり</h2>
                <div class="commitment">
                    <ul class="commited">
                        <li ng-repeat="item in benefit">
                            <a href="#work-//item.id//" data-toggle="collapse" data-parent="#accordion" class="" aria-expanded="false">//item.name_benefit//</a>
                            <div class="numberwork tableJobcate panel-collapse collapse " id="work-//item.id//">
                                <form >
                                    <label class="salary">
                                        <input type="checkbox" name="" value="">
                                        <span class="name">高校生歓迎</span>
                                    </label>
                                    <label class="salary">
                                        <input type="checkbox" name="" value="">
                                        <span class="name">大学生歓迎</span>
                                    </label>
                                    <label class="salary">
                                        <input type="checkbox" name="" value="">
                                        <span class="name">主婦・主夫歓迎</span>
                                    </label>
                                    <label class="salary">
                                        <input type="checkbox" name="" value="">
                                        <span class="name">フリーター歓迎</span>
                                    </label>
                                </form>
                            </div>
                            
                        </li>                        
                    </ul>
                </div>
                <h2 class="headerType">勤務日数</h2>
                <div class="numberwork">
                    <div class="numberwork tableJobcate  " id="">
                        <form >
                            <label class="salary" ng-repeat="tm in time">
                                <input type="checkbox" value="// tm.id //" ng-model="searchCategory.time"  ng-true-value="//tm.id//">
                                <span class="name">//tm.number_day//</span>
                            </label>
                        </form>
                    </div>
                </div>
                <h2 class="headerType">勤務期間</h2>
                <div class="numberwork">
                    <select name="">
                        <option value="" selected="selected">指定なし</option>
                        <option value="" >1日のみ</option>
                        <option value="" >3日以内</option>
                        <option value="" >1週間以内</option>
                    </select>
                </div>
                <h2 class="headerType">給与</h2>
                <div class="numberwork tableJobcate "  >
                    <form >
                        <label class="salary" ng-repeat="item in salary" >
                            <input type="radio" ng-model="searchCategory.salary_unit" ng-value="//item//">
                            <span class="name">//item.title//</span>
                        </label>
                    </form>
                </div>
                <h2 class="headerType">フリーワード</h2>
                <div class="numberwork">
                    <span class="text">
                        <input type="text" id="freewordInput" class="freeword" maxlength="50">
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
                
            <div class="hidden-bottom">
                <ul>
                    <li id="search"><a type="submit" ng-click="doSearchFilter()"><img src="/src/image/item/mod_btn_search_02.png"></a></li>
                    <li id="clear"><a href="#"><img src="/src/image/item/mod_btn_clear_01.png"></a></li>
                </ul>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    <link rel="stylesheet" type="text/css" href="/{{config('app.source')}}/css/search.css">
    <script src="/{{ config('app.source') }}/js/customize/search-location.js"></script>

@endsection
