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
<div class= "full-width-div">
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"><p class="text-danger">Home</p></a>
    </div>
<div>
    <?php createMenu( getAllCategories() ); ?>
      </div>
		</div>
	</nav>
<div class="container alert alert-success" id="content">
 <div class="span5 fill">
	<?php

$connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME);
	if ($connection->connect_error) die($connection->connect_error);
	$query = "SELECT id, title, description FROM post WHERE category_id=$_GET[id]";
	$result = $connection->query($query);
	if (!$result) die($connection->error);
	$rows = $result->num_rows;
		for ($j = 0 ; $j < $rows ; ++$j)
			{
				$result->data_seek($j);
				$row = $result->fetch_array(MYSQLI_ASSOC);
				$post_id = $row['id'];
				$post_title = $row['title'];
				//$post_text = $row['text'];
				$post_create = $row['create_at'];
				$post_description = $row['description'];
				//$post_author = $row['name'];
				echo "<div>";
				echo "<br />";
				echo " <h2> <a href='post.php?id=$post_id'>$post_title</a> </h2>" ;  
				//echo " <h2> $post_title </h2>" ;
				echo "<p>$post_description</p>";
				echo "</div>";
				echo "<br />";
			}
	?>
	</div>
	
	</div>
	</div>
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js">
	</script>
<div id="footer">
 Copyright © Sergey Grigorov
</div>
	</body>
</html>
