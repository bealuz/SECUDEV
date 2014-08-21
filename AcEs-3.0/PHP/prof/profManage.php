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
    <title>Prof Manage Class</title>

    <!-- Bootstrap -->
    <link href="/../academicestimator/css/custombootstrap.css" type="txt/css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/../academicestimator/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/../academicestimator/js/bootstrap.js"></script>
    <script src="/../academicestimator/js/clickable_row.js"></script>
</head>
<body>
    <div class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">AcEs</a>

            </div>
            <ul class="nav navbar-nav">
                <li><a href="#">Home</a></li>
                <li><a href="~/PROF/Add">Add Classes</a></li>
            </ul>
            <p class="navbar-text navbar-right">Hi @name <a href="~/logout" class="navbar-link"><span class="glyphicon glyphicon-log-out"></span></a></p>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 well">
                <h2>Manage Classes</h2>
                <hr />
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Course Code</th>
                            <th>Section</th>
                            <th>Day</th>
                            <th>Time</th>
                            <th>Room</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (var row in db.Query(getCourses, username))
                        {
                            if (row.Active == 1)
                            {
                                <tr class="clickableRow" href="Course/@row.CourseID">
                                    <td>@row.CourseCode</td>
                                    <td>@row.Section</td>
                                    <td>@row.Days</td>
                                    <td>@row.TimeFrom - @row.TimeTo</td>
                                    <td>@row.Room</td>
                                </tr>
                            }
                        }
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>
</html>