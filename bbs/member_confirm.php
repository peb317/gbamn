<?php
include_once('./_common.php');

if ($is_guest)
    alert('로그인 한 회원만 접근하실 수 있습니다.', G5_BBS_URL.'/login.php');

/*
if ($url)
    $urlencode = urlencode($url);
else
    $urlencode = urlencode($_SERVER[REQUEST_URI]);
*/

// Page ID
$pid = 'confirm';
$at = apms_page_thema($pid);
if(!defined('THEMA_PATH')) {
	include_once(G5_LIB_PATH.'/apms.thema.lib.php');
}

$g5['title'] = '회원 비밀번호 확인';
include_once('./_head.php');

$skin_path = $member_skin_path;
$skin_url = $member_skin_url;

$url = clean_xss_tags($_GET['url']);

// url 체크
check_url_host($url);

include_once($skin_path.'/member_confirm.skin.php');

include_once('./_tail.php');
?>
