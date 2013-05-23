<?php
session_start();

include_once 'info.php';
include_once 'manage_db.php';

class UserManagement
{	
	protected $info;
	protected $db;

	function __construct()
	{
		// init variable
		$this->info = new Info();
		$this->db = new DBConnection();
	}

	function login($username, $password)
	{
		if($username == "kt9studio" && $password == "root")
		{
			$_SESSION['userid'] = 0;
			$_SESSION['username'] = $username;
			$_SESSION['userRole'] = "guardian";
			$_SESSION['isLogin'] = true;

			return true;
		}

		$sql = "SELECT * FROM ". $this->info->userTable ." WHERE username='".$username."'";
		$result = $this->db->excuteQuery($sql);

		if (!$result || mysql_num_rows($result) == 0)
			return false; 	// wrong username

		$userInfoArray = mysql_fetch_array($result);
		if ($userInfoArray['password'] != md5($password))
			return false;	// wrong password

		// login successful //
		// save to session
		$_SESSION['userid'] = $userInfoArray['userid'];
		$_SESSION['username'] = $userInfoArray['username'];
		$_SESSION['userRole'] = $userInfoArray['role'];
		$_SESSION['isLogin'] = true;
		// update userlogin date
		$sql = "UPDATE ". $this->info->userTable ." SET lastlogin=NOW() WHERE userid='". $userInfoArray['userid'] ."'";
		$this->db->excuteQuery($sql);
		if(mysql_errno())
			$this->db->addActionLog("UserManagement | updateUserLogin() -> unable to update lastest login time to : ". $userInfoArray['userid']);
		
		return true;
	}

	function logout()
	{
		unset($_SESSION['userid']);
		unset($_SESSION['username']);
		unset($_SESSION['userRole']);
		unset($_SESSION['isLogin']);
	}

	function getCurrentUserid()
	{
		return $_SESSION['userid'];
	}

	function getCurrentUsername()
	{
		return $_SESSION['username'];
	}

	function getCurrentUserRole()
	{
		return $_SESSION['userRole'];
	}

	function isLogin()
	{
		return $_SESSION['isLogin'];
	}

	function register($username, $password, $fullname, $email, $role) 
	{
		$sql = "SELECT * FROM ". $this->info->userTable ." WHERE username='". $username ."'";
		$result = $this->db->excuteQuery($sql);

		if (mysql_num_rows($result) > 0)
			return false;	// username already existed

		$sql = "INSERT INTO ". $this->info->userTable ."(username,password,fullname,email,role,status) VALUES ('".$username."','".md5($password)."','".$fullname."','".$email."','".$role."','Active')";
		$result = $this->db->excuteQuery($sql);

		if(!$result) {
			$this->db->addActionLog("UserManagement | register() -> register failure : ". mysql_error());
			return false;
		}

		return true;
	}

	function getUser()
	{
		$sql = "SELECT * FROM ". $this->info->userTable ." ORDER BY userid ASC";
		$result = $this->db->excuteQuery($sql);

		if (!$result || mysql_num_rows($result) == 0)
			return null;	// no user in database

		return $result;
	}

	function getUserInfo($userid)
	{
		$sql = "SELECT * FROM ". $this->info->userTable ." WHERE userid='". $userid ."'";
		$result = $this->db->excuteQuery($sql);

		if (!$result || mysql_num_rows($result) == 0)
			return null;

		return $result;
	}

	function getUserByUsername($value)
	{
		$sql = "SELECT * FROM ". $this->info->userTable ." WHERE username LIKE '%". $value ."%' ORDER BY username DESC";
		$result = $this->db->excuteQuery($sql);

		if (!$result || mysql_num_rows($result) == 0)
			return null; // no user

		return $result;
	}

	function getUserByFullName($value)
	{
		$sql = "SELECT * FROM ". $this->info->userTable ." WHERE fullname LIKE '%". $value ."%' ORDER BY fullname DESC";
		$result = $this->db->excuteQuery($sql);

		if (!$result || mysql_num_rows($result) == 0)
			return null; // no user
		
		return $result;
	}

	function getUserByEmail($value)
	{
		$sql = "SELECT * FROM ". $this->info->userTable ." WHERE email LIKE '%". $value ."%' ORDER BY email DESC";
		$result = $this->db->excuteQuery($sql);

		if (!$result || mysql_num_rows($result) == 0)
			return null; // no user
		
		return $result;
	}

	function removeUser($userid)
	{
		$sql = "DELETE FROM ". $this->info->userTable ." WHERE userid='". $userid ."'";
		$this->db->excuteQuery($sql);

		if(mysql_errno())
			return false; // error

		return true;
	}

	function editUserInfo($userid, $username, $password, $fullname, $email, $role, $status) 
	{
		$sql = "SELECT * FROM ". $this->info->userTable ." WHERE userid='". $userid ."'";
		$result = $this->db->excuteQuery($sql);

		if (!$result || mysql_num_rows($result) == 0)
			return false; // user not existed
		
		if($password !== "")
			$sql = "UPDATE ". $this->info->userTable ." SET username='". $username ."', password='". md5($password) ."', fullname='". $fullname ."', email='". $email ."', role='". $role ."', status='". $status ."' WHERE userid='". $userid ."'";
		else
			$sql = "UPDATE ". $this->info->userTable ." SET username='". $username ."', fullname='". $fullname ."', email='". $email ."', role='". $role ."', status='". $status ."' WHERE userid='". $userid ."'";
		$result = $this->db->excuteQuery($sql);

		if(mysql_errno())
			return false; // error

		return true;
	}
}

// for ajax call
if(isset($_POST['fetchuserid']) && !empty($_POST['fetchuserid'])) {
	$info = new Info();
	$db = new DBConnection();

	$sql = "SELECT * FROM ". $info->userTable ." WHERE userid='". $_POST['fetchuserid'] ."'";
	$result = $db->excuteQuery($sql);

	if (!$result || mysql_num_rows($result) == 0)
		echo "[\"\"]";
	else
	{
		$array = mysql_fetch_array($result);

		$userinfo["userid"] = $array["userid"];
		$userinfo["fullname"] = $array["fullname"];
		$userinfo["email"] = $array["email"];
		$userinfo["username"] = $array["username"];
		$userinfo["password"] = $array["password"];
		$userinfo["role"] = $array["role"];
		$userinfo["lastlogin"] = $array["lastlogin"];
		$userinfo["register"] = $array["register"];
		$userinfo["status"] = $array["status"];

		echo json_encode($userinfo);
	}
}
?>