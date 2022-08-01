<?php
session_start();

$mysqli = new mysqli("localhost", "root", "", "workers") or die($mysqli->error);
global $Name;
global $Birthday;
global $Work;
global $Phone;
global $Salry;
global $City;
global $Count;
$Count=0;

$qryStr = "select * from `accounts` ";
$res = $mysqli->query($qryStr);
$Count=$res->num_rows;
for ($i = 0; $i < $res->num_rows; $i++)
{

    $row=$res->fetch_object();

    $Name=$row->Name;
    $Work=$row->Job;
    $Phone=$row->phone;
    $Salry=$row->wage;
    $City=$row->City;
    $email1=$row->Email;
    if(isset($_REQUEST['delete'])){
        if($_REQUEST['delete']==$email1)

            $qryStr="DELETE FROM accounts WHERE accounts.Email = '$email1'";
                $r=mysqli_query($mysqli,$qryStr);
        }



}

if( isset($_POST['submitT'])) {
    echo $_POST['nameNew'];

    if (isset($_POST['nameNew']) && isset($_POST['EmailNew']) && isset($_POST['PasswordNew'])) {
        $mysqli = new mysqli("localhost", "root", "", "workers") or die($mysqli->error);

        $uname1 = $_POST['nameNew'];
        $uemail1 = $_POST['EmailNew'];
        $pass1 = $_POST['PasswordNew'];
        global $tes;
        $tes = 0;

        $qryStr = "select * from `accounts` ";
        $res = $mysqli->query($qryStr);
        for ($i = 0; $i < $res->num_rows; $i++) {
            $row = $res->fetch_object();
            if ($row->Email == $uemail1) {
                $tes = 1;
                break;
                echo "<script> alert('This email exists')</script>";
                header('Location:worker-table.php');
            }


        }
        if ($tes == 0) {
            $qryStr = "INSERT INTO `accounts` (`Name`, `Job`, `City`, `Email`, `phone`, `wage`, `password`, `Birthday`, `Gender`, `imeg`) 
    VALUES ('$uname1', NULL, NULL, '$uemail1', NULL, NULL, '$pass1', NULL, NULL, NULL);";
            mysqli_query($mysqli, $qryStr);
            $_SESSION['NAMEEE'] = $uname1;
            $_SESSION['PASSWORDD'] = $pass1;

            $_SESSION['goMyPageSignUp'] = 1;
            $_SESSION['SignUpEmail'] = $uemail1;

            header('Location:mypage.php');


        }


    }


}

?>



<!DOCTYPE html>
<html lang="en">

<head>


    <title>Worker's</title>

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


    <ul class="navbar-nav ml-auto ml-md-0">

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">


                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </div>
        </li>
    </ul>

</nav>

<div id="wrapper">

    <ul class="sidebar navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="Admin.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>

        <li class="nav-item">
            <a class="nav-link" href="Charts.php">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Charts</span></a>
        </li>
        <li class="nav-item active">
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
                <li class="breadcrumb-item active">Tables</li>
            </ol>

            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                   Worker Table </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="worker-table.php" method="post" >
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tr><input type="text" placeholder="Name" name="nameNew" rrequired></tr>
                            <tr><input type="email" placeholder="Email" name="EmailNew" required></tr>
                            <tr><input type="password" placeholder="Password" name="PasswordNew" required></tr>

                            <tr><input type="submit" name="submitT" value="Add a New Worker "></tr>
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>City</th>
                                <th>Phone</th>
                                <th>Birthday</th>
                                <th>Work</th>
                                <th>Salary</th>
                            </tr>
                            </thead>

                            <tbody>

<?php
$qryStr = "select * from `accounts` ";
$res = $mysqli->query($qryStr);
$count =0;
for ($i = 0; $i < $res->num_rows; $i++) {


    $row = $res->fetch_object();

    $Name = $row->Name;
    $Work = $row->Job;
    $Phone = $row->phone;
    $Salry = $row->wage;
    $City = $row->City;
    $Birthday=$row->Birthday;
    $email =$row->Email;

    echo '
        <tr>
                                <td>'.$Name.'</td>
                                <td>'.$City.'</td>
                                <td>'.$Phone.'</td>
                                <td>'.$Birthday.'</td>
                                <td>'.$Work.'</td>
                                <td>'.$Salry.'</td>
                                <td><button type="submit" id="delete" name="delete" value="'.$email.'"> delete </button></td>
                            </tr>
    ';
}
?>




                            </tbody>
                        </table>

                        </form>
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

<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>

<script src="js/sb-admin.min.js"></script>

<script src="js/demo/datatables-demo.js"></script>

</body>

</html>
