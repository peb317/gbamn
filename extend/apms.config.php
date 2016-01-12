<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// APMS DEMO
$is_demo = false;

// 텍스트 레벨 표시 - img 태그 등 이용가능
define('XP_ICON_ADMIN', 'M'); // 관리자
define('XP_ICON_SPECIAL', 'S'); // 스페셜
define('XP_ICON_GUEST', 'G'); // 비회원
define('XP_ICON_LEVEL', ''); // 레벨앞 표시

//럭키포인트 최대값 - 0이면 럭키포인트 사용안함
define('APMS_LUCKY_POINT', 50); 

//럭키포인트 xx면체 주사위 - 주사위를 두번굴려 같은 값이 나오면 럭키포인트 적립
define('APMS_LUCKY_DICE', 10); 

//럭키포인트 표현문구 - [point]가 값으로 치환됨
define('APMS_LUCKY_TEXT', '<p class="en" style="margin-top:10px;"><i class="fa fa-gift"></i> Congratulation! You win the <b class="orangered">[point]</b> Lucky Point!</p>');

// 동영상, 구글지도 등 width 최대 크기 설정
define('APMS_SIZE', '800px');

// JWPlayer Key
define('APMS_JWPLAYER6_KEY', '');

// 페이스북 Access Tocken - 페북 동영상 썸네일 가져오기
// 페북 개발자센터(https://developers.facebook.com)에서 앱등록하고, Tools & Support > Graph API Explorer 메뉴에서 Get Token > Get App Token 실행해서 생성한 값을 입력
define('APMS_FACEBOOK_ACCESS_TOCKEN', '');

// 컨텐츠상품(배송불가) 서비스 타입 지정 - PT_IT Automation Order
$g5['apms_automation'] = array("2");

?>