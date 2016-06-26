<?php
	session_start();
	if($_SESSION['l']=='a')
	{
		require "connection.php";
		$s_id=$_GET['s_id'];
		$e_id=$_GET['e_id'];
		$str="delete from $s_id where id='$e_id'";
		$str1="drop table $e_id";
		mysqli_query($con,$str);
		mysqli_query($con, $str1);
		header('location:sexam.php');
	}
	else
	{
		header('location:logout.php');
	}
?>