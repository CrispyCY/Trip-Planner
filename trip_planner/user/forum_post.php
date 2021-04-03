<?php
session_start();
include_once '../database.php';
$userID = $_SESSION['userID'];
echo $userID;
$frView = $_SESSION['frView'];
echo $frView;

date_default_timezone_set("Asia/Kuala_Lumpur");
$dtNow = date("Y-m-d");  

$sltPost = mysqli_query($con,"SELECT * FROM 
forum INNER JOIN user ON user.userID = forum.userID
WHERE forum.frmID = '$frView';");

//possible improvement(?)
$pstCmt = mysqli_query($con,"SELECT * FROM comment INNER JOIN user ON user.userID = comment.userID
WHERE comment.frmID = '$frView';");

$pstCmt1 = mysqli_query($con,"SELECT COUNT(cmtID) as RPY FROM comment INNER JOIN user ON user.userID = comment.userID
WHERE comment.frmID = '$frView';");


$result = $con->query("SELECT COUNT(cmtID) FROM comment;");
$counter = $result->fetch_row();
$newCount = $counter[0] + 1;
$cmtID = 'cmt'.strval($newCount);

if(isset($_POST['cmt'])>0)
{	
    $cmt=ucfirst($_POST['comment']);
    $newCmt = mysqli_query($con,"INSERT INTO `comment` VALUES ('$cmtID','$cmt','$dtNow','$userID','$frView');");
    // $post = mysqli_query($con,"INSERT INTO `post` VALUES ('$frView','$cmtID');");
	echo "<script>
	alert('$cmtID');
	window.location= 'forum_post.php';
   </script>";

}

?>

<!DOCTYPE html>
<html lang="en">
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Trip Planner</title>
	<link rel="stylesheet" href="forum_post.css">
	<link rel="icon" href="img/it.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto&display=swap" rel="stylesheet">
</head>

	<ul>
	<a href="home.php" class="logo"><h1>Trip Planner</h1></a>
	<li><a href="logout.php">Log Out</a></li>    
	<li><a href="forum.php">Forum</a></li>
	<li><a href="edt_user.php">Edit User Profile</a></li>
	<li><a href="home.php">Home</a></li>
	<li><a href="#new">New Comment</a></li>

	<li><a href="forum.php">Back</a></li>


	</ul>

	<div class="bg-wrapper">

		<div class="bg-shader">
			<div class="header-wrapper">
				<div class="header-main">
					<h1>Forum Post</h1>
				</div>
			</div>
		</div>

	</div>

<div class="container">

	<?php while($sltPostLst = mysqli_fetch_array($sltPost)) 
		{
			?>
		<div class="content-wrapper">
				<div class="author">
					<img src="../rsc/user_icon.png" width="60" height="50" alt="user_icon">
					<h3><?php echo $sltPostLst['username']; ?></h3>
					<h4>Posted on: <?php echo $sltPostLst['date']; ?></h4>

				</div>
				<div class="content">
					<h1><?php echo $sltPostLst['title']; ?></h1>
					<p><?php echo $sltPostLst['content']; ?></p>

				</div>

		</div>
	<?php
	}
	?>

<div class="sp-line">
	</div>

	<?php
        if (mysqli_num_rows($pstCmt) == 0){?>
		<h3>No comments yet. <a class="cr-span" href="#new">Create one?</a></h3>
	<?php
	}
	else{
		?>
		<h2 class="cr-span2"><?php while($pstCmt1Lst = mysqli_fetch_array($pstCmt1)) 
		{
			echo $pstCmt1Lst['RPY'];}?>
			replies to this topic
			</h2>
			
		<?php
        while($pstCmtLst = mysqli_fetch_array($pstCmt)) 
	    {
		?>
			<div class="content-wrapper">
				<div class="author ii">
					<img src="../rsc/user_icon.png" width="60" height="50" alt="user_icon">
					<h3><?php echo $pstCmtLst['username']; ?></h3>
					<h4>Posted on: <?php echo $pstCmtLst['date']; ?></h4>

				</div>
				<div class="content ii">
					<p><?php echo $pstCmtLst['comment']; ?></p>

				</div>

			</div>

		<?php
        }
	}?>

<div class="sp-line">
	</div>

<div id="new" class="nw-wrapper">
	<h2>New Comment</h2>
	<form action="" method="post" autocomplete="off">
		<textarea name="comment" rows="4" cols="50" placeholder="Your message" required></textarea><br><br>

		<input class="createBtn" type="submit" value="Post" name="cmt">

	</form>
</div>
</div>
</html>