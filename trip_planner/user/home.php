<?php
session_start();
include_once '../database.php';
// $userID = $_SESSION["username"];
$userID = $_SESSION['userID'];
unset($_SESSION['sltPln']);
unset($_SESSION['viewAtt']);
unset($_SESSION['state']);
unset($_SESSION['add']);
unset($_SESSION['addRv']);
unset($_SESSION['viewRv']);
unset($_SESSION['frView']);
unset($_SESSION['viewPln']);
unset($_SESSION['temp_id']);
unset($_SESSION['temp_id2']);
unset($_SESSION['temp_id3']);
unset($_SESSION['pl_id']);
unset($_SESSION['view']);
unset($_SESSION['tag1']);
unset($_SESSION['tag2']);

echo $userID;

$rand1 = mt_rand(100,500);
$rand2 = mt_rand(100,500);
$rand3 = $rand1 + $rand2;

date_default_timezone_set("Asia/Kuala_Lumpur");
$dtNow = date("Y-m-d");  

$myPlan0 = mysqli_query($con,"SELECT COUNT(planID) AS plCount FROM plan WHERE userID = '$userID' ;");
$allPlns = mysqli_query($con,"SELECT *, DATEDIFF(plan.endDate, plan.startDate) AS DateDiff FROM plan WHERE userID = '$userID' ORDER BY startDate DESC;");

// $myPlan = mysqli_query($con,"SELECT * FROM plan WHERE userID = '$userID' AND ('$dtNow' BETWEEN startDate AND endDate);");
// $myPlan1 = mysqli_query($con,"SELECT * FROM plan WHERE userID = '$userID' AND dups = 'N' AND startDate > '$dtNow';");
// $myPlan2 = mysqli_query($con,"SELECT * FROM plan WHERE userID = '$userID' AND endDate < '$dtNow';");
// $myPlan3 = mysqli_query($con,"SELECT * FROM plan WHERE userID = '$userID' AND dups = 'Y' AND startDate > '$dtNow' AND ('$dtNow' NOT BETWEEN startDate AND endDate);");

if(isset($_POST['submit'])>0)
{	

	 $location=$_POST['location'];
	 $userLct = strtoupper($location);
	 if ($userLct == "PERAK"){
		 $stateID = 'st1';
	 }
	 else{
		$stateID = 'st2';
	}
	 $pl_name= ucwords($_POST['pl_name']);
	//  $duration=$_POST['duration'];
	 $userCate=$_POST['userCate'];
	 $startDate=$_POST['startDate'];
	 $endDate=$_POST['endDate'];

	 $tag= "%".$_POST['tag']."%";
	 $tag2="%".$_POST['tag2']."%";	

	//  echo $tag;
	//  echo $tag2;

	 if ($tag == $tag2)
	 {
		echo "<script>
		alert('Please select different tags!');
		window.location= 'home.php';
	   </script>";   

	 }

	 else{
					//  $result = $con->query("SELECT COUNT(planID) FROM plan WHERE userID = '$userID';");
			//  $counter = $result->fetch_row();
			//  $newCount = $counter[0] + 1;
			//  $pl_id = $userID.'_pl'.strval($newCount);
			$pl_id = $userID.'_pl'.$rand3;


			$newPln = mysqli_query($con,"INSERT INTO `plan`(`planID`, `location`, `planName`, `startDate`, `endDate`, `dups`, `userID`) VALUES ('$pl_id', '$userLct','$pl_name', '$startDate', '$endDate', 'N', '$userID');");
		//  mysqli_query($con, $sql);

			$calcDur = mysqli_query($con,"SELECT DATEDIFF(endDate, startDate) AS DateDiff FROM plan WHERE userID = '$userID' and planID = '$pl_id';");

			while($calcDurLst = mysqli_fetch_array($calcDur)) 
			{
				$duration = $calcDurLst['DateDiff'];
			
			}
			
			$ttlHr = $duration * 10;

			//dtermine how many att, then use that as counter to loop how many times on insert query, each insert should have diff attID
			$attDur = 0;
			$attDur2 = 0;
			$attDur3 = 0;

			$temp_id = $userID.'_tpl'.mt_rand(100,500);
			$temp_id2 = $userID.'_tpl'.mt_rand(100,500);
			$temp_id3 = $userID.'_tpl'.mt_rand(100,500);


			//  Do general filter
		$attID = mysqli_query($con,"SELECT `attID`, `rcmDur` FROM `attraction` WHERE `category` = '$userCate' AND stateID = '$stateID' ORDER BY RAND ();");
		while($attNum = mysqli_fetch_array($attID))
		{
			$ttlAtt = $attNum['attID'];
			$attDur += $attNum['rcmDur'];
			if($attDur <= $ttlHr)
			{
			$sql3 = mysqli_query($con,"INSERT INTO `temp_up`(`tempID`, `planID`, `attID`) VALUES ('$temp_id','$pl_id','$ttlAtt');");
			}
		}	

		$attID2 = mysqli_query($con,"SELECT `attID`, `rcmDur` FROM `attraction` WHERE `category` = '$userCate' AND stateID = '$stateID' 
		AND attraction.tags LIKE '$tag' ORDER BY RAND ();");
		while($attNum2 = mysqli_fetch_array($attID2))
		{
			$ttlAtt2 = $attNum2['attID'];
			$attDur2 += $attNum2['rcmDur'];
			if($attDur2 <= $ttlHr)
			{
			$sql9 = mysqli_query($con,"INSERT INTO `temp_up`(`tempID`, `planID`, `attID`) VALUES ('$temp_id2','$pl_id','$ttlAtt2');");
			}
		}

		$attID3 = mysqli_query($con,"SELECT `attID`, `rcmDur` FROM `attraction` WHERE `category` = '$userCate' AND stateID = '$stateID' 
		AND attraction.tags LIKE '$tag2' ORDER BY RAND ();");
		while($attNum3 = mysqli_fetch_array($attID3))
		{
			$ttlAtt3 = $attNum3['attID'];
			$attDur3 += $attNum3['rcmDur'];
			if($attDur3 <= $ttlHr)
			{
			$sql5 = mysqli_query($con,"INSERT INTO `temp_up`(`tempID`, `planID`, `attID`) VALUES ('$temp_id3','$pl_id','$ttlAtt3');");
			}
		}

		// while($attNum = mysqli_fetch_array($attID))
		// {
		// 	$ttlAtt = $attNum['attID'];
		// 	$attDur += $attNum['rcmDur'];
		// 	if($attDur <= $ttlHr)
		// 	{
		// 	$sql3 = mysqli_query($con,"INSERT INTO `user_plan`(`planID`, `attID`) VALUES ('$pl_id','$ttlAtt');");
		// 	}
		// }
		// echo "Error: sql3". $sql3 . "<br>" . $con->error;
		// echo "Error: sql9". $sql9 . "<br>" . $con->error;
		// echo "Error: sql5". $sql5 . "<br>" . $con->error;
	
		$con ->close();   
		//  $temp_id=$_POST['temp_id'];
		//  $temp_id2=$_POST['temp_id2'];
		//  $temp_id3=$_POST['temp_id3'];

		$_SESSION['temp_id']=$temp_id;
		$_SESSION['temp_id2']=$temp_id2;
		$_SESSION['temp_id3']=$temp_id3;
		$_SESSION['pl_id']=$pl_id;
		$_SESSION['tag1']=$_POST['tag'];
		$_SESSION['tag2']=$_POST['tag2'];


		echo "<script>
		 alert('Created successfully');
		 window.location= 'temp_select.php';
		</script>";

	 }

}

if(isset($_POST['myPlanLct'])>0)
{	
	$sltPln=$_POST['myPlanLct'];
	$_SESSION['sltPln']=$sltPln;
	echo "<script>
	 alert('$sltPln');
	 window.location= 'user_plan.php';
	</script>";
}

if(isset($_POST['state'])>0)
{	
	$state=$_POST['state'];
	$_SESSION['state']=$state;
	echo "<script>
	 alert('$state');
	 window.location= 'attraction.php';
	</script>";
}

if(isset($_POST['cmPlans'])>0)
{	
	$state=$_POST['cmPlans'];
	$_SESSION['state']=$state;
	echo "<script>
	 alert('$state');
	 window.location= 'community_plans.php';
	</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Trip Planner</title>
	<link rel="stylesheet" href="home.css">
	<link rel="icon" href="img/it.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto&display=swap" rel="stylesheet">

</head>



<div class="bg-wrapper">
	<div class="bg-shader">
		<ul>
			<a href="home.php" class="logo"><h1>Trip Planner</h1></a>
			<li><a href="logout.php">Log Out</a></li>    
			<!-- <li><a href="../student/profile.php">Edit User Profile</a></li> -->
			<li><a href="forum.php">Forum</a></li>
			<li><a href="edt_user.php">Edit User Profile</a></li>
			<li><a href="home.php">Home</a></li>
		</ul>

		<div class="container">

			<div class="header-main">
				<h1>Ready for your next trip?</h1>
				<p>Build Your Own Customized Trip Plan Now!</p>

			</div>

			<div class="new-wrapper">
				<form class="create-form-wrapper" action="" method="post" autocomplete="off">
					<div class="create-wrapper">

						<div class="create-sec">
							<div class="sec-1">
								<h3>Location</h3>
								<!-- <label for="location"><h3>Choose a location:</h3></label> -->
								<select name="location" required>
									<option value="Perak">Perak</option>
									<option value="Selangor">Selangor</option>
								</select>
							</div>
						</div>

						<div class="create-sec">
							<div class="sec-1">
								<h3>Name Your Plan</h3>
								<input type="text" maxlength="256" name="pl_name" placeholder="Plan Name" required>
							</div>
						</div>

						<div class="create-sec">
							<h3>Main Preference<h3>
							<select name="userCate" required>
								<option value="Indoors">Indoors</option>
								<option value="Outdoors">Outdoors</option>
							</select><br>

							<h3>Activities Preferences<h3>
							<select name="tag" required>
								<option value="culture">Culture</option>
								<option value="relaxing">Relaxing</option>
								<option value="romantic">Romantic</option>
								<option value="historic">Historic Sites</option>
								<option value="wildlife">Wildlife</option>
								<option value="shopping">Shopping</option>
							</select>

							<select name="tag2" required>
								<option value="culture">Culture</option>
								<option value="relaxing">Relaxing</option>
								<option value="romantic">Romantic</option>
								<option value="historic">Historic Sites</option>
								<option value="wildlife">Wildlife</option>
								<option value="shopping">Shopping</option>
							</select>
						</div>

						<div class="create-sec">
							<h3>Dates</h3>
							<h5>Start</h5>
							<input id="dateField" class="date-wrap" type="date" name="startDate" min="<?= date('Y-m-d') ?>" required>
							<h5>End</h5>
							<input id="dateField" class="date-wrap" type="date" name="endDate" min="<?= date('Y-m-d') ?>" required>
						</div>
					</div>
					<input class="createBtn" type="submit" value="Start planning!" name="submit">
				</form>
			</div>

		</div>
	</div>
</div>


	<div class="sec-2">
		<div class="sec2-shader">
		<div class="container ct-1">

		<a class="mp-header" href="my_plans.php">
			<h2 >My Trips (Total: <?php while($myPlan0Lst = mysqli_fetch_array($myPlan0)) 
					{
						echo $myPlan0Lst['plCount'];
					}
					?>)
			</h2>
		</a>

		<form action="" method="post" autocomplete="off">
			<div class="mp-wrapper">

						<?php
					if (mysqli_num_rows($allPlns) == 0){?>
						<?php echo "None"; ?>
						<?php
					}
					else{
							while($allPlnsLst = mysqli_fetch_array($allPlns)) 
							{
							?>
								<button class="mpBtn" type="submit" value="<?php echo $allPlnsLst['planID']; ?>" name="myPlanLct">
									<div class="mp-span"><?php echo $allPlnsLst['planName']; ?></div>
									<div class="mp-span1"><?php echo $allPlnsLst['DateDiff']." days in ".$allPlnsLst['location']; ?></div>
									<div class="mp-span2"><?php echo $allPlnsLst['startDate']." - ".$allPlnsLst['endDate'];?></div>
									<div class="mp-span3">View / Edit &#x270E;</div>
								</button>
							<?php
							}
						}?>
			</div>


		</form>

		<div class="sp-line">
		</div>


		<h2>Browse Attractions</h2>

		<form action="" method="post" autocomplete="off">
			<button class="br-wrapper" type="submit" value="st1" name="state">
					Perak
			</button>
			<button class="br-wrapper" type="submit" value="st2" name="state">		
					Selangor
		</button>
		</form>

		<div class="sp-line">
		</div>

		<h2>Browse Community Plans</h2>

		<form action="" method="post" autocomplete="off">
			<button class="br-wrapper" type="submit" value="st1" name="cmPlans">Perak</button>
			<button class="br-wrapper" type="submit" value="st2" name="cmPlans">Selangor</button>
		</form>

		<!-- <a href="forum.php" class="register-link">Forum</a>
		<a href="logout.php" class="register-link">Log Out</a> -->
		</div>
	</div>
</div>

</html>