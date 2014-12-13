<?php 
/* $con = new mysqli('localhost','root','', 'cheapousers');
if ($con->connect_error) {
//echo 'ERROR';
}
else {
//echo 'CONNECT';
}

$con2 = $con->query("SELECT * FROM users WHERE username = 'admin' AND pword = 'admin1001'");
//print_r($con2->fetch_assoc());
 */
?>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Cheapo Mail.com</title>

<link rel="stylesheet" type="text/css" href="login_signup.css">
</head>
<body>
<div id="wrapper">
  <h1 style=""> Welcome to Cheapo Mail </h1>
  <div id="container">
	<section class="tabs">
		<input id="tab-1" type="radio" name="radio-set" class="tab-selector-1">
		<span for="tab-1" class="tab-label-1">Login</span>
		
		<div class="clear-shadow"></div>
		
		<div id="content">
			<div class="content-1">
				
				<form action="" method="POST" autocomplete="on">
				  <p>
					<label for="username" class="uname" > Your email or username </label>
					<input class="field" name="username" required="required" type="text" placeholder="myusername or myusername@gmail.com">
				  </p>
				  <p>
					<label for="password" class="youpasswd" > Your password </label>
					<input class="field" name="password" required="required" type="password" placeholder="mypassword">
				  </p>
				  <p class="keeplogin">
					<input type="submit" value="Login" onclick="login()">
				  </p>
				</form>
			</div>
		</div>
	</section>
  </div>
</div>
<script src="funky.js"></script>
</body>
</html>