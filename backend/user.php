<?php
include_once 'src/php/manage_user.php';

// initial
$user = new UserManagement();

// form action
if(isset($_POST['add']))
{
	$result = $user->register($_POST['username'],$_POST['password'],$_POST['fullname'],$_POST['email'],$_POST['role']);
	$text = "add user successful";
	$needalert = yes;
}
else if(isset($_POST['edit']))
{
	$result = $user->editUserInfo($_POST['editeduserid'],$_POST['editedusername'],$_POST['editedpassword'],$_POST['editedfullname'],$_POST['editedemail'],$_POST['editedrole'],$_POST['editedstatus']);
	$text = "edit user successful";
	$needalert = yes;
}
else if(isset($_POST['remove']))
{
	$result = $user->removeUser($_POST['editeduserid']);
	$text = "remove user successful";
	$needalert = yes;
}

if(isset($_POST['search']))
{
	if($_POST['type'] == "Full name")
		$userlist = $user->getUserByUsername($_POST['keyword']);
	else if($_POST['type'] == "Email")
		$userlist = $user->getUserByEmail($_POST['keyword']);
	else if($_POST['type'] == "Username")
		$userlist = $user->getUserByUsername($_POST['keyword']);
	else
		$userlist = $user->getUser();
}
else
	$userlist = $user->getUser();

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
	<?php include_once 'default/defMainMenu.php'; showMenuBar("user"); setAlert($result ,$needalert, $text); ?>

	<div class="container content">

		<div class="row">
			<!-- Action form -->
			<div class="span3 hidden-phone">

				<!-- search -->
				<div class="row">
					<form method="POST" action="">
						<div class="span3 well well-small">
							<legend>search user</legend>
							<input class="span3" name="keyword" type="text" placeholder="Keyword">
							<select class="span3" name="type">
								<option>Full name</option>
								<option>Email</option>
								<option>Username</option>
							</select>
							<button class="btn btn-block" name="search" type="submit">Search</button>
						</div>
					</form>
				</div>

				<!-- insert -->
				<div class="row">
					<form method="POST" action="">
						<div class="span3 well well-small">
							<legend>add new user</legend>
							<input class="span3" name="fullname" type="text" placeholder="Full name" required>
							<input class="span3" name="email" type="email" placeholder="Email" required>
							<input class="span3" name="username" type="text" placeholder="Username" required>
							<input class="span3" name="password" type="password" placeholder="Password" required>
							<select class="span3" name="role">
								<option>User</option>
								<option>Mod</option>
								<option>Admin</option>
							</select>
							<button class="btn btn-block btn-success" name="add" type="submit">Add</button>
						</div>
					</form>
				</div>
			</div>

			<!-- Table data -->
			<div class="span9">
				<table class="table table-striped table-hover table-condensed table-bordered">
					<tr>
						<th class="muted">#</th>
						<th>Fullname</th>
						<th>Email</th>
						<th class="hidden-phone hidden-tablet">Username</th>
						<th>Role</th>
						<th class="hidden-phone hidden-tablet">Login</th>
						<th class="hidden-phone hidden-tablet">Register</th>
						<th>Status</th>
						<th class="hidden-phone hidden-tablet">&nbsp;</th>
					</tr>
					<!-- show user list -->
					<?php
					if($userlist!=null)
						while($array = mysql_fetch_array($userlist))
						{
							echo "<tr>";
							echo "<td class=\"muted\">". $array['userid'] ."</td>";
							echo "<td>". $array['fullname'] ."</td>";
							echo "<td>". $array['email'] ."</td>";
							echo "<td class=\"hidden-phone hidden-tablet\">". $array['username'] ."</td>";
							if($array['role'] == "Admin")
								echo "<td class=\"text-error\">". $array['role'] ."</td>";
							else if($array['role'] == "Mod")
								echo "<td class=\"text-info\">". $array['role'] ."</td>";
							else
								echo "<td class=\"muted\">". $array['role'] ."</td>";

							if($array['lastlogin'] == "0000-00-00 00:00:00")
								echo "<td class=\"hidden-phone hidden-tablet muted\">Never</td>";
							else
								echo "<td class=\"hidden-phone hidden-tablet\">". $array['lastlogin'] ."</td>";
							echo "<td class=\"hidden-phone hidden-tablet\">". $array['register'] ."</td>";

							if($array['status'] == "Active")
								echo "<td class=\"text-success\">". $array['status'] ."</td>";
							else if($array['status'] == "Banned")
								echo "<td class=\"text-error\">". $array['status'] ."</td>";
							else
								echo "<td>". $array['status'] ."</td>";

							echo "<td class=\"hidden-phone hidden-tablet\"><a id=\"". $array['userid'] ."\" role=\"button\" class=\"btn btn-mini btn-inverse\" data-toggle=\"modal\">Edit</a></td>";

							echo "</td>";
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
		<div id="editUser" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">User Information</h3>
			</div>
			<div class="modal-body">
				<input type="hidden" name="editeduserid" />
				<div class="control-group">
					<label class="control-label">Username</label>
					<div class="controls">
						<input type="text" name="editedusername" placeholder="Username" required>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Password</label>
					<div class="controls">
						<input type="password" name="editedpassword" placeholder="**********" >
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Full name</label>
					<div class="controls">
						<input type="text" name="editedfullname" placeholder="Full name" required>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Email</label>
					<div class="controls">
						<input type="email" name="editedemail" placeholder="Email" required>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Role</label>
					<div class="controls">
						<select name="editedrole">
							<option>User</option>
							<option>Mod</option>
							<option>Admin</option>selected
						</select>
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
			var userid = $(this).attr('id');

			$.ajax({ url: 'src/php/manage_user.php',
				data: {fetchuserid: userid},
				type: 'post',
				success: function(result) {
					var obj = jQuery.parseJSON(result);
					$('[name=editeduserid]').val(obj.userid);
					$('[name=editedfullname]').val(obj.fullname);
					$('[name=editedemail]').val(obj.email);
					$('[name=editedusername]').val(obj.username);
					$('[name=editedrole]').val(obj.role);
					$('[name=editedstatus]').val(obj.status);

						//obj.password;
						$('#editUser').modal('show')
					}
				});
		});

		$(".alert").delay(2000).fadeOut("slow", function () { $(this).remove(); });
	});

	</script>

	<?php include_once 'default/defFooter.php'; ?>
</body>
</html>