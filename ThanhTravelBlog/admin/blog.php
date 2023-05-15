<?php 
    include 'header.php';
    if (isset($_COOKIE["user"])) {
        $user = $_COOKIE["user"];
        foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan='$user'") as $row) {
            $permission = $row['phanquyen'];
        }
        
        if ($permission==1) {
            if (isset($_GET["id"])) {
              if(rowCount("SELECT * FROM blog WHERE id={$_GET['id']} && status=1 ")>0){
                selectall("UPDATE blog SET status=0 WHERE id={$_GET["id"]} && status=1");
                header('location:blog.php');
              }
              else {
                selectall("UPDATE blog SET status=1 WHERE id={$_GET["id"]} && status=0");
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
                                <h4 class="card-title addfont">Blog</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="addfont" style="width: 20px">STT</th>
                                                <th class="addfont" style="width: 400px" >Tên Blog</th>
                                                <th class="addfont" >Danh Mục</th>
                                                <th class="addfont" >Thành Phố</th>
                                                <th class="addfont" >Lượt Xem</th>
                                                <th class="addfont" >Trạng Thái</th>
                                                <th></th>
                                                <th><a type="button" class="btn btn-success btn-fw" style="width: 204px" href="addblog.php">Thêm Blog</a></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php 
                                        $stt=1;
                                        $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:8;
                                        $current_page = !empty($_GET['page'])?$_GET['page']:1;
                                        $offset = ($current_page - 1) * $item_per_page;
                                        $numrow = rowCount("SELECT * FROM blog");
                                        $totalpage = ceil($numrow / $item_per_page);
                                        foreach (selectAll("SELECT * FROM blog INNER JOIN danhmuc ON blog.id_danhmuc = danhmuc.id_dm INNER JOIN thanhpho ON blog.id_thanhpho = thanhpho.id_tp LIMIT $item_per_page OFFSET $offset") as $row) {
                                        ?>
                                            <tr class="addfont">
                                                <td><?= $stt++ ?></td>
                                                <td>
                                                <p style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width: 300px; padding-top: 12px;" ><?= $row['ten'] ?></p>
                                                </td>
                                                <td>
                                                  <?= ($row['danhmuc']) ?>
                                                </td>
                                                <td>
                                                  <?= ($row['thanhpho']) ?>
                                                </td>
                                                <td><?= number_format($row['luotxem']) ?></td>
                                                <td>
                                                  <?php 
                                                    $status = $row['status'];
                                                    if ($status==0) {
                                                      ?>
                                                      <span>Đang Hiện</span>
                                                  <?php 
                                                    }else{
                                                      ?>
                                                      <span>Đang Ẩn</span>
                                                  <?php
                                                    }
                                                  ?>
                                                </td>
                                                <td></td>
                                                <td>
                                                <a type="button" class="btn btn-primary btn-icon-text" href="editblog.php?id=<?= $row['id'] ?>">
                                                <i class="mdi mdi-file-check btn-icon-prepend"></i> Sửa </a>
                                                <?php 
                                                    $status = $row['status'];
                                                    if ($status==0) {
                                                      ?>
                                                      <a type="button" class="btn btn-danger btn-icon-text" style="width: 120px" href="?id=<?= $row['id'] ?>" onclick="return confirm('Bạn có muốn ẩn blog này trên website không?')">
                                                      <i class="mdi mdi-eye-off-outline btn-icon-prepend"></i> Ẩn Blog </a>
                                                  <?php 
                                                    }else{
                                                      ?>
                                                      <a type="button" class="btn btn-secondary btn-icon-text" style="width: 120px" href="?id=<?= $row['id'] ?>" onclick="return confirm('Bạn có muốn hiện blog này trên website không?')">
                                                      <i class="mdi mdi-eye-outline btn-icon-prepend"></i> Hiện Blog </a>
                                                  <?php
                                                    }
                                                  ?>
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                    
                                    <div class="col-lg-12">
                                      <div class="pageination">
                                          <nav aria-label="Page navigation example">
                                              <ul class="pagination justify-content-center">
                                                  <?php for($num = 1; $num <=$totalpage;$num++) { ?>
                                                      <?php 
                                                          if ($num != $current_page){ 
                                                      ?>
                                                          <?php if ($num > $current_page-3 && $num < $current_page+3){ ?>
                                                          <li class="page-item"><a class="btn btn-outline-secondary" href="?per_page=<?=$item_per_page?>&page=<?=$num?>"><?=$num?></a></li>
                                                          <?php } ?>
                                                      <?php 
                                                      } 
                                                      else{ 
                                                      ?>
                                                        <strong class="page-item"><a class="btn btn-outline-secondary"><?=$num?></a></strong>
                                                      <?php
                                                      }
                                                  } 
                                                  ?>
                                          </nav>
                                      </div>
                                  </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <script src="./js/search.js?v=<?php echo time()?>"></script>
            <?php
        }
    }
 include 'footer.php';
 ?>

