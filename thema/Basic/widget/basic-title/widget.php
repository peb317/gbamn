<?php
if (!defined('_GNUBOARD_')) exit; //개별 페이지 접근 불가

// Owl Carousel
apms_script('owlcarousel');

$is_autoplay = (isset($wset['auto']) && ($wset['auto'] > 0 || $wset['auto'] == "0")) ? $wset['auto'] : 3000;
$is_speed = (isset($wset['speed']) && $wset['speed'] > 0) ? $wset['speed'] : 0;
if(G5_IS_MOBLE) {
	$is_lazy = false;
} else {
	$is_lazy = (isset($wset['lazy']) && $wset['lazy']) ? true : false;
}

// 반응형
$height = (isset($wset['height']) && $wset['height'] > 0) ? (int)$wset['height'] : 30;
$lg = (isset($wset['lg']) && $wset['lg'] > 0) ? (int)$wset['lg'] : 35;
$md = (isset($wset['md']) && $wset['md'] > 0) ? (int)$wset['md'] : 40;
$sm = (isset($wset['sm']) && $wset['sm'] > 0) ? (int)$wset['sm'] : 45;
$xs = (isset($wset['xs']) && $wset['xs'] > 0) ? (int)$wset['xs'] : 50;

// 랜덤아이디
$widget_id = apms_id(); 

?>
<style>
	#<?php echo $widget_id;?> .img-wrap { padding-bottom:<?php echo $height;?>%; }
	<?php if(_RESPONSIVE_) { //반응형일 때만 작동 ?>
		<?php if($lg) { ?>
		@media (max-width:1199px) { 
			.responsive #<?php echo $widget_id;?> .img-wrap { padding-bottom:<?php echo $lg;?>% !important; } 
		}
		<?php } ?>
		<?php if($md) { ?>
		@media (max-width:991px) { 
			.responsive #<?php echo $widget_id;?> .img-wrap { padding-bottom:<?php echo $md;?>% !important; } 
		}
		<?php } ?>
		<?php if($sm) { ?>
		@media (max-width:767px) { 
			.responsive #<?php echo $widget_id;?> .img-wrap { padding-bottom:<?php echo $sm;?>% !important; } 
		}
		<?php } ?>
		<?php if($xs) { ?>
		@media (max-width:480px) { 
			.responsive #<?php echo $widget_id;?> .img-wrap { padding-bottom:<?php echo $xs;?>% !important; } 
		}
		<?php } ?>
	<?php } ?>
</style>
<div id="<?php echo $widget_id;?>">
	<?php 
		if(isset($wset['cache']) && $wset['cache']) { // 캐시적용시
			$wset['cache'] = 2592000; //30일
			echo apms_widget_cache($widget_path.'/widget.rows.php', $wname, $wid, $wset);
		} else {
			include($widget_path.'/widget.rows.php');
		}
	?>
</div>
<?php if($setup_href) { ?>
	<div class="btn-wset text-center p10">
		<a href="<?php echo $setup_href;?>" class="win_memo">
			<span class="text-muted font-12"><i class="fa fa-cog"></i> 위젯설정</span>
		</a>
	</div>
<?php } ?>
<script>
$(document).ready(function(){
	$('#<?php echo $widget_id;?> .owl-carousel').owlCarousel({
		singleItem:true,
		<?php if(isset($wset['rdm']) && $wset['rdm']) { ?> 
		beforeInit : function(elem){
			owl_random(elem);
		},
		<?php } ?>
		<?php if(isset($wset['effect']) && $wset['effect']) { ?> 
		transitionStyle:"<?php echo $wset['effect'];?>",
		<?php } ?>
		<?php if($is_autoplay > 0) { ?>
			autoPlay:<?php echo $is_autoplay; ?>,
		<?php } ?>
		<?php if($is_speed) { ?>
			slideSpeed:<?php echo $is_speed; ?>,
		<?php } ?>
		<?php if($is_lazy) { ?>
			lazyLoad : true,
		<?php } ?>
		pagination:<?php echo (isset($wset['dot']) && $wset['dot']) ? 'true' : 'false';?>,
		<?php if(isset($wset['nav']) && $wset['nav']) { ?> 
		navigationText:['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
		navigation:true,
		<?php } else { ?>
		navigation:false,
		<?php } ?>
		loop:true
	});
});
</script>
