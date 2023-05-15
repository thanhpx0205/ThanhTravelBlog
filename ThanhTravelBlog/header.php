<?php
if (isset($_GET["checkout"])) {
	setcookie("user", null, -1, '/');
	header('location:index.php');
}
?>
<!--================Header Menu Area =================-->
<header class="header_area">
	<div class="main_menu">
		<nav class="navbar navbar-expand-lg navbar-light">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<a class="navbar-brand logo_h" href="index.php">
					<img src="img/logo1.jpeg" alt="">
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse"
					data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
					aria-label="Toggle navigation">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
					<ul class="nav navbar-nav menu_nav justify-content-center mx-auto">
						<li class="nav-item">
							<a class="nav-link" href="index.php">Trang Chủ</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="experience.php">Kinh Nghiệm</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="address.php">Lưu Trú</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="food.php">Ẩm Thực</a>
						</li>
						<!-- <li class="nav-item submenu dropdown active">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Pages</a>
								<ul class="dropdown-menu">
									<li class="nav-item">
										<a class="nav-link" href="elements.html">Elements</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="single-blog.html">Post Details</a>
									</li>
								</ul>
							</li> -->
						<li class="nav-item">
							<a class="nav-link" href="contact.php">Liên Hệ</a>
						</li>
						<?php
						if (isset($_COOKIE["user"])) {
							$taikhoan = $_COOKIE["user"];
							foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan='$taikhoan'") as $item) {
								$id_nguoidung = $item['id'];
								$ten = $item['hoten'];
								$anh = $item['anh'];
								$phanquyen = $item['phanquyen'];
							}
							?>

							<li class="nav-item submenu dropdown active">
								<a class="nav-link dropdown-toggle" href="" id="navbarDropdown_3" role="button"
									data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Chào
									<?= $ten ?>
									<!-- <img id="blah" src="<?= empty($anh) ? './img/account/user.png' : './img/account/' . $anh . '' ?>" alt="your image" width="50px" height="50px" /> -->
								</a>
								<ul class="dropdown-menu">
									<?php
									if ($phanquyen == 1) {
										?>
										<li class="nav-item">
											<a class="nav-link" href="admin">Trang quản trị</a>
										</li>
										<?php
									}
									?>
									<li class="nav-item">
										<a class="nav-link" href="infor.php">thông tin tài khoản</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="?checkout">đăng xuất</a>
									</li>
								</ul>
							</li>
							<?php
						} else {
							?>
							<li class="nav-item submenu dropdown active">
								<a class="nav-link dropdown-toggle" href="" id="navbarDropdown_3" role="button"
									data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									tài khoản
								</a>
								<ul class="dropdown-menu">
									<li class="nav-item">
										<a class="nav-link" href="register.php">đăng ký</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="login.php">đăng nhập</a>
									</li>
								</ul>
							</li>

							</li>
							<?php
						}
						?>
					</ul>
					<!-- <ul class="nav navbar-nav ml-auto search">
						<li class="nav-item d-flex align-items-center mr-10">
							<div class="menu-form">
								<form>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Search here">
									</div>
								</form>
							</div>
							<button type="submit" class="search-icon">
								<i class="lnr lnr-magnifier"></i>
							</button>
						</li>
					</ul> -->
				</div>
			</div>
		</nav>
	</div>
</header>
<!--================ Header Menu Area =================-->