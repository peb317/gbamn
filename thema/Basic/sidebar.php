<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 
?>

<!-- Hidden Sidebar -->
<aside id="asideMenu" class="at-sidebar en<?php echo $sidebar_effect;?>">
	<div class="close-box asideButton" title="Hide sidebar">
		<i class="fa fa-chevron-right"></i>
	</div>
	<div class="sidebar-wrap">
		<?php if($is_member) { //Login ?>
			<div class="profile-box">
				<div class="profile">
					<a href="<?php echo $at_href['myphoto'];?>" target="_blank" class="win_memo" title="사진등록">
						<div class="profile-photo pull-left">
							<?php echo ($member['photo']) ? '<img src="'.$member['photo'].'" alt="">' : '<i class="fa fa-user"></i>'; //사진 ?>
						</div>
					</a>
					<h3><?php echo $member['mb_nick'];?></h3>
					<p><?php echo $member['grade'];?></p>
					<div class="clearfix"></div>
				</div>

				<?php if($member['admin'] || $member['partner']) { ?>
					<div class="btn-group btn-group-justified">
						<?php if($member['partner']) { ?>
							<a href="<?php echo $at_href['myshop'];?>" class="btn btn-upload btn-sm"><i class="fa fa-shopping-cart"></i> 마이샵</a>
						<?php } ?>
						<?php if($member['admin']) { ?>
							<a href="<?php echo G5_ADMIN_URL;?>" class="btn btn-admin btn-sm"><i class="fa fa-cog"></i> 관리자</a>
						<?php } ?>
					</div>
				<?php } ?>

				<div class="at-tip" data-original-title="<?php echo number_format($member['exp_up']);?>점 추가획득시 레벨업합니다." data-toggle="tooltip" data-placement="top" data-html="true" style="padding:15px 0px;">
					<div class="div-progress progress progress-striped" style="margin:0px; background: #444;">
						<div class="progress-bar progress-bar-exp" role="progressbar" aria-valuenow="<?php echo round($member['exp_per']);?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round($member['exp_per']);?>%;">
							<span class="sr-only">
								Lv.<?php echo $member['level'];?> <span class="font-11">(<?php echo $member['exp_per'];?>%)</span>
							</span>
						</div>
					</div>
					<div class="sr-score pull-right" style="color:#fff; margin-top:-28px;"><?php echo number_format($member['exp']);?> (<?php echo $member['exp_per'];?>%)</div>
				</div>
			</div>

			<h5 class="sidebar-title">My Menu</h5>
			<div class="sidebar-nav <?php echo (G5_IS_MOBILE) ? 'font-14' : 'font-12';?>">
				<ul>
					<li>
						<a href="<?php echo $at_href['point'];?>" target="_blank" class="win_point">
							<span class="badge bg-blue pull-right"><?php echo number_format($member['mb_point']);?></span>
							<i class="fa fa-gift"></i> <?php echo AS_MP;?>
						</a>
					</li>
					<?php if($member['as_date']) { // 기간제 회원 ?>
						<li>
							<a>
								<span class="white pull-right">
									<?php echo date("Y.m.d H:i", $member['as_date']);?>
									(<?php echo number_format(($member['as_date'] - G5_SERVER_TIME) / 86400);?>일)
								</span>
								<i class="fa fa-download"></i> 프리미엄
							</a>		
						</li>
					<?php } ?>
					<li>
						<a href="<?php echo $at_href['response'];?>" target="_blank" class="win_memo">
							<?php if ($member['response']) { ?>
								<span class="badge bg-violet pull-right"><?php echo number_format($member['response']);?></span>
							<?php } ?>
							<i class="fa fa-retweet"></i> 내글반응
						</a>		
					</li>
					<li>
						<a href="<?php echo $at_href['memo'];?>" target="_blank" class="win_memo">
							<?php if ($member['memo']) { ?>
								<span class="badge bg-green pull-right"><?php echo number_format($member['memo']);?></span>
							<?php } ?>
							<i class="fa fa-envelope-o"></i> 쪽지함
						</a>		
					</li>
					<li>
						<a href="<?php echo $at_href['follow'];?>" target="_blank" class="win_memo">
							<i class="fa fa-users"></i> 팔로우
						</a>		
					</li>
					<li>
						<a href="<?php echo $at_href['scrap'];?>" target="_blank" class="win_scrap">
							<i class="fa fa-inbox"></i> 스크랩
						</a>		
					</li>
					<?php if(IS_YC) { //영카트 ?>
						<li>
							<a href="<?php echo $at_href['coupon']; ?>" target="_blank" class="win_point">
								<i class="fa fa-book"></i> 마이쿠폰
							</a>
						</li>
						<li>
							<a href="<?php echo $at_href['shopping']; ?>" target="_blank" class="win_memo">
								<i class="fa fa-shopping-cart"></i> 쇼핑리스트
							</a>
						</li>
						<li>
							<a href="<?php echo $at_href['wishlist']; ?>">
								<i class="fa fa-heart"></i> 위시리스트
							</a>
						</li>
					<?php } ?>
					<li>
						<a href="<?php echo $at_href['mypage']; ?>">
							<i class="fa fa-user"></i> 마이페이지
						</a>
					</li>
					<li>
						<a href="<?php echo $at_href['mypost']; ?>" target="_blank" class="win_memo">
							<i class="fa fa-pencil"></i> 내글관리
						</a>
					</li>
					<li>
						<a href="<?php echo $at_href['myphoto'];?>" target="_blank" class="win_memo">
							<i class="fa fa-camera"></i> 사진등록
						</a>
					</li>
					<li>
						<a href="<?php echo $at_href['edit'];?>">
							<i class="fa fa-pencil"></i> 정보수정
						</a>
					</li>
					<li>
						<a href="<?php echo $at_href['leave'];?>" class="leave-me">
							<i class="fa fa-sign-out"></i> 탈퇴하기
						</a>
					</li>
				</ul>

				<div style="padding:15px 20px 0px;">
					<a href="<?php echo $at_href['logout'];?>" class="btn btn-color btn-block btn-sm">
						<i class="fa fa-power-off"></i> Logout
					</a>
				</div>
			</div>

		<?php } else { //Logout ?>

			<div class="sidebar-box">
				<form id="sidebar_outlogin" name="sidebar_outlogin" method="post" action="<?php echo $at_href['login_check'];?>" autocomplete="off" role="form" class="form" onsubmit="return sidebar_outlogin_form(this);">
				<input type="hidden" name="url" value="<?php echo $urlencode; ?>">
					<div class="form-group">	
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user gray"></i></span>
							<input type="text" name="mb_id" id="mb_id" class="form-control input-sm" required placeholder="아이디" tabindex="31" onKeyDown="sidebar_outlogin_onKeyDown();">
						</div>
					</div>
					<div class="form-group">	
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock gray"></i></span>
							<input type="password" name="mb_password" id="mb_password" class="form-control input-sm" required placeholder="비밀번호" tabindex="32" onKeyDown="sidebar_outlogin_onKeyDown();">
						</div>
					</div>	
					<div class="form-group">
						<button type="button" class="btn btn-color btn-block" tabindex="33" onclick="sidebar_outlogin_submit();" onKeyDown="sidebar_outlogin_onKeyDown();">Login</button>    
					</div>	
					<label><input type="checkbox" name="auto_login" value="1" id="remember_me" class="remember-me"> Remember me</label>
				</form>
			</div>

			<script>
			function sidebar_outlogin_form(f) {
				if (f.mb_id.value == '') {
					alert('아이디를 입력해 주세요.');
					f.mb_id.focus();
					return false;
				}
				if (f.mb_password.value == '') {
					alert('비밀번호를 입력해 주세요.');
					f.mb_password.focus();
					return false;
				}
				return true;
			}
			function sidebar_outlogin_submit() {
				var f = document.getElementById("sidebar_outlogin");
				if (sidebar_outlogin_form(f)) {
					$("#sidebar_outlogin").submit();
				}
				return false;
			}

			function sidebar_outlogin_onKeyDown() {
				  if(event.keyCode == 13) {
					sidebar_outlogin_submit();
				 }
			}
			</script>

			<h5 class="sidebar-title">Member</h5>
			<div class="sidebar-nav">
				<ul>
					<li><a href="<?php echo $at_href['reg'];?>"><i class="fa fa-sign-in"></i> 회원가입</a></li>
					<li><a href="<?php echo $at_href['lost'];?>" class="win_password_lost"><i class="fa fa-search"></i> 정보찾기</a></li>
				</ul>
			</div>
		<?php } //End ?>

		<?php if(IS_YC) { //영카트 ?>
			<h5 class="sidebar-title">Shopping</h5>
			<div class="sidebar-nav">
				<ul>
					<li><a href="<?php echo $at_href['cart']; ?>"><i class="fa fa-shopping-cart"></i> 장바구니</a></li>
					<li><a href="<?php echo $at_href['inquiry']; ?>"><i class="fa fa-truck"></i> 주문/배송</a></li>
					<li><a href="<?php echo $at_href['ppay']; ?>"><i class="fa fa-ticket"></i> 개인결제</a></li>
					<li><a href="<?php echo $at_href['secret'];?>"><i class="fa fa-user-secret"></i> 1:1문의</a>
					</li>
				</ul>
			</div>
		<?php } ?>

		<h5 class="sidebar-title">Search</h5>
		<div class="sidebar-nav">
			<ul>
				<li><a href="<?php echo $at_href['faq'];?>"><i class="fa fa-question-circle"></i> FAQ</a></li>
				<?php if(IS_YC) { ?>
					<li><a href="<?php echo $at_href['isearch'];?>"><i class="fa fa-shopping-cart"></i> 아이템 검색</a></li>
					<li><a href="<?php echo $at_href['iuse']; ?>"><i class="fa fa-pencil"></i> 후기 검색</a></li>
					<li><a href="<?php echo $at_href['iqa']; ?>"><i class="fa fa-comments-o"></i> 문의 검색</a></li>
				<?php } ?>	
				<li><a href="<?php echo $at_href['search'];?>"><i class="fa fa-search"></i> 포스트 검색</a></li>
				<li><a href="<?php echo $at_href['tag'];?>"><i class="fa fa-tags"></i> 태그 검색</a></li>
			</ul>
		</div>

		<h5 class="sidebar-title">Misc</h5>
		<div class="sidebar-nav">
			<ul>
				<li><a href="<?php echo $at_href['new'];?>"><i class="fa fa-refresh"></i> 새글모음</a></li>
				<li><a href="<?php echo $at_href['connect'];?>"><i class="fa fa-link"></i> 현재접속자</a></li>
			</ul>
		</div>
	</div>
</aside>

<aside>
	<div class="modal fade" id="tallsearchModal" tabindex="-1" role="dialog" aria-labelledby="tallsearchModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<div class="text-center">
						<h4 id="tallsearchModalLabel"><i class="fa fa-search"></i> Search</h4>
					</div>
					<form name="tallsearch" method="get" onsubmit="return tsearch_submit(this);" role="form" class="form">
						<div class="form-group">
							<select name="url" class="form-control input-sm">
								<option value="<?php echo $at_href['search'];?>">포스트</option>
								<?php if(IS_YC) { ?>
									<option value="<?php echo $at_href['isearch'];?>">아이템</option>
									<option value="<?php echo $at_href['iuse'];?>">후기</option>
									<option value="<?php echo $at_href['iqa'];?>">문의</option>
								<?php } ?>
								<option value="<?php echo $at_href['tag'];?>">태그</option>
							</select>
						</div>
						<div class="form-group">
							<label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
							<input type="text" name="stx" class="form-control input-sm" value="<?php echo $stx;?>" placeholder="검색어">
						</div>
						<div class="btn-group btn-group-justified">
							<div class="btn-group">
								<button type="submit" class="btn btn-color"><i class="fa fa-check"></i></button>
							</div>
							<div class="btn-group">
								<button type="button" class="btn btn-black" data-dismiss="modal"><i class="fa fa-times"></i></button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</aside>
