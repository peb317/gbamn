<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 

// 데모 및 관리자 미리보기
if($is_admin || $is_demo) {
	$at_set['mfile'] = ($pvm) ? $pvm : $at_set['mfile'];
}

$main_file = THEMA_PATH.'/main/'.$at_set['mfile'].'.php';

if(file_exists($main_file)) {
	include_once($main_file);
} else {
	echo '<div class="text-muted text-center" style="padding:300px 0px;">Switcher에서 메인을 선택해 주세요.</div>';
}

?>