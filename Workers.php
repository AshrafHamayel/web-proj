<?php
    $mysqli = new mysqli("localhost", "root", "", "workers") or die($mysqli->error);
    global $Name;
    global $Work;
     global $Phone;
      global $Salry;
         global $City;
         global $Count;
$Count=0;
global $NameArr;
global $JobArr;
global $phoneArr;
global $wageArr;
global $CityArr;
$NameArr=array();
$JobArr=array();
$phoneArr=array();
$wageArr=array();
$CityArr=array();
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

    array_push($NameArr,$Name);
    array_push($JobArr,$Work);
    array_push($phoneArr,$Phone);
    array_push($wageArr,$Salry);
    array_push($CityArr,$City);


}
global $i;
$i=0;
   //$JobArr[$i],$NameArr[$i],$phoneArr[$i],$wageArr[$i],$CityArr[$i]
   //echo $NameArr[0],$JobArr[0],$phoneArr[0],$wageArr[0],$CityArr[0];

?>
<script>
    var NArray= <?php echo json_encode($NameArr ); ?>;
    var JArray= <?php echo json_encode($JobArr ); ?>;

    var PArray= <?php echo json_encode($phoneArr ); ?>;

    var WArray= <?php echo json_encode($wageArr ); ?>;


    var CArray= <?php echo json_encode($CityArr ); ?>;



</script>
<?php


?>

<!DOCTYPE html>
<html>
<head>
    <title>Cards</title>
    <link rel="stylesheet" href="css/work.css">
    <script src="https://kit.fontawesome.com/33865a64d5.js" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="css/mdb.min.css" >



</head>
<body>

<div class="bar1">
    <img src="imges/logo.png"  class="logo1">
    <ul>
        <li> <a href="Home.html">Home</a> </li>
        <li> <a href="#">Workers</a> </li>
        <li> <a href="signup.php">Sign In</a> </li>
        <li> <a href="contactus.php">Contact Us</a> </li>
        <li> <a href="mypage.php">My Page</a> </li>
    </ul>
</div>
<form action="Workers.php" method="post">



<div class="filter">

    <i class="fas fa-sort"></i></i> &nbsp;Filter By : City&nbsp; <i class="fas fa-sort-amount-down-alt"></i>
    <select  name="City" id="Citys" class="sel1">
        <option value="All">All</option>
        <option value="Nablus">Nablus</option>
        <option value="Jerusalem">Jerusalem</option>
        <option value="Bethlehem">Bethlehem</option>
        <option value="Ramallah">Ramallah</option>
        <option value="Hebron">Hebron</option>
        <option value="Jericho">Jericho</option>
        <option value="Qalqilya">Qalqilya</option>
        <option value="Jenin">Jenin</option>
        <option value="Jaffa">Jaffa</option>
        <option value="Gaza">Gaza</option>
        <option value="Akka">Akka</option>
    </select>
    ,&nbsp; Kind Of Work&nbsp;<i class="fas fa-sort-amount-down-alt"></i>
    <select name="work" id="Works" class="sel1">
        <option value="All">All</option>
        <option value="Builder">Builder</option>
        <option value="Painting works">Painting works</option>
        <option value="Driver">Driver</option>
        <option value="Tile work">Tile work</option>
        <option value="Decoration works">Decoration works</option>
        <option value="Cleaning work">Cleaning work</option>
        <option value="Gardening works">Gardening works</option>
        <option value="Guard work">Guard work</option>

    </select>
    <input type="submit" value="Filter" name="submit" >


</div>

</form>
<div class="container" id="cards">

    <div class="row" id="cad" >
<?php
$qryStr = "select * from `accounts` ";
$res = $mysqli->query($qryStr);
$count =0;
for ($i = 0; $i < $res->num_rows; $i++)
{


    $row=$res->fetch_object();

    $Name=$row->Name;
    $Work=$row->Job;
    $Phone=$row->phone;
    $Salry=$row->wage;
    $City=$row->City;
    $img =$row->imeg;
    if(!isset($_POST['submit'])){
    if ($count == 3) {
        echo "<div><br></div>";
        $count = 0;
    }
    echo "
      <div class='col'>
                    <div class='card'>
                        <div class='inner-box'>
                            <div class='card-front'> <span><i class='fas fa-hammer'></i>&nbsp; <input type='text' CLASS='pa' placeholder='Work' disabled value='$Work'></span><img src='$img' class='pic'></div>
                            <div class='card-back'><div class='pad'>
                                    <i class='far fa-id-card'></i>&nbsp;	   <input type='text' CLASS='pa' placeholder='Full Name'  disabled value='$Name'> <br>
                                    <i class='fas fa-phone-alt'></i>&nbsp;	<input type='text' CLASS='pa' placeholder='Phone' disabled value='$Phone'><br>
                                    <i class='far fa-credit-card'></i>&nbsp;<input type='text' CLASS='pa' placeholder='Salary' disabled value='$Salry'><br>
                                    <i class='fas fa-home'></i>&nbsp;  <input type='text' CLASS='pa' placeholder='City' disabled value='$City'><br>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
    ";

    $count++;
}
    else{

        if($_REQUEST['City'] == 'All'  && $_REQUEST['work'] == 'All'){

            if ($count == 3) {
                echo "<div><br></div>";
                $count = 0;
            }
            echo "
      <div class='col'>
                    <div class='card'>
                        <div class='inner-box'>
                            <div class='card-front'> <span><i class='fas fa-hammer'></i>&nbsp; <input type='text' CLASS='pa' placeholder='Work' disabled value='$Work'></span><img src='$img' class='pic'></div>
                            <div class='card-back'><div class='pad'>
                                    <i class='far fa-id-card'></i>&nbsp;	   <input type='text' CLASS='pa' placeholder='Full Name'  disabled value='$Name'> <br>
                                    <i class='fas fa-phone-alt'></i>&nbsp;	<input type='text' CLASS='pa' placeholder='Phone' disabled value='$Phone'><br>
                                    <i class='far fa-credit-card'></i>&nbsp;<input type='text' CLASS='pa' placeholder='Salary' disabled value='$Salry'><br>
                                    <i class='fas fa-home'></i>&nbsp;  <input type='text' CLASS='pa' placeholder='City' disabled value='$City'><br>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
    ";

            $count++;

        }



            elseif($_REQUEST['City'] == $City  && $_REQUEST['work'] == 'All'){

                if ($count == 3)
                {
                    echo "<div><br></div>";
                    $count = 0;
                }
                echo "
      <div class='col'>
                    <div class='card'>
                        <div class='inner-box'>
                            <div class='card-front'> <span><i class='fas fa-hammer'></i>&nbsp; <input type='text' CLASS='pa' placeholder='Work' disabled value='$Work'></span><img src='$img' class='pic'></div>
                            <div class='card-back'><div class='pad'>
                                    <i class='far fa-id-card'></i>&nbsp;	   <input type='text' CLASS='pa' placeholder='Full Name'  disabled value='$Name'> <br>
                                    <i class='fas fa-phone-alt'></i>&nbsp;	<input type='text' CLASS='pa' placeholder='Phone' disabled value='$Phone'><br>
                                    <i class='far fa-credit-card'></i>&nbsp;<input type='text' CLASS='pa' placeholder='Salary' disabled value='$Salry'><br>
                                    <i class='fas fa-home'></i>&nbsp;  <input type='text' CLASS='pa' placeholder='City' disabled value='$City'><br>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
    ";

                $count++;

            }

        elseif($_REQUEST['City'] ==  'All'  && $_REQUEST['work'] == $Work){

            if ($count == 3) {
                echo "<div><br></div>";
                $count = 0;
            }
            echo "
      <div class='col'>
                    <div class='card'>
                        <div class='inner-box'>
                            <div class='card-front'> <span><i class='fas fa-hammer'></i>&nbsp; <input type='text' CLASS='pa' placeholder='Work' disabled value='$Work'></span><img src='$img' class='pic'></div>
                            <div class='card-back'><div class='pad'>
                                    <i class='far fa-id-card'></i>&nbsp;	   <input type='text' CLASS='pa' placeholder='Full Name'  disabled value='$Name'> <br>
                                    <i class='fas fa-phone-alt'></i>&nbsp;	<input type='text' CLASS='pa' placeholder='Phone' disabled value='$Phone'><br>
                                    <i class='far fa-credit-card'></i>&nbsp;<input type='text' CLASS='pa' placeholder='Salary' disabled value='$Salry'><br>
                                    <i class='fas fa-home'></i>&nbsp;  <input type='text' CLASS='pa' placeholder='City' disabled value='$City'><br>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
    ";

            $count++;

        }
        elseif($_REQUEST['City'] ==$City && $_REQUEST['work'] == $Work)
        {

            if ($count == 3) {
                echo "<div><br></div>";
                $count = 0;
            }
            echo "
      <div class='col'>
                    <div class='card'>
                        <div class='inner-box'>
                            <div class='card-front'> <span><i class='fas fa-hammer'></i>&nbsp; <input type='text' CLASS='pa' placeholder='Work' disabled value='$Work'></span><img src='$img' class='pic'></div>
                            <div class='card-back'><div class='pad'>
                                    <i class='far fa-id-card'></i>&nbsp;	   <input type='text' CLASS='pa' placeholder='Full Name'  disabled value='$Name'> <br>
                                    <i class='fas fa-phone-alt'></i>&nbsp;	<input type='text' CLASS='pa' placeholder='Phone' disabled value='$Phone'><br>
                                    <i class='far fa-credit-card'></i>&nbsp;<input type='text' CLASS='pa' placeholder='Salary' disabled value='$Salry'><br>
                                    <i class='fas fa-home'></i>&nbsp;  <input type='text' CLASS='pa' placeholder='City' disabled value='$City'><br>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
    ";

            $count++;

        }
        }







}


?>



    </div>


</div>
<div >
    <br>
    <br>
    <br>
    <br>
    <br>
    <br><br>
    <br>
    <br>
    <br>
    <br>
    <br> <br>
    <br>
    <br>
    <br>
    <br>
    <br><br>
    <br>
    <br>
    <br>
    <br>
    <br> <br>
    <br>
    <br>
    <br>
    <br>
    <br><br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br><br>



</div>
<div class="backD">
    <div class="positionD">@Copyright 2021.All Rights Reserved. </div>

</div>


</body>
</html>
