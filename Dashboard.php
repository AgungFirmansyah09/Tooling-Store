<?php
$koneksi    = mysqli_connect("localhost", "root", "", "db_toolingstore");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DASHBOARD TOOLING STORE</title>
  <link href="docs\assets\img\Logo-Header2.png"  rel="shortcut icon"/>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">

<section class="content" style="padding-top: 20px; padding-left: 20px; padding-right: 20px;">
  <div class="container-fluid">
    <h1 style="font-family: Arial, Helvetica, sans-serif; ">
      <strong><center><i class="fas fa-chart-line"></i> DASHBOARD TOOLING STORE</center></strong></h1><hr>
    <div class="row">
      <div class="col-md-3">
        <!-- DONUT CHART CUTTING DIES-->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">CUTTING DIES</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <canvas id="cutting-dies" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            <?php 
              $info = mysqli_query($koneksi,"SELECT * FROM print_qr_ct_dies");
              $total = mysqli_num_rows($info);
            ?>
            <TABLE>
              <tr style="color: #00c0ef;">
                <th><i class="far fa-square"></i> IN NCVS</th>
                <td>: <?php 
                $Jml_ncvs = mysqli_query($koneksi,"SELECT * FROM print_qr_ct_dies WHERE lokasi='NCVS'");
                $JML_ct_ncvs = mysqli_num_rows($Jml_ncvs);
                ?>
                <?php echo $JML_ct_ncvs; ?>
                <i class="fas fa-arrow-right"></i> 
                
                <?php echo round(($JML_ct_ncvs/$total)*100, 2); ?> %
               </td>
              </tr>
              
              <tr style="color: #00a65a;">
                <th><i class="far fa-square"></i> IN STORE</th>
                <td>: <?php 
                $Jml_ncvs = mysqli_query($koneksi,"SELECT * FROM print_qr_ct_dies WHERE lokasi='TOOLING STORE'");
                $JML_ct_ts = mysqli_num_rows($Jml_ncvs);
                ?>
                <?php echo $JML_ct_ts; ?>
                <i class="fas fa-arrow-right"></i> 
                
                <?php echo round(($JML_ct_ts/$total)*100, 2); ?> %
               </td>
              </tr>

              <tr style="color: #f56954;">
                <th><i class="far fa-square"></i> RETURN</th>
                <td>: <?php 
                $Jml_ncvs = mysqli_query($koneksi,"SELECT * FROM print_qr_ct_dies WHERE lokasi='RETURN'");
                $JML_ct_rt = mysqli_num_rows($Jml_ncvs);
                ?>
                <?php echo $JML_ct_rt; ?>
                <i class="fas fa-arrow-right"></i> 
                
                <?php echo round(($JML_ct_rt/$total)*100, 2);?> %
               </td>
              </tr>
            </TABLE>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <div class="col-md-3">
        <!-- DONUT CHART PAD PRESS -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">PAD PRESS</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <canvas id="pad-press" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            <?php 
              $info = mysqli_query($koneksi,"SELECT * FROM print_qr_pad_press");
              $total = mysqli_num_rows($info);
            ?>
            <TABLE>
              <tr style="color: #00c0ef;">
                <th><i class="far fa-square"></i> IN NCVS</th>
                <td>: <?php 
                $Jml_ncvs = mysqli_query($koneksi,"SELECT * FROM print_qr_pad_press WHERE lokasi='NCVS'");
                $JML = mysqli_num_rows($Jml_ncvs);
                ?>
                <?php echo $JML; ?>
                <i class="fas fa-arrow-right"></i> 
                
                <?php echo round(($JML/$total)*100,2); ?> %
               </td>
              </tr>
              
              <tr style="color: #00a65a;">
                <th><i class="far fa-square"></i> IN STORE</th>
                <td>: <?php 
                $Jml_ncvs = mysqli_query($koneksi,"SELECT * FROM print_qr_pad_press WHERE lokasi='TOOLING STORE'");
                $JML = mysqli_num_rows($Jml_ncvs);
                ?>
                <?php echo $JML; ?>
                <i class="fas fa-arrow-right"></i> 
                
                <?php echo round(($JML/$total)*100,2); ?> %
               </td>
              </tr>

              <tr style="color: #f56954;">
                <th><i class="far fa-square"></i> RETURN</th>
                <td>: <?php 
                $Jml_ncvs = mysqli_query($koneksi,"SELECT * FROM print_qr_pad_press WHERE lokasi='RETURN'");
                $JML = mysqli_num_rows($Jml_ncvs);
                ?>
                <?php echo $JML; ?>
                <i class="fas fa-arrow-right"></i> 
                
                <?php echo round(($JML/$total)*100,2); ?> %
               </td>
              </tr>
            </TABLE>
          </div>

          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>

      <div class="col-md-3">
        <!-- DONUT CHART PAD GAUGE -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">PAD GAUGE</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <canvas id="pad-gauge" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            <?php 
              $info = mysqli_query($koneksi,"SELECT * FROM print_qr_pad_gauge");
              $total = mysqli_num_rows($info);
            ?>
            <TABLE>
              <tr style="color: #00c0ef;">
                <th><i class="far fa-square"></i> IN NCVS</th>
                <td>: <?php 
                $Jml_ncvs = mysqli_query($koneksi,"SELECT * FROM print_qr_pad_gauge WHERE lokasi='NCVS'");
                $JML = mysqli_num_rows($Jml_ncvs);
                ?>
                <?php echo $JML; ?>
                <i class="fas fa-arrow-right"></i> 
                
                <?php echo round(($JML/$total)*100,2); ?> %
               </td>
              </tr>
              
              <tr style="color: #00a65a;">
                <th><i class="far fa-square"></i> IN STORE</th>
                <td>: <?php 
                $Jml_ncvs = mysqli_query($koneksi,"SELECT * FROM print_qr_pad_gauge WHERE lokasi='TOOLING STORE'");
                $JML = mysqli_num_rows($Jml_ncvs);
                ?>
                <?php echo $JML; ?>
                <i class="fas fa-arrow-right"></i> 
        
                <?php echo round(($JML/$total)*100,2); ?> %
               </td>
              </tr>

              <tr style="color: #f56954;">
                <th><i class="far fa-square"></i> RETURN</th>
                <td>: <?php 
                $Jml_ncvs = mysqli_query($koneksi,"SELECT * FROM print_qr_pad_gauge WHERE lokasi='RETURN'");
                $JML = mysqli_num_rows($Jml_ncvs);
                ?>
                <?php echo $JML; ?>
                <i class="fas fa-arrow-right"></i> 
        
                <?php echo round(($JML/$total)*100,2); ?> %
               </td>
              </tr>
            </TABLE>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>

      <div class="col-md-3">
        <!-- DONUT CHART PAD MPLD BPM -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">MOLD BPM</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <canvas id="mold_bpm" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            <?php 
              $info = mysqli_query($koneksi,"SELECT * FROM print_qr_mold_bpm");
              $total = mysqli_num_rows($info);
            ?>
            <TABLE>
              <tr style="color: #00c0ef;">
                <th><i class="far fa-square"></i> IN NCVS</th>
                <td>: <?php 
                $Jml_ncvs = mysqli_query($koneksi,"SELECT * FROM print_qr_mold_bpm WHERE lokasi='NCVS'");
                $JML = mysqli_num_rows($Jml_ncvs);
                ?>
                <?php echo $JML; ?>
                <i class="fas fa-arrow-right"></i> 
                
                <?php echo round(($JML/$total)*100); ?> %
               </td>
              </tr>
              
              <tr style="color: #00a65a;">
                <th><i class="far fa-square"></i> IN STORE</th>
                <td>: <?php 
                $Jml_ncvs = mysqli_query($koneksi,"SELECT * FROM print_qr_mold_bpm WHERE lokasi='TOOLING STORE'");
                $JML = mysqli_num_rows($Jml_ncvs);
                ?>
                <?php echo $JML; ?>
                <i class="fas fa-arrow-right"></i> 
                
                <?php echo round(($JML/$total)*100); ?> %
               </td>
              </tr>

              <tr style="color: #f56954;">
                <th><i class="far fa-square"></i> RETURN</th>
                <td>: <?php 
                $Jml_ncvs = mysqli_query($koneksi,"SELECT * FROM print_qr_mold_bpm WHERE lokasi='RETURN'");
                $JML = mysqli_num_rows($Jml_ncvs);
                ?>
                <?php echo $JML; ?>
                <i class="fas fa-arrow-right"></i> 
                
                <?php echo round(($JML/$total)*100);?> %
               </td>
              </tr>
            </TABLE>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>

    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#cutting-dies').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'IN NCVS',
          'IN STORE',
          'RETURN',
      ],
      datasets: [
        {
          data: [
          <?php 
          $Jml_ncvs = mysqli_query($koneksi,"SELECT * FROM print_qr_ct_dies WHERE lokasi='NCVS'");
          echo mysqli_num_rows($Jml_ncvs);
          ?>,
          <?php 
          $Jml_tool = mysqli_query($koneksi,"SELECT * FROM print_qr_ct_dies WHERE lokasi='TOOLING STORE'");
          echo mysqli_num_rows($Jml_tool);
          ?>,
          <?php 
          $Jml_return = mysqli_query($koneksi,"SELECT * FROM print_qr_ct_dies WHERE lokasi='RETURN'");
          echo mysqli_num_rows($Jml_return);
          ?>],
          backgroundColor : ['#00c0ef', '#00a65a', '#f56954'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })


    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })
</script>

<script>
  $(function () {
    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#pad-press').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'IN NCVS',
          'IN STORE',
          'RETURN',
      ],
      datasets: [
        {
          data: [
          <?php 
          $Jml_ncvs = mysqli_query($koneksi,"SELECT * FROM print_qr_pad_press WHERE lokasi='NCVS'");
          echo mysqli_num_rows($Jml_ncvs);
          ?>,
          <?php 
          $Jml_tool = mysqli_query($koneksi,"SELECT * FROM print_qr_pad_press WHERE lokasi='TOOLING STORE'");
          echo mysqli_num_rows($Jml_tool);
          ?>,
          <?php 
          $Jml_return = mysqli_query($koneksi,"SELECT * FROM print_qr_pad_press WHERE lokasi='RETURN'");
          echo mysqli_num_rows($Jml_return);
          ?>],
          backgroundColor : ['#00c0ef', '#00a65a', '#f56954'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })


    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })
</script>

<script>
  $(function () {
    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#pad-gauge').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'IN NCVS',
          'IN STORE',
          'RETURN',
      ],
      datasets: [
        {
          data: [
          <?php 
          $Jml_ncvs = mysqli_query($koneksi,"SELECT * FROM print_qr_pad_gauge WHERE lokasi='NCVS'");
          echo mysqli_num_rows($Jml_ncvs);
          ?>,
          <?php 
          $Jml_tool = mysqli_query($koneksi,"SELECT * FROM print_qr_pad_gauge WHERE lokasi='TOOLING STORE'");
          echo mysqli_num_rows($Jml_tool);
          ?>,
          <?php 
          $Jml_return = mysqli_query($koneksi,"SELECT * FROM print_qr_pad_gauge WHERE lokasi='RETURN'");
          echo mysqli_num_rows($Jml_return);
          ?>],
          backgroundColor : ['#00c0ef', '#00a65a', '#f56954'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })


    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })
</script>

<script>
  $(function () {
    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#mold_bpm').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'IN NCVS',
          'IN STORE',
          'RETURN',
      ],
      datasets: [
        {
          data: [
          <?php 
          $Jml_ncvs = mysqli_query($koneksi,"SELECT * FROM print_qr_mold_bpm WHERE lokasi='NCVS'");
          echo mysqli_num_rows($Jml_ncvs);
          ?>,
          <?php 
          $Jml_tool = mysqli_query($koneksi,"SELECT * FROM print_qr_mold_bpm WHERE lokasi='TOOLING STORE'");
          echo mysqli_num_rows($Jml_tool);
          ?>,
          <?php 
          $Jml_return = mysqli_query($koneksi,"SELECT * FROM print_qr_mold_bpm WHERE lokasi='RETURN'");
          echo mysqli_num_rows($Jml_return);
          ?>],
          backgroundColor : ['#00c0ef', '#00a65a', '#f56954'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })


    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })
</script>

</body>
</html>
