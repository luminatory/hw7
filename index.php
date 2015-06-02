<?php
require_once 'menu.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title><?php echo $_SERVER['PHP_SELF'] ?></title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<style>
	html,body{height:100%;}
	#footer {
    background-color:black;
    color:white;
    clear:both;
    text-align:center;
   padding:5px;	 	 
}

</style>
	</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php" data-toggle="tooltip" title="Return Home" ><p class="text-danger">Home</p></a>
    </div>
<div class="container-fluid">
    <?php createMenu( getAllCategories() ); ?>
      </div>
		</div>
	</nav>
<div class="container" id="content">
		<h2>latest 5 posts</h2>
		<img src="http://img2.wikia.nocookie.net/__cb20120912061448/oldschool/ru/images/9/94/Yoba.png" alt="This is blog" width="250" height="280"/>
    <?php
				getLatest ( getLastPosts () );
				?>
    </div>
    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js">
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
    </script>
    <div id="footer">
 Copyright © Sergey Grigorov
</div>
</body>
</html>