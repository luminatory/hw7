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




