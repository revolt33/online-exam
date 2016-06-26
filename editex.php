<?php
	session_start();
	if($_SESSION['l']=='a')
	{
		require "connection.php";
		$id=$_GET['id'];
		$str="select * from $id";
		$result=mysqli_query($con, $str);
		echo"
		<html>
		<head>
			<link rel='stylesheet' type='text/css' href='check.css'>
		</head>
			<body>
			<br><br><br>
				<table>";
					while($row=mysqli_fetch_array($result))
					{
						echo"
						<tr>
							<th colspan='2'>Q$row[0]: $row[1]</th>
							<th>Correct Option: $row[7]</th>
							<th><a href='editexx.php?code=$row[0]&e_id=$id'>Edit</a></th>
						</tr>
						<tr>
							<th>A: $row[2]</th>
							<th>B: $row[3]</th>
							<th>C: $row[4]</th>
							<th>D: $row[5]</th>
						</tr>";
					}
				echo"
				</table>
				<br><br><br><center><a href='sexam.php'>Back</a>
			</body>
		</html>";
	}
	else
	{
		header('header:logout.php');
	}
?>