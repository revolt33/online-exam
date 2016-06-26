<?php
	session_start();
	$err = 0;
	require "connection.php";
	echo"
	<html>
	<head>
		<link rel='stylesheet' type='text/css' href='check.css'>
		<script src='jquery.js'></script>
		<script src='login.js'></script>
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
			function pass(){
				get.render('Incorrect Password!');
			};
			function user() {
				get.render('Invalid Username!');
			};
		</script>
	</head>
		";
		
	if(isset($_POST['sub'])) {
		require "connection.php";
		$name=$_POST['user'];
		$pass=$_POST['pass'];
		$str="select * from user where id='$name'";
		$result=mysqli_query($con,$str);
		if(mysqli_num_rows($result)>0) {
			$row=mysqli_fetch_array($result);
			if($row[1]==$pass) {
				if($row[3]=='a') {
					$_SESSION['l']='a';
					$_SESSION['id']=$name;
					header('location:admin.php');
				} else {
					$_SESSION['l']='s';
					$_SESSION['id']=$name;
					header('location:student.php');
				}
			} else {
				$err = 1;
				echo"<body onload='pass()'>";
			}
		} else {
			$err = 2;
			echo"<body onload='user()'>";
		}
	}
	if ($err == 0 ) {echo"<body>";}
	echo"
	<div id='dialogoverlay'></div>
				<div id='dialogbox'>
				<div>
					<div id='dialogboxhead'></div>
					<div id='dialogboxbody'></div>
					<div id='dialogboxfoot'></div>
				</div>
			</div>
		<div id='login'>
			<table>
			<tr>
				<th colspan='2'>Login Panel</th>
			</tr>
			<form action='' method='post'>
			<tr>
				<th>UserName:</th>
				<th><input type='text' name='user'></th>
			</tr>
			<tr>
				<th>Password:</th>
				<th><input type='password' name='pass'></th>
			</tr>
			<tr>
				<th colspan='2'><input type='submit' name='sub' value='Login'></th>
			</tr>
			</form>
			</table>
			<a href='register.html'><p>Register Now</p></a><br>
			<a href='getotp.html'><p>Get OTP</p></a>
		</div>
		</body>
	</html>";
?>