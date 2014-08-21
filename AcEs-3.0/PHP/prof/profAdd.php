<?php
	session_start();
	if((!isset($_SESSION['username']) && (!isset($_SESSION['role']) && $_SESSION['role'] != 'professor')) {
		header('Location: http://localhost/academicestimator/default.html');
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add a Class</title>

    <!-- Bootstrap -->
    <link href="/../academicestimator/css/custombootstrap.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/../academicestimator/js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/../academicestimator/js/bootstrap.js"></script>
</head>
<body>
    <div class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">AcEs</a>

            </div>
            <ul class="nav navbar-nav">
                <li><a href="~/PROF/Manage">Home</a></li>
                <li class="active"><a href="#">Add Classes</a></li>
            </ul>
            <p class="navbar-text navbar-right">Hi @name! <a href="~/logout" class="navbar-link"><span class="glyphicon glyphicon-log-out"></span></a></p>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 well">
                @if(IsPost && success)
                {
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Add Class Success!</strong> <a href="~/Prof/Manage">Click here to manage your classes</a>.
                    </div>
                }
                <h2>Add a class</h2>
                <form method="Post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="CourseCode">Course Code</label>
                        <input type="text" class="form-control" id="CourseCode" name="CourseCode" placeholder="Enter Course Code" required>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="Room">Room</label>
                            <input type="text" class="form-control" id="Room" name="Room" placeholder="G***" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Section">Section</label>
                            <input type="text" class="form-control" id="Section" name="Section" placeholder="S**" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ClassList">Upload Class List</label>
                        <input type="file" id="ClassList" name="uploadfile" required>
                        <p class="help-block"><b>NOTE: Only Comma Separated Values (.csv) files are accepted!</b></p>
                        <hr>
                    </div>

                    <div class="control-group">
                        <label for="day-option" class="control-label">Days</label>
                        <div class="controls row" id="day-option">
                            <div class="col-md-2">
                                <label class="checkbox inline" for="M">
                                    <input type="checkbox" id="M" name="mon">Monday
                                </label>
                            </div>
                            <div class="col-md-2">
                                <label class="checkbox inline" for="T">
                                    <input type="checkbox" id="T" name="tue">Tuesday
                                </label>
                            </div>
                            <div class="col-md-2">
                                <label class="checkbox inline" for="W">
                                    <input type="checkbox" id="W" name="wed">Wednesday
                                </label>
                            </div>
                            <div class="col-md-2">
                                <label class="checkbox inline" for="H">
                                    <input type="checkbox" id="H" name="thu">Thursday
                                </label>
                            </div>
                            <div class="col-md-2">
                                <label class="checkbox inline" for="F">
                                    <input type="checkbox" id="F" name="fri">Friday
                                </label>
                            </div>
                            <div class="col-md-2">
                                <label class="checkbox inline" for="S">
                                    <input type="checkbox" id="S" name="sat">Saturday
                                </label>
                            </div>
                        </div>
                    </div>

                        <label class="control-label">Class Time</label>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <input type="time" class="form-control required" id="From" name="from">
                                </div>
                                <div class="col-md-6">
                                    <input type="time" class="form-control required" id="To" placeholder="To" name="to">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <hr>
                            <label for="Prereqs" class="control-label">Pre-requisites</label>
                            <textarea class="form-control" id="Prereqs" rows="3" placeholder="CourseCodes" name="prereqs"></textarea>
                            <p class="help-block">Separate by semi-colon (;)</p>
                        </div>

                        <button type="submit" class="btn btn-primary">Add this class</button>
                </form>

            </div>
        </div>
    </div>
</body>
</html>