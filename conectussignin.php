<?php
session_start();
if(isset($_SESSION['conectusformhome1']))

{
if($_SESSION['conectusformhome1']==11)

{


    if (isset($_POST['mess'])) {
        if (isset($_POST['name']) && isset($_POST['messge'])) {

            $mysqli = new mysqli("localhost", "root", "", "workers") or die($mysqli->error);
            $uname = $_POST['name'];
            $uemail = $_POST['email'];
            $phone = $_POST['phone'];
            $messge = $_POST['messge'];

            $qryStr = "select * from `message` ";
            $res = $mysqli->query($qryStr);


            $qryStr = "INSERT INTO `message` (`Name`, `Email`, `Phone`, `message`) 
VALUES ('$uname', '$uemail', '$phone', '$messge');";
            mysqli_query($mysqli, $qryStr);
            header('Location:Home.html');


    $_SESSION['ISLOGIN']=1;

        }
    }


}
else{    header('location:signup.php');
}
}
else{    header('location:signup.php');
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/cont.css">
    <link rel="stylesheet" href="css/MyClass.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

<div class="contact-section">
    <div class="bar">
        <img src="imges/logo.png"  class="logo">
        <ul >
            <li > <a href="Home1.php" >Home</a> </li>

            <li> <a href="Workers.php"">Workers</a> </li>
            <li > <a href="#" >Sign In</a> </li>
            <li> <a href="#">Contact Us</a> </li>

            <li> <a href="Mypagesignin.php">My Page</a> </li>
        </ul>
    </div>

    <form class="contact-form"  method="post">
        <input type="text" class="contact-form-text" placeholder="Your name" name="name">
        <input type="email" class="contact-form-text" placeholder="Your email" name="email">
        <input type="text" class="contact-form-text" placeholder="Your phone" name="phone">
        <textarea class="contact-form-text" placeholder="Your message" name="messge"></textarea>
        <div class="content4">

            <button type="button" class="button11"><span> </span> <input type="submit"  name="mess" value="Send"></button>
        </div>
    </form>
</div>


</body>
</html>
