<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// input의 name을 wset[배열키] 형태로 등록
// 모바일 설정값은 동일 배열키에 배열변수만 wmset으로 지정 → wmset[배열키]

?>

<div class="tbl_head01 tbl_wrap">
	<table>
	<caption>위젯설정</caption>
	<colgroup>
		<col class="grid_2">
		<col>
	</colgroup>
	<thead>
	<tr>
		<th scope="col">구분</th>
		<th scope="col">설정</th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td align="center">썸네일</td>
		<td>
			<?php echo help('기본 400x225(16:9) - 미입력시 기본값 적용');?>
			<input type="text" name="wset[thumb_w]" value="<?php echo $wset['thumb_w']; ?>" class="frm_input" size="4">
			x
			<input type="text" name="wset[thumb_h]" value="<?php echo $wset['thumb_h']; ?>" class="frm_input" size="4">
			px 
			- 간격
			<input type="text" name="wset[gap]" value="<?php echo $wset['gap']; ?>" class="frm_input" size="4"> px (기본 15)
			&nbsp;
			<select name="wset[shadow]">
				<?php echo apms_shadow_options($wset['shadow']);?>
			</select>
			&nbsp;
			<label><input type="checkbox" name="wset[inshadow]" value="1"<?php echo get_checked('1', $wset['inshadow']); ?>> 내부그림자</label>
		</td>
	</tr>
	<tr>
		<td align="center">가로수</td>
		<td>
			<input type="text" name="wset[item]" value="<?php echo $wset['item']; ?>" class="frm_input" size="4"> 개
			(기본 1개, 반응형 기본 lg 1개, md 1개, sm 1개, xs 1개)
			<div class="h10"></div>
			<table>
			<thead>
			<tr>
				<th scope="col">구분</th>
				<th scope="col">lg(1199px~)</th>
				<th scope="col">md(991px~)</th>
				<th scope="col">sm(767px~)</th>
				<th scope="col">xs(480px~)</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td align="center">가로(개)</td>
				<td align="center">
					<input type="text" name="wset[lg]" value="<?php echo $wset['lg']; ?>" class="frm_input" size="4">
				</td>
				<td align="center">
					<input type="text" name="wset[md]" value="<?php echo $wset['md']; ?>" class="frm_input" size="4">
				</td>
				<td align="center">
					<input type="text" name="wset[sm]" value="<?php echo $wset['sm']; ?>" class="frm_input" size="4">
				</td>
				<td align="center">
					<input type="text" name="wset[xs]" value="<?php echo $wset['xs']; ?>" class="frm_input" size="4">
				</td>
			</tr>
			</tbody>
			</table>
		</td>
	</tr>
	<tr>
		<td align="center">자동실행</td>
		<td>
			<?php echo help('밀리초(ms)는 천분의 1초입니다. ex) 3초 = 3000ms');?>
			<input type="text" name="wset[auto]" value="<?php echo $wset['auto']; ?>" class="frm_input" size="4"> ms - PC 
			&nbsp;
			<input type="text" name="mwset[auto]" value="<?php echo $mwset['auto']; ?>" class="frm_input" size="4"> ms - 모바일 (기본 3000, 0 입력시 미실행) 

		</td>
	</tr>
	<tr>
		<td align="center">슬라이더</td>
		<td>
			<input type="text" name="wset[speed]" value="<?php echo $wset['speed']; ?>" class="frm_input" size="4"> ms 속도(기본 200)
			&nbsp;
			<label><input type="checkbox" name="wset[rdm]" value="1"<?php echo get_checked('1', $wset['rdm']); ?>> 랜덤</label>
			&nbsp;
			<label><input type="checkbox" name="wset[caption]" value="1"<?php echo get_checked('1', $wset['caption']); ?>> 캡션</label>
			&nbsp;
			<label><input type="checkbox" name="wset[dot]" value="1"<?php echo get_checked('1', $wset['dot']); ?>> 페이징</label>
			&nbsp;
			<label><input type="checkbox" name="wset[lazy]" value="1"<?php echo get_checked('1', $wset['lazy']); ?>> Lazy</label>
			&nbsp;
			<label><input type="checkbox" name="wset[nav]" value="1"<?php echo get_checked('1', $wset['nav']); ?>> 화살표</label>
		</td>
	</tr>
	<tr>
		<td align="center">추출배너</td>
		<td>
			<select name="wset[banner]">
				<option value=""<?php echo get_selected('', $wset['banner']); ?>>가로배너</option>
				<option value="1"<?php echo get_selected('1', $wset['banner']); ?>>세로배너</option>
			</select>
		</td>
	</tr>
	<tr>
		<td align="center">추출갯수</td>
		<td>
			<input type="text" name="wset[rows]" value="<?php echo $wset['rows']; ?>" class="frm_input" size="4"> 개 - PC
			&nbsp;
			<input type="text" name="wmset[rows]" value="<?php echo $wmset['rows']; ?>" class="frm_input" size="4"> 개 - 모바일
		</td>
	</tr>
	<tr>
		<td align="center">이벤트타입</td>
		<td>
			<?php include_once(G5_ADMIN_PATH.'/apms_admin/config/ev_type.php'); // 이벤트 타입 불러오기 ?>
            <select name="wset[type]">
				<?php for($i=0; $i < count($ev_type); $i++) { ?>
	                <option value="<?php echo $i;?>" <?php echo get_selected($i, $wset['type']); ?>><?php echo $ev_type[$i];?></option>
				<?php } ?>
            </select>
		</td>
	</tr>
	<tr>
		<td align="center">이벤트지정</td>
		<td>
			<?php echo help('이벤트아이디를 콤마(,)로 구분해서 복수 등록 가능, 미등록시 전체에서 추출');?>
			<input type="text" name="wset[ev_id]" value="<?php echo $wset['ev_id']; ?>" size="46" class="frm_input">
			&nbsp;
			<label><input type="checkbox" name="wset[except]" value="1"<?php echo get_checked('1', $wset['except']);?>> 제외하기</label>
		</td>
	</tr>
	<tr>
		<td align="center">정렬설정</td>
		<td>
			<select name="wset[sort]">
				<option value=""<?php echo get_selected('', $wset['sort']); ?>>최근순</option>
				<option value="asc"<?php echo get_selected('asc', $wset['sort']); ?>>등록순</option>
				<option value="rdm"<?php echo get_selected('rdm', $wset['sort']); ?>>무작위(랜덤)</option>
			</select>
		</td>
	</tr>
	<tr>
		<td align="center">캐시사용</td>
		<td>
			<input type="text" name="wset[cache]" value="<?php echo $wset['cache']; ?>" class="frm_input" size="4"> 초 간격으로 캐싱
		</td>
	</tr>
	</tbody>
	</table>
</div>