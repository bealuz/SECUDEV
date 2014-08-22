<?php
	
	function connecToDatabase(){
		$host = "localhost";
		$username = "root";
		$password = "nikka08";
		$database = "aces";

		mysql_connect("$host", "$username", "$password") or die(mysql_error());

		mysql_select_db("$database") or die(mysql_error());
	}
	
	function registerProfessor(){	
	
		connecToDatabase();

		$firstName = $_POST['firstname'];
		$middleName = $_POST['middlename'];
		$lastName = $_POST['lastname'];
		$username = $_POST['idno'];
		$email = $_POST['email'];
		$password = $_POST['regpass'];
		$role = "professor";
		
		$hashed = crypt($password);
	
		$sql = 'INSERT INTO professors(username, fname, mname, lname, email, password) VALUES(\''. $username . '\', \'' . $firstName . '\', \'' . $middleName . '\', \'' . $lastName . '\', \'' . $email . '\', \'' . $hashed. '\')';
		mysql_query("$sql") or die(mysql_error());
		
		$sql = 'INSERT INTO users(username, password, role) VALUES(\''. $username . '\', \'' . $hashed . '\', \'' . $role . '\')';
		mysql_query("$sql") or die(mysql_error());
		
		mysql_close();
		die();
	}
	
	registerProfessor();
?>