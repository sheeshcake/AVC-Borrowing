<?php
	include "connect.php";
	session_start();

	if(isset($_POST['submit'])){
		$sql = "SELECT * FROM users WHERE id_number='" . $_POST['id-number'] . "'";
		$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result) == 0){
			$sql = "INSERT INTO users(name, id_number,user_type,username,password) values('" . $_POST['name'] . "','" . $_POST['id-number'] . "','" . $_POST['user-type'] . "','" . $_POST['id-number'] . "','" . $_POST['id-number'] . "')";
			if(mysqli_query($conn,$sql)){
				$_SESSION['message'] = 'success';
				header("location: ../admin.php?open=register");
			}
			else{
				$_SESSION['message'] = 'failed';
				header("location: ../admin.php?open=register");
			}
		}
		else{
			$_SESSION['message'] = 'already';
			header("location: ../admin.php?open=register");
		}

	}
	

?>