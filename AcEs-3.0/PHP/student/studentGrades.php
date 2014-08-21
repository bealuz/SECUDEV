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
            <div class="col-md-7 well custom-leftmargin">
                <h3>Add Grades</h3><br>
                @if (IsPost)
                {
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>@errormessage<a href="~/Student">Click here to view your grades</a>.</strong>
                    </div>
                }
                <form method="post">
                    <div id="gradesRow">
                        <div style="margin-left:15px;">
                            <div class="row">
                                <div class="col-md-1"><label for="AY">A.Y.</label></div>
                                <div class="col-m-6">
                                    <select style="width:20%;" name="Year">
                                        <option value="blank"></option>
                                        <option value="2011-12">2011-12</option>
                                        <option value="2012-13">2012-13</option>
                                        <option value="2013-14">2013-14</option>
                                    </select>
                                    <br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"><label for="Term">Term</label></div>
                                <div class="col-m-6">
                                    <select style="width:20%;" name="Term">
                                        <option value="blank"></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                    <br>
                                </div>
                            </div>
                        </div>

                        <hr />
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="Course Code">Course Code</label>
                                <input type="text" class="form-control" id="courseCode1" placeholder="Course Code" name="courseCode1" required>
                                <input type="text" class="form-control" id="courseCode2" placeholder="Course Code" name="courseCode2">
                                <input type="text" class="form-control" id="courseCode3" placeholder="Course Code" name="courseCode3">
                                <input type="text" class="form-control" id="courseCode4" placeholder="Course Code" name="courseCode4">
                                <input type="text" class="form-control" id="courseCode5" placeholder="Course Code" name="courseCode5">
                                <input type="text" class="form-control" id="courseCode6" placeholder="Course Code" name="courseCode6">
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="Grade">Grade</label>
                                <input type="text" class="form-control" id="grade1" placeholder="Grade" name="grade1" required>
                                <input type="text" class="form-control" id="grade2" placeholder="Grade" name="grade2">
                                <input type="text" class="form-control" id="grade3" placeholder="Grade" name="grade3">
                                <input type="text" class="form-control" id="grade4" placeholder="Grade" name="grade4">
                                <input type="text" class="form-control" id="grade5" placeholder="Grade" name="grade5">
                                <input type="text" class="form-control" id="grade6" placeholder="Grade" name="grade6">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>

</body>
</html>
