<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_ADMIN_PATH.'/apms_admin/apms.admin.lib.php');

// 테마스킨
$tmain = apms_file_list('thema/'.THEMA.'/main', 'php');
$tside = apms_file_list('thema/'.THEMA.'/side', 'php');
?>

<script>
	var sw_url = "<?php echo THEMA_URL;?>";
	var sw_bgcolor = "<?php echo $at_set['body_bgcolor'];?>";
</script>
<link rel="stylesheet" href="<?php echo THEMA_URL;?>/assets/css/switcher.css">
<link rel="stylesheet" href="<?php echo THEMA_URL;?>/assets/css/spectrum.css">
<script type="text/javascript" src="<?php echo THEMA_URL;?>/assets/js/switcher.js"></script>
<script type="text/javascript" src="<?php echo THEMA_URL;?>/assets/js/spectrum.js"></script>
<style>
	#style-switcher { position: <?php echo (isset($at_set['sfix']) && $at_set['sfix']) ? 'fixed' : 'absolute';?>; }
</style>
<section id="style-switcher">
	<?php if($is_demo) { ?>
		<a href="#" class="demo-setup font-12" title="데모 설정"><i class="fa fa-cog fa-lg"></i> 데모설정</a>
	<?php } ?>
	<a href="#" class="widget-setup" title="위젯 설정"><i class="fa fa-cogs"></i></a>
	<h2>Style Switcher <a href="#" title="레이아웃 설정"><i class="fa fa-desktop"></i></a></h2>
	<div>
		<div class="switcher-style">
			<h3>
				<label>
					<span class="pull-right"><input type="checkbox" id="switcher-fixed" name="sfix" value="1"<?php echo ($at_set['sfix']) ? ' checked' : '';?>></span>
					<b class="en">1. Fixed Switcher</b>
				</label>
			</h3>
		</div>
		<?php if($is_admin && !$pv) { // 관리자일 경우에만 컬러셋 변경과 값저장 가능하도록 함 ?>
			<form id="themaSwitcher" name="themaSwitcher" action="<?php echo $at_href['switcher_submit'];?>" method="post" onsubmit="return switcher_submit(this);">
			<input type="hidden" name="sw_type" value="<?php echo $sw_type;?>">
			<input type="hidden" name="sw_code" value="<?php echo $sw_code;?>">
			<input type="hidden" name="sw_thema" value="<?php echo THEMA;?>">
			<input type="hidden" name="url" value="<?php echo urldecode($urlencode);?>">
			<input type="hidden" name="at_set[thema]" value="<?php echo THEMA;?>">
		<?php } ?>
		<h3>2. Thema Colorset</h3>
		<div class="layout-style">
			<select id="colorset-style" name="colorset">
				<?php //Colorset
					$srow = thema_switcher('thema', 'colorset', COLORSET);
					for($i=0; $i < count($srow); $i++) {
				?>
					 <option value="<?php echo $srow[$i]['value'];?>"<?php echo ($srow[$i]['selected']) ? ' selected' : '';?>>
						<?php echo $srow[$i]['name'];?>
					</option>
				<?php } ?>
			</select>
		</div>

		<h3>3. PC Mode Style</h3>
		<div class="layout-style">
			<select id="pc-style" name="at_set[pc]">
				<option value="">반응형 PC모드</option>
				<option value="1"<?php echo get_selected('1', $at_set['pc']);?>>비반응형 PC모드</option>
			</select>
		</div>

		<h3>4. Layout Style</h3>
		<div class="layout-style">
			<select id="layout-style" name="at_set[layout]">
				<option value="">와이드형</option>
				<option value="boxed"<?php echo get_selected('boxed', $at_set['layout']);?>>박스형</option>
			</select>
		</div>

		<h3>5. Body Background</h3>
		<input type='hidden' id="input-body-background" name="at_set[body_background]" value="<?php echo $at_set['body_background'];?>">
		<div class="color-style">
			<input type='text' class="body-bgcolor" name="at_set[body_bgcolor]" value="<?php echo $at_set['body_bgcolor'];?>">
		</div>
		<p style="margin:8px 0px 15px;">
			<a role="button" class="switcher-win btn btn-black btn-sm btn-block" target="_balnk" href="<?php echo $at_href['switcher'];?>&amp;type=html&amp;fid=input-body-background&amp;cid=body-background">
				<i class="fa fa-picture-o"></i> 배경이미지 선택
			</a>
		</p>

		<h3>6. LNB Style</h3>
		<div class="layout-style">
			<select id="lnb-style" name="at_set[lnb]">
				<option value="">화이트</option>
				<option value="at-lnb-gray"<?php echo get_selected('at-lnb-gray', $at_set['lnb']);?>>그레이</option>
				<option value="at-lnb-dark"<?php echo get_selected('at-lnb-dark', $at_set['lnb']);?>>블랙</option>
			</select>
		</div>

		<h3>7. Menu Style</h3>
		<div class="layout-style">
			<select id="menu-style" name="at_set[menu]">
				<option value="">일반메뉴</option>
				<option value="navbar-contrasted"<?php echo get_selected('navbar-contrasted', $at_set['menu']);?>>반전메뉴</option>
			</select>
			<select id="menu-style" name="at_set[meffect]">
				<option value="">효과없음</option>
				<option value="1"<?php echo get_selected('1', $at_set['meffect']);?>>슬라이드</option>
			</select>
			<select id="font-style" name="at_set[mfont]">
				<option value="12">주메뉴 기본폰트</option>
				<option value="13"<?php echo get_selected('13', $at_set['mfont']);?>>13px 폰트</option>
				<option value="14"<?php echo get_selected('14', $at_set['mfont']);?>>14px 폰트</option>
				<option value="15"<?php echo get_selected('15', $at_set['mfont']);?>>15px 폰트</option>
				<option value="16"<?php echo get_selected('16', $at_set['mfont']);?>>16px 폰트</option>
				<option value="17"<?php echo get_selected('17', $at_set['mfont']);?>>17px 폰트</option>
				<option value="18"<?php echo get_selected('18', $at_set['mfont']);?>>18px 폰트</option>
			</select>
			<p class="text-center" style="padding-top:6px;">
				서브메뉴 너비
				<input type="text" name="at_set[subw]" value="<?php echo $at_set['subw'];?>" style="width:40px;">
				px
			</p>
		</div>

		<h3>8. Header Style - Save</h3>
		<div class="layout-style">
			<select id="header-style" name="at_set[header]">
				<option value="">일반헤더</option>
				<option value="1"<?php echo get_selected('1', $at_set['header']);?>>상단고정</option>
			</select>
		</div>

		<h3>9. Main Skin - Save</h3>
		<div class="layout-style">
			<select name="at_set[mfile]" required>
				<option value="">메인선택</option>
				<?php for ($i=0; $i<count($tmain); $i++) { ?>
					<option value="<?php echo $tmain[$i];?>"<?php echo get_selected($at_set['mfile'], $tmain[$i]);?>><?php echo $tmain[$i];?></option>
				<?php } ?>
			</select>
		</div>

		<h3>10. Page Style - Save</h3>
		<div class="layout-style">
			<select id="page-style" name="at_set[page]">
				<option value="9">2단 - 라지 컨텐츠</option>
				<option value="8"<?php echo get_selected('8', $at_set['page']);?>>2단 - 미디엄 컨텐츠</option>
				<option value="7"<?php echo get_selected('7', $at_set['page']);?>>2단 - 스몰 컨텐츠</option>
				<option value="12"<?php echo get_selected('12', $at_set['page']);?>>1단 - 박스형</option>
				<option value="13"<?php echo get_selected('13', $at_set['page']);?>>1단 - 와이드</option>
			</select>
		</div>

		<h3>11. Page Side Style - Save</h3>
		<div class="layout-style">
			<select id="side-style" name="at_set[side]">
				<option value="">오른쪽 사이드</option>
				<option value="1"<?php echo get_selected('1', $at_set['side']);?>>왼쪽 사이드</option>
			</select>
		</div>

		<h3>12. Page Side Skin - Save</h3>
		<div class="layout-style">
			<select name="at_set[sfile]" required>
				<option value="">사이드선택</option>
				<?php for ($i=0; $i<count($tside); $i++) { ?>
					<option value="<?php echo $tside[$i];?>"<?php echo get_selected($at_set['sfile'], $tside[$i]);?>><?php echo $tside[$i];?></option>
				<?php } ?>
			</select>
		</div>

		<h3>13. Font Style</h3>
		<div class="layout-style">
			<select id="font-style" name="at_set[font]">
				<option value="ko">한글폰트</option>
				<option value="en"<?php echo get_selected('en', $at_set['font']);?>>영문폰트</option>
			</select>
		</div>
		<?php if($is_admin) { ?>
				<div class="save-style at-thema">
					<button class="btn btn-black btn-sm btn-block" type="submit"><i class="fa fa-check"></i> Save</button>
				</div>
			</form>
			<script>
				function switcher_submit(f) {
					if(confirm("<?php echo $sw_msg;?>의 설정으로 저장하시겠습니까?")) {
						return true;
					}
					return false;
				}
			</script>
		<?php } ?>
	</div>
</section>

<?php if($is_demo) { //데모 미리보기 설정 ?>
	<style>
		#demoModal .form-group { border-top:1px solid #ddd; padding-top:6px; }
	</style>
	<div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<form id="demoSwitcher" name="demoSwitcher" method="post" class="form-horizontal">
			<input type="hidden" name="dpv" value="1">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="demoModalLabel"><i class="fa fa-desktop"></i> Layout Style Preview</h4>
				</div>
				<div class="modal-body" style="padding-bottom:0px;">

					<div class="alert alert-warning" role="alert">
					 데모 사이트의 Switcher에서 설정 가능한 일부 항목을 적용하여 미리보기할 수 있습니다.
					</div>
			
					<div class="form-group" style="border:0px; padding-top:0px;">
						<label class="col-sm-2 control-label">컬러셋</label>
						<div class="col-sm-4">
							<select name="pvc" class="form-control input-sm">
								<?php //Colorset
									$srow = thema_switcher('thema', 'colorset', COLORSET);
									for($i=0; $i < count($srow); $i++) {
								?>
									 <option value="<?php echo $srow[$i]['value'];?>"<?php echo ($srow[$i]['selected']) ? ' selected' : '';?>>
										<?php echo $srow[$i]['name'];?>
									</option>
								<?php } ?>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">PC모드</label>
						<div class="col-sm-10">
							<label class="radio-inline">
								<input type="radio" name="dpv_pc" value="" <?php echo get_checked($at_set['pc'], "");?>> 반응형 PC 레이아웃
							</label>
							<label class="radio-inline">
								<input type="radio" name="dpv_pc" value="1" <?php echo get_checked($at_set['pc'], "1");?>> 비반응형 PC 레이아웃
							</label>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">레이아웃</label>
						<div class="col-sm-10">
							<label class="radio-inline">
								<input type="radio" name="dpv_layout" value="" <?php echo get_checked($at_set['layout'], "");?>> 와이드 스타일
							</label>
							<label class="radio-inline">
								<input type="radio" name="dpv_layout" value="boxed" <?php echo get_checked($at_set['layout'], "boxed");?>> 박스 스타일 &nbsp;
							</label>

							<input type='hidden' id="input-dpv-bg" name="dpv_bg" value="<?php echo $at_set['body_background'];?>">
							<a role="button" class="switcher-win btn btn-black btn-sm" target="_balnk" href="<?php echo $at_href['switcher'];?>&amp;type=html&amp;fid=input-dpv-bg&amp;cid=body-background">
								<i class="fa fa-check"></i> 배경이미지 설정
							</a>
						</div>
					  </div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">LNB</label>
						<div class="col-sm-10">
							<label class="radio-inline">
								<input type="radio" name="dpv_lnb" value="" <?php echo get_checked($at_set['lnb'], "");?>> 화이트
							</label>
							<label class="radio-inline">
								<input type="radio" name="dpv_lnb" value="at-lnb-gray" <?php echo get_checked($at_set['lnb'], "at-lnb-gray");?>> 그레이
							</label>
							<label class="radio-inline">
								<input type="radio" name="dpv_lnb" value="at-lnb-dark" <?php echo get_checked($at_set['lnb'], "at-lnb-dark");?>> 블랙
							</label>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">헤더</label>
						<div class="col-sm-10">
							<label class="radio-inline">
								<input type="radio" name="dpv_header" value="" <?php echo get_checked($at_set['header'], "");?>> 일반헤더
							</label>
							<label class="radio-inline">
								<input type="radio" name="dpv_header" value="1" <?php echo get_checked($at_set['lnb'], "1");?>> 상단고정
							</label>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">메뉴</label>
						<div class="col-sm-3">
							<select name="dpv_menu" class="form-control input-sm">
								<option value="">일반메뉴</option>
								<option value="navbar-contrasted"<?php echo get_selected('navbar-contrasted', $at_set['menu']);?>>반전메뉴</option>
							</select>
						</div>
						<div class="col-sm-3">
							<select name="dpv_meffect" class="form-control input-sm">
								<option value="">효과없음</option>
								<option value="1"<?php echo get_selected('1', $at_set['meffect']);?>>슬라이드</option>
							</select>
						</div>
						<div class="col-sm-3">
							<select name="dpv_mfont" class="form-control input-sm">
								<option value="12">주메뉴 기본폰트</option>
								<option value="13"<?php echo get_selected('13', $at_set['mfont']);?>>13px 폰트</option>
								<option value="14"<?php echo get_selected('14', $at_set['mfont']);?>>14px 폰트</option>
								<option value="15"<?php echo get_selected('15', $at_set['mfont']);?>>15px 폰트</option>
								<option value="16"<?php echo get_selected('16', $at_set['mfont']);?>>16px 폰트</option>
								<option value="17"<?php echo get_selected('17', $at_set['mfont']);?>>17px 폰트</option>
								<option value="18"<?php echo get_selected('18', $at_set['mfont']);?>>18px 폰트</option>
							</select>
						</div>	
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">사이드</label>
						<div class="col-sm-10">
							<label class="radio-inline">
								<input type="radio" name="dpv_side" value="" <?php echo get_checked($at_set['side'], "");?>> 우측위치
							</label>
							<label class="radio-inline">
								<input type="radio" name="dpv_side" value="1" <?php echo get_checked($at_set['side'], "1");?>> 좌측위치
							</label>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">폰트</label>
						<div class="col-sm-4">
							<label class="radio-inline">
								<input type="radio" name="dpv_font" value="ko" <?php echo get_checked($at_set['font'], "ko");?>> 한글폰트
							</label>
							<label class="radio-inline">
								<input type="radio" name="dpv_font" value="en" <?php echo get_checked($at_set['font'], "en");?>> 영문폰트
							</label>
						</div>
					</div>
		
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-color"><i class="fa fa-check"></i> 적용하기</button>
				</div>
			</div>
			</form>
		</div>
	</div>
	<?php if(!G5_IS_MOBILE) { ?>
	<script>
	var pc_responsive = "<?php echo $at_set['pc'];?>";
	$(function() {
		if(pc_responsive) {
			$(".thema-mode" ).attr("href", sw_url + "/assets/bs3/css/bootstrap-apms.min.css");
			$("body").removeClass("responsive");
			$("body").addClass("no-responsive");
		} else {
			$(".thema-mode").attr("href", sw_url + "/assets/bs3/css/bootstrap.min.css");
			$("body").removeClass("no-responsive");
			$("body").addClass("responsive");
		}
		$(".demo-setup").click(function(){
			$('#demoModal').modal();
		});
	});
	</script>
	<?php } ?>
<?php } ?>