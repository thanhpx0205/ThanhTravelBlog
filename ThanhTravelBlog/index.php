<?php
include './connect.php';
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/logo1.jpeg" type="image/png">
	<title>Thanh Travel</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
	<link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
	<link rel="stylesheet" href="vendors/animate-css/animate.css">
	<link rel="stylesheet" href="vendors/jquery-ui/jquery-ui.css">
	<!-- main css -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">
</head>
<style>
	.gradient {
		background: linear-gradient(to right, #30CFD0 0%, #330867 100%);
		background-clip: text;
		color: transparent;
	}
</style>

<body>
	<?php include 'header.php'; ?>
	<!--================ Home Banner Area =================-->
	<section class="home_banner_area">
		<div class="owl-carousel owl-theme" id="home-owl">
			<?php
			foreach (selectAll("SELECT * FROM slide") as $item) {
				?>
				<div class="slide-item owl-lazy" data-src="img/slide/<?= $item['anh'] ?>">
					<div class="container">
						<div class="row">
							<div class="col-lg-5"></div>
							<div class="col-lg-7">
								<div class="blog_text_slider">
									<div class="blog_text">
										<!-- <img class="img-fluid" src="img/slide/<?= $item['anh'] ?>" alt=""> -->
										<div class="main_title">
											<h1 style="color: #40a7ff; text-shadow: 2px 2px 4px #000000;text-align: center">
												<?= $item['ten'] ?>
											</h1>
											<h3 style="color: white; text-shadow: 2px 2px 4px #000000; text-align: center">
												<?= $item['mota'] ?>
											</h3>
										</div>
										<div
											class="blog-meta bottom d-flex justify-content-between align-items-center flex-wrap">
											<div class="meta">
												<!-- <span class="icon fa fa-comments"></span>
												<?= $item['ten'] ?> -->
											</div>
											<div>
												<a class="read_more" href="<?= $item['link'] ?>">Read More</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</section>
	<!--================ End Home Banner Area =================-->

	<!--================ Travel Category Area =================-->
	<section class="travel_category">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="main_title">
						<h1>Kinh Nghiệm Du Lịch.</h1>
						<p>
							Có một thời điểm trong cuộc đời của bất kỳ nhà thiên văn học tham vọng nào,
							đó là thời gian để mua kính viễn vọng đầu tiên.
							Thật thú vị khi nghĩ đến việc xây dựng đài quan sát của riêng bạn.
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row owl-carousel" id="travel_cat">
				<?php
				foreach (selectAll("SELECT * FROM blog WHERE id_danhmuc = 1 && status = 0 LIMIT 8 ") as $item) {
					?>
					<div class="single_travel wow fadeIn" data-wow-duration="1s">
						<figure>
							<img class="img-fluid" src="img/blog/<?= $item['anh1'] ?>" alt=""
								style="width:420px; height:420px;">
						</figure>
						<div class="overlay"></div>
						<div class="text-wrap">
							<h3>
								<a href="detail.php?id=<?= $item['id'] ?>">
									<?= $item['ten'] ?>
								</a>
							</h3>
							<div class="blog-meta white d-flex justify-content-between align-items-center flex-wrap">
								<div class="meta">
									<a href="detail.php?id=<?= $item['id'] ?>">
										<span class="icon fa fa-calendar"></span>
										<?= $item['thoigiantao'] ?>
										<span class="icon fa fa-comments"></span>
										<?= $item['luotxem'] ?>
									</a>
								</div>
								<div>
									<a class="read_more" href="detail.php?id=<?= $item['id'] ?>">Read More</a>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
	<!--================ End Travel Category Area =================-->

	<!--================ Latest Blog Area =================-->
	<section class="latest_blog_post">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="main_title">
						<h1>Bài Viết Mới Nhất.
						</h1>
						<p>
							Có một thời điểm trong cuộc đời của bất kỳ nhà thiên văn học tham vọng nào,
							đó là thời gian để mua kính viễn vọng đầu tiên.
							Thật thú vị khi nghĩ đến việc xây dựng đài quan sát của riêng bạn.
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<?php
				foreach (selectAll("SELECT * FROM blog WHERE status = 0 ORDER BY id DESC LIMIT 6 ") as $key => $value) {
					if ($key == 0) {
						?>
						<a href="detail.php?id=<?= $value['id'] ?>">
							<div class="col-lg-6 col-md-12">
								<div class="single_travel wow fadeInUp" data-wow-duration="1s"
									style="visibility: visible; animation-duration: 1s; animation-name: fadeInUp;">
									<figure>
										<img class="img-fluid w-100" src="img/blog/<?= $value['anh1'] ?>" alt=""
											style="width:556px; height:312px;">
									</figure>
									<div class="overlay"></div>
									<div class="text-wrap">
										<h3>
											<a href="detail.php?id=<?= $value['id'] ?>">
												<?= $value['ten'] ?>
											</a>
										</h3>
										<div
											class="blog-meta white d-flex justify-content-between align-items-center flex-wrap">
											<div class="meta">
												<a href="detail.php?id=<?= $value['id'] ?>">
													<span class="icon fa fa-calendar">
														<?= $value['thoigiantao'] ?>
													</span>
													<span class="icon fa fa-comments">
														<?= $value['luotxem'] ?>
													</span>
												</a>
											</div>
											<div>
												<a class="read_more" href="detail.php?id=<?= $value['id'] ?>">Read
													More</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</a>
					<?php } else if ($key == 1) {
						?>
							<a href="detail.php?id=<?= $value['id'] ?>">

								<div class="col-lg-3 col-md-6">
									<div class="single_travel wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"
										style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeInUp;">
										<figure>
											<!-- <img class="img-fluid w-100" src="img/blog-post/b2.jpg" alt=""> -->
											<img class="img-fluid w-100" src="img/blog/<?= $value['anh1'] ?>" alt=""
												style="width:263px; height:370px;">
										</figure>
										<div class="overlay"></div>
										<div class="text-wrap">
											<h3>
												<a href="detail.php?id=<?= $value['id'] ?>"><?= $value['ten'] ?></a>
											</h3>
											<div
												class="blog-meta white d-flex justify-content-between align-items-center flex-wrap">
												<div class="meta">
													<!-- <a href="detail.php?id=<?= $value['id'] ?>">
														<span class="icon fa fa-calendar"></span>
														<?= $value['thoigiantao'] ?>
														<span class="icon fa fa-comments"></span>
													<?= $value['luotxem'] ?>
													</a> -->
												</div>
												<div>
													<a class="read_more" href="detail.php?id=<?= $value['id'] ?>">Read More</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</a>
					<?php } else if ($key == 2) {
						?>
								<a href="detail.php?id=<?= $value['id'] ?>">
									<div class="col-lg-3 col-md-6">
										<div class="single_travel wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s"
											style="visibility: visible; animation-duration: 1s; animation-delay: 0.4s; animation-name: fadeInUp;">
											<figure>
												<img class="img-fluid w-100" src="img/blog/<?= $value['anh1'] ?>" alt=""
													style="width:263px; height:370px;">
											</figure>
											<div class="overlay"></div>
											<div class="text-wrap">
												<h3>
													<a href="detail.php?id=<?= $value['id'] ?>"><?= $value['ten'] ?></a>
												</h3>
												<div
													class="blog-meta white d-flex justify-content-between align-items-center flex-wrap">
													<div class="meta">
														<!-- <a href="detail.php?id=<?= $value['id'] ?>">
															<span class="icon fa fa-calendar"></span>
																<?= $value['thoigiantao'] ?>
															<span class="icon fa fa-comments"></span>
																<?= $value['luotxem'] ?>
														</a> -->
													</div>
													<div>
														<a class="read_more" href="detail.php?id=<?= $value['id'] ?>">Read More</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</a>
					<?php } else if ($key == 3) {
						?>
									<a href="detail.php?id=<?= $value['id'] ?>">
										<div class="col-lg-3 col-md-6">
											<div class="single_travel wow fadeInUp mt--60" data-wow-duration="1s" data-wow-delay=".6s"
												style="visibility: visible; animation-duration: 1s; animation-delay: 0.6s; animation-name: fadeInUp;">
												<figure>
													<img class="img-fluid w-100" src="img/blog/<?= $value['anh1'] ?>" alt=""
														style="width:263px; height:370px;">
												</figure>
												<div class="overlay"></div>
												<div class="text-wrap">
													<h3>
														<a href="detail.php?id=<?= $value['id'] ?>"><?= $value['ten'] ?></a>
													</h3>
													<div
														class="blog-meta white d-flex justify-content-between align-items-center flex-wrap">
														<div class="meta">
															<!-- <a href="detail.php?id=<?= $value['id'] ?>">
																<span class="icon fa fa-calendar"></span>
													<?= $value['thoigiantao'] ?>
																<span class="icon fa fa-comments"></span>
													<?= $value['luotxem'] ?>
															</a> -->
														</div>
														<div>
															<a class="read_more" href="detail.php?id=<?= $value['id'] ?>">Read More</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</a>
					<?php } else if ($key == 4) {
						?>
										<a href="detail.php?id=<?= $value['id'] ?>">
											<div class="col-lg-3 col-md-6">
												<div class="single_travel wow fadeInUp mt--60" data-wow-duration="1s" data-wow-delay=".6s"
													style="visibility: visible; animation-duration: 1s; animation-delay: 0.6s; animation-name: fadeInUp;">
													<figure>
														<img class="img-fluid w-100" src="img/blog/<?= $value['anh1'] ?>" alt=""
															style="width:263px; height:370px;">
													</figure>
													<div class="overlay"></div>
													<div class="text-wrap">
														<h3>
															<a href="detail.php?id=<?= $value['id'] ?>"><?= $value['ten'] ?></a>
														</h3>
														<div
															class="blog-meta white d-flex justify-content-between align-items-center flex-wrap">
															<div class="meta">
																<!-- <a href="detail.php?id=<?= $value['id'] ?>">
																	<span class="icon fa fa-calendar"></span>
													<?= $value['thoigiantao'] ?>
																	<span class="icon fa fa-comments"></span>
													<?= $value['luotxem'] ?>
																</a> -->
															</div>
															<div>
																<a class="read_more" href="detail.php?id=<?= $value['id'] ?>">Read More</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</a>
					<?php } else if ($key == 5) {
						?>
											<a href="detail.php?id=<?= $value['id'] ?>">
												<div class="col-lg-6 col-md-12">
													<div class="single_travel wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s"
														style="visibility: visible; animation-duration: 1s; animation-delay: 1s; animation-name: fadeInUp;">
														<figure>
															<img class="img-fluid w-100" src="img/blog/<?= $value['anh1'] ?>" alt=""
																style="width:556px; height:312px;">
														</figure>
														<div class="overlay"></div>
														<div class="text-wrap">
															<h3>
																<a href="detail.php?id=<?= $value['id'] ?>"><?= $value['ten'] ?></a>

															</h3>
															<div
																class="blog-meta white d-flex justify-content-between align-items-center flex-wrap">
																<div class="meta">
																	<a href="detail.php?id=<?= $value['id'] ?>">
																		<span class="icon fa fa-calendar"></span>
													<?= $value['thoigiantao'] ?>
																		<span class="icon fa fa-comments"></span>
													<?= $value['luotxem'] ?>
																	</a>
																</div>
																<div>
																	<a class="read_more" href="detail.php?id=<?= $value['id'] ?>">Read More</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</a>
						<?php
					} ?>
					<?php
				} ?>
			</div>
			<!-- <div class="row">
				<div class="offset-lg-7 col-lg-4">
					<div class="blog-meta bottom d-flex justify-content-end align-items-center">
						<div>
							<a class="read_more" href="#">Load More Posts</a>
						</div>
					</div>
				</div>
			</div> -->
		</div>
	</section>
	<!--================ End Latest Blog Area =================-->

	<!--================ Places Area =================-->
	<section class="different_places">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="main_title">
						<h1>Hãy Để Chúng Tôi Tìm Địa Điểm Cho Bạn Trong Vòng Một Giây.</h1>
						<p>
							Có một thời điểm trong cuộc đời của bất kỳ nhà thiên văn học tham vọng nào,
							đó là thời gian để mua kính viễn vọng đầu tiên.
							Thật thú vị khi nghĩ đến việc xây dựng đài quan sát của riêng bạn.
						</p>
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid">
			<div class="row">
				<?php
				foreach (selectAll("SELECT * FROM blog WHERE  id_danhmuc = 1 && status = 0 LIMIT 6 ") as $key => $value) {
					if ($key == 0) {
						?>
						<div class="col-lg-3 col-md-6">
							<div class="single_place wow fadeIn text-center mt-480" data-wow-duration="1s">
								<!-- <img class="img-fluid w-100" src="img/places/p1.jpg" alt=""> -->
								<img class="img-fluid w-100" src="img/blog/<?= $value['anh1'] ?>" alt=""
									style="width:329px; height:350px;">
								<div class="overlay"></div>
								<h4>
									<a href="detail.php?id=<?= $value['id'] ?>" style="color: white;"><?= $value['ten'] ?></a>
								</h4>
							</div>
						</div>
					<?php } else if ($key == 1) {
						?>
							<div class="col-lg-3 col-md-6">
								<div class="single_place wow fadeIn text-center mt-240" data-wow-duration="1s" data-wow-delay=".2s">
									<img class="img-fluid w-100" src="img/blog/<?= $value['anh1'] ?>" alt=""
										style="width:329px; height:350px;">
									<div class="overlay"></div>
									<h4>
										<a href="detail.php?id=<?= $value['id'] ?>" style="color: white;"><?= $value['ten'] ?></a>
									</h4>
								</div>
						<?php } else if ($key == 2) {
						?>
									<div class="single_place wow fadeIn text-center" data-wow-duration="1s" data-wow-delay="1s">
										<img class="img-fluid w-100" src="img/blog/<?= $value['anh1'] ?>" alt=""
											style="width:329px; height:350px;">
										<div class="overlay"></div>
										<h4>
											<a href="detail.php?id=<?= $value['id'] ?>" style="color: white;"><?= $value['ten'] ?></a>
										</h4>
									</div>
								</div>
					<?php } else if ($key == 3) {
						?>
									<div class="col-lg-3 col-md-6">
										<div class="single_place wow fadeIn text-center" data-wow-duration="1s" data-wow-delay=".4s">
											<img class="img-fluid w-100" src="img/blog/<?= $value['anh1'] ?>" alt=""
												style="width:329px; height:350px;">
											<div class="overlay"></div>
											<h4>
												<a href="detail.php?id=<?= $value['id'] ?>" style="color: white;"><?= $value['ten'] ?></a>
											</h4>
										</div>
						<?php } else if ($key == 4) {
						?>
											<div class="single_place wow fadeIn text-center" data-wow-duration="1s" data-wow-delay=".8s">
												<img class="img-fluid w-100" src="img/blog/<?= $value['anh1'] ?>" alt=""
													style="width:329px; height:350px;">
												<div class="overlay"></div>
												<h4>
													<a href="detail.php?id=<?= $value['id'] ?>" style="color: white;"><?= $value['ten'] ?></a>
												</h4>
											</div>
										</div>
					<?php } else if ($key == 5) {
						?>
											<div class="col-lg-3 col-md-6">
												<div class="single_place wow fadeIn text-center mt-240" data-wow-duration="1s" data-wow-delay=".6s">
													<img class="img-fluid w-100" src="img/blog/<?= $value['anh1'] ?>" alt=""
														style="width:329px; height:350px;">
													<div class="overlay"></div>
													<h4>
														<a href="detail.php?id=<?= $value['id'] ?>" style="color: white;"><?= $value['ten'] ?></a>
													</h4>
												</div>
											</div>
					<?php }
				}
				?>
			</div>
		</div>
	</section>
	<!--================ End Places Area =================-->

	<!--================ Popular Post Area =================-->
	<section class="popular_post">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="main_title">
						<h1>Bài Viết Phổ Biến.</h1>
						<p>
							Có một thời điểm trong cuộc đời của bất kỳ nhà thiên văn học tham vọng nào,
							đó là thời gian để mua kính viễn vọng đầu tiên.
							Thật thú vị khi nghĩ đến việc xây dựng đài quan sát của riêng bạn.
						</p>
					</div>
				</div>
			</div>

			<div class="row">
				<?php
				foreach (selectAll("SELECT * FROM blog WHERE status = 0 ORDER BY luotxem DESC LIMIT 9 ") as $item) {
					?>
				<a href="detail.php?id=<?= $item['id'] ?>">
					<div class="col-lg-4 col-md-6">
						<div class="single-popular-post d-flex align-items-center flex-row">
							<div class="icon">
								<img class="img-fluid" src="img/blog/<?= $item['anh1'] ?>" alt=""
								style="width:110px; height:120px;">
							</div>
							<div class="desc">
								<h4>
									<a href="detail.php?id=<?= $item['id'] ?>">
										<?= $item['ten'] ?>
									</a>
								</h4>
								<div class="blog-meta d-flex justify-content-between align-items-center flex-wrap">
									<div class="meta">
										<a href="detail.php?id=<?= $item['id'] ?>">
											<span class="icon fa fa-calendar"></span>
											<?= $item['thoigiantao'] ?>
											<span class="icon fa fa-comments"></span>
											<?= $item['luotxem'] ?>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</a>
				<?php } ?>
			</div>
		</div>
	</section>
	<!--================ End Popular Post Area =================-->

	<?php include 'footer.php'; ?>

	<!-- ####################### Start Scroll to Top Area ####################### -->
	<div id="back-top">
		<a title="Go to Top" href="#">
			<i class="fa fa-angle-up"></i>
		</a>
	</div>
	<!-- ####################### End Scroll to Top Area ####################### -->

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/stellar.js"></script>
	<script src="vendors/lightbox/simpleLightbox.min.js"></script>
	<script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
	<script src="vendors/isotope/isotope-min.js"></script>
	<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="vendors/jquery-ui/jquery-ui.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/mail-script.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	<script src="js/theme.js"></script>
</body>

</html>