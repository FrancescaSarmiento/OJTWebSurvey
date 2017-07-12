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
<?php
        if (isset($_POST["questionAdd"])){
            $s1= $_GET['survey'];
            $questionId = $_POST['questionId'];
            $questionNo = $_POST['questionNo'];
            $questionDescription = $_POST['questionDescription'];
            
            $choices = array();
            
            $choices[1] = $_POST['c1'];
            $choices[2] = $_POST['c2'];
            $choices[3] = $_POST['c3'];
            $choices[4] = $_POST['c4'];
            $choices[5] = $_POST['c5'];
            
              if($questionNo == '' || $questionDescription == ''){
                
                $msg="Question Number Field or Question Field is empty. Please Enter a value. ";
                
            }else{
                if (empty($choices)) {
    
                     $msg="There are no choices! ";                           
                                                    
                }else if(count($choices) ==1 ){
                    
                    $msg="Insufficient input for choice!";
                }else{
                    $n="SELECT questionNo from question inner join survey using(surveyId) where survey.surveyId='$s1' ORDER BY questionNo DESC LIMIT 1";
                    $r = mysqli_query($ntu_survey, $n);
                    $row1 = $r->fetch_assoc();
                    $number = $row1["questionNo"];

                    if($number ==  0 || $number ==  null ){

                            $number = 0;

                    }

                    if($questionNo == $number){
                        $msg = " ".$questionNo."  is already used!";

                    }else{
                        $sql = "INSERT INTO `question` ( questionNo, questionDescription, surveyId) VALUES ('$questionNo','$questionDescription' , '$s1')";





                        if ($ntu_survey->query($sql) === TRUE) {


                            foreach($choices as $ch => $value ){

                                if($value != ''){
                                    $query="SELECT questionId FROM question WHERE questionNo='$questionNo' ORDER BY questionId DESC";
                                    $result = mysqli_query($ntu_survey, $query) or die($ntu_survey->error);;
                                    $row = $result->fetch_assoc();
                                    $qId = $row["questionId"];

                                    $sql1 = "INSERT into choice (choiceDescription, questionId) VALUES ('$value','$qId')";

                                    if ($ntu_survey->query($sql1) === TRUE) {
                                    } else {
                                        echo "Error: " . $sql1 . "<br>" . $ntu_survey->error;
                                    }

                                }



                            }
                                $msg = "Question has been added successfully!";  

                        } else {
                                echo "Error: " . $sql . "<br>" . $ntu_survey->error;
                        }

                    }
                }
                    
              }
                                            
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
   

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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../landing/index.php" name="Logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            <?php
                                if(isset($_POST['Logout'])) {
                                    $_SESSION['loggedin'] = false;
                                    session_destroy();
                                } 
                             ?>
                        </li>
                    </ul>
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
                        <h1 class="page-header">
                             Add Question!
                        </h1>
                        <ol class="breadcrumb">
                             <?php
                                $s =$_GET['survey'];
                            
                            ?>
                            <li>
                                <i class="fa fa-pencil"></i>  <a href="<?php echo "editSurvey.php?survey=$s";?>">Edit Survey</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Add Question!
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <?php 
                    if(isset($msg)){
                        echo '<p>'.'<strong>'.$msg.'</strong>'.'</p>';
                        
                    }
                ?>
            
            
                <div class="row">
                    
                    <form role="form" method="POST" action="<?php echo "addQuestion.php?survey=$s" ?>">
                        
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <a href="<?php echo "editSurvey.php?survey=$s";?>"><button type="button" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</button></a>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <?php
                                                $surveyId = $_GET['survey'];
                                                $n="SELECT questionNo from question inner join survey using(surveyId) where survey.surveyId='$surveyId' ORDER BY questionNo DESC LIMIT 1";
                                                $r = mysqli_query($ntu_survey, $n);
                                                $row1 = $r->fetch_assoc();
                                                $number = $row1["questionNo"];

                                                if($number ==  0 || $number ==  null ){

                                                        $number = 0 + 1;
                                                        

                                                }else{
                                                    $number++;
                                                }
                                            ?>
                                            <label><h4>Question #: <strong><?php echo "$number"; ?></strong></h4></label>
                                            <input type="hidden" class="form-control" name="questionNo" value="<?php echo "$number"; ?>" >
                                            <input type="hidden" name="surveyId">
                                            <input type="hidden" name="questionId">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="form-group">
                                            <label >Question</label>
                                            <input type="text" class="form-control" name="questionDescription" placeholder="Enter your Question">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <strong><p>Enter the Choices</p></strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="c1" placeholder="Enter a Choice">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="c2" placeholder="Enter a Choice">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="c3" placeholder="Enter a Choice">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="c4" placeholder="Enter a Choice">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="c5" placeholder="Enter a Choice">
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                
                                <div class ="row">
                                    
                                    <div class="col-lg-9">
                                        <button type="submit" class="btn btn-default " name="questionAdd">Add Question </button>
                                    </div>
                                    <div class="col-lg-1">
                                        <?php
                                            if(isset($_POST['surveySubmit'])){
                                                
                                                $email = $_SESSION['username'];
                                                $query="SELECT userId from user where email='$email'";
                                                $result = mysqli_query($ntu_survey, $query);
                                                $row = $result->fetch_assoc();
                                                $userId = $row["userId"];
                                                
                                                $date = date('Y-m-d H:i:s');
                                                $sql1 = "INSERT INTO surveylog (date, actionSurvey, user) VALUES (CONVERT_TZ('$date', '+00:00', '+8:00'),'Added Question for the Survey','$userId')";  
                    
                                                if ($ntu_survey->query($sql1) === TRUE) {
                                                    header("Location:../admin/survey.php");
                                                } else {
                                                    echo "Error: " . $sql1 . "<br>" . $ntu_survey->error;
                                                }
                        
                                                
                                                
                                                
                                            }
                                        ?>
                                        <button type="submit" class="btn btn-default " name="surveySubmit">Submit Survey</button>
                                    </div>
                                </div>  
                        
                            </div>

                        </form>
                       
                

                   
                </div>
                <!-- /.row -->

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
