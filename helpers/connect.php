<?php 
	$con = mysqli_connect('localhost', 'root', '', 'dbbiblioteca') or die('Unable To connect');
	if(!$con)
		echo 'Error: '.mysqli_error($con);
?>