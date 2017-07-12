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
                            <?php
                                    $q = $_GET['qId'];
                                
                                    $query = mysqli_query($ntu_survey, "SELECT  questionNo, questionDescription, surveyId FROM question where questionId = '$q'");
                                    $rQ = $query->fetch_assoc();
                                        
                                    $qNo = $rQ['questionNo'];
                                    $s = $rQ['surveyId'];
                                    $des = $rQ['questionDescription'];
                                ?>
                            Survey Name:<strong>
                            <?php
                               
                                $query="SELECT surveyTitle from survey where surveyId='$s'";
                                $result = mysqli_query($ntu_survey, $query);
                                $row = $result->fetch_assoc();
                                $surveyTitle = $row["surveyTitle"];
                                echo "$surveyTitle";
                            ?></strong> 
                        </h1>
                        <ol class="breadcrumb">
                            
                            <li>
                                <i class="fa fa-file-text-o"></i>
                                
                                 <a href="<?php echo "editQuestion.php?survey=$s";?>">Edit Questionnaire</a>
                            </li>
                            <li class="active">
                               <i class="fa fa-plus"></i>  Add Choice!
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add Choice in  Question Number <?php echo "$qNo"; ?>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="row">
                    <div class="col-lg-12">
                       
                        <form action="add.php?qId=<?php echo "$q";?>" method="POST">
                            <div class="row">
                                 <div class="col-lg-8">
                                    <h3><label><strong>Question:</strong></label></h3>
                                    <input type="text" class="form-control" name="des" value="<?php echo "$des";?>">
                                </div>
                            </div>
                           
                            <br>
                            <div class="row">
                                <div class="col-lg-8">
                                    <h3><label><strong>Choices:</strong></label></h3>
                                    <?php

                                        $c = "SELECT choiceId, choiceDescription FROM choice where questionId='$q'";


                                        if($choices= mysqli_query($ntu_survey, $c)){
                                            $i=0;
                                            $w=0;
                                            while($rowC = mysqli_fetch_assoc($choices)){
                                                $ch = $rowC['choiceId'];
                                                
                                                 echo "<input type='text' class='form-control' name=choice[$ch][] value='".$rowC['choiceDescription']."'>";                         echo "<br>";  
                                                    $i++;

                                            }
                                            
                                            if($i == 3 ){
                                               while($w != 2){
                                                   echo "<input type='text' class='form-control' name=newChoice[$q][] '>"; 
                                                   echo "<br>"; 
                                                   $w++;
                                                   
                                               } 
                                                
                                            }else if($i == 2){
                                                while($w != 3){
                                                   echo "<input type='text' class='form-control' name=newChoice[$q][] '>"; 
                                                   echo "<br>"; 
                                                   $w++;
                                               } 
                                                
                                            }else if($i == 4){
                                                echo "<input type='text' class='form-control' name=newChoice[$q][] '>"; 
                                                echo "<br>"; 
                                                
                                            }else{
                                                while($w != 5){
                                                   echo "<input type='text' class='form-control' name=newChoice[$q][] '>"; 
                                                   echo "<br>"; 
                                                   $w++;
                                                   
                                               } 
                                                
                                            }
                                        }

                                   
                                    ?>
                                </div>
                            </div>
                            
                            <div class="row">
                                 <div class='col-lg-11'>
                                    <a href="<?php echo "editQuestion.php?survey=$s";?>"><button type='button' class='btn btn-default btn-lg'>Back</button></a>
                                </div>
                                <div class='col-lg-1'>
                                  <button type='submit' class='btn btn-default btn-lg' name="add"><strong>Add</strong></button>
                                </div>
                                <?php
                                    if(isset($_POST['add'])){
                                        $newChoice = $_POST['newChoice'];
                                        
                                        if(!empty($newChoice)){
                                           
                                            foreach($newChoice as $nC => $valN){
                                                
                                               if($valN[0] != ''){
                                                
                                                    $insert = mysqli_query($ntu_survey, "INSERT into choice (choiceDescription, questionId) VALUES ('$valN[0]','$nC')");

                                                    if($valN[1] != ''){

                                                        $insert = mysqli_query($ntu_survey, "INSERT into choice (choiceDescription, questionId) VALUES ('$valN[1]','$nC')");

                                                        if($valN[2] != ''){

                                                            $insert = mysqli_query($ntu_survey, "INSERT into choice (choiceDescription, questionId) VALUES ('$valN[2]','$nC')");

                                                        }else{

                                                            header("Location: editQuestion.php?survey=$s");

                                                        }

                                                    }else{
                                                       header("Location: editQuestion.php?survey=$s");

                                                    }
                                                }else{
                                                    header("Location: editQuestion.php?survey=$s");
                                                }
                                                
                                                
                                                
                                            }
                                        }
                                        
                                        
                                        
                                    }
                                
                                ?>
                                
                            </div>
                           
                           
                            
                        </form>
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

   

</body>

</html>