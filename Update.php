<?php
session_start();

if(isset($_SESSION['goMyPageSignUp']))
{
    if($_SESSION['goMyPageSignUp']==1)
    {
        global $Name1;
        global $Emai1;
        global $Phon1;
        global $Birthda1;
        global $Gende1;
        global $Cit1;
        global $Wor1;
        global $salar1;
        global $pass1;

        $Emai1= $_SESSION['EMAILL'];
        $mysqli = new mysqli("localhost", "root", "", "workers") or die($mysqli->error);

        $qryStr = "select * from `accounts` ";
        $res = $mysqli->query($qryStr);
        for ($i = 0; $i < $res->num_rows; $i++)
        {
            $row=$res->fetch_object();
            if($row->Email==$Emai1)
            {
                $Name1=$row->Name;
                $Phon1=$row->phone;
                $Birthda1=$row->Birthday;
                $Gende1=$row->Gender;
                $Cit1=$row->City;
                $Wor1=$row->Job;
                $salar1=$row->wage;
                $pass1=$row->password;
                break;
            }


        }


        $_SESSION['SignUpEmail']=$_SESSION['EMAILL'];

        $Namee= $_SESSION['NAMEEE'];
        $Emaill= $_SESSION['SignUpEmail'];

        if(isset($_POST['submit']))
        {
            echo "sdsdsdsdds";
            $Phonee=$_POST['inputphon'];
            $Birthdayy=$_POST['inputdate'];

            $_SESSION['genderr']=$Gende1;
            $_SESSION['nname']=$Name1;
            $_SESSION['passs']=$pass1;
            $_SESSION['phonnn']=$Phonee;
            $_SESSION['birth']=$Birthdayy;

            $_SESSION['adddress']=$Cit1;

            $_SESSION['jobb']=$Wor1;

            $_SESSION['salry']=$_POST['perDay'];
            $_SESSION['imgg']="img.png";


            header('location:editrow.php');

        }



    }

    else
    {

        header('location:signup.php');

    }
}
else
{

    header('location:signup.php');

}


?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="mypagecss.css">
    <link rel="stylesheet" href="css/MyClass.css">

    <script src="https://kit.fontawesome.com/33865a64d5.js" crossorigin="anonymous"></script>
    <script>

        function QW(){

            window.location.href = "Home1.php";
        }
    </script>
</head>
<body>
<div class="bar">
    <img src="imges/logo.png"  class="logo">
    <ul >
        <li> <a href="Home1.php">Home</a> </li>
        <li> <a href="Workers.php"">Workers</a> </li>
        <li> <a href="conectussignin.php">Contact Us</a> </li>
        <li> <a href="#">mypage</a> </li>
        <li> <a href="#">signin</a> </li>


    </ul>
</div>
<div class="container">

    <div class="leftbox">
        <nav>
            <a onclick="tabs(0)" class="tab active">
                <i class="far fa-address-card"></i>
            </a>
            <a onclick="tabs(1)" class="tab active">
                <i class="fas fa-tools"></i>
            </a>
        </nav>
    </div>
    <form action="mypage.php" method="post">
        <div class="rightbox">
            <div class="profile tabShow">
                <h1>Personal Info</h1>

                <input type="text" class="input" placeholder="Full Name" value="<?php echo "$Name1"?>" name="inputname" readonly>
                <input type="email" class="input" placeholder="Email" value="<?php echo "$Emai1"?>" readonly>
                <input type="text" class="input" placeholder="Phone Number" name="inputphon" value="<?php echo "$Phon1"?>">
                <input type="text" class="input" placeholder="Birthday (DD/MM/YY)" name="inputdate" value="<?php echo "$Birthda1"?>">
                <input type="text" class="input" placeholder="Gender" name="inputG" value="<?php echo "$Gende1"?>">
                <input type="text" class="input" placeholder="City" name="inputC" value="<?php echo "$Cit1"?>">



                <div class="content1">
                    <button type="submit" class="btn" name="submit"><span></span>Save</button>
                </div>
            </div>

            <div class="information tabShow">
                <h1>Work Info</h1>
                <h2>Your's Work:</h2>
                <input type="text"  placeholder="work" readonly name="nv" value="<?php echo "$Wor1"?>">

                <br> <input type="text" class="input" placeholder="Your salary (Per Day)"  name="perDay" value="<?php echo "$salar1"?>"><br><br>
                <h2>Upload photos of you or your work:</h2>
                <input type="file" id="img" name="inputimg" accept="image/*"><br>
                <div class="content1">
                </div>
            </div>

        </div>
    </form>
</div>

<script src="js/jquery-3.6.0.js"></script>
<SCRIPT>
    const tabB=document.querySelectorAll(".tab");
    const tab=document.querySelectorAll(".tabShow")

    function tabs(Index){
        tab.forEach(function (node){
            node.style.display="none";
        });
        tab[Index].style.display="block"
    }
    tabs(0);
</SCRIPT>
<script>
    $(".tab").click(function (){
        $(this).addClass("active").siblings()
        getSelection().removeClass("active");
    });

</script>

</body>
</html>
