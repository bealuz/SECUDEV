<?php
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
	
	mysqli_query($con, "update students 
						set nickname='" . $nickname . "',
							college='" . $college. "',
							course='" . $course. "',
							mobileNo='" . $mobileNo . "',
							highSchool='" . $highSchool . "',
							cgpa='" . $cgpa . "',
							learningStyle='" . $learningStyle . "',
							address='" . $address . "' 
						where username='" . $username . "';");
	
	header('Location: student.php');
	exit;
?>