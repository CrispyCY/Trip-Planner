<?php
session_start();

if(isset($_SESSION['userID']))
{	

include_once '../database.php';
// $userID = $_SESSION["username"];
$userID = $_SESSION['userID'];
// echo $userID;
$state = $_SESSION['state'];
// echo $state;
unset($_SESSION['viewPln']);


if ($state == "st1"){
    $location = 'PERAK';
}
else{
   $location = 'SELANGOR';
}


$comPln = mysqli_query($con,"SELECT *, DATEDIFF(plan.endDate, plan.startDate) AS DateDiff  FROM community INNER JOIN plan ON community.planID = plan.planID WHERE plan.location = '$location';");

if(isset($_POST['viewPln'])>0)
{	
	$viewPln = $_POST['viewPln'];
	$_SESSION['viewPln'] = $viewPln;
	echo "<script>
	window.location= 'community_plan.php';
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
if (mysqli_num_rows($comPln) == 0){
	echo "<script>
	alert('No plan created with this state yet');
	window.location= 'home.php';
   </script>";
}

else{ ?>

	<ul>
		<a href="home.php" class="logo"><h1>Trip Planner</h1></a>
		<li><a href="logout.php">Log Out</a></li>    
		<li><a href="forum.php">Forum</a></li>
		<li><a href="my_plans.php">My Plans</a></li>
		<li><a href="home.php">Home</a></li>

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
					<h1>Perak Community Plans</h1>
				</div>
			</div>
		</div>

	</div>

	<div class="container">
		<div class="sec-2">

			<form action="" method="post" autocomplete="off">

				<div class="plan-sec">
					<h2>Perak Trips</h2>
					<div class="mp-wrapper">
						<?php
								while($comPlnLst = mysqli_fetch_array($comPln)) 
								{
								?>
								<button class="mpBtn" type="submit" value="<?php echo $comPlnLst['planID']; ?>" name="viewPln">
									<div class="mp-span"><?php echo $comPlnLst['planName']; ?></div>
									<div class="mp-span1"><?php echo $comPlnLst['DateDiff']." days in ".$comPlnLst['location']; ?></div>
									<div class="mp-span3">View &#x1F50D;</div>
								</button>

								<?php
								}
						?>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php
}
?>

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