<?php
include_once('./_common.php');
include_once(G5_CAPTCHA_PATH.'/captcha.lib.php');

$mb_id = substr(clean_xss_tags($_GET['mb_id']), 0, 20);
$sql = " select mb_email, mb_datetime, mb_email_certify from {$g5['member_table']} where mb_id = '{$mb_id}' ";
$mb = sql_fetch($sql);
if (substr($mb['mb_email_certify'],0,1)!=0) {
    alert("이미 메일인증 하신 회원입니다.", G5_URL);
}

// Page ID
$pid = ($pid) ? $pid : 'regmail';
$at = apms_page_thema($pid);
if(!defined('THEMA_PATH')) {
	include_once(G5_LIB_PATH.'/apms.thema.lib.php');
}

$g5['title'] = '메일인증 메일주소 변경';
include_once('./_head.php');

$skin_path = $member_skin_path;
$skin_url = $member_skin_url;

$action_url = G5_HTTPS_BBS_URL.'/register_email_update.php';
include_once($skin_path.'/register_email.skin.php');

include_once('./_tail.php');
?>
