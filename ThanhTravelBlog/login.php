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
    .header_bg {
        background-color: #f1f9ff;
        height: 230px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .padding_top1 {
        padding-top: 20px;
    }

    .a1 {
        padding-top: 130px;
    }

    .a2 {
        height: 230px;

    }
</style>

<body>
    <?php include 'header.php'; ?>
    
    <!--================Home Banner Area =================-->
  <!-- breadcrumb start-->
  <section class="breadcrumb header_bg">
        <div class="container">
            <div class="row justify-content-center a2">
                <div class="col-lg-8 a2">
                        <div class="a1">
                            <h2>Đăng Nhập</h2>
                        </div>
                </div>
            </div>
        </div>
    </section>
  <!-- breadcrumb end-->

    <!--================login_part Area =================-->
    <section class="login_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>Mới đến cửa hàng của chúng tôi?</h2>
                            <p>Vui lòng đăng ký tài khoản để có trải nghiệm tốt nhất</p>
                            <a href="register.php" class="btn_3">Đăng ký</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Chào Mừng Trở Lại ! <br> Đăng Nhập Ngay</h3>
                            <?php
                                if (isset($_POST["dangnhap"])) {
                                    $email = ($_POST["email"]);
                                    $matkhau = ($_POST["matkhau"]);
                                    if (rowCount("SELECT * FROM taikhoan WHERE taikhoan='$email' && matkhau='$matkhau' && status =0") == 1) {
                                        setcookie('user', $email, time() + (86400 * 30), "/");
                                        header('location:index.php');
                                    } 
                                    else if (rowCount("SELECT * FROM taikhoan WHERE status =1") == 1){
                                        $error = 'Tài khoản của bạn đã bị khóa. Vui lòng liên hệ admin';
                                    }
                                    else{
                                        $error = 'Tài khoản hoặc mật khẩu không chính xác. Vui lòng kiểm tra lại';
                                    }
                                }
                            ?>
                            <form class="row contact_form" action="" method="post" novalidate="novalidate">
                                <?php
                                    if (isset($error)) {
                                    ?>
                                        <p class="text-danger ml-3 mb-3"><?= $error ?></p>
                                    <?php
                                    }
                                ?>
                                <div class="col-md-12 form-group p_star exampleInputName1 padding_top1">
                                    <input type="text" class="form-control "  name="email" value="" required placeholder="Tài khoản (Email)">
                                </div>
                                <div class="col-md-12 form-group p_star padding_top1">
                                    <input type="password" class="form-control" name="matkhau" value="" required placeholder="Mật khẩu">
                                </div>
                                <div class="col-md-12 form-group padding_top1">
                                    <!-- <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="f-option" name="selector">
                                        <label for="f-option">Remember me</label>
                                    </div> -->
                                    <button type="submit" name="dangnhap" class="genric-btn success-border circle">
                                        ĐĂNG NHẬP
                                    </button>
                                    <!-- <a class="lost_pass" href="#">quên mật khẩu?</a> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->

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