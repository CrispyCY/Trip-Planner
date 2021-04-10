<?php
session_start();

if(isset($_SESSION['userID']))
{	

include_once '../database.php';
// $userID = $_SESSION["username"];
$userID = $_SESSION['userID'];


// echo $userID;

$rand1 = mt_rand(100,500);
$rand2 = mt_rand(100,500);
$rand3 = $rand1 + $rand2;

date_default_timezone_set("Asia/Kuala_Lumpur");
$dtNow = date("Y-m-d");  

$myPlan0 = mysqli_query($con,"SELECT COUNT(planID) AS plCount FROM plan WHERE userID = '$userID' ;");
$myPlan = mysqli_query($con,"SELECT *, DATEDIFF(plan.endDate, plan.startDate) AS DateDiff FROM plan WHERE userID = '$userID' AND ('$dtNow' BETWEEN startDate AND endDate);");
$myPlan1 = mysqli_query($con,"SELECT *, DATEDIFF(plan.endDate, plan.startDate) AS DateDiff FROM plan WHERE userID = '$userID' AND dups = 'N' AND startDate > '$dtNow';");
$myPlan2 = mysqli_query($con,"SELECT *, DATEDIFF(plan.endDate, plan.startDate) AS DateDiff FROM plan WHERE userID = '$userID' AND endDate < '$dtNow';");
$myPlan3 = mysqli_query($con,"SELECT *, DATEDIFF(plan.endDate, plan.startDate) AS DateDiff FROM plan WHERE userID = '$userID' AND dups = 'Y' AND startDate > '$dtNow' AND ('$dtNow' NOT BETWEEN startDate AND endDate);");


if(isset($_POST['myPlanLct'])>0)
{	
	$sltPln=$_POST['myPlanLct'];
	$_SESSION['sltPln']=$sltPln;
	echo "<script>
	 window.location= 'user_plan.php';
	</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Trip Planner</title>
	<link rel="stylesheet" href="my_plans.css">
	<link rel="icon" href="img/it.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto&display=swap" rel="stylesheet">
</head>


<div class="bg-wrapper">
	<div class="bg-shader">
        <ul>
                <a href="home.php" class="logo"><h1>Trip Planner</h1></a>
                <li><a href="logout.php">Log Out</a></li>    
                <li><a href="forum.php">Forum</a></li>
                <li><a href="edt_user.php">User Profile</a></li>

                <li><a href="home.php">Home</a></li>
        </ul>

        <div class="header-main">
            <h1>My Trips</h1>
            <h5>Total plans: <?php while($myPlan0Lst = mysqli_fetch_array($myPlan0)) 
					{
						echo $myPlan0Lst['plCount'];
					}
					?></h5>
            <!-- <h5>View / Edit your plans here</h5> -->
        </div>

    </div>

</div>

<div class="container">
    <div class="sec-2">
        <!-- <h2>My Trips</h2> -->

        <form action="" method="post" autocomplete="off">

            <div class="plan-sec">
                <h2>Ongoing Trip</h2>
                <div class="mp-wrapper">
                    <?php
                        if (mysqli_num_rows($myPlan) == 0){?>
                            <div>
                            <h3 class="none-header">None</h3>
                            <a href="home.php" class="cr-span"><h4>Create some?</h4></a>
                            </div>
                            <?php
                        }
                        else{
                            while($myPlanLst = mysqli_fetch_array($myPlan)) 
                            {
                            ?>
                            <button class="mpBtn" type="submit" value="<?php echo $myPlanLst['planID']; ?>" name="myPlanLct">
                                <div class="mp-span"><?php echo $myPlanLst['planName']; ?></div>
                                <div class="mp-span1"><?php echo $myPlanLst['DateDiff']." days in ".$myPlanLst['location']; ?></div>
                                <div class="mp-span2"><?php echo $myPlanLst['startDate']." - ".$myPlanLst['endDate'];?></div>
                                <div class="mp-span3">View / Edit &#x270E;</div>
                            </button>

                            <?php
                            }
                        }
                    ?>
                </div>
            </div>

            <div class="sp-line">
            </div>

            <div class="plan-sec">
                <h2>Upcoming Trip</h2>
                <div class="mp-wrapper">
                    <?php
                        if (mysqli_num_rows($myPlan1) == 0){?>
                            <div>
                            <h3 class="none-header"><?php echo "None"; ?></h3>
                            <a href="home.php" class="cr-span"><h4>Create some?</h4></a>
                            </div>
                            <?php
                        }
                        else{
                            while($myPlan1Lst = mysqli_fetch_array($myPlan1)) 
                            {
                            ?>
                            <button class="mpBtn" type="submit" value="<?php echo $myPlan1Lst['planID']; ?>" name="myPlanLct">
                                <div class="mp-span"><?php echo $myPlan1Lst['planName']; ?></div>
                                <div class="mp-span1"><?php echo $myPlan1Lst['DateDiff']." days in ".$myPlan1Lst['location']; ?></div>
                                <div class="mp-span2"><?php echo $myPlan1Lst['startDate']." - ".$myPlan1Lst['endDate'];?></div>
                                <div class="mp-span3">View / Edit &#x270E;</div>
                            </button>

                            <?php
                            }
                        }
                    ?>
                </div>
            </div>

            <div class="sp-line">
            </div>

            <div class="plan-sec">
                <h2>Past Trip</h2>
                <div class="mp-wrapper">
                    <?php
                        if (mysqli_num_rows($myPlan2) == 0){?>
                            <div>
                            <h3 class="none-header"><?php echo "None"; ?></h3>
                            <a href="home.php" class="cr-span"><h4>Create some?</h4></a>
                            </div>
                            <?php
                        }
                        else{
                            while($myPlan2Lst = mysqli_fetch_array($myPlan2)) 
                            {
                            ?>
                            <button class="mpBtn" type="submit" value="<?php echo $myPlan2Lst['planID']; ?>" name="myPlanLct">
                                <div class="mp-span"><?php echo $myPlan2Lst['planName']; ?></div>
                                <div class="mp-span1"><?php echo $myPlan2Lst['DateDiff']." days in ".$myPlan2Lst['location']; ?></div>
                                <div class="mp-span2"><?php echo $myPlan2Lst['startDate']." - ".$myPlan2Lst['endDate'];?></div>
                                <div class="mp-span3">View / Edit &#x270E;</div>
                            </button>

                            <?php
                            }
                        }
                    ?>
                </div>
            </div>
            
            <div class="sp-line">
            </div>

            <div class="plan-sec">
                <h2>Saved Community Plans</h2>
                <div class="mp-wrapper">
                    <?php
                        if (mysqli_num_rows($myPlan3) == 0){?>
                            <div>
                            <h3 class="none-header"><?php echo "None"; ?></h3>
                            <a href="home.php" class="cr-span"><h4>Create some?</h4></a>
                            </div>
                            <?php
                        }
                        else{
                            while($myPlan3Lst = mysqli_fetch_array($myPlan3)) 
                            {
                            ?>
                            <button class="mpBtn" type="submit" value="<?php echo $myPlan3Lst['planID']; ?>" name="myPlanLct">
                                <div class="mp-span"><?php echo $myPlan3Lst['planName']; ?></div>
                                <div class="mp-span1"><?php echo $myPlan3Lst['DateDiff']." days in ".$myPlan3Lst['location']; ?></div>
                                <div class="mp-span2"><?php echo $myPlan3Lst['startDate']." - ".$myPlan3Lst['endDate'];?></div>
                                <div class="mp-span3">View / Edit &#x270E;</div>
                            </button>

                            <?php
                            }
                        }
                    ?>
                </div>
            </div>

        </form>
    </div>

</div>
</html>
<?php 
}
else{
	echo "<script>
	alert('Access Denied.');
	window.location= 'login.php';
   </script>";
}
?>