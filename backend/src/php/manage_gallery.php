<?php
session_start();

include_once 'info.php';
include_once 'manage_db.php';

class GalleryManagement
{	
	protected $info;
	protected $db;

	function __construct()
	{
		// init variable
		$this->info = new Info();
		$this->db = new DBConnection();
	}

	// category
	function addCategory($name, $userid) 
	{
		$sql = "INSERT INTO ". $this->info->galleryCategoryTable ."(name,userid) VALUES ('".$name."','".$userid."')";
		$result = $this->db->excuteQuery($sql);

		if(!$result)
			return false;

		return true;
	}	

	function getCategory()
	{
		$sql = "SELECT * FROM ". $this->info->galleryCategoryTable ." ORDER BY categoryid ASC";
		$result = $this->db->excuteQuery($sql);

		if (!$result || mysql_num_rows($result) == 0)
			return null;	// no user in database

		return $result;
	}

	function removeCategory($categoryid)
	{
		$sql = "DELETE FROM ". $this->info->galleryCategoryTable ." WHERE categoryid='". $categoryid ."'";
		$this->db->excuteQuery($sql);

		if(mysql_errno())
			return false; // error

		// remove associate image
		$sql = "SELECT * FROM ". $this->info->galleryTable ." WHERE categoryid='". $categoryid ."'";
		$result = $this->db->excuteQuery($sql);
		if($result!=null)
		{
			while($array = mysql_fetch_array($result))
				$this->removeImage($array['imageid']);
		}

		return true;
	}

	function editCategory($categoryid, $name) 
	{
		$sql = "SELECT * FROM ". $this->info->galleryCategoryTable ." WHERE categoryid='". $categoryid ."'";
		$result = $this->db->excuteQuery($sql);

		if (!$result || mysql_num_rows($result) == 0)
			return false; // user not existed
		
		$sql = "UPDATE ". $this->info->galleryCategoryTable ." SET name='". $name ."' WHERE categoryid='". $categoryid ."'";
		$result = $this->db->excuteQuery($sql);

		if(mysql_errno())
			return false; // error

		return true;
	}

	// image
	function addImage($file, $caption, $filetype, $categoryid, $userid) 
	{
		$sql = "INSERT INTO ". $this->info->galleryTable ."(caption,filetype,categoryid,userid,status) VALUES ('".$caption."','".$filetype."','".$categoryid."','".$userid."','Active')";
		$result = $this->db->excuteQuery($sql);

		if(!$result)
			return false;

		$extension = end(explode(".", $file["name"]));
		move_uploaded_file($file["tmp_name"], "src/img/gallery/". mysql_insert_id() .".". $extension);

		return true;
	}	

	function getImage()
	{
		$sql = "SELECT * FROM ". $this->info->galleryTable ." ORDER BY imageid ASC";
		$result = $this->db->excuteQuery($sql);

		if (!$result || mysql_num_rows($result) == 0)
			return null;	// no user in database

		return $result;
	}

	function getImageByCategory($categoryid)
	{
		$sql = "SELECT * FROM ". $this->info->galleryTable ." WHERE categoryid='". $categoryid ."' ORDER BY imageid ASC";
		$result = $this->db->excuteQuery($sql);

		if (!$result || mysql_num_rows($result) == 0)
			return null;	// no user in database

		return $result;
	}

	function removeImage($imageid)
	{
		$sql = "SELECT * FROM ". $this->info->galleryTable ." WHERE imageid='". $imageid ."'";
		$imageinfo =  $this->db->excuteQuery($sql);
		$array = mysql_fetch_array($imageinfo);

		unlink("src/img/gallery/".$array['imageid'].".".$array['filetype']);

		$sql = "DELETE FROM ". $this->info->galleryTable ." WHERE imageid='". $imageid ."'";
		$this->db->excuteQuery($sql);

		if(mysql_errno())
			return false; // error

		return true;
	}

	function editImage($imageid, $caption, $categoryid) 
	{
		$sql = "SELECT * FROM ". $this->info->galleryTable ." WHERE imageid='". $imageid ."'";
		$result = $this->db->excuteQuery($sql);

		if (!$result || mysql_num_rows($result) == 0)
			return false; // user not existed
		
		$sql = "UPDATE ". $this->info->galleryTable ." SET caption='". $caption ."', categoryid='". $categoryid ."' WHERE imageid='". $imageid ."'";
		$result = $this->db->excuteQuery($sql);

		if(mysql_errno())
			return false; // error

		return true;
	}
}

// for ajax call
if(isset($_POST['fetchcategoryid']) && !empty($_POST['fetchcategoryid'])) {
	$info = new Info();
	$db = new DBConnection();

	$sql = "SELECT * FROM ". $info->galleryCategoryTable ." WHERE categoryid='". $_POST['fetchcategoryid'] ."'";
	$result = $db->excuteQuery($sql);

	if (!$result || mysql_num_rows($result) == 0)
		echo "[\"\"]";
	else
	{
		$array = mysql_fetch_array($result);

		$categoryinfo["categoryid"] = $array["categoryid"];
		$categoryinfo["name"] = $array["name"];
		$categoryinfo["datetime"] = $array["datetime"];
		$categoryinfo["userid"] = $array["userid"];

		echo json_encode($categoryinfo);
	}
}

if(isset($_POST['fetchimageid']) && !empty($_POST['fetchimageid'])) {
	$info = new Info();
	$db = new DBConnection();

	$sql = "SELECT * FROM ". $info->galleryTable ." WHERE imageid='". $_POST['fetchimageid'] ."'";
	$result = $db->excuteQuery($sql);

	if (!$result || mysql_num_rows($result) == 0)
		echo "[\"\"]";
	else
	{
		$array = mysql_fetch_array($result);

		$imageinfo["imageid"] = $array["imageid"];
		$imageinfo["caption"] = $array["caption"];
		$imageinfo["filetype"] = $array["filetype"];
		$imageinfo["categoryid"] = $array["categoryid"];
		$imageinfo["datetime"] = $array["datetime"];
		$imageinfo["userid"] = $array["userid"];
		$imageinfo["status"] = $array["status"];

		echo json_encode($imageinfo);
	}
}
?>