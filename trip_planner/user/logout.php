<?php
	session_start();
	include_once '../database.php';
	mysqli_close($con);
	session_unset(); 
	session_destroy(); 
	echo '<script>
			alert("Logout successfully.\nSee you next time.");
			window.location= "login.php";
		</script>';
?>