<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
		<?php if($col_name) { ?>
					</div><!-- .at-content -->
			</div><!-- .container -->
		<?php } ?>

		<footer class="at-footer">
			<div class="at-map">
				<div class="container">
					<ul>
						<li><a href="<?php echo G5_BBS_URL;?>/page.php?hid=intro"><i class="fa fa-leaf"></i> <span>사이트 소개</span></a></li> 
						<li><a href="<?php echo G5_BBS_URL;?>/page.php?hid=provision"><i class="fa fa-check-circle"></i> <span>이용약관</span></a></li> 
						<li><a href="<?php echo G5_BBS_URL;?>/page.php?hid=privacy"><i class="fa fa-plus-circle"></i> <span>개인정보취급방침</span></a></li>
						<li><a href="<?php echo G5_BBS_URL;?>/page.php?hid=noemail"><i class="fa fa-ban"></i> <span>이메일 무단수집거부</span></a></li>
						<li><a href="<?php echo G5_BBS_URL;?>/page.php?hid=disclaimer"><i class="fa fa-minus-circle"></i> <span>책임의 한계와 법적고지</span></a></li>
						<li><a href="<?php echo G5_BBS_URL;?>/page.php?hid=guide"><i class="fa fa-info-circle"></i> <span>이용안내</span></a></li>
						<li><a href="<?php echo $at_href['secret'];?>"><i class="fa fa-question-circle"></i> <span>문의하기</span></a></li>
						<li class="pull-right"><a href="<?php echo $as_href['pc_mobile'];?>"><i class="fa fa-tablet"></i> <span><?php echo (G5_IS_MOBILE) ? 'PC' : '모바일';?>버전</span></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>

			<div class="at-copyright">
				<div class="container">
					<div class="at-footer-item">
						<div class="footer-txt">
							<i class="fa fa-leaf fa-lg hidden-xs"></i>
							<?php echo $config['cf_title'];?> &copy; <span class="hidden-xs">All Rights Reserved.</span>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div><!-- .wrapper -->

	<?php if(G5_IS_MOBILE) { // 모바일 메뉴 ?>
		<nav id="mobileMenu" class="mobile-menu<?php echo $mobile_menu_effect;?>">
			<div class="menu-icon text-center">
				<a class="mobileButton"><i class="fa fa-times fa-2x lightgray"></i></a>
				<a href="<?php echo $at_href['main'];?>"><i class="fa fa-home fa-2x lightgray"></i></a>
				<a class="asideButton"><i class="fa fa-<?php echo ($is_member) ? 'power-off' : 'user';?> fa-2x lightgray"></i></a>
			</div>
			<?php include (THEMA_PATH.'/menu.php'); // 모바일 & PC 전체메뉴 ?>
			<ul style="list-style:none; margin:0px; padding:15px; padding-left:10px;">
				<li><i class="fa fa-bug red"></i>  <a href="<?php echo $at_href['connect'];?>">
					현재 접속자 <span class="pull-right"><?php echo number_format($stats['now_total']); ?><?php echo ($stats['now_mb'] > 0) ? '(<b>'.number_format($stats['now_mb']).'</b>)' : ''; ?> 명</span></a>
				</li>
				<li><i class="fa fa-bug"></i> 오늘 방문자 <span class="pull-right"><?php echo number_format($stats['visit_today']); ?> 명</span></li>
				<li><i class="fa fa-bug"></i> 어제 방문자 <span class="pull-right"><?php echo number_format($stats['visit_yesterday']); ?> 명</span></li>
				<li><i class="fa fa-bug"></i> 최대 방문자 <span class="pull-right"><?php echo number_format($stats['visit_max']); ?> 명</span></li>
				<li><i class="fa fa-bug"></i> 전체 방문자 <span class="pull-right"><?php echo number_format($stats['visit_total']); ?> 명</span></li>
				<li><i class="fa fa-bug"></i> 전체 게시물	<span class="pull-right"><?php echo number_format($menu[0]['count_write']); ?> 개</span></li>
				<li><i class="fa fa-bug"></i> 전체 댓글수	<span class="pull-right"><?php echo number_format($menu[0]['count_comment']); ?> 개</span></li>
				<li><i class="fa fa-bug"></i> 전체 회원수	<span class="pull-right at-tip" data-original-title="<nobr>오늘 <?php echo $stats['join_today'];?> 명 / 어제 <?php echo $stats['join_yesterday'];?> 명</nobr>" data-toggle="tooltip" data-placement="top" data-html="true"><?php echo number_format($stats['join_total']); ?> 명</span>
				</li>
			</ul>
			<div class="h40"></div>
		</nav>
	<?php } ?>

	<?php include_once(THEMA_PATH.'/sidebar.php'); //Hidden Sidebar ?>
	<?php if($is_admin || $is_demo) include_once(THEMA_PATH.'/assets/switcher.php'); //Style Switcher ?>
</div>

<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo THEMA_URL;?>/assets/js/respond.js"></script>
<![endif]-->

<!-- JavaScript -->
<script type="text/javascript" src="<?php echo THEMA_URL;?>/assets/bs3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo THEMA_URL;?>/assets/js/ui.totop.min.js"></script>
<?php if(G5_IS_MOBILE) { // 모바일 ?>
	<script type="text/javascript" src="<?php echo THEMA_URL;?>/assets/js/custom.mobile.js"></script>
<?php } else { // PC ?>
	<script type="text/javascript" src="<?php echo THEMA_URL;?>/assets/js/bootstrap-hover-dropdown-<?php echo $is_menu_effect;?>.js"></script>
	<script type="text/javascript" src="<?php echo THEMA_URL;?>/assets/js/custom.js"></script>
<?php } ?>
<?php if(isset($at_set['header']) && $at_set['header']) { ?>
<script type="text/javascript" src="<?php echo THEMA_URL;?>/assets/js/sticky.js"></script>
<?php } ?>
