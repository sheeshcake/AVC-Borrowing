<?php

	include 'connect.php';
	session_start();
	if(isset($_POST['submit'])){
		$sql = "SELECT * FROM users WHERE username='" . $_POST["username"]. "' AND password='" . $_POST['password'] . "'";
		$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result) == 1){
			$_SESSION['row'] = mysqli_fetch_array($result,MYSQLI_ASSOC);
			if($_SESSION['row']['user_type'] == 'admin'){
				header("Location: ../admin.php?open=dashboard");
			}
			else if($_SESSION['row']['user_type'] == 'student'){
				header("Location: ../reserve.php");
			}
			else{
				header("Location: ../borrowing.php?open=dashboard");
			}
		}
		else{
			echo "<script type='text/javascript'>alert('ERROR!!');</script>";
		}
	}