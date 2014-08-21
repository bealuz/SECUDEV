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
    <link href="/../academicestimator/css/custombootstrap.css" rel="stylesheet">
    <link href="/../academicestimator/css/chart.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/../academicestimator/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/../academicestimator/bootstrap.js"></script>
    <script src="/../academicestimator/js/clickable_row.js"></script>
    <script src="/../academicestimator/js/d3.v3.min.js"></script>
    <script>

        var data = [4, 8, 15, 16, 23, 58];

        var x = d3.scale.linear()
            .domain([0, d3.max(data)])
            .range([0, 420]);

        d3.select(".chart")
          .selectAll("div")
            .data(data)
          .enter().append("div")
            .style("width", function (d) { return x(d) + "px"; })
            .text(function (d) { return d; });

    </script>
</head>
<body>
    <div class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">AcEs</a>

            </div>
            <ul class="nav navbar-nav">
                <li><a href="~/Prof/Manage">Home</a></li>
                <li><a href="~/Prof/Add">Add Classes</a></li>
            </ul>
            <p class="navbar-text navbar-right">Hi @name! <a href="~/logout" class="navbar-link"><span class="glyphicon glyphicon-log-out"></span></a></p>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-3 well custom-leftmargin">
                <ul class="nav nav-pills nav-stacked">
                    @foreach (var row in db.Query(getCourses, username))
                    {
                        if (row.Active == 1)
                        {
                            var course = "" + row.CourseCode + " " + row.Section;
                            if(row.CourseID == Convert.ToInt32(CourseID))
                            { 
                            <li class="active"><a href="Course/@row.CourseID">@course</a></li>
                            }
                            else { 
                            <li><a href="Course/@row.CourseID">@course</a></li>
                            }
                        }
                    }
                </ul>
            </div>

            <div class="col-md-8 well custom-leftmargin">
                <h2>
                    @CourseInfo.CourseCode @CourseInfo.Section
                    <small> @CourseInfo.Days @CourseInfo.TimeFrom - @CourseInfo.TimeTo</small>
                </h2><br>
                <hr>
                <h3>Summary:</h3><br>
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <label>Number of Students:</label>
                        </div>
                        <div class="panel-footer">@count</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <label>Average CGPA:</label>
                        </div>
                        <div class="panel-footer">@AvgCGPA</div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <label>Learning Styles</label>
                        </div>
                        <div class="panel-footer"><div class="chart"></div>
                            <script src="~/js/d3.v3.min.js"></script>
                            <script>

                                var data = [@visual, @aural, @verbal, @physical, @logical, @solitary];

                                var x = d3.scale.linear()
                                    .domain([0, @count])
                                    .range([0, 420]);

                                d3.select(".chart")
                                  .selectAll("div")
                                    .data(data)
                                  .enter().append("div")
                                    .style("width", function (d) { return x(d) + "px"; })
                                    .text(function (d) { return d; });

                            </script></div>
                    </div>
                    
                    
                </div>
                <br />
                <br>
                <br /><br />
                <div class="col-md-6">
                    <h3>Students</h3>
                    <hr />
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID Number</th>
                            <th>Name</th>
                            <th>Nickname</th>
                            <th>High School</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (var row in db.Query(GetStudentsQuery, CourseID))
                        {
                            <tr class="clickableRow" href="~/Prof/StudentNo/@CourseID/@row.StudentID">
                                <td>@row.StudentID</td>
                                @{var GetStudentName = db.QuerySingle(selectQueryString, row.StudentID);
                                var StudentName = "" + GetStudentName.LastName + ", " + GetStudentName.FirstName + " " + GetStudentName.MiddleName;}
                                <td>@StudentName</td>
                                <td>@row.Nickname</td>
                                <td>@row.HighSchool</td>
                            </tr>
                        }
                    </tbody>
                </table>
            </div>



        </div>

    </div>
</body>
</html>