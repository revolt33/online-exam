<?php
	session_start();
	if($_SESSION['l']=='a')
	{
		$count=1;
		echo"
		<html>
			<head>
				<link rel='stylesheet' type='text/css' href='admin.css'>
			</head>
			<body>
				<h1>Delete Students</h1>
				<br>
				<table>
					<tr>
						<th>S No.</th>
						<th>ID</th>
						<th>Name</th>
						<th>Status</th>
						<th>Image</th>
					</tr>";
					require "connection.php";
					$str="select * from student where otps='c'";
					$result=mysqli_query($con,$str);
					while($row=mysqli_fetch_array($result))
					{
						$str1="select * from user where id='$row[0]'";
						$result1=mysqli_query($con,$str1);
						$row1=mysqli_fetch_array($result1);
						echo"
						<tr>
							<th>$count</th>
							<th>$row[0]</th>
							<th>$row1[0]</th>
							<th><a href='confirm.php?cod=$row[0]'>Delete</a></th>
							<th><img src='photos/$row1[4]' height='50' width='50'></th>
						</tr>";
						$count++;
					}
				echo"
				</table>
				<br><br><br><center><a href='admin.php'>Back</a>
			</body>
		</html>";
	}
	else
	{
		header('location:logout.php');
	}