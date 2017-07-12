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
                    <li >
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
                            if(isset($err)){
                                echo "$err";
                                echo "<br>";
                                echo "$fn";
                                echo "<br>";
                                echo "$ln";
                                echo "<br>";
                                
                                
                                
                            }
                                                
                            $questions = "select DISTINCT questionId , question.questionNo as 'num',question.questionDescription as 'des' from question inner join survey using (surveyId) WHERE survey.surveyId = '$s'";
                            
                    
                            if ($result=mysqli_query($ntu_survey, $questions)) {
                                if(mysqli_num_rows($result) > 0) {
                                    while ($row=mysqli_fetch_array($result)){
                                        echo "<form action='editQuestion.php?survey=$s' method='POST' >";
                        ?>   
                        
                                    <div class = "form-group">
                                                                    
                                        <div class="col-md-1">
                                            <label><strong><?php echo "".$row['num'].""; ?> .</strong></label>
                                            <input type="hidden" class="form-control" name="num['<?php echo "" . $row['questionId'] . ""; ?>'][]"  value="<?php echo "" . $row['num'] . ""; ?>">
                                        </div> 
                                        
                                        <div class="col-lg-7">
                                            <input type="hidden" class="form-control" name="q[<?php echo "".$row['questionId'].""; ?>][]" value="<?php echo "" . $row['questionId'] . ""; ?>">
                                            <input type="text" class="form-control" name="q[<?php echo "".$row['questionId'].""; ?>]" value="<?php echo "" . $row['des'] . ""; ?>">
                                            
                                        </div>
                                        <?php
                                            
                                            $temp = $row['questionId'];
                                            
                                            
                                            echo "<div class='col-xs-1'>
                                                     <input type='hidden' name ='delQuestion[][$temp]' value='$temp'> 
                                                     <button type='submit' class='btn btn-primary btn-sm' name ='delQ' ><i class='fa fa-trash-o' aria-hidden='true'></i></button>

                                                </div>";
                                            echo "$temp";
                                            
                                       
                                        echo "<br>";
                                        echo "<br>";
                                        echo "<br>";
                                        
                                        
                                            
                                           
                                            
                                            $choice = $row['questionId'];
                                            $choices = "SELECT questionId, choice.choiceId as 'cId', choice.choiceDescription as 'cD' FROM choice WHERE questionId ='$temp' ";
                                        
                                            $i=0;
                                            $w = 0;
                                                       
                                            
                                            if ($result1=mysqli_query($ntu_survey, $choices)) {
                                                if(mysqli_num_rows($result1)>0){
                                                    while ($row1=mysqli_fetch_array($result1)){ 
                                                        echo "
                                                            <div class='col-lg-8'> 
                                                                <input type='hidden' name='ch[$choice][]' value='" . $row1['cId'] .  "'>
                                                                <input type='text' class='form-control' name='ch[$choice][]' value='" . $row1['cD'] . "'> 
                                                            </div>";
                                                            $i++;
                                                        echo "<br>";
                                                        echo "<br>";
                                                     
                                                    }
                                                    if($i == 4){
                                                        echo "
                                                            <div class='col-lg-8'> 
                                                                <input type='text' class='form-control' name='newChoice[$choice][]'> 
                                                                
                                                                
                                                            </div>";
                                                        
                                                        echo "<br>";
                                                        echo "<br>";
                                                        echo "<br>";
                                                        echo "<br>";
                                                        echo "<br>";
                                                    }else if ($i == 3){
                                                        while($w != 2){
                                                            echo "
                                                            <div class='col-lg-8'> 
                                                                <input type='text' class='form-control'  name='newChoice[$choice][]'>
                                                                
                                                                
                                                            </div>";
                                                            
                                                           
                                                            $w++;
                                                            
                                                        }
                                                        echo "<br>";
                                                        echo "<br>";
                                                        echo "<br>";
                                                        echo "<br>";
                                                        echo "<br>";
                                                        
                                                        
                                                    }else if ($i == 2){
                                                        while($w != 3){
                                                            echo "
                                                            <div class='col-lg-8'> 
                                                                <input type='text' class='form-control'  name='newChoice[$choice][]'>
                                                                
                                                                
                                                                
                                                                
                                                            </div>";
                                                            
                                                            
                                                            $w++;
                                                            
                                                        } 
                                                        echo "<br>";
                                                        echo "<br>";
                                                        echo "<br>";
                                                        echo "<br>";
                                                        echo "<br>";
                                                        
                                                   
                                                   
                                                    } 
                                                    
                                                }
                                            }
                                        ?>
                                                 
                                    </div>
                                   
                       
                                   
                                    
                                    <hr>
                               
                            <?php
                                   
                                   }
                                    
                                     echo "<div class='row'>
                                            <div class='col-lg-10'>
                                                <a href='editSurvey.php?survey=$s'><button type='button' class='btn btn-default btn-lg'>Back</button></a>
                                            </div>
                                            <div class='col-lg-1'>
                                                <button type='submit' class='btn btn-default btn-lg' name='submit' ><strong> Submit Survey </strong></button>
                                                
                                            </div>
                                          </div>";
                                    echo "</form>";
                                    
                                    
                                    if(isset($_POST['submit'])){
                                        
                                        
                                        $q = $_POST['q'];
                                        $updateChoice = $_POST['ch'];
                                        
                                        $newChoice = $_POST['newChoice'];
                                        
                                        
                                        
                                        
                                        
                                       foreach($newChoice as $nc => $v){
     
                                            if($v[0] != null){
                                                
                                                $insert = mysqli_query($ntu_survey, "INSERT into choice (choiceDescription, questionId) VALUES ('$v[0]','$nc')");

                                                if($v[1] != null){

                                                    $insert = mysqli_query($ntu_survey, "INSERT into choice (choiceDescription, questionId) VALUES ('$v[1]','$nc')");

                                                    if($v[2] != null){
                                                            $insert = mysqli_query($ntu_survey, "INSERT into choice (choiceDescription, questionId) VALUES ('$v[2]','$nc')");

                                                    }else{

                                                        header("Location: ../admin/show.php?survey=$s");

                                                    }

                                                }else{
                                                   header("Location: ../admin/show.php?survey=$s");

                                                }
                                            }else{
                                                header("Location: ../admin/show.php?survey=$s");
                                            }
                                                
                                                
                                                next($nc);
                                            
                                        }
                                        
                                        
                                     
                                    
                                    
                                    }

                                       
                                       
                                        
                                }
                            }
                            ?> 
                        
                        
                        
                             <?php
                                 if (isset($_POST['delQ'])) {
                                     $surveyId = $_GET['survey'];

                                     $dQ = $_POST['delQuestion'];
                                     $date = date('Y-m-d H:i:s');

                                     $email = $_SESSION['username'];
                                     $query="SELECT userId from user where email='$email'";                                                          
                                     $result = mysqli_query($ntu_survey, $query);                                                        
                                     $row = $result->fetch_assoc();                                                                
                                     $adminId = $row["userId"];



                                     $queryS="SELECT surveyTitle from survey where surveyId='$surveyId'";
                                     $resultS = mysqli_query($ntu_survey, $queryS); 
                                     $rowS = $resultS->fetch_assoc();
                                     $surveyTitle = $rowS["surveyTitle"];
                                     
                                     $queryD="SELECT questionNo from question where questionId='$temp'";
                                     $resultD = mysqli_query($ntu_survey, $queryD); 
                                     $rowD = $resultD->fetch_assoc();
                                     $qD = $rowD["questionNo"];





                                     $lastNumber ="SELECT questionNo from question natural join survey where surveyId = '$surveyId' order by questionNo desc limit 1";
                                     $fNumber ="SELECT questionNo from question natural join survey where surveyId = '$surveyId' order by questionNo asc limit 1";

                                     $rLN = mysqli_query($ntu_survey, $lastNumber);                                                               
                                     $qLN = $rLN->fetch_assoc();
                                     $ln =  $qLN['questionNo'];

                                     $rFN = mysqli_query($ntu_survey, $fNumber);                                                               
                                     $qFN = $rFN->fetch_assoc();
                                     $fn =  $qFN['questionNo'];
                                     
                                     foreach($dQ as $d ){
                                        
                                
                                            
                                        
                                       
                                        
                                         
                                         
                                     
                                     }
                                   






                                }

                                ?>
                    </div>
                </div>
                <br>
                <br>
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
