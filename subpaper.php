<?php
	session_start();
	if($_SESSION['l']=='a')
	{
		if(isset($_POST['subp']))
			{
				require "connection.php";
				$e_id=$_SESSION['subpaper'];
				$q1=$_POST['q1'];
				$c1=$_POST['c1'];
				$op11=$_POST['op11'];
				$op12=$_POST['op12'];
				$op13=$_POST['op13'];
				$op14=$_POST['op14'];
				$str3="insert into $e_id values(1,'$q1','$op11','$op12','$op13','$op14','No Input','$c1')";
				mysqli_query($con,$str3);
				$q2=$_POST['q2'];
				$c2=$_POST['c2'];
				$op21=$_POST['op21'];
				$op22=$_POST['op22'];
				$op23=$_POST['op23'];
				$op24=$_POST['op24'];
				$str4="insert into $e_id values(2,'$q2','$op21','$op22','$op23','$op24','No Input','$c2')";
				mysqli_query($con,$str4);
				$q3=$_POST['q3'];
				$c3=$_POST['c3'];
				$op31=$_POST['op31'];
				$op32=$_POST['op32'];
				$op33=$_POST['op33'];
				$op34=$_POST['op34'];
				$str5="insert into $e_id values(3,'$q3','$op31','$op32','$op33','$op34','No Input','$c3')";
				mysqli_query($con,$str5);
				$q4=$_POST['q4'];
				$c4=$_POST['c4'];
				$op41=$_POST['op41'];
				$op42=$_POST['op42'];
				$op43=$_POST['op43'];
				$op44=$_POST['op44'];
				$str6="insert into $e_id values(4,'$q4','$op41','$op42','$op43','$op44','No Input','$c4')";
				mysqli_query($con,$str6);
				$q5=$_POST['q5'];
				$c5=$_POST['c5'];
				$op51=$_POST['op51'];
				$op52=$_POST['op52'];
				$op53=$_POST['op53'];
				$op54=$_POST['op54'];
				$str7="insert into $e_id values(5,'$q5','$op51','$op52','$op53','$op54','No Input','$c5')";
				mysqli_query($con,$str7);
				header('location:addex.php');
			}
	}
?>