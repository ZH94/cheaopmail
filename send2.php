<?php
@session_start();

require_once 'user_functions.php';
require_once 'msg_func.php';

if(isset($_GET['Inbox'])){
	header('Location:inbox.php');
	}
if(isset($_GET['Sent'])){
	header('Location:sent.php');
	}
if(isset($_GET['logout'])){
	$user = new User();
	$xy = $user->logout();
}
if(isset($_GET['logout'])){
	$user = new User();
	$xy = $user->logout();
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
							<li><a href="user_HOME.php"> Home </a></li>
							<li><a href="inbox.php"> Inbox </a></li>
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
