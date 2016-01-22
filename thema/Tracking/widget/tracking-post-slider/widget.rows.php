<?php
if (!defined('_GNUBOARD_')) exit; //개별 페이지 접근 불가

// 추출하기
$wset['image'] = 1; //이미지글만 추출
$list = apms_board_rows($wset);
$list_cnt = count($list);

$rank = apms_rank_offset($wset['rows'], $wset['page']);

// 링크 열기
$wset['modal'] = (isset($wset['modal'])) ? $wset['modal'] : '';
$is_modal_js = $is_link_target = '';
if($wset['modal'] == "1") { //모달
	$is_modal_js = apms_script('modal');
} else if($wset['modal'] == "2") { //링크#1
	$is_link_target = ' target="_blank"';
}

// 날짜
$is_date = (isset($wset['date']) && $wset['date']) ? true : false;
$is_dtype = (isset($wset['dtype']) && $wset['dtype']) ? $wset['dtype'] : 'm.d';
$is_dtxt = (isset($wset['dtxt']) && $wset['dtxt']) ? true : false;

// 새글
$is_new = (isset($wset['new']) && $wset['new']) ? $wset['new'] : 'red'; 

// 글내용 - 줄이 1줄보다 크고
$is_cont = ($wset['line'] > 1 && isset($wset['cont']) && $wset['cont']) ? false : true; 

// 동영상아이콘
$is_vicon = (isset($wset['vicon']) && $wset['vicon']) ? '' : '<i class="fa fa-play-circle-o post-vicon"></i>'; 

// 스타일
$is_center = (isset($wset['center']) && $wset['center']) ? ' text-center' : ''; 
$is_bold = (isset($wset['bold']) && $wset['bold']) ? true : false; 

// 그림자
$shadow_in = '';
$shadow_out = (isset($wset['shadow']) && $wset['shadow']) ? apms_shadow($wset['shadow']) : '';
if($shadow_out && isset($wset['inshadow']) && $wset['inshadow']) {
	$shadow_in = '<div class="in-shadow">'.$shadow_out.'</div>';
	$shadow_out = '';	
}

// owl-hide : 모양유지용 프레임
?>
<div class="owl-show">
	<div class="owl-container">
		<div class="owl-carousel">
		<?php 
		for ($i=0; $i < $list_cnt; $i++) { 

			//라벨 체크
			$wr_label = '';
			$is_lock = false;
			if ($list[$i]['secret'] || $list[$i]['is_lock']) {
				$is_lock = true;
				$wr_label = '<div class="label-cap bg-orange">Lock</div>';	
			} else if ($wset['rank']) {
				$wr_label = '<div class="label-cap bg-'.$wset['rank'].'">Top'.$rank.'</div>';
				$rank++;
			} else if ($list[$i]['new']) {
				$wr_label = '<div class="label-cap bg-'.$is_new.'">New</div>';	
			}

			// 링크이동
			$target = '';
			if($is_link_target && $list[$i]['wr_link1']) {
				$target = $is_link_target;
				$list[$i]['href'] = $list[$i]['link_href'][1];
			}

			//볼드체
			if($is_bold) {
				$list[$i]['subject'] = '<b>'.$list[$i]['subject'].'</b>';
			}

			// Lazy
			$img_src = ($is_lazy) ? 'data-src="'.$list[$i]['img']['src'].'" class="lazyOwl"' : 'src="'.$list[$i]['img']['src'].'"';

		?>
			<div class="item">
				<div class="post-image">
					<a href="<?php echo $list[$i]['href'];?>"<?php echo $is_modal_js;?><?php echo $target;?>>
						<div class="img-wrap">
							<?php echo $shadow_in;?>
							<?php echo $wr_label;?>
							<?php if($list[$i]['as_list'] == "2" || $list[$i]['as_list'] == "3") echo $is_vicon;?>
							<div class="img-item">
								<img <?php echo $img_src;?> alt="<?php echo $list[$i]['img']['alt'];?>">
							</div>
						</div>
					</a>
					<?php echo $shadow_out;?>
				</div>
				<div class="post-content<?php echo $is_center;?>">
					<div class="post-subject">
						<a href="<?php echo $list[$i]['href'];?>"<?php echo $is_modal_js;?><?php echo $target;?>>
							<?php echo $wr_icon;?>
							<?php echo $list[$i]['subject'];?>
							<?php if($is_cont) { ?>
								<div class="post-text">
									<?php echo apms_cut_text($list[$i]['content'], 80);?>
								</div>
							<?php } ?>
						</a>
					</div>
					<div class="post-text post-ko txt-short ellipsis<?php echo $is_center;?>">
						<?php echo $list[$i]['name'];?>
						<?php if($is_cate && $list[$i]['ca_name']) { ?>
							<span class="post-sp">|</span>
							<?php echo $list[$i]['ca_name'];?>
						<?php } ?>
						<?php if($is_date) { ?>
							<span class="post-sp">|</span>
							<span class="txt-normal">
								<?php echo ($is_dtxt) ? apms_datetime($list[$i]['date'], $is_dtype) : date($is_dtype, $list[$i]['date']); ?>
							</span>
						<?php } ?>
						<?php if ($list[$i]['comment']) { ?>
							<span class="count orangered">+<?php echo $list[$i]['comment']; ?></span>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
</div>
<?php if($list_cnt) { ?>
	<div class="owl-hide">
		<div class="item">
			<div class="post-image">
				<div class="img-wrap">
					<div class="img-item">&nbsp;</div>
				</div>
				<?php echo $shadow_out;?>
			</div>
			<div class="post-content<?php echo $is_center;?>">
				<div class="post-subject">&nbsp;</div>
				<div class="post-text post-ko txt-short ellipsis">&nbsp;</div>
			</div>
		</div>
	</div>
<?php } else { ?>
	<div class="post-none">
		등록된 글이 없습니다.
	</div>
<?php } ?>