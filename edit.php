<?php 

include 'connect.php';

$id=$_POST['userid'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$edu = $_POST['edu'];
$h=$_POST['hob'];
$hob=implode(",",$h);
//..........Profile................
$pro=$_FILES['pro']['name'];
$tmp=$_FILES['pro']['tmp_name'];
$f_type=$_FILES['pro']['type'];
$f_size=$_FILES['pro']['size'];
move_uploaded_file($tmp,"gallary/".$pro);
//..........Gallerys..............
			$image=array();
			foreach ($_FILES['mgal']['tmp_name'] as $key =>$tmp_name)
			 {
				$gpath=$_FILES['mgal']['name'][$key];
				$gtmp=$_FILES['mgal']['tmp_name'][$key];
				if(move_uploaded_file($gtmp,"gallary/$gpath"))
				{
					echo "sucess";
				}
				array_push($image, $gpath);
			}
			$gname=implode(",", $image);

$upd="update student set fname='$fname',lname='$lname',gender='$gender',edu='$edu',hob='$hob',pro='$pro',mgal='$gname' where id='$id'";
	$exe=$con->query($upd);

	if($upd)
	{
		echo "Update Successful!!";
	}
	else
	{
		echo "Error In Update";
	}
?>

