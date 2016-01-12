<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 
if($is_demo) { // 데모
	@include_once(THEMA_PATH.'/assets/demo.config.php');
	@include_once(THEMA_PATH.'/assets/demo.php');
}
include_once(THEMA_PATH.'/assets/thema.php');

?>

<div id="thema_wrapper" class="<?php echo $at_set['font'];?>">

		<?php if($col_name) { ?>
			<div class="container">
			<?php if($col_name == "two") { ?>
				<div class="row at-row">
					<div class="col-md-<?php echo $col_content;?><?php echo ($at_set['side']) ? ' pull-right' : '';?> at-col at-main">		
			<?php } else { ?>
				<div class="at-content">
			<?php } ?>
		<?php } ?>
