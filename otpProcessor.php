<?php
	require "connection.php";
	if(isset($_POST['id']))
	{
		$otp=$_POST['id'];
		$str="select otp from student where id='$otp' and otps='s'";
		$result=mysqli_query($con,$str);
		
			if($row=mysqli_fetch_array($result))
			{
				echo "Your OTP is: $row[0]";
			}
			else
			{
				echo"This id is not eligible for OTP.";
			}
	} else {
		header('location:logout.php');
	}
?>