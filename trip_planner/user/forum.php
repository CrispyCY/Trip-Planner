<?php
session_start();

if(isset($_SESSION['userID']))
{	

include_once '../database.php';
unset($_SESSION['frView']);
$userID = $_SESSION['userID'];
// echo $userID;

$allPst = mysqli_query($con,"SELECT * FROM forum INNER JOIN user ON user.userID = forum.userID ORDER BY `forum`.`date` DESC;");
// $allPst = mysqli_query($con,"SELECT * FROM forum ORDER BY `forum`.`date` DESC;");



date_default_timezone_set("Asia/Kuala_Lumpur");
$dtNow = date("Y-m-d");  
// echo $dtNow;

$result = $con->query("SELECT COUNT(frmID) FROM forum;");
$counter = $result->fetch_row();
$newCount = $counter[0] + 1;
$frmID = 'frm'.strval($newCount);

if(isset($_POST['frView'])>0)
{	
	$frView = $_POST['frView'];
	$_SESSION['frView'] = $frView;
	echo "<script>
	window.location= 'forum_post.php';
   </script>";

}

if(isset($_POST['frPost'])>0)
{	
    $title=ucfirst($_POST['title']);
    $content=ucfirst($_POST['content']);
    $newPost = mysqli_query($con,"INSERT INTO `forum` VALUES ('$frmID','$title','$content','$dtNow','$userID');");
	echo "<script>
	alert('Topic posted!');
	window.location= 'forum.php';
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
	<li><a href="logout.php">Log Out</a></li>    
	<li><a href="forum.php">Forum</a></li>
	<li><a href="edt_user.php">User Profile</a></li>
	<li><a href="home.php">Home</a></li>
	<li><a href="#new">New Post</a></li>


	</ul>

	<div class="bg-wrapper">

		<div class="bg-shader">
			<div class="header-wrapper">
				<div class="header-main">
					<h1>Forum</h1>
				</div>
			</div>
		</div>

	</div>

<div class="container">
	<div class="split">

			<form class="frmLst-wrapper" action="" method="post" autocomplete="off">
			<div class="table-wrapper">

			<table class="frm-table">
					<tr>
						<th>Topic</th>
						<th>Created By</th>
						<th>Replies</th>

					</tr>

					<?php while($allPstLst = mysqli_fetch_array($allPst)) 
					{
						$lstFrmID=$allPstLst['frmID'];
						$allRpy = mysqli_query($con,"SELECT COUNT(cmtID) as RPY FROM comment WHERE frmID='$lstFrmID' ;");
					?>
					<tr>
						<td><button class="att-viewBtn" type="submit" value="<?php echo $allPstLst['frmID']; ?>" name="frView"><?php echo $allPstLst['title']; ?></button></td>
						<td><?php echo $allPstLst['username']; ?></td>
						<td><?php while($allRpyLst = mysqli_fetch_array($allRpy)) 
							{
								echo $allRpyLst['RPY']; }?></td>
					</tr>
					<?php
					}?>
			</table>
			</div>

			</form>

		<div class="side-wrapper">
		</div>
	</div>

	<div class="sp-line">
	</div>

	<div id="new" class="nw-wrapper">
	<h2>New Post</h2>
	<form action="" method="post" autocomplete="off">
		<textarea name="title" rows="4" cols="50" placeholder="Subject" required></textarea><br><br>
		<textarea name="content" rows="4" cols="50" placeholder="Your Message" required></textarea><br><br>

		<input class="createBtn" type="submit" value="Post" name="frPost">

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