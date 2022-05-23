<?php include('includes/header.php'); ?>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-green navbar-light">
    <!-- Left navbar links -->
    <?php include('includes/navbar.php'); ?>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
   <?php include('includes/sidebar.php'); ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
         
      <?php
      $con5  = mysqli_connect("localhost","root","","fnc_management");
      if (!$con5) {
     # code...
       echo "Problem in database connection! Contact administrator!" . mysqli_error();
       }else{
         $sql ="SELECT SUM(`Amount`) AS sum FROM `fnc_collection`";
         $resulta = mysqli_query($con5,$sql);
        
         while ($rows = mysqli_fetch_array($resulta)) { 
 
          $sales=$rows['sum'];
         }
        }
      ?>



          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <p>Total Income</p>
                <h3>P <?php echo $sales; ?><sup style="font-size: 20px"></sup></h3>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
           <?php
      $con5  = mysqli_connect("localhost","root","","fnc_management");
      if (!$con5) {
     # code...
       echo "Problem in database connection! Contact administrator!" . mysqli_error();
       }else{
         $sql ="SELECT SUM(`debit`) AS sum FROM `fnc_journal_entry` WHERE `jornal_code`=2";
         $resulta = mysqli_query($con5,$sql);
        
         while ($rows = mysqli_fetch_array($resulta)) { 
 
          $expenses=$rows['sum'];
         }
        }
      ?>

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                
                <p>Expenses</p>
                <h3>P<?php echo $expenses; ?></h3>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

       <?php
      $con4  = mysqli_connect("localhost","root","","fnc_management");
      if (!$con4) {
     # code...
       echo "Problem in database connection! Contact administrator!" . mysqli_error();
       }else{
         $sql ="SELECT SUM(`amount`) AS sum FROM `fnc_budget_allo`";
         $result = mysqli_query($con4,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
 
          $budget=$row['sum'];
         }
        }
      ?>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <p>Total Budget</p>
                <h3>P<?php  echo  $budget; ?></h3>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
       
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <p>Total Profit</p>
                <h3>P <?php $totalprofit=$sales -$expenses; echo $totalprofit;  ?></h3>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
 </div>  

      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <!-- AREA CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Department Budget</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
   
          </div>

          <div class="col-md-6">
           
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Sales Graph </h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    
                  </div>
              </div>

              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              
            </div>
        
          </div>
          <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong> </strong>
   
    <div class="float-right d-none d-sm-inline-block">
      
    </div>
  </footer>


  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php 
include('includes/scripts.php');
?>
<?php
$con4  = mysqli_connect("localhost","root","","fnc_management");
 if (!$con4) {
     # code...
    echo "Problem in database connection! Contact administrator!" . mysqli_error();
 }else{
         $sql ="SELECT * FROM `fnc_budget_allo`";
         $result = mysqli_query($con4,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
 
            $department[]  = $row['department'];
            $remaining[] = $row['amount'];
            $allocated[] = $row['remaining_budget'];
        }
 }
?>
<?php
$con5  = mysqli_connect("localhost","root","","fnc_management");
 if (!$con5) {
     # code...
    echo "Problem in database connection! Contact administrator!" . mysqli_error();
 }else{
         $sqls ="SELECT 
                  MONTHNAME(Date_recieve) as mname, 
                  sum(Amount) as total
                  FROM fnc_collection
                  GROUP BY MONTH(Date_recieve);";

         $resulta = mysqli_query($con5,$sqls);
         $chart_datas="";
         while ($rows = mysqli_fetch_array($resulta)) { 
 
            $month[]= $rows['mname'];
            $amount[]= $rows['total'];
             
        }
 }
?>
<script>
  $(function () {
    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  :<?php echo json_encode($department); ?>,
      datasets: [
        {
          label               : 'Remaining Budget',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : <?php echo json_encode($remaining); ?>
        },
        {
          label               : 'Allocated Budget',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : <?php echo json_encode($allocated); ?>
        },
      ]
    }
    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }
    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas, { 
      type: 'line',
      data: areaChartData, 
      options: areaChartOptions
    })
    var stackedBarChart = new Chart(stackedBarChartCanvas, {
      type: 'bar', 
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })
</script>


<script>
  $(function () {
    // Get context with jQuery - using jQuery's .get() method.
    var barChartCanvas = $('#barChart').get(0).getContext('2d')

    var barChartData = {
      labels  :<?php echo json_encode($month);?>,
      datasets: [
        {
          label               : 'Sales',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : <?php echo json_encode($amount); ?>
        },
       
      ]
    }
    var barChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    var barChart       = new Chart(barChartCanvas, { 
      type: 'bar',
      data: barChartData, 
      options: barChartOptions
    })


    var stackedBarChart = new Chart(stackedBarChartCanvas, {
      type: 'bar', 
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })
</script>




</body>
</html>
