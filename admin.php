<?php
	session_start();
	if($_SESSION['l']=='a')
	{
		echo"
		<html>
			<head>
				<link rel='stylesheet' type='text/css' href='styledTable.css'>
				<script src='jquery.js'></script>
				<script src='processor.js'></script>
			</head>
			<body>
				<div id='container'>
				<div id='header'>
					<h1>Online Exam Management Administration</h1>
				</div>
				<div id='sidebar'>
					<ul>
						<li><a href='addsub.php'>Add a Subject</a></li>
						<li><a href='sub.php'>Subjects</a></li>
						<li><a href='addex.php'>Add an Exam</a></li>
						<li><a href='sexam.php'>Exams</a></li>
						<li><a href='listc.php'>Confirm Students</a></li>
						<li><a href='delete.php'>Delete Students</a></li>
					</ul>
				</div>
				
				<div id='notify'>
					<h3>Exam Activity</h3>
					<div id = 'exam'>
						Select Exam: 
						<select id='paper' >";
						require "connection.php";
						$str="Select * from subject";
						$result=mysqli_query($con, $str);
						while($row=mysqli_fetch_array($result))
						{
							$str1="select * from $row[0]";
							$result1=mysqli_query($con, $str1);
							while($row1=mysqli_fetch_array($result1))
							{
								echo"<option value = '$row1[0]'>$row1[1]</option>";
							}
						}
						echo"</select>
						 
					</div>
					<div id ='button' name='sub' onclick='refresh()'>Show</div>
					<div id='scroll'>
						<div id='wrapper'>	
							<div class = 'datagrid' id = 'content'>
							</div>
						</div>
					</div>
				</div>
				<div id='footer'>
					<a href='logout.php'>Logout</a>
				</div>
				</div>
			</body>
		</html>
		";
	}
	else
	{
		header('location:logout.php');
	}
?>