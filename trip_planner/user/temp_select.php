<?php
session_start();
include_once '../database.php';
$userID = $_SESSION['userID'];
echo $userID;
// $sltPln = $_SESSION['sltPln'];
// echo $sltPln;
// $state = $_SESSION['state'];
// echo $state;
$temp_id = $_SESSION['temp_id'];
echo $temp_id;
$temp_id2 = $_SESSION['temp_id2'];
echo $temp_id2;
$temp_id3 = $_SESSION['temp_id3'];
echo $temp_id3;
$pl_id = $_SESSION['pl_id'];
echo $pl_id;
$tag1 = $_SESSION['tag1'];
$tag2 = $_SESSION['tag2'];
echo $tag1;
echo $tag2;

unset($_SESSION['view_temp']);


if(isset($_POST['temp_id'])>0)
{	
    $view_temp=$_POST['temp_id'];
	$_SESSION['view_temp']=$view_temp;
	echo "<script>
	 window.location= 'temp_up.php';
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
	<!-- <li><a href="logout.php">Log Out</a></li>    
	<li><a href="forum.php">Forum</a></li>
	<li><a href="#new">New Post</a></li>
	<li><a href="home.php">Home</a></li>
 -->
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
					<h2>We have created 3 plans for you to choose. Pick a plan!</h2>
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
			</form>
		</div>
	</div>



</html>