<?php
session_start();
require_once("class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
	$login->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
	$uname = strip_tags($_POST['txt_uname_email']);
	$umail = strip_tags($_POST['txt_uname_email']);
	$upass = strip_tags($_POST['txt_password']);
		
	if($login->doLogin($uname,$umail,$upass))
	{
		$login->redirect('home.php');
	}
	else
	{
		$error = "Wrong Details !";
	}	
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login</title>
  	<meta http-equiv="content-language" content="eng" />
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  </head>
  <body>  
    <div class="container">                  
          <form class="form-signin" method="post" id="login-form">         
           <h2 class="form-signin-heading">Log In to WebApp.</h2><hr />
            <div id="error">
            <?php
      			if(isset($error))
      			{
    				?>
                    <div class="alert alert-danger">
                       <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                    </div>
            <?php
    			  }
    		    ?>
            </div>          
            <div class="form-group">
            <input type="text" class="form-control" name="txt_uname_email" placeholder="Username or E mail ID" required />
            <span id="check-e"></span>
            </div>
            
            <div class="form-group">
            <input type="password" class="form-control" name="txt_password" placeholder="Your Password" />
            </div>        
         	<hr />     
            <div class="form-group">
                <button type="submit" name="btn-login" class="btn btn-default">
                    	<i class="glyphicon glyphicon-log-in"></i> &nbsp; SIGN IN
                </button>
            </div>  
          <br />
                <label>Don't have account yet ? <a href="sign-up.php">Sign Up</a></label>
          </form>
        </div>
</body>
</html>