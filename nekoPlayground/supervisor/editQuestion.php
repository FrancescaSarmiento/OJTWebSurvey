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
 <?php
 if (isset($_POST['delQ'])) {
     $surveyId = $_GET['survey'];
     
     $id = $_POST['sId'];
     $date = date('Y-m-d H:i:s');
                                                                
     $email = $_SESSION['username'];
     $query="SELECT userId from user where email='$email'";                                                          
     $result = mysqli_query($ntu_survey, $query);                                                        
     $row = $result->fetch_assoc();                                                                
     $adminId = $row["userId"];
     
     

                                                                
     $q="SELECT questionNo from question where questionId='$id'";                                                                  
     $result1 = mysqli_query($ntu_survey, $q);                                                               
     $qR = $result1->fetch_assoc();
     $qNo = $qR['questionNo'];
     
     $queryS="SELECT surveyTitle from survey where surveyId='$surveyId'";
     $resultS = mysqli_query($ntu_survey, $queryS);
     $rowS = $resultS->fetch_assoc();
     $surveyTitle = $rowS["surveyTitle"];

                                                                
     $sql ="INSERT INTO surveylog (date, actionSurvey, user) VALUES (CONVERT_TZ('$date', '+00:00', '+8:00'),'Delete question number  " . $qNo . " in ". $surveyTitle ."', '$adminId')";

                                                                
     if ($ntu_survey->query($sql) === TRUE){ 
                                                                   
         $result = mysqli_query($ntu_survey,"DELETE FROM question WHERE questionId='$id'") or die(mysqli_error());
                                                               
     } else {
                                                                        
         echo "Error: " . $sql . "<br>" . $ntu_survey->error;
                                                                
                                                               
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
                            session_destroy(); 
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
                    <li class="active">
                        <a href="survey.php"><i class="fa fa-fw fa-table"></i> Surveys</a>
                    </li>
                    <li >
                        <a href="create.php"><i class="fa fa-fw fa-edit"></i> Create a Survey!</a>
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
                            Edit Question
                        </h1>
                        <ol class="breadcrumb">
                            <?php
                                $s =$_GET['survey'];
                            
                            ?>
                            <li>
                                <i class="fa fa-pencil"></i>  <a href="<?php echo "editSurvey.php?survey=$s";?>">Edit Survey</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-pencil"></i> Edit Question
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                       <?php
                           $surveyId = $_GET['survey'];
                            
                                                
                            $questions = "select DISTINCT questionId as 'idQ' , question.questionNo as 'num',question.questionDescription as 'des' from question inner join survey using (surveyId) WHERE survey.surveyId = '$surveyId'";
                        
                             
                            
                        
                            if ($result=mysqli_query($ntu_survey, $questions)) {
                                if(mysqli_num_rows($result) > 0) {
                                    while ($row=mysqli_fetch_array($result)){
                                        echo "<form action='editQuestion.php?survey=$surveyId' method='POST' >";
                                        
                        ?>            
                                        <div class='row'>
                                            <div class="col-lg-12">
                                                
                                                <div class ="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label>Question #: </label>
                                                            <input type='text' class='form-control' name= 'num' value='<?php echo "" . $row['num'] . ""; ?>'>
                                                        </div>

                                                        <div class="col-lg-7">
                                                            <label>Question:</label>
                                                            <input type='text' class='form-control' name='des' value='<?php echo "" . $row['des'] . ""; ?>'>  
                                                        </div>
                                                        
                                                        <div class="col-lg-1">
                                                            <form action = "<?php echo "editQuestion.php?survey=$surveyId"; ?>" method='POST'>
                                                           
                                                                <input type='hidden' name='sId' value=' <?php echo "" . $row['idQ'] .""; ?> ' >
                                                               
                                                               <button type='submit' class='btn btn-default btn-lg' name='delQ'><i class='fa fa-trash-o' aria-hidden='true'></i></button>
                                                            </form> 
                                                        </div>
                                                       
                                                    </div>
                                                    
                                                    
                                                    
                                                    <br>
                                                    <br>

                                                    <?php
                                                        $temp = $row["idQ"];
                                                        $choices = "SELECT choice.choiceId as 'cId', choice.choiceDescription as 'cD' FROM choice WHERE questionId ='$temp' ";
                                                        $count = "SELECT count(choice.choiceId) FROM choice WHERE questionId ='$temp' ";
                                                        $query =mysqli_query($ntu_survey,$count);
                                                        $r = mysqli_fetch_row($query);
                                                       
                                                        
                                                        if ($result1=mysqli_query($ntu_survey, $choices)) {
                                                            echo "<label>Choices:</label>";
                                                            
                                                            
                                                            while ($row1=mysqli_fetch_array($result1)){ 
                                                                echo "<div class='form-group'>
                                                                    <div class='col-lg-8'>
                                                                    <input type='text'class='form-control' value='" . $row1['cD'] . "'>
                                                                    <input type='hidden' name='choice' value='" . $row1['cId'] . "'> 
                                                                    </div></div>";

                                                                echo "<br>";
                                                                    
                                                            }
                                                            
                                                        }
                                                    ?>

                                                </div>
                                                
                                            </div>

                                        </div>
                                        <br>
                                    
                               
                            <?php
                                       
                                   }
                                    echo "<div class='row'>
                                            <div class= 'col-lg-11'>
                                                <a href='editSurvey.php?survey=$surveyId'><button type='button' class='btn btn-default btn-lg'  name='done'> Cancel </button></a>
                                            </div>
                                            
                                            <div class= 'col-lg-1'>
                                                <button type='submit' class='btn btn-default btn-lg'  name='done'> Submit</button>
                                            </div>
                                            
                                         </div>";
                                     
                                    echo "</form>";
                                    
                                    if(isset($_POST['done'])){
                                        
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
