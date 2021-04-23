<?php
session_start();

if(isset($_SESSION['userID']))
{	

include_once '../database.php';
$userID = $_SESSION['userID'];
// echo $userID;
// $sltPln = $_SESSION['sltPln'];
// echo $sltPln;
// $state = $_SESSION['state'];
// echo $state;
$temp_id = $_SESSION['temp_id'];
// echo $temp_id;
$temp_id2 = $_SESSION['temp_id2'];
// echo $temp_id2;
$temp_id3 = $_SESSION['temp_id3'];
// echo $temp_id3;
$pl_id = $_SESSION['pl_id'];
// echo $pl_id;
$tag1 = $_SESSION['tag1'];
$tag2 = $_SESSION['tag2'];
$ftag= "%".$tag1."%";
$ftag2="%".$tag2."%";	

// echo $tag1;
// echo $tag2;
$userCate= $_SESSION['usc'];
// echo $userCate;
$stateID= $_SESSION['stID'];
// echo $stateID;

$_SESSION['gen'] = 'Y';

unset($_SESSION['view_temp']);


if(isset($_POST['temp_id'])>0)
{	
    $view_temp=$_POST['temp_id'];
	$_SESSION['view_temp']=$view_temp;
	echo "<script>
	 window.location= 'temp_up.php';
	</script>";

}

if(isset($_POST['retry'])>0)
{	
	$tranc = mysqli_query($con,"TRUNCATE TABLE temp_up;");
	$calcDur = mysqli_query($con,"SELECT DATEDIFF(endDate, startDate) AS DateDiff FROM plan WHERE userID = '$userID' and planID = '$pl_id';");

	while($calcDurLst = mysqli_fetch_array($calcDur)) 
	{
		$duration = $calcDurLst['DateDiff'];
	
	}
	
	$ttlHr = $duration * 25;

	//dtermine how many att, then use that as counter to loop how many times on insert query, each insert should have diff attID
	$attDur = 0;
	$attDur2 = 0;
	$attDur3 = 0;

	$temp_id = $userID.'_tpl'.mt_rand(100,500);
	$temp_id2 = $userID.'_tpl'.mt_rand(100,500);
	$temp_id3 = $userID.'_tpl'.mt_rand(100,500);

	//  Do general filter
	$attID = mysqli_query($con,"SELECT `attID`, `rcmDur` FROM `attraction` WHERE `category` LIKE '%$userCate%' AND stateID = '$stateID' AND attraction.tags LIKE '$ftag' OR attraction.tags LIKE '$ftag2' ORDER BY RAND ();");
	while($attNum = mysqli_fetch_array($attID))
	{
		$ttlAtt = $attNum['attID'];
		$attDur += $attNum['rcmDur'];
		if($attDur <= $ttlHr)
		{
		$sql3 = mysqli_query($con,"INSERT INTO `temp_up`(`tempID`, `planID`, `attID`) VALUES ('$temp_id','$pl_id','$ttlAtt');");
		}
	}	

	$attID2 = mysqli_query($con,"SELECT `attID`, `rcmDur` FROM `attraction` WHERE `category` LIKE '%$userCate%' AND stateID = '$stateID' 
	AND attraction.tags LIKE '$ftag' ORDER BY RAND ();");
	while($attNum2 = mysqli_fetch_array($attID2))
	{
		$ttlAtt2 = $attNum2['attID'];
		$attDur2 += $attNum2['rcmDur'];
		if($attDur2 <= $ttlHr)
		{
		$sql9 = mysqli_query($con,"INSERT INTO `temp_up`(`tempID`, `planID`, `attID`) VALUES ('$temp_id2','$pl_id','$ttlAtt2');");
		}
	}

	$attID3 = mysqli_query($con,"SELECT `attID`, `rcmDur` FROM `attraction` WHERE `category` LIKE '%$userCate%' AND stateID = '$stateID' 
	AND attraction.tags LIKE '$ftag2' ORDER BY RAND ();");
	while($attNum3 = mysqli_fetch_array($attID3))
	{
		$ttlAtt3 = $attNum3['attID'];
		$attDur3 += $attNum3['rcmDur'];
		if($attDur3 <= $ttlHr)
		{
		$sql5 = mysqli_query($con,"INSERT INTO `temp_up`(`tempID`, `planID`, `attID`) VALUES ('$temp_id3','$pl_id','$ttlAtt3');");
		}
	}

	$_SESSION['temp_id']=$temp_id;
	$_SESSION['temp_id2']=$temp_id2;
	$_SESSION['temp_id3']=$temp_id3;
	
	echo "<script>
	alert('Please wait while we generate the best trip for you...');
	window.location= 'temp_select.php';
   </script>";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Trip Planner</title>
	<link rel="stylesheet" href="forum.css">
	<link rel="icon" href="img/it.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto&display=swap" rel="stylesheet">
</head>

	<ul>
	<a href="home.php" class="logo"><h1>Trip Planner</h1></a>
	</ul>

	<div class="bg-wrapper">

		<div class="bg-shader">
			<div class="header-wrapper">
				<div class="header-main">
					<h1>Plans</h1>
				</div>
			</div>
		</div>

	</div>

	<div class="container">
		<div class="sec-2">

			<form action="" method="post" autocomplete="off">

				<div class="plan-sec">
					<h2>We have created 3 plans just for you. Pick a plan!</h2>
					<div class="mp-wrapper">
						<button class="mpBtn" type="submit" value="<?php echo $temp_id; ?>" name="temp_id">
							<div class="mp-span">Plan 1</div>
							<div class="mp-span1">Balanced between <?php echo $tag1 ?> and <?php echo $tag2 ?></div>
							<div class="mp-span3">View &#x1F50D;</div>
						</button>
						<button class="mpBtn" type="submit" value="<?php echo $temp_id2; ?>" name="temp_id">
							<div class="mp-span">Plan 2</div>
							<div class="mp-span1">Focus more on <?php echo $tag1 ?></div>
							<div class="mp-span3">View &#x1F50D;</div>
						</button>
						<button class="mpBtn" type="submit" value="<?php echo $temp_id3; ?>" name="temp_id">
							<div class="mp-span">Plan 3</div>
							<div class="mp-span1">Focus more on <?php echo $tag2 ?></div>
							<div class="mp-span3">View &#x1F50D;</div>
						</button>
					</div>
				</div>

			<h2>Don't like the plans above? Don't worry, we got you cover!</h2>
			<button class="createBtn" type="submit" value="retry" name="retry">Generate new plans</button>
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