<?php
    session_start();
    ob_start();

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


<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NTU | Respondent</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                </button>
                
                <a class="navbar-brand" href="../respondent/index.php"><img src="../images/logo.png" alt="logo"></a>
                <a class="navbar-brand" href="../respondent/index.php">NTU Respondent</a>
                
                
                
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
                                        <h5 class="media-heading"><strong>Noy Aquino</strong>
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
                                        <h5 class="media-heading"><strong>Rody Duterte</strong>
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
                                        <h5 class="media-heading"><strong>Ed Sheeran</strong>
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
                            <a href="#">New Surveys!<span class="label label-default">5</span></a>
                        </li>
                        <li>
                            <a href="#">Your profile<span class="label label-primary">17</span></a>
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
                                    
                        } 
                    ?>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
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
                            Survey Name:<strong>
                            <?php
                                
                                $surveyId = $_GET['survey'];
                            
                                $queryS="SELECT surveyTitle from survey where surveyId='$surveyId'";                                                          
                                $resultS = mysqli_query($ntu_survey, $queryS);                                                        
                                $rowS = $resultS->fetch_assoc();                                                                
                                $surveyTitle = $rowS["surveyTitle"];
                                echo $surveyTitle;
                            ?></strong> 
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="row">
                    <div class="col-lg-12">
                        
                        <?php
                                                
                            $questions = "select DISTINCT questionId , question.questionNo as 'num',question.questionDescription as 'des' from question inner join survey using (surveyId) WHERE survey.surveyId = '$surveyId'";
                        
                             
                            
                        
                            if ($result=mysqli_query($ntu_survey, $questions)) {
                                if(mysqli_num_rows($result) > 0) {
                                    echo "<h3 class='page-header'>
                                           Answer Questions:
                                        </h3>";
                                    while ($row=mysqli_fetch_array($result)){
                                        echo "<form action='editAnswer.php?survey=$surveyId' method='POST' >";
                        ?>            
                                    <div class ='form-group'>
                                        <label><strong><?php echo "" . $row['num'] . ""; ?> .</strong> <?php echo "" . $row['des'] . ""; ?> </label>
                                        <br>
                                        <?php
                                            $email = $_SESSION['username'];
                                            $queryU="SELECT userId from user where email='$email'";                                                          
                                            $resultU = mysqli_query($ntu_survey, $queryU);                                                        
                                            $rowU = $resultU->fetch_assoc();                                                                
                                            $userId = $rowU["userId"];
                                           
                                            $temp = $row['questionId'];
                                            $choice = $row['questionId'];
                                            $choices = "SELECT questionId, choice.choiceId as 'cId', choice.choiceDescription as 'cD' FROM choice WHERE questionId ='$temp' ";
                                        
                                        
                                            $res = mysqli_query($ntu_survey, "SELECT answer.choiceId 'id' , choiceDescription as 'cD' FROM choice inner join answer using (choiceId) inner join response using (responseId) where choice.questionId = '$temp' and userId = $userId"); 
                                        
                                            $rowR = $res->fetch_assoc();
                                            
                                            $r = $rowR['cD'];
                                            $resId = $rowR['id'];
                                            
                                            if ($result1=mysqli_query($ntu_survey, $choices)) {
                                                while ($row1=mysqli_fetch_array($result1)){ 
                                                    
                                                    if($resId == $row1['cId'] ){
                                                        echo "<div class='col-lg-8'><input type='radio' checked='true' name='choice[$choice][]' value='" . $row1['cId'] .  "'>" . $row1['cD'] . " </input></div>";  
                                                    }else{
                                                        echo "<div class='col-lg-8'><input type='radio' name='choice[$choice][]' value='" . $row1['cId'] .  "'>" . $row1['cD'] . " </input></div>"; 
                                                    }
                                                     
                                                   
                                                    echo "<br>";
                                                    
                                                    
                                                    
                                                }
                                            }
                                        ?>
                                                 
                                    </div>
                               
                            <?php
                                
                                   }
                                echo "<br>";
                                echo "<div class='row'>
                                        <div class='col-lg-10'>
                                            <a href='../respondent/index.php'><button type='button' class='btn btn-default btn-lg'>Back</button></a>
                                        </div>
                                        <div class='col-lg-1'>
                                            <button type='submit' class='btn btn-default btn-lg' name='submit' ><strong> Done Survey </strong></button>
                                        </div>
                                     </div>";
                                echo "</form>";
                                }else{
                                    echo "<div class='row'>
                                            <div class='col-lg-10'>
                                                <a href='../respondent/index.php'><button type='button' class='btn btn-default btn-lg'>Back</button></a>
                                            </div>
                                         </div>";
                                    echo "<br>";
                                    echo "<center><h3>There are no Questions!</h3></center>";
                                   
                                   
                                }
                            }
                            ?> 
                        
                            <?php
                               
                                
                                if(isset($_POST['submit'])){
                                    
                                    $ch = $_POST['choice'];
                                   
                                    
                                    $rId = "SELECT responseId FROM `response` inner join user using(userId) WHERE userId ='$userId' ORDER BY responseId DESC LIMIT 1 ";
                                    $resultResId = mysqli_query($ntu_survey, $rId);                                                        
                                    $rowResId = $resultResId->fetch_assoc();                                                                
                                    $resId = $rowResId["responseId"];
                                    
                                    
                                    foreach($ch as $c => $values){
                                        $sql = "UPDATE answer SET choiceId='$values[0]' WHERE questionId = '$c'";      
                                            
                                        if ($ntu_survey->query($sql) === TRUE){

                                            $date = date('Y-m-d H:i:s');
                                            $sql1 = "INSERT INTO surveylog (date, actionSurvey, user) VALUES (CONVERT_TZ('$date', '+00:00', '+8:00'),'Re-Answered Survey Titled "."$surveyTitle"." ','$userId')";  

                                            if ($ntu_survey->query($sql1) === TRUE) {
                                                header("Location: ../respondent/index.php");
                                            } else {
                                                echo "Error: " . $sql1 . "<br>" . $ntu_survey->error;
                                            }

                                        } else {
                                            echo "Error: " . $sql . "<br>" . $ntu_survey->error;
                                        }

                                    }
                                    
                                    
                                }
                               
                            ?>
                             
                            
                    
                       
                    </div>
                </div>
                <!--End of answer field -->
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

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>