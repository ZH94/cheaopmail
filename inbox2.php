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
		header('Location: add.php');
	}
}
if(isset($_GET['logout'])){
	$user = new User();
	$xy = $user->logout();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Inbox </title>
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
							<li><a href="user_HOME.php"> Home </a></li>
							<li><a href="inbox2.php"> Inbox </a></li>
							<li><a href="sent2.php"> Sent </a></li>
							<li><a href="login.php?logout"> Logout </a></li>
						</ul>
					</div>
				</div>
				<div id = "header_sub3" >
					<?php
						$db = new mysqli('localhost','root','', 'cheapousers');
						$name= $db->query('SELECT username FROM users');
						$row=$name->fetch_assoc();
						echo " Hello " .$row["username"];
					?>
				</div>
			</div>
		</div>
		<div id="C_body">
			<div id="body_wrapper">
				<div id="sub_body">
					<div id="maillist" class="sector_scheme">
						<div>
							<div>
								<h3> Mail </h3>
								<hr>								
							</div>
							<div>
								<table style="margin:0px auto; margin-top:10px; width:450px;">
									<tr>
										<td>User</td>
										<td>Subject</td>
									</tr>
									<tr>
										<td>User</td>
										<td>Subject</td>
									</tr>
									<tr>
										<td>User</td>
										<td>Subject</td>
									</tr>
									<tr>
										<td>User</td>
										<td>Subject</td>
									</tr>
									<tr>
										<td>User</td>
										<td>Subject</td>
									</tr>
									<tr>
										<td>User</td>
										<td>Subject</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					</div id="maildisplay" class="sector_scheme">
						<div> 
							<div>
								<h3> Message </h3>
								<hr> 
							</div>
							<div style="float:left; height:440px; width:480px;">
								<div>
									<form style=" margin:0px auto; height:400px; width:460px;">
										<input style =" marging:0px auto; width:450px; height:320px" type="comment">
										<input style=" width:100px; height:40px;"type="button" value ="reply">					
									</form>
								</div>
							<div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</body>
</html>
