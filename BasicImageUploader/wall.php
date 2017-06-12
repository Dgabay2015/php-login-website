

<?php
require_once "php/db_connect.php";
require_once "php/functions.php";



if(isset($_POST['name']) && isset($_POST['title']) && isset($_POST['text']))
{    
    $name = sanitizeString($db, $_POST['name']);
    $title = sanitizeString($db, $_POST['title']);
    $text = sanitizeString($db, $_POST['text']);
	$filter =sanitizeString($db, $_POST['filter']);

    
    $time = $_SERVER['REQUEST_TIME'];
	$file_name = $time . '.jpg';

    if ($_FILES)
    {
        $tmp_name = $_FILES['upload']['name'];
        $dstFolder = 'users';
        move_uploaded_file($_FILES['upload']['tmp_name'], $dstFolder . DIRECTORY_SEPARATOR . $file_name);
    }

    SavePostToDB($db, $name, $filter, $title, $text, $time, $file_name);
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<title>Image sharing wall</title>
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
    
    <link rel="stylesheet" href="css/styles.css">
	
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>


<div class="navbar navbar-inverse navbar-twitch" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">
				<span class="small-nav"> <span class="logo"> <B> </span> </span>
				<span class="full-nav"> < Uploader > </span>
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
					<a href="#about-us">
						<span class="small-nav" data-toggle="tooltip" data-placement="right" title="About Us"> 
							<span class="fa fa-users"></span> 
						</span>
						<span class="full-nav"> About Us </span>
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



    <div class="container">
        <?php 
			echo getPostcards($db);

		?>
    </div>
</body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


	<script src="functions.js"></script>
		<script src="js/bootstrap.min.js"></script>





<?php $db->close(); ?>