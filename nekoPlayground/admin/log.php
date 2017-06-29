<?php
    session_start();
    if ($_SESSION['loggedin'] == false ) {
    header('Location: ../login/index.php');
    } 
?>
<?php

        $ntu_survey = new mysqli("localhost", "root", "", "ntu_survey");
        // Check connection
        if ($ntu_survey->connect_error) {
            die("Connection failed: " . $ntu_survey->connect_error);
        }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NTU | Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">
    
    <link href="css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
       <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="../admin/index.php"><img src="../landing/img/lg.png" class="navbar-brand"></a>
                <a class="navbar-brand" href="../admin/index.php">NTU Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="../landing/index.php" name="Logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    <?php
                        if(isset($_POST['Logout'])) {
                            $_SESSION['loggedin'] = false;
                            session_destroy();
                                    
                        } 
                    ?>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li >
                        <a href="manage.php"><i class="fa fa-fw fa-user"></i>Manage Account</a>
                    </li>
                    <li >
                        <a href="survey.php"><i class="fa fa-fw fa-table"></i> Surveys</a>
                    </li>
                    <li >
                        <a href="create.php"><i class="fa fa-fw fa-edit"></i> Create a Survey!</a>
                    </li>
                    <li class="active">
                        <a href="log.php"><i class="fa fa-fw fa-history"></i> Activity Log</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header head">
                            Activity Log
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-history"></i> Activity Log
                            </li>
                        </ol>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <ul  class="nav nav-tabs  ">
                            <li class="active" > <a href="#account" data-target="#account" data-toggle="tab"><strong>Account Log</strong></a>  </li>
                            <li  ><a  href="#survey" data-target="#survey" data-toggle="tab"><strong>Survey Log</strong></a> <li>  
                        </ul> 
                        <div class="tab-content clearfix">
                            <div class="tab-pane fade in active" id="account">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" style="width: 20%;" ><strong>Date and Time</strong></th>
                                                    <th class="text-center" style="width: 20%;" ><strong>Action</strong></th>
                                                    <th class="text-center" style="width: 15%;" ><strong>Made By</strong></th>
                                                    


                                                </tr>
                                            </thead>
                                            <?php

                                                $logA="SELECT date, action, CONCAT(firstName,' ',lastName) 'admin' FROM activitylog inner join  user on user = userId ORDER BY date";

                                                if ($result=mysqli_query($ntu_survey, $logA)) {
                                                    if(mysqli_num_rows($result) > 0) {
                                                       while ($row=mysqli_fetch_assoc($result)) {
                                                            echo "<tr>";
                                                            echo "<td class='text-center'>".$row['date']."</td>";
                                                            echo "<td class='text-center'>".$row['action']."</td>";
                                                           
                                                            echo "<td class='text-center'>".$row['admin']."</td>";
                                                            echo "</tr>";
                                                        }
                                                    }
                                                }

                                            ?>
                                        </table>
                                    </div>
                                </div>
                               
                            </div>
                            
                            <div class="tab-pane fade  "id="survey">
                                 <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" style="width: 20%;" ><strong>Date and Time</strong></th>
                                                    <th class="text-center" style="width: 20%;" ><strong>Action</strong></th>
                                                    <th class="text-center" style="width: 15%;" ><strong>Made By</strong></th>
                                                    


                                                </tr>
                                            </thead>
                                            <?php

                                                $logS="SELECT date, actionSurvey, CONCAT(firstName,' ',lastName) 'admin' FROM surveylog inner join  user on user = userId ORDER BY date";

                                                if ($result=mysqli_query($ntu_survey, $logS)) {
                                                    if(mysqli_num_rows($result) > 0) {
                                                       while ($row=mysqli_fetch_assoc($result)) {
                                                            echo "<tr>";
                                                            echo "<td class='text-center'>".$row['date']."</td>";
                                                            echo "<td class='text-center'>".$row['actionSurvey']."</td>";
                                                            echo "<td class='text-center'>".$row['admin']."</td>";
                                                            echo "</tr>";
                                                        }
                                                    }
                                                }

                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
