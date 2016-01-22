<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 위젯 카운팅
$wn = 1; 

// 위젯 대표아이디 설정
$wid = 'basic-shop-main-wide';

// 게시판 제목 폰트 설정
$font = 'font-18 en';

// 게시판 제목 하단라인컬러 설정 - red, blue, green, orangered, black, orange, yellow, navy, violet, deepblue, crimson..
$line = 'red';

?>
<style>
	.widget-index  { padding-top:20px; }
	.widget-index .div-title-underbar { margin-bottom:15px; }
	.widget-index .div-title-underbar span { padding-bottom:4px; }
	.widget-box { margin-bottom:40px; }
	.is-mobile .widget-box { margin-bottom:30px; }
</style>

<div class="container widget-index">

	<?php echo apms_widget('basic-title', $wid.$wn, 'caption=4 nav=1'); $wn++; //타이틀 ?>

	<div class="h30"></div>

	<div class="row">
		<div class="col-sm-8">
			<!-- 이벤트 시작 -->
			<div class="div-title-underbar">
				<a href="<?php echo $at_href['event'];?>">
					<span class="pull-right lightgray <?php echo $font;?>">+</span>
					<span class="div-title-underbar-bold border-<?php echo $line;?> <?php echo $font;?>">
						<b>Event</b>
					</span>
				</a>
			</div>
			<div class="widget-box">
				<?php echo apms_widget('basic-shop-event-slider', $wid.$wn, 'caption=1 nav=1 item=3 lg=2 md=2 sm=2', 'auto=0'); $wn++; ?>
			</div>
			<!-- 이벤트 끝 -->	
		</div>
		<div class="col-sm-4">
			<!-- 알림 시작 -->
			<div class="div-title-underbar">
				<a href="<?php echo G5_BBS_URL;?>/board.php?bo_table=basic">
					<span class="pull-right lightgray <?php echo $font;?>">+</span>
					<span class="div-title-underbar-bold border-<?php echo $line;?> <?php echo $font;?>">
						<b>Notice</b>
					</span>
				</a>
			</div>
			<div class="widget-box">
				<?php echo apms_widget('basic-post-list', $wid.$wn, 'icon={아이콘:bell} rows=6 date=1 strong=1,2'); $wn++; ?>
			</div>
			<!-- 알림 끝 -->
		</div>
	</div>

	<!-- 히트 시작 -->
	<div class="div-title-underbar">
		<a href="<?php echo $at_href['itype'];?>?type=1">
			<span class="pull-right lightgray <?php echo $font;?>">+</span>
			<span class="div-title-underbar-bold border-<?php echo $line;?> <?php echo $font;?>">
				<b>Hit & Cool</b>
			</span>
		</a>
	</div>
	<div class="widget-box">
		<?php echo apms_widget('basic-shop-item-slider', $wid.$wn, 'type=1 auto=0 nav=1 item=5 lg=4', 'auto=0'); $wn++; ?>
	</div>
	<!-- 히트 끝 -->	

	<!-- 베스트 시작 -->
	<div class="div-title-underbar">
		<a href="<?php echo $at_href['itype'];?>?type=4">
			<span class="pull-right lightgray <?php echo $font;?>">+</span>
			<span class="div-title-underbar-bold border-<?php echo $line;?> <?php echo $font;?>">
				<b>Best</b>
			</span>
		</a>
	</div>
	<div class="widget-box">
		<?php echo apms_widget('basic-shop-item-slider', $wid.$wn, 'type=4 auto=0 nav=1 item=5 lg=4', 'auto=0'); $wn++; ?>
	</div>
	<!-- 베스트 끝 -->	

	<!-- 추천 시작 -->
	<div class="div-title-underbar">
		<a href="<?php echo $at_href['itype'];?>?type=2">
			<span class="pull-right lightgray <?php echo $font;?>">+</span>
			<span class="div-title-underbar-bold border-<?php echo $line;?> <?php echo $font;?>">
				<b>Recommend</b>
			</span>
		</a>
	</div>
	<div class="widget-box">
		<?php echo apms_widget('basic-shop-item-slider', $wid.$wn, 'type=2 auto=0 nav=1 item=5 lg=4', 'auto=0'); $wn++; ?>
	</div>
	<!-- 추천 끝 -->	

	<!-- 할인 시작 -->
	<div class="div-title-underbar">
		<a href="<?php echo $at_href['itype'];?>?type=5">
			<span class="pull-right lightgray <?php echo $font;?>">+</span>
			<span class="div-title-underbar-bold border-<?php echo $line;?> <?php echo $font;?>">
				<b>Discount</b>
			</span>
		</a>
	</div>
	<div class="widget-box">
		<?php echo apms_widget('basic-shop-item-slider', $wid.$wn, 'type=5 auto=0 nav=1 item=5 lg=4', 'auto=0'); $wn++; ?>
	</div>
	<!-- 할인 끝 -->	

	<!-- 신상 시작 -->
	<div class="div-title-underbar">
		<a href="<?php echo $at_href['itype'];?>?type=3">
			<span class="pull-right lightgray <?php echo $font;?>">+</span>
			<span class="div-title-underbar-bold border-<?php echo $line;?> <?php echo $font;?>">
				<b>New Arrival</b>
			</span>
		</a>
	</div>
	<div class="widget-box">
		<?php echo apms_widget('basic-shop-item-slider', $wid.$wn, 'type=3 auto=0 nav=1 item=5 lg=4', 'auto=0'); $wn++; ?>
	</div>
	<!-- 신상 끝 -->	

	<?php echo apms_line('fa', 'fa-cube'); // 라인 ?>

	<!-- 상품목록 시작 -->	
	<div class="widget-box">
		<?php echo apms_widget('basic-shop-item-gallery', $wid.$wn, 'rows=10 item=5 lg=4'); $wn++; ?>
	</div>
	<!-- 상품목록 끝 -->	

	<?php echo apms_line('fa', 'fa-commenting'); // 라인 ?>

	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-6">

					<!-- 후기 시작 -->
					<div class="div-title-underbar">
						<a href="<?php echo $at_href['iuse'];?>">
							<span class="pull-right lightgray <?php echo $font;?>">+</span>
							<span class="div-title-underbar-bold border-<?php echo $line;?> <?php echo $font;?>">
								<b>Review</b>
							</span>
						</a>
					</div>
					<div class="widget-box">
						<?php echo apms_widget('basic-shop-post', $wid.$wn, 'mode=use icon={아이콘:star} star=red rows=4 new=blue strong=1,2'); $wn++; ?>
					</div>
					<!-- 후기 끝 -->

				</div>
				<div class="col-sm-6">

					<!-- 문의 시작 -->
					<div class="div-title-underbar">
						<a href="<?php echo $at_href['iqa'];?>">
							<span class="pull-right lightgray <?php echo $font;?>">+</span>
							<span class="div-title-underbar-bold border-<?php echo $line;?> <?php echo $font;?>">
								<b>Q & A</b>
							</span>
						</a>
					</div>
					<div class="widget-box">
						<?php echo apms_widget('basic-shop-post', $wid.$wn, 'mode=qa icon={아이콘:user} rows=4 new=green strong=1,2'); $wn++; ?>
					</div>
					<!-- 문의 끝 -->

				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-6">

					<!-- 댓글 시작 -->
					<div class="div-title-underbar">
						<span class="div-title-underbar-bold border-<?php echo $line;?> <?php echo $font;?>">
							<b>Comment</b>
						</span>
					</div>
					<div class="widget-box">
						<?php echo apms_widget('basic-shop-post', $wid.$wn, 'mode=comment icon={아이콘:comment} rows=4 strong=1'); $wn++; ?>
					</div>
					<!-- 댓글 끝 -->

				</div>
				<div class="col-sm-6">

					<!-- 아이콘 시작 -->
					<div class="div-title-underbar">
						<span class="div-title-underbar-bold border-<?php echo $line;?> <?php echo $font;?>">
							<b>Service</b>
						</span>
					</div>

					<div class="widget-box">
						<?php echo apms_widget('basic-shop-icon'); ?>
					</div>
					<!-- 아이콘 끝 -->

				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">

			<!-- 배너 시작 -->
			<div class="div-title-underbar">
				<span class="div-title-underbar-bold border-<?php echo $line;?> <?php echo $font;?>">
					<b>Banner</b>
				</span>
			</div>
			<div class="widget-box">
				<?php echo apms_widget('basic-shop-banner-slider', $wid.$wn, 'nav=1 item=3 lg=2 md=3 sm=2 xs=2', 'auto=0'); $wn++; ?>
			</div>
			<!-- 배너 끝 -->

		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-6">

					<!-- 정보 시작 -->
					<div class="div-title-underbar">
						<span class="div-title-underbar-bold border-<?php echo $line;?> <?php echo $font;?>">
							<b>Bank Info</b>
						</span>
					</div>
					<div class="widget-box">

						<div class="help-block">
							국민은행 000000-00-000000
							<br>
							기업은행 000-000000-00-000
						</div>

						예금주 홍길동
						
					</div>
					<!-- 정보 끝 -->

				</div>
				<div class="col-sm-6">

					<!-- 고객센터 시작 -->
					<div class="div-title-underbar">
						<a href="<?php echo $at_href['secret'];?>">
							<span class="pull-right lightgray <?php echo $font;?>">+</span>
							<span class="div-title-underbar-bold border-<?php echo $line;?> <?php echo $font;?>">
								<b>CS Center</b>
							</span>
						</a>
					</div>
					<div class="widget-box">
						<div class="en red font-24">
							<i class="fa fa-phone"></i> <b>000.0000.0000</b>
						</div>

						<div class="h10"></div>

						<div class="help-block">
							월-금 : 9:30 ~ 17:30, 토/일/공휴일 휴무
							<br>
							런치타임 : 12:30 ~ 13:30
						</div>

					</div>
					<!-- 고객센터 끝 -->


				</div>
			</div>
		</div>
	</div>

</div>
