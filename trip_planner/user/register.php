<?php
session_start();
include_once '../database.php';

if(isset($_POST['submit']))
{
	 $userID=$_POST['userID'];
	 $username=$_POST['username'];
	 $password=$_POST['password'];
	 $givenName=$_POST['firstName'];
	 $surname=$_POST['lastName'];
	 $email=$_POST['email'];
	 
	
	$result = mysqli_query($con,"SELECT userID FROM user WHERE userID='$userID'");
	$resultEmail = mysqli_query($con,"SELECT email FROM user WHERE  email='$email'");
	
	if (mysqli_num_rows($result) == 0)
	{
		if (mysqli_num_rows($resultEmail) == 0)
		{

				$sql = "INSERT INTO user VALUES 
					('$userID','$username','$password','$givenName','$surname','$email')";

				 mysqli_query($con, $sql);
				 mysqli_close($con);
				 
				 echo "<script>
						alert('Registered successfully!');
						window.location= 'login.php';
					</script>";
			
		}
		else
		{
			echo "<script>
					alert('Email address has been taken.');
				</script>"; 
		}
		 
	}
	else
	{
		echo "<script>
				alert('UserID has been taken.');
			</script>"; 
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Registration</title>
	<link rel="stylesheet" href="register.css">
	<link rel="icon" href="Image/favicon.ico" type="image/x-icon">
</head>

<body>
<div class="bg-wrapper">
		<div class="bg-shader">
			<div class="container">
				<div class="rgt-wrapper">
					<div class="header-wrapper">
						<h1>User Registration</h1>
						---------------<a href="login.php"> Trip Planner </a>----------------
					</div>
						
					<div class="rgt-form">
						<form action="" autocomplete="off" method="post">
							<h3>Username and Password</h3>
							<table class="form-table">
								<tbody>
									<tr>
										<td><label>User ID: </label></td>
										<td><input type="text" name="userID" autofocus required placeholder="User ID" maxlength='20' autofocus></td>
									</tr>
									<tr>
										<td><label>Username: </label></td>
										<td><input type="text" name="username" autofocus required placeholder="Nickname" maxlength='20'></td>
									</tr>
									<tr>
										<td><label>Password: </label></td>
										<td><input type="password" name="password" required placeholder="At least 8 characters" minlength="8"></td>
									</tr>
								</tbody>
							</table>
							<br>
							<h3>User Info</h3>
							<table class="form-table"> 
								<tbody>
								<tr>
									<td><label>Given Name</label><br><input type="text" name="firstName" placeholder="First Name" required ></td>
									<td><label>Surname</label><br><input type="text" name="lastName" placeholder="Last Name" required ></td>
								</tr>
								<tr>
									<td><label>Email</label><br><input type="email" name="email"  placeholder="xxx@yyy.zzz" title="Valid email address with '@' and domain" required ></td>
								</tr>
								</tbody>
							</table>
							<br>
							<button class="btnSubmit" type="submit" name="submit">Sign me up!</button>
						</form><br>
						Already have an account? <a href="login.php" class="login-link">Login</a>
					</div>	
				</div>
			</div>
		</div>
	</div>
</body>

</html>
