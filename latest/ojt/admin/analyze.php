<?php
    session_start();
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
    $queryAll = "";
    
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
    
    <link href="css/style.css" rel="stylesheet" type="text/css">

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
                    <span class="icon-bar"></span>
                </button>
                <a href="../admin/index.php"><img src="../landing/img/lg.png" class="navbar-brand"></a>
                <a class="navbar-brand" href="../admin/index.php">NTU Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                 <li class="welcomeMessage">
                     <br>
                         
                     <?php
                                $email = $_SESSION['username'];
                                $sql="SELECT firstname, lastname FROM user WHERE email = '$email'";
                                if ($result=mysqli_query($ntu_survey,$sql)){
                                    // Fetch one and one row
                                    while ($row=mysqli_fetch_row($result)){
                                        printf ("%s %s \n",$row[0],$row[1]);
                                    }
                                         // Free result set
                                    mysqli_free_result($result);
                                    }

                    ?>
                    
                </li>
               
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
                <ul class="nav navbar-nav side-nav navigation">
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
                <div class="row font">
                    <div class="col-lg-12">
                        <h1 class="page-header head">
                            Analyze Result
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="survey.php">Survey Made</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Analyze
                            </li>
                        </ol>
                    </div>
                </div>
                
                <!-- /.row -->
                <div class="row font">
                    <div class="col-lg-12">
                       <a href="../admin/survey.php"><button type="button" class="btn btn-default cancel font"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Back</button></a>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">Summary Result of Surveys</h2>
                        <p class="lead"><small>The summary of surveys consists the answers coming from the respondents.</small></p>
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="row">
                    <div class="panel-body">
                                <div class="table-responsive">
                                    
                                    
                                        <?php
                                           
                                            $surveyId = $_GET['survey'];
                                            $query = mysqli_query($ntu_survey, "select DISTINCT questionId , question.questionNo as 'num',question.questionDescription as 'des' from question inner join survey using (surveyId) WHERE survey.surveyId = '$surveyId'");

                                                        $count = mysqli_num_rows($query);
                                                        if($count == 0){
                                                           echo "<center><h3>No result Found!</h3></center>";
                                                            echo mysqli_error($ntu_survey);
                                                        }else{
                                                            while($row = mysqli_fetch_assoc($query)){
                                                                $id = $row['questionId'];
                                                                $questionNo = $row['num'];
                                                                $questionDescription = $row['des'];
                                                                
                                                                
                                                                
                                                                    
                                                                
                                                                
                                            ?>
                                  
                                    
                                      
                                            <?php
                                                             $queryC = mysqli_query($ntu_survey, "SELECT choice.choiceId as 'cId', choice.choiceDescription as 'cD', count(answer.choiceId) 'num' FROM choice LEFT JOIN answer using (choiceId)  WHERE choice.questionId ='$id' GROUP BY cId, cD ");
                                                            
                                                             $countC = mysqli_num_rows($queryC);   
                                                                if($countC > 0){
                                                                    echo " <h3><strong>Question No: $questionNo </strong> <em> $questionDescription</em></h3>";
                                                                    echo"<table class='table table-bordered table-hover table-striped'>
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class='text-center' style='width: 10%;' ><strong>Choice Description</strong></th>
                                                                                    <th class='text-center' style='width: 5%;' ><strong>Count</strong></th>

                                                                                </tr>



                                                                            </thead> ";
                                                                    while($rowC = mysqli_fetch_assoc($queryC)){  
                                                                        $choiceDescription = $rowC['cD'];
                                                                        $num = $rowC['num'];
                                                                        
                                                                       
                                                                            echo "<tr>";
                                                                                
                                                                                echo "<td class='text-center'>$choiceDescription</td>";
                                                                                echo "<td class='text-center'>$num</td>";
                                                                            echo "</tr>";
                                                                            
                                                                        
                                                                        
                                                                        
                                                                        
                                                                    }
                                                                    echo " </table>";
                                                                    echo "<br>";
                                                                    
                                                                    
                                                                }
                                                                
                                                            }
                                                        }
                                        ?>
                                   
                                
                            </div>
                        </div>
                </div>
                <!--/end of data tables -->
                
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

    <!-- Flot Charts JavaScript -->
    <!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/flot/flot-data.js"></script>

</body>

</html>
