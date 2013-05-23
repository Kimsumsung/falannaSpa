<?php
session_start();

include_once 'info.php';
include_once 'manage_db.php';

class YoutubeManagement
{	
	protected $info;
	protected $db;

	function __construct()
	{
		// init variable
		$this->info = new Info();
		$this->db = new DBConnection();
	}

	function addYoutube($code, $header, $description, $userid) 
	{
		$sql = "INSERT INTO ". $this->info->youtubeTable ."(code,header,description,userid) VALUES ('".$code."','".$header."','".$description."','".$userid."')";
		$result = $this->db->excuteQuery($sql);

		if(!$result)
			return false;

		return true;
	}

	function getYoutube()
	{
		$sql = "SELECT * FROM ". $this->info->youtubeTable ." ORDER BY youtubeid ASC";
		$result = $this->db->excuteQuery($sql);

		if (!$result || mysql_num_rows($result) == 0)
			return null;	// no news in database

		return $result;
	}

	function getYoutubeByHeader($value)
	{
		$sql = "SELECT * FROM ". $this->info->youtubeTable ." WHERE header LIKE '%". $value ."%' ORDER BY youtubeid ASC";
		$result = $this->db->excuteQuery($sql);

		if (!$result || mysql_num_rows($result) == 0)
			return null; // no user

		return $result;
	}
	function getYoutubeByDescription($value)
	{
		$sql = "SELECT * FROM ". $this->info->youtubeTable ." WHERE description LIKE '%". $value ."%' ORDER BY youtubeid ASC";
		$result = $this->db->excuteQuery($sql);

		if (!$result || mysql_num_rows($result) == 0)
			return null; // no user

		return $result;
	}

	function removeYoutube($youtubeid)
	{
		$sql = "DELETE FROM ". $this->info->youtubeTable ." WHERE youtubeid='". $youtubeid ."'";
		$this->db->excuteQuery($sql);

		if(mysql_errno())
			return false; // error

		return true;
	}

	function editYoutube($youtubeid, $code, $header, $description) 
	{
		$sql = "SELECT * FROM ". $this->info->youtubeTable ." WHERE youtubeid='". $youtubeid ."'";
		$result = $this->db->excuteQuery($sql);

		if (!$result || mysql_num_rows($result) == 0)
			return false; // news not existed
		
		$sql = "UPDATE ". $this->info->youtubeTable ." SET code='". $code ."', header='". $header ."', description='". $description ."' WHERE youtubeid='". $youtubeid ."'";
		$result = $this->db->excuteQuery($sql);

		if(mysql_errno())
			return false; // error

		return true;
	}
}

// for ajax call
if(isset($_POST['fetchyoutubeid']) && !empty($_POST['fetchyoutubeid'])) {
	$info = new Info();
	$db = new DBConnection();

	$sql = "SELECT * FROM ". $info->youtubeTable ." WHERE youtubeid='". $_POST['fetchyoutubeid'] ."'";
	$result = $db->excuteQuery($sql);

	if (!$result || mysql_num_rows($result) == 0)
		echo "[\"\"]";
	else
	{
		$array = mysql_fetch_array($result);

		$youtubeinfo["youtubeid"] = $array["youtubeid"];
		$youtubeinfo["code"] = $array["code"];
		$youtubeinfo["header"] = $array["header"];
		$youtubeinfo["description"] = $array["description"];
		$youtubeinfo["datetime"] = $array["datetime"];
		$youtubeinfo["userid"] = $array["userid"];

		echo json_encode($youtubeinfo);
	}
}
?>