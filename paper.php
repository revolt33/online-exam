<?php
	session_start();
	$_SESSION['subpaper'];
	if($_SESSION['l']=='a')
	{
		require"connection.php";
		$sels=$_POST['sels'];
		$e_id=$_POST['e_id'];
		$e_name=$_POST['e_name'];
		$_SESSION['subpaper']=$e_id;
		$str="select * from $sels where id='$e_id'";
		if(mysqli_num_rows(mysqli_query($con, $str))>0)
		{
			$_SESSION['found']='1';
			header('location:addex.php');
		}
		else
		{
			$str2="insert into $sels values('$e_id', '$e_name')";
			mysqli_query($con,$str2);
			$str1="create table $e_id(serial int(1), ques varchar(200),a varchar(20),b varchar(20),c varchar(20),d varchar(20),e varchar(20),correct char(1))";
			mysqli_query($con,$str1);
			echo"
			<html>
				<head>
					<link rel='stylesheet' type='text/css' href='check.css'>
				</head>
				<body><br><br>
					<table>
						<tr>
							<th colspan='4'>Setup The Question Paper for $e_name</th>
						</tr>
						<form action='subpaper.php' method='POST'>
						<tr>
							<th colspan='3'>Q1:<input type='text' name='q1' placeholder='Question 1' size='80' maxlength='200'></th>
							<th>Correct Choice:<select name='c1'><option value='a'>A</option><option value='b'>B</option><option value='c'>C</option><option value='d'>D</option></th>
						</tr>
						<tr>
							<th><input type='text' name='op11' placeholder='Option 1' maxlength='20'></th>
							<th><input type='text' name='op12' placeholder='Option 2' maxlength='20'></th>
							<th><input type='text' name='op13' placeholder='Option 3' maxlength='20'></th>
							<th><input type='text' name='op14' placeholder='Option 4' maxlength='20'></th>
						</tr>
						<tr>
							<th colspan='3'>Q2:<input type='text' name='q2' placeholder='Question 2' size='80' maxlength='200'></th>
							<th>Correct Choice:<select name='c2'><option value='a'>A</option><option value='b'>B</option><option value='c'>C</option><option value='d'>D</option></th>
						</tr>
						<tr>
							<th><input type='text' name='op21' placeholder='Option 1' maxlength='20'></th>
							<th><input type='text' name='op22' placeholder='Option 2' maxlength='20'></th>
							<th><input type='text' name='op23' placeholder='Option 3' maxlength='20'></th>
							<th><input type='text' name='op24' placeholder='Option 4' maxlength='20'></th>
						</tr>
						<tr>
							<th colspan='3'>Q3:<input type='text' name='q3' placeholder='Question 3' size='80' maxlength='200'></th>
							<th>Correct Choice:<select name='c3'><option value='a'>A</option><option value='b'>B</option><option value='c'>C</option><option value='d'>D</option></th>
						</tr>
						<tr>
							<th><input type='text' name='op31' placeholder='Option 1' maxlength='20'></th>
							<th><input type='text' name='op32' placeholder='Option 2' maxlength='20'></th>
							<th><input type='text' name='op33' placeholder='Option 3' maxlength='20'></th>
							<th><input type='text' name='op34' placeholder='Option 4' maxlength='20'></th>
						</tr>
						<tr>
							<th colspan='3'>Q4:<input type='text' name='q4' placeholder='Question 4' size='80' maxlength='200'></th>
							<th>Correct Choice:<select name='c4'><option value='a'>A</option><option value='b'>B</option><option value='c'>C</option><option value='d'>D</option></th>
						</tr>
						<tr>
							<th><input type='text' name='op41' placeholder='Option 1' maxlength='20'></th>
							<th><input type='text' name='op42' placeholder='Option 2' maxlength='20'></th>
							<th><input type='text' name='op43' placeholder='Option 3' maxlength='20'></th>
							<th><input type='text' name='op44' placeholder='Option 4' maxlength='20'></th>
						</tr>
						<tr>
							<th colspan='3'>Q5:<input type='text' name='q5' placeholder='Question 5' size='80' maxlength='200'></th>
							<th>Correct Choice:<select name='c5'><option value='a'>A</option><option value='b'>B</option><option value='c'>C</option><option value='d'>D</option></th>
						</tr>
						<tr>
							<th><input type='text' name='op51' placeholder='Option 1' maxlength='20'></th>
							<th><input type='text' name='op52' placeholder='Option 2' maxlength='20'></th>
							<th><input type='text' name='op53' placeholder='Option 3' maxlength='20'></th>
							<th><input type='text' name='op54' placeholder='Option 4' maxlength='20'></th>
						</tr>
						<tr>
							<th colspan='4'><input type='submit' name='subp' value='SET'></th>
						</tr>
					</table>";
		}
		
	}
	else
	{
		header('location:logout.php');
	}
?>