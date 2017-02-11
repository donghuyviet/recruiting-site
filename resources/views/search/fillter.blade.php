@extends('layouts.app')

@section('content')
  <div class="row ">
        <div class="col-md-2 wrapper">
            @include('sidebar.index')

        </div>
        <div class="col-md-10 wrapper vdh">
            
            <div class="mainContents">
            	<h1 class="pageTitle" alt="一発検索">一発検索</h1>
                <h2 class="headerType">エリア</h2>
                <div class="aseaSelect">
                    <div class="aseamain">
                        <div class="aseaLeft">
                            <h1>東京都</h1>
                        </div>
                        <div class="aseaRight">
                            <a href="#">都道府県を変更する</a>
                        </div>
                    </div>
                    <br>
                    <p>
                        地域
                        <select id="">
                            <option value="">その他東京都</option>
                            <option value="">23</option>
                        </select>
                    </p>
                    <p>
                        市区
                        <select id="">
                            <option value="">その他東京都</option>
                            <option value="">23</option>
                        </select>
                    </p>
                </div>
                <h2 class="headerType">職種</h2>
                <div class="tablemain">
                    <table class="tableJobcate">
                        <tbody>
                            <tr>
                                <td>
                                    <label>
                                        <input type="checkbox" value="" id="" name="">
                                        <span class="name">フード</span>
                                    </label>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <label>
                                        <input type="checkbox" value="" id="" name="">
                                        <span class="name">フード</span>
                                    </label>
                                </td>
                                <td>
                                    <label>
                                        <input type="checkbox" value="" id="" name="">
                                        <span class="name">フード</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>
                                        <input type="checkbox" value="" id="" name="">
                                        <span class="name">フード</span>
                                    </label>
                                </td>
                                <td>
                                    <label>
                                        <input type="checkbox" value="" id="" name="">
                                        <span class="name">フード</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>
                                        <input type="checkbox" value="" id="" name="">
                                        <span class="name">フード</span>
                                    </label>
                                </td>
                                <td>
                                    <label>
                                        <input type="checkbox" value="" id="" name="">
                                        <span class="name">フード</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>
                                        <input type="checkbox" value="" id="" name="">
                                        <span class="name">フード</span>
                                    </label>
                                </td>
                                <td>
                                    <label>
                                        <input type="checkbox" value="" id="" name="">
                                        <span class="name">フード</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>
                                        <input type="checkbox" value="" id="" name="">
                                        <span class="name">営業職</span>
                                    </label>
                                </td>
                                <td>
                                    <label>
                                        <input type="checkbox" value="" id="" name="">
                                        <span class="name">パワフルワーク</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>
                                        <input type="checkbox" value="" id="" name="">
                                        <span class="name">医療・福祉・介護</span>
                                    </label>
                                </td>
                                <td>
                                    <label>
                                        <input type="checkbox" value="" id="" name="">
                                        <span class="name">専門・技術職(資格を有するもの)</span>
                                    </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h2 class="headerType">こだわり</h2>
                <div class="commitment">
                    <ul class="commited">
                        <li>
                            <a href="#work1" data-toggle="collapse" data-parent="#accordion" class="" aria-expanded="false">歓迎情報</a>
                            <table class="tableJobcate" >
                            <tbody class="panel-collapse collapse" id="work1">
                                <tr>
                                    <td>
                                        <label>
                                            <input type="checkbox" value="" id="" name="">
                                            <span class="name">高校生歓迎</span>
                                        </label>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>
                                            <input type="checkbox" value="" id="" name="">
                                            <span class="name">大学生歓迎</span>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input type="checkbox" value="" id="" name="">
                                            <span class="name">主婦・主夫歓迎</span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>
                                            <input type="checkbox" value="" id="" name="">
                                            <span class="name">フリーター歓迎</span>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input type="checkbox" value="" id="" name="">
                                            <span class="name">未経験者歓迎</span>
                                        </label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </li>
                        <li>
                            <a href="#work2" data-toggle="collapse" data-parent="#accordion">シフト重視</a>
                            <table class="tableJobcate "  >
                                <tbody class="panel-collapse collapse" id="work2">
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="checkbox" value="" id="" name="">
                                                <span class="name">フード</span>
                                            </label>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="checkbox" value="" id="" name="">
                                                <span class="name">フード</span>
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type="checkbox" value="" id="" name="">
                                                <span class="name">フード</span>
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>    
                        </li>
                        <li>
                            <a href="#work3" data-toggle="collapse" data-parent="#accordion">お金のメリット</a>
                            <table class="tableJobcate "  >
                                <tbody class="panel-collapse collapse" id="work3">
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="checkbox" value="" id="" name="">
                                                <span class="name">フード</span>
                                            </label>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="checkbox" value="" id="" name="">
                                                <span class="name">フード</span>
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type="checkbox" value="" id="" name="">
                                                <span class="name">フード</span>
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>    
                        </li>
                        <li>
                            <a href="#work4" data-toggle="collapse" data-parent="#accordion">職場の環境</a>
                            <table class="tableJobcate "  >
                                <tbody class="panel-collapse collapse" id="work4">
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="checkbox" value="" id="" name="">
                                                <span class="name">フード</span>
                                            </label>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="checkbox" value="" id="" name="">
                                                <span class="name">フード</span>
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type="checkbox" value="" id="" name="">
                                                <span class="name">フード</span>
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>    
                        </li>
                        <li>
                            <a href="#work5" data-toggle="collapse" data-parent="#accordion">気になる待遇</a>
                            <table class="tableJobcate "  >
                                <tbody class="panel-collapse collapse" id="work5">
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="checkbox" value="" id="" name="">
                                                <span class="name">フード</span>
                                            </label>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="checkbox" value="" id="" name="">
                                                <span class="name">フード</span>
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type="checkbox" value="" id="" name="">
                                                <span class="name">フード</span>
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>    
                        </li>
                    </ul>
                </div>
                <h2 class="headerType">勤務日数</h2>
                <div class="numberwork">
                    <table class="tableJobcate ">
                        <tbody id="">
                            <tr>
                                <td>
                                    <label>
                                        <input type="checkbox" value="" id="" name="">
                                        <span class="name">フード</span>
                                    </label>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <label>
                                        <input type="checkbox" value="" id="" name="">
                                        <span class="name">フード</span>
                                    </label>
                                </td>
                                <td>
                                    <label>
                                        <input type="checkbox" value="" id="" name="">
                                        <span class="name">フード</span>
                                    </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
                <div class="numberwork">
                    <table class="tableJobcate ">
                        <tbody id="">
                            <tr>
                                <td>
                                    <label>
                                        <input type="radio" value="" id="" name="">
                                        <span class="name">時給1,000円以上</span>
                                    </label>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <label>
                                        <input type="radio" value="" id="" name="">
                                        <span class="name">時給1,200円以上</span>
                                    </label>
                                </td>
                                <td>
                                    <label>
                                        <input type="radio" value="" id="" name="">
                                        <span class="name">日給10,000円以上</span>
                                    </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
                    <p class="copyright text-center">
                        <a href="">@timefuns.net</a>
                    </p>
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

@endsection
<link rel="stylesheet" type="text/css" href="/{{config('app.source')}}/css/search.css">
