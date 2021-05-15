<?php
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="pickndrop";
	$conn=mysqli_connect($servername,$username,$password,$dbname);
	if(!$conn)
	{
		echo "not";
	}
?>