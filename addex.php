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
			<div id='addex'>
			<table>
				<tr>
					<th colspan='3'>Create an Exam</th>
				</tr>
				<tr>
					<th>Choose Subject</th>
					<th colspan='2'>Fiil the Exam Details</th>
				</tr>
				<form action='paper.php' method='POST'>
				<tr><th>
				<select name='sels'>";
					require "connection.php";
					$str="select * from subject";
					$result=mysqli_query($con, $str);
					while($row=mysqli_fetch_array($result))
					{
						echo"
						<option value='$row[0]'>$row[1]</option>
						";
					}
				echo"
				</select></th>
					<th><input type='text' name='e_id' placeholder='Unique ID'></th>
					<th><input type='text' name='e_name' placeholder='Exam Name'></th>
				</tr>
				<tr>
					<th colspan='3'><input type='submit' value='ADD' name='sele'></th>
				</tr>
				</form>
			</table>
			";
			if($_SESSION['found']=='1')
			{
				echo"An Exam with this id already exists.";
				$_SESSION['found']='2';
			}
			echo"
			</div>
			<br><br><br><a href='admin.php'><p>Back</p></a>
		</body>
	</html>
	";
	}
	else
	{
		header('location:logout.php');
	}
?>