<?php
include_once 'src/php/manage_db.php';
include_once 'src/php/manage_user.php';

$db = new DBConnection();
$user = new UserManagement();

$db->getDefaultConnection();
$db->recheckSQLTable();

// initial
$invalidLogin = false;

// form action
if(isset($_POST['login']))
{
  if($user->login($_POST['username'],$_POST['password']))
    header('Location: user.php');
  else
    $invalidLogin = true;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>KT9's Backend</title>
  
  <?php include_once 'default/defHeader.php'; ?>
  <style type="text/css">
  body {
    background-color	: #f5f5f5;
  }

  #centerbox {
    max-width         : 300px;
    margin            : 30px auto;

    background-color	: white;
    border 				    : 1px solid #e5e5e5;
    border-radius 		: 5px;
    box-shadow 			  : 0 1px 2px rgba(0,0,0,.05);
  }
  #login-header {
    margin-bottom     : 10px;
  }
  #login-header-logo {
    max-width         : 150px;
    margin            : 0px auto;
  }
  #login-form {
    text-align        : center;
  }
  #login-input {
    margin            : 10px auto;
    height            : 25px;
    max-width         : 300px;

    font-size         : 16px;
  }
  </style>
</head>
<body>

  <div class="container">
    <div id="centerbox">
      <form id="login-form" method="POST" action="">
        <legend id="login-header"> 
          <img id="login-header-logo" src="src/configimg/logo.png" />
        </legend>
        <?php if($invalidLogin) { ?>
        <div class="control-group error">
          <?php if(!empty($_POST['username'])) { ?>
          <input id="login-input" name="username" type="text" value=<?php echo "\"". $_POST['username'] ."\"" ?> >
          <?php } else { ?>
          <input id="login-input" name="username" type="text" placeholder="username" >
          <?php } ?>
          <input id="login-input" name="password" type="password" placeholder="password">
          <span class="help-inline">Invalid username or password</span>
        </div>
        <?php } else { ?>
        <input id="login-input" name="username" type="text" placeholder="username">
        <input id="login-input" name="password" type="password" placeholder="password">
        <?php } ?>
        <br />
        <a href="../index.php" class="btn" name="back" type="button">Back</a>
        &nbsp;&nbsp;&nbsp;
        <button class="btn btn-large btn-success" name="login" type="submit">Sign in</button>
      </form>
    </div>
  </div>

</body>
</html>