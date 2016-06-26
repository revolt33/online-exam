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
							<th>Subject ID</th>
							<th>Subject Name</th>
							<th>Deletion</th>
						</tr>";
						require "connection.php";
						$str="select * from subject";
						$result=mysqli_query($con, $str);
						while($row=mysqli_fetch_array($result))
						{
							
							echo"
							<tr>
								<th>$row[0]</th>
								<th>$row[1]</th>
								<th><a href='deletes.php?code=$row[0]'>Delete</a></th>
							</tr>
							";
						}
					echo"
					</table>
				</div>
				<br><br><br><center><a href='admin.php'>Back</a>
			</body>
		</html>";
	}
	else
	{
		header('location:logout.php');
	}
?>