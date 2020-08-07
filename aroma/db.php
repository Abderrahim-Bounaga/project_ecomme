<?php 

    $connection = mysqli_connect('Localhost','root','','beauty_store');

    if($connection->connect_error){
		die("Connection failed: ".$connection->connect_error);
	}
	
	return $connection;

?>


