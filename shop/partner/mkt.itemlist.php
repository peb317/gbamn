<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_PLUGIN_PATH.'/jquery-ui/datepicker.php');

$list = array();

$fr_date = ($fr_date) ? $fr_date : date("Ym01", G5_SERVER_TIME);
$to_date = ($to_date) ? $to_date : date("Ymd", G5_SERVER_TIME);

$fr_day = preg_replace("/([0-9]{4})([0-9]{2})([0-9]{2})/", "\\1-\\2-\\3", $fr_date);
$to_day = preg_replace("/([0-9]{4})([0-9]{2})([0-9]{2})/", "\\1-\\2-\\3", $to_date);

// 분류
$category = array();
$category_options  = '';
$sql = " select * from {$g5['g5_shop_category_table']} ";
$sql .= " order by ca_order, ca_id ";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) {
	$c = $row['ca_id'];
	$category[$c] = $row['ca_name'];

	$len = strlen($row['ca_id']) / 2 - 1;
    $nbsp = '';
    for ($i=0; $i<$len; $i++) {
        $nbsp .= '&nbsp;&nbsp;&nbsp;';
    }

	if($row['as_line']) {
		$category_options .= "<option value=\"\">".$nbsp."------------</option>\n";
	}

    $category_options .= '<option value="'.$row['ca_id'].'">'.$nbsp.$row['ca_name'].'</option>'.PHP_EOL;
}

$where = " and ";
$sql_search = "";
if ($stx != "") {
	$sql_search .= " $where b.it_name like '%$stx%' ";
    $where = " and ";
    if ($save_stx != $stx)
        $page = 1;
}

if ($sca != "") {
    $sql_search .= " $where (b.ca_id like '$sca%' or b.ca_id2 like '$sca%' or b.ca_id3 like '$sca%') ";
}

$sql_common = " from {$g5['g5_shop_cart_table']} a, {$g5['g5_shop_item_table']} b where a.it_id = b.it_id and a.mk_id = '{$member['mb_id']}' and a.ct_status = '완료' and a.ct_select = '1' and SUBSTRING(a.pt_datetime,1,10) between '$fr_day' and '$to_day' ";
$sql_common .= $sql_search;

// 테이블의 전체 레코드수만 얻음
$sql = " select count(*) as cnt " . $sql_common;
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_'.MOBILE_.'page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql  = " select *, SUBSTRING(a.pt_datetime,1,16) as date $sql_common order by a.pt_datetime desc, a.ct_id desc limit $from_record, $rows ";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) {
	$list[$i] = $row;
	$list[$i]['num'] = $total_count - ($page - 1) * $rows - $i;
	$list[$i]['href'] = G5_SHOP_URL.'/item.php?it_id='.$row['it_id'];
	$list[$i]['sale'] = $row['ct_price'] * $row['ct_qty'];
	if($row['ct_notax']) {
		$net = $list[$i]['sale'];
	} else {
		list($net) = apms_vat($list[$i]['sale']);
	}
	$list[$i]['net'] = $net;
	$list[$i]['qty'] = $row['ct_qty'];

	$list[$i]['profit'] = $row['mk_profit'];
	$list[$i]['benefit'] = $row['mk_benefit'];
	$list[$i]['total'] = $row['mk_profit'] + $row['mk_benefit'];
	$list[$i]['rate'] = ($list[$i]['net'] > 0) ? round(($list[$i]['total'] / $list[$i]['net']) * 1000) / 10 : 0;;

	$list[$i]['options'] = print_item_options($row['it_id'], $row['od_id'], $row['pt_msg1'], $row['pt_msg2'], $row['pt_msg3']);

	//구매회원
	$list[$i]['buyer'] = '비회원';
	if($row['mb_id']) {
		$mb = get_member($row['mb_id'], 'mb_nick, mb_email, mb_homepage');
		if($mb['mb_nick']) {
			$list[$i]['buyer'] = apms_sideview($row['mb_id'], $mb['mb_nick'], $mb['mb_email'], $mb['wr_homepage']);
		}
	}
}

// 페이징
$write_pages = (G5_IS_MOBILE) ? $config['cf_mobile_pages'] : $config['cf_write_pages'];
$list_page = './?ap='.$ap.'&amp;fr_date='.$fr_date.'&amp;to_date='.$to_date.'&amp;sca='.$sca.'&amp;save_stx='.$stx.'&amp;stx='.$stx.'&amp;page=';

include_once($skin_path.'/mkt.itemlist.skin.php');

?>
