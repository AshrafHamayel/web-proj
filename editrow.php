<?php
session_start();

$mysqli = new mysqli("localhost", "root", "", "workers") or die($mysqli->error);
$qryStr = "select * from `accounts` ";
$res = $mysqli->query($qryStr);


global $emailss;
$emails= $_SESSION['SignUpEmail'];
echo $emails;
$qryStr="DELETE FROM accounts WHERE accounts.Email = '$emails'";
$r=mysqli_query($mysqli,$qryStr);
if($r) {


    $a1 = $_SESSION['SignUpEmail'];
    $a2 = $_SESSION['nname'];

    $a3 = $_SESSION['jobb'];
    $a4 = $_SESSION['adddress'];
    $a5 = $_SESSION['phonnn'];
    $a6 = $_SESSION['genderr'];
    $a7 = $_SESSION['salry'];
    $a8 = $_SESSION['imgg'];
    $a9 = $_SESSION['birth'];
    $a10 = $_SESSION['PASSWORDD'];
    $pa = SHA1('$a10');
    $qryStr = "INSERT INTO `accounts` (`Name`, `Job`, `City`, `Email`, `phone`, `wage`, `password`, `Birthday`, `Gender`, `imeg`) 
    VALUES ('$a2', '$a3', '$a4', '$a1', '$a5', '$a7', '$a10', '$a9', '$a6','$a8');";
    mysqli_query($mysqli, $qryStr);


    $_SESSION['ISLOGIN'] = 1;


}


 header('Location:Home1.php');


?>

