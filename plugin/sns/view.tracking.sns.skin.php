<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (!$board['bo_use_sns']) return;

$sns_url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'&mem_id='.$member['mb_id'].'&depth='.$view['3'];
$sns_txt = strip_tags($view['subject']);
$sns_msg = urlencode(str_replace('\"', '"', $sns_txt));

$sns_send  = G5_BBS_URL.'/sns_send.php?longurl='.urlencode($sns_url).'&amp;title='.$sns_msg;

$facebook_url = $sns_send.'&amp;sns=facebook';
$twitter_url  = $sns_send.'&amp;sns=twitter';
$gplus_url    = $sns_send.'&amp;sns=gplus';
$naverband_url    = $sns_send.'&amp;sns=naverband';
$kakaostory_url    = $sns_send.'&amp;sns=kakaostory';
?>

<?php if(G5_IS_MOBILE && $config['cf_kakao_js_apikey']) { ?>
	<?php if(!defined('APMS_KAKAO')) { ?>
	<script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
	<script src="<?php echo G5_JS_URL; ?>/kakaolink.js"></script>
	<script>
		// 사용할 앱의 Javascript 키를 설정해 주세요.
		Kakao.init("<?php echo $config['cf_kakao_js_apikey']; ?>");
	</script>
	<?php } ?>
<?php } ?>


<a class="asideButton cursor">

<ul id="bo_v_sns">
<?php if($is_member){ ?>
	<li><a href="<?php echo $facebook_url; ?>" onclick="apms_sns('facebook','<?php echo $facebook_url; ?>'); return false;" target="_blank"><img src="<?php echo G5_SNS_URL; ?>/icon/facebook.png" alt="페이스북으로 보내기"></a></li>
    <li><a href="<?php echo $twitter_url; ?>" onclick="apms_sns('twitter','<?php echo $twitter_url; ?>'); return false;" target="_blank"><img src="<?php echo G5_SNS_URL; ?>/icon/twitter.png" alt="트위터로 보내기"></a></li>
    <li><a href="<?php echo $gplus_url; ?>" onclick="apms_sns('googleplus','<?php echo $gplus_url; ?>'); return false;" target="_blank"><img src="<?php echo G5_SNS_URL; ?>/icon/gplus.png" alt="구글플러스로 보내기"></a></li>
	<li><a href="<?php echo $kakaostory_url; ?>" onclick="apms_sns('kakaostory','<?php echo $kakaostory_url; ?>'); return false;" target="_blank"><img src="<?php echo G5_SNS_URL; ?>/icon/kakaostory.png" alt="카카오스토리로 보내기"></a></li>
	<?php if(G5_IS_MOBILE && $config['cf_kakao_js_apikey']) { 
		$kakaothumb = apms_thumbnail($seometa['img']['src'], 300, 0);
	?>
    <li><a href="javascript:kakaolink_send('<?php echo str_replace('\'', '', $sns_txt); ?>', '<?php echo $sns_url; ?>','<?php echo $kakaothumb['src'];?>', '300', '<?php echo $kakaothumb['height'];?>');"><img src="<?php echo G5_SNS_URL; ?>/icon/kakaotalk.png" alt="카카오톡으로 보내기"></a></li>
    <?php } ?>
	<li><a href="<?php echo $naverband_url; ?>" onclick="apms_sns('naverband','<?php echo $naverband_url; ?>'); return false;" target="_blank"><img src="<?php echo G5_SNS_URL; ?>/icon/naverband.png" alt="네이버밴드로 보내기"></a></li>
<?php }else{ ?>
	<li><a class="asideButton cursor"><img src="<?php echo G5_SNS_URL; ?>/icon/facebook.png" alt="페이스북으로 보내기"></a></li>
    <li><a class="asideButton cursor"><img src="<?php echo G5_SNS_URL; ?>/icon/twitter.png" alt="트위터로 보내기"></a></li>
    <li><a class="asideButton cursor"><img src="<?php echo G5_SNS_URL; ?>/icon/gplus.png" alt="구글플러스로 보내기"></a></li>
	<li><a class="asideButton cursor"><img src="<?php echo G5_SNS_URL; ?>/icon/kakaostory.png" alt="카카오스토리로 보내기"></a></li>
	<?php if(G5_IS_MOBILE && $config['cf_kakao_js_apikey']) { 
		$kakaothumb = apms_thumbnail($seometa['img']['src'], 300, 0);
	?>
    <li><a class="asideButton cursor"><img src="<?php echo G5_SNS_URL; ?>/icon/kakaotalk.png" alt="카카오톡으로 보내기"></a></li>
    <?php } ?>
	<li><a class="asideButton cursor"><img src="<?php echo G5_SNS_URL; ?>/icon/naverband.png" alt="네이버밴드로 보내기"></a></li>
<?php } ?>
</ul>
