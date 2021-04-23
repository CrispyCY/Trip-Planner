<?php
session_start();

if(isset($_SESSION['userID']))
{	

include_once '../database.php';
$userID = $_SESSION['userID'];
// echo $userID;
$viewRv= $_SESSION['viewRv'];
// echo $viewRv;


$allRev = mysqli_query($con,"SELECT * FROM review INNER JOIN user ON review.userID = user.userID WHERE attID = '$viewRv';");
$allRev2 = mysqli_query($con,"SELECT count(reviewID) as RPY FROM review INNER JOIN user ON review.userID = user.userID WHERE attID = '$viewRv';");

$addRv= $_SESSION['addRv'];
// echo $addRv;

date_default_timezone_set("Asia/Kuala_Lumpur");
$dtNow = date("Y-m-d");  

$result = $con->query("SELECT COUNT(reviewID) FROM review;");
$counter = $result->fetch_row();
$newCount = $counter[0] + 1;
$reviewID = 'rw'.strval($newCount);

// echo $reviewID;

if(isset($_POST['review'])>0)
{	
	$content = ucfirst($_POST['content']);
	$rating = $_POST['rating'];
	$newAtt = mysqli_query($con,"INSERT INTO `review` VALUES ('$reviewID','$content','$rating','$dtNow','$addRv','$userID');");
	echo "<script>
	alert('Review posted!');
	window.location= 'view_reviews.php';
   </script>";

}
?>

<!DOCTYPE html>
<html lang="en">
<script type="text/javascript" src="file.js"></script>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Trip Planner</title>
	<link rel="stylesheet" href="view_reviews.css">
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
	<li><a href="#new">New Review</a></li>

	<li><a href="javascript:history.go(-1)">Back</a></li>

	</ul>

	<div class="bg-wrapper">

		<div class="bg-shader">
			<div class="header-wrapper">
				<div class="header-main">
					<h1>Reviews</h1>
				</div>
			</div>
		</div>

	</div>

<div class="container">

	<?php
        if (mysqli_num_rows($allRev) == 0){?>
		<h3>No reviews yet. <a class="cr-span" href="#new">Create one?</a></h3>
	<?php
	}
	else{
		?>
		<h2 class="cr-span2"><?php while($allRev2Lst = mysqli_fetch_array($allRev2)) 
		{
			echo $allRev2Lst['RPY'];}?>
			reviews of this location
			</h2>
			
		<?php
        while($allRevLst = mysqli_fetch_array($allRev)) 
	    {
		?>
			<div class="content-wrapper">
				<div class="author ii">
					<img src="../rsc/user_icon.png" width="60" height="50" alt="user_icon">
					<h3><?php echo $allRevLst['username']; ?></h3>
					<h4>Posted on: <?php echo $allRevLst['rwDate']; ?></h4>

				</div>
				<div class="content ii">
					<?php 
					if ($allRevLst['rating'] == 1){
					?>
						<div class="rating">
						<label>
							<span class="r1_icon">★</span>
						</label>
						</div>					
					<?php 
					}
					elseif ($allRevLst['rating'] == 2){
					?>
						<div class="rating">
						<label>
							<span class="r1_icon">★</span>
							<span class="r1_icon">★</span>
						</label>
						</div>					
					<?php 
					}
					elseif ($allRevLst['rating'] == 3){
						?>
							<div class="rating">
							<label>
								<span class="r1_icon">★</span>
								<span class="r1_icon">★</span>
								<span class="r1_icon">★</span>

							</label>
							</div>					
						<?php 
						}
					elseif ($allRevLst['rating'] == 4){
						?>
							<div class="rating">
							<label>
								<span class="r1_icon">★</span>
								<span class="r1_icon">★</span>
								<span class="r1_icon">★</span>
								<span class="r1_icon">★</span>
							</label>
							</div>					
						<?php 
						}
						elseif ($allRevLst['rating'] == 5){
							?>
								<div class="rating">
								<label>
									<span class="r1_icon">★</span>
									<span class="r1_icon">★</span>
									<span class="r1_icon">★</span>
									<span class="r1_icon">★</span>
									<span class="r1_icon">★</span>
								</label>
								</div>					
							<?php 
							}
					?>
			
					<p><?php echo $allRevLst['content']; ?></p>
				</div>

			</div>

		<?php
        }
	}?>

<div class="sp-line">
	</div>

<div id="new" class="nw-wrapper">
	<h2>New Review</h2>

<form action="" method="post" autocomplete="off">
	<div class="rating">
  <label>
    <input type="radio" name="rating" value="1" />
    <span class="icon">★</span>
  </label>
  <label>
    <input type="radio" name="rating" value="2" />
    <span class="icon">★</span>
    <span class="icon">★</span>
  </label>
  <label>
    <input type="radio" name="rating" value="3" />
    <span class="icon">★</span>
    <span class="icon">★</span>
    <span class="icon">★</span>   
  </label>
  <label>
    <input type="radio" name="rating" value="4" />
    <span class="icon">★</span>
    <span class="icon">★</span>
    <span class="icon">★</span>
    <span class="icon">★</span>
  </label>
  <label>
    <input type="radio" name="rating" value="5" />
    <span class="icon">★</span>
    <span class="icon">★</span>
    <span class="icon">★</span>
    <span class="icon">★</span>
    <span class="icon">★</span>
  </label>

</div>
<br><br>

	<textarea name="content" rows="4" cols="50" placeholder="Your review"  required></textarea><br><br>

	<button class="createBtn" type="submit" value="review" name="review" >Post review</button>
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