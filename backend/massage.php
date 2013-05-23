<?php
include_once 'src/php/manage_massage.php';
include_once 'src/php/manage_user.php';

// initial
$news = new MassageManagement();
$user = new UserManagement();

// form action
if(isset($_POST['add']))
{
	$result = $news->addNews($_POST['topic'],$_POST['description'],$user->getCurrentUserid());
	$text = "add news successful";
	$needalert = yes;
}
else if(isset($_POST['edit']))
{
	$result = $news->editNews($_POST['editednewsid'],$_POST['editedtopic'],$_POST['editeddescription'],$_POST['editedstatus']);
	$text = "edit news successful";
	$needalert = yes;
}
else if(isset($_POST['remove']))
{
	$result = $news->removeNews($_POST['editednewsid']);
	$text = "remove news successful";
	$needalert = yes;
}

$newslist = $news->getNews();

if(!$result)
	$text = "please contact administrator to check this error";

?>

<!DOCTYPE html>
<html>
<head>
	<title>KT9's Backend</title>

	<?php include_once 'default/defHeader.php'; ?>
</head>
<body>
	<?php include_once 'default/defMainMenu.php'; showMenuBar("massage"); setAlert($result ,$needalert, $text); ?>

	<div class="container content">

		<div class="row hidden-phone">
			<!-- Action form -->
			<form method="POST" action="">
				<div class="span12 well well-small">
					<legend>add massage</legend>
					<input class="span12" name="topic" type="text" placeholder="Topic" required>
					<textarea class="span12" name="description" rows="4" placeholder="Description" required></textarea>
					<button class="btn btn-block btn-success" name="add" type="submit">Add</button>
				</div>
			</form>
		</div>

		<div class="row">
			<div class="span12">
				<table class="table table-striped table-hover table-condensed table-bordered">
					<tr>
						<th>#</th>
						<th>Topic</th>
						<th class="hidden-phone hidden-tablet">Description</th>
						<th class="hidden-phone hidden-tablet">Add Date</th>
						<th>Add By</th>
						<th>Status</th>
						<th class="hidden-phone hidden-tablet">&nbsp;</th>
					</tr>

					<?php
					if($newslist!=null)
						while($array = mysql_fetch_array($newslist))
						{
							echo "<tr>";

							if($array['status'] == "disable")
								$class="muted";

							echo "<td class=\"". $class ."\">". $array['newsid'] ."</td>";
							echo "<td class=\"". $class ."\">". $array['topic'] ."</td>";
							echo "<td class=\"hidden-phone hidden-tablet ". $class ."\">". $array['description'] ."</td>";
							echo "<td class=\"hidden-phone hidden-tablet ". $class ."\">". $array['datetime'] ."</td>";
							echo "<td class=\"". $class ."\">". $array['userid'] ."</td>";
							echo "<td class=\"". $class ."\">". $array['status'] ."</td>";
							echo "<td class=\"hidden-phone hidden-tablet ". $class ."\"><a id=\"". $array['newsid'] ."\" role=\"button\" class=\"btn btn-mini btn-inverse\" data-toggle=\"modal\">Edit</a></td>";

							echo "</tr>";
						}
						?>
					</table>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal zone -->
	<form class="form-horizontal" method="POST" action="">
		<div id="editNews" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">News Information</h3>
			</div>
			<div class="modal-body">
				<input type="hidden" name="editednewsid" />
				<div class="control-group">
					<label class="control-label">Topic</label>
					<div class="controls">
						<input type="text" name="editedtopic" placeholder="Topic" required>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Description</label>
					<div class="controls">
						<textarea name="editeddescription" rows="4" placeholder="Description" required></textarea>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Status</label>
					<div class="controls">
						<select name="editedstatus">
							<option>Active</option>
							<option>Banned</option>
						</select>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" name="edit" value="1">Save changes</button>
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
				<div class="pull-left">
					<button class="btn btn-danger" name="remove" value="1">DELETE</button>
				</div>
			</div>
		</div>
	</form>

	<script type="text/javascript">
	$(document).ready(function(){
		$("a[data-toggle=modal]").click(function() 
		{   
			var newsid = $(this).attr('id');

			$.ajax({ url: 'src/php/manage_news.php',
				data: {fetchnewsid: newsid},
				type: 'post',
				success: function(result) {
					var obj = jQuery.parseJSON(result);
					$('[name=editednewsid]').val(obj.newsid);
					$('[name=editedtopic]').val(obj.topic);
					$('[name=editeddescription]').val(obj.description);
					$('[name=editedstatus]').val(obj.status);

						//obj.password;
						$('#editNews').modal('show')
					}
				});
		});

		$(".alert").delay(2000).fadeOut("slow", function () { $(this).remove(); });
	});

	</script>

	<?php include_once 'default/defFooter.php'; ?>
</body>
</html>