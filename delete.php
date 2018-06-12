<?php

	include 'connect.php';

	$id=$_GET['did'];
	$del="delete from student where id='$id'";
	$exe=$con->query($del);

	if($exe)
	{
		echo "Record Succesfully Deleted..!";
	}
	else
	{
		echo "Error in delete";
	}
?>
