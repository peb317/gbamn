<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 스킨 불러오기
if(isset($header_skin) && $header_skin && is_file(G5_SKIN_PATH.'/header/'.$header_skin.'/header.skin.php')) {
	$header_skin_path = G5_SKIN_PATH.'/header/'.$header_skin;
	$header_skin_url = G5_SKIN_PATH.'/header/'.$header_skin;
	include_once($header_skin_path.'/header.skin.php');
}

?>