<?php
	session_start();
	if($_SESSION['l']=='a')
	{
		$id=$_GET['code'];
		require "connection.php";
		$str="delete from subject where id='$id'";
		$str1="drop table $id";
		mysqli_query($con,$str);
		$str2="select * from $id";
		$result=mysqli_query($con,$str2);
		while($row=mysqli_fetch_array($result))
		{
			$str3="drop table $row[0]";
			mysqli_query($con,$str3);
		}
		mysqli_query($con,$str1);
		header('location:sub.php');
	}
	else
	{
		header('location:logout.php');
	}
?>