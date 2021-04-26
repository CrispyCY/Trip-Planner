<?php
session_start();


if(isset($_SESSION['adminID']))
{	
$adminID = $_SESSION['adminID'];
include_once '../database.php';

$allAtt = mysqli_query($con,"SELECT * FROM attraction;");

if(isset($_POST['state'])>0)
{	
	$state=$_POST['state'];
	$_SESSION['state']=$state;
	echo "<script>
	 window.location= 'admin_attraction.php';
	</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trip Planner</title>
  <link rel="stylesheet" href="admin_home.css">
  <link rel="icon" href="img/it.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto&display=swap" rel="stylesheet">
</head>

<ul>
  <a href="admin_home.php" class="logo">
    <h1>Trip Planner</h1>
  </a>
  <li><a href="logout.php">Log Out</a></li>
  <li><a href="admin_home.php">Home</a></li>
</ul>

<div id="top" class="bg-wrapper">
  <div class="bg-shader">
    <div class="header-wrapper">
      <div class="header-main">
        <h1>Admin</h1>
      </div>
    </div>
  </div>

</div>

<div class="container1">
<h2>Browse Attractions</h2>

<form action="" method="post" autocomplete="off">
  <button class="br-wrapper" type="submit" value="st1" name="state">
      Perak
  </button>
  <button class="br-wrapper" type="submit" value="st2" name="state">		
      Selangor
</button>
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