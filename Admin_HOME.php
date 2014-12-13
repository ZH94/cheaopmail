<?php
@session_start();

require_once 'user_functions.php';
require_once 'msg_func.php';

if(isset($_GET['New User'])){
	header('Location:add.php');
	}
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
// Attempted to login users
/*if(!empty($_POST['username']) && !empty($_POST['password'])){
	$username = $_POST['username'];
	$pass = $_POST['password']; 
    $user = new User();
	$xy = $user->login($username, $pass);
    if($xy === 1){
		header('Location: add.php');
	}
}*/
if(isset($_GET['logout'])){
	$user = new User();
	$xy = $user->logout();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Admin Cheapo Profile </title>
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
					<!--sector1 for composing message-->
					<div id = "sector1" class="sector_scheme">		
						<div id = "compose">
							<div>
								<h3> Compose New Message </h3>
								<hr>
							</div>
							<div>
								<form id="comp_msg" method="post" action="" onsubmit="return formvalidation()">
									<div class="msg_field">
										<label> Subject: </label><br>
										<input type="text" placeholder="Add a Subject">
									</div>
									<div class="msg_field">
										<label>Recipiants:</label><br>
										<input type="text" placeholder="Add a Recipiant">
									</div>
									<div class="msg_field">
										<label>Message: </label><br>
										<textarea rows="10" cols="30"></textarea>
									</div>
									<div>
										<input type="submit" value = "Send">
									</div>
								</form>
							</div>
						</div>
					</div>
					
					<!--sector2 used to display chepo users-->		
					<div id="sector2" class="sector_scheme" >
							<div>
								<h3> Cheapo Users </h3>
								<hr>
							</div>
							<div>
								<?php
								$db = new mysqli('localhost','root','', 'cheapousers');
								$sql = "SELECT id, username FROM users";
								$result = $db->query($sql);
								if ($result > 0) {
									 echo "<table><tr><th>ID</th><th>username</th></tr>";
									 // output data of each row
									 while($row = $result->fetch_assoc()) {
										 echo "<tr><td>" . $row["id"]. "</td><td>" . $row["username"]."</td></tr>";
									 }
									 echo "</table>";
								} else {
									 echo "0 results";
								}

								$db->close();
								?>
							</div>
						</div>
					<!--sector3 used to display last 10 messages-->
					<div id="sector3" class="sector_scheme" >
						<div>
							<h3> Newest Mail </h3>
							<hr>
						</div>
						<div>
							<?php
								$newmsg=getMessages();
								echo $newmsg;
							?>
						</div>
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
