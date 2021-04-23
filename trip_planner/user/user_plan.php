<?php
session_start();

if(isset($_SESSION['userID']))
{	

include_once '../database.php';
// $userID = $_SESSION["username"];
unset($_SESSION['viewAtt']);
$userID = $_SESSION['userID'];
// echo $userID;
$sltPln = $_SESSION['sltPln'];
// echo $sltPln;

date_default_timezone_set("Asia/Kuala_Lumpur");
$dtNow = date("Y-m-d");  

$plnInfo = mysqli_query($con,"SELECT *, DATEDIFF(plan.endDate, plan.startDate) AS DateDiff FROM plan WHERE planID = '$sltPln';");

$plnInfo1 = mysqli_query($con,"SELECT *, DATEDIFF(plan.endDate, plan.startDate) AS DateDiff FROM plan WHERE planID = '$sltPln';");

$plnInfo2 = mysqli_query($con,"SELECT DATEDIFF(plan.endDate, plan.startDate) AS DateDiff FROM plan WHERE planID = '$sltPln';");
while($plnInfo2Lst = mysqli_fetch_array($plnInfo2)) 
{
	$diff = $plnInfo2Lst['DateDiff'];
}

$plnPay = mysqli_query($con,"SELECT pay FROM plan WHERE planID = '$sltPln';");

$plnDtl = mysqli_query($con,"SELECT * FROM attraction INNER JOIN user_plan ON attraction.attID = user_plan.attID WHERE user_plan.planID = '$sltPln';");


// total cost
$sql8 = mysqli_query($con,"SELECT SUM(cost) AS ttlcost FROM attraction INNER JOIN user_plan ON attraction.attID = user_plan.attID WHERE user_plan.planID = '$sltPln';");

// total att
$sql9 = mysqli_query($con,"SELECT COUNT(user_plan.attID) AS ttlAtt FROM attraction INNER JOIN user_plan ON attraction.attID = user_plan.attID WHERE user_plan.planID = '$sltPln';");

// total hr
$sql10 = mysqli_query($con,"SELECT * FROM attraction INNER JOIN user_plan ON attraction.attID = user_plan.attID WHERE user_plan.planID = '$sltPln';");


// share plan to community
$result = $con->query("SELECT COUNT(comID) FROM community;");
$counter = $result->fetch_row();
$newCount = $counter[0] + 1;
$comID = 'com'.strval($newCount);


if(isset($_POST['viewAtt'])>0)
{	
	$viewAtt=$_POST['viewAtt'];
	$_SESSION['viewAtt'] = $viewAtt;
	// echo $viewAtt;
	$con ->close();   
	echo "<script>
	 window.location= 'editor.php';
	</script>";
}

if(isset($_POST['share'])>0)
{	
	$share =  mysqli_query($con,"INSERT INTO `community`(`comID`, `planID`) VALUES ('$comID','$sltPln');");
	echo "<script>
	 alert('Shared successfully!');
	 window.location= 'user_plan.php';
	</script>";
}

if(isset($_POST['edtPln'])>0)
{	
	$edtName=ucwords($_POST['edtName']);
	$udt =  mysqli_query($con,"UPDATE `plan` SET `planName`= '$edtName' WHERE planID = '$sltPln';");
	echo "<script>
	alert('Trip name saved.');
	window.location= 'user_plan.php';
   </script>";

}

if(isset($_POST['edtDts'])>0)
{	
	$startDate=$_POST['startDate'];
	$endDate=$_POST['endDate'];
	$nwDts =  mysqli_query($con,"UPDATE `plan` SET `startDate`='$startDate',`endDate`='$endDate' WHERE planID = '$sltPln';");
	echo "<script>
	alert('Dates changed.');
	window.location= 'user_plan.php';
   </script>";

}


if(isset($_POST['delete'])>0)
{	
	$delete =  mysqli_query($con,"DELETE FROM `plan` WHERE planID = '$sltPln';");
	$delete2 =  mysqli_query($con,"DELETE FROM `user_plan` WHERE planID = '$sltPln';");
	echo "<script>
	alert('Plan deleted.');
	window.location= 'my_plans.php';
   </script>";

}

if(isset($_POST['cost'])>0)
{	
	$cost=$_POST['cost'];
	$_SESSION['cost'] = $cost;
	echo "<script>
	alert('Please wait while we direct you to payment page...');
	window.location= 'payment.php';
   </script>";

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Trip Planner</title>
	<link rel="stylesheet" href="user_plan.css">
	<link rel="icon" href="img/it.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto&display=swap" rel="stylesheet">
</head>

<ul>
	<a href="home.php" class="logo"><h1>Trip Planner</h1></a>
	<li><a href="logout.php">Log Out</a></li>    
	<li><a href="forum.php">Forum</a></li>
	<li><a href="edt_user.php">User Profile</a></li>
	<li><a href="my_plans.php">My Plans</a></li>
	<li><a href="home.php">Home</a></li>
	<li><a href="#edt-sec">Edit Plan</a></li>
	<li><a href="#top">Top</a></li>

</ul>

<div id="top" class="
	<?php
		while($plnInfo1Lst = mysqli_fetch_array($plnInfo1)) 
	{
		if ($plnInfo1Lst['location'] == "PERAK") {
			echo "bg-wrapper";
		}
		else{
			echo "bg-wrapper2";
		}
	}
	?>
">
	<div class="bg-shader">
	<div class="header-wrapper">
        <div class="header-main">
			<?php
			while($plnInfoLst = mysqli_fetch_array($plnInfo)) 
			{?>
				<h1><?php echo $plnInfoLst['planName']; ?></h1>
				<h3><?php echo $plnInfoLst['DateDiff']." days in ".$plnInfoLst['location']; ?></h3>
				<h5>From <?php echo $plnInfoLst['startDate']; ?> to <?php echo $plnInfoLst['endDate']; ?></h5>
			<?php	
			}?>
        </div>
		</div>
    </div>

</div>

<div class="container1">
	<div class="split">
		<div class="pln-info">
			<div class="info-wrapper">
				<h2>Total cost</h2>
				<?php
				while($ttlCost = mysqli_fetch_array($sql8))
				{
					echo "<h3>MYR ".$ttlCost['ttlcost']."</h3>";
						while($plnPayLst = mysqli_fetch_array($plnPay)) 
						{
							if ($plnPayLst['pay'] == "N") {
								
							?>	
									<form action="" method="post" autocomplete="off">

									<button class="att-viewBtn" type="submit" value="<?php echo $ttlCost['ttlcost']?>" name="cost"><h3>Make Payment</h3></button>
									</form>
							<?php
							}
						else{
							echo '<h3>Payment has been made</h3>';
						}
					}
				}
				?>
				<br>

			</div>

			<div class="info-wrapper">
				<h2>Number of Attractions</h2>
				<?php
				while($ttlAtt = mysqli_fetch_array($sql9))
				{
					echo "<h3>".$ttlAtt['ttlAtt']."</h3>";
				}
				?>
			</div>

			<div class="info-wrapper">
				<h2>Total Trip Hours</h2>
				<?php
				$tlhr = 0;
				while($ttlHr = mysqli_fetch_array($sql10))
				{
					if ($ttlHr['modDur'] == 0){
						$tlhr += $ttlHr['rcmDur'];
					}
					else{
						$tlhr += $ttlHr['modDur'];
					}
				}
				echo "<h3>".$tlhr." hr</h3>";

				?>
			</div>

		</div>

		<form class="att-frm" action="" method="post" autocomplete="off">

			<div class="sec-2">
				
				<?php
				$dyCt = 0;
				$dyCt2 = 0;
				while($plnDtlLst = mysqli_fetch_array($plnDtl)) 
					{
					?>
						<?php
							if($dyCt%4==0 && $dyCt2!=$diff)
							{
								$dyCt2+=1;?>
								<div class="day-wrapper">
									<h2><?php echo "Day " .($dyCt2);?></h2>
								</div>

								<div class="vl-wrapper">
									<div class="vl"></div>
									<div class="vl2"></div>
								</div>
							<?php
							}?>

						<div class="att-wrapper">
							<button class="att-viewBtn" type="submit" value="<?php echo $plnDtlLst['attID']; ?>" name="viewAtt"><h3><?php echo $plnDtlLst['attName']; ?></h3></button><br>
							<img src="../rsc/att_img/<?php echo $plnDtlLst['imgName']; ?>" alt="<?php echo $plnDtlLst['attName']; ?>" width="220" height="180">
							<h4 class="att-dur"> &#x1F551; <?php 
							if ($plnDtlLst['modDur'] == 0){
								echo $plnDtlLst['rcmDur'];
							}
							else{
								echo $plnDtlLst['modDur'];
							}
							?> hours</h4>
							<blockquote class="att-descp"><?php echo $plnDtlLst['descp']; ?></blockquote>
							<button class="att-viewBtn" type="submit" value="<?php echo $plnDtlLst['attID']; ?>" name="viewAtt">See details ></button>
						</div>

						<div class="vl-wrapper">
							<div class="vl"></div>
							<div class="vl2"></div>
						</div>

				<?php
					$dyCt +=1;			
					}?>
				<div class="day-wrapper">
					<h2>End</h2>
				</div>
			</div>
		</form>
	</div>

	<div class="sp-line">
	</div>

	<div id="edt-sec" class="sec-3">
		<div class="edt-wrapper">
			<h2>Edit Plan</h2>
			<h3>Edit Trip Name</h3>
			<form action="" method="post" autocomplete="off">
			<input type="text" maxlength="256" name="edtName" placeholder="New Trip Name" required>
			<br><br>
			<button class="createBtn" type="submit" value="edtPln" name="edtPln">Save</button>
			</form>

			<h3>Edit Dates</h3>
			<form action="" method="post" autocomplete="off">
			<input type="date" name="startDate" min="<?= date('Y-m-d') ?>" required>
			<input type="date" name="endDate" min="<?= date('Y-m-d') ?>" required>
			<br><br>
			<button class="createBtn" type="submit" value="edtDts" name="edtDts">Save</button>
			</form>

			<h3>Delete plan</h3>
			<h5>*Please note that once the plan is deleted, the action cannot be revert!</h5>
			<form action="" method="post" autocomplete="off">
			<button onClick="javascript: return confirm('Please confirm deletion...');" class="dltBtn" type="delete" value="delete" name="delete">Delete</button>
			</form>
		</div>

		<div class="edt-wrapper">

			<h2>Share your plan</h2>
			<h3>Let other travelers know your way of traveling!</h3>
			<form action="" method="post" autocomplete="off">
			<button class="createBtn" type="submit" value="share" name="share">Share</button>
			</form>
		</div>

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