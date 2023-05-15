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
                        <h2>Đăng Ký</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end-->

    <!--================login_part Area =================-->
    <section class="login_part ">
        <div class="container">
            <!-- <div class="row align-items-center "> -->
            <!-- <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>New to our Shop?</h2>
                            <p>There are advances being made in science and technology everyday, and a good example of this is the</p>
                            <a href="#" class="btn_3">Create an Account</a>
                        </div>
                    </div>
                </div> -->
            <div class="col-lg-6 col-md-6" style="margin:auto;">
                <div class="login_part_form">

                    <div class="login_part_form_iner">
                        <h3 style='margin-bottom: 30px;'>Tạo Tài Khoản</h3>

                        <?php
                        if (isset($_POST["dangky"])) {
                            $ten = $_POST["ten"];
                            $email = $_POST["email"];
                            $sdt = $_POST["sdt"];
                            $matkhau = ($_POST["matkhau"]);
                            $nlmatkhau = ($_POST["nlmatkhau"]);
                            if ($ten != "") {
                                if ($email != "") {
                                    if ($sdt != "") {
                                        if ($matkhau != "") {
                                            if ($matkhau !== $nlmatkhau) {
                                                $error = 'Nhập lại mật khẩu không chính xác';
                                            } else {
                                                if (rowCount("SELECT * FROM taikhoan WHERE taikhoan='$email'") > 0) {
                                                    $error = 'Tài khoản đã có người sử dụng';
                                                } else {
                                                    selectAll("INSERT INTO taikhoan VALUES (NULL,'$email','$matkhau','$ten','','$sdt','','0','0')");
                                                    $success = 'Đăng ký thành công, vui lòng đăng nhập';
                                                }
                                                header('location:login.php');
                                            }
                                        } else {
                                            $error = 'Mật khẩu không được để trống';
                                        }
                                    } else {
                                        $error = 'SDT không được để trống';
                                    }
                                } else {
                                    $error = 'Email không được để trống';
                                }
                            } else {
                                $error = 'Họ tên không được để trống';
                            }

                        }
                        ?>

                        <form class="row contact_form" action="" method="post" novalidate="novalidate">

                            <?php
                            if (isset($error)) {
                                ?>
                                <p class="text-danger ml-3 mb-3" style=" text-align: center;">
                                    <?= $error ?>
                                </p>
                                <?php
                            }
                            if (isset($success)) {
                                ?>
                                <p class="text-success ml-3 mb-3">
                                    <?= $success ?>
                                </p>
                                <?php
                            }
                            ?>

                            <div class="col-md-12 form-group p_star">
                                <input type="text" name="ten" class="form-control" required value=""
                                    placeholder="Họ Tên" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="email" class="form-control" name="email" value="" placeholder="Email"
                                    required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" name="sdt" value="" placeholder="SDT" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" name="matkhau" value=""
                                    placeholder="Mật Khẩu" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" name="nlmatkhau" value=""
                                    placeholder="Nhập Lại Mật Khẩu" required>
                            </div>
                            <div class="col-md-12 form-group" style='display: flex;'>
                                <div class="col-md-8 form-group">
                                    <button type="submit" name="dangky" value="submit"
                                        class="genric-btn success-border circle">
                                        ĐĂNG KÝ
                                    </button>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <a href="login.php" class="genric-btn success-border circle"
                                        style="text-align: center">
                                        Quay về Đăng Nhập
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- </div> -->
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