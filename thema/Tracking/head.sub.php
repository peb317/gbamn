<?php 
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 

if(!$at_set['font']) $at_set['font'] = 'ko';

add_stylesheet('<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,300,500,500italic,700,900,400italic,700italic">',0);
add_stylesheet('<link rel="stylesheet" href="'.THEMA_URL.'/assets/bs3/css/bootstrap.min.css" type="text/css" media="screen">',0);
add_stylesheet('<link rel="stylesheet" href="'.COLORSET_URL.'/colorset.css" type="text/css" media="screen">',0);
?>
<div class="<?php echo $at_set['font'];?><?php echo (G5_IS_MOBILE) ? ' mobile-font' : '';?>">