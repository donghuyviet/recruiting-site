@extends('layouts.app')

@section('content')
  <div class="row">
  		<div class="col-md-2 wrapper">
            @include('sidebar.index')

        </div>
        <div class="col-md-10 wrapper">
            <div class="box">
				<div class="box-header header-top text-center">
                    ロゴ
                </div> 
            </div>
            <div class="box">
            	<div class="innerWordSearch">
            		<div class="box-header text-bold">
            			人気・注目のワードで探す
	                </div> 
	                <div class="innerpopular">
	                	<ul>
	                		<li><a type="submit" class=" popularWord">人気ワード</a></li>
	                		<li><a href="#">急募</a></li>
	                		<li><a href="#">日払い</a></li>
	                		<li><a href="#">在宅</a></li>
	                		<li><a href="#">1日のみ</a></li>
	                	</ul>
	                	<ul>
	                		<li><a type="submit" class=" popularWord attentionWord ">人気ワード</a></li>
	                		<li><a href="#">短期</a></li>
	                		<li><a href="#">カフェ</a></li>
	                		<li><a href="#">正社員</a></li>
	                	</ul>
	                	<ul class="search-main">
	                		<li><input class="input-search" type="text" name="" id="freewordInput" placeholder=" 例：データ入力、イベント"></li>
	                		<li><a type="submit" class="img-submit" ><img src="src/image/item/A_01_btn_search_01.png"></a></li>
	                	</ul>
	                </div>
            	</div>
            </div>
            <div class="search-main">
            	<ul class="search">
            		<li>
            			<div class="box icon">
	            			<a href="./search/fillter">
	            				<div>
		            				<img class="img-search" src="src/image/item/ico_search.png">
		            				<p class="larger">ピッタリ条件で探す</p>
		            				<p class="small">新宿区 × フード × 時給1,000円</p>
	            					
	            				</div>
	            			</a>
            			</div>
            		</li>
            		<li>
	            		<div class="box icon">
            			<a href="./search/location">
            				<div>
            				<img class="img-search" src="src/image/item/ico_search_01.png">
            				<p class="larger">エリアから探す</p>
            				</div>
            			</a>
            			</div>
            		</li>
            		<li>
	            		<div class="box icon">
            			<a href="./search/rosen">
            				<div>
            				<img class="img-search" src="src/image/item/ico_search_02.png">
            				<p class="larger">駅・路線から探す</p>
            				</div>
            			</a>
            			</div>
            		</li>
            		<li>
	            		<div class="box icon">
            			<a href="./search/career">
            				<div>
            				<img class="img-search" src="src/image/item/ico_search_03.png">
            				<p class="larger">職種から探す</p>
            				</div>
            			</a>
            			</div>
            		</li>
            		<!-- <li class="close-search" id="my-open">
	            		<div class="box buttonIcon">
            			<a  data-toggle="collapse" href="#mysearch">
            				<img class="icon_plus" src="src/image/item/ico_plus.png">
            				<p>その他の条件から探す</p>
            			</a>
            			</div>
            		</li> -->
            		
        		</ul>
        		<ul class="search " id="mysearch">
            		<li>
	            		<div class="box icon">
            			<a href="#">
            				<img class="img-search" src="src/image/item/ico_search_04.png">
            				<p class="larger">職種から探す</p>
            			</a>
            			</div>
            		</li>
            		<li>
	            		<div class="box icon">
            			<a href="#">
            				<img class="img-search" src="src/image/item/ico_search_05.png">
            				<p class="larger">職種から探す</p>
            			</a>
            			</div>
            		</li>
            		<li>
	            		<div class="box icon">
            			<a href="#">
            				<img class="img-search" src="src/image/item/ico_search_06.png">
            				<p class="larger">職種から探す</p>
            			</a>
            			</div>
            		</li>
            	</ul>
            	<!-- <ul class="search " >
            		<li>
	            		<div class="box">
            			<a href="#">
            				<p class="larger">職種から探す</p>
            				<p class="small">職種から探す</p>
            			</a>
            			</div>
            		</li>
            		
            	</ul> -->
            </div>

        </div>
        <div class="clearfix"></div>
    </div>

@endsection
<link rel="stylesheet" type="text/css" href="/{{config('app.source')}}/css/search.css">
<script type="text/javascript">
	
</script>