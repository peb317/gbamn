<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 
if($is_demo) { // 데모
	@include_once(THEMA_PATH.'/assets/demo.config.php');
	@include_once(THEMA_PATH.'/assets/demo.php');
}
include_once(THEMA_PATH.'/assets/thema.php');

?>

<div id="thema_wrapper" class="<?php echo $at_set['font'];?>">

	<div class="wrapper <?php echo $at_set['layout'];?>">
		<!-- LNB -->
		<aside class="<?php echo $at_set['lnb'];?> at-lnb">
			<div class="container">
				<?php if(!G5_IS_MOBILE) { // PC만 출력 ?>
					<nav class="at-lnb-icon hidden-xs">
						<ul class="menu">
							<li>
								<a href="javascript://" onclick="this.style.behavior = 'url(#default#homepage)'; this.setHomePage('<?php echo $at_href['home'];?>');" class="at-tip" data-original-title="<nobr>시작페이지</nobr>" data-toggle="tooltip" data-placement="bottom" data-html="true">
									<i class="fa fa-bug fa-lg"></i> <span class="sound_only">시작페이지</span>
								</a>
							</li>
							<li>
								<a href="javascript://" onclick="window.external.AddFavorite(parent.location.href,document.title);" class="at-tip" data-original-title="<nobr>북마크</nobr>" data-toggle="tooltip" data-placement="bottom" data-html="true">
									<i class="fa fa-bookmark-o fa-lg"></i> <span class="sound_only">북마크</span>
								</a>
							</li>
							<li>
								<a href="<?php echo $at_href['rss'];?>" target="_blank" data-original-title="<nobr>RSS 구독</nobr>" class="at-tip" data-toggle="tooltip" data-placement="bottom" data-html="true">
									<i class="fa fa-rss fa-lg"></i> <span class="sound_only">RSS 구독</span>
								</a>
							</li>
						</ul>
					</nav>
				<?php } ?>
				<nav class="at-lnb-menu">
					<ul class="menu">
						<?php if($is_member) { ?>
							<li><a class="asideButton cursor"><i class="fa fa-user"></i> <span class="hidden-xs"><?php echo $member['mb_nick'];?></span></a></li>
							<?php if($member['response']) { ?>
								<li>
									<a href="<?php echo $at_href['response'];?>" target="_blank" class="win_memo">
										<i class="fa fa-retweet"></i>알림 <span class="count red"><?php echo number_format($member['response']);?></span>
									</a>
								</li>
							<?php } ?>
							<?php if($member['memo']) { ?>
								<li>
									<a href="<?php echo $at_href['memo'];?>" target="_blank" class="win_memo">
										<i class="fa fa-envelope-o"></i>쪽지 <span class="count blue"><?php echo number_format($member['memo']);?></span>
									</a>
								</li>
							<?php } ?>
							<?php if($member['as_coupon']) { ?>
								<li>
									<a href="<?php echo $at_href['coupon'];?>" target="_blank" class="win_point">
										<i class="fa fa-book"></i>쿠폰 <span class="count orangered"><?php echo number_format($member['as_coupon']);?></span>
									</a>
								</li>
							<?php } ?>
							<?php if($member['admin']) {?>
								<li><a href="<?php echo G5_ADMIN_URL;?>"><i class="fa fa-cog"></i> <span class="hidden-xs">관리</span></a></li>
							<?php } ?>
							<li><a href="<?php echo $at_href['connect'];?>"><i class="fa fa-link" title="현재 접속자"></i> <span class="hidden-xs">접속</span> <b class="en"><?php echo number_format($stats['now_total']); ?><?php echo ($stats['now_mb'] > 0) ? ' (<i class="orangered">'.number_format($stats['now_mb']).'</i>)' : ''; ?></b></a></li>
							<li>
								<a href="<?php echo $at_href['logout'];?>">
									<i class="fa fa-power-off"></i> <span class="hidden-xs">로그아웃</span>
								</a>
							</li>
						<?php } else { ?>
							<li><a class="asideButton cursor"><i class="fa fa-power-off"></i> <span>로그인</span></a></li>
							<li><a href="<?php echo $at_href['reg'];?>"><i class="fa fa-sign-in"></i> <span><span class="lnb-txt">회원</span>가입</span></a></li>
							<li><a href="<?php echo $at_href['lost'];?>" class="win_password_lost"><i class="fa fa-search"></i> <span>정보찾기</span></a></li>
							<li><a href="<?php echo $at_href['connect'];?>"><i class="fa fa-comments" title="현재 접속자"></i> <b class="en"><?php echo number_format($stats['now_total']); ?><?php echo ($stats['now_mb'] > 0) ? ' (<i class="orangered">'.number_format($stats['now_mb']).'</i>)' : ''; ?></b></a></li>
						<?php } ?>
					</ul>
				</nav>
			</div>
		</aside>

		<header>
			<!-- Logo -->
			<div class="at-header">
				<div class="container">
					<?php // 로고 및 검색창 위치는 아래 padding-left 값으로 조정하시면 됩니다. ?>
					<div class="header-container" style="padding-left:27%;">
						<div class="header-logo text-center pull-left">
							<a href="<?php echo $at_href['home'];?>">
								AMINA
							</a>
							<div class="header-desc">
								세상을 바꾸는 작은힘 - 아미나
							</div>
						</div>

						<div class="header-search pull-left">
							<form name="tsearch" method="get" onsubmit="return tsearch_submit(this);" role="form" class="form">
							<input type="hidden" name="url"	value="<?php echo $at_href['isearch'];?>">
								<div class="input-group input-group-sm">
									<input type="text" name="stx" class="form-control input-sm" value="<?php echo $stx;?>">
									<span class="input-group-btn">
										<button type="submit" class="btn btn-black btn-sm"><i class="fa fa-search fa-lg"></i></button>
									</span>
								</div>
							</form>
							<?php echo apms_widget('basic-keyword', 'shop-keyword', 'search=item q=아미나빌더,테마,스킨,위젯,플러그인,애드온,그누보드,영카트'); // 키워드 ?>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div id="menu-top"></div>
			<div class="navbar <?php echo $at_set['menu'];?> at-navbar" role="navigation">
				<div class="container">
					<!-- Menu Button -->
					<?php if(G5_IS_MOBILE) { // 모바일 메뉴 ?>
						<div class="pull-left navbar-menu-btn">
							<a role="button" class="mobileButton btn btn-black">
					<?php } else { // PC 전체 메뉴 ?>
						<div class="pull-left navbar-menu-btn visible-sm visible-xs">
							<a role="button" class="navbar-toggle menu-btn btn btn-black" data-toggle="collapse" data-target="#menu-all">
					<?php } ?>
							<i class="fa fa-bars"></i> MENU
						</a>
					</div>
					<!-- Right Menu -->
					<div class="pull-right btn-group navbar-menu-btn">
						<?php if(IS_YC) { // 영카트 이용시 ?>
							<a href="<?php echo $at_href['change'];?>" class="btn btn-black" role="button">
								<?php if(IS_SHOP) { // 쇼핑몰일 때 ?>
									<i class="fa fa-commenting"></i> BBS
								<?php } else { ?>
									<i class="fa fa-shopping-bag"></i> SHOP
								<?php } ?>
							</a>
						<?php } ?>
						<button type="button" class="btn btn-black" data-toggle="modal" data-target="#tallsearchModal">
							<i class="fa fa-search"></i>
						</button>
						<button type="button" class="btn btn-black asideButton">
							<i class="fa fa-outdent"></i>
						</button>
					</div>
					<?php if(!G5_IS_MOBILE) { // PC만 출력 ?>
						<!-- Left Menu -->
						<div class="navbar-collapse collapse">
							<div class="container">
								<ul class="nav navbar-nav nav-<?php echo $at_set['mfont'];?>">
									<li class="navbar-icon  at-tip<?php echo ($is_index) ? ' active' : '';?>" data-original-title="<nobr class='font-normal'>메인</nobr>" data-toggle="tooltip" data-html="true">
										<a href="<?php echo $at_href['main'];?>">
											<i class="fa fa-home"></i>
										</a>
									</li>
									<li class="navbar-icon at-tip" data-original-title="<nobr class='font-normal'>전체보기</nobr>" data-toggle="tooltip" data-html="true">
										<a<?php echo ($at_set['header']) ? ' href="#menu-top"' : '';?> data-toggle="collapse" data-target="#menu-all">
											<i class="fa fa-bars"></i>
										</a>
									</li>
									<?php for ($i=1; $i < $menu_cnt; $i++) { //메뉴출력 - 1번부터 출력?>
										<?php if($menu[$i]['is_sub']) { //서브메뉴가 있을 때 ?>
											<li class="dropdown<?php echo ($menu[$i]['on'] == "on") ? ' active' : '';?>">
												<a href="<?php echo $menu[$i]['href'];?>" class="dropdown-toggle" <?php echo(G5_IS_MOBILE) ? 'data-toggle="dropdown"' : 'data-hover="dropdown"';?> data-close-others="true"<?php echo $menu[$i]['target'];?>>
													<?php echo $menu[$i]['name'];?><?php if($menu[$i]['new'] == "new") { ?><i class="fa fa-circle <?php echo $menu[$i]['new'];?>"></i><?php } ?>
												</a>
												<div class="dropdown-menu dropdown-menu-head">
													<ul class="pull-left">
													<?php 
														$smw1 = 1; //나눔 체크
														for($j=0; $j < count($menu[$i]['sub']); $j++) { 
													?>
														<?php if($menu[$i]['sub'][$j]['sp']) { //나눔 ?>
															</ul>
															<ul class="pull-left">
														<?php $smw1++; } // 나눔 카운트 ?>
														<?php if($menu[$i]['sub'][$j]['line']) { //구분라인 ?>
															<li class="line"><a><?php echo $menu[$i]['sub'][$j]['line'];?></a></li>
														<?php } ?>
														<?php if(!G5_IS_MOBILE && $menu[$i]['sub'][$j]['is_sub']) { //모바일이 아니고 서브메뉴가 있을 때 ?>
															<li class="dropdown-submenu sub-<?php echo ($menu[$i]['sub'][$j]['on'] == "on") ? 'on' : 'off';?>">
																<a tabindex="-1" href="<?php echo $menu[$i]['sub'][$j]['href'];?>"<?php echo $menu[$i]['sub'][$j]['target'];?>>
																	<?php echo $menu[$i]['sub'][$j]['name'];?>
																	<?php if($menu[$i]['sub'][$j]['new'] == "new") { ?>
																		<i class="fa fa-circle red"></i>
																	<?php } ?>
																	<i class="fa fa-caret-right sub-caret pull-right"></i>
																</a>
																<div class="dropdown-menu dropdown-menu-sub">
																	<ul class="pull-left">
																	<?php 
																		$smw2 = 1; //나눔 체크
																		for($k=0; $k < count($menu[$i]['sub'][$j]['sub']); $k++) { 
																	?>
																		<?php if($menu[$i]['sub'][$j]['sub'][$k]['sp']) { //나눔 ?>
																			</ul>
																			<ul class="pull-left">
																		<?php $smw2++; } // 나눔 카운트 ?>
																		<?php if($menu[$i]['sub'][$j]['sub'][$k]['line']) { //구분라인 ?>
																			<li class="line-sub"><a><?php echo $menu[$i]['sub'][$j]['sub'][$k]['line'];?></a></li>
																		<?php } ?>
																		<li class="sub2-<?php echo ($menu[$i]['sub'][$j]['sub'][$k]['on'] == "on") ? 'on' : 'off';?>">
																			<a tabindex="-1" href="<?php echo $menu[$i]['sub'][$j]['sub'][$k]['href'];?>"<?php echo $menu[$i]['sub'][$j]['sub'][$k]['target'];?>><?php echo $menu[$i]['sub'][$j]['sub'][$k]['name'];?></a>
																		</li>
																	<?php } ?>
																	</ul>
																	<?php $smw2 = ($smw2 > 1) ? $is_subw * $smw2 : 0; //서브메뉴 너비 ?>
																	<div class="clearfix sub-nanum"<?php echo ($smw2) ? ' style="width:'.$smw2.'px;"' : '';?>></div>
																</div>
															</li>
														<?php } else { //서브메뉴가 없을 때 ?>
															<li class="sub-<?php echo ($menu[$i]['sub'][$j]['on'] == "on") ? 'on' : 'off';?>">
																<a href="<?php echo $menu[$i]['sub'][$j]['href'];?>"<?php echo $menu[$i]['sub'][$j]['target'];?>>
																	<?php echo $menu[$i]['sub'][$j]['name'];?>
																	<?php if($menu[$i]['sub'][$j]['new'] == "new") { ?>
																		<i class="fa fa-circle red"></i>
																	<?php } ?>
																</a>
															</li>
														<?php } ?>
													<?php } ?>
													</ul>
													<?php $smw1 = ($smw1 > 1) ? $is_subw * $smw1 : 0; //서브메뉴 너비 ?>
													<div class="clearfix sub-nanum"<?php echo ($smw1) ? ' style="width:'.$smw1.'px;"' : '';?>></div>
												</div>
											</li>
										<?php } else { //서브메뉴가 없을 때 ?>
											<li<?php echo ($menu[$i]['on'] == "on") ? ' class="active"' : '';?>>
												<a href="<?php echo $menu[$i]['href'];?>"<?php echo $menu[$i]['target'];?>>
													<?php echo $menu[$i]['name'];?>
													<?php if($menu[$i]['new'] == "new") { ?>
														<i class="fa fa-circle <?php echo $menu[$i]['new'];?>"></i>
													<?php } ?>
												</a>
											</li>
										<?php } ?>
									<?php } ?>
								</ul>
							</div>
						</div>
					<?php } ?>
				</div>
				<div class="navbar-menu-bar"></div>
			</div>
			<div class="clearfix"></div>
		</header>

		<?php if(!G5_IS_MOBILE) { // PC 전체 메뉴 - Masonry 적용 ?>
			<nav id="menu-all" class="collapse menu-all-wrap">
				<div class="container">
					<div class="menu-all-container">
						<?php include (THEMA_PATH.'/menu.php'); // PC 전체메뉴 ?>
						<div class="clearfix"></div>
					</div>
					<div class="menu-all-btn text-center">
						<div class="btn-group">
							<a class="btn btn-lightgray btn-lg" href="<?php echo $at_href['main'];?>" title="메인으로"><i class="fa fa-home"></i></a>
							<a href="#menu-top" class="btn btn-lightgray btn-lg" data-toggle="collapse" data-target="#menu-all" title="메뉴닫기"><i class="fa fa-times"></i></a>
						</div>
					</div>
				</div>
			</nav>
		<?php } ?>

		<?php if($page_title) { // 페이지 타이틀 ?>
			<div class="page-title">
				<div class="container">
					<h2><?php echo ($bo_table) ? '<a href="'.G5_BBS_URL.'/board.php?bo_table='.$bo_table.'"><span>'.$page_title.'</span></a>' : $page_title;?></h2>
					<?php if($page_desc) { // 페이지 설명글 ?>
						<ol class="breadcrumb hidden-xs">
							<li class="active"><?php echo $page_desc;?></li>
						</ol>
					<?php } ?>
				</div>
			</div>
		<?php } ?>

		<?php if($col_name) { ?>
			<div class="container">
			<?php if($col_name == "two") { ?>
				<div class="row at-row">
					<div class="col-md-<?php echo $col_content;?><?php echo ($at_set['side']) ? ' pull-right' : '';?> at-col at-main">		
			<?php } else { ?>
				<div class="at-content">
			<?php } ?>
		<?php } ?>
