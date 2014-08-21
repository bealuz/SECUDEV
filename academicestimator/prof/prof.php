<?php
    session_start();
    if(!isset($_SESSION['username'])) {
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
    <title>Prof Main</title>

    <!-- Bootstrap -->
    <link rel="icon" href="img/favicon.png" type="image" sizes="16x16">
    <link href="/../academicestimator/css/custombootstrap.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/../academicestimatorjs/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/../academicestimatorjs/bootstrap.js"></script>
</head>
<body>
    <div class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">AcEs</a>

            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="~/PROF/Add">Add Classes</a></li>
            </ul>
            <p class="navbar-text navbar-right">Hi <?php echo $_SESSION['username']; ?> <a href="/../academicestimator/logout.php" class="navbar-link"><span class="glyphicon glyphicon-log-out"></span></a></p>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-10 col-md-offset-1">
                <div class="jumbotron">
                    <h1>Welcome!</h1>
                    <p>You don't have any classes yet.</p>
                    <p><a class="btn btn-primary btn-lg" role="button" href="PROF_ADD.html">Add Classes Now!</a></p>
                </div>

            </div>
        </div>

    </div>
</body>
</html>
