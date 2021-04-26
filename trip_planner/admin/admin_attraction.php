<?php
session_start();

if(isset($_SESSION['adminID']))
{	

include_once '../database.php';
$adminID = $_SESSION['adminID'];
// echo $userID;
unset($_SESSION['view']);
$state = $_SESSION['state'];
// echo $state;

$sttInfo = mysqli_query($con,"SELECT * FROM state WHERE stateID = '$state';");
$sttInfo1 = mysqli_query($con,"SELECT * FROM state WHERE stateID = '$state';");

$allAtt = mysqli_query($con,"SELECT * FROM attraction WHERE stateID = '$state';");



if(isset($_POST['view'])>0)
{	
	$view = $_POST['view'];
	$_SESSION['view'] = $view;
	echo "<script>
	window.location= 'admin_attraction_detail.php';
   </script>";

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Trip Planner</title>
	<link rel="stylesheet" href="../user/attraction.css">
	<link rel="icon" href="img/it.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto&display=swap" rel="stylesheet">
</head>

<ul>
	<a href="admin_home.php" class="logo"><h1>Trip Planner</h1></a>
    <li><a href="logout.php">Log Out</a></li>
  <li><a href="admin_home.php">Home</a></li>

</ul>

<div id="top" class="
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
				<?php
				while($sttInfoLst = mysqli_fetch_array($sttInfo)) 
				{?>
					<h1><?php echo $sttInfoLst['stateName']; ?></h1>
				<?php	
				}?>
			</div>
			</div>
		</div>

</div>


<div class="container1">
	<div class="st-descp">
	<?php
			while($sttInfo1Lst = mysqli_fetch_array($sttInfo1)) 
			{?>
		<h2>About <?php echo $sttInfo1Lst['stateName']; ?></h2>
		<h3><?php echo $sttInfo1Lst['descp']; ?></h3>
		<?php	
			}?>

	</div>

	<div class="sp-line">
	</div>

<form  action="" method="post" autocomplete="off">
	<div class="split">


				<?php while($allAttLst = mysqli_fetch_array($allAtt)) 
				{
				?>
						<div class="att-wrapper">

					<button class="att-viewBtn" type="submit" value="<?php echo $allAttLst['attID']; ?>" name="view"><h3><?php echo $allAttLst['attName']; ?></h3></button><br>
					<img src="../rsc/att_img/<?php echo $allAttLst['imgName']; ?>" alt="<?php echo $allAttLst['attName']; ?>" width="220" height="180">
					<h4 class="att-dur"> &#x1F551; <?php echo $allAttLst['rcmDur']; ?> hours</h4>
					<p class="att-descp"><?php echo $allAttLst['descp']; ?></p>
					<button class="att-viewBtn" type="submit" value="<?php echo $allAttLst['attID']; ?>" name="view">See details ></button>
					</div>

				<?php
				}?>
			</div>

</form>
</div>

</html>
<?php 
}
else{
	echo "<script>
	alert('Access Denied.');
	window.location= '../user/login.php';
   </script>";
}
?>