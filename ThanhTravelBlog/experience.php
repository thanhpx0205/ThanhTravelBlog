<?php
include './connect.php';
$idDanhmuc = 1;
$link = 'experience.php';
$title = 'Kinh Nghiệm';

?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/logo1.jpeg" type="image/png">

	<title>
		<?= $title ?>
	</title>
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
	.img-post {
		height: 60px;
		width: 100px;
		background-position: cover;
		background-repeat: no-repeat;
		background-size: cover;
	}

	.img-city {
		height: 370px;
		width: 380px;
		background-position: cover;
		background-repeat: no-repeat;
		background-size: cover;
	}
</style>

<body>

	<?php include 'header.php'; ?>

	<!--================ Banner Area =================-->
	<section class="home_banner_area banner_area">
		<div class="container">
			<div class="row">
				<div class="col-lg-5"></div>
				<div class="col-lg-7">
					<div class="blog_text_slider">
						<div class="blog_text">
							<!-- <img class="img-fluid" src="img/banner/banner-img3.png" alt=""> -->
							<div class="blog-meta bottom d-flex justify-content-start align-items-center flex-wrap">
								<div>
									<a class="read_more" href="index.php">Trang Chủ</a>
									<span class="lnr lnr-arrow-right"></span>
									<a class="read_more" href="#">
										<?= $title ?>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Banner Area =================-->

	<!--================Category Area =================-->
	<section class="category_area section-gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="row">
						<?php
						if (isset($_GET['tim'])) {
							$keyword = $_GET['tim'];
							$item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 6;
							$current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
							$offset = ($current_page - 1) * $item_per_page;
							$numrow = rowCount("SELECT DISTINCT thanhpho.id_tp, thanhpho.thanhpho FROM blog INNER JOIN thanhpho ON blog.id_thanhpho = thanhpho.id_tp WHERE blog.id_danhmuc= $idDanhmuc && thanhpho.thanhpho LIKE '%$keyword%'");
							$totalpage = ceil($numrow / $item_per_page);
							if (rowCount("SELECT DISTINCT thanhpho.id_tp, thanhpho.thanhpho FROM blog INNER JOIN thanhpho ON blog.id_thanhpho = thanhpho.id_tp WHERE blog.id_danhmuc= $idDanhmuc && thanhpho.thanhpho LIKE '%$keyword%'") > 0) {
								foreach (selectAll("SELECT DISTINCT thanhpho.id_tp, thanhpho.thanhpho, blog.id_danhmuc, thanhpho.anh1 FROM blog INNER JOIN thanhpho ON blog.id_thanhpho = thanhpho.id_tp WHERE blog.id_danhmuc= $idDanhmuc && thanhpho.thanhpho LIKE '%$keyword%' LIMIT $item_per_page OFFSET $offset") as $row) {
									?>
									<a href="listblog.php?id_dm=<?= $row['id_danhmuc'] ?>&id_tp=<?= $row['id_tp'] ?>">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="single_travel wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
												<figure>
													<img class="img-fluid w-100 img-city" src="img/cities/<?= $row['anh1'] ?>"
														alt="">
												</figure>
												<div class="overlay"></div>
												<div class="text-wrap">
													<h3>
														<a
															href="listblog.php?id_dm=<?= $row['id_danhmuc'] ?>&id_tp=<?= $row['id_tp'] ?>">
															<?= $row['thanhpho'] ?>
														</a>
													</h3>
													<div
														class="blog-meta white d-flex justify-content-between align-items-center flex-wrap">
														<div class="meta">
															<a href="#">
																<span class="icon fa fa-calendar"></span> March 14, 2018
																<span class="icon fa fa-comments"></span> 05
															</a>
														</div>
														<div>
															<a class="read_more" href="#">Read More</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</a>
									<?php
								}
							} else {
								?>
								<p class>Không tìm thấy thành phố.</p>
								<div class="br"></div>
								<a href="<?= $link ?>">
									Quay lại
								</a>
								<?php
							} ?>
						</div>

						<div class="row">
							<div class="col-lg-12">
								<nav class="blog-pagination justify-content-center d-flex">
									<ul class="pagination">
										<?php
										if ($current_page > 1) {
											$prev_page = $current_page - 1;
											?>
											<li class="page-item">
												<a href="?tim=<?= $keyword ?>&per_page=<?= $item_per_page ?>&page=<?= $prev_page ?>"
													class="page-link" aria-label="Previous">
													<span aria-hidden="true">
														<span class="lnr lnr-chevron-left"></span>
													</span>
												</a>
											</li>
											<?php
										} ?>
										<?php for ($num = 1; $num <= $totalpage; $num++) { ?>
											<?php
											if ($num != $current_page) {
												?>
												<?php if ($num > $current_page - 3 && $num < $current_page + 3) { ?>
													<li class="page-item">
														<a class="page-link"
															href="?tim=<?= $keyword ?>&per_page=<?= $item_per_page ?>&page=<?= $num ?>"><?= $num ?></a>
													</li>
												<?php } ?>
												<?php
											} else {
												?>
												<li class="page-item active"><a
														href="?tim=<?= $keyword ?>&per_page=<?= $item_per_page ?>&page=<?= $num ?>"
														class="page-link"><?= $num ?></a></li>
												<?php
											}
										}
										?>

										<?php
										if ($current_page < $totalpage - 1) {
											$next_page = $current_page + 1;
											?>
											<li class="page-item">
												<a href="?tim=<?= $keyword ?>&per_page=<?= $item_per_page ?>&page=<?= $next_page ?>"
													class="page-link" aria-label="Next">
													<span aria-hidden="true">
														<span class="lnr lnr-chevron-right"></span>
													</span>
												</a>
											</li>
											<?php
										} ?>
									</ul>
								</nav>
							</div>
						</div>
						<?php
						} else {
							$item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 6;
							$current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
							$offset = ($current_page - 1) * $item_per_page;
							$numrow = rowCount("SELECT DISTINCT thanhpho.id_tp, thanhpho.thanhpho FROM blog INNER JOIN thanhpho ON blog.id_thanhpho = thanhpho.id_tp WHERE blog.id_danhmuc= $idDanhmuc && status = 0");
							$totalpage = ceil($numrow / $item_per_page);
							foreach (selectAll(" SELECT DISTINCT thanhpho.id_tp, thanhpho.thanhpho, blog.id_danhmuc, thanhpho.anh1 FROM blog INNER JOIN thanhpho ON blog.id_thanhpho = thanhpho.id_tp WHERE blog.id_danhmuc= $idDanhmuc && status = 0 LIMIT $item_per_page OFFSET $offset") as $row) {
								?>
							<a href="listblog.php?id_dm=<?= $row['id_danhmuc'] ?>&id_tp=<?= $row['id_tp'] ?>">
								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="single_travel wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
										<figure>
											<img class="img-fluid w-100 img-city" src="img/cities/<?= $row['anh1'] ?>" alt="">
										</figure>
										<div class="overlay"></div>
										<div class="text-wrap">
											<h3>
												<a
													href="listblog.php?id_dm=<?= $row['id_danhmuc'] ?>&id_tp=<?= $row['id_tp'] ?>">
													<?= $row['thanhpho'] ?>
												</a>
											</h3>
											<div
												class="blog-meta white d-flex justify-content-between align-items-center flex-wrap">
												<div class="meta">
													<a href="#">
														<span class="icon fa fa-calendar"></span> March 14, 2018
														<span class="icon fa fa-comments"></span> 05
													</a>
												</div>
												<div>
													<a class="read_more" href="#">Read More</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</a>
							<?php
							}
							?>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<nav class="blog-pagination justify-content-center d-flex">
								<ul class="pagination">
									<?php
									if ($current_page > 1) {
										$prev_page = $current_page - 1;
										?>
										<li class="page-item">
											<a href="?per_page=<?= $item_per_page ?>&page=<?= $prev_page ?>" class="page-link"
												aria-label="Previous">
												<span aria-hidden="true">
													<span class="lnr lnr-chevron-left"></span>
												</span>
											</a>
										</li>
										<?php
									} ?>
									<?php for ($num = 1; $num <= $totalpage; $num++) { ?>
										<?php
										if ($num != $current_page) {
											?>
											<?php if ($num > $current_page - 3 && $num < $current_page + 3) { ?>
												<li class="page-item">
													<a class="page-link" href="?per_page=<?= $item_per_page ?>&page=<?= $num ?>"><?= $num ?></a>
												</li>
											<?php } ?>
											<?php
										} else {
											?>
											<li class="page-item active"><a href="?per_page=<?= $item_per_page ?>&page=<?= $num ?>"
													class="page-link"><?= $num ?></a></li>
											<?php
										}
									}
									?>

									<?php
									if ($current_page < $totalpage - 1) {
										$next_page = $current_page + 1;
										?>
										<li class="page-item">
											<a href="?per_page=<?= $item_per_page ?>&page=<?= $next_page ?>" class="page-link"
												aria-label="Next">
												<span aria-hidden="true">
													<span class="lnr lnr-chevron-right"></span>
												</span>
											</a>
										</li>
										<?php
									} ?>
								</ul>
							</nav>
						</div>
					</div>
					<?php
						} ?>
			</div>
			<div class="col-lg-4">
				<div class="blog_right_sidebar">
					<aside class="single_sidebar_widget search_widget">
						<form class="input-group" method="GET" autocomplete="off">
							<input type="text" class="form-control" name="tim" placeholder="Tìm thành phố">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="lnr lnr-magnifier"></i></button>
							</span>
						</form><!-- /input-group -->
						<div class="br"></div>
					</aside>
					<aside class="single_sidebar_widget author_widget">
						<img class="author_img img-fluid" src="img/avatar.jpg" alt="">
						<h4>Phạm Xuân Thành </h4>
						<p>Admin Thành Travel</p>

						<p>Boot camps have its supporters andit sdetractors. Some people do not understand why
							you
							should have to spend
							money
							on boot camp when you can get. Boot camps have itssuppor ters andits detractors.</p>
						<div class="social_icon">
							<a href="https://www.facebook.com/thanhpx.haui"><i class="fa fa-facebook"></i></a>
							<a href="https://twitter.com/pxt_it_haui"><i class="fa fa-twitter"></i></a>
							<a href="https://www.instagram.com/pxt_taurus_2k1"><i class="fa fa-instagram"></i></a>
							<a href="#"><i class="fa fa-github"></i></a>
						</div>
						<div class="br"></div>
					</aside>
					<aside class="single_sidebar_widget popular_post_widget">
						<h3 class="widget_title">Bài Viết Phổ Biến</h3>
						<?php
						foreach (selectAll("SELECT * FROM blog WHERE status = 0  ORDER BY luotxem DESC LIMIT 3") as $item) {
							?>
							<div class="media post_item">
								<img class="img-post" src="img/blog/<?= $item['anh1'] ?>" alt="post">
								<div class="media-body">
									<a href="detail.php?id=<?= $item['id'] ?>">
										<h3>
											<?= $item['ten'] ?>
										</h3>
									</a>
									<p>
										<?= $item['thoigiantao'] ?>
									</p>
								</div>
							</div>
							<?php
						}
						?>
						<div class="br"></div>
					</aside>

					<aside class="single_sidebar_widget popular_post_widget">
						<h3 class="widget_title">Bài Viết Mới Nhất</h3>
						<?php
						foreach (selectAll("SELECT * FROM blog WHERE status = 0 ORDER BY id DESC LIMIT 3 ") as $item) {
							?>
							<div class="media post_item">
								<img class="img-post" src="img/blog/<?= $item['anh1'] ?>" alt="post">
								<div class="media-body">
									<a href="detail.php?id=<?= $item['id'] ?>">
										<h3>
											<?= $item['ten'] ?>
										</h3>
									</a>
									<p>
										<?= $item['thoigiantao'] ?>
									</p>
								</div>
							</div>
							<?php
						}
						?>
						<div class="br"></div>
					</aside>
				</div>
			</div>
		</div>
		</div>
	</section>
	<!--================Category Area =================-->

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