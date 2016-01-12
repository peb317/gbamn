<?php
if (!defined('_GNUBOARD_')) exit;

if($mode == "mlist") {

	if($_POST['act_button'] == "선택수정") {

		if (!count($_POST['chk'])) {
			alert($_POST['act_button']." 하실 항목을 하나 이상 체크하세요.");
		}
		
		for ($i=0; $i<count($_POST['chk']); $i++) {
			$k = $_POST['chk'][$i]; // 실제 번호를 넘김
			sql_query(" update {$g5['apms_partner']} set pt_level = '{$_POST['pt_level'][$k]}', pt_benefit = '{$_POST['pt_benefit'][$k]}' where pt_id = '{$_POST['pt_id'][$k]}' ");

		}
	}

	goto_url($go_url.'&amp;'.$qstr.'&amp;fr_date='.urlencode($fr_date).'&amp;to_date='.urlencode($to_date));
}


include_once(G5_PLUGIN_PATH.'/jquery-ui/datepicker.php');

$fr_date = (isset($fr_date) && $fr_date) ? $fr_date : date("Ym01", G5_SERVER_TIME);
$to_date = (isset($to_date) && $to_date) ? $to_date : date("Ymd", G5_SERVER_TIME);

$fr_sql = preg_replace("/([0-9]{4})([0-9]{2})([0-9]{2})/", "\\1-\\2-\\3", $fr_date);
$to_sql = preg_replace("/([0-9]{4})([0-9]{2})([0-9]{2})/", "\\1-\\2-\\3", $to_date);

$sql_common = " from {$g5['g5_shop_cart_table']} where mk_id <> '' and ct_status = '완료' and ct_select = '1' and SUBSTRING(pt_datetime,1,10) between '$fr_sql' and '$to_sql' group by mk_id ";

// 전체수
$result1 = sql_query(" select count(*) as cnt $sql_common ");
$total_count = @sql_num_rows($result1);

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql = " select mk_id, count(*) as cnt, sum(ct_price * ct_qty) as sale, sum(mk_profit) as profit, sum(mk_benefit) as benefit, sum(mk_profit + mk_benefit) as revenue {$sql_common} order by revenue desc limit {$from_record}, {$rows} ";
$result = sql_query($sql);

?>
<style>
	.tbl_head02 td { text-align:center; }
	.pt-request { color:orangered; }
</style>
<div class="local_ov01 local_ov">
    총 <?php echo number_format($total_count) ?>명의 추천인(마케터)가 수익이 발생했습니다.
</div>


<form name="frm_sale_date" class="local_sch01 local_sch" action="./apms.admin.php" method="post">
<input type="hidden" name="ap" value="mlist">
<input type="text" name="fr_date" value="<?php echo $fr_date; ?>" id="fr_date" required class="required frm_input" size="8" maxlength="8">
<label for="fr_date">일 ~</label>
<input type="text" name="to_date" value="<?php echo $to_date; ?>" id="to_date" required class="required frm_input" size="8" maxlength="8">
<label for="to_date">일</label>
<input type="submit" value="확인" class="btn_submit">
</form>

<form name="fmarketerlist" id="fmarketerlist" action="./apms.admin.php" onsubmit="return fmarketerlist_submit(this);" method="post">
<input type="hidden" name="ap" value="mlist">
<input type="hidden" name="mode" value="mlist">
<input type="hidden" name="fr_date" value="<?php echo $fr_date ?>">
<input type="hidden" name="to_date" value="<?php echo $to_date ?>">
<input type="hidden" name="page" value="<?php echo $page ?>">

<div class="tbl_head02 tbl_wrap">
    <table>
    <thead>
    <tr>
        <th scope="col">
            <label for="chkall" class="sound_only">회원 전체</label>
            <input type="checkbox" name="chkall" value="1" id="chkall" onclick="check_all(this.form)">
        </th>
        <th scope="col">순위</th>
        <th scope="col">레벨</th>
        <th scope="col">인센티브</th>
		<th scope="col">추천인(마케터)</th>
        <th scope="col">파트너유형</th>
		<th scope="col">판매금액(vat포함)</th>
		<th scope="col">판매건수</th>
		<th scope="col">기본수익(상품별 적립율)</th>
		<th scope="col">추가수익(레벨 + 인센티브)</th>
		<th scope="col">수익합계(기본수익 + 추가수익)</th>
		<th scope="col">수익율</th>
	</tr>
    </thead>
    <tbody>
    <?php
    for ($i=0; $row=sql_fetch_array($result); $i++) {

		$mb = get_member($row['mk_id'], 'mb_nick, mb_email, mb_homepage, as_level');
		$mk = apms_partner($row['mk_id'], 'pt_type, pt_level, pt_benefit');

		$rank = $i + (($page - 1) * $rows) + 1;

		$type = ($mk['pt_type'] == "2") ? '개인' : '기업';

		$name = apms_sideview($row['mk_id'], get_text($mb['mb_nick']), $mb['mb_email'], $mb['mb_homepage'], $mb['as_level'], 'yes');

		$rate = ($row['revenue'] > 0) ? round(($row['revenue'] / $row['sale']) * 1000) / 10 : 0;;

    ?>
    <tr>
        <td headers="mb_list_chk" class="td_chk">
            <input type="hidden" name="pt_id[<?php echo $i ?>]" value="<?php echo $row['mk_id'] ?>" id="pt_id_<?php echo $i ?>">
            <input type="checkbox" name="chk[]" value="<?php echo $i ?>" id="chk_<?php echo $i ?>">
        </td>
        <td><?php echo $rank;?></td>
		<td>
			<?php echo get_member_level_select("pt_level[$i]", 1, 10, $mk['pt_level']); ?>
		</td>
		<td>
			<input type="text" name="pt_benefit[<?php echo $i;?>]" value="<?php echo $mk['pt_benefit'] ?>" class="frm_input" size="4"> %
		</td>
		<td><b><?php echo $name;?></b></td>
		<td><?php echo $type;?></td>
		<td><?php echo number_format($row['sale']);?>원</td>
		<td><?php echo number_format($row['cnt']);?>건</td>
		<td><?php echo number_format($row['profit']);?>원</td>
		<td><?php echo number_format($row['benefit']);?>원</td>
		<td><b><?php echo number_format($row['revenue']);?>원</b></td>
		<td><?php echo $rate;?>%</td>
    </tr>
	<?php
    }
    if ($i == 0)
        echo "<tr><td colspan=\"12\" class=\"empty_table\">자료가 없습니다.</td></tr>";
    ?>
    </tbody>
    </table>
</div>

<div class="btn_list01 btn_list">
    <input type="submit" name="act_button" value="선택수정" onclick="document.pressed=this.value">
</div>

</form>

<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, '?'.$qstr.'&amp;ap=mlist&amp;fr_date='.urlencode($fr_date).'amp;to_date='.urlencode($to_date).'&amp;page='); ?>

<script>
function fmarketerlist_submit(f)
{
	if (!is_checked("chk[]")) {
		alert(document.pressed+" 하실 항목을 하나 이상 선택하세요.");
		return false;
	}

    return true;
}
$(function() {
    $("#fr_date, #to_date").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yymmdd",
        showButtonPanel: true,
        yearRange: "c-99:c+99",
        maxDate: "+0d"
    });
});
</script>
