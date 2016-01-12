<?php
include_once('./_common.php');

if($is_guest) {
	alert_close('회원만 이용하실 수 있습니다.');
}

include_once(G5_LIB_PATH.'/thumbnail.lib.php');
// 설정 저장-------------------------------------------------------
if ($mode == "u") apms_photo_upload($member['mb_id'], $del_mb_icon2, $_FILES); //Save
//--------------------------------------------------------------------

// Page ID
$pid = ($pid) ? $pid : '';
$at = apms_page_thema($pid);
if(!defined('THEMA_PATH')) {
	include_once(G5_LIB_PATH.'/apms.thema.lib.php');
}

$mb_dir = substr($member['mb_id'],0,2);

$is_photo = (is_file(G5_DATA_PATH.'/apms/photo/'.$mb_dir.'/'.$member['mb_id'].'.jpg')) ? true : false;

$photo_size = $xp['xp_photo'];

$myphoto = apms_photo_url($member['mb_id']);

$g5['title'] = '내사진 등록/수정';
include_once(G5_PATH.'/head.sub.php');
if(!USE_G5_THEME) @include_once(THEMA_PATH.'/head.sub.php');

$skin_path = $member_skin_path;
$skin_url = $member_skin_url;

// 스킨설정
$wset = (G5_IS_MOBILE) ? apms_skin_set('member_mobile') : apms_skin_set('member');

$setup_href = '';
if(is_file($skin_path.'/setup.skin.php') && ($is_demo || $is_admin == 'super')) {
	$setup_href = './skin.setup.php?skin=member';
}

include_once($skin_path.'/myphoto.skin.php');

if(!USE_G5_THEME) @include_once(THEMA_PATH.'/tail.sub.php');
include_once(G5_PATH.'/tail.sub.php');
?>