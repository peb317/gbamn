<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 

// PC 전체메뉴와 모바일 메뉴에서 공용으로 사용합니다.
// PC 메뉴는 테마 내 head.php 또는 shop.head.php 파일에서 수정해 주셔야 합니다.

?>

<ul class="menu-all">
<?php for ($i=1; $i < $menu_cnt; $i++) { //메뉴출력 - 1번부터 출력?>
	<li id="msub_<?php echo $i;?>" class="menu-all-head<?php echo ($menu[$i]['on'] == "on") ? ' active' : '';?>">
		<div class="menu-all-head-item">
			<?php if($menu[$i]['is_sub']) { //서브메뉴가 있을 때 ?>
				<a onclick="sub_menu('msub_<?php echo $i;?>');">
				<span class="menu-all-main is-sub">
			<?php } else { ?>
				<a href="<?php echo $menu[$i]['href'];?>" <?php echo $menu[$i]['target'];?>>
				<span class="menu-all-main">
			<?php } ?>
					<?php echo $menu[$i]['name'];?>
					<?php if($menu[$i]['new'] == "new") { ?>
						<i class="fa fa-circle <?php echo $menu[$i]['new'];?>"></i>
					<?php } ?>
				</span>
			</a>
			<?php if($menu[$i]['is_sub']) { //서브메뉴가 있을 때 ?>
				<ul class="menu-all-sub">
				<?php for($j=0; $j < count($menu[$i]['sub']); $j++) { ?>
					<?php if($menu[$i]['sub'][$j]['line']) { //구분라인 ?>
						<li class="menu-all-sub-item sub-line"><a><?php echo $menu[$i]['sub'][$j]['line'];?></a></li>
					<?php } ?>
					<li class="menu-all-sub-item sub-<?php echo ($menu[$i]['sub'][$j]['on'] == "on") ? 'on' : 'off';?>">
						<a href="<?php echo $menu[$i]['sub'][$j]['href'];?>"<?php echo $menu[$i]['sub'][$j]['target'];?> class="ellipsis">
							<?php echo $menu[$i]['sub'][$j]['name'];?>
							<?php if($menu[$i]['sub'][$j]['new'] == "new") { ?>
								<i class="fa fa-bolt sub-<?php echo $menu[$i]['sub'][$j]['new'];?>"></i>
							<?php } ?>
						</a>
					</li>
				<?php } ?>
				</ul>
			<?php } ?>
		</div>
	</li>
	<?php } ?>
</ul>
