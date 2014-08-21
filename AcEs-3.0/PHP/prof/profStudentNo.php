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
                    @foreach (var row in db.Query(GetStudentsQuery, CourseID))
                    {
                        var GetStudentName = db.QuerySingle(selectQueryString, row.StudentID);
                        var StudentListName = "" + GetStudentName.LastName + ", " + GetStudentName.FirstName + " " + GetStudentName.MiddleName;
                        if (row.StudentID == studentID)
                        {
                            <li class="active"><a href="~/Prof/StudentNo/@CourseID/@row.StudentID">@StudentListName</a></li>
                        }
                        else
                        {
                            <li><a href="~/Prof/StudentNo/@CourseID/@row.StudentID">@StudentListName</a></li>
                        }
                    }
                </ul>
            </div>

            <div class="well col-md-7 custom-leftmargin">
                <div style="margin-left:15px;">
                    <div class="row">
                        <div class="col-md-6 "><strong><h2>@StudentName<br>@IDNO<br />@Nickname</h2></strong><br></div>
                        <div class="col-md-2 col-md-offset-2"><img border="0" src="~/img/student/user_icon.png" alt="userpicture" width="200" height="200"></div>
                    </div>

                    <div class="row">
                        <div class=" col-md-3 "><label>College: </label></div>
                        <div class="col-m-6 ">@College<br></div>
                    </div>
                    <div class="row">
                        <div class=" col-md-3 "><label>Course: </label></div>
                        <div class="col-m-6 "> @Course<br></div>
                    </div>
                    <div class="row">
                        <div class=" col-md-3"><label>Mobile Number: </label></div>
                        <div class="col-m-6"> @MobileNumber<br></div>
                    </div>
                    <div class="row">
                        <div class=" col-md-3 "><label>Email Address: </label></div>
                        <div class="col-m-6 "> @email<br></div>
                    </div>
                    <div class="row">
                        <div class=" col-md-3 "><label>High School </label></div>
                        <div class="col-m-6 "> @HighSchool<br></div>
                    </div>
                    <div class="row">
                        <div class=" col-md-3 "><label>CGPA: </label></div>
                        <div class="col-m-6 ">@CGPA<br></div>
                    </div>
                    <div class="row">
                        <div class=" col-md-3 "><label>Learning Style: </label></div>
                        <div class="col-m-6">@LearningStyle<br></div>
                    </div>
                </div>
                

                <hr />
                <h3> Comments: </h3><br>
                @foreach (var row in db.Query(GetCommentQuery, studentID))
                {
                    <div class="form-group medium">
                        <span class="normalText"><strong>@row.Name<small> @row.Subject</small></strong><br /> @row.Comment</span>
                    </div>
                    <hr>
                }
                <form method="post">
                    <div class="row"></div>
                    <textarea class="form-control col-md-12" id="Prereqs" rows="3" cols="20" placeholder="Write a comment" name="Comment" required></textarea>
                    <br />
                    <div class="form-group"><button type="submit" class="btn btn-primary">Send Comment</button></div>
                </form>
            </div>


        </div>

    </div>


</body>
</html>