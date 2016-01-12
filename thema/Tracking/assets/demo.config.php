<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 

// 데모 레이아웃 설정값 저장하기
if(isset($dpv) && $dpv) { 
	$dpv_set = THEMA.'|'.$dpv_pc.'|'.$dpv_layout.'|'.$dpv_bg.'|'.$dpv_lnb.'|'.$dpv_header.'|'.$dpv_menu.'|'.$dpv_meffect.'|'.$dpv_mfont.'|'.$dpv_side.'|'.$dpv_font;
	set_session(THEMA.'_demo_set', $dpv_set);
}

// 데모 레이아웃 설정값 불러오기
$demo_set = get_session(THEMA.'_demo_set');
list($demo_thema) = explode("|", $demo_set);
if($demo_thema && $demo_thema == THEMA) {
	list($demo_thema, $at_set['pc'], $at_set['layout'], $at_set['body_background'], $at_set['lnb'], $at_set['header'], $at_set['menu'], $at_set['meffect'], $at_set['mfont'], $at_set['side'], $at_set['font']) = explode("|", $demo_set);
}

// 박스형 배경
if(isset($at_set['layout']) && $at_set['layout'] == "boxed" && !$at_set['body_background']) {
	$at_set['body_background'] = "http://amina.co.kr/demo/data/apms/background/1107.jpg";
}

//G5 데모 설정값
$member_skin_path   = G5_SKIN_PATH.'/member/basic';
$member_skin_url    = G5_SKIN_URL.'/member/basic';

$new_skin_path      = G5_SKIN_PATH.'/new/basic';
$new_skin_url       = G5_SKIN_URL.'/new/basic';

$search_skin_path   = G5_SKIN_PATH.'/search/basic';
$search_skin_url    = G5_SKIN_URL.'/search/basic';

$connect_skin_path  = G5_SKIN_PATH.'/connect/basic';
$connect_skin_url   = G5_SKIN_URL.'/connect/basic';

$faq_skin_path      = G5_SKIN_PATH.'/faq/basic';
$faq_skin_url       = G5_SKIN_URL.'/faq/basic';

$tag_skin_path      = G5_SKIN_PATH.'/tag/basic';
$tag_skin_url       = G5_SKIN_URL.'/tag/basic';

$qa_skin_path       = G5_SKIN_PATH.'/qa/basic';
$qa_skin_url        = G5_SKIN_URL.'/qa/basic';

if($bo_table == 'basic') {
	$board['bo_'.MOBILE_.'skin'] = 'apms-basic';
	$board_skin_path = G5_SKIN_PATH.'/board/'.$board['bo_'.MOBILE_.'skin'];
	$board_skin_url = G5_SKIN_URL.'/board/'.$board['bo_'.MOBILE_.'skin'];
}

//YC5 데모 설정값

if(!IS_YC || !IS_SHOP) return;

//분류,이벤트 상품목록 & 상품설명스킨 - 추가설정값
if($ev_id || $ca_id || $it_id) {

	//상품설명 스킨
	if($it_id) {
		if($sitem) set_session('sitem', $sitem);

		$sitem = get_session('sitem');

		list($is, $io) = explode("|", $sitem);

		$item_skin = ($is) ? $is : 'shop';

		if($io == "2") { //와이드
			$at_set['page'] = 12; //페이지 스타일
			$slist = 'basic|2'; //상품목록 
		} else {
			$at_set['page'] = 9; //페이지 스타일
			$slist = 'basic|1'; //상품목록 
		}

		if($is == 'board') {
			$wset['seller'] = 1;
		}

		$wset['nav'] = 1;
	}

	//목록스킨에 따른 설정
	if($slist) set_session('slist', $slist);

	$slist = get_session('slist');

	list($ls, $lo) = explode("|", $slist);

	$list_skin = ($ls) ? $ls : 'basic';

	//스킨설정
	$thumb_w = 400;// 썸네일 너비
	$thumb_h = 540;// 썸네일 높이
	$wset['shadow'] = '';
	$wset['buy'] = '';
	$wset['cmt'] = '';
	$wset['hit'] = '';
	$wset['sns'] = ''; 

	if($lo == "2") { //와이드형
		$at_set['page'] = 12; //페이지 스타일
		$list_mods = 5; //가로수
		$list_rows = 4; //세로수
		$wset['item'] = 5;
		$wset['lg'] = 4;
	} else {
		$at_set['page'] = 9; //페이지 스타일
		$list_mods = 4; //가로수
		$list_rows = 6; //세로수
	}
}

//스킨 추가설정이 있는 페이지
if($pid == 'iuse') { //사용후기
	$skin_name = 'basic';
} else if($pid == 'iqa') { //상품문의
	$skin_name = 'basic';
} else if($pid == 'iev') { //이벤트(전체)
	$skin_name = 'basic';
} else if($pid == 'itype') { //상품유형
	$skin_name = 'basic';
	$list_mods = 4; //가로수
	$list_rows = 6; //세로수
} else if($pid == 'isearch') { //상품검색
	$skin_name = 'basic';
	$list_mods = 4; //가로수
	$list_rows = 6; //세로수
} else if($pid == 'myshop') { //마이샵
	$skin_name = 'basic';
	$list_mods = 4; //가로수
	$list_rows = 6; //세로수
} 

$order_skin_path    = G5_SKIN_PATH.'/apms/order/basic';
$order_skin_url     = G5_SKIN_URL.'/apms/order/basic';

// 모바일은 무조건 페이지 없음
if(G5_IS_MOBILE) {
	$at_set['page'] = 12;
	$ca['pt_item'] = '';
}

?>