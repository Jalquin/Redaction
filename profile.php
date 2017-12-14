<?php

	require_once("session.php");
	
	require_once("class.user.php");
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
	
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/> 
    <link rel="stylesheet" href="css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
    <title>welcome - <?php print($userRow['user_name']); ?></title>
  </head>

  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Project</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="articles.php">Articles</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['user_email']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span>&nbsp;View Profile</a></li>
                <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

	  <div class="clearfix"></div>
	
    <div class="container-fluid" style="margin-top:80px;">
      <div class="container">
      	<label class="h5">welcome : <?php print($userRow['user_name']); ?></label>
          <hr />
          <h1>
          <a href="home.php"><span class="glyphicon glyphicon-home"></span> home</a> &nbsp; 
          <a href="profile.php"><span class="glyphicon glyphicon-user"></span> profile</a></h1>
          <hr />
          <p class="h4">Another Secure Profile Page</p> 
      </div>
    </div>
    
    <footer class="container">    
      <div class="row">      
        <p class="col-sm-4">&copy; 2017 Jakub Červený
        </p>      
        <ul class="col-sm-8">        
          <li class="col-sm-1">                    
            <a href="https://twitter.com/Jalqu1n">          
              <img src="https://s3.amazonaws.com/codecademy-content/projects/make-a-website/lesson-4/twitter.svg">
            </a>      
          </li>        
          <li class="col-sm-1">
            <a href="https://www.facebook.com/cerveny.jakub98">          
              <img src="https://s3.amazonaws.com/codecademy-content/projects/make-a-website/lesson-4/facebook.svg">
            </a>        
          </li>        
          <li class="col-sm-1">          
            <a href="https://www.facebook.com/cerveny.jakub98">          
              <img src="https://s3.amazonaws.com/codecademy-content/projects/make-a-website/lesson-4/instagram.svg">
            </a>         
          </li>          
        </ul>    
      </div>  
    </footer>
    
  </body>
</html>