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





<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NTU | ADMIN</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

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
                 <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             Edit Questionnaire
                        </h1>
                        <ol class="breadcrumb">
                            
                            <li>
                                <i class="fa fa-file-text-o"></i>
                                <?php
                                     $surveyId = $_GET['survey'];
                                ?>
                                 <a href="<?php echo "show.php?survey=$surveyId";?>">Survey Preview</a>
                            </li>
                            <li class="active">
                               <i class="fa fa-pencil"></i>   Edit Questionnaire
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Survey Name:<strong>
                            <?php
                               
                                $query="SELECT surveyTitle from survey where surveyId='$surveyId'";
                                $result = mysqli_query($ntu_survey, $query);
                                $row = $result->fetch_assoc();
                                $surveyTitle = $row["surveyTitle"];
                                echo "$surveyTitle";
                            ?></strong> 
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="row">
                    <div class="col-lg-12">
                        
                        
                        <?php
                            
                                                
                            $questions = "select questionId , question.questionNo as 'num',question.questionDescription as 'des' from question inner join survey using (surveyId) WHERE survey.surveyId = '$surveyId'";
                        
                             
                            
                        
                            if ($result=mysqli_query($ntu_survey, $questions)) {
                                if(mysqli_num_rows($result) > 0) {
                                    echo "<h3 class='page-header'>Edit Questions:</h3>";
                                    echo "<form action='editQuestion.php?survey=$surveyId' method='POST' >";
                                    while ($row=mysqli_fetch_array($result)){
                                        
                                        
                        ?>          
                                    <div class="row">
                                        <div class="col-lg-12">
                                            
                                            <div class ='form-group'>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                    <h4><label><strong><?php echo "" . $row['num'] . ""; ?> .</strong> <?php echo "" . $row['des'] . ""; ?> </label></h4>
                                                
                                                    </div>
                                                    <div class="col-lg-3">
                                                    <a href="edit.php?qId=<?php echo "".$row['questionId']."";?>" ><button type="button" class="btn btn-basic " ><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                                    
                                                    <input type="text" name='id[<?php echo "" . $row['questionId'] . "";?>]' value="<?php echo "" . $row['questionId'] . "";?>">    
                                                    <button type="submit" class="btn btn-danger" name="del"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                    
                                                    </div>
                                                    
                                                    
                                                    
                                                </div>
                                                <div class="row">
                                                <?php
                                                   
                                                    $temp = $row['questionId'];
                                                    $description =$row['des'];
                                                    $choices = "SELECT choice.choiceId as 'cId', choice.choiceDescription as 'cD' FROM choice WHERE questionId ='$temp' ";
                                                    $i=0;
                                                    if ($result1=mysqli_query($ntu_survey, $choices)) {
                                                        while ($row1=mysqli_fetch_array($result1)){ 
                                                            
                                                            
                                                            echo "<div class='col-lg-8'><input type='radio' name='choice' value='" . $row1['cId'] .  "'>" . $row1['cD'] . " </input></div>";
                                                            echo "<br>";
                                                            
                                                            $i++;
                                                            
                                                        }
                                                        
                                                       
                                                    }
                                                
                                             ?>
                                               <br>
                                                
                                                <?php
                                                        if($i < 5 ){
                                                            echo  "<div class='col-lg-1'><a href='add.php?qId=".$row['questionId']."' ><button type='button' class='btn btn-primary btn-sm '><i class='fa fa-plus' aria-hidden='true'></i>Add Choice</button></a></div>";
                                                             echo "<br>";
                                                        }
                                            
                                                    echo"</div>";
                                                    echo "<br>";
                                                    echo "<hr>";
                                                    
                                                }
                                                
                                                
                                            ?>
                                                
                                                </div>
                                                
                                                
                                                

                                            </div>
                                        </div>
                                    </div>
                            
                               
                            <?php
                               
                                     
                                echo "<br>";  
                                echo "<br>";
                                echo "<div class='row'>
                                        <div class='col-lg-11'>
                                            <a href='survey.php'><button type='button' class='btn btn-default btn-lg'>Back</button></a>
                                        </div>
                                        <div class='col-lg-1'>
                                            <a href='show.php?survey=$surveyId'><button type='button' class='btn btn-default btn-lg'><strong> Done </strong></button></a>
                                        </div>
                                     </div>";  
                                                      
                                echo "</form>";
                                     
                                }
                            
                                    
                                    
                                
                            }
                            ?>  
                            <?php
                                if(isset($_POST['del'])){

                                    $idQ = $_POST['id'];
                                    
                                    foreach($idQ as $qId => $valQ){
                                        $newQ =$valQ;
                                        
                                        
                                        
                                        
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