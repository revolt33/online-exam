<?php
	session_start();
	if($_SESSION['l']=='a')
	{
		echo"
		<html>
		<head>
			<link rel='stylesheet' type='text/css' href='check.css'>
			<head>
		<link rel='stylesheet' type='text/css' href='check.css'>
		<script src='addsub.js'></script>
		<style>
			#dialogoverlay{
				display: none;
				opacity: .8;
				position: fixed;
				top: 0px;
				left: 0px;
				background: #FFF;
				width: 100%;
				z-index: 10;
			}
			#dialogbox{
				display: none;
				position: fixed;
				background: #000;
				border-radius:7px; 
				width:550px;
				z-index: 10;
			}
			#dialogbox > div{ background:#FFF; margin:8px; }
			#dialogbox > div > #dialogboxhead{ background: #666; font-size:19px; padding:10px; color:#CCC; }
			#dialogbox > div > #dialogboxbody{ background:#333; padding:20px; color:#FFF; }
			#dialogbox > div > #dialogboxfoot{ background: #666; padding:10px; text-align:right; }
		</style>
		<script>
			function error(){
				get.render('Failed to add Subject!','A subject with this ID already exists!');
			};
			function success(){
				get.render('Success','One subject added successfully!');
			};
		</script>
		</head>
		<body ";
		if($_SESSION['sub']=='1')
			{
				echo"onload='success()'";
				$_SESSION['sub']='2';
			}
		if(isset($_POST['sub']))
		{
			require "connection.php";
			$s_id=$_POST['id'];
			$s_name=$_POST['sid'];
			$str="select * from subject where id='$s_id'";
			if(mysqli_num_rows(mysqli_query($con, $str))>0)
			{
				echo"onload='error()'";
			}
			else
			{
				$str1="insert into subject values('$s_id','$s_name')";
				mysqli_query($con, $str1);
				$str2="create table $s_id(id varchar(6) primary key, name varchar(30))";
				mysqli_query($con,$str2);
				$_SESSION['sub']='1';
				header('location:addsub.php');
			}
		}
		echo">
		<div id='dialogoverlay'></div>
				<div id='dialogbox'>
				<div>
					<div id='dialogboxhead'></div>
					<div id='dialogboxbody'></div>
					<div id='dialogboxfoot'></div>
				</div>
			</div>
			<div id='add'>
			<table>
				<tr>
					<th colspan='2'>Add a Subject</th>
				</tr>
				<tr>
					<th>Subject ID</th>
					<th>Name</th>
				</tr>
				<form action='' method='POST'>
				<tr>
					<th><input type='text' name='id' placeholder='ID must be unique'></th>
					<th><input type='text' name='sid'></th>
				</tr>
				<tr>
					<th colspan='2'><input type='submit' value='ADD' name='sub'></th>
				</tr>
			</table>";
			echo"
		</div>
		<br><center><a href='admin.php'>Back</a>
		</body>
	</html>";
	}
	else
	{
		header('location:logout.php');
	}
?>