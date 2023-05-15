<?php
for ($i = 1; $i <= 12; $i++) {
  $tongview[$i] = 0;
  $tongluotxem[$i] = 0;
  $kinhnghiem[$i] = 0;
  $luutru[$i] = 0;
  $amthuc[$i] = 0;
  $tongkinhnghiem[$i] = 0;
  $tongluutru[$i] = 0;
  $tongamthuc[$i] = 0;

}
if (isset($_COOKIE["user"])) {
  $user = $_COOKIE["user"];
  foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan='$user'") as $row) {
    $permission = $row['phanquyen'];
  }
  if ($permission == 1) {

    for ($i = 1; $i <= 12; $i++) {
      if ($i < 10) {
        $start = '2022-0' . $i . '-01 00:00:00';
        $end = '2022-0' . $i . '-31 23:59:59';
      } else {
        $start = '2022-' . $i . '-01 00:00:00';
        $end = '2022-' . $i . '-31 23:59:59';
      }
      foreach (selectAll("SELECT * FROM blog WHERE thoigiantao BETWEEN '$start' AND '$end' && status=0 ") as $item) {
        $tongview[$i] += $item['luotxem'];
      }
      ${"tongview" . $i} = $tongview[$i];

      foreach (selectAll("SELECT * FROM blog WHERE thoigiantao BETWEEN '$start' AND '$end' && status=0 && id_danhmuc = 1") as $item) {
        $kinhnghiem[$i] += $item['luotxem'];
      }
      ${"kinhnghiem" . $i} = $kinhnghiem[$i];

      foreach (selectAll("SELECT * FROM blog WHERE thoigiantao BETWEEN '$start' AND '$end' && status=0 && id_danhmuc = 2") as $item) {
        $luutru[$i] += $item['luotxem'];
      }
      ${"luutru" . $i} = $luutru[$i];

      foreach (selectAll("SELECT * FROM blog WHERE thoigiantao BETWEEN '$start' AND '$end' && status=0 && id_danhmuc = 3") as $item) {
        $amthuc[$i] += $item['luotxem'];
      }
      ${"amthuc" . $i} = $amthuc[$i];
    }

    for ($i = 1; $i <= 12; $i++) {
      if ($i < 10) {
        $start = '2023-0' . $i . '-01 00:00:00';
        $end = '2023-0' . $i . '-31 23:59:59';
      } else {
        $start = '2023-' . $i . '-01 00:00:00';
        $end = '2023-' . $i . '-31 23:59:59';
      }
      foreach (selectAll("SELECT * FROM blog WHERE thoigiantao BETWEEN '$start' AND '$end' && status=0 ") as $item) {
        $tongluotxem[$i] += $item['luotxem'];
      }
      ${"tongluotxem" . $i} = $tongluotxem[$i];
      foreach (selectAll("SELECT * FROM blog WHERE thoigiantao BETWEEN '$start' AND '$end' && status=0 && id_danhmuc = 1 ") as $item) {
        $tongkinhnghiem[$i] += $item['luotxem'];
      }
      ${"tongkinhnghiem" . $i} = $tongkinhnghiem[$i];

      foreach (selectAll("SELECT * FROM blog WHERE thoigiantao BETWEEN '$start' AND '$end' && status=0 && id_danhmuc = 2") as $item) {
        $tongluutru[$i] += $item['luotxem'];
      }
      ${"tongluutru" . $i} = $tongluutru[$i];

      foreach (selectAll("SELECT * FROM blog WHERE thoigiantao BETWEEN '$start' AND '$end' && status=0 && id_danhmuc = 3") as $item) {
        $tongamthuc[$i] += $item['luotxem'];
      }
      ${"tongamthuc" . $i} = $tongamthuc[$i];
    }
    ?>
    <?php
    $dataPoints2 = array(
      array("y" => $tongview1),
      array("y" => $tongview2),
      array("y" => $tongview3),
      array("y" => $tongview4),
      array("y" => $tongview5),
      array("y" => $tongview6),
      array("y" => $tongview7),
      array("y" => $tongview8),
      array("y" => $tongview9),
      array("y" => $tongview10),
      array("y" => $tongview11),
      array("y" => $tongview12),
    );

    $dataPoints = array(
      array("label" => "Jan", "y" => $tongluotxem1),
      array("label" => "Feb", "y" => $tongluotxem2),
      array("label" => "Mar", "y" => $tongluotxem3),
      array("label" => "Apr", "y" => $tongluotxem4),
      array("label" => "May", "y" => $tongluotxem5),
      array("label" => "Jun", "y" => $tongluotxem6),
      array("label" => "Jul", "y" => $tongluotxem7),
      array("label" => "Aug", "y" => $tongluotxem8),
      array("label" => "Sep", "y" => $tongluotxem9),
      array("label" => "Oct", "y" => $tongluotxem10),
      array("label" => "Nov", "y" => $tongluotxem11),
      array("label" => "Dec", "y" => $tongluotxem12),
    );

    ?>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="page-header">
          <h3 class="page-title"> Thống Kê </h3>
        </div>
        <div class="row">
          <div class="col-lg-12 grid-margin ">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Năm</h4>
                <canvas id="barChart2023" style="height:250px"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">2022</h4>
                <canvas id="pieChart22" style="height:250px"></canvas>
              </div>
            </div>
          </div>
          <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">2023</h4>
                <canvas id="pieChart" style="height:250px"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- partial -->
      <script src="./js/search.js?v=<?php echo time() ?>"></script>
      <!-- <script src="./js/chart.js"></script> -->
      <script>
        var dataPoints = <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>;
        var dataPoints2 = <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>;
        var ctx = document.getElementById("barChart2023").getContext("2d");
        var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: dataPoints.map(dp => dp.label),
            datasets: [
              {
                label: '2022',
                data: dataPoints2.map(dp => dp.y),
                backgroundColor: 'rgba(184, 134, 11, 0.2)',
                borderColor: 'rgba(184, 134, 11, 1)',
                borderWidth: 1
              },
              {
                label: '2023',
                data: dataPoints.map(dp => dp.y),
                backgroundColor: 'rgba(100, 149, 237, 0.2)',
                borderColor: 'rgba(100, 149, 237, 1)',
                borderWidth: 1
              }
            ]
          },
          options: {
            responsive: true,
            onClick: function (e, items) {
              var activePoints = myChart.getElementsAtEvent(e);
              var firstPoint = activePoints[0];
              if (firstPoint !== undefined) {
                var label = myChart.data.labels[firstPoint._index];
                updatePieChart22(label);
                updatePieChart(label);
                console.log('Clicked on ' + label + ': Sales=' + value1 + ', Expenses=' + value2);
              }
            },
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true
                }
              }]
            }
          }
        });

        var pieData22 = {
          labels: [
            'Kinh Nghiệm',
            'Lưu Trú',
            'Ẩm Thực'
          ],
          datasets: [{
            data: [0, 0],
            backgroundColor: [
              'rgb(54, 162, 235)',
              'rgb(255, 99, 132)',
              'rgb(255, 205, 86)',
            ],
            hoverOffset: 4
          }]
        };
        var pieChart22 = new Chart(document.getElementById("pieChart22"), {
          type: 'pie',
          data: pieData22,
        });

        var pieData = {
          labels: [
            'Kinh Nghiệm',
            'Lưu Trú',
            'Ẩm Thực'
          ],
          datasets: [{
            data: [0, 0],
            backgroundColor: [
              'rgb(54, 162, 235)',
              'rgb(255, 99, 132)',
              'rgb(255, 205, 86)',

            ],
            hoverOffset: 4
          }]
        };
        function updatePieChart22(label) {
          var kinhnghiem1 = 0;
          var luutru1 = 0;
          var amthuc1 = 0;
          switch (label) {
            case "Jan":
              kinhnghiem1 = "<?php echo $kinhnghiem1; ?>";
              luutru1 = "<?php echo $luutru1; ?>";
              amthuc1 = "<?php echo $amthuc1; ?>";
              break;
            case "Feb":
              kinhnghiem1 = "<?php echo $kinhnghiem2; ?>";
              luutru1 = "<?php echo $luutru2; ?>";
              amthuc1 = "<?php echo $amthuc2; ?>";
              break;
            case "Mar":
              kinhnghiem1 = "<?php echo $kinhnghiem3; ?>";
              luutru1 = "<?php echo $luutru3; ?>";
              amthuc1 = "<?php echo $amthuc3; ?>";
              break;
            case "Apr":
              kinhnghiem1 = "<?php echo $kinhnghiem4; ?>";
              luutru1 = "<?php echo $luutru4; ?>";
              amthuc1 = "<?php echo $amthuc4; ?>";
              break;
            case "May":
              kinhnghiem1 = "<?php echo $kinhnghiem5; ?>";
              luutru1 = "<?php echo $luutru5; ?>";
              amthuc1 = "<?php echo $amthuc5; ?>";
              break;
            case "Jun":
              kinhnghiem1 = "<?php echo $kinhnghiem6; ?>";
              luutru1 = "<?php echo $luutru6; ?>";
              amthuc1 = "<?php echo $amthuc6; ?>";
              break;
            case "Jul":
              kinhnghiem1 = "<?php echo $kinhnghiem7; ?>";
              luutru1 = "<?php echo $luutru7; ?>";
              amthuc1 = "<?php echo $amthuc7; ?>";
              break;
            case "Aug":
              kinhnghiem1 = "<?php echo $kinhnghiem8; ?>";
              luutru1 = "<?php echo $luutru8; ?>";
              amthuc1 = "<?php echo $amthuc8; ?>";
              break;
            case "Sep":
              kinhnghiem1 = "<?php echo $kinhnghiem9; ?>";
              luutru1 = "<?php echo $luutru9; ?>";
              amthuc1 = "<?php echo $amthuc9; ?>";
              break;
            case "Oct":
              kinhnghiem1 = "<?php echo $kinhnghiem10; ?>";
              luutru1 = "<?php echo $luutru10; ?>";
              amthuc1 = "<?php echo $amthuc10; ?>";
              break;
            case "Nov":
              kinhnghiem1 = "<?php echo $kinhnghiem11; ?>";
              luutru1 = "<?php echo $luutru11; ?>";
              amthuc1 = "<?php echo $amthuc11; ?>";
              break;
            case "Dec":
              kinhnghiem1 = "<?php echo $kinhnghiem12; ?>";
              luutru1 = "<?php echo $luutru12; ?>";
              amthuc1 = "<?php echo $amthuc12; ?>";
              break;
          }
          pieChart22.data.datasets[0].data = [kinhnghiem1, luutru1, amthuc1];
          pieChart22.update();
        }

        var pieChart = new Chart(document.getElementById("pieChart"), {
          type: 'pie',
          data: pieData,
        });
        function updatePieChart(label) {
          var tongkinhnghiem = 0;
          var tongluutru = 0;
          var tongamthuc = 0;
          switch (label) {
            case "Jan":
              tongkinhnghiem = <?php echo $tongkinhnghiem1; ?>;
              tongluutru = "<?php echo $tongluutru1; ?>";
              tongamthuc = "<?php echo $tongamthuc1; ?>";
              break;
            case "Feb":
              tongkinhnghiem = <?php echo $tongkinhnghiem2; ?>;
              tongluutru = "<?php echo $tongluutru2; ?>";
              tongamthuc = "<?php echo $tongamthuc2; ?>";
              break;
            case "Mar":
              tongkinhnghiem = <?php echo $tongkinhnghiem3; ?>;
              tongluutru = "<?php echo $tongluutru3; ?>";
              tongamthuc = "<?php echo $tongamthuc3; ?>";
              break;
            case "Apr":
              tongkinhnghiem = <?php echo $tongkinhnghiem4; ?>;
              tongluutru = "<?php echo $tongluutru4; ?>";
              tongamthuc = "<?php echo $tongamthuc4; ?>";
              break;
            case "May":
              tongkinhnghiem = <?php echo $tongkinhnghiem5; ?>;
              tongluutru = "<?php echo $tongluutru5; ?>";
              tongamthuc = "<?php echo $tongamthuc5; ?>";
              break;
            case "Jun":
              tongkinhnghiem = <?php echo $tongkinhnghiem6; ?>;
              tongluutru = "<?php echo $tongluutru6; ?>";
              tongamthuc = "<?php echo $tongamthuc6; ?>";
              break;
            case "Jul":
              tongkinhnghiem = <?php echo $tongkinhnghiem7; ?>;
              tongluutru = "<?php echo $tongluutru7; ?>";
              tongamthuc = "<?php echo $tongamthuc7; ?>";
              break;
            case "Aug":
              tongkinhnghiem = <?php echo $tongkinhnghiem8; ?>;
              tongluutru = "<?php echo $tongluutru8; ?>";
              tongamthuc = "<?php echo $tongamthuc8; ?>";
              break;
            case "Sep":
              tongkinhnghiem = <?php echo $tongkinhnghiem9; ?>;
              tongluutru = "<?php echo $tongluutru9; ?>";
              tongamthuc = "<?php echo $tongamthuc9; ?>";
              break;
            case "Oct":
              tongkinhnghiem = <?php echo $tongkinhnghiem10; ?>;
              tongluutru = "<?php echo $tongluutru10; ?>";
              tongamthuc = "<?php echo $tongamthuc10; ?>";
              break;
            case "Nov":
              tongkinhnghiem = <?php echo $tongkinhnghiem11; ?>;
              tongluutru = "<?php echo $tongluutru11; ?>";
              tongamthuc = "<?php echo $tongamthuc11; ?>";
              break;
            case "Dec":
              tongkinhnghiem = <?php echo $tongkinhnghiem12; ?>;
              tongluutru = "<?php echo $tongluutru12; ?>";
              tongamthuc = "<?php echo $tongamthuc12; ?>";
              break;
          }
          pieChart.data.datasets[0].data = [tongkinhnghiem, tongluutru, tongamthuc];
          pieChart.update();
        }

      </script>
      <script src="./js/search.js?v=<?php echo time() ?>"></script>

      <?php
  }
}
include 'footer.php';
?>