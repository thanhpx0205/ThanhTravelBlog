<?php
include 'header.php';

if (isset($_COOKIE["user"])) {
  $user = $_COOKIE["user"];
  foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan='$user'") as $row) {
    $permission = $row['phanquyen'];
  }
  if ($permission == 1) {
    if (isset($_GET["id"])) {
      foreach (selectAll("SELECT * FROM blog WHERE id={$_GET['id']}") as $item) {
        $ten = $item['ten'];
        $id_danhmuc = $item['id_danhmuc'];
        $id_thanhpho = $item["id_thanhpho"];
        $chitiet = $item['chitiet'];
      }
    }
    if (isset($_POST['sua'])) {
      $ten = $_POST["ten"];
      $id_danhmuc = $_POST["danhmuc"];
      $id_thanhpho = $_POST["thanhpho"];
      $anh1 = $_FILES['anh1']['name'];
      $tmp1 = $_FILES['anh1']['tmp_name'];
      $type1 = $_FILES['anh1']['type'];
      $chitiet = $_POST["chitiet"];
      $dir = '../img/blog/';
      move_uploaded_file($tmp1, $dir . $anh1);

      if (empty($_FILES['anh1']['name'])) {
        if (!empty($_POST["chitiet"])) {
          selectAll("UPDATE blog SET ten='$ten',id_danhmuc='$id_danhmuc', id_thanhpho='$id_thanhpho',chitiet='$chitiet', thoigian_update='$today' WHERE id={$_GET['id']}");
          header('location:blog.php');
        } 
        else {
          selectAll("UPDATE blog SET ten='$ten',id_danhmuc='$id_danhmuc', id_thanhpho='$id_thanhpho',chitiet='<p></p>', thoigian_update='$today' WHERE id={$_GET['id']}");
          header('location:blog.php');
        }
      } else {

        if (!empty($_POST["chitiet"])) {
          selectAll("UPDATE blog SET ten='$ten',id_danhmuc='$id_danhmuc', id_thanhpho='$id_thanhpho',anh1='$anh1',chitiet='$chitiet', thoigian_update='$today' WHERE id={$_GET['id']}");
          header('location:blog.php');
        } 
        else {
          selectAll("UPDATE blog SET ten='$ten',id_danhmuc='$id_danhmuc', id_thanhpho='$id_thanhpho',anh1='$anh1',chitiet='<p></p>', thoigian_update='$today' WHERE id={$_GET['id']}");
          header('location:blog.php');
        }
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
                <h4 class="card-title addfont">Sửa Blog</h4>
                <form class="forms-sample" action="" method="post" enctype="multipart/form-data">

                  <div class="form-group addfont">
                    <label for="exampleInputName1">Tiêu Đề Blog</label>
                    <input type="text" value="<?= $ten ?>" name="ten" required class="form-control text-light"
                      placeholder="Nhập tiêu đề blog">
                  </div>

                  <div class="form-group addfont">
                    <label for="exampleInputEmail3">Danh mục</label>
                    <select required name="danhmuc" id="input" class="form-control text-light">
                      <?php
                      foreach (selectAll("SELECT * FROM danhmuc ") as $item) {
                        ?>
                        <option value="<?= $item['id_dm'] ?>"><?= $item['danhmuc'] ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>

                  <div class="form-group addfont">
                    <label for="exampleInputEmail3">Thành Phố</label>
                    <select required name="thanhpho" id="input" class="form-control text-light">
                      <?php
                      foreach (selectAll("SELECT * FROM thanhpho ") as $item) {
                        ?>
                        <option value="<?= $item['id_tp'] ?>"><?= $item['thanhpho'] ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>

                  <div class="form-group addfont">
                    <label>Ảnh Thumbnail</label>
                    <input type="file" name="anh1" class="form-control">
                  </div>

                  <div class="form-group addfont">
                    <label for="exampleTextarea1">Chi Tiết</label>
                    <textarea type="text" name="chitiet" required class="form-control text-light tinymce" style="line-height: 2"
                      rows="6" placeholder="Nhập chi tiết"><?= $chitiet ?></textarea>
                  </div>

                  <button type="submit" name="sua" class="btn btn-primary mr-2">Sửa Blog</button>
                  <a class="btn btn-dark" href="blog.php">Hủy</a>
                </form>
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