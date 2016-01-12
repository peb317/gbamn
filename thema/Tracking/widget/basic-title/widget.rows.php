<?php
if (!defined('_GNUBOARD_')) exit; //개별 페이지 접근 불가

// 캡션
$caption = (isset($wset['caption']) && $wset['caption']) ? $wset['caption'] : '';
switch($caption) {
	case '1'	: $is_caption = ' owl-basic-caption'; break;
	case '2'	: $is_caption = ' owl-hover-caption'; break;
	case '3'	: $is_caption = ' owl-bar-caption'; break;
	case '4'	: $is_caption = ' owl-title-caption en'; break;
	default		: $is_caption = ''; break;
}

?>

<div class="img-wrap">
	<div class="img-item">
		<div class="owl-container<?php echo $is_caption; // 캡션 ?>">
			<div class="owl-carousel">
				<?php
				// 슬라이더
				$k=0;
				for ($i=1; $i <= $wset['slider']; $i++) {
					
					if(!$wset['use'.$i] || !$wset['img'.$i]) continue; // 사용하지 않으면 건너뜀

					// Lazy
					$img_src = ($is_lazy) ? 'data-src="'.$wset['img'.$i].'" class="lazyOwl"' : 'src="'.$wset['img'.$i].'"';

				?>
					<div class="item">
						<?php if($wset['link'.$i]) { ?>
							<a href="<?php echo $wset['link'.$i];?>">
						<?php } ?>
							<div class="img-wrap">
								<?php if($wset['label'.$i]) { // 라벨 ?>
									<div class="label-band bg-<?php echo $wset['label'.$i];?>"><?php echo apms_fa($wset['txt'.$i]); ?></div>
								<?php } ?>
								<div class="img-item">
									<img <?php echo $img_src;?>>
									<?php if($is_caption && $caption && $wset['caption'.$i]) { ?>
										<div class="owl-caption">
											<?php echo apms_fa($wset['caption'.$i]);?>
										</div>
									<?php } ?>
								</div>
							</div>
						<?php if($wset['link'.$i]) { ?>
							</a>
						<?php } ?>
					</div>
				<?php $k++; } ?>
				<?php if(!$k) { // 없으면 초기 이미지 출력 
					for($i=1; $i <= 2; $i++) {	
						$img = $widget_url.'/img/title.jpg';
						$img_src = ($is_lazy) ? 'data-src="'.$img.'" class="lazyOwl"' : 'src="'.$img.'"';

				?>
					<div class="item">
						<div class="img-wrap">
							<div class="img-item">
								<img <?php echo $img_src;?>>
								<?php if($is_caption && $caption) { ?>
									<div class="owl-caption">
										위젯설정에서 슬라이더를 등록해 주세요.
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				<?php } } ?>
			</div>
		</div>
	</div>
</div>
