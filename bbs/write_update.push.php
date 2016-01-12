<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// Push - 최고관리자, 그룹관리자, 보드관리자 -----------------------
	$mb_list = $config['cf_admin'].','.$config['as_admin'].','.$group['gr_admin'].','.$board['bo_admin'];
	$psubj = '[새글]'.$wr_subject;
	$pcont = $wr_name.'님이 새글을 등록하셨습니다.';
	$purl = G5_BBS_URL.'/board.php?bo_table='.$bo_table.'&wr_id='.$wr_id;

	apms_push($mb_list, $psubj, $pcont, $purl);
// ------------------------------------------------------------------

?>