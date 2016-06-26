<?php
	session_start();
	if($_SESSION['l']=='s') {
		$id=$_SESSION['id'];
		$allowedExts = array("jpg", "jpeg", "gif", "png","JPG","PNG","GIF");
		$extension = end(explode(".", $_FILES["file"]["name"]));
		if ((($_FILES["file"]["type"] == "image/gif")
			|| ($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "image/JPG")
			|| ($_FILES["file"]["type"] == "image/PNG")
			|| ($_FILES["file"]["type"] == "image/png")
			|| ($_FILES["file"]["type"] == "image/GIF")
			|| ($_FILES["file"]["type"] == "image/pjpeg"))
			&& ($_FILES["file"]["size"] < 6000000)
			&& in_array($extension, $allowedExts)) {
			if ($_FILES["file"]["error"] > 0) {
				echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
			} else {
				require "connection.php";
				$photo=$id.".".$extension;
				if (file_exists("photos/" . $photo)) {
					echo "your photo already exists. ";
					header('refresh:3;student.php');
				} else {
					move_uploaded_file($_FILES["file"]["tmp_name"], "photos/".$photo);
					echo $photo." uploaded in the system";
					$str = "update user set photo = '$photo' where id = '$id'";
					mysqli_query($con, $str);
					header('refresh:3;student.php');
				}
			}
			} else {
				echo "Invalid photo file";
				header('refresh:2;photo.php');
			}
	} else {
		header('location:logout.php');
	}
?>