<?php
session_start();
include_once '../database.php';
// $userID = $_SESSION["username"];
$userID = $_SESSION['userID'];
echo $userID;
$view_temp = $_SESSION['view_temp'];
echo $view_temp;
$pl_id = $_SESSION['pl_id'];
echo $pl_id;

$getSt = mysqli_query($con,"SELECT * FROM plan WHERE planID = '$pl_id';");
$plnInfo = mysqli_query($con,"SELECT *, DATEDIFF(plan.endDate, plan.startDate) AS DateDiff FROM plan WHERE planID = '$pl_id';");

// $plnInfo = mysqli_query($con,"SELECT *, DATEDIFF(plan.endDate, plan.startDate) AS DateDiff FROM plan WHERE planID = '$sltPln';");
$plnDtl = mysqli_query($con,"SELECT * FROM attraction INNER JOIN temp_up ON attraction.attID = temp_up.attID WHERE temp_up.tempID = '$view_temp';");


// total cost
$sql8 = mysqli_query($con,"SELECT SUM(cost) AS ttlcost FROM attraction INNER JOIN temp_up ON attraction.attID = temp_up.attID WHERE temp_up.tempID = '$view_temp';");

// total att
$sql9 = mysqli_query($con,"SELECT COUNT(temp_up.attID) AS ttlAtt FROM attraction INNER JOIN temp_up ON attraction.attID = temp_up.attID WHERE temp_up.tempID = '$view_temp';");

// total hr
$sql10 = mysqli_query($con,"SELECT SUM(rcmDur) AS ttlDur FROM attraction INNER JOIN temp_up ON attraction.attID = temp_up.attID WHERE temp_up.tempID = '$view_temp';");


if(isset($_POST['save_id'])>0)
{	
    $save_id=$_POST['save_id'];
    $svPln = mysqli_query($con,"INSERT INTO `user_plan`(`planID`, `attID`, `modDur`) SELECT `planID`, `attID`, 0 FROM `temp_up` WHERE tempID = '$view_temp';");
    $dltTemp = mysqli_query($con,"DELETE FROM `temp_up` WHERE planID = '$pl_id';");


	echo "<script>
	 alert('Saved successfully!');
	 window.location= 'home.php';
	</script>";
}

if(isset($_POST['viewAtt'])>0)
{	
	$view = $_POST['viewAtt'];
	$_SESSION['view'] = $view;
	echo "<script>
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
	<link rel="stylesheet" href="temp_up.css">
	<link rel="icon" href="img/it.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto&display=swap" rel="stylesheet">
</head>

<ul>
	<a href="home.php" class="logo"><h1>Trip Planner</h1></a>
	<!-- <li><a href="logout.php">Log Out</a></li>    
	<li><a href="forum.php">Forum</a></li>
	<li><a href="#edt-sec">Edit Plan</a></li>
	<li><a href="#top">Top</a></li>edt-sec
	<li><a href="home.php">Home</a></li> -->
	<li><a href="#sv">Save</a></li>
	<li><a href="temp_select.php">Back</a></li>


</ul>

<div id="top" class="
	<?php
		while($getStLst = mysqli_fetch_array($getSt)) 
	{
		if ($getStLst['location'] == "PERAK") {
			$_SESSION['state'] = "st1";
			echo "bg-wrapper";
		}
		else{
			$_SESSION['state'] = "st2";
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
				}
				?>
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
				while($ttlHr = mysqli_fetch_array($sql10))
				{
					echo "<h3>".$ttlHr['ttlDur']." hours</h3>";
				}
				?>
			</div>

		</div>

		<form class="att-frm" action="" method="post" autocomplete="off">

			<div class="sec-2">
				
				<?php
				$dyCt = 0;
				$dyCt2 = 0;
				while($plnDtlLst = mysqli_fetch_array($plnDtl)) 
					{?>
						<?php
							if($dyCt%4==0)
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
							<img src="../rsc/att_img/<?php echo $plnDtlLst['imgName']; ?>" alt="<?php echo $plnDtlLst['attName']; ?>">
							<h4 class="att-dur"> &#x1F551; <?php echo $plnDtlLst['rcmDur']; ?> hours</h4>
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


<form id="sv" class="temp_frm" action="" method="post" autocomplete="off">
<button class="createBtn" type="submit" value="<?php echo $view_temp; ?>" name="save_id">Save This Plan!</button>
</form>

</html>