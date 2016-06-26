<?php
	session_start();
	if($_SESSION['l']=='s')
	{
		echo"
		<html>
			<head>
				<title>Online Examination</title>
				<link rel='stylesheet' type='text/css' href='student.css'>
			</head>
			<body>
				<div id='container'>
					<div id='header'>
						<h1>Welcome to Online Examination System</h1>
					</div>
					<div id='main'>
					<table>
					<form name='jlt' action='subp.php' method='post' enctype='multipart/form-data'>
					<tr>
						<th>First Name:<input type='text' name='name' size='40'></th>
						<th>Photo:<input type='file' name='file'></th>
					</tr>
					<tr>
						<th colspan='2'><input type='submit' name='submit' value='submit'></th>
					</tr>
					</form>
					</table>
			</body>
			</html>";
	}
	else
	{
		header('location:logout.php');
	}
?>