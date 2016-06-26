<?php
	session_start();
	$_SESSION['id'];
	if(isset($_POST['sub']))
	{
		require "connection.php";
		$name=$_POST['name'];
		$email=$_POST['email'];
		$id=$_POST['user'];
		$_SESSION['id']=$id;
		$str="select email from student where email='$email'";
		$str1="select id from student where id='$id'";
		$result=mysqli_query($con,$str);
		$result1=mysqli_query($con,$str1);
		if(mysqli_num_rows($result)>0)
		{
			echo"You have already registered with us...";
			header('refresh:3; url=register.html');
		}
		else if(mysqli_num_rows($result1)>0)
		{
			echo "This id is already used by someone else, try different...";
			header('refresh:3; url=register.html');
		}
		else
		{
			$str2="insert into user values('$id','pass','$name','s', '');";
			mysqli_query($con,$str2);
			$str3="insert into student values('$id', '0', 'u', 'n', '$email');";
			mysqli_query($con,$str3);
			header('location:otp.php');
		}
	}
	else
	{
		header('location:logout.php');
	}
?>