<?php
session_start();

if(isset($_SESSION['adminID']))
{	

include_once '../database.php';
$adminID = $_SESSION['adminID'];
$state = $_SESSION['state'];
$add = $_SESSION['view'];

$allAtt = mysqli_query($con,"SELECT * FROM attraction WHERE stateID = '$state' AND attID = '$add';");
$allAtt2 = mysqli_query($con,"SELECT * FROM attraction WHERE stateID = '$state' AND attID = '$add';");
$allAtt3 = mysqli_query($con,"SELECT * FROM attraction WHERE stateID = '$state' AND attID = '$add';");


if(isset($_POST['edt1'])>0)
{	
    $edtName = $_POST['edtName'];
    $allAtt3 = mysqli_query($con,"UPDATE `attraction` SET `attName` = '$edtName' WHERE `attraction`.`attID` = '$add';");


	echo "<script>
    alert('Attraction updated.');
	window.location= 'admin_attraction_detail.php';
   </script>";

}

if(isset($_POST['edt2'])>0)
{	
    $edtDescp = $_POST['edtDescp'];
    $allAtt3 = mysqli_query($con,"UPDATE `attraction` SET `descp` = '$edtDescp' WHERE `attraction`.`attID` = '$add';");


	echo "<script>
    alert('Attraction updated.');
	window.location= 'admin_attraction_detail.php';
   </script>";

}

if(isset($_POST['edt3'])>0)
{	
    $edtLDescp = $_POST['edtLDescp'];
    $allAtt3 = mysqli_query($con,"UPDATE `attraction` SET `long_descp` = '$edtLDescp' WHERE `attraction`.`attID` = '$add';");


	echo "<script>
    alert('Attraction updated.');
	window.location= 'admin_attraction_detail.php';
   </script>";

}

if(isset($_POST['edt4'])>0)
{	
    $edtCost = $_POST['edtCost'];
    $allAtt3 = mysqli_query($con,"UPDATE `attraction` SET `cost` = '$edtCost' WHERE `attraction`.`attID` = '$add';");


	echo "<script>
    alert('Attraction updated.');
	window.location= 'admin_attraction_detail.php';
   </script>";

}

if(isset($_POST['edt5'])>0)
{	
    $edtSOpHr = $_POST['edtSOpHr'];
    $edtEOpHr = $_POST['edtEOpHr'];
    $edtOpHr = $edtEOpHr."am - ".$edtEOpHr."pm";
    $allAtt3 = mysqli_query($con,"UPDATE `attraction` SET `opHr` = '$edtOpHr' WHERE `attraction`.`attID` = '$add';");


	echo "<script>
    alert('Attraction updated.');
	window.location= 'admin_attraction_detail.php';
   </script>";

}

if(isset($_POST['edt6'])>0)
{	
    $edtRcm = $_POST['edtRcm'];
    $allAtt3 = mysqli_query($con,"UPDATE `attraction` SET `rcmDur` = '$edtRcm' WHERE `attraction`.`attID` = '$add';");


	echo "<script>
    alert('Attraction updated.');
	window.location= 'admin_attraction_detail.php';
   </script>";

}

if(isset($_POST['edt6'])>0)
{	
    $edtTags = $_POST['edtTags'];
    $allAtt3 = mysqli_query($con,"UPDATE `attraction` SET `tags` = '$edtTags' WHERE `attraction`.`attID` = '$add';");


	echo "<script>
    alert('Attraction updated.');
	window.location= 'admin_attraction_detail.php';
   </script>";

}

if(isset($_POST['delete'])>0)
{	
    $allAtt3 = mysqli_query($con,"DELETE FROM `attraction` WHERE `attraction`.`attID` = '$add';");
    $allAtt3 = mysqli_query($con,"DELETE FROM `user_plan` WHERE `user_plan`.`attID` = '$add';");

	echo "<script>
    alert('Attraction updated.');
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
	<link rel="stylesheet" href="../user/attraction_detail.css">
	<link rel="icon" href="img/it.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto&display=swap" rel="stylesheet">
</head>

<ul>
	<a href="admin_home.php" class="logo"><h1>Trip Planner</h1></a>
    <li><a href="logout.php">Log Out</a></li>
  <li><a href="admin_home.php">Home</a></li>
  <li><a href="admin_attraction.php">Back</a></li>    


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

			<?php
			}?>


		</form>
	</div>

    <div class="sp-line">
	</div>

    <div id="edt-sec" class="sec-3">
		<div class="edt-wrapper">
			<h2>Edit Attraction</h2>
			<h3>Edit Attraction Name</h3>
			<form action="" method="post" autocomplete="off">
			<input type="text" name="edtName" required>
			<br><br>
			<button class="createBtn" type="submit" value="edt1" name="edt1">Save</button>
			</form>

			<h3>Edit Description</h3>
			<form action="" method="post" autocomplete="off">
			<textarea type="text" name="edtDescp"  required></textarea>
			<br><br>
			<button class="createBtn" type="submit" value="edt2" name="edt2">Save</button>
			</form>

			<h3>Edit Long Description</h3>
			<form action="" method="post" autocomplete="off">
			<textarea type="text" name="edtLDescp"  required></textarea>
			<br><br>
			<button class="createBtn" type="submit" value="edt3" name="edt3">Save</button>
			</form>

            <h3>Edit Cost</h3>
			<form action="" method="post" autocomplete="off">
			<input type="number" name="edtCost" required step=".01">
			<br><br>
			<button class="createBtn" type="submit" value="edt4" name="edt4">Save</button>
			</form>


		</div>
		<div class="edt-wrapper">
            <h3>Edit Operation Hour</h3>
			<form action="" method="post" autocomplete="off">
			<input type="text" name="edtSOpHr" placeholder="Start" required> am
            <input type="text" name="edtEOpHr" placeholder="End" required> pm
			<br><br>
			<button class="createBtn" type="submit" value="edt5" name="edt5">Save</button>
			</form>

            <h3>Edit Recommended Duration</h3>
			<form action="" method="post" autocomplete="off">
			<input type="number" name="edtRcm" min="2" max="7" required>
			<br><br>
			<button class="createBtn" type="submit" value="edt6" name="edt6">Save</button>
			</form>

            <h3>Edit Tags</h3>
            <h5>Eg: relaxing, historic, romantic, shopping, wildlife, culture</h5>
			<form action="" method="post" autocomplete="off">
			<textarea type="text" name="edtTags"  required></textarea>
			<br><br>
			<button class="createBtn" type="submit" value="edt7" name="edt7">Save</button>
			</form>

			<h3 style="color:red">Delete Attraction</h3>
			<h5 style="color:red">*Please note that once the attraction is deleted, the action cannot be revert!</h5>
			<form action="" method="post" autocomplete="off">
			<button onClick="javascript: return confirm('Please confirm deletion...');" class="dltBtn" type="delete" value="delete" name="delete">Delete</button>
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