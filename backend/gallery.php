<?php
include_once 'src/php/manage_gallery.php';
include_once 'src/php/manage_user.php';

// initial
$gallery = new GalleryManagement();
$user = new UserManagement();

// form action
// category
if(isset($_POST['addCategory']))
{
	$result = $gallery->addCategory($_POST['categoryname'],$user->getCurrentUserid());
	$text = "add category successful";
	$needalert = yes;
}

if(isset($_POST['editCategory']))
{
	$result = $gallery->editCategory($_POST['editedcategoryid'],$_POST['editedcategoryname']);
	$text = "edit category successful";
	$needalert = yes;
}

if(isset($_POST['removeCategory']))
{
	$result = $gallery->removeCategory($_POST['editedcategoryid']);
	$text = "remove category successful";
	$needalert = yes;
}

// image
if(isset($_POST['addImage']))
{
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$extension = end(explode(".", $_FILES["imagefile"]["name"]));
	if ((($_FILES["imagefile"]["type"] == "image/gif")
		|| ($_FILES["imagefile"]["type"] == "image/jpeg")
		|| ($_FILES["imagefile"]["type"] == "image/png")
		|| ($_FILES["imagefile"]["type"] == "image/pjpeg"))
		&& in_array($extension, $allowedExts))
	{
		if ($_FILES["imagefile"]["error"] > 0)
		{
			$result = false;
			$text = "Error : ". $_FILES["imagefile"]["error"];
			$needalert = yes;
			$needCustomAlert = yes;
		}
		else
		{
			$result = $gallery->addImage($_FILES["imagefile"],$_POST['imagecaption'],$extension,$_POST['imagecategory'],$user->getCurrentUserid());;
			$text = "add image successful";
			$needalert = yes;
		}
	}
	else
	{
		$result = false;
		$text = "Error : .jpg .jpeg .gif .png ONLY";
		$needalert = yes;
		$needCustomAlert = yes;
	}
}
else if(isset($_POST['editImage']))
{
	$result = $gallery->editImage($_POST['editedimageid'],$_POST['editedimagecaption'],$_POST['editedimagecategory']);
	$text = "edit image successful";
	$needalert = yes;
}
else if(isset($_POST['removeImage']))
{
	$result = $gallery->removeImage($_POST['editedimageid']);
	$text = "remove image successful";
	$needalert = yes;
}

if(isset($_POST['searchImage']))
{
	if($_POST['imagecategory'] == 0)
		$imglist = $gallery->getImage();
	else
		$imglist = $gallery->getImageByCategory($_POST['imagecategory']);
}
else
	$imglist = $gallery->getImage();

$categorylist = $gallery->getCategory();

if(!$result && !$needCustomAlert)
	$text = "please contact administrator to check this error";

?>

<!DOCTYPE html>
<html>
<head>
	<title>KT9's Backend</title>

	<?php include_once 'default/defHeader.php'; ?>
</head>
<body>
	<?php include_once 'default/defMainMenu.php'; showMenuBar("gallery"); setAlert($result ,$needalert, $text); ?>

	<div class="container content">

		<div class="row">
			<legend>Gallery's category</legend>
			<div class="span3 hidden-phone">
				<div class="row">
					<div class="span3 well well-small">
						<form method="POST" action="">
							<legend>add category</legend>
							<input class="span3" name="categoryname" type="text" placeholder="name" required>
							<button class="btn btn-block btn-success" name="addCategory" type="submit">Add</button>
						</form>
					</div>
				</div>
			</div>

			<div class="span9">
				<table class="table table-striped table-hover table-condensed table-bordered">
					<tr>
						<th>#</th>
						<th>name</th>
						<th>Add Date</th>
						<th>Add By</th>
						<th class="hidden-phone hidden-tablet">&nbsp;</th>
					</tr>

					<!-- show category list -->
					<?php
					if($categorylist!=null)
					{
						while($array = mysql_fetch_array($categorylist))
						{
							echo "<tr>";

							echo "<td>". $array['categoryid'] ."</td>";
							echo "<td>". $array['name'] ."</td>";
							echo "<td>". $array['datetime'] ."</td>";
							echo "<td>". $array['userid'] ."</td>";
							echo "<td class=\"hidden-phone hidden-tablet ". $class ."\"><a name=\"categoryModal\" id=\"". $array['categoryid'] ."\" role=\"button\" class=\"btn btn-mini btn-inverse\" data-toggle=\"modal\">Edit</a></td>";

							echo "</tr>";
						}
					}
					?>
				</table>
			</div>
		</div>

		<?php if($categorylist!=null) { // if no category existed don't show anything ?> 
		<div class="row">
			<legend>Gallery's image</legend>
			<div class="span3 hidden-phone">
				<div class="row">
					<div class="span3 well well-small">
						<form method="POST" action="">
							<legend>search image</legend>
							<select class="span3" name="imagecategory">
								<option value="0">All category</option>
								<?php
								mysql_data_seek($categorylist,0);

								if($categorylist!=null)
								{
									while($array = mysql_fetch_array($categorylist))
									{
										echo "<option value=\"". $array['categoryid'] ."\">".$array['name']."</option>";
									}
								}
								?>
							</select>
							<button class="btn btn-block" name="searchImage" type="submit">Search</button>
						</form>
					</div>
				</div>

				<div class="row">
					<div class="span3 well well-small">
						<form method="POST" action="" enctype="multipart/form-data">
							<legend>add image</legend>
							<input class="span3" name="imagefile" type="file" required>
							<input class="span3" name="imagecaption" type="text" placeholder="caption">
							<select class="span3" name="imagecategory">
								<?php
								mysql_data_seek($categorylist,0);

								if($categorylist!=null)
								{
									while($array = mysql_fetch_array($categorylist))
									{
										echo "<option value=\"". $array['categoryid'] ."\">".$array['name']."</option>";
									}
								}
								else
									"<option value=\"\">Please created category first</option>";
								?>
							</select>
							<button class="btn btn-block btn-success" name="addImage" type="submit">Add</button>
						</form>
					</div>
				</div>
			</div>

			<div class="span9">
				<ul class="thumbnails">
					<?php
					if($imglist!=null)
					{
						$row = 1;
						while($array = mysql_fetch_array($imglist))
						{
							if((($row-1)%3)==0)
							{
								echo "<div class=\"span9\">";
								echo "<ul class=\"thumbnails\">";
							}
							echo "<li class=\"span3\">";
							echo "<div class=\"thumbnail\">";

							echo "<img src=\"src/img/gallery/". $array['imageid'] .".". $array['filetype'] ."\">";
							echo "<p>";
							echo "<strong>Caption | </strong><small>". $array['caption'] ."</small> <br />";
							mysql_data_seek($categorylist,0);
							while($array2 = mysql_fetch_array($categorylist))
							{
								if($array2['categoryid'] == $array['categoryid'])
								{
									echo "<strong>Category | </strong><small>". $array2['name'] ."</small> <br />";
								}
							}
							echo "<div class=\"hidden-phone hidden-tablet\"><a name=\"imageModal\" id=\"". $array['imageid'] ."\" role=\"button\" class=\"btn btn-block btn-inverse\" data-toggle=\"modal\">Edit</a></div>";

							echo "</p>";
							echo "</div>";
							echo "</li>";
							if(($row%3)==0)
							{
								echo "</ul>";
								echo "</div>";
							}
							$row++;
						}
					}
					?>
				</ul>
			</div>
		</div>
		<?php } ?>

	</div>

	<!-- Modal zone -->
	<form class="form-horizontal" method="POST" action="">
		<div id="editCategory" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">Category Information</h3>
			</div>
			<div class="modal-body">
				<input type="hidden" name="editedcategoryid" />
				<div class="control-group">
					<label class="control-label">Topic</label>
					<div class="controls">
						<input type="text" name="editedcategoryname" placeholder="Name" required>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" name="editCategory" value="1">Save changes</button>
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
				<div class="pull-left">
					<button class="btn btn-danger" name="removeCategory" value="1">DELETE</button>
				</div>
			</div>
		</div>
	</form>

	<form class="form-horizontal" method="POST" action="">
		<div id="editImage" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">Image Information</h3>
			</div>
			<div class="modal-body">
				<input type="hidden" name="editedimageid" />
				<div class="control-group">
					<label class="control-label">Caption</label>
					<div class="controls">
						<input type="text" name="editedimagecaption" placeholder="Caption">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Category</label>
					<div class="controls">
						<select name="editedimagecategory">
							<?php
							mysql_data_seek($categorylist,0);

							if($categorylist!=null)
							{
								while($array = mysql_fetch_array($categorylist))
								{
									echo "<option value=\"". $array['categoryid'] ."\">".$array['name']."</option>";
								}
							}
							?>
						</select>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" name="editImage" value="1">Save changes</button>
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
				<div class="pull-left">
					<button class="btn btn-danger" name="removeImage" value="1">DELETE</button>
				</div>
			</div>
		</div>
	</form>

	<script type="text/javascript">
	$(document).ready(function(){
		$("a[name=categoryModal]").click(function() 
		{   
			var categoryid = $(this).attr('id');

			$.ajax({ url: 'src/php/manage_gallery.php',
				data: {fetchcategoryid: categoryid},
				type: 'post',
				success: function(result) {
					var obj = jQuery.parseJSON(result);
					$('[name=editedcategoryid]').val(obj.categoryid);
					$('[name=editedcategoryname]').val(obj.name);

						//obj.password;
						$('#editCategory').modal('show')
					}
				});
		});

		$("a[name=imageModal]").click(function() 
		{   
			var imageid = $(this).attr('id');

			$.ajax({ url: 'src/php/manage_gallery.php',
				data: {fetchimageid: imageid},
				type: 'post',
				success: function(result) {
					var obj = jQuery.parseJSON(result);
					$('[name=editedimageid]').val(obj.imageid);
					$('[name=editedimagecaption]').val(obj.caption);
					$('[name=editedimagecategory]').val(obj.categoryid);

						//obj.password;
						$('#editImage').modal('show')
					}
				});
		});

		$(".alert").delay(2000).fadeOut("slow", function () { $(this).remove(); });
	});

</script>

<?php include_once 'default/defFooter.php'; ?>
</body>
</html>