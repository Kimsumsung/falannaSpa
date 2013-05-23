<?php
include_once 'info.php';

class DBConnection
{	
	protected $info;

	// attribute
	protected $con;

	function __construct()
	{
		// init variable
		$this->info = new Info();
	}

	function getDefaultConnection() 
	{
		$server = $this->info->dbserver;
		$username = $this->info->dbusername;
		$password = $this->info->dbpassword;
		$dbname = $this->info->dbname;	

		// Make connection
		$this->con = mysql_connect($server,$username,$password);
		if (!$this->con)
			$this->addSQLLog('getDefaultConnection() -> Could not connect : '. mysql_error());

		// encode
		mysql_query("SET NAMES UTF8");

		// choose DB
		mysql_select_db($dbname,$this->con);

		// return connection
		return $this->con;
	}

	function recheckSQLTable()
	{
		// check table action log
		$sql = "CREATE TABLE  `". $this->info->dbname ."`.`". $this->info->logActionTable ."` (
			`logid` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
			`description` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
			`datetime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
			) ENGINE = MYISAM ;";
mysql_query($sql);

		// check table sql log
$sql = "CREATE TABLE  `". $this->info->dbname ."`.`". $this->info->logSQLTable ."` (
	`logid` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	`description` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
	`datetime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
	) ENGINE = MYISAM ;";
mysql_query($sql);

		// check table sql log
$sql = "CREATE TABLE  `". $this->info->dbname ."`.`". $this->info->userTable ."` (
	`userid` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	`username` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
	`password` CHAR( 32 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
	`fullname` VARCHAR( 100 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
	`email` VARCHAR( 100 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
	`role` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
	`status` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
	`register` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
	`lastlogin` TIMESTAMP NOT NULL ,
	UNIQUE (
		`username`
		)
) ENGINE = MYISAM ;";
mysql_query($sql);

$sql = "CREATE TABLE  `". $this->info->dbname ."`.`". $this->info->newsTable ."` (
	`newsid` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	`topic` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
	`description` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
	`datetime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
	`userid` BIGINT NOT NULL ,
	`status` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
	) ENGINE = MYISAM ;";
mysql_query($sql);

$sql = "CREATE TABLE  `". $this->info->dbname ."`.`". $this->info->massageTable ."` (
	`newsid` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	`topic` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
	`description` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
	`datetime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
	`userid` BIGINT NOT NULL ,
	`status` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
	) ENGINE = MYISAM ;";
mysql_query($sql);

$sql = "CREATE TABLE  `". $this->info->dbname ."`.`". $this->info->spaTable ."` (
	`newsid` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	`topic` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
	`description` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
	`datetime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
	`userid` BIGINT NOT NULL ,
	`status` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
	) ENGINE = MYISAM ;";
mysql_query($sql);

$sql = "CREATE TABLE  `". $this->info->dbname ."`.`". $this->info->galleryTable ."` (
	`imageid` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	`caption` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL ,
	`filetype` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
	`categoryid` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
	`datetime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
	`userid` BIGINT NOT NULL ,
	`status` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
	) ENGINE = MYISAM ;";
mysql_query($sql);

$sql = "CREATE TABLE  `". $this->info->dbname ."`.`". $this->info->galleryCategoryTable ."` (
	`categoryid` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	`name` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
	`datetime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
	`userid` BIGINT NOT NULL
	) ENGINE = MYISAM ;";
mysql_query($sql);

$sql = "CREATE TABLE  `". $this->info->dbname ."`.`". $this->info->youtubeTable ."` (
	`youtubeid` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	`code` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
	`header` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL ,
	`description` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL ,
	`datetime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
	`userid` BIGINT NOT NULL
	) ENGINE = MYISAM ;";
mysql_query($sql);
}

function excuteQuery($sql)
{
	$this->con = $this->getDefaultConnection();
	$result = mysql_query($sql);

	if(!$result)
		$this->addSQLLog($sql." [error] ".mysql_error());

	return $result;
}

function addActionLog($log)
{
	$this->con = $this->getDefaultConnection();

	$sql = "INSERT INTO ". $this->info->logActionTable ."(description) VALUES ('".mysql_real_escape_string($log)."')";
	$result = mysql_query($sql);

	if(!$result)
		echo "unable to add log". mysql_error() . mysql_errno();
}

function addSQLLog($log)
{
	$this->con = $this->getDefaultConnection();

	$sql = "INSERT INTO ". $this->info->logSQLTable ."(description) VALUES ('".mysql_real_escape_string($log)."')";
	$result = mysql_query($sql);

	if(!$result)
		echo "unable to add log". mysql_error() . mysql_errno();
}
}
?>