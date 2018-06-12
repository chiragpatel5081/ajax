<?php
include 'connect.php';

$eid=$_GET['eid'];
	
	$sel="select * from student where id='$eid'";
	$exe=$con->query($sel);
		
	if($exe)
	{
		$fet=$exe->fetch_object();
		echo json_encode($fet);
	}
	else
	{
		echo "There is issue in update Form!!";
	}			
?>