<?php
	session_start();
	if(!isset($_SESSION['username'])) {
		if($_SESSION['role'] != 'student') {
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
    <title>Student Edit Information</title>

    <!-- Bootstrap -->
    <link href="/../academicestimator/css/custombootstrap.css" rel="stylesheet"><!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/../academicestimator/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/../academicestimator/js/bootstrap.js"></script>
    <script src="/../academicestimator/js/validate.js"></script>
</head>
<body>
    <div class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">AcEs</a>

            </div>
            <p class="navbar-text navbar-right">Hi <?php echo $_SESSION['username'];?> <a href="~/Logout" class="navbar-link"><span class="glyphicon glyphicon-log-out"></span></a></p>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 well custom-leftmargin">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="/../academicestimator/student/student.php">Home</a></li>
                        <li><a href="/../academicestimator/student/studentBasicInfo.php">Basic Information</a></li>
                        <li><a href="/../academicestimator/student/studentPassword.php">Change Password</a></li>
                        <li><a href="/../academicestimator/student/studentLearning.php">Learning Style</a></li>
                        <li><a href="/../academicestimator/student/studentGrades.php">Grades</a></li>
                </ul>

            </div>
            <div class="col-md-5 well custom-leftmargin">
                <h3>Personal Information</h3>
                <form method="post">
					<!--
                    <div class="form-group">
                        <label for="Picture">Upload Profile Picture</label>
                        <input type="file" id="Picture" name="uploadfile">
                    </div>
					-->
                    <div class="form-group">
                        <label for="Nickname">Nickname</label>
                        <input type="text" class="form-control" id="Nickname" placeholder="Nickname" name="nickname" required>
                    </div>
                    <div class="form-group">
                        <label for="College">College</label>
                        <input type="text" class="form-control" id="College" placeholder="College" name="College" required>
                    </div>
                    <div class="form-group">
                        <label for="Course">Course</label>
                        <input type="text" class="form-control" id="Course" placeholder="Course" name="Course" required>
                    </div>
                    <div class="form-group">
                        <label for="Contact">Mobile Number</label>
                        <input type="tel" class="form-control" id="Contact" placeholder="Contact Details" name="contact" onkeypress='validate(event)' required />
                    </div>

                    <div class="form-group">
                        <label for="Address">Address</label>
                        <input type="text" class="form-control" id="Address" placeholder="Address" name="Address" required>
                    </div>

                    <div class="form-group">
                        <label for="HS">High School</label>
                        <input type="text" class="form-control" id="HS" placeholder="High School" name="HS" required>
                    </div>

                    <div class="form-group">
                        <label for="CGPA">CGPA</label>
                        <input type="tel" class="form-control" id="CGPA" placeholder="CGPA" name="CGPA" onkeypress='validate(event)' required />
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>
</html>