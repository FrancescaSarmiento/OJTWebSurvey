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
    if(isset($_POST["addQuestion"])) { 
        $email = $_SESSION['username'];
        $query="SELECT userId from user where email='$email'";
        $result = mysqli_query($ntu_survey, $query);
        $row = $result->fetch_assoc();
        $userId = $row["userId"];
        
        
        $surveyTitle = $_POST["title"];
        $user = $_POST["opt"];
        
        
        
        
        $temp =  "SELECT surveyTitle FROM survey WHERE surveyTitle = '$surveyTitle'";
        $rTemp = mysqli_query($ntu_survey, $temp);
        $rowTemp = $result->fetch_assoc();
        $s = $rowTemp["surveyTitle"];
        
        if($s == $surveyTitle){
            $eMsg = "Title is already taken!"; 
            
        }else{
            $sql = "INSERT INTO survey (surveyTitle, userRequired, dateCreated,author) VALUES ('$surveyTitle','$user',now(), '$userId')";                        
            if ($ntu_survey->query($sql) === TRUE){ 
                $_SESSION['surveyTitle'] = $surveyTitle;                           
                    
                $email = $_SESSION['username'];
                $query="SELECT userId from user where email='$email'";
                $result = mysqli_query($ntu_survey, $query);
                $row = $result->fetch_assoc();
                $userId = $row["userId"];
                                                
                $date = date('Y-m-d H:i:s');
                $sql1 = "INSERT INTO surveylog (date, actionSurvey, user) VALUES (CONVERT_TZ('$date', '+00:00', '+8:00'),'Survey Titled ". "$surveyTitle" ." has been Created','$userId')";  
                    
                if ($ntu_survey->query($sql1) === TRUE) {
                    header("Location: ../admin/question.php");
                } else {
                    echo "Error: " . $sql1 . "<br>" . $ntu_survey->error;
                }
                        
                                                
                                                
                                                
                                            
            } else {
                $eMsg = "WARNING! Invalid use of special charaters.";
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
    <link href="css/style.css" rel="stylesheet" type="text/css">

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
                </button>
                <a href="../admin/index.php"><img src="../landing/img/lg.png" class="navbar-brand"></a>
                <a class="navbar-brand branding" href="../admin/index.php">NTU Admin</a>
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
                    <li >
                        <a href="survey.php"><i class="fa fa-fw fa-table"></i> Surveys</a>
                    </li>
                    <li class="active">
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
                        <h1 class="page-header font">
                            Create a Survey!
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Create a Survey!
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
            
            
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" method="POST" action="create.php">
                            <fieldset>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label ><h3>Survey Title<sup>*</sup></h3></label>
                                            <input type="text" class="form-control" name="title" required>
                                            <?php 
                                                if(isset($eMsg)){
                                                    echo '<p class="font error">'.'<strong>'.$eMsg.'</strong>'.'</p>';

                                                }
                                            ?>
                                        </div>
                                         
                                    </div>
                                </div>
                                
                                <div class ="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label ><h3>User Required</h3></label>
                                            <select class="form-control" name="opt">
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                     </div>
                                </div>
                                <br>
                                <br>
                                <div class ="row">
                                    
                                    <div class="col-lg-4">
                                        <button type="submit" class="btn btn-default pass" name="addQuestion">Next Step </button>
                                    
                                    </div>
                                </div> 
                            </fieldset>
                            
                        </form>

                    </div>
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
