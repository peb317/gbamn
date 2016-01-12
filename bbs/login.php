<?php
include_once('./_common.php');

// Page ID
$pid = ($pid) ? $pid : 'login';
$at = apms_page_thema($pid);
if(!defined('THEMA_PATH')) {
	include_once(G5_LIB_PATH.'/apms.thema.lib.php');
}

$g5['title'] = '로그인';
include_once('./_head.php');

$skin_path = $member_skin_path;
$skin_url = $member_skin_url;

$url = $_GET['url'];

// url 체크
check_url_host($url);

// 이미 로그인 중이라면
if ($is_member) {
    if ($url)
        goto_url($url);
    else
        goto_url(G5_URL);
}

$login_url        = login_url($url);
$login_action_url = G5_HTTPS_BBS_URL."/login_check.php";

// 스킨설정
$wset = (G5_IS_MOBILE) ? apms_skin_set('member_mobile') : apms_skin_set('member');

$setup_href = '';
if(is_file($skin_path.'/setup.skin.php') && ($is_demo || $is_admin == 'super')) {
	$setup_href = './skin.setup.php?skin=member';
}

// 로그인 스킨이 없는 경우 관리자 페이지 접속이 안되는 것을 막기 위하여 기본 스킨으로 대체
$login_file = $skin_path.'/login.skin.php';
if (!is_file($login_file))
    $skin_path   = G5_SKIN_PATH.'/member/basic';

include_once($skin_path.'/login.skin.php');

include_once('./_tail.php');
?>
