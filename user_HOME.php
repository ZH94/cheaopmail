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
		<title> User Cheapo Profile </title>
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
				<!--sector1 for composing message-->
				<div id="sector_container">
					<div class="sector_scheme">
						<div id = "sector1" >					
							<div id = "compose">
								<h3> Compose New Message </h3>
								<form method="post" action="" onsubmit="return formvalidation()">
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
					<div id="sector_container">
						<!--sector2 used to display chepo users-->		
						<div id="sector2" class="sector_scheme" >
							<h3> Cheapo Users </h3>
							<div id = "resentmessagaes">
								<table>
									<tr>
										<td><p> cheapo users displayed here using php function to retrieve usenames and emails </p></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<div id="sector_container">
						<!--sector3 used to display last 10 messages-->
						<div id="sector3" class="sector_scheme" >
							<h3> Newest Mail </h3>
							<table>
								<div>
								<tr>  </tr>
									<tr> 
										<td class="user"><a href=" sent mail">user</a></td>
										<td class="sub"><a href=" sent mail">Subject </a></td>
										<td class="msg"><a href=" sent mail">Message</a></td>
									</tr>
									<tr> 
										<td class="user"><a href=" sent mail">user</a></td>
										<td class="sub"><a href=" sent mail">Subject </a></td>
										<td class="msg"><a href=" sent mail">Message</a></td>
									</tr>
									<tr> 
										<td class="user"><a href=" sent mail">user</a></td>
										<td class="sub"><a href=" sent mail">Subject </a></td>
										<td class="msg"><a href=" sent mail">Message</a></td>
									</tr>
									<tr> 
										<td class="user"><a href=" sent mail">user</a></td>
										<td class="sub"><a href=" sent mail">Subject </a></td>
										<td class="msg"><a href=" sent mail">Message</a></td>
									</tr>
									<tr> 
										<td class="user"><a href=" sent mail">user</a></td>
										<td class="sub"><a href=" sent mail">Subject </a></td>
										<td class="msg"><a href=" sent mail">Message</a></td>
									</tr>
									<tr> 
										<td class="user"><a href=" sent mail">user</a></td>
										<td class="sub"><a href=" sent mail">Subject </a></td>
										<td class="msg"><a href=" sent mail">Message</a></td>
									</tr>
									<tr> 
										<td class="user"><a href=" sent mail">user</a></td>
										<td class="sub"><a href=" sent mail">Subject </a></td>
										<td class="msg"><a href=" sent mail">Message</a></td>
									</tr>
									<tr> 
										<td class="user"><a href=" sent mail">user</a></td>
										<td class="sub"><a href=" sent mail">Subject </a></td>
										<td class="msg"><a href=" sent mail">Message</a></td>
									</tr>
									<tr> 
										<td class="user"><a href=" sent mail">user</a></td>
										<td class="sub"><a href=" sent mail">Subject </a></td>
										<td class="msg"><a href=" sent mail">Message</a></td>
									</tr>
									<tr> 
										<td class="user"><a href=" sent mail">user</a></td>
										<td class="sub"><a href=" sent mail">Subject </a></td>
										<td class="msg"><a href=" sent mail">Message</a></td>
									</tr>
									<tr> 
										<td class="user"><a href=" sent mail">user</a></td>
										<td class="sub"><a href=" sent mail">Subject </a></td>
										<td class="msg"><a href=" sent mail">Message</a></td>
									</tr>
								</div>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="C_footer">
			<div id = "footer_wrapp">
				<p>Copyright © ermaine Flemmings Roshane Robnson  Zola Hinds</p>
			</div>
		</div>
	</body>
</html>
