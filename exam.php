<?php
	session_start();
	if($_SESSION['l']=='s')
	{
		if($_SESSION['lock']=='1')
		{
		$id=$_SESSION['id'];
		$e_id=$_GET['code'];
		$_SESSION['ex']=$e_id;
		require "connection.php";
		echo"
		<html>
			<head>
				<title>Online Examination</title>
		";
		$str="select * from $id where eid='$e_id'";
		$result1=mysqli_query($con, $str);
		if(mysqli_num_rows($result1)>0)
		{
			echo"
			<link rel='stylesheet' type='text/css' href='score.css'>
			</head>
			<body>
				<div id='container'>
					<div id='header'>
						<h1>Welcome to Online Examination System</h1>
					</div>
			<div id='exam'>
				<h1>You Have already given this exam...</h1>
			</div>
			<div class='datagrid'>
			<table>
				<thead>
					<tr>
						<th>Q. No.</th>
						<th>Your Answer</th>
						<th>Correct Answer</th>
					</tr>
				</thead>
				<tbody>";
				$query1 = "select * from $e_id";
				$result_set1=mysqli_query($con,$query1);
				while ($values=mysqli_fetch_array($result_set1))
				{
					$query2 = "select a$values[0] from $id where eid = '$e_id'";
					$result_set2 = mysqli_query($con, $query2);
					$input2=mysqli_fetch_array($result_set2);
					$query3="select $input2[0] from $e_id where serial = $values[0]";
					$result_set3 = mysqli_query($con, $query3);
					$input1 = mysqli_fetch_array($result_set3);
					$query4 = "select $values[7] from $e_id where serial =  $values[0]";
					$result_set4 = mysqli_query($con, $query4);
					$correct = mysqli_fetch_array($result_set4);
					echo
					"<tr";if ($values[0]%2 == 0) { echo" class='alt'";}echo" >
						<td>$values[0]</td>
						<td>$input1[0]</td>
						<td>$correct[0]</td>
					</tr>";
				}
				$query = "select score from $id where eid = '$e_id'";
				$result_set = mysqli_query($con, $query);
				$input = mysqli_fetch_array($result_set);
				echo"
				<tr class='alt'>
					<td></td>
					<td>Score</td>
					<td>$input[0]</td>
				</tr>
				</tbody>
			</table>
			</div>
			<br />
			<a href ='student.php'>Back</a>
			</div>
			</body>
			</html>
			";
		}
		else
		{
			$str1="select * from $e_id";
			$result1=mysqli_query($con, $str1);
			$str2="insert into $id values('$e_id','e','e','e','e','e',0)";
			mysqli_query($con, $str2);
			echo"
			<link rel='stylesheet' type='text/css' href='student.css'>
			</head>
			<body>
				<div id='container'>
					<div id='header'>
						<h1>Welcome to Online Examination System</h1>
					</div>
			<h2 id='time'></h2>
			<script>
				var target;
				status=0;
				var minutes, seconds, temp;
				var countdown = document.getElementById('time');
				setInterval(function ()
				{
					if(target==0)
					return;
					if(status==0)
					{
						var target_time = 600000;
						target = target_time;
						status++;
					}
					
					var seconds_left = (target-1000);
					target = seconds_left;
					minutes = parseInt(seconds_left / 60000);
					temp= seconds_left-(minutes*60000);
					seconds = parseInt(temp / 1000);
					countdown.innerHTML = (minutes + 'm ' + seconds + 's');}, 1000);
					
			</script>
			<div id='exam1'>
			<table>
			<form action='examsub.php' method='POST'>";
			while($row=mysqli_fetch_array($result1))
			{
				echo"
				<tr>
					<th colspan='2'>Q$row[0]: $row[1]</th>
				</tr>
				<tr>
					<th>A: <input type='radio' name='a$row[0]' value='a'>$row[2]</th>
					<th>B: <input type='radio' name='a$row[0]' value='b'>$row[3]</th>
				</tr>
				<tr>
					<th>C: <input type='radio' name='a$row[0]' value='c'>$row[4]</th>
					<th>D: <input type='radio' name='a$row[0]' value='d'>$row[5]</th>
				</tr>
				";
			}
			echo"
			<tr>
				<th colspan='2'><input type='submit' name='sub' value='Submit'></th>
			</tr>
			</form>
			</table>
			</div>
			</body>
			</html>";
			header('refresh:601; url=examsub.php');
			}
		}
		else
			{
				header('location:logout.php');
			}
		
	}
		else
	{
		header('location:logout.php');
	}
?>