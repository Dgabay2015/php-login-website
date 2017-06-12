<?php // Example 26-2: header.php
  session_start();

  echo "<!DOCTYPE html>\n<html><head>";

  require_once 'functions.php';

  $userstr = ' (Guest)';

  if (isset($_SESSION['user']))
  {
    $user     = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr  = " ($user)";
  }
  else $loggedin = FALSE;

  echo "<title>$appname$userstr</title><link rel='stylesheet' " .
       "href='../css/styles.css' type='text/css'>"                     .
	      "<link href='../css/bootstrap.min.css' rel='stylesheet'>"   .
		"<link href='../css/navbar.css' rel='stylesheet'>"					.
			"<link href='../css/nav_styles.css' rel='stylesheet'>"					.
				"<link href='http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css' rel='stylesheet'>".


       "</head><bodyonload='initialize();'><center><canvas id='logo' width='1000' "    .
       "height='200'>$appname</canvas></center>"             .
       "<div class='appname'>$appname$userstr</div>"            .
       "<script src='../js/javascript.js'></script>";
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   

  if ($loggedin)
  {
    // echo "<br ><ul class='menu'>" .
         // "<li><a href='wall.php?view=$user'>Home</a></li>" .
         // "<li><a href='members.php'>Members</a></li>"         .
         // "<li><a href='friends.php'>Friends</a></li>"         .
         // "<li><a href='../BasicImageUploader/form.php'>Upload an image</a></li>"       .
         // "<li><a href='profile.php'>Edit Profile</a></li>"    .
         // "<li><a href='logout.php'>Log out</a></li></ul><br>";
		 
	echo <<<_END
	
	
	<div class="navbar navbar-inverse navbar-twitch" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">
				<span class="small-nav"> <span class="logo"> <B> </span> </span>
				<span class="full-nav"> < $userstr > </span>
			</a>
		</div>
		<div class="">
			<ul class="nav navbar-nav">
				<li class="active">
					<a href="../php/index.php">
						<span class="small-nav" data-toggle="tooltip" data-placement="right" title="Home"> 
							<span class="glyphicon glyphicon-home"></span> 
						</span>
						<span class="full-nav"> Home </span>
					</a>
				</li>

				<li>
					<a href="#contact-us">
						<span class="small-nav" data-toggle="tooltip" data-placement="right" title="Contact Us"> 
							<span class="glyphicon glyphicon-comment"></span> 
						</span>
						<span class="full-nav"> Contact Us </span>
					</a>
				</li>
				<li>
					<a href="../BasicImageUploader/form.php">
						<span class="small-nav" data-toggle="tooltip" data-placement="right" title="Upload image"> 
							<span class="glyphicon glyphicon-plus"></span> 
						</span>
						<span class="full-nav"> Upload an Image </span>
					</a>
				</li>
				<li>
					<a href="logout.php">
						<span class="small-nav" data-toggle="tooltip" data-placement="right" title="Signout"> 
							<span class="glyphicon glyphicon-ban-circle"></span> 
						</span>
						<span class="full-nav"> Logout </span>
					</a>
				</li>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</div>
<button type="button" class="btn btn-default btn-xs navbar-twitch-toggle">
	<span class="glyphicon glyphicon-chevron-right nav-open"></span>		
	<span class="glyphicon glyphicon-chevron-left nav-close"></span>
</button>


	
	
	
	
_END;
		 
  }
  else
  {
  //  echo ("<br><ul class='menu'>" .
   //       "<li><a href='index.php'>Home</a></li>"                .
   //       "<li><a href='index.php'>Log in</a></li></ul><br>"     .
   //       "<span class='info'>&#8658; You must be logged in to " .
      //    "view this page.</span><br><br>");
	echo <<<_END
	
	
	<div class="navbar navbar-inverse navbar-twitch" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">
				<span class="small-nav"> <span class="logo"> <B> </span> </span>
				<span class="full-nav"> < $userstr > </span>
			</a>
		</div>
		<div class="">
			<ul class="nav navbar-nav">
				<li class="active">
					<a href="../php/index.php">
						<span class="small-nav" data-toggle="tooltip" data-placement="right" title="Home"> 
							<span class="glyphicon glyphicon-home"></span> 
						</span>
						<span class="full-nav"> Home </span>
					</a>
				</li>
				<li>
					<a href="signup.php">
						<span class="small-nav" data-toggle="tooltip" data-placement="right" title="Sign up"> 
							<span class="fa fa-users"></span> 
						</span>
						<span class="full-nav"> Sign up </span>
					</a>
				</li>
				<li>
					<a href="#contact-us">
						<span class="small-nav" data-toggle="tooltip" data-placement="right" title="Contact Us"> 
							<span class="glyphicon glyphicon-comment"></span> 
						</span>
						<span class="full-nav"> Contact Us </span>
					</a>
				</li>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</div>
<button type="button" class="btn btn-default btn-xs navbar-twitch-toggle">
	<span class="glyphicon glyphicon-chevron-right nav-open"></span>		
	<span class="glyphicon glyphicon-chevron-left nav-close"></span>
</button>


	
	
	
	
_END;
	
  }
  echo " <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
			<script src='../js/bootstrap.min.js'></script>	<script src='../js/nav.js'></script>";
?>









