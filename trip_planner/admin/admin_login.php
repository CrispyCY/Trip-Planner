<?php
session_start();
include_once '../database.php';

date_default_timezone_set("Asia/Kuala_Lumpur");
$dtNow = date("Y-m-d");  


if(isset($_POST['submit']))
{	

	 $userID=$_POST['userID'];
	 $password=$_POST['password'];
	 
	 if($userID!='' && $password!='')
	 {
    
    	$sql = "SELECT * FROM admin WHERE adminID='$userID' AND binary password='$password';";

	   $result = mysqli_query($con, $sql);

	   if (mysqli_num_rows($result) > 0)
	   {
           	 $_SESSION['adminID'] = $userID;

				echo"<script>
                alert('Welcome, $userID.');
                window.location= 'admin_home.php';
			</script>";

	   }
	   else
		{
			echo"<script>
				alert('Incorrect username or password!');
				window.location= 'admin_login.php';
			</script>";
		}
	}
	else
	{
		  echo"<script>
				alert('Enter both username and password!');
				window.location= 'admin_login.php';
			</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Trip Planner</title>
	<link rel="stylesheet" href="admin_login.css">
	<link rel="icon" href="img/it.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto&display=swap" rel="stylesheet">
</head>

<body>
	<div class="bg-wrapper">
		<div class="bg-shader">
			<div class="container">
				<div class="header-main">
					<h1>Trip Planner</h1>
				</div>
						<div class="login-form">
							<h3>Admin Log In</h3>
							<form action="" method="post" autocomplete="off">
								<label for="username">Admin ID</label><br>
								<input type="text"  autofocus="true" maxlength="256" name="userID"
									data-name="username" placeholder=" User ID" id="userID" required=""><br><br>

								<label for="password">Password</label><br>
								<input type="password"  maxlength="256" name="password" data-name="password"
									id="password" required=""><br><br>
									
								<input type="submit" value="Log In" class="btnSubmit" name="submit">
							</form><br>
						</div>
			</div>
		</div>
	</div>

</body>

</html>
