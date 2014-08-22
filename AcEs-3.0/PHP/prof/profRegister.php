<?php

	include 'encrypt_decrypt.php';
	
	function connecToDatabase(){
		$host = "localhost";
		$username = "root";
		$password = "nikka08";
		$database = "aces";

		mysql_connect("$host", "$username", "$password") or die(mysql_error());

		mysql_select_db("$database") or die(mysql_error());
	}
	
	function retrieveKey(){
	
		connectToDatabase();
		
		$sql = 'SELECT encryption_key FROM key';
		$result = mysql_query("$sql") or die(mysql_error());
		
		$row = mysql_fetch_array($result);
		$key = $row['encryption_key'];
		
		mysql_close();
		die();
		return $key;
	}
	
	function registerProfessor(){	
	
		connecToDatabase();

		$key = retrieveKey();
		
		$firstName = encrypt($_POST['firstname'], $key);
		$middleName = encrypt($_POST['middlename'], $key);
		$lastName = encrypt($_POST['lastname'], $key);
		$username = encrypt($_POST['idno'], $key);
		$email = encrypt($_POST['email'], $key);
		$password = $_POST['regpass'], $key);
		$role = encrypt("professor", $key);
		
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