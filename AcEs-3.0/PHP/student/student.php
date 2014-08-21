<?php
	session_start();
	if(!isset($_SESSION['username'])) {
		if($_SESSION['role'] == 'student') {
		header('Location: http://localhost/academicestimator/default.html');
		exit;
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Main Page</title>

    <!-- Bootstrap -->
    <link href="/../academicestimator/css/custombootstrap.css" rel="stylesheet" media="screen">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/../academicestimator/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/../academicestimator/js/bootstrap.js"></script>
</head>
<body>
    <div class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">AcEs</a>
            </div>
            <div class="navbar-inverse" role="navigation">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li class=dropdown>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Edit Profile <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/../academicestimator/student/studentBasicInfo.php">Basic Information</a></li>
                            <li><a href="/../academicestimator/student/studentPassword.php">Change Password</a></li>
                            <li><a href="/../academicestimator/student/studentLearning.php">Learning Style</a></li>
                            <li><a href="/../academicestimator/student/studentGrades.php">Grades</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <p class="navbar-text navbar-right">Hi Student <?php echo $_SESSION['username']; ?>! <a href="/../academicestimator/logout.php" class="navbar-link"><span class="glyphicon glyphicon-log-out"></span></a></p>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="well">
					<?php
					
					$con = mysqli_connect('localhost', 'root', '', 'aces');
					$result = mysqli_query($con, "select * from students WHERE username='" . $_SESSION['username'] . "'");
					$row = mysqli_fetch_array($result);
					
					echo '
						<div class="row">
							<div class="col-md-6 col-md-offset-1"><strong><h2>' . $row['name'] . '<br>' . $_SESSION['username'] . '<br />' . $row['nickname'] . '</h2></strong><br></div>
							<div class="col-md-2 col-md-offset-2"><img border="0" src="/../academicestimator/img/student/user_icon.png" alt="userpicture" width="100" height="100"></div>
						</div>';
						
					echo '
                    <div class="row">
                        <div class=" col-md-3 col-md-offset-1"><label>College: </label></div>
                        <div class="col-m-6 col-md-offset-1">' . $row['college'] . '<br></div>
                    </div>';
					
					echo '
                    <div class="row">
                        <div class=" col-md-3 col-md-offset-1"><label>Course: </label></div>
                        <div class="col-m-6 col-md-offset-1">' . $row['course'] . '<br></div>
                    </div>';
					
					echo '
                    <div class="row">
                        <div class=" col-md-3 col-md-offset-1"><label>Mobile Number: </label></div>
                        <div class="col-m-6 col-md-offset-1">' . $row['mobileNo'] . '<br></div>
                    </div>';
					
					echo '
                    <div class="row">
                        <div class=" col-md-3 col-md-offset-1"><label>Email Address: </label></div>
                        <div class="col-m-6 col-md-offset-1">' . $row['email'] . '<br></div>
                    </div>';
					
					echo '
                    <div class="row">
                        <div class=" col-md-3 col-md-offset-1"><label>High School </label></div>
                        <div class="col-m-6 col-md-offset-1">' . $row['highSchool'] . '<br></div>
                    </div>';
					
					echo '
                    <div class="row">
                        <div class=" col-md-3 col-md-offset-1"><label>CGPA: </label></div>
                        <div class="col-m-6 col-md-offset-1">' . $row['cgpa'] . '<br></div>
                    </div>';
					
					echo '
                    <div class="row">
                        <div class=" col-md-3 col-md-offset-1"><label>Learning Style: </label></div>
                        <div class="col-m-6 col-md-offset-1">' . $row['learningStyle'] . '<br></div>
                    </div>';

					echo '<hr />';

                    echo '<h2>Grades</h2><br>';
					
					$result = mysqli_query($con, "select * from grades WHERE username='" . $_SESSION['username'] . "'");
					$row = mysqli_fetch_array($result);
					
					echo '
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Course Code</th>
                                <th>A.Y.</th>
                                <th>Term</th>
                                <th>Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                                    <tr>
                                        <td>' . $row['courseCode'] . '</td>
                                        <td>' . $row['AY'] . '</td>
                                        <td>' . $row['term'] . '</td>
                                        <td>' . $row['grade'] . '</td>
                                    </tr>
                        </tbody>
                    </table>';
					
					mysqli_close($con);
					?>
                </div>

            </div>
        </div>

    </div>

</body>
</html>