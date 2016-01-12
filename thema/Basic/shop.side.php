<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 

// 데모 및 관리자 미리보기
if($is_admin || $is_demo) {
	$at_set['sfile'] = ($pvs) ? $pvs : $at_set['sfile'];
}

$side_file = THEMA_PATH.'/side/'.$at_set['sfile'].'.php';

if(file_exists($side_file)) {
	include_once($side_file);
} else {
	echo '<div class="text-muted text-center" style="padding:100px 0px 300px;">Switcher에서 사이드를 선택해 주세요.</div>';
}

?>
