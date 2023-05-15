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
                        <h2>Thông Tin Tài Khoản</h2>
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
                        <?php
                        foreach (selectAll("SELECT * FROM taikhoan WHERE id=$id_nguoidung") as $item) {
                            $tencu = $item['hoten'];
                            $taikhoancu = $item['taikhoan'];
                            $sdtcu = $item['sdt'];
                            $anh = $item['anh'];
                            $loaitk = $item['phanquyen'];
                            $diachicu = $item['diachi'];
                        }

                        if (isset($_POST["doithongtin"])) {
                            $hoten = $_POST["hoten"];
                            $sdt = $_POST["sdt"];
                            $diachi = $_POST["diachi"];
                            $anh1 = $_FILES['anh1']['name'];
                            $tmp1 = $_FILES['anh1']['tmp_name'];
                            $type1 = $_FILES['anh1']['type'];
                            $dir = './img/account/';
                            move_uploaded_file($tmp1, $dir . $anh1);
                            if (empty($anh1)) {
                                selectAll("UPDATE taikhoan SET hoten='$hoten',sdt='$sdt', diachi='$diachi' WHERE id=$id_nguoidung");
                            } else {
                                selectAll("UPDATE taikhoan SET hoten='$hoten', anh='$anh1', sdt='$sdt', diachi='$diachi' WHERE id=$id_nguoidung");
                            }
                            echo "<script>alert('Đổi thông tin thành công')</script>";
                            echo "<meta http-equiv='refresh' content='0'>";
                        }
                        ?>

                        <form class="row contact_form" action="" method="post" novalidate="novalidate"
                            enctype="multipart/form-data">


                            <div class="col-md-12 form-group p_star">
                                <p>Tài Khoản (Email)</p>
                                <input type="email" class="form-control" name="email" value="<?= $taikhoancu ?>"
                                    placeholder="Email" required readonly>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <p>Họ Tên*</p>
                                <input type="text" name="hoten" class="form-control" required value="<?= $tencu ?>"
                                    placeholder="Họ Tên" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <p>SDT*</p>
                                <input type="text" class="form-control" name="sdt" value="<?= $sdtcu ?>"
                                    placeholder="SDT" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <p>Địa Chỉ*</p>
                                <textarea type="text" id="diachi" class="form-control" cols="70" rows="2" name="diachi"
                                    placeholder="Nhập địa chỉ" required><?= $diachicu ?></textarea>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <p>Ảnh Đại Diện</p>
                                <label for="exampleInputEmail1">Chọn Ảnh</label>
                                <label for="imgInp" style="cursor:pointer">
                                    <img id="blah"
                                        src="<?= empty($anh) ? './img/account/user.png' : './img/account/' . $anh . '' ?>"
                                        alt="your image" width="50px" height="50px" />
                                </label>
                                <input hidden type="file" name="anh1" accept="image/*" id="imgInp" class="form-control">
                            </div>

                            <div class="col-md-12 form-group">
                                <a href="password.php"
                                    class="genric-btn primary-border small col-md-4 form-group p_star"
                                    style="float:right">Đổi
                                    mật khẩu</a>

                                <button type="submit" name="doithongtin"
                                    class="genric-btn success-border circle col-md-12 form-group">
                                    Cập Nhật
                                </button>

                                <a href="index.php" class="genric-btn danger-border circle col-md-12 form-group p_star"
                                    style="text-align: center">
                                    Hủy
                                </a>
                            </div>
                            <script>
                                imgInp.onchange = evt => {
                                    const [file] = imgInp.files
                                    if (file) {
                                        blah.src = URL.createObjectURL(file)
                                    }
                                }
                            </script>
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