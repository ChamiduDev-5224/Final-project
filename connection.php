<?php session_start(); ?>
<?php 

	$connection =mysqli_connect('localhost','root','','final pro');


	//connection checking 
	if ($connection -> connect_errno) {

		//if connection failed 
		echo "Failed to connect to MySQL: " . $connection -> connect_error;
	
	} else {

		
	}

 ?>