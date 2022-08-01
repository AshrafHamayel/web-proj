<?php
session_start();

if(isset($_SESSION['Admin']))
{
    if($_SESSION['Admin']==1)

    {

    }
    else{header('location:signup.php'); }

}
else{header('location:signup.php'); }
?>

<?php
global $city1;
global $city2;
global $city3;
global $city4;
global $city5;
global $city6;
global $city7;
global $city8;
global $city9;
global $city10;
global $city11;

global $wok;
global $typ;
//$work=$_POST['sss'];
$typ='pie';

$city1 = 0;
$city2 = 0;
$city3 = 0;
$city4 = 0;
$city5= 0;
$city6= 0;
$city7= 0;
$city8= 0;
$city9= 0;
$city10= 0;
$city11= 0;
try {
    $dbb = new mysqli('localhost', 'root', '', 'workers');
    $qryStr1 = "select * from `accounts` ";

    $res = $dbb->query($qryStr1);

    for ($i = 0; $i < $res->num_rows; $i++) {
        $row = $res->fetch_object();

        if ($row->City == 'Nablus') {
            $city1 = $city1 + 1;
        }
        if ($row->City == 'Jerusalem') {
            $city2 = $city2 + 1;
        }
        if ($row->City == 'Ramallah') {
            $city3 = $city3 + 1;
        }
        if ($row->City == 'Hebron') {
            $city4 = $city4 + 1;
        }
        if ($row->City == 'Jericho') {
            $city5 = $city5 + 1;
        }
        if ($row->City == 'Qalqilya') {
            $city6 = $city6 + 1;
        }
        if ($row->City == 'Jenin') {
            $city7= $city7 + 1;
        }
        if ($row->City == 'Jaffa') {
            $city8 = $city8 + 1;
        }
        if ($row->City == 'Gaza') {
            $city9 = $city9 + 1;
        }
        if ($row->City == 'Akka') {
            $city10 = $city10 + 1;
        }
        if ($row->City == 'Bethlehem') {
            $city11 = $city11 + 1;
        }


    }


    $dbb->close();

}
catch (Exception $exception) {

}






?>



<!DOCTYPE html>
<html lang="en">

<head>



    <title>Dashboard</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <link href="css/sb-admin.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"> </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">


    <link href="css/sb-admin.css" rel="stylesheet">


</head>

<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="Admin.php">Workers of Palestine</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>



    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">


                <a class="dropdown-item" href="Home.html" >Logout</a>
            </div>
        </li>
    </ul>

</nav>

<div id="wrapper">

    <ul class="sidebar navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="Admin.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="Charts.php">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Charts</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="worker-table.php">
                <i class="fas fa-fw fa-table"></i>
                <span>Worker's</span></a>
        </li>
    </ul>

    <div id="content-wrapper">

        <div class="container-fluid">

            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Overview</li>
            </ol>

            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-comments"></i>
                            </div>
                            <div class="mr-5">Messages!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="https://mail.google.com/mail/u/0/#inbox">
                            <span class="float-left">View Messages</span>
                            <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                        </a>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-shopping-cart"></i>
                            </div>
                            <div class="mr-5">Workers!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="worker-table.php">
                            <span class="float-left">View Workers</span>
                            <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                        </a>
                    </div>
                </div>

            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    The number of workers in each city</div>
                <div class="">
                    <canvas id="myAreaChart1" width="100%" height="30%"></canvas>

                </div>

            </div>
            <script>

                let myChart = document.getElementById('myAreaChart1').getContext('2d');


                Chart.defaults.global.defaultFontFamily = 'Lato';

                Chart.defaults.global.defaultFontSize = 18;

                Chart.defaults.global.defaultFontColor = '#777';



                let massPopChart = new Chart(myChart,
                    {
                        type:'line',
                        data:{
                            labels:['Nablus', 'Jerusalem', 'Ramallah', 'Hebron','Jericho','Qalqilya','Jenin','Jaffa','Gaza','Akka','Bethlehem'],
                            datasets:[{
                                label:'number of worker in city',
                                data:[<?php echo $city1;?>,<?php echo $city2;?>,<?php echo $city3;?>,<?php echo $city4;?>,<?php echo $city5;?>,<?php echo $city6;?>,<?php echo $city7;?>,<?php echo $city8;?>,<?php echo $city9;?>,<?php echo $city10;?>,<?php echo $city11;?>],
                                backgroundColor:[
                                    'rgba(255,99,132,0.6)',
                                    'rgba(54, 162, 235, 0.6)',
                                    'rgba(255, 206, 86, 0.6)',
                                    'rgba(75, 192, 192, 0.6)',
                                    'rgba(153, 102, 255, 0.6)',
                                    'rgba(255, 55, 64, 0.6)',
                                    'rgba(255, 100, 64, 0.6)',
                                    'rgba(255, 222, 64, 0.6)',
                                    'rgba(200, 4, 64, 0.6)',
                                    'rgba(77, 159, 64, 0.6)',
                                    'rgba(69, 99, 132, 0.6)'
                                ],
                                borderWidth:2,
                                borderColor:'#777',
                                hoverBorderWidth:5,
                                hoverBorderColor:'#000'
                            }]
                        },
                        options:{
                            title:{
                                display:true,
                                text:'The number of workers for each profession in each city',
                                fontSize:30
                            },
                            legend:{
                                display:true,
                                position:'right',
                                labels:{

                                }
                            },
                            layout:{
                                padding:{
                                    left:50,
                                    right:0,
                                    bottom:0,

                                }
                            },
                            tooltips:{
                                enabled:true
                            }
                        }
                    });
            </script>

            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Data Table Example</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>City</th>
                                <th>Phone</th>
                                <th>Birthday</th>
                                <th>gender</th>
                                <th>Salary</th>
                            </tr>
                            </thead>

                            <tbody>

                            <tr>
                                <td>Ahmad Rashed</td>
                                <td>Nablus</td>
                                <td>059842456</td>
                                <td>22/5/1998</td>
                                <td>male</td>
                                <td>360</td>
                            </tr>
                            <tr>
                                <td>abo al3bd</td>
                                <td>Ramallah</td>
                                <td>0648456</td>
                                <td>2/9/2003</td>
                                <td>male</td>
                                <td>200</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>

        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © Workers 2021</span>
                </div>
            </div>
        </footer>

    </div>


</div>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="vendor/jquery-easing/jquery.easing.min.js"></script>


<script src="vendor/chart.js/Chart.min.js"></script>
<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>

<script src="js/sb-admin.min.js"></script>

<script src="js/demo/datatables-demo.js"></script>
<script src="js/demo/chart-area-demo.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<script src="vendor/chart.js/Chart.min.js"></script>

<script src="js/sb-admin.min.js"></script>


<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-bar-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
</body>

</html>
