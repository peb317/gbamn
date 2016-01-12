<?php
include_once('./_common.php');

if(USE_G5_THEME && defined('G5_THEME_PATH')) {
    require_once(G5_SHOP_PATH.'/yc/itemuseform.php');
    return;
}

include_once(G5_EDITOR_LIB);

if (!$is_member) {
	if($move) {
	    alert("회원만 가능합니다.");
	} else {
	    alert_close("회원만 가능합니다.");
	}
}

$w     = trim($_REQUEST['w']);
$it_id = trim($_REQUEST['it_id']);
$is_id = trim($_REQUEST['is_id']);

// 상품정보체크
$sql = " select it_id, ca_id from {$g5['g5_shop_item_table']} where it_id = '$it_id' ";
$row = sql_fetch($sql);
if(!$row['it_id']) {
	if($move) {
		alert('자료가 존재하지 않습니다.');
	} else {
		alert_close('자료가 존재하지 않습니다.');
	}
}

$ca_id = ($ca_id) ? $ca_id : $row['ca_id'];

if ($w == "") {
    $is_score = 5;

	if($row['pt_review_use']) $default['de_item_use_write'] = ''; // 후기권한 재설정

	check_itemuse_write($it_id, $member['mb_id']); // 사용후기 작성 설정에 따른 체크

} else if ($w == "u") {
    $use = sql_fetch(" select * from {$g5['g5_shop_item_use_table']} where is_id = '$is_id' ");
    if (!$use) {
		if($move) {
	        alert("자료가 없습니다.");
		} else {
	        alert_close("자료가 없습니다.");
		}
    }

    $it_id    = $use['it_id'];
    $is_score = $use['is_score'];

    if (!$is_admin && $use['mb_id'] != $member['mb_id']) {
		if($move) {
			alert("자신의 글만 수정이 가능합니다.");	
		} else {
			alert_close("자신의 글만 수정이 가능합니다.");
		}
    }
}

// Page ID
$pid = ($pid) ? $pid : 'iuse';
$at = apms_page_thema($pid);
if(!defined('THEMA_PATH')) {
	include_once(G5_LIB_PATH.'/apms.thema.lib.php');
}

$skin_row = array();
$skin_row = apms_rows('use_'.MOBILE_.'rows, use_'.MOBILE_.'skin, use_'.MOBILE_.'set');
$skin_name = $skin_row['use_'.MOBILE_.'skin'];

// 스킨설정
$wset = array();
if($skin_row['use_'.MOBILE_.'set']) {
	$wset = apms_unpack($skin_row['use_'.MOBILE_.'set']);
}

// 데모
if($is_demo) {
	@include (THEMA_PATH.'/assets/demo.config.php');
}

$skin_path = G5_SKIN_PATH.'/apms/use/'.$skin_name;
$skin_url = G5_SKIN_URL.'/apms/use/'.$skin_name;

if($move) {
	include_once('./_head.php');
} else {
	include_once(G5_PATH.'/head.sub.php');
	@include_once(THEMA_PATH.'/head.sub.php');
}

$is_dhtml_editor = false;
// 모바일에서는 DHTML 에디터 사용불가
if ($config['cf_editor'] && (!is_mobile() || defined('G5_IS_MOBILE_DHTML_USE') && G5_IS_MOBILE_DHTML_USE)) {
    $is_dhtml_editor = true;
}
$editor_html = editor_html('is_content', get_text($use['is_content'], 0), $is_dhtml_editor);
$editor_js = '';
$editor_js .= get_editor_js('is_content', $is_dhtml_editor);
$editor_js .= chk_editor_js('is_content', $is_dhtml_editor);

include_once($skin_path.'/useform.skin.php');

if($move) {
	include_once('./_tail.php');
} else {
	@include_once(THEMA_PATH.'/tail.sub.php');
	include_once(G5_PATH.'/tail.sub.php');
}
?>