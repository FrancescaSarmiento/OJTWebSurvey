<?php
    session_start();
    ob_start();
    if ($_SESSION['loggedin'] == false ) {
        header('Location: ../login/index.php');
    }else{
        if($_SESSION['type'] != 'admin'){
            header('Location: ../login/index.php');
        }
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

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>
    <?php

        $ntu_survey = new mysqli("localhost", "root", "", "ntu_survey");
        // Check connection
        if ($ntu_survey->connect_error) {
            die("Connection failed: " . $ntu_survey->connect_error);
        }
    ?>

    <div id="wrapper">

        <!-- Navigation -->
       <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
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
                    <li>
                        <a href="manage.php"><i class="fa fa-fw fa-user"></i>Manage Account</a>
                    </li>
                    <li class="active">
                        <a href="survey.php"><i class="fa fa-fw fa-table"></i> Surveys</a>
                    </li>
                    <li >
                        <a href="create.php"><i class="fa fa-fw fa-edit"></i> Create a Survey!</a>
                    </li>
                    <li >
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
                        <div class="row">        
                            <h1 class="page-header head">
                                Surveys
                            </h1>
                        </div>
                        
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Surveys Made
                            </li>
                        </ol>
                    </div>
                </div>
                
                <!-- /.row -->
<!--
                <div class="row">
                    <div class="col-lg-9">
                    </div>
                    <div class="col-lg-1">
                    </div>
                    <div class="col-sm-2">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                            <button type="submit" class="btn btn-danger btn-lg" name="truncate"><i class='fa fa-trash-o' aria-hidden='true'> </i> CLEAR ALL  </button>
                        </form>
                        <?php 
                            if(isset($_POST['truncate'])){
                                $tableSurvey = mysqli_query($ntu_survey,"TRUNCATE TABLE survey") or die(mysqli_error($ntu_survey));
                                $tableQuestion = mysqli_query($ntu_survey,"TRUNCATE TABLE question") or die(mysqli_error($ntu_survey));
                                $tableChoice = mysqli_query($ntu_survey,"TRUNCATE TABLE choice") or die(mysqli_error($ntu_survey));
                                $tableAnswer = mysqli_query($ntu_survey,"TRUNCATE TABLE answer") or die(mysqli_error($ntu_survey));
                                
                            }
                        ?>
                    </div>
                    
                </div>
-->
                <br>
                
                <div class="row">                    
                    <div class="col-lg-12">
                        
                                 <?php
                                   
                                    $survey="SELECT survey.surveyTitle, CONCAT(firstname,' ',lastname),  ifnull(COUNT(response.surveyId),0), survey.surveyId, survey.status FROM user RIGHT JOIN survey on author = userId LEFT JOIN response using(surveyId) GROUP BY survey.surveyTitle, survey.author, survey.surveyId, survey.status ORDER BY survey.surveyId DESC";
                                    
                                    
                                    
                                    
                                    if ($result=mysqli_query($ntu_survey, $survey)) {
                                        if(mysqli_num_rows($result) > 0) {
                                    ?> 
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 20%;" >Survey Title</th>
                                        <th class="text-center" style="width: 18%;" >Author</th>
                                        <th class="text-center" style="width: 12%;">Number of Responses</th>
                                        <th class="text-center" style="width: 15%;">Analyze Result</th>
                                        <th class="text-center" style="width: 11%;">Status</th>
                                        <th class="text-center" style="width: 5%;">Display</th>
                                        <th class="text-center" style="width: 5%;">Delete</th>
                                        <th class="text-center" style="width: 5%;">Edit</th>
                                        
                                    </tr>
                                </thead>
                        
                                    <?php
                                            while ($row=mysqli_fetch_row($result)) {
                                                $count=$row[2];
                                                echo "<tr>";
                                                echo "<td class='text-center'> $row[0] </td>";
                                                echo "<td class='text-center'> $row[1] </td>";
                                                echo "<td class='text-center'>$row[2] </td>";
                                                
                                    ?>
                                    <?php   
                                                if($count==0){
                                                    echo "<td class='text-center'><form action='survey.php' method='POST'><a href='analyze.php?survey=$row[3]' class='btn btn-primary' role='button' name='analyze' disabled><i class='fa fa-bar-chart' aria-hidden='true'></i></a></form></td>";
                                                    
                                                }else{
                                                    echo "<td class='text-center'><form action='survey.php' method='POST'><a href='analyze.php?survey=$row[3]' class='btn btn-primary' role='button' name='analyze'><i class='fa fa-bar-chart' aria-hidden='true'></i></a></form></td>";
                                                }
                                
                                    ?>
                                    
                                                
                                <?php
                                                echo "<td class='text-center'>$row[4]</td>";
                                                echo "<td class='text-center'><form action='survey.php' method='POST'><a href='show.php?survey=$row[3]' class='btn btn-info' role='button' name='show'><i class='fa fa-file-text-o' aria-hidden='true'></i></a></form></td>";
                                                echo "<td class='text-center'>
                                                        <div class='btn-group'>
                                                           <form action='survey.php' method='POST'>
                                                           
                                                                <input type='hidden' name='sId' value='$row[3]'>
                                                               
                                                               <button type='submit' class='btn btn-danger' name='del'><i class='fa fa-trash-o' aria-hidden='true'></i></button>
                                                                 
                                                               
                                                            </form> 
                                                                
                                                        </div>      
                                                    </td>";
                                                echo "<td class='text-center'>
                                                            <form action='survey.php' method='POST'>
                                                                 
                                                                 <a href='editSurvey.php?survey=$row[3]'><button type='button' class='btn btn-default' name='edit'><i class='fa fa-pencil' aria-hidden='true'></i></button></a>
                                                            </form>
                                                      </td>";
                                                echo "</tr>";
                                                
                                               

                                            }
                                        }else{
                                            
                                            echo "Meow Create";
                                            
                                            
                                        }
                                        if (isset($_POST['del'])) {
                                            $id = $_POST['sId'];
                                            
                                            $date = date('Y-m-d H:i:s');
                                            
                                            $email = $_SESSION['username'];
                                            $query="SELECT userId from user where email='$email'";
                                            $result = mysqli_query($ntu_survey, $query);
                                            $row = $result->fetch_assoc();
                                            $adminId = $row["userId"];

                                            $query="SELECT surveyTitle from survey where surveyId='$id'";   
                                            $result = mysqli_query($ntu_survey, $query);
                                            $row = $result->fetch_assoc();
                                            $s = $row['surveyTitle'];
                                            
                                            $sql ="INSERT INTO surveylog (date, actionSurvey, user) VALUES (CONVERT_TZ('$date', '+00:00', '+8:00'),'Delete Survey  " . $s . "', '$adminId')";

                                            if ($ntu_survey->query($sql) === TRUE){ 
                                                $result = mysqli_query($ntu_survey,"DELETE FROM survey WHERE surveyId='$id'") or die(mysqli_error());
                                                header("Location: ../admin/survey.php");

                                            } else {
                                                echo "Error: " . $sql . "<br>" . $ntu_survey->error;
                                            }
                                         
                                            
                            
                                        }
                                    }
                                     
                        
                                ?>   
                                
                            </table>
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
