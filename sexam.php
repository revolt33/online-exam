<?php
	session_start();
	if($_SESSION['l']=='a')
	{
		echo"
		<html>
		<head>
			<link rel='stylesheet' type='text/css' href='check.css'>
		</head>
			<body>
				<div id='add'>
					<table>
						<tr>
							<th>Subject</th>
							<th>Exam Id</th>
							<th>Exam Name</th>
							<th>Modification</th>
							<th>Deletion</th>
						</tr>";
						require "connection.php";
						$str="Select * from subject";
						$result=mysqli_query($con, $str);
						while($row=mysqli_fetch_array($result))
						{
							$str1="select * from $row[0]";
							$result1=mysqli_query($con, $str1);
							while($row1=mysqli_fetch_array($result1))
							{
								echo"
								<tr>
									<th>$row[1]</th>
									<th>$row1[0]</th>
									<th>$row1[1]</th>
									<th><a href='editex.php?id=$row1[0]'>Edit</a></th>
									<th><a href='deletex.php?s_id=$row[0]&e_id=$row1[0]'>Delete</a></th>
								</tr>";
							}
						}
						echo"
					</table>
					</div>
					<center><a href='admin.php'>Back</a></center>
				</body>
			</html>";
	}
	else
	{
		header('location:logout.php');
	}
?>