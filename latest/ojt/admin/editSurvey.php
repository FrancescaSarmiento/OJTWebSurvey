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
                        <h1 class="page-header head">
                            Edit Survey
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-table"></i>  <a href="survey.php">Surveys Made</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Edit Survey
                            </li>
                        </ol>
                    </div>
                </div>
                
                <!-- /.row -->
               
                <div class="row">
                    <div class="col-lg-12">
                            
                        
                             <?php 
                        
                                $s = $_GET['survey']; 
                                $surveyList = "SELECT surveyTitle, userRequired, status, surveyId FROM survey WHERE surveyId='$s'"; 
                        
                                $numQ = "SELECT count(questionId) 'num' from question natural join survey where surveyId ='$s'";
                                $resultQ = mysqli_query($ntu_survey, $numQ);                                                               
                                $rQ = $resultQ->fetch_assoc();
                                $num = $rQ['num'];
                                
                                if($result=mysqli_query($ntu_survey, $surveyList)){
                                    if(mysqli_num_rows($result) > 0 ){
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<form action='editSurvey.php?survey=$s' method='POST'>";
                                            echo
                                                 "<div class='row'>
                                                     <div class='form-group'>
                                                        <div class='col-lg-6'>
                                                            <label><strong>Survey Title: </strong> <em>".$row['surveyTitle']."</em></label>
                                                            <input type='text' class='form-control' name='title' value='".$row['surveyTitle']."'>
                                                        </div>    
                                                    </div>
                                                </div>";
                                            
                                             echo "<br>";
                                             echo
                                                 "<div class ='row'>
                                                    <div class ='form-group'>
                                                        <div class = 'col-lg-6'>
                                                            <label><strong>User Required: <strong> <em>".$row['userRequired']."</em> </label>
                                                       </div>    
                                                    </div>
                                                 </div>";
                                             echo "<div class = 'col-xs-2'>                                               
                                                    <select class='form-control' name='optU' style='width:auto;'>
                                                        <option disabled value='' selected><center>-------------select an option-------------</center></option>
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select>
                                                 </div>";
                                             echo "<br>";
                                             echo "<br>";
                                             
                                             echo
                                                 "<div class='row'>
                                                    <div class='form-group'>
                                                        <div class='col-lg-6'>
                                                            <label><strong>Survey Status: <strong> <em>".$row['status']."</em> </label>
                                                            
                                                       </div>    
                                                    </div>
                                                 </div>";
                                            echo "<div class = 'col-xs-2'>                                               
                                                    <select class='form-control' name='optS' style='width:auto;'>
                                                        <option disabled value = '' selected><center>-------------select an option-------------</center></option>
                                                        <option>Enable</option>
                                                        <option>Disable</option>
                                                    </select>
                                                </div>";
                                            echo "<br>";
                                            echo "<br>";
                                            echo "<br>";
                                            
                                            ?>
                                             
                                                <div class='row'>
                                                    <div class='col-lg-2' style='text-align:left;'>
                                                    <?php
                                                        if($num == 0){
                                                        echo "<a href='editQuestion.php?survey=".$row['surveyId']."'><button type='button' class='btn btn-default btn-lg ' name='edit' disabled><i class='fa fa-pencil' aria-hidden='true'></i>Edit Questions</button></a>";
                                                    }else{
                                                        echo "<a href='editQuestion.php?survey=".$row['surveyId']."'><button type='button' class='btn btn-default btn-lg' name='edit'><i class='fa fa-pencil' aria-hidden='true'></i>Edit Questions</button></a>";
                                                    }
                                                    
                                                    ?>
                                                    </div>
                                                    <div class='col-lg-1' >
                                                        <a href='<?php echo "addQuestion.php?survey=".$row['surveyId']."" ; ?>'><button type='button' class='btn btn-default btn-lg' name='edit'><i class='fa fa-plus' aria-hidden='true'></i>Add Question</button></a>
                                                    </div>
                                                 </div> 

                                            <br>
                                             
                                            <div class='row'>
                                                <div class='col-lg-10'>
                                                    <a href='survey.php'><button type='button' class='btn btn-default btn-lg'>Cancel</button></a>
                                                </div>
                                                <div class='col-lg-2'>
                                                    <button type='submit' name='submit' class='btn btn-default btn-lg'><strong>Submit</strong></button>
                                                </div>
                                             </div>   
                                            
                                            
                                        <?php
                                            echo "</form>";
                                            
                                            if(isset($_POST['submit'])){
                                                $t = $_POST['title'];
                                                $uR = $_POST['optU'];
                                                $stat = $_POST['optS'];
                                                
                                                
                                                
                                                if($uR == ''){
                                                    
                                                    $sql = "UPDATE survey SET surveyTitle='$t', status='$stat' WHERE surveyId = '$s' ";

                                                    if($ntu_survey->query($sql) === TRUE) {

                                                        $email = $_SESSION['username'];
                                                        $query="SELECT userId from user where email='$email'";
                                                        $result = mysqli_query($ntu_survey, $query);
                                                        $row = $result->fetch_assoc();
                                                        $adminId = $row["userId"];

                                                        $queryR="SELECT surveyTitle from survey where surveyId='$s'";
                                                        $result = mysqli_query($ntu_survey, $queryR);
                                                        $row = $result->fetch_assoc();
                                                        $survey = $row["surveyTitle"];



                                                        $date = date('Y-m-d H:i:s');
                                                        $sql1 = "INSERT INTO surveylog (date, actionSurvey, user) VALUES (CONVERT_TZ('$date', '+00:00', '+8:00'),'Modified Survey Title and Status " . $survey . "', '$adminId')";      
                                                        if($ntu_survey->query($sql1) === TRUE){ 
                                                            header("Location: ../admin/log.php");
                                                        } else {
                                                            echo "Error: " . $sql1 . "<br>" . $ntu_survey->error;
                                                        }

                                                    }
                                                    
                                                }else if($stat == ''){
                                                    $sql = "UPDATE survey SET surveyTitle='$t', userRequired='$uR', status='$stat' WHERE surveyId = '$s' ";

                                                    if($ntu_survey->query($sql) === TRUE) {

                                                        $email = $_SESSION['username'];
                                                        $query="SELECT userId from user where email='$email'";
                                                        $result = mysqli_query($ntu_survey, $query);
                                                        $row = $result->fetch_assoc();
                                                        $adminId = $row["userId"];

                                                        $queryR="SELECT surveyTitle from survey where surveyId='$s'";
                                                        $result = mysqli_query($ntu_survey, $queryR);
                                                        $row = $result->fetch_assoc();
                                                        $survey = $row["surveyTitle"];



                                                        $date = date('Y-m-d H:i:s');
                                                        $sql1 = "INSERT INTO surveylog (date, actionSurvey, user) VALUES (CONVERT_TZ('$date', '+00:00', '+8:00'),'Modified Survey Title and User Required " . $survey . "', '$adminId')";      

                                                        if($ntu_survey->query($sql1) === TRUE){ 
                                                            header("Location: ../admin/log.php");
                                                        } else {
                                                            echo "Error: " . $sql1 . "<br>" . $ntu_survey->error;
                                                        }
                                                    }
                                                        
                                                }else if($uR == ''  && $stat == ''){
                                                    $sql = "UPDATE survey SET surveyTitle='$t' WHERE surveyId = '$s' ";

                                                    if($ntu_survey->query($sql) === TRUE) {

                                                        $email = $_SESSION['username'];
                                                        $query="SELECT userId from user where email='$email'";
                                                        $result = mysqli_query($ntu_survey, $query);
                                                        $row = $result->fetch_assoc();
                                                        $adminId = $row["userId"];

                                                        $queryR="SELECT surveyTitle from survey where surveyId='$s'";
                                                        $result = mysqli_query($ntu_survey, $queryR);
                                                        $row = $result->fetch_assoc();
                                                        $survey = $row["surveyTitle"];



                                                        $date = date('Y-m-d H:i:s');
                                                        $sql1 = "INSERT INTO surveylog (date, actionSurvey, user) VALUES (CONVERT_TZ('$date', '+00:00', '+8:00'),'Modified Survey Title " . $survey . "', '$adminId')";      

                                                        if($ntu_survey->query($sql1) === TRUE){ 
                                                            header("Location: ../admin/log.php");
                                                        } else {
                                                            echo "Error: " . $sql1 . "<br>" . $ntu_survey->error;
                                                        }
                                                    }
                                                    
                                                }else{
                                                    $sql = "UPDATE survey SET surveyTitle='$t', userRequired='$uR', status='$stat' WHERE surveyId = '$s' ";

                                                    if($ntu_survey->query($sql) === TRUE) {

                                                        $email = $_SESSION['username'];
                                                        $query="SELECT userId from user where email='$email'";
                                                        $result = mysqli_query($ntu_survey, $query);
                                                        $row = $result->fetch_assoc();
                                                        $adminId = $row["userId"];

                                                        $queryR="SELECT surveyTitle from survey where surveyId='$s'";
                                                        $result = mysqli_query($ntu_survey, $queryR);
                                                        $row = $result->fetch_assoc();
                                                        $survey = $row["surveyTitle"];



                                                        $date = date('Y-m-d H:i:s');
                                                        $sql1 = "INSERT INTO surveylog (date, actionSurvey, user) VALUES (CONVERT_TZ('$date', '+00:00', '+8:00'),'Modified Survey " . $survey . "', '$adminId')";      

                                                        if($ntu_survey->query($sql1) === TRUE){ 
                                                            header("Location: ../admin/log.php");
                                                        } else {
                                                            echo "Error: " . $sql1 . "<br>" . $ntu_survey->error;
                                                        }

                                                    }
                                                    
                                                }
                                                
                                                

                                            }
                                        }
                                    }
                                }
                                    

                                

                            ?>
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
