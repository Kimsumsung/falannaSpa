<?php
function showMenuBar($selected) { ?>
<div class="navbar navbar-static-top">
	<div class="navbar-inner">
		<a class="brand">CM Weddesign Management System</a>
		<ul class="nav pull-left">
			<?php if(file_exists("main.php")) { ?><li<?php if($selected==="main") echo " class=\"active\""; ?>><a href="main.php">Main</a></li><?php } ?>
			<?php if(file_exists("user.php")) { ?><li<?php if($selected==="user") echo " class=\"active\""; ?>><a href="user.php">User</a></li><?php } ?>
			<?php if(file_exists("news.php")) { ?><li<?php if($selected==="news") echo " class=\"active\""; ?>><a href="news.php">News</a></li><?php } ?>
			<?php if(file_exists("massage.php")) { ?><li<?php if($selected==="massage") echo " class=\"active\""; ?>><a href="massage.php">Massage</a></li><?php } ?>
			<?php if(file_exists("spa.php")) { ?><li<?php if($selected==="spa") echo " class=\"active\""; ?>><a href="spa.php">Spa</a></li><?php } ?>
			<?php if(file_exists("gallery.php")) { ?><li<?php if($selected==="gallery") echo " class=\"active\""; ?>><a href="gallery.php">Gallery</a></li><?php } ?>
			<?php if(file_exists("youtube.php")) { ?><li<?php if($selected==="youtube") echo " class=\"active\""; ?>><a href="youtube.php">Youtube</a></li><?php } ?>
		</ul>

		<ul class="nav pull-right">
			<li><a href="index.php">Logout</a></li>		
		</ul>
	</div>
</div>
<?php } 

function setAlert($result ,$needalert, $text) { ?>
<?php if($result && $needalert) { ?>
<div id="alert-area" class="alert alert-success hidden-phone">
	<strong>Operation Successful</strong> <?php echo "- ".$text ?>
</div>
<?php } else if((!$result) && $needalert) { ?>
<div id="alert-area" class="alert alert-error hidden-phone">
	<strong>Operation Successful</strong> <?php echo "- ".$text ?>
</div>
<?php } ?>
<?php } ?>