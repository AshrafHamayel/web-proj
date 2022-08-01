<?php
session_start();

if(isset($_POST['email'])&&isset($_POST['password'])&&$_POST['admin']=='Yes')
{
    $mysqli = new mysqli("localhost", "root", "", "workers") or die($mysqli->error);
    global $email;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name="asd";
    $qryStr = "select * from `admin` ";
    $res = $mysqli->query($qryStr);
    for ($i = 0; $i < $res->num_rows; $i++) {
        $qow=$res->fetch_object();
        if($qow->Email==$email&&$qow->password ==$password)
        {

            $_SESSION['Admin']=1;
            header('Location:Admin.php');
        }



    }


}



elseif(isset($_POST['email'])&&isset($_POST['password'])) {
    $mysqli = new mysqli("localhost", "root", "", "workers") or die($mysqli->error);
global $email;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name="asd";
    $qryStr = "select * from `accounts` ";
    $res = $mysqli->query($qryStr);
    for ($i = 0; $i < $res->num_rows; $i++) {
        $qow=$res->fetch_object();
        if($qow->Email==$email&&$qow->password ==$password)
        {
            $_SESSION['ISLOGIN']=1;
            $_SESSION['conectusformhome1']=11;

            $_SESSION['EMAILL']=$email;
           $_SESSION['NAMEEE1']=$email;
          $_SESSION['SignUpEmail']=$email;
            header('Location:Home1.php');
        }



    }
}

elseif(isset($_POST['uname'])&&isset($_POST['uemail'])&&isset($_POST['pass'])&&isset($_POST['cpass']))
{
    $mysqli = new mysqli("localhost", "root", "", "workers") or die($mysqli->error);
    $uname = $_POST['uname'];
    $uemail = $_POST['uemail'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    global $tes;
    $tes=0;
    if($pass==$cpass){

        $qryStr = "select * from `accounts` ";
        $res = $mysqli->query($qryStr);
        for ($i = 0; $i < $res->num_rows; $i++)
        {
            $row=$res->fetch_object();
            if($row->Email==$uemail)
            {


                $tes=1;
                break;
               header('Location:signup.php');
            }


        }
if($tes==0)
{
    $passs=SHA1('$pass');
    $qryStr="INSERT INTO `accounts` (`Name`, `Job`, `City`, `Email`, `phone`, `wage`, `password`, `Birthday`, `Gender`, `imeg`) 
    VALUES ('$uname', NULL, NULL, '$uemail', NULL, NULL, '$passs', NULL, NULL, NULL);";
    mysqli_query($mysqli,$qryStr);
    $_SESSION['NAMEEE']=$uname;
    $_SESSION['PASSWORDD']=$pass;

    $_SESSION['goMyPageSignUp']=1;
    $_SESSION['SignUpEmail']=$uemail;

    header('Location:mypage.php');


}

    }
    else
        {
        echo '<script>alert("The passwords do not match")</script>';

    }


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
    <link rel="stylesheet" href="css/signupstyle.css">
    <link rel="stylesheet" href="css/MyClass.css">

</head>
<body>
<div class="back1">
    <div class="bar">
        <img src="imges/logo.png"  class="logo">
        <ul >
            <li> <a href="Home1.php">Home</a> </li>
            <li> <a href="#">Workers</a> </li>
            <li> <a href="mypage.php">My Page</a> </li>
            <li> <a href="contactus.php">Contact Us</a> </li>

        </ul>
    </div>
    <div class="formb">
        <div  class="box1">
            <div id="bt"></div>
            <button type="button" class="butn" onclick="Signin()">Sign In</button>
            <button type="button" class="butn" onclick="Signup()">Sign Up</button>
        </div>
        <form id="logn" class="inputG" action="signup.php" method="post">
            <input type="email" class="inputF" placeholder="Email" required name="email">
            <input type="password" class="inputF" placeholder="Password" required name="password">

            <h5 >Admin:</h5>
            <label class="chk">
                <input type="radio" name="admin" value="Yes">&nbsp;	Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </label>
            <label class="chk">
                <input type="radio"  name="admin1" value="No">&nbsp;	No
            </label>
            <div class="content2">
                <button type="submit" class="button2" ><span></span>Sign In</button>
            </div>
        </form>
             <form id="reg" class="inputG" action="signup.php" method="post">
            <input type="text" class="inputF" placeholder="User Name" required name="uname">
            <input type="email" class="inputF" placeholder="Email" required name="uemail">
            <input type="password" class="inputF" placeholder="Password" required name="pass">
            <input type="password" class="inputF" placeholder="Confirm Password" required name="cpass">
            <div class="content2">
                <button type="submit" class="button2"><span></span>Sign Up</button>
            </div>

        </form>
    </div>
</div>
<script>
    let x = document.getElementById("logn");
    let y = document.getElementById("reg");
    let z = document.getElementById("bt");

    function Signup(){
        x.style.left ="-400px";
        y.style.left ="50px";
        z.style.left ="110px";

    }
    function Signin(){
        x.style.left ="50px";
        y.style.left ="450px";
        z.style.left ="0";

    }

</script>
</body>
</html>