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
                </button>
                <a class="navbar-brand" href="../respondent/index.php"><img src="../images/logo.png" alt="logo"></a>
                <a class="navbar-brand" href="../respondent/index.php">NTU Respondent</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li >
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
                            Welcome, 
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
                                        echo '!';
                                    }

                            ?>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                           Surveys Available:
                        </h3>
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="row">                    
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 20%;" >Survey Title</th>
                                        <th class="text-center" style="width: 20%;" >Author</th>
                                        <th class="text-center" style="width: 10%;">Get Started</th>
                                        
                                    </tr>
                                </thead>
                                 <?php
                                    $survey="SELECT surveyId, surveyTitle, CONCAT(firstname,' ',lastname) 'name' FROM user INNER JOIN survey on userId  = author WHERE survey.status = 'Enable' ORDER BY surveyId DESC" ;
                                    
                                    
                                    if ($result=mysqli_query($ntu_survey, $survey)) {
                                        if(mysqli_num_rows($result) > 0) {
                                            while ($row=mysqli_fetch_assoc($result)) {
                                                echo "<tr>";
                                                echo "<td class='text-center'>" .$row['surveyTitle']. " </td>";
                                                echo "<td class='text-center'> ". $row['name'] ." </td>";
                                                
                                                
                                ?> 
                                <?php
                                                $id = $row['surveyId'];
                                                $count="SELECT COUNT(surveyId) from response inner join user using (userId) where user.userId = ";
                                                $email = $_SESSION['username'];
                                                $queryU="SELECT userId from user where email='$email'";                                                          
                                                $resultU = mysqli_query($ntu_survey, $queryU);                                                        
                                                $rowU = $resultU->fetch_assoc();                                                                
                                                $userId = $rowU["userId"];
                                                
                                                
                                            
                                                $count="SELECT IFNULL(COUNT(surveyId), 0) 'c' from response inner join user using (userId) where user.userId ='$userId' and surveyId = '$id' ";
                                                $resultC = mysqli_query($ntu_survey, $count);                                                        
                                                $rowC = $resultC->fetch_assoc(); 
                                                $c = $rowC['c'];
                                                
                                                
                                                
                                                if($c == 0 ){
                                                    echo "<td class='text-center'><a href='answer.php?surveyid=" .$row['surveyId']. "' class='btn btn-success' role='button'>Answer Survey</a></td>"; 
                                                    
                                                    
                                                }else{
                                                   echo "<td class='text-center'><a href='preview.php?surveyid=" .$row['surveyId']. "' class='btn btn-primary' role='button'>Preview Survey</a></td>"; 
                                                }
                                               
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
