<?php
session_start();

if(isset($_SESSION['userID']))
{	

include_once '../database.php';
// $userID = $_SESSION["username"];
unset($_SESSION['viewAtt']);
$userID = $_SESSION['userID'];
// echo $userID;
$viewPln = $_SESSION['viewPln'];
// echo $viewPln;
$state = $_SESSION['state'];
// echo $state;


$plnInfo = mysqli_query($con,"SELECT *, DATEDIFF(plan.endDate, plan.startDate) AS DateDiff FROM plan WHERE planID = '$viewPln';");

$plnInfo1 = mysqli_query($con,"SELECT *, DATEDIFF(plan.endDate, plan.startDate) AS DateDiff FROM plan WHERE planID = '$viewPln';");

$plnInfo2 = mysqli_query($con,"SELECT DATEDIFF(plan.endDate, plan.startDate) AS DateDiff FROM plan WHERE planID = '$viewPln';");
while($plnInfo2Lst = mysqli_fetch_array($plnInfo2)) 
{
	$diff = $plnInfo2Lst['DateDiff'];
}


$plnDtl = mysqli_query($con,"SELECT * FROM attraction INNER JOIN user_plan ON attraction.attID = user_plan.attID WHERE user_plan.planID = '$viewPln';");


// total cost
$sql8 = mysqli_query($con,"SELECT SUM(cost) AS ttlcost FROM attraction INNER JOIN user_plan ON attraction.attID = user_plan.attID WHERE user_plan.planID = '$viewPln';");

// total att
$sql9 = mysqli_query($con,"SELECT COUNT(user_plan.attID) AS ttlAtt FROM attraction INNER JOIN user_plan ON attraction.attID = user_plan.attID WHERE user_plan.planID = '$viewPln';");

// total hr
$sql10 = mysqli_query($con,"SELECT SUM(rcmDur) AS ttlDur FROM attraction INNER JOIN user_plan ON attraction.attID = user_plan.attID WHERE user_plan.planID = '$viewPln';");

// display com plan info
$comInfo = mysqli_query($con,"SELECT * FROM ((community INNER JOIN plan ON community.planID = plan.planID) 
INNER JOIN user ON plan.userID = user.userID)
WHERE plan.planID = '$viewPln';");

$getCom = mysqli_query($con,"SELECT * FROM community WHERE planID = '$viewPln';");
while($getComLst = mysqli_fetch_array($getCom))
	{
		$comID = $getComLst['comID'];
	}

$vtChk = mysqli_query($con,"SELECT *  from community_vote WHERE userID = '$userID' AND comID = '$comID';");
$disabled = "";
if (mysqli_num_rows($vtChk) != 0)
	{
		$disabled = "disabled";
	}
else{
	$disabled = "";
}
$comInfo2 = mysqli_query($con,"SELECT COUNT(comID) AS vtCount from community_vote;");



// copy plan
$rand1 = mt_rand(100,500);
$rand2 = mt_rand(100,500);
$rand3 = $rand1 + $rand2;

// $result = $con->query("SELECT COUNT(planID) FROM plan WHERE userID = '$userID';");
// $counter = $result->fetch_row();
// $newCount = $counter[0] + 1;
// $pl_id = $userID.'_pl'.strval($newCount);
$pl_id = $userID.'_pl'.$rand3;


if(isset($_POST['view'])>0)
{	
	$view = $_POST['view'];
	$_SESSION['view'] = $view;
	echo "<script>
	window.location= 'attraction_detail.php';
   </script>";

}

if(isset($_POST['dups'])>0)
{	
    $startDate=$_POST['startDate'];
    $endDate=$_POST['endDate'];
    $dupPln =  mysqli_query($con,"INSERT INTO `plan`(`planID`, `location`, `planName`, `startDate`, `endDate`, `dups`, `pay`, `userID`) SELECT '$pl_id', `location`, `planName`, '$startDate', '$endDate', 'Y', 'N', '$userID' FROM `plan` WHERE planID = '$viewPln';");
    $dupUsrPln =  mysqli_query($con,"INSERT INTO `user_plan`(`planID`, `attID`, `modDur`) SELECT '$pl_id', `attID`, `modDur` FROM `user_plan` WHERE planID = '$viewPln';");
    echo "<script>
	alert('Plan duplicated!');
	window.location= 'my_plans.php';
   </script>";

}

if(isset($_POST['upV'])>0)
{	
    $upV =  mysqli_query($con,"INSERT INTO `community_vote`(`userID`, `comID`) VALUES ('$userID','$comID');");
    echo "<script>
	alert('Thanks for your upvote!');
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
	<link rel="stylesheet" href="user_plan.css">
	<link rel="icon" href="img/it.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto&display=swap" rel="stylesheet">
</head>

<ul>
	<a href="home.php" class="logo"><h1>Trip Planner</h1></a>
	<li><a href="logout.php">Log Out</a></li>    
	<li><a href="forum.php">Forum</a></li>
	<li><a href="home.php">Home</a></li>	
	<li><a href="#save">Save</a></li>
	<li><a href="#top">Top</a></li>

	<li><a href="community_plans.php">Back</a></li>

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
							<button class="att-viewBtn" type="submit" value="<?php echo $plnDtlLst['attID']; ?>" name="view"><h3><?php echo $plnDtlLst['attName']; ?></h3></button><br>
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
							<button class="att-viewBtn" type="submit" value="<?php echo $plnDtlLst['attID']; ?>" name="view">See details ></button>
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

	<div id="save" class="sec-3">
		<div class="edt-wrapper">
			<h2>Created By</h2>
			<h3>
			<?php
				while($comInfoLst = mysqli_fetch_array($comInfo))
				{
					echo $comInfoLst['username'];
				}
			?>
			</h3>

			<h2>Total Votes</h2>
			<h3>
			<?php
				while($comInfo2Lst = mysqli_fetch_array($comInfo2))
				{
					echo $comInfo2Lst['vtCount'];
				}
			?>
			</h3>

		</div>

		<div class="edt-wrapper">
			<h2>Like this plan?</h2>
			<h3>Duplicate this plan</h3>
			<form action="" method="post" autocomplete="off">
			<input type="date" name="startDate" required min="<?= date('Y-m-d') ?>">
			<input type="date" name="endDate" required min="<?= date('Y-m-d') ?>"><br><br>
			<button class="createBtn" type="submit" value="dups" name="dups">Duplicate</button>
			</form>

			<h3>Give this plan an upvote</h3>
			<?php
			if ($disabled == "disabled"){
				echo "<h5>You have already upvoted this plan!</h5>";
			}
			else{?>
				<form action="" method="post" autocomplete="off">
				<button class="createBtn" type="submit" value="upV" name="upV" >Up Vote</button>
				</form>
			<?php
			}
			?>


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