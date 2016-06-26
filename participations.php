<?php
	session_start();
	if($_SESSION['l']=='a') {
		if (isset($_POST['exam']) === true ) {
			require "connection.php";
			$exam = $_POST['exam'];
			$str = "select id from student where otps = 'c'";
			echo"
			<table>
			<thead>
			<tr>
				<th>Student Id</th>
				<th>Student Name</th>
				<th>Score</th>
			</tr>
			</thead><tbody>"
			;
			$count = 1;
			$result = mysqli_query($con, $str);
			while($row = mysqli_fetch_array($result)){
				$str1 = "select score from $row[0] where eid = '$exam'";
				$result1 = mysqli_query($con, $str1);
				while ($row1 = mysqli_fetch_array($result1)) {
					$result2 = mysqli_query($con, "select name from user where id = '$row[0]'");
					$row2 = mysqli_fetch_array($result2);
					echo"
					<tr ";if ($count%2 === 0) {echo"class='alt'";} echo">
						<td>$row[0]</td>
						<td>$row2[0]</td>
						<td>$row1[0]</td>
					</tr>";
					$count++;
				}
			}
			echo"</tbody></table>";
		}
	}
?>