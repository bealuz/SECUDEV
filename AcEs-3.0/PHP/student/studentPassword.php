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
    <title>Change Password</title>

    <!-- Bootstrap -->
    <link href="/../academicestimator/css/custombootstrap.css" rel="stylesheet" />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
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
            <p class="navbar-text navbar-right">Hi <?php echo $_SESSION['username']; ?> <a href="~/logout" class="navbar-link"><span class="glyphicon glyphicon-log-out"></span></a></p>
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
                <h3>Change Password</h3>
                @if (IsPost && error)
                {
                    <div class="alert alert-danger">@errormessage</div>
                }
                else if (IsPost)
                {
                    <div class="alert alert-success">@errormessage</div>
                }
                <form method="post">
                    <div class="form-group">
                        <label for="Password">Current Password</label>
                        <input type="password" class="form-control" id="pw" name="oldpass" placeholder="Current Password" required>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="Password">New Password</label>
                        <input type="password" class="form-control" id="pw" name="newpass" placeholder="New Password" required>
                    </div>
                    <div class="form-group">
                        <label for="Password">Confirm Password</label>
                        <input type="password" class="form-control" id="pw" name="confirm" placeholder="Confirm Password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>

        </div>
</body>
</html>