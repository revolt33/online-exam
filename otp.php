<?php
		session_start();
		require "connection.php";
		$id=$_SESSION['id'];
		$str2="select * from student where id='$id'";
		$result2=mysqli_query($con,$str2);
		$row2=mysqli_fetch_array($result2);
		if($row2[3]=='s')
		{
		echo"
			<html>
			<head>
				<link rel='stylesheet' type='text/css' href='check.css'>
			</head>
			<body>
			<div id='reg'>
			<table>
				<form action='' method='POST'>
				<tr>
					<th>TYPE your one time password:</th>
					<th><input type='text' name='otp'></th>
				</tr>
				<tr>
					<th colspan='2'><input type='submit' value='Verify' name='subotp'></th>
				</tr>
				</form>
			</table>
			</div>
		</body>
		</html>
		";
		if(isset($_POST['subotp']))
		{
			$otp=$_POST['otp'];
			$id=$_SESSION['id'];
			$str="select otp from student where id='$id'";
			$result=mysqli_query($con,$str);
			$row=mysqli_fetch_array($result);
			if($row[0]==$otp)
			{
				$str1="update student set otps='c' where id='$id'";
				mysqli_query($con,$str1);
				$str2="create table $id (eid varchar(6),a1 char(1),a2 char(1),a3 char(1),a4 char(1),a5 char(1),score int(1))";
				mysqli_query($con,$str2);
				header('location:logout.php');
			}
			else
			{
				header('location:logout.php');
			}
		}
		}
		else
		{
			echo"Your registration is under process...";
			header('refresh:3; url=logout.php');
		}
?>