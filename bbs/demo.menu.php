<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 

// 앞메뉴 초기배열값
$i = (count($hmenu) > 0) ? $i + 1 : 0;

// 기본 페이지
unset($dpmenu);
$msp = 'page';
$demo_href = 'mon='.$msp.'&amp;pv='.THEMA.'&amp;pvp=';
$demo_on = ($mon == $msp) ? 'on' : 'off';
$hmenu[$i]['on'] = $demo_on;
$hmenu[$i]['new'] = 'old';
$hmenu[$i]['href'] = $at_href['faq'].'?'.$demo_href.urlencode('faq');
$hmenu[$i]['name'] = '기본 페이지';
$hmenu[$i]['is_sub'] = true;

$dpmenu = array();
$dpmenu[] = array('faq', 'FAQ', '', 0);
$dpmenu[] = array('search', '게시물검색', '', 0);
$dpmenu[] = array('new', '새글모음', '', 0);
$dpmenu[] = array('connect', '현재접속자', '', 0);
$dpmenu[] = array('tag', '태그박스', '', 0);
$dpmenu[] = array('login', '로그인', '', 0);
$dpmenu[] = array('reg', '회원가입', '', 0);
$dpmenu[] = array('secret', '1:1문의', '', 0);
$dpmenu[] = array('mypage', '마이페이지', '', 0);
if(IS_YC && IS_SHOP) { // 쇼핑몰
	$dpmenu[] = array('cart', '장바구니', '쇼핑몰(YC5)', 1);
	$dpmenu[] = array('inquiry', '주문내역', '', 0);
	$dpmenu[] = array('ppay', '개인결제', '', 0);
	$dpmenu[] = array('event', '이벤트', '', 0);
	$dpmenu[] = array('isearch', '상품검색', '', 0);
	$dpmenu[] = array('iuse', '상품후기', '', 0);
	$dpmenu[] = array('iqa', '상품문의', '', 0);
	$dpmenu[] = array('wishlist', '위시리스트', '', 0);
	if(USE_PARTNER) {
		$dpmenu[] = array('myshop', '마이샵', '', 0);
		$dpmenu[] = array('partner', '파트너', '', 0);
	}
}

for($j=0; $j < count($dpmenu); $j++) {
	$pvpv = $dpmenu[$j][0];
	$demo_sub_on = ($demo_on && $pvp == $pvpv) ? 'on' : 'off';
	$hmenu[$i]['sub'][$j]['line'] = $dpmenu[$j][2];
	$hmenu[$i]['sub'][$j]['sp'] = $dpmenu[$j][3];
	$hmenu[$i]['sub'][$j]['on'] = $demo_sub_on;
	$hmenu[$i]['sub'][$j]['href'] = $at_href[$pvpv].'?'.$demo_href.urlencode($pvpv);
	$hmenu[$i]['sub'][$j]['name'] = $dpmenu[$j][1];
	$hmenu[$i]['sub'][$j]['new'] = 'old';
	$hmenu[$i]['sub'][$j]['is_sub'] = false;
}

// 기본 보드
unset($dpmenu);
$i++;
$msp = 'basic';
$demo_href = G5_BBS_URL.'/board.php?bo_table='.$msp.'&amp;pv='.THEMA.'&amp;pvbl=';
$demo_on = ($bo_table == $msp) ? 'on' : 'off';
$hmenu[$i]['on'] = $demo_on;
$hmenu[$i]['new'] = 'old';
$hmenu[$i]['href'] = $demo_href.urlencode('list').'&amp;pvbh='.urlencode('basic-black');
$hmenu[$i]['name'] = '기본 보드';
$hmenu[$i]['is_sub'] = true;

$dpmenu = array();
$dpmenu[] = array('list', '리스트', '', 0);
$dpmenu[] = array('gallery', '갤러리', '', 0);
$dpmenu[] = array('lightbox', '라이트박스', '', 0);
$dpmenu[] = array('webzine', '웹진', '', 0);
$dpmenu[] = array('blog', '블로그', '', 0);
$dpmenu[] = array('portfolio', '포트폴리오', '', 0);
$dpmenu[] = array('timeline', '타임라인', '', 0);
$dpmenu[] = array('talkbox', '토크박스', '', 0);
$dpmenu[] = array('talkbox-top', '토크박스-상단', '', 0);
$dpmenu[] = array('talkbox-bottom', '토크박스-하단', '', 0);

// 기본 헤드 - 3차
$dphead = array();
$dphead[] = array('basic-black', '블랙 헤드', '', 0);
$dphead[] = array('basic-blue', '블루 헤드', '', 0);
$dphead[] = array('basic-green', '그린 헤드', '', 0);
$dphead[] = array('basic-red', '레드 헤드', '', 0);
$dphead[] = array('basic-yellow', '옐로우 헤드', '', 0);
$dphead[] = array('basic-violet', '바이올릿 헤드', '', 0);
$dphead[] = array('basic-skyblue', '스카이블루 헤드', '', 0);

for($j=0; $j < count($dpmenu); $j++) {
	$pvpv = $dpmenu[$j][0];
	$demo_sub_on = ($demo_on && $pvbl == $pvpv) ? 'on' : 'off';
	$hmenu[$i]['sub'][$j]['line'] = $dpmenu[$j][2];
	$hmenu[$i]['sub'][$j]['sp'] = $dpmenu[$j][3];
	$hmenu[$i]['sub'][$j]['on'] = $demo_sub_on;
	$hmenu[$i]['sub'][$j]['href'] = $demo_href.urlencode($pvpv);
	$hmenu[$i]['sub'][$j]['name'] = $dpmenu[$j][1];
	$hmenu[$i]['sub'][$j]['new'] = 'old';
	if($pvpv == 'list') { // 기본 헤드
		$hmenu[$i]['sub'][$j]['href'] = $demo_href.urlencode($pvpv).'&amp;pvbh='.urlencode('basic-black');
		$hmenu[$i]['sub'][$j]['is_sub'] = true;
		for($k=0; $k < count($dphead); $k++) {
			$pvph = $dphead[$k][0];
			$demo_sub_on1 = ($demo_sub_on && $pvbh == $pvph) ? 'on' : 'off';
			$hmenu[$i]['sub'][$j]['sub'][$k]['line'] = $dphead[$k][2];
			$hmenu[$i]['sub'][$j]['sub'][$k]['sp'] = $dphead[$k][3];
			$hmenu[$i]['sub'][$j]['sub'][$k]['on'] = $demo_sub_on1;
			$hmenu[$i]['sub'][$j]['sub'][$k]['href'] = $hmenu[$i]['sub'][$j]['href'].'&amp;pvbh='.urlencode($pvph);
			$hmenu[$i]['sub'][$j]['sub'][$k]['name'] = $dphead[$k][1];
			$hmenu[$i]['sub'][$j]['sub'][$k]['new'] = 'old';
		}
	} else {
		$hmenu[$i]['sub'][$j]['is_sub'] = false;
	}
}
unset($dpmenu);


// 뒷메뉴 초기배열값
$t = (count($tmenu) > 0) ? $t + 1 : 0;

$msp = 'thema';
$demo_href = G5_URL.'/?pv=';
$tmenu[$t]['on'] = 'off';
$tmenu[$t]['new'] = 'old';
$tmenu[$t]['href'] = $demo_href.urlencode('Basic');
$tmenu[$t]['name'] = '테마 더보기';
$tmenu[$t]['is_sub'] = true;

$dpmenu = array();
$dpmenu[] = array('Basic', '아미나 베이직 테마', '', 0);
$dpmenu[] = array('Miso-Basic', '미소 베이직 테마', '', 0);
for($j=0; $j < count($dpmenu); $j++) {
	$tmenu[$t]['sub'][$j]['line'] = $dpmenu[$j][2];
	$tmenu[$t]['sub'][$j]['sp'] = $dpmenu[$j][3];
	$tmenu[$t]['sub'][$j]['on'] = (THEMA == $dpmenu[$j][0]) ? 'on' : 'off';
	$tmenu[$t]['sub'][$j]['href'] = $demo_href.urlencode($dpmenu[$j][0]);
	$tmenu[$t]['sub'][$j]['name'] = $dpmenu[$j][1];
	$tmenu[$t]['sub'][$j]['new'] = 'old';
	$tmenu[$t]['sub'][$j]['is_sub'] = false;
}

$t = (count($tmenu) > 0) ? $t + 1 : 0;

?>