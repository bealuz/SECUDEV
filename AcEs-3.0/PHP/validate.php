<?php
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$con = mysqli_connect('localhost', 'root', '', 'aces');
	$result = mysqli_query($con, ("select * from users WHERE Username='" . $username . "' 
														AND Password='" . $password . "'"));
	$row = mysqli_fetch_array($result);
	
	mysqli_close($con);
	
	if(count($row) >= 1) {
	
		if(strcmp($row['Role'], "Student") == 0) {
			session_start();
			$_SESSION['username'] = $username;
			header('Location: http://localhost/academicestimator/student/student.php/');
			exit;
		}
		else
			if(strcmp($row['Role'], "Professor") == 0) {
				session_start();
				$_SESSION['username'] = $username;
				echo "HA";
			}
	}
	else {
		header('Location: http://localhost/academicestimator/default.html');
	}
?>