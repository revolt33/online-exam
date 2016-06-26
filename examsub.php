<?php
	session_start();
	if($_SESSION['l']=='s')
	{
		
			require "connection.php";
			$_SESSION['lock']='2';
			$a1=$_POST['a1'];
			$a2=$_POST['a2'];
			$a3=$_POST['a3'];
			$a4=$_POST['a4'];
			$a5=$_POST['a5'];
			$e_id=$_SESSION['ex'];
			$id=$_SESSION['id'];
			$i=1;
			$score=0;
			$str7="select correct from $e_id";
			$result7=mysqli_query($con,$str7);
			$str1="select correct from $e_id where serial=$i";
			$result=mysqli_query($con,$str1);
			$row=mysqli_fetch_array($result);
			if(isset($_POST['sub']))
		{
			if($a1==$row[0])
			{
				$score++;
			}
			$i++;
			$str3="select correct from $e_id where serial=$i";
			$result3=mysqli_query($con,$str3);
			$row3=mysqli_fetch_array($result3);
			if($a2==$row3[0])
			{
				$score++;
			}
			$i++;
			$str4="select correct from $e_id where serial=$i";
			$result4=mysqli_query($con,$str4);
			$row4=mysqli_fetch_array($result4);
			if($a3==$row4[0])
			{
				$score++;
			}
			$i++;
			$str5="select correct from $e_id where serial=$i";
			$result5=mysqli_query($con,$str5);
			$row5=mysqli_fetch_array($result5);
			if($a4==$row5[0])
			{
				$score++;
			}
			$i++;
			$str6="select correct from $e_id where serial=$i";
			$result6=mysqli_query($con,$str6);
			$row6=mysqli_fetch_array($result6);
			if($a5==$row6[0])
			{
				$score++;
			}
			$i=1;
			$str="update $id set a1='$a1',a2='$a2',a3='$a3',a4='$a4',a5='$a5',score='$score' where eid='$e_id'";
			mysqli_query($con,$str);
			}
			echo"
			<html>
			<head>
				<title>Online Examination</title>
				<link rel='stylesheet' type='text/css' href='score.css'>
			</head>
			<body>
				<div id='container'>
					<div id='header'>
						<h1>Welcome to Online Examination System</h1>
					</div>
					<div class='datagrid'>
					<table>
					<thead>
					<tr>
						<th>Q No.</th>
						<th>Your Answer</th>
						<th>Correct Answer</th>
					</tr>
					</thead>
					<tbody>";
					while($row1=mysqli_fetch_array($result7))
					{
						$num="a$i";
						$str2="select $row1[0] from $e_id where serial=$i";
						$row2=mysqli_fetch_array(mysqli_query($con,$str2));
						$str8="select $num from $id where eid='$e_id'";
						$row8=mysqli_fetch_array(mysqli_query($con,$str8));
						$str9="select $row8[0] from $e_id where serial=$i";
						$row9=mysqli_fetch_array(mysqli_query($con,$str9));
						echo"
						<tr"; if($i%2 === 0){echo" class='alt' ";}echo">
							<td>$i</td>
							<td>$row9[0]</tdS>
							<td>$row2[0]</td>
						</tr>
						";
						$i++;
					}
					echo"
					<tr class = 'alt'>
						<td></td>
						<td>Score</td>
						<td>$score</td>
					</tr>
					</tbody>
					</table>
					</div>
					</div>
					<br><center><a href='student.php'>Back</a></center>
					</body>
					</html>
			";
	}
	else
	{
		header('location:logout.php');
	}
?>