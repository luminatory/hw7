<?php 
//connect to db
require_once 'db.php';
//get menu function
function createMenu($arrayMenu) {
	if (! is_array ( $arrayMenu ) || ! count ( $arrayMenu )) {
		return;
	}
	echo '<ul class="nav navbar-nav">';
	foreach ( $arrayMenu as $key => $value ) {
		echo '<li>' . "<a href='category.php?id={$key}'> ";
		echo $value;
		echo '</a></li>';
	}
	echo '</ul>';
}
function getAllCategories() {
	$link = mysqli_connect( SERVERNAME, USERNAME, PASSWORD, DBNAME);
	if (!$link) {
    die('Ошибка подключения (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
	$result = array ();
	
	$query = "SELECT id, name FROM  category" or die ( "Error in the consult.." . mysqli_error ( $link ) );
	$queryResult = $link->query ( $query );
	
	while ( $row = mysqli_fetch_array ( $queryResult ) ) {
		$result [$row ['id']] = $row ["name"];
	}
	return $result;
}

function getPosts($arrayMenu) {
	if (! is_array ( $arrayMenu ) || ! count ( $arrayMenu )) {
		return;
	}
	echo '<ul>';
	foreach ( $arrayMenu as $key => $value ) {
		echo '<li>' . "<a href='category.php?id={$key}'> ";
		echo $value;
		echo '</li></ul>';
	}
	echo '</ul>';
}
function getAllPosts() {
	
	// Create connection
	$conn = new mysqli ( SERVERNAME, USERNAME, PASSWORD, DBNAME );
	// Check connection
	if ($conn->connect_error) {
		die ( "Connection failed: " . $conn->connect_error );
	}
	// $sql = "SELECT c.name, c.id, p.title, p.categoty_id, p.description
	// FROM post p, category c WHERE c.id=p.categoty_id order by c.name desc";
	$cat_id = $_SERVER ['REQUEST_URI'];
	echo $cat_id;
	$cat = explode ( '=', $cat_id );
	$endCat = end ( $cat );
	
	switch ($endCat) {
		
		case 1 :
			$sql = "SELECT id, title, description, category_id FROM post WHERE category_id='1' ";
			break;
		case 2 :
			$sql = "SELECT  id, title, description, category_id FROM post WHERE category_id='2' ";
			break;
		case 3 :
			$sql = "SELECT  id, title, description, category_id FROM post WHERE category_id='3' ";
			break;
	}
	$result = $conn->query ( $sql );
	if ($result->num_rows > 0) {
		// output data of each row
		while ( $row = $result->fetch_assoc () ) {
			echo "<br />";
			echo "<br />";
			echo "<h3><a href='post.php?id={$endCat}'>" . $row ['title'] . "</a> </h3> " . $row ["description"] . "<br>";
		}
	} else {
		echo "0 results";
	}
}
//Menu for posts
function createMenuPosts($arrayMenu) {
	if (! is_array ( $arrayMenu ) || ! count ( $arrayMenu )) {
		return;
	}
	echo '<ul style="width:100%; overflow:hidden;">';
	echo '<li style="float:left; margin:10px;"><a href="index.php">Home</a></li>';
	foreach ( $arrayMenu as $key1 => $value ) {
		echo '<li style="float:left; margin:10px;">' . "<a href='post.php?id={$key1}'>";
		echo $value;
		echo '</a></li>';
	}
	echo '</ul>';
}
function getSinglePosts() {
	$conn = new mysqli ( SERVERNAME, USERNAME, PASSWORD, DBNAME );
	// Check connection
	if ($conn->connect_error) {
		die ( "Connection failed: " . $conn->connect_error );
	}
	// $sql = "SELECT c.name, c.id, p.title, p.categoty_id, p.description
	// FROM post p, category c WHERE c.id=p.categoty_id order by c.name desc";
	$cat_id = $_SERVER ['REQUEST_URI'];
	
	$cat = explode ( '=', $cat_id );
	$endCat = end ( $cat );
	switch ($endCat) {
		case 1 :
			$sql = "SELECT id, title, text, category_id FROM post WHERE id IN('1', '5', '7') ";
			break;
		case 2 :
			$sql = "SELECT  id, title, text, category_id FROM post WHERE id IN( '2', '3') ";
			break;
		case 3 :
			$sql = "SELECT  id, title, text, category_id FROM post WHERE id IN('4', '6') ";
			break;
	}
	$result = $conn->query ( $sql );
	if ($result->num_rows > 0) {
		// output data of each row
		while ( $row = $result->fetch_assoc () ) {
			echo "<h2><a href='post.php?id={$endCat}'>" . $row ['title'] . "</a> </h2> " . $row ["text"] . "<br>";
		}
	} else {
		echo "0 results";
	}
	
}

function getLatest($arrayLatest) {
	if (! is_array ( $arrayLatest ) || ! count ( $arrayLatest )) {
		return;
	}
	echo '<ul>';
	foreach ( $arrayLatest as $key => $value ) {
		echo '<li style="float:left; margin:10px;">' . "<a href='post.php?id={$key}'>";
		echo $value;
		echo '</li></ul>';
	}
	echo '</ul>';
}
function getLastPosts() {
	// Create connection
	$conn = new mysqli (SERVERNAME, USERNAME, PASSWORD, DBNAME );
	// Check connection
	if ($conn->connect_error) {
		die ( "Connection failed: " . $conn->connect_error );
	}
	
	$sql = "SELECT id, title, text FROM post order by id DESC limit 5  ";
	$result = $conn->query ( $sql );
	
	if ($result->num_rows > 0) {
		// output data of each row
		while ( $row = $result->fetch_assoc () ) {
			echo   "<h2><a href='post.php?id={$endCat}'>" . $row ['title'] . "</a> </h2> " . $row ["text"] .  "<br>";
		}
	} else {
		echo "0 results";
	}
	return $row;
}