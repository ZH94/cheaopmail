<?php
@session_start();

require_once 'user_functions.php';
// Attempted to login users
if(!empty($_POST['username']) && !empty($_POST['password'])){
	$username = $_POST['username'];
	$pass = $_POST['password']; 
    $user = new User();
	$xy = $user->login($username, $pass);
    if($xy === 1){
		header('Location: Admin_HOME.php');
	}
	if(!$xy === 1){
		header('Location: user_HOME.php');
	}
}
if(isset($_GET['logout'])){
	$user = new User();
	$xy = $user->logout();
}
?>
<html>
	<head>
		<title> Cheapo Login Page </title>
		<link rel="stylesheet" type="text/css" href="Cheapo_header.css">
		<link rel="stylesheet" type="text/css" href="Cheapo_body.css">
	</head>
	<body>
		<div id="C_header">
			<div id="header_wrapper">
				<div id="header_sub1">
					<p> Cheapo Mail </p>
				</div>
				<div id = "header_sub2" >
					<div id = "nav_bar">
						<ul>
							<li><a href="#"> Login </a></li>
							<li><a href="#"> Logout </a></li>
						</ul>
					</div>
				</div>
				<div id = "header_sub3" >
					<p> WELCOME TO CHEAPOMAIL THE WORLD'S BEST MAILING SERVICE </p>
				</div>
			</div>
		</div>
		<div id="C_body">
			<div id="body_wrapp">


				<form action="" method="POST" autocomplete="on">
					<div>
						<label for="username" class="uname" > Your email or username </label>
						<input class="field" name="username" required="required" type="text" placeholder="myusername or myusername@gmail.com">
					</div>

					<div>
						<label for="password" class="youpasswd" > Your password </label>
						<input class="field" name="password" required="required" type="password" placeholder="mypassword">
					</div>
					<div class="keeplogin">
						<input type="submit" value="Login" onclick="login()">
					</div>
				</form>
			</div>
		</div>
	</body>
</html>