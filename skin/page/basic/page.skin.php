<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// 헤더
if($header_skin)
	include_once('./header.php');

echo $page_content;

?>
<style>
.page-icon { 
	text-align:right; padding-right:20px; 
}
.page-icon img { 
	width:20%; max-width:34px; border-radius:50%; margin-bottom:5px;
}
</style>
<div class="page-icon">
	<?php 
		$sns_img = $page_skin_url.'/img';
		echo  get_sns_share_link('facebook', $sns_url, $sns_title, $sns_img.'/sns_fb.png').' ';
		echo  get_sns_share_link('twitter', $sns_url, $sns_title, $sns_img.'/sns_twt.png').' ';
		echo  get_sns_share_link('googleplus', $sns_url, $sns_title, $sns_img.'/sns_goo.png').' ';
		echo  get_sns_share_link('kakaostory', $sns_url, $sns_title, $sns_img.'/sns_kakaostory.png').' ';
		echo  get_sns_share_link('kakaotalk', $sns_url, $sns_title, $sns_img.'/sns_kakao.png', $img['src']).' ';
		echo  get_sns_share_link('naverband', $sns_url, $sns_title, $sns_img.'/sns_naverband.png').' ';
	?>
	<?php if($scrap_href) { ?>
		<a href="<?php echo $scrap_href;  ?>" target="_blank" onclick="win_scrap(this.href); return false;" title="스크랩">
			<img src="<?php echo $page_skin_url;?>/img/scrap.png" alt="스크랩">
		</a>
	<?php } ?>
</div>