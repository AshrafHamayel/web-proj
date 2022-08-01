<?php
session_start();

$_SESSION['conectusformhome1']=0;
$_SESSION['ISLOGIN']=0;
$_SESSION['goMyPAGEsignin']=0;
session_destroy();

header('Location:Home.html');
?>
