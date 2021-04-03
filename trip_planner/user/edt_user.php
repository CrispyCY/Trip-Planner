<?php
session_start();
include_once '../database.php';

$userID = $_SESSION['userID'];


if(isset($_POST['edt_pass']))
{
	 $userID=$_POST['userID'];
	 $old_pass=$_POST['old_pass'];
	 $new_pass=$_POST['new_pass'];	 
	
	$result = mysqli_query($con,"SELECT userID FROM user WHERE userID='$userID' AND password='$old_pass';");
	
	if (mysqli_num_rows($result) != 0)
	{

        $sql = "UPDATE `user` SET `password`='$new_pass' WHERE `userID`='$userID';";

            mysqli_query($con, $sql);
            mysqli_close($con);
            
            echo "<script>
                alert('Saved successfully');
                window.location= 'home.php';
            </script>";
					 
	}
	else
	{
		echo "<script>
				alert('Incorrect user ID or password!');
			</script>"; 
	}
}

if(isset($_POST['edt_info']))
{
     $username=$_POST['username'];
	 $givenName=$_POST['firstName'];
	 $surname=$_POST['lastName'];
     $pass=$_POST['pass'];

	$chkPass = mysqli_query($con,"SELECT userID FROM user WHERE password='$pass' AND userID='$userID';");
	
	if (mysqli_num_rows($chkPass) != 0)
	{
        $sql = "UPDATE `user` SET `username`='$username',`firstName`='$givenName',`lastName`='$surname' WHERE `userID`='$userID';";

        mysqli_query($con, $sql);
        mysqli_close($con);
        
        echo "<script>
            alert('Saved successfully');
            window.location= 'home.php';
        </script>";
		 
	}
	else
	{
		echo "<script>
				alert('Incorrect password!');
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
	<link rel="stylesheet" href="edt_user.css">
	<link rel="icon" href="img/it.png" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto&display=swap" rel="stylesheet">
</head>



<body>
<ul>
	<a href="home.php" class="logo"><h1>Trip Planner</h1></a>
	<li><a href="logout.php">Log Out</a></li>    
	<li><a href="forum.php">Forum</a></li>
	<li><a href="edt_user.php">Edit User Profile</a></li>
	<li><a href="home.php">Home</a></li>

	</ul>

<div class="bg-wrapper">
		<div class="bg-shader">
			<div class="container">
				<div class="rgt-wrapper">
					<div class="header-wrapper">
						<h1>Edit User Profile</h1>
					</div>
						
					<div class="rgt-form">
						<form action="" autocomplete="off" method="post">
							<h3>Edit Password</h3>
							<table class="form-table">
								<tbody>
									<tr>
										<td><label>User ID: </label></td>
										<td><input type="text" name="userID" required placeholder="User ID" maxlength='20' autofocus></td>
									</tr>
									<tr>
										<td><label>Old Password: </label></td>
										<td><input type="password" name="old_pass" required placeholder="Password" minlength="8"></td>
									</tr>
									<tr>
										<td><label>New Password: </label></td>
										<td><input type="password" name="new_pass" required placeholder="At least 8 characters" minlength="8"></td>
									</tr>
								</tbody>
							</table>
                            <br>
                            <button class="btnSubmit" type="submit" name="edt_pass">Save</button>
                            </form>
							<br>
                            <form action="" autocomplete="off" method="post">
							<h3>Edit User Info</h3>
							<table class="form-table"> 
								<tbody>
								<tr>
                                    <td><label>Username</label><br><input type="text" name="username" placeholder="Nickname" required ></td>
                                </tr>
								<tr>
									<td><label>Given Name</label><br><input type="text" name="firstName" placeholder="First Name" required ></td>
                                </tr>
								<tr>
									<td><label>Surname</label><br><input type="text" name="lastName" placeholder="Last Name" required ></td>
								</tr>
                                <tr>
									<td><label>Password</label><br><input type="password" name="pass" placeholder="Password"  required ></td>
								</tr>

								</tbody>
							</table>
							<br>
							<button class="btnSubmit" type="submit" name="edt_info">Save</button>
                            </form><br>
					</div>	
				</div>
			</div>
		</div>
	</div>
</body>

</html>
