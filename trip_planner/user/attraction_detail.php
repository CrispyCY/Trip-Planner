<?php
session_start();

if(isset($_SESSION['userID']))
{	

include_once '../database.php';
unset($_SESSION['addRv']);
unset($_SESSION['viewRv']);

if(isset($_SESSION['gen'])>0){
	$gen = $_SESSION['gen'];
}
else{
	$gen = 'N';
}
$userID = $_SESSION['userID'];
// echo $userID;
// $sltPln = $_SESSION['sltPln'];
// echo $sltPln;
$state = $_SESSION['state'];
// echo $state;
$add = $_SESSION['view'];
// echo $add;

// $plnInfo = mysqli_query($con,"SELECT * FROM plan WHERE planID = '$sltPln';");
// $plnDtl = mysqli_query($con,"SELECT * FROM attraction INNER JOIN user_plan ON attraction.attID = user_plan.attID WHERE user_plan.planID = '$sltPln' AND attraction.attID = '$viewAtt';");
$allAtt = mysqli_query($con,"SELECT * FROM attraction WHERE stateID = '$state' AND attID = '$add';");
$allAtt2 = mysqli_query($con,"SELECT * FROM attraction WHERE stateID = '$state' AND attID = '$add';");
$allAtt3 = mysqli_query($con,"SELECT * FROM attraction WHERE stateID = '$state' AND attID = '$add';");


if(isset($_POST['add'])>0)
{	
	$add = $_POST['add'];
	$_SESSION['add'] = $add;
	// $newAtt = mysqli_query($con,"INSERT INTO `user_plan`(`planID`, `attID`, `modDur`) VALUES '");
	echo "<script>
	window.location= 'addAtt.php';
   </script>";

}

if(isset($_POST['pln'])>0)
{	
	$pln = $_POST['pln'];
	$_SESSION['sltPln']=$pln;
	echo "<script>
	 window.location= 'user_plan.php';
	</script>";

}


if(isset($_POST['addRv'])>0)
{	
    $addRv = $_POST['addRv'];
    $_SESSION['addRv'] = $addRv;
	$_SESSION['viewRv'] = $addRv;

	echo "<script>
	window.location ='http://localhost/trip_planner/user/view_reviews.php#new';
   </script>";

}

if(isset($_POST['viewRv'])>0)
{	
    $viewRv = $_POST['viewRv'];
    $_SESSION['viewRv'] = $viewRv;
	$_SESSION['addRv'] = $viewRv;

	echo "<script>
	window.location= 'view_reviews.php';
   </script>";

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Trip Planner</title>
	<link rel="stylesheet" href="attraction_detail.css">
	<link rel="icon" href="img/it.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto&display=swap" rel="stylesheet">
</head>

<ul>
	<a href="home.php" class="logo"><h1>Trip Planner</h1></a>
	<?php 
	if ($gen != 'Y'){
		echo '
		<li><a href="logout.php">Log Out</a></li>    
		<li><a href="forum.php">Forum</a></li>
		<li><a href="edt_user.php">User Profile</a></li>
		<li><a href="my_plans.php">My Plans</a></li>
		<li><a href="home.php">Home</a></li>	
		<li><a href="javascript:history.go(-1)">Back</a></li>    
		';
	}
	else{
		echo '
		<li><a href="javascript:history.go(-1)">Back</a></li>    
		';
	}
	?>

</ul>


<div class="container1">

	<div class="split">
		<div class="descp-wrapper">

			<?php
			while($allAttLst = mysqli_fetch_array($allAtt)) 
			{?>
				<h2><?php echo $allAttLst['attName']; ?></h2>
				<div class="img-wrapper"><img width="400" height="400" src="../rsc/att_img/<?php echo $allAttLst['img2Name']; ?>" alt="<?php echo $allAttLst['attName']; ?>"></div>
				<p class="descp"><?php echo $allAttLst['descp']; ?></p>
				<p class="descp"><?php echo $allAttLst['long_descp']; ?></p>

			<?php
			}?>

		</div>

		<form action="" method="post" autocomplete="off" class="info-wrapper">

			<div class="info-box">

				<?php
				while($allAtt2Lst = mysqli_fetch_array($allAtt2)) 
				{
					$attID = $allAtt2Lst['attID'];
					$chk = mysqli_query($con,"SELECT * FROM ((attraction INNER JOIN user_plan ON attraction.attID = user_plan.attID) 
					INNER JOIN plan ON user_plan.planID = plan.planID) WHERE plan.userID = '$userID' AND attraction.stateID = '$state' AND attraction.attID = '$attID';");
					if (mysqli_num_rows($chk) == 0){
					?>
					<button class="createBtn" type="submit" value="<?php echo $allAtt2Lst['attID'] ?>" name="add">Not in any plan. Add one?</button>
					<?php }

					else{
						while($chkLst = mysqli_fetch_array($chk))
						{
						// $plnID = $chkLst['planID'];?>
						<button class="createBtn" type="submit" value="<?php echo $chkLst['planID']; ?>" name="pln">In your trip, <?php echo $chkLst['planName']." (".$chkLst['startDate']." - ".$chkLst['endDate'];?>)</button>				
						<?php
						}
					}
				}?>
			</div>

			<?php
			while($allAtt3Lst = mysqli_fetch_array($allAtt3)) 
			{?>
			<div class="info-box">
			<h4>Recommended duration</h4>
			<h5><?php echo $allAtt3Lst['rcmDur']; ?> hours</h5>
			</div>

			<div class="info-box">
			<h4>Opening Hours</h4>
			<h5><?php echo $allAtt3Lst['opHr']; ?></h5>
			</div>

			<div class="info-box">
			<h4>Price</h4>
			<h5>MYR <?php echo $allAtt3Lst['cost']; ?></h5>
			</div>

			<div class="info-box">
			<h4>Category</h4>
			<h5><?php echo $allAtt3Lst['category']; ?></h5>
			</div>

			<div class="info-box">
			<h4>Tags</h4>
			<h5><?php echo ucfirst($allAtt3Lst['tags']); ?></h5>
			</div>


			<iframe src="<?php echo $allAtt3Lst['map_url']; ?>" width="300" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

			<div class="info-box">
			<button class="att-viewBtn" type="submit" value="<?php echo $allAtt3Lst['attID']; ?>" name="viewRv"><h4>View Reviews ></h4></button>
			</div>

			<div class="info-box">
			<button class="att-viewBtn" type="submit" value="<?php echo $allAtt3Lst['attID']; ?>" name="addRv"><h4>Add Review ></h4></button>
			</div>

			<?php
			}?>


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