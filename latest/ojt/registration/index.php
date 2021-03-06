<?php
    session_start();
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Sign Up Now! | NTU </title>
        <link href="style.css" type="text/css" rel="stylesheet" > 
        
    </head>

    
<body >
    <nav>
        
    </nav>
    
    <?php

        $ntu_survey = new mysqli("localhost", "root", "", "ntu_survey");
        // Check connection
        if ($ntu_survey->connect_error) {
            die("Connection failed: " . $ntu_survey->connect_error);
        }
    ?>
    <div id = "top">
         <a href="../landing/index.php"><button type="button" class="backbtn"><strong>BACK</strong></button></a>
    </div>
    <div class="container">
        <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <fieldset>
                    
                <?php
                    if(isset($_POST["register"])) {        
                        $empnumber = $_POST["empnumber"];
                        $lname = $_POST["lname"];
                        $fname = $_POST["fname"];
                        $email = $_POST["email"];
                        $password = $_POST["password"];
                        $dept = $_POST["dept"];
                        $team = $_POST["team"]; 
                        
                        
                        if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) {
                                echo "The email you have entered is invalid, please try again.";
                        } else {
                        $result = mysqli_query($ntu_survey, "SELECT * FROM user WHERE email = '$email'");
                            if(mysqli_num_rows($result) > 0) {
                                   echo "<div class='err'>Account already exists!</div>";                                        mysqli_free_result($result);
                            } else {
                                if($team == ''){
                                    
                                    $sql = "INSERT INTO user (empNum, lastname, firstname, email, password, department, team) VALUES ('$empnumber','$lname', '$fname', '$email', '$password', '$dept', 'none')";
                                    
                                    if ($ntu_survey->query($sql) === TRUE) {
                                       
                                        $query="SELECT userId from user where email='$email'";
                                        $result = mysqli_query($ntu_survey, $query);
                                        $row = $result->fetch_assoc();
                                        $userId = $row["userId"];
                                        $date = date('Y-m-d H:i:s');
                                        $sql1 = "INSERT INTO activitylog (date, action, user) VALUES (CONVERT_TZ('$date', '+00:00', '+8:00'),'Created Account', '$userId')";      
                                        header("Location: ../login/index.php");
                                    } else {
                                        echo "Error: " . $sql . "<br>" . $ntu_survey->error;
                                    }
                                    
                                }else{
                                    $sql = "INSERT INTO user (empNum, lastname, firstname, email, password, department, team) VALUES ('$empnumber','$lname', '$fname', '$email', '$password', '$dept', '$team')";
                                    if ($ntu_survey->query($sql) === TRUE) {
                                        $query="SELECT userId from user where email='$email'";
                                        $result = mysqli_query($ntu_survey, $query);
                                        $row = $result->fetch_assoc();
                                        $userId = $row["userId"];
                                        $date = date('Y-m-d H:i:s');
                                        $sql1 = "INSERT INTO activitylog (date, action, user) VALUES (CONVERT_TZ('$date', '+00:00', '+8:00'),'Created Account', '$userId')";
                                       
                                        if ($ntu_survey->query($sql1) === TRUE) {
                                            header("Location: ../login/index.php");
                                        } else {
                                            echo "Error: " . $sql1 . "<br>" . $ntu_survey->error;
                                        }
                                        
                                            
                                    } else {
                                        echo "Error: " . $sql . "<br>" . $ntu_survey->error;
                                    }
                                }
                                
                            }
                        }
                    } 
                ?>
                                   
                <label><b>ID Number</b></label>
                <input type="text" placeholder="Enter ID Number" name="empnumber" required>
                    
                <label><b>Lastname</b></label>
                <input type="text" placeholder="Enter Lastname" name="lname" required>
                    
                <label><b>Firstname</b></label>
                <input type="text" placeholder="Enter Firstname" name="fname" required>
                <br>    
                <label><b>E-mail Address</b></label>
                <input type="text" placeholder="Enter E-mail" name="email" required>
                    
                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>
                    
                <label><b>Department</b></label>
                <input type="text" placeholder="Enter your Department" name="dept" required>
                    
                <label><b>Team</b></label><sup><small>&nbsp;&nbsp;&nbsp;&nbsp;note:leave it blank if you don't belong to any team.</small></sup>
                <input type="text" placeholder="Enter your Team" name="team" >
                    
                <button type="submit" class="submitbtn" name="register" ><strong>SIGN UP</strong></button>
                <hr>
                <a href="../login/index.php"><button type="button" class="btn"><strong>Already have an account?</strong></button></a>
                    
                    
            </fieldset>
        </form>
	</div>
    
    <script src="script.js"></script>
    
    </body>
</html>