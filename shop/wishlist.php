<?php
include_once('./_common.php');

if (!$is_member)
    goto_url(G5_BBS_URL."/login.php?url=".urlencode(G5_SHOP_URL.'/wishlist.php'));

if(USE_G5_THEME && defined('G5_THEME_PATH')) {
    require_once(G5_SHOP_PATH.'/yc/wishlist.php');
    return;
}

$list = array();
$sql  = " select a.wi_id, a.wi_time, b.* from {$g5['g5_shop_wish_table']} a left join {$g5['g5_shop_item_table']} b on ( a.it_id = b.it_id ) ";
$sql .= " where a.mb_id = '{$member['mb_id']}' order by a.wi_id desc ";
$result = sql_query($sql);
for ($i=0; $row = sql_fetch_array($result); $i++) {

	$list[$i] = $row;

	$list[$i]['out_cd'] = '';
	$sql = " select count(*) as cnt from {$g5['g5_shop_item_option_table']} where it_id = '{$row['it_id']}' and io_type = '0' ";
	$tmp = sql_fetch($sql);
	if($tmp['cnt'])
		$list[$i]['out_cd'] = 'no';

	$list[$i]['price'] = get_price($row);

	if ($row['it_tel_inq']) $list[$i]['out_cd'] = 'tel';

	$list[$i]['is_soldout'] = is_soldout($row['it_id']);
}

// Page ID
$pid = ($pid) ? $pid : 'wishlist';
$at = apms_page_thema($pid);
if(!defined('THEMA_PATH')) {
	include_once(G5_LIB_PATH.'/apms.thema.lib.php');
}

$g5['title'] = "위시리스트";
include_once('./_head.php');

$skin_path = $member_skin_path;
$skin_url = $member_skin_url;

include_once($skin_path.'/wishlist.skin.php');
include_once('./_tail.php');

?>
