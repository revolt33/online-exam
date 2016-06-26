<?php
	session_start();
	if($_SESSION['l']=='s')
	{
		$_SESSION['lock']='1';
		$id=$_SESSION['id'];
		require "connection.php";
		$str="select * from student where id='$id'";
		$result=mysqli_query($con, $str);
		$row=mysqli_fetch_array($result);
		$rcount=1;
		if($row[3]=='s')
		{
			header('location:otp.php');
		}
		else if($row[2]=='u')
		{
			echo"Your registration is under process";
			header('refresh:3;url=logout.php');
		}
		else
		{
		echo"
		<html>
			<head>
				<title>Online Examination</title>
				<link rel='stylesheet' type='text/css' href='student.css'>
				<link rel='stylesheet' type='text/css' href='accordion/jquery-ui.css'>
				<script src='accordion/jquery-1.9.1.js'></script>
				<script src='accordion/jquery-ui.js'></script>
				<script src='student.js'></script>
				<style>
				#content a
				{
					text-decoration:none;
				}
				#content div a:hover
				{
					text-decoration:underline;
				}
				#wrap
				{
					height: 700px;
					width:80%;;
					margin-left:10%;
				}
				</style>
			</head>
			<body>
				<div id='container'>
					<div id='header'>
						<h1>Welcome to Online Examination System</h1>
					</div>
					<div id='main'>
						<table>
						<tr>
							<th><a href='photo.php'>Upload Photo</a></th>
							<th><a href='change.php'>Change Password</a></th>
							<th><a href='logout.php'>Logout</a></th>
						</tr>
						</table>
					</div>
					<div id='wrap'>
					<div id='content'>";
							$str1="select * from subject";
							$result1=mysqli_query($con,$str1);
							while($row1=mysqli_fetch_array($result1))
							{
								echo"
								<h3><a href = '#'>$row1[1]</a></h3>
								";
								$str2="select * from $row1[0]";
								$result2=mysqli_query($con,$str2);
								echo"<div>";
								while($row2=mysqli_fetch_array($result2))
								{
									echo"
									<a href='exam.php?code=$row2[0]'>$row2[1]</a><br />";
									/*if($rcount%4==0)
									{
										echo"
										<br />";
									}*/
									$rcount++;
								}
								echo"</div>";
								$rcount=1;
							}
							echo"
					</div>
					</div>
				</div>
			</body>
		</html>
		";
		}
	}
	else {
		header('location:logout.php');
	}
?>