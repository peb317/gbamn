<?php
include_once('./_common.php');

// 로그인중인 경우 회원가입 할 수 없습니다.
if ($is_member) {
    goto_url(G5_URL);
}

// 세션을 지웁니다.
set_session("ss_mb_reg", "");

// Page ID
$pid = ($pid) ? $pid : 'reg';
$at = apms_page_thema($pid);
if(!defined('THEMA_PATH')) {
	include_once(G5_LIB_PATH.'/apms.thema.lib.php');
}

// 회원가입폼
$is_register = true;

$g5['title'] = '회원가입약관';
include_once('./_head.php');

// 약관 등
$provision = $privacy = '';

// 가입약관
$row = sql_fetch(" select co_id, as_file from {$g5['apms_page']} where html_id = 'provision' and as_html = '1' ", false);
if($row['co_id']) {
	$co = sql_fetch(" select * from {$g5['content_table']} where co_id = '{$row['co_id']}' ");
	if ($co['co_id'])
		$provision = conv_content($co['co_content'], $co['co_html'], $co['co_tag_filter_use']);

} else if($row['as_file'] && is_file(G5_PATH.'/page/'.$row['as_file'])) {
	$page_file = G5_PATH.'/page/'.$row['as_file'];
	$page_path = str_replace("/".basename($page_file), "", $page_file);
	$page_url = str_replace(G5_PATH, G5_URL, $page_path);
	ob_start();
	@include_once($page_file);
	$provision = ob_get_contents();
	ob_end_clean();
	$provision = str_replace("./", $page_url."/", $provision);
}

// 개인정보처리방침
$row = sql_fetch(" select co_id, as_file from {$g5['apms_page']} where html_id = 'privacy' and as_html = '1' ", false);
if($row['as_file'] && is_file(G5_PATH.'/page/'.$row['as_file'])) {
	$page_file = G5_PATH.'/page/'.$row['as_file'];
	$page_path = str_replace("/".basename($page_file), "", $page_file);
	$page_url = str_replace(G5_PATH, G5_URL, $page_path);
	ob_start();
	@include_once($page_file);
	$privacy = ob_get_contents();
	ob_end_clean();
	$privacy = str_replace("./", $page_url."/", $privacy);
}

$skin_path = $member_skin_path;
$skin_url = $member_skin_url;

// 스킨설정
$wset = (G5_IS_MOBILE) ? apms_skin_set('member_mobile') : apms_skin_set('member');

$setup_href = '';
if(is_file($skin_path.'/setup.skin.php') && ($is_demo || $is_admin == 'super')) {
	$setup_href = './skin.setup.php?skin=member';
}

$action_url = G5_BBS_URL.'/register_form.php';
include_once($skin_path.'/register.skin.php');

include_once('./_tail.php');
?>
