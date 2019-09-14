<?php
  include('controller/connect.php');
  session_start();
  if(isset($_SESSION['row']['user_type'])){
    if($_SESSION['row']['user_type'] == 'admin'){
      header("Location: admin.php");
    }
    else{
    	header("Location: borrowing.php");
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/login-style.css">
</head>
<body>
	<div id="wrapper">

	<form name="login-form" class="login-form" action="controller/login.php" method="post">
	
		<div class="header">
		<h1>Login</h1>
		<span>AVC-Borrowing System</span>
		</div>
	
		<div class="content">
		<input name="username" type="text" class="input username" placeholder="Username" />
		<div class="user-icon"></div>
		<input name="password" type="password" class="input password" placeholder="Password" />
		<div class="pass-icon"></div>		
		</div>

		<div class="footer">
		<input type="submit" name="submit" value="Login" class="button" />
		<a href="index.php" class="register">Back</a>
		</div>
	
	</form>

</div>
<div class="gradient"></div>

</body>
</html>