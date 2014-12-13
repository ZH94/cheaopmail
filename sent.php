<?php
@session_start();

require_once 'user_functions.php';
require_once 'msg_func.php';
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
		<title> Sent </title>
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
					<div id="cable"> 
					<p>MAIL</p>
					<?php
								$newmsg=getSentMessages($user, $limit = 'all', $condition='');
								echo $newmsg;
							?>
					</div>
					<div id="subj">
					<p>SUBJECT</p>
					</div>
					<div id="reply">
					<p>REPLY</p>
					<button type="button">Forward</button>
					</div>
					
				</div>
			</div>
		</div>
		<div id="C_footer">
			<div id = "footer_wrapp">
				<p>Copyright © Jermaine Flemmings Roshane Robinson  Zola Hinds</p>
			</div>
		</div>
	</body>
</html>