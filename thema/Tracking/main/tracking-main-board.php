<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 위젯 카운팅
$wn = 1; 

// 위젯 대표아이디 설정
$wid = 'tracking-main-board';

// 게시판 제목 폰트 설정
$font = 'font-16 en';

// 게시판 제목 하단라인컬러 설정 - red, blue, green, orangered, black, orange, yellow, navy, violet, deepblue, crimson..
$line = 'red';

?>
<style>
	.widget-index .at-main,
	.widget-index .at-side { padding-bottom:0px; }
	.widget-index .div-title-underbar { margin-bottom:15px; }
	.widget-index .div-title-underbar span { padding-bottom:4px; }
	.widget-box { margin-bottom:25px; }
</style>

<div class="container widget-index">

	<div class="h20"></div>

	<div class="widget-box">
		<?php //echo latest("tracking_basic","ad_list",10); ?>
		<?php echo latest("tracking_basic","ad_list",10); ?>
	</div>
	
</div>
