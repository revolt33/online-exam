<?php
	session_start();
	if($_SESSION['l']=='s')
	{
		$id=$_SESSION['id'];
		require "connection.php";
		echo"
		<html>
			<head>
				<title>Online Examination</title>
				<link rel='stylesheet' type='text/css' href='student.css'>
			</head>
			<body>
				<div id='main'>
				<table>
					<tr>
						<th>Enter New Password</th>
					</tr>
					<form action='' method='POST'>
					<tr>
						<th><input type='password' name='pass'></th>
					</tr>
					<tr>
						<th><input type='submit' name='change' value='Change'></th>
					</tr>
					</form>
				</table>
				</div>
			</body>
			</html>";
		if(isset($_POST['change']))
		{
			$id=$_SESSION['id'];
			$pass=$_POST['pass'];
			$str="update user set pwd='$pass' where id='$id'";
			mysqli_query($con,$str);
			header('location:student.php');
		}
	}
	else
	{
		header('location:logout.php');
	}
?>