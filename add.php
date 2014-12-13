<?php
@session_start();
require_once 'user_functions.php';
$bex = false;
if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['username']) && !empty($_POST['pass'])){
    
    $uname = $_POST['username'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $pass = $_POST['pass'];
	//$pass_con = $_POST['pass_con'];
    $user = new User();
    if($user->addUser($fname, $lname, $uname, $pass)){
		$bex = 'User was added!!!';
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>  </title>
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
							<li><a href="Admin_HOME.php"> Home </a></li>
							<li><a href="add.php"> New User </a></li>
							<li><a href="inbox.php"> Inbox </a></li>
							<li><a href="sent.php"> Sent </a></li>
							<li><a href="login.php?logout"> Logout </a></li>
						</ul>
					</div>
				</div>
				<div id = "header_sub3" >
					<p>  Hello "User name"</p>
				</div>
			</div>
		</div>
		<div id="C_body">
			<div id="body_wrapp">
				<h1> Add User </h1>
				<div id = "sector1" class="sector_scheme" >
				
					<form action="" method="post" autocomplete="on">
						<?php if($bex !== false){
						echo "<h1 style=\"color:#000;\">User has been added!!!</h1>";
						} ?>
						 <div>
							<label for="firstnamesignup" class="fname" >Firstname</label>
							<input class="field" name="firstname" required="required" type="text" placeholder="eg. John">
						</div>
						<div>
							<label for="lastnamesignup" class="lname" >Lastname</label>
							<input class="field" name="lastname" required="required" type="text" placeholder="eg. Smith">
						</div>
						<div>
							<label for="usernamesignup" class="uname" >Your username</label>
							<input class="field" name="username" required="required" type="text" placeholder="eg. J.Smith">
						</div>
						<div>
							<label for="emailsignup" class="youmail" > Your email</label>
							<input class="field" name="email" required="required" type="email" placeholder="eg. J.Smith@gmail.com">
						</div>
						<div>
							<label for="passwordsignup" class="youpasswd" >Your password </label>
							<input class="field" name="pass" required="required" type="password" placeholder="mypassword">
					  	</div>
					  	<div>
							<label for="passwordsignup_confirm" class="youpasswd" >Please confirm your password </label>
							<input class="field" name="pass_con" required="required" type="password" placeholder="mypassword">
						 </div>
						<div class="signin button">
					  		<a href="login.php?logout">Logout</a>
					  	</div>
					  	<div class="signin button">
					  		<input type="submit" value="Sign up">
					  	</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>