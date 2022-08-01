<?php
session_start();
if(isset($_SESSION['ISLOGIN']))

{
    if($_SESSION['ISLOGIN']==1)

    {
       // $ee=$_SESSION['SignUpEmail'];
        //$_SESSION['EMAILLmy']=$ee;
        $_SESSION['ISLOGIN']=0;
        $_SESSION['goMyPAGEsignin']=1;
?>


        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Home</title>
            <link rel="stylesheet" href="css/MyClass.css">
            <link rel="stylesheet" href="css/bootstrap.css">
            <link rel="stylesheet" href="css/bootstrap.rtl.css">
            <link rel="stylesheet" href="css/bootstrap-grid.css">
            <link rel="stylesheet" href="css/bootstrap-grid.trl.css">
            <link rel="stylesheet" href="css/bootstrap-reboot.css">
            <link rel="stylesheet" href="css/bootstrap-reboot.rtl.css">
            <link rel="stylesheet" href="css/bootstrap-utilities.css">
            <link rel="stylesheet" href="css/bootstrap-utilities.rtl.css">
            <link rel="stylesheet" href="about.css">
            <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
            <script type="text/javascript" src="js/bootstrap.esm.js"></script>
            <script type="text/javascript" src="js/bootstrap.js"></script>
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <script>
                function ss(){


                }
                function sss(){
                    window.location.href = "mypage.php";

                }

            </script>

        </head>
        <body>

        <div class="slider">
            <div class="bar">

                <div class="load"></div>
                <img src="imges/logo.png"  class="logo">


                <ul>
                    <li> <a href="#">Home</a> </li>
                    <li> <a href="Workers.php"">Workers</a> </li>
                    <li> <a href="Mypagesignin.php">My Page</a> </li>
                    <li> <a href="conectussignin.php">Contact Us</a> </li>
                    <li > <a href="#" >Sign In</a> </li>

                </ul>
            </div>
            <div class="content">
                <h1>Get a new job</h1>
                <p>Welcome,Edit Your Page and Include Yourself on the list of workers.</p>
                <div>
                    <button type="button" class="button1" onclick="sss()"><span></span>Workers</button>
                    <button type="button" class="button1" onclick="window.location.href = 'out.php'"><span></span>Log out</button>
                </div>

            </div>

        </div>

        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h1>About Us..</h1>
                <p>This website is a system for storing your business information and skills to connect you with employers. On this website, we strive to find work for you easily and with little effort.
                    You do not have to do but put your information for the employers to see and contact you..</p>
            </div>

        </div>
        <div class="positionD">@Copyright 2021.All Rights Reserved.</div>

        <script>
            let modal = document.getElementById("myModal");

            let btn = document.getElementById("myBtn");

            let span = document.getElementsByClassName("close")[0];

            btn.onclick = function() {
                modal.style.display = "block";
            }


            span.onclick = function() {
                modal.style.display = "none";
            }


            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>

        </body>
        </html>









        <?php
    }

    else
        {
        header('location:signup.php');
    }

}
else
    {
    header('location:Home.html');
}




?>

