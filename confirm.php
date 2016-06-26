<?php
	session_start();
	if($_SESSION['l']=='a')
	{
		if(isset($_GET['id']))
		{
		$id=$_GET['id'];
		require "connection.php";
		$c=uniqid();
		$otp=substr($c,-10);
		$str="update student set status='c', otps='s', otp='$otp' where id='$id'";
		mysqli_query($con,$str);
		header('location:listc.php');
		}
		else if(isset($_GET['cod']))
		{
		require "connection.php";
		$id=$_GET['cod'];
		$str1="delete from student where id='$id'";
		$str2="delete from user where id='$id'";
		$str3="drop table $id";
		mysqli_query($con,$str1);
		mysqli_query($con,$str2);
		mysqli_query($con,$str3);
		header('location:delete.php');
		}
		else
		{
			header('location:admin.php');
		}
	}
	else
	{
		header('location:logout.php');
	}
?>