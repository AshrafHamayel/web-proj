<?php
session_start();

if(isset($_SESSION['goMyPageSignUp']))
{
   if($_SESSION['goMyPageSignUp']==1)
    {

       global $Namee;
       global $Emaill;
        $Namee= $_SESSION['NAMEEE'];
         $Emaill= $_SESSION['SignUpEmail'];

        if(isset($_POST['submit']))
        {
            echo "sdsdsdsdds";
            $Phonee=$_POST['inputphon'];
            $Birthdayy=$_POST['inputdate'];
            $sexx=$_POST['sex'];
            $Cityy=$_POST['City'];

            $_SESSION['genderr']=$sexx;
            $_SESSION['nname']=$Namee;
            $_SESSION['passs']= $_SESSION['PASSWORDD'];
            $_SESSION['phonnn']=$Phonee;
            $_SESSION['birth']=$Birthdayy;

                $_SESSION['adddress']= $Cityy;

                $_SESSION['jobb']=$_POST['work'];

                $_SESSION['salry']=$_POST['perDay'];
            $_SESSION['imgg']=$_POST['inputimg'];


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

            <input type="text" class="input" placeholder="Full Name" value="<?php echo "$Namee"?>" name="inputname">
            <input type="email" class="input" placeholder="Email" value="<?php echo "$Emaill"?>">
            <input type="text" class="input" placeholder="Phone Number" name="inputphon">
            <input type="text" class="input" placeholder="Birthday (DD/MM/YY)" name="inputdate">

            <h2 >Gender:</h2>
            <label class="chk">
                <input type="radio"  name="sex" checked  value="Male">&nbsp;	Male &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </label>
            <label class="chk">
                <input type="radio"  name="sex" value="Female">&nbsp;	Female
            </label>
            <h2 >City:</h2>
            <select name="City" id="Citys" class="sel">


  <option value="Nablus">Nablus</option>
   <option value="Jerusalem" >Jerusalem</option>
 <option value="Bethlehem"  >Bethlehem</option>
<option value="Ramallah">Ramallah</option>
 <option value="Hebron" >Hebron</option>
<option value="Jericho" >Jericho</option>
 <option value="Qalqilya"  >Qalqilya</option>
 <option value="Jenin" >Jenin</option>
<option value="Jaffa"  >Jaffa</option>
<option value="Gaza">Gaza</option>
 <option value="Akka" >Akka</option>


            </select>
<!--
            <input type="password" class="input" placeholder="Password" required  name="inputpass">-->
            <div class="content1">
                <button type="submit" class="btn" name="submit"><span></span>Save</button>
            </div>
        </div>

        <div class="information tabShow">
            <h1>Work Info</h1>
            <h2>Your's Work:</h2>

            <select name="work" id="Works" class="sel">

                <option value="Builder"  >Builder</option>
                <option value="Painting works" >Painting works</option>
                <option value="Tile work" >Tile work</option>
                <option value="Decoration works">Decoration works</option>
                <option value="Cleaning work" >Cleaning work</option>
                <option value="Gardening works">Gardening works</option>
                <option value="Guard work" >Guard work</option>

            </select><br>

            <br> <input type="text" class="input" placeholder="Your salary (Per Day)"  name="perDay"><br><br>
            <h2>Upload photos of you or your work:</h2>
            <input type="text"  name="inputimg" class="input"><br>
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
