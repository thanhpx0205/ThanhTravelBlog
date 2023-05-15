<?php
include 'header.php';
if (isset($_COOKIE["user"])) {
    $user = $_COOKIE["user"];
    foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan='$user'") as $row) {
        $permission = $row['phanquyen'];
    }
    if ($permission == 1) {
        if (isset($_POST['them'])) {
            $thanhpho = $_POST["thanhpho"];
            $anh1 = $_FILES['anh1']['name'];
            $tmp1 = $_FILES['anh1']['tmp_name'];
            $type1 = $_FILES['anh1']['type'];
            $dir = '../img/cities/';
            move_uploaded_file($tmp1, $dir . $anh1);

            if (rowCount("SELECT * FROM thanhpho WHERE thanhpho='$thanhpho'") > 0) {
                echo "<script>alert('Thành Phố đã tồn tại!')</script>";
            } else {
                selectAll("INSERT INTO thanhpho VALUES (NULL,'$thanhpho','$anh1')");
                header('location:city.php');
            }
        }
        ?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row ">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Thành Phố</h4>
                                <div class="table-responsive">
                                    <form action="" method="post" class="card-body" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Tên Thành Phố</label>
                                            <input type="text" class="form-control text-light" name="thanhpho" required
                                                placeholder="Thành Phố">
                                        </div>

                                        <div class="form-group">
                                            <label>Ảnh Thành Phố</label>
                                            <input type="file" name="anh1" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-success btn-fw" style=" margin-top:30px;"
                                            name="them">Thêm Thành Phố</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
    }
}
include 'footer.php';
?>