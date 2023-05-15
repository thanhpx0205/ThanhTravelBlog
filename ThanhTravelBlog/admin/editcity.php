<?php
include 'header.php';
if (isset($_COOKIE["user"])) {
    $user = $_COOKIE["user"];
    foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan='$user'") as $row) {
        $permission = $row['phanquyen'];
    }
    if ($permission == 1) {
        if (isset($_GET["id"])) {
            foreach (selectAll("SELECT * FROM thanhpho WHERE id_tp={$_GET["id"]}") as $item) {
                $tentp = $item['thanhpho'];
            }
            ;
        }
        if (isset($_POST['sua'])) {
            $thanhpho = $_POST["thanhpho"];
            $anh1 = $_FILES['anh1']['name'];
            $tmp1 = $_FILES['anh1']['tmp_name'];
            $type1 = $_FILES['anh1']['type'];
            $dir = '../img/city/';
            move_uploaded_file($tmp1, $dir . $anh1);
            if (empty($_FILES['anh1']['name'])) {
                selectAll("UPDATE thanhpho SET thanhpho='$thanhpho' WHERE id_tp={$_GET['id']}");
                header('location:city.php');
            } else {
                selectAll("UPDATE thanhpho SET thanhpho='$thanhpho',anh1='$anh1' WHERE id_tp={$_GET['id']}");
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
                            <div class="card-body addfont">
                                <h4 class="card-title">Thành Phố </h4>
                                <div class="table-responsive">
                                    <form action="" method="post" class="card-body" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="text" value="<?= $tentp ?>" class="form-control text-light"
                                                name="thanhpho" required placeholder="Thành Phố">
                                        </div>
                                        <div class="form-group addfont">
                                            <label>Ảnh Thành Phố</label>
                                            <input type="file" name="anh1" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-success btn-fw" style=" margin-top:30px;"
                                            name="sua">Sửa Thành Phố</button>
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