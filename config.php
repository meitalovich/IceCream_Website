<?php

	$conn = new mysqli("localhost","root","","ice-cream", '3306');
	
	if($conn->connect_error){
		die("Connection Failed!".$conn->connect_error);
	}
?>