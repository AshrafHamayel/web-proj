<?php
session_start();

if(isset($_SESSION['goMyPAGEsignin']))
{
    if($_SESSION['goMyPAGEsignin']==1)
    {

        global $Name;
        global $Emai;
        global $Phon;
        global $Birthda;
        global $Gende;
        global $Cit;
        global $Wor;
        global $salar;

        $Emai= $_SESSION['SignUpEmail'];
        $mysqli = new mysqli("localhost", "root", "", "workers") or die($mysqli->error);

        $qryStr = "select * from `accounts` ";
        $res = $mysqli->query($qryStr);
        for ($i = 0; $i < $res->num_rows; $i++)
        {
            $row=$res->fetch_object();
            if($row->Email==$Emai)
            {
                 $Name=$row->Name;
                 $Phon=$row->phone;
                 $Birthda=$row->Birthday;
                 $Gende=$row->Gender;
                 $Cit=$row->City;
                 $Wor=$row->Job;
                 $salar=$row->wage;


                break;
            }


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
        <li> <a href="#">Mypage</a> </li>

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
<table>
    <tr>
        <td> Name :</td>
        <td><input type="text" class="input" placeholder="Full Name" value="<?php echo "$Name"?>" name="inputname" readonly> </td>
    </tr>
    <tr>
        <td> Email :</td>
        <td>  <input type="email" class="input" placeholder="Email" value="<?php echo "$Emai"?>" readonly></td>
    </tr>
    <tr>
        <td> Phone Number :</td>
        <td> <input type="text" class="input" placeholder="Phone Number" name="inputphon" value="<?php echo "$Phon"?>" readonly></td>
    </tr>
    <tr>
        <td> Birthday :</td>
        <td> <input type="text" class="input" placeholder="Birthday (DD/MM/YY)" name="inputdate" value="<?php echo "$Birthda"?>" readonly></td>
    </tr>
    <tr>
        <td> Gender :</td>
        <td> <input type="text" class="input" placeholder="Gender" name="inputGender" value="<?php echo "$Gende"?>" readonly></td>
    </tr>
    <tr>
        <td> City :</td>
        <td> <input type="text" class="input" placeholder="City" name="inputCity" value="<?php echo "$Cit"?>" readonly></td>
    </tr>

</table>


                <div class="content1">
                    <button type="submit" class="btn" name="submit"><span></span>Update Info</button>
                </div>
            </div>

            <div class="information tabShow">
                <h1>Work Info</h1>
                <table>
                    <tr>
                        <td> Your's Work:</td>
                        <td><input type="text" class="input" placeholder="work" name="inputwork" value="<?php echo "$Wor"?>" readonly> </td>
                    </tr>

                    <tr>
                        <td>Your salary (Per Day):</td>
                        <td><input type="text" class="input" placeholder="Your salary (Per Day)" name="inputsalary" value="<?php echo "$salar"?>" readonly> </td>
                    </tr>

                </table>



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
