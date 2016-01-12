<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>

<h1><i class="fa fa-cube"></i> Profit Item Inbox</h1>

<div class="well" style="padding-bottom:3px;">
	<form class="form" role="form" name="flist">
	<input type="hidden" name="ap" value="<?php echo $ap;?>">
	<input type="hidden" name="page" value="<?php echo $page; ?>">
	<input type="hidden" name="save_stx" value="<?php echo $stx; ?>">
		<div class="row">
			<div class="col-sm-3">
				<div class="form-group">
					<label for="sca" class="sound_only">분류선택</label>
					<select name="sca" id="sca" class="form-control input-sm">
						<option value="">카테고리</option>
						<?php echo $category_options;?>
					</select>
				    <script>document.getElementById("sca").value = "<?php echo $sca; ?>";</script>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<div class="form-group">
					    <label for="stx" class="sound_only">검색어</label>
					    <input type="text" name="stx" value="<?php echo $stx ?>" id="stx" class="form-control input-sm" placeholder="제목 검색어">
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-sm btn-block"><i class="fa fa-search"></i> 보기</button>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<a href="./?ap=<?php echo $ap;?>" class="btn btn-danger btn-sm btn-block"><i class="fa fa-refresh"></i> 초기화</a>
				</div>
			</div>
		</div>
	</form>
</div>

<h3>
	<i class="fa fa-cubes"></i> <?php echo number_format($total_count); ?> Items
</h3>

<div class="table-responsive">
	<table class="table tbl bg-white">
	<tbody>
	<tr class="bg-black">
		<th width="60" class="text-center" scope="col">번호</a></th>
		<th width="60" class="text-center" scope="col"><?php echo subject_sort_link('it_use', 'ap='.$ap.'&amp;sca='.$sca); ?>판매</a></th>
		<th width="60" class="text-center" scope="col"><?php echo subject_sort_link('it_soldout', 'ap='.$ap.'&amp;sca='.$sca); ?>품절</a></th>
		<th width="120" class="text-right" scope="col"><?php echo subject_sort_link('it_price', 'ap='.$ap.'&amp;sca='.$sca); ?>판매가격</a></th>
		<th width="100" class="text-right" scope="col"><?php echo subject_sort_link('it_point', 'ap='.$ap.'&amp;sca='.$sca); ?>포인트</a></th>
		<th width="100" class="text-right" scope="col"><?php echo subject_sort_link('pt_marketer', 'ap='.$ap.'&amp;sca='.$sca); ?>적립(수익)율</a></th>
		<th width="60" class="text-center" scope="col">이미지</th>
		<th class="text-center" scope="col"><?php echo subject_sort_link('it_name', 'ap='.$ap.'&amp;sca='.$sca); ?>제목</a></th>
	</tr>
	<?php for ($i=0; $i < count($list); $i++) { 
		$list[$i]['img'] = apms_it_thumbnail(apms_it($list[$i]['it_id']), 40, 40, false, true);
	?>
	<tr>
		<td class="text-center">
			<?php echo $list[$i]['num'];?>
		</td>
		<td class="text-center">
			<?php echo ($list[$i]['it_use'] ? '판매' : '중단'); ?>
		</td>
		<td class="text-center">
			<?php echo ($list[$i]['it_soldout'] ? '품절' : '판매'); ?>
		</td>
		<td class="text-right">
			<?php echo number_format($list[$i]['it_price']); ?>
		</td>
		<td class="text-right">
			<?php echo ($list[$i]['it_point_type']) ? $list[$i]['it_point'].'%' : number_format($list[$i]['it_point']); ?>
		</td>
		<td class="text-right">
			<b><?php echo number_format($list[$i]['pt_marketer']);?></b>%
		</td>
		<td class="text-center">
			<a href="<?php echo $list[$i]['href']; ?>">
				<?php if($list[$i]['img']['src']) {?>
					<img src="<?php echo $list[$i]['img']['src'];?>" alt="<?php echo $list[$i]['img']['alt'];?>">
				<?php } else { ?>
					<i class="fa fa-camera img-fa"></i>
				<?php } ?>				
			</a>
		</td>
		<td>
			<a href="<?php echo $list[$i]['href']; ?>"><b><?php echo $list[$i]['it_name'];?></b></a>
			<div class="text-muted font-11" style="margin-top:4px;">
				<?php echo apms_pt_it($list[$i]['pt_it'],1);?>
				<?php echo ($list[$i]['ca_name1']) ? ' / '.$list[$i]['ca_name1'] : '';?>
				<?php echo ($list[$i]['ca_name2']) ? ' / '.$list[$i]['ca_name2'] : '';?>
				<?php echo ($list[$i]['ca_name3']) ? ' / '.$list[$i]['ca_name3'] : '';?>
			</div>
		</td>
	</tr>
	<?php } ?>
	<?php if ($i == 0) { ?>
		<tr><td colspan="9" class="text-center">등록된 자료가 없습니다.</td></tr>
	<?php } ?>
	</tbody>
	</table>
</div>

<div class="text-center">
	<ul class="pagination pagination-sm en">
		<?php echo apms_paging($write_pages, $page, $total_page, $list_page); ?>
	</ul>
</div>
