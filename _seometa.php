<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 커뮤니티 설정
$seo_keyword = ''; //커뮤니티 키워드
$seo_description = ''; //커뮤니티 소개
$seo_image = ''; //커뮤니티 이미지 - http로 시작하는 이미지파일 전체 주소

// 쇼핑몰 설정
$shop_seo_keyword = ''; //쇼핑몰 키워드
$shop_seo_description = ''; //쇼핑몰 소개
$shop_seo_image = ''; //쇼핑몰 이미지 - http로 시작하는 이미지파일 전체 주소

?>
<?php if(IS_YC && IS_SHOP) { //쇼핑몰 
$canonical_url = (isset($default['de_root_index_use']) && $default['de_root_index_use']) ? G5_URL : G5_SHOP_URL;
?>
<meta name="title" content="<?php echo $config['cf_title'];?>" />
<meta name="publisher" content="<?php echo $config['cf_title'];?>" />
<meta name="author" content="<?php echo $config['cf_admin_email_name'];?>" />
<meta name="robots" content="index,follow" />
<?php if($shop_seo_keyword) { ?>
<meta name="keywords" content="<?php echo $shop_seo_keyword;?>" />
<?php } ?>
<?php if($shop_seo_description) { ?>
<meta name="description" content="<?php echo $shop_seo_description?>" />
<?php } ?>
<meta property="og:title" content="<?php echo $config['cf_title'];?>"/>
<meta property="og:site_name" content="<?php echo $config['cf_title'];?>" />
<meta property="og:author" content="<?php echo $config['cf_admin_email_name'];?>" />
<meta property="og:type" content="website" />
<?php if($shop_seo_description) { ?>
<meta property="og:description" content="<?php echo $shop_seo_description;?>" />
<?php } ?>
<meta property="og:url" content="<?php echo $canonical_url;?>" />
<?php if($shop_seo_image) { ?>
<meta property="og:image" content="<?php echo $shop_seo_image;?>" />
<link rel="image_src" href="<?php echo $shop_seo_image;?>" />
<?php } ?>
<link rel="canonical" href="<?php echo $canonical_url;?>" />
<?php } else { //커뮤니티 ?>
<meta name="title" content="<?php echo $config['cf_title'];?>" />
<meta name="publisher" content="<?php echo $config['cf_title'];?>" />
<meta name="author" content="<?php echo $config['cf_admin_email_name'];?>" />
<meta name="robots" content="index,follow" />
<?php if($seo_keyword) { ?>
<meta name="keywords" content="<?php echo $seo_keyword;?>" />
<?php } ?>
<?php if($seo_description) { ?>
<meta name="description" content="<?php echo $seo_description?>" />
<?php } ?>
<meta property="og:title" content="<?php echo $config['cf_title'];?>"/>
<meta property="og:site_name" content="<?php echo $config['cf_title'];?>" />
<meta property="og:author" content="<?php echo $config['cf_admin_email_name'];?>" />
<meta property="og:type" content="website" />
<?php if($seo_description) { ?>
<meta property="og:description" content="<?php echo $seo_description;?>" />
<?php } ?>
<meta property="og:url" content="<?php echo G5_URL;?>" />
<?php if($seo_image) { ?>
<meta property="og:image" content="<?php echo $seo_image;?>" />
<link rel="image_src" href="<?php echo $seo_image;?>" />
<?php } ?>
<link rel="canonical" href="<?php echo G5_URL;?>" />
<?php } ?>