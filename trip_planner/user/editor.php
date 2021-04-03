<?php
session_start();
include_once '../database.php';
$userID = $_SESSION['userID'];
echo $userID;
$sltPln = $_SESSION['sltPln'];
echo $sltPln;
$viewAtt = $_SESSION['viewAtt'];
echo $viewAtt;

$plnInfo = mysqli_query($con,"SELECT *, DATEDIFF(plan.endDate, plan.startDate) AS DateDiff FROM plan WHERE planID = '$sltPln';");
$plnDtl = mysqli_query($con,"SELECT * FROM attraction INNER JOIN user_plan ON attraction.attID = user_plan.attID WHERE user_plan.planID = '$sltPln' AND attraction.attID = '$viewAtt';");
$plnDtl2 = mysqli_query($con,"SELECT * FROM attraction INNER JOIN user_plan ON attraction.attID = user_plan.attID WHERE user_plan.planID = '$sltPln' AND attraction.attID = '$viewAtt';");
$plnDtl3 = mysqli_query($con,"SELECT * FROM attraction INNER JOIN user_plan ON attraction.attID = user_plan.attID WHERE user_plan.planID = '$sltPln' AND attraction.attID = '$viewAtt';");



if(isset($_POST['submit'])>0)
{	
	$modDur = $_POST['modDur'];
	$sltAttID = $_POST['sltAttID'];
	$sql4 = mysqli_query($con,"UPDATE `user_plan` SET `modDur` = '$modDur' WHERE planID = '$sltPln' AND attID = '$viewAtt';");
	$con ->close();   
	echo "<script>
	 alert('$viewAtt');
	 window.location= 'user_plan.php';
	</script>";

	//for display
	// $sql5 = mysqli_query($con,"SELECT * FROM attraction INNER JOIN user_plan ON attraction.attID = user_plan.attID WHERE user_plan.planID = $sltPln;");
	// while($display = mysqli_fetch_array($sql5))
	// {
	// 	 echo $display['attID'];
	// 	 echo $display['rcmDur'] + $display['modDur'];
	// }

}

if(isset($_POST['delete'])>0)
{	
	$sql6 = mysqli_query($con,"DELETE FROM `user_plan` WHERE planID = '$sltPln' AND attID = '$viewAtt';");	
	$con ->close();   
	echo "<script>
	 alert('$viewAtt');
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
	<link rel="stylesheet" href="editor.css">
	<link rel="icon" href="img/it.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto&display=swap" rel="stylesheet">
</head>

<ul>
	<a href="home.php" class="logo"><h1>Trip Planner</h1></a>
	<li><a href="logout.php">Log Out</a></li>    
	<li><a href="forum.php">Forum</a></li>
	<li><a href="edt_user.php">Edit User Profile</a></li>

	<li><a href="home.php">Home</a></li>
	<li><a href="user_plan.php">Back</a></li>    

</ul>

<div class="container1">

	<div class="split">
		<div class="descp-wrapper">

			<?php
			while($plnDtlLst = mysqli_fetch_array($plnDtl)) 
			{?>
				<h2><?php echo $plnDtlLst['attName']; ?></h2>
				<div class="img-wrapper"><img width="400" height="400" src="../rsc/att_img/<?php echo $plnDtlLst['img2Name']; ?>" alt="<?php echo $plnDtlLst['attName']; ?>"></div>
				<p class="descp"><?php echo $plnDtlLst['descp']; ?></p>
				<p class="descp"><?php echo $plnDtlLst['long_descp']; ?></p>

			<?php
			}?>

		</div>

		<div class="info-wrapper">

			<?php
			while($plnInfoLst = mysqli_fetch_array($plnInfo)) 
			{?>
				<div class="info-box">
				<a href="user_plan.php" class="trp-info"> <h4>In your trip, <?php echo $plnInfoLst['planName']." (".$plnInfoLst['startDate']." - ".$plnInfoLst['endDate'];?>)</h4></a>
				</div>
			<?php
			}?>


			<?php
			while($plnDtl3Lst = mysqli_fetch_array($plnDtl3)) 
			{?>
			<div class="info-box">
			<h4>Recommended duration</h4>
			<h5><?php echo $plnDtl3Lst['rcmDur']; ?> hours</h5>
			</div>

			<div class="info-box">
			<h4>Opening Hours</h4>
			<h5><?php echo $plnDtl3Lst['opHr']; ?></h5>
			</div>

			<div class="info-box">
			<h4>Price</h4>
			<h5>MYR <?php echo $plnDtl3Lst['cost']; ?></h5>
			</div>

			<div class="info-box">
			<h4>Category</h4>
			<h5><?php echo $plnDtl3Lst['category']; ?></h5>
			</div>

			<div class="info-box">
			<h4>Tags</h4>
			<h5><?php echo ucfirst($plnDtl3Lst['tags']); ?></h5>
			</div>


			<iframe src="<?php echo $plnDtl3Lst['map_url']; ?>" width="300" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

			<?php
			}?>

			
		</div>

	</div>

	<div class="sp-line">
	</div>

	<div class="sec-3">
		<div class="edt-wrapper">

			<h2>Edit Duration</h2>
			<h4>Recommended duration: 
				<?php
				while($plnDtl2Lst = mysqli_fetch_array($plnDtl2)) 
				{?>
					<?php echo $plnDtl2Lst['rcmDur']; ?>
				<?php
				}?>
			 hours
			</h4>

			<form action="" method="post" autocomplete="off">
			<input class="new-dur" type="number" value="2" min="1" max="7" name="modDur" required><br><br>
			<input class="createBtn" type="submit" value="Save" name="submit">
			</form>
		</div>

	<div class="edt-wrapper">

		<h2>Delete</h2>
		<h4>Remove this attraction from your trip</h4>
		<form action="" method="post" autocomplete="off">
		<button class="dltBtn" type="submit" value="delete" name="delete">Delete</button>
		</form>
	</div>
</div>
</html>