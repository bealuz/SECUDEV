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
    <link href="/../academicestimator/css/custombootstrap.css" rel="stylesheet">
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
            <p class="navbar-text navbar-right">Hi <?php echo $_SESSION['username']; ?> <a href="~/Logout" class="navbar-link"><span class="glyphicon glyphicon-log-out"></span></a></p>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 well custom-leftmargin">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="/../academicestimator/student/studentBasicInfo.php">Basic Information</a></li>
                    <li><a href="/../academicestimator/student/studentPassword.php">Change Password</a></li>
                    <li><a href="/../academicestimator/student/studentLearning.php">Learning Style</a></li>
                    <li><a href="/../academicestimator/student/studentGrades.php">Grades</a></li>
                </ul>
            </div>
            <div class="col-md-5 well custom-leftmargin">
                <h3>Learning Style</h3>
                <form method="post">
                    <div class="form-group">
                        <br>
                        <input type="checkbox" name="Visual" checked="@(bvisual == 1)"> Visual (Spatial)<br>
                        Visual learners use pictures, images, and spacial understanding. <br><br>
                        <input type="checkbox" name="Aural" checked="@(baural == 1)"> Aural (Auditory-musical)<br>
                        Aural learners use sounds and music. <br><br>
                        <input type="checkbox" name="Verbal" checked="@(bverbal == 1)"> Verbal (Linguistic)<br>
                        Verbal learners use words in both speech and writing. <br><br>
                        <input type="checkbox" name="Physical" checked="@(bphysical == 1)"> Physical (Kinesthetic)<br>
                        Physical learners use body, hands, and sense of touch. <br><br>
                        <input type="checkbox" name="Logical" checked="@(blogical == 1)"> Logical (Mathematical)<br>
                        Logical learners use logic, reasoning, and systems. <br><br>
                        <input type="checkbox" name="Social" checked="@(bsocial == 1)"> Social (Interpersonal)<br>
                        Social learners prefers learning with groups or other people. <br><br>
                        <input type="checkbox" name="Soitary" checked="@(bsolitary == 1)"> Solitary (Intrapersonal)<br>
                        Solitary learners prefers to work by himself and use self-study.
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