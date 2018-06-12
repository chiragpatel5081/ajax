<?php

		include 'connnect.php';
		
		echo "hii";
		exit();
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

		 $ins="insert into student(fname,lname,gender,edu,hob,pro,mgal)values('$fname','$lname','$gender','$edu','$hob','$pro','$gname')";
		$exe=$con->query($ins);

		if($exe)
		{
			echo "Record Successfully Inserted!!!";
		}

		else
		{
			echo "Error In Record!";
		}

?>

