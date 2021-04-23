<?php
session_start();

if(isset($_SESSION['userID']))
{	

include_once '../database.php';
$userID = $_SESSION['userID'];
// echo $userID;
// $sltPln = $_SESSION['sltPln'];
// echo $sltPln;
$state = $_SESSION['state'];
// echo $state;
$add = $_SESSION['add'];
// echo $add;


$usrPln = mysqli_query($con,"SELECT *, DATEDIFF(plan.endDate, plan.startDate) AS DateDiff FROM ((user_plan INNER JOIN attraction ON attraction.attID = user_plan.attID) 
INNER JOIN plan ON user_plan.planID = plan.planID) WHERE plan.userID = '$userID' AND attraction.stateID = '$state' GROUP BY plan.planID;");

if(isset($_POST['addAtt'])>0)
{	
	$addAtt = $_POST['addAtt'];
	$newAtt = mysqli_query($con,"INSERT INTO `user_plan` VALUES ('$addAtt', '$add', 0)");
	echo "<script>
	alert('Attraction added!');
	window.location= 'attraction_detail.php';
   </script>";

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Trip Planner</title>
	<link rel="stylesheet" href="addAtt.css">
	<link rel="icon" href="img/it.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto&display=swap" rel="stylesheet">
</head>


<?php
if (mysqli_num_rows($usrPln) == 0){
	echo "<script>
	alert('No plan created with this state yet... Create one?');
	window.location= 'home.php';
   </script>";
}

else{ ?>

	<ul>
		<a href="home.php" class="logo"><h1>Trip Planner</h1></a>
		<li><a href="logout.php">Log Out</a></li>    
		<li><a href="forum.php">Forum</a></li>
		<li><a href="edt_user.php">User Profile</a></li>
		<li><a href="my_plans.php">My Plans</a></li>
		<li><a href="home.php">Home</a></li>
		<li><a href="attraction_detail.php">Back</a></li>    

	</ul>

	<div class="
		<?php
		if ($state == "st1") {
			echo "bg-wrapper";
		}
		else{
			echo "bg-wrapper2";
		}
		?>
		">

		<div class="bg-shader">
			<div class="header-wrapper">
				<div class="header-main">
					<h1>My Plans</h1>
				</div>
			</div>
		</div>

	</div>

	<div class="container">
		<div class="sec-2">

			<form action="" method="post" autocomplete="off">

				<div class="plan-sec">
					<h2>Available Trips</h2>
					<div class="mp-wrapper">
						<?php
							if (mysqli_num_rows($usrPln) == 0){?>
								<div>
								<h3 class="none-header"><?php echo "None"; ?></h3>
								<a href="home.php" class="cr-span"><h4>Create some?</h4></a>
								</div>
								<?php
							}
							else{
								while($usrPlnLst = mysqli_fetch_array($usrPln)) 
								{
								?>
								<button class="mpBtn" type="submit" value="<?php echo $usrPlnLst['planID']; ?>" name="addAtt">
									<div class="mp-span"><?php echo $usrPlnLst['planName']; ?></div>
									<div class="mp-span1"><?php echo $usrPlnLst['DateDiff']." days in ".$usrPlnLst['location']; ?></div>
									<div class="mp-span2"><?php echo $usrPlnLst['startDate']." - ".$usrPlnLst['endDate'];?></div>
									<div class="mp-span3">Add &#x270E;</div>
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
<?php
}?>
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