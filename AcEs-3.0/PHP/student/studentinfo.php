<?php
	include 'encrypt_decrypt.php';
	session_start();
	
	$username = $_SESSION['username'];
	$nickname = $_POST['nickname'];
	$college = $_POST['College'];
	$course = $_POST['Course'];
	$mobileNo = $_POST['contact'];
	$address = $_POST['Address'];
	$highSchool = $_POST['HS'];
	$cgpa = $_POST['CGPA'];
	
	$con = mysqli_connect('localhost', 'root', '', 'aces');
	$key = 'SELECT encryption_key FROM key';
	mysqli_query($con, "update students 
						set nickname='" . encrypt($nickname, $key) . "',
							college='" . encrypt($college, $key). "',
							course='" . encrypt($course, $key). "',
							mobileNo='" . $encrypt($mobileNo, $key) . "',
							highSchool='" . encrypt($highSchool, $key) . "',
							cgpa='" . encrypt($cgpa, $key) . "',
							learningStyle='" . null . "',
							address='" . encrypt($address, $key) . "' 
						where username='" . encrypt($username, $key) . "';");
	
	header('Location: student.php');
	exit;
?>