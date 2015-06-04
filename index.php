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
     <a data-toggle="modal" href="#myModal" class="btn btn-primary btn pull-right btn-info"><span class="glyphicon glyphicon-log-in"></span></a>
      </div>
		</div>
	</nav>
	<br />
	<br />
<div class="container" id="content">
<!--login modal-->
<br />

<div class="modal" id="myModal">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">Login</h1>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block">
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" placeholder="Password">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block">Sign In</button>
              <span class="pull-right"><a href="#">Register</a></span><span><a href="#">Need help?</a></span>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
      </div>  
      </div>
  </div>
  </div>
</div>
		<h2>5 lasters posts</h2>
		<img src="http://img2.wikia.nocookie.net/__cb20120912061448/oldschool/ru/images/9/94/Yoba.png" alt="This is blog" width="250" height="280"/>
    <?php
				
	//function getLastPosts() {
	
	$conn = new mysqli (SERVERNAME, USERNAME, PASSWORD, DBNAME );
	// Check connection
	if ($conn->connect_error) {
		die ( "Connection failed: " . $conn->connect_error );
	}
	
	$sql = "SELECT id, title, description FROM post order by id DESC limit 5  ";
	$result = $conn->query ( $sql );
	if (!$result) die($conn->error);
	$rows = $result->num_rows;
		for ($j = 0 ; $j < $rows ; ++$j)
			{
				$result->data_seek($j);
				$row = $result->fetch_array(MYSQLI_ASSOC);
				$post_id = $row['id'];
				$post_title = $row['title'];
				$post_description = $row['description'];
				echo "<div>";
				echo " <h2> <a href='post.php?id=$post_id'>$post_title</a> </h2>" ;
				echo "<p>$post_description</p>";
				echo "</div>";
				echo "<br />";
			}

				?>
    </div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
$('#openBtn').click(function(){
  $('#myModal').modal({show:true})
});
  </script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js">
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
    $('#openBtn').click(function(){
  $('#myModal').modal({show:true})
});
    </script>
    <div id="footer">
 Copyright © Sergey Grigorov
</div>
</body>
</html>