<?php

class User{
	protected $id, $firstname, $lastname, $username;
	protected $db;
	
	public function __construct(){	
		$this->db = new mysqli('localhost','root','', 'cheapousers');	
	} 	
	
	public function login($username, $password){
		$con2 = $this->db->query("SELECT * FROM users WHERE pword = '$password' AND username = '$username';");
		if (!$this->db->connect_error) {
			if($result = $con2->fetch_assoc()){
				$this->start_session($result);
				if ($user ='admin'){}
				return 1;
			}else{
				return 0;
			}
		}else{
			echo "echo ".$con->connect_error;
		}

	}		
	
	public function logout(){
		$_SESSION = NULL;
		@session_write_close();
		
	}
	
/* 	public function getUserData($username){
		if($result = $this->db->fetch_query_results("select id, firstname, lastname, username from user where username = '"$username'")){
			return $result;
		}else{
			return 0;
		}
	} */
	
	public function addUser($firstname, $lastname, $username, $password){
		if($this->db->query("INSERT INTO users(firstname, lastname, username, pword) VALUES ('$firstname','$lastname','$username', '$password')")){
			return true; //$this->login($username, $password);
		}else{
			return false; //0;
		}
	}
	
	public function start_session($data = ''){
		session_start();
		if(!empty($data)){
			$_SESSION['uid'] = $data['id']; 	
		}
		if(isset($_SESSION['uid'])){
			//$this->username = $data['id'];	//user id
			$_SESSION = $data['username'];	//username address for user
			$_SESSION = $data['firstname'];	// first name 
			$_SESSION = $data['lastname'];	// last name 	
			//$_SESSION = $this->firstname.' '.$this->lastname;
		}else{
			return 0;
		}
	}
	
	public function getUserBy($attribute){
		return (!empty($this->$attribute))? $this->$attribute:0;
	}
	
	public function isUserLogin($username){
		return ($this->username ===  $username)? 1:0;	
	}
	
	public function isLogin($username = ''){
		return (isset($_SESSION['uid']['username']) && ($_SESSION['uid']['username'] ==  $this->username))? 1:0;	
	}
	
	public function removeUser($username){
		return ($this->isLogin($username))? ($this->db->query('delete from user where username = "'.$username.'"')):0;
	}	
	
	public function userExists($username){
		return $this->db->recordExist('SELECT count(*) > 0 FROM user WHERE username = "$username"');
	}
}


?>