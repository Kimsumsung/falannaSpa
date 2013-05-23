<?php
include_once 'info.php';
include_once 'manage_db.php';

class NewsManagement
{	
	protected $info;
	protected $db;

	function __construct()
	{
		// init variable
		$this->info = new Info();
		$this->db = new DBConnection();
	}

	function addNews($topic, $description, $userid) 
	{
		$sql = "INSERT INTO ". $this->info->newsTable ."(topic,description,userid,status) VALUES ('".$topic."','".$description."','".$userid."','Active')";
		$result = $this->db->excuteQuery($sql);

		if(!$result)
			return false;

		return true;
	}

	function getNews()
	{
		$sql = "SELECT * FROM ". $this->info->newsTable ." ORDER BY newsid ASC";
		$result = $this->db->excuteQuery($sql);

		if (!$result || mysql_num_rows($result) == 0)
			return null;	// no news in database

		return $result;
	}

	function getLastestNews()
	{
		$sql = "SELECT * FROM ". $this->info->newsTable ." ORDER BY newsid DESC";
		$result = $this->db->excuteQuery($sql);

		if (!$result || mysql_num_rows($result) == 0)
			return null;	// no news in database

		return $result;
	}

	function removeNews($newsid)
	{
		$sql = "DELETE FROM ". $this->info->newsTable ." WHERE newsid='". $newsid ."'";
		$this->db->excuteQuery($sql);

		if(mysql_errno())
			return false; // error

		return true;
	}

	function editNews($newsid, $topic, $description, $status) 
	{
		$sql = "SELECT * FROM ". $this->info->newsTable ." WHERE newsid='". $newsid ."'";
		$result = $this->db->excuteQuery($sql);

		if (!$result || mysql_num_rows($result) == 0)
			return false; // news not existed
		
		$sql = "UPDATE ". $this->info->newsTable ." SET topic='". $topic ."', description='". $description ."', status='". $status ."' WHERE newsid='". $newsid ."'";
		$result = $this->db->excuteQuery($sql);

		if(mysql_errno())
			return false; // error

		return true;
	}
}

// for ajax call
if(isset($_POST['fetchnewsid']) && !empty($_POST['fetchnewsid'])) {
	$info = new Info();
	$db = new DBConnection();

	$sql = "SELECT * FROM ". $info->newsTable ." WHERE newsid='". $_POST['fetchnewsid'] ."'";
	$result = $db->excuteQuery($sql);

	if (!$result || mysql_num_rows($result) == 0)
		echo "[\"\"]";
	else
	{
		$array = mysql_fetch_array($result);

		$newsinfo["newsid"] = $array["newsid"];
		$newsinfo["topic"] = $array["topic"];
		$newsinfo["description"] = $array["description"];
		$newsinfo["datetime"] = $array["datetime"];
		$newsinfo["userid"] = $array["userid"];
		$newsinfo["status"] = $array["status"];

		echo json_encode($newsinfo);
	}
}
?>