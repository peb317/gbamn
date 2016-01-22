<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// input의 name을 wset[배열키] 형태로 등록
// 모바일 설정값은 동일 배열키에 배열변수만 wmset으로 지정 → wmset[배열키]

if(!$wset['slider']) $wset['slider'] = 0;
?>

<div class="tbl_head01 tbl_wrap">
	<table>
	<caption>위젯설정</caption>
	<colgroup>
		<col class="grid_1">
		<col class="grid_2">
		<col>
	</colgroup>
	<thead>
	<tr>
		<th scope="col" colspan="2">구분</th>
		<th scope="col">설정</th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td align="center" rowspan="5">공통</td>
		<td align="center">스타일</td>
		<td>
			<?php echo help('IE는 버전에 따라 효과가 적용안될 수 있습니다.');?>
			<select name="wset[effect]">
				<option value=""<?php echo get_selected('', $wset['effect']);?>>Slide</option>
				<option value="fade"<?php echo get_selected('fade', $wset['effect']);?>>Fade</option>
				<option value="backSlide"<?php echo get_selected('backSlide', $wset['effect']);?>>backSlide</option>
				<option value="goDown"<?php echo get_selected('goDown', $wset['effect']);?>>goDown</option>
				<option value="fadeUp"<?php echo get_selected('fadeUp', $wset['effect']);?>>fadeUp</option>
			</select>
			효과
			&nbsp;	
			<select name="wset[caption]">
				<option value=""<?php echo get_selected('', $wset['caption']);?>>캡션없음</option>
				<option value="1"<?php echo get_selected('1', $wset['caption']);?>>기본캡션</option>
				<option value="2"<?php echo get_selected('2', $wset['caption']);?>>호버캡션</option>
				<option value="3"<?php echo get_selected('3', $wset['caption']);?>>미들캡션</option>
				<option value="4"<?php echo get_selected('4', $wset['caption']);?>>라지캡션</option>
			</select>
			&nbsp;	
			<label><input type="checkbox" name="wset[cache]" value="1"<?php echo get_checked('1', $wset['cache']); ?>> 캐시 사용</label>
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
			<label><input type="checkbox" name="wset[dot]" value="1"<?php echo get_checked('1', $wset['dot']); ?>> 페이징</label>
			&nbsp;
			<label><input type="checkbox" name="wset[lazy]" value="1"<?php echo get_checked('1', $wset['lazy']); ?>> Lazy</label>
			&nbsp;
			<label><input type="checkbox" name="wset[nav]" value="1"<?php echo get_checked('1', $wset['nav']); ?>> 화살표</label>
		</td>
	</tr>
	<tr>
		<td align="center">높이설정</td>
		<td>
			<?php echo help('반응구간별 너비대비 높이비율');?>
			<input type="text" name="wset[height]" value="<?php echo $wset['height']; ?>" class="frm_input" size="4"> %
			(기본 30%, 기본 lg 35%, md 40%, sm 45%, xs 50%)
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
				<td align="center">높이(%)</td>
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
		<td align="center"><b>출력갯수</b></td>
		<td>
			<input type="text" name="wset[slider]" value="<?php echo $wset['slider']; ?>" class="frm_input" size="4"> 개 - 입력후 저장하시면 슬라이더가 생성됩니다.
		</td>
	</tr>
	<?php for ($i=1; $i <= $wset['slider']; $i++) { //총 7개 ?>
		<tr>
			<td align="center" rowspan="5">#<?php echo $i;?></td>
			<td align="center" class="bg-light"><b>사용여부</b></td>
			<td class="bg-light">
				<label><input type="checkbox" name="wset[use<?php echo $i;?>]" value="1"<?php echo get_checked('1', $wset['use'.$i]); ?>> <b>출력하기</b></label>
			</td>
		</tr>
		<tr>
			<td align="center">이미지</td>
			<td>
				<input type="text" name="wset[img<?php echo $i;?>]" value="<?php echo ($wset['img'.$i]);?>" id="img<?php echo $i;?>" size="42" class="frm_input"> 
				<a href="<?php echo G5_BBS_URL;?>/widget.image.php?fid=img<?php echo $i;?>" class="btn_frmline win_scrap">이미지선택</a>
			</td>
		</tr>
		<tr>
			<td align="center">캡션</td>
			<td>
				<a href="<?php echo G5_BBS_URL;?>/ficon.php?fid=caption<?php echo $i;?>" class="btn_frmline win_scrap">아이콘 선택</a>
				&nbsp;
				<span class="gray">스타일에서 캡션스타일 설정시 출력. 미입력시 출력안됨</span>
				<div style="height:8px;"></div>
				<textarea id="caption<?php echo $i;?>" name="wset[caption<?php echo $i;?>]"><?php echo $wset['caption'.$i]; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center">링크</td>
			<td>
				<?php echo help('URL(http://...)을 입력해야 하며, 미입력시 링크가 걸리지 않습니다.');?>
				<input type="text" name="wset[link<?php echo $i;?>]" value="<?php echo $wset['link'.$i]; ?>" size="52" class="frm_input" placeholder="http://...">
			</td>
		</tr>
		<tr>
			<td align="center">라벨</td>
			<td>
				<select name="wset[label<?php echo $i;?>]">
					<option value=""<?php echo get_selected('', $wset['label'.$i]); ?>>사용안함</option>
					<?php echo apms_color_options($wset['label'.$i]); ?>
				</select>
				&nbsp;
				<a href="<?php echo G5_BBS_URL;?>/ficon.php?fid=txt<?php echo $i;?>" class="btn_frmline win_scrap">아이콘 선택</a>
				<div style="height:8px;"></div>
				<textarea id="txt<?php echo $i;?>" name="wset[txt<?php echo $i;?>]" placeholder="영어 3자 또는 아이콘 등 입력"><?php echo $wset['txt'.$i]; ?></textarea>
			</td>
		</tr>
	<?php } ?>
	</tbody>
	</table>
</div>