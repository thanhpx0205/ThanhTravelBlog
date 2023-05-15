<?php
include './connect.php';

if (isset($_GET["id"])) {
    $idBlog = $_GET['id'];
    selectAll("UPDATE blog SET luotxem=luotxem+1 WHERE id=$idBlog");
    foreach (selectAll("SELECT * FROM blog WHERE id=$idBlog") as $row) {
        $tenblog = $row['ten'];
        $anh1 = $row['anh1'];
        $luotxem = $row['luotxem'];
        $cateid = $row['id_danhmuc'];
        $cityid = $row['id_thanhpho'];
        $chitiet = $row['chitiet'];
        $thoigiantao = $row['thoigiantao'];
        $thoigianupdate = $row['thoigian_update'];
        $status = $row['status'];
        foreach (selectAll("SELECT * FROM danhmuc WHERE id_dm={$row['id_danhmuc']}") as $item) {
            $tendanhmuc = $item['danhmuc'];
        }
        foreach (selectAll("SELECT * FROM thanhpho WHERE id_tp={$row['id_thanhpho']}") as $item) {
            $tenthanhpho = $item['thanhpho'];
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/logo1.jpeg" type="image/png">

    <title>Chi Tiết Blog</title>
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
    .thumbnail {
        height: 350px;
        width: 770px;
        background-position: cover;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .img-post {
        height: 60px;
        width: 100px;
        background-position: cover;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .form-rep {
        display: none;
        margin-bottom: 1 0px;

    }

    .avatar-cmt {
        height: 60px;
        width: 60px;
        background-position: cover;
        background-repeat: no-repeat;
        background-size: cover;
        border-radius: 50%;
    }

    .showformrepcmt:checked+.form-rep {
        display: block;
        margin-bottom: 50px;
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
                            <img class="img-fluid" src="img/banner/post-details-img.png" alt="">
                            <div class="blog-meta bottom d-flex justify-content-start align-items-center flex-wrap">
                                <div>
                                    <a class="read_more" href="#">Danh Sách Blog</a>
                                    <span class="lnr lnr-arrow-right"></span>
                                    <a class="read_more" href="#">Chi Tiết Blog</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Banner Area =================-->

    <!--================Blog Area =================-->
    <section class="blog_area section-gap single-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="main_blog_details">
                        <img class="img-fluid thumbnail" src="img/blog/<?= $anh1 ?>" alt="">
                        <h4>
                            <?= $tenblog ?>
                        </h4>
                        <div class="user_details">
                            <div class="float-left">
                                <a>
                                    <?= $tendanhmuc ?>
                                </a>
                                <a>
                                    <?= $tenthanhpho ?>
                                </a>
                            </div>
                            <div class="float-right">
                                <div class="media">
                                    <div class="media-body">
                                        <h5>Admin</h5>
                                        <p>
                                            <?= $thoigiantao ?>
                                        </p>
                                    </div>
                                    <div class="d-flex">
                                        <img src="img/avatar.jpg" alt="" style="height: 40px; width: 40px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?= $chitiet ?>
                        <div class="news_d_footer">
                            <!-- <a href="#"><i class="lnr lnr lnr-heart"></i>Lily and 4 people like this</a>
                            <a class="justify-content-center ml-auto" href="#"><i class="lnr lnr lnr-bubble"></i>06
                                Comments</a>
                            <div class="news_socail ml-auto">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                <a href="#"><i class="fa fa-rss"></i></a>
                            </div> -->
                        </div>
                    </div>
                    <!-- <div class="navigation-area">
                        <div class="row">
                            <div
                                class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                <div class="thumb">
                                    <a href="#"><img class="img-fluid" src="img/blog/prev.jpg" alt=""></a>
                                </div>
                                <div class="arrow">
                                    <a href="#"><span class="lnr text-white lnr-arrow-left"></span></a>
                                </div>
                                <div class="detials">
                                    <p>Prev Post</p>
                                    <a href="#">
                                        <h4>A Discount Toner</h4>
                                    </a>
                                </div>
                            </div>
                            <div
                                class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                <div class="detials">
                                    <p>Next Post</p>
                                    <a href="#">
                                        <h4>Cartridge Is Better</h4>
                                    </a>
                                </div>
                                <div class="arrow">
                                    <a href="#"><span class="lnr text-white lnr-arrow-right"></span></a>
                                </div>
                                <div class="thumb">
                                    <a href="#"><img class="img-fluid" src="img/blog/next.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="comments-area">
                        <h4 style="margin-bottom: 16px;">
                            <?php
                            $count = 0;
                            foreach (selectAll("SELECT * FROM `binhluan` WHERE id_blog=$idBlog") as $item) {
                                $count++;
                            }
                            echo $count . " Bình luận";
                            ?>
                        </h4>
                        <?php
                        if (isset($_POST["repcomment"])) {
                            if (isset($_COOKIE["user"])) {
                                $noidungtraloi = $_POST["noidungtraloi"];
                                $idbinhluan = $_POST["idbinhluan"];
                                $taikhoan = $_COOKIE["user"];
                                foreach (selectAll("SELECT * FROM `taikhoan` WHERE taikhoan='$taikhoan'") as $item) {
                                    $id_nguoidung = $item['id'];
                                }
                                selectAll("INSERT INTO `tlbinhluan` VALUES (NULL,$idbinhluan, $id_nguoidung,'$noidungtraloi', '$today')");
                                echo "<meta http-equiv='refresh' content='0'>";
                            } else {
                                echo "<script>alert('Vui lòng đăng nhập để bình luận')</script>";
                            }
                        }
                        ?>
                        <?php
                        foreach (selectAll("SELECT * FROM binhluan WHERE id_blog=$idBlog") as $row) {
                            ?>
                            <?php
                            foreach (selectAll("SELECT * FROM taikhoan WHERE id={$row['id_taikhoan']}") as $item) {
                                ?>
                                <div class="comment-list" style="padding: 24px 0 0 0">
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img class="avatar-cmt"
                                                    src="img/account/<?= empty($item['anh']) ? 'user.png' : $item['anh'] ?>"
                                                    alt="">
                                            </div>
                                            <div class="desc">
                                                <h5><a href="#">
                                                        <?= $item['hoten'] ?>
                                                    </a></h5>
                                                <p class="date">
                                                    <?= $row['thoigian'] ?>
                                                </p>
                                                <p class="comment">
                                                    <?= $row['noidung'] ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="reply-btn">
                                            <label for="showcomment<?= $row['id'] ?>" class="btn-reply text-capitalize">
                                                Trả lời
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="review_item reply">
                                    <input type="checkbox" class="showformrepcmt" name="" id="showcomment<?= $row['id'] ?>"
                                        hidden>
                                    <form action="" method="POST" class="form-rep">
                                        <input type="text" name="idbinhluan" value="<?= $row['id'] ?>" hidden>
                                        <textarea class="form-control" name="noidungtraloi"
                                            style="width:100%;height:100px;resize:none" id="" cols="30" rows="10"
                                            placeholder="Nhập nội dung trả lời"></textarea>
                                        <button type="submit" name="repcomment" class="genric-btn primary-border small"
                                            style="float: left; margin-top:10px;">Gửi</button>
                                    </form>
                                </div>

                                <?php
                                foreach (selectAll("SELECT * FROM tlbinhluan WHERE id_binhluan={$row['id']}") as $repcmt) {
                                    foreach (selectAll("SELECT * FROM taikhoan WHERE id={$repcmt['id_taikhoan']}") as $item) {
                                        ?>
                                        <div class="comment-list" style="padding: 16px 0px 8px 36px">
                                            <div class="single-comment justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb">
                                                        <img class="avatar-cmt"
                                                            src="img/account/<?= empty($item['anh']) ? 'user.png' : $item['anh'] ?>"
                                                            alt="">
                                                    </div>
                                                    <div class="desc">
                                                        <h5><a href="#">
                                                                <?= $item['hoten'] ?>
                                                            </a></h5>
                                                        <p class="date">
                                                            <?= $repcmt['thoigian'] ?>
                                                        </p>
                                                        <p class="comment">
                                                            <?= $repcmt['noidung'] ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <!-- <div class="reply-btn">
                                                    <a href="" class="btn-reply text-capitalize">reply</a>
                                                </div> -->
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                        }
                        ?>
                    </div>
                    <div class="comment-form">
                        <h4>Bình luận bài viết</h4>
                        <?php
                        if (isset($_POST["comment"])) {
                            if (isset($_COOKIE["user"])) {
                                $noidung = $_POST["noidung"];
                                $taikhoan = $_COOKIE["user"];
                                foreach (selectAll("SELECT * FROM `taikhoan` WHERE taikhoan='$taikhoan'") as $item) {
                                    $id_nguoidung = $item['id'];
                                }
                                selectAll("INSERT INTO `binhluan` VALUES (NULL, $id_nguoidung, $idBlog,'$noidung', '$today')");
                                echo "<meta http-equiv='refresh' content='0'>";
                            } else {
                                echo "<script>alert('Vui lòng đăng nhập để bình luận')</script>";
                            }
                        }
                        ?>
                        <form action="" method="post" novalidate="novalidate">
                            <div class="form-group">
                                <textarea class="form-control" name="noidung" id=""
                                    placeholder="Nhập nội dung bình luận"></textarea>
                            </div>
                            <div class="col-md-12 text-right">
                                <button type="submit" name="comment" class="primary-btn submit_btn">Gửi</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <!-- <aside class="single_sidebar_widget search_widget">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Tìm bài viết">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i
                                            class="lnr lnr-magnifier"></i></button>
                                </span>
                            </div>
                            <div class="br"></div>
                        </aside> -->
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
    <!--================Blog Area =================-->

    <?= include 'footer.php' ?>

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