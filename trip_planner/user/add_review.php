<?php
session_start();
include_once '../database.php';
$userID = $_SESSION['userID'];
echo $userID;
$addRv= $_SESSION['addRv'];
echo $addRv;

date_default_timezone_set("Asia/Kuala_Lumpur");
$dtNow = date("Y-m-d");  

$result = $con->query("SELECT COUNT(reviewID) FROM review;");
$counter = $result->fetch_row();
$newCount = $counter[0] + 1;
$reviewID = 'rw'.strval($newCount);

echo $reviewID;

if(isset($_POST['review'])>0)
{	
	$content = ucfirst($_POST['content']);
	$rating = $_POST['rating'];
	$newAtt = mysqli_query($con,"INSERT INTO `review` VALUES ('$reviewID','$content','$rating','$dtNow','$addRv','$userID');");
	echo "<script>
	alert('Added $content');
	window.location= 'home.php';
   </script>";

}

?>

<!DOCTYPE html>
<html lang="en">
<script type="text/javascript" src="file.js"></script>

<form action="" method="post" autocomplete="off">
<textarea name="content" rows="4" cols="50"></textarea>
<input type="number" name="rating" min="1" max="5">	

<button type="submit" value="review" name="review">Post review</button>

</form>


<a href="home.php" class="register-link">Home</a>
<a href="attraction_detail.php" class="register-link">Back</a>

</html>