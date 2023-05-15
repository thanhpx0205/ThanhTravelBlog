<?php
include 'header.php';
if (isset($_COOKIE["user"])) {
  $user = $_COOKIE["user"];
  foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan='$user'") as $row) {
    $permission = $row['phanquyen'];
  }
  if ($permission == 1) {
    if (isset($_POST['them'])) {
      $ten = $_POST["ten"];
      $id_danhmuc = $_POST["danhmuc"];
      $id_thanhpho = $_POST["thanhpho"];
      $anh1 = $_FILES['anh1']['name'];
      $tmp1 = $_FILES['anh1']['tmp_name'];
      $type1 = $_FILES['anh1']['type'];
      $chitiet = $_POST["chitiet"];
      $dir = '../img/blog/';
      move_uploaded_file($tmp1, $dir . $anh1);
      
      if (empty($_POST["chitiet"])) {
        selectAll("INSERT INTO blog VALUES(NULL,$id_danhmuc,$id_thanhpho,'$ten','$anh1','<p></p>','$today',NULL,0,1)");
        header('location:blog.php');
      } else {
        selectAll("INSERT INTO blog VALUES(NULL,$id_danhmuc,$id_thanhpho,'$ten','$anh1','$chitiet','$today',NULL,0,1)");
        header('location:blog.php');
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
                <h4 class="card-title">Thêm Blog</h4>
                <form class="forms-sample" action="" method="post" enctype="multipart/form-data">

                  <div class="form-group">
                    <label for="exampleInputName1">Tiêu Đề Blog</label>
                    <input type="text" name="ten" required class="form-control text-light" placeholder="Nhập tiêu đề">
                  </div>

                  <div class="form-group">
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

                  <div class="form-group">
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

                  <div class="form-group">
                    <label>Ảnh Thumbnail</label>
                    <input type="file" name="anh1" class="form-control">

                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Chi Tiết</label>
                    <textarea name="chitiet" class="form-control text-light tinymce" rows="9"
                      placeholder="Nhập chi tiết"></textarea>
                  </div>

                  <button type="submit" name="them" class="btn btn-primary mr-2">Thêm blog</button>
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