<?php
	session_start();
	if($_SESSION['l']=='a')
	{
		require "connection.php";
		$s=$_GET['code'];
		$e_id=$_GET['e_id'];
		$str="select * from $e_id where serial='$s'";
		$result=mysqli_query($con, $str);
		$row=mysqli_fetch_array($result);
		echo"
		<html>
		<head>
			<link rel='stylesheet' type='text/css' href='check.css'>
		</head>
			<body>
				<div id=''>
				<table>
				<form action='' method='POST'>
					<tr>
						<th colspan='3'>Q$row[0]: <input type='text' name='q' size='80' value='$row[1]'></th>
						<th>Correct Choice:<select name='cc'><option value='a'>A</option><option value='b'>B</option><option value='c'>C</option><option value='d'>D</option></select></th>
					</tr>
					<tr>
						<th>A: <input type='text' name='op1' value='$row[2]'></th>
						<th>B: <input type='text' name='op2' value='$row[3]'></th>
						<th>C: <input type='text' name='op3' value='$row[4]'></th>
						<th>D: <input type='text' name='op4' value='$row[5]'></th>
					</tr>
					<tr>
						<th colspan='4'><input type='submit' value='Update' name='sub'></th>
					</tr>
					</form>
				</table>
				<br><br><br><center><a href='sexam.php'>Back</a>
				</div>";
		if(isset($_POST['sub']))
		{
			$q=$_POST['q'];
			$cc=$_POST['cc'];
			$op1=$_POST['op1'];
			$op2=$_POST['op2'];
			$op3=$_POST['op3'];
			$op4=$_POST['op4'];
			$str="update $e_id set ques='$q', a='$op1', b='$op2', c='$op3', d='$op4', correct='$cc' where serial='$s'";
			mysqli_query($con, $str);
			header('location:sexam.php');
		}
	
	}
	else
	{
		header('location:logout.php');
	}
?>