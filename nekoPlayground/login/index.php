<?php
    session_start();
     
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Log in now! | NTU Survey </title>
        <link href="style.css" type="text/css" rel="stylesheet" > 
        
    </head>

    
<body >
    <?php

        $ntu_survey = new mysqli("localhost", "root", "", "ntu_survey");
        // Check connection
        if ($ntu_survey->connect_error) {
            die("Connection failed: " . $ntu_survey->connect_error);
        }
    ?>
    <a href="../landing/index.php"><button type="button" class="cancelbtn"><strong>BACK</strong></button></a>
    <div class="container">
        <div class = "loginForm"> 
            <?php
                $err = '';

                if(isset($_POST["login"]) && !empty($_POST["uname"]) && !empty($_POST["psw"])) {
                $username = $_POST["uname"];
                $password = $_POST["psw"];

                $resultR = mysqli_query($ntu_survey, "SELECT * FROM user WHERE email = '$username' AND password = '$password' AND type ='respondent'" );
                $resultA = mysqli_query($ntu_survey, "SELECT * FROM user WHERE email = '$username' AND password = '$password' AND type ='admin' ");
                $resultS = mysqli_query($ntu_survey, "SELECT * FROM user WHERE email = '$username' AND password = '$password' AND type ='supervisor' ");
                                        
                    if(mysqli_num_rows($resultR) > 0) {
                    
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;

                    header("Location: ../respondent/index.php");

                    }else if(mysqli_num_rows($resultA) > 0) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;
                    header("Location: ../admin/index.php"); 

                    }else if(mysqli_num_rows($resultS) > 0) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;
                    header("Location: ../supervisor/index.php"); 

                    }else {
                        $errorMsg = "Incorrect email or password!";
                        mysqli_free_result($resultR);
                        mysqli_free_result($resultA);
                    }
                }
            ?>
                
            <form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
               
                 <div class="container">
                     <label><strong>USERNAME</strong></label>
                     <input type="text" placeholder="Enter Username" name="uname" required>
                     <br>
                     <br>
                     <label><strong>PASSWORD</strong></label>
                     <input type="password" placeholder="Enter Password" name="psw" required>
                     <br>
                     <br>
                     
                     <button type="submit" class="submitbtn" name="login"><strong>LOGIN</strong></button>
                     <hr>

                     <a href="../registration/index.php"><button type="button" class="btn"><strong>Create an account!</strong></button></a>
                                           
                </div>
                
                 <?php
                    if(isset($errorMsg)){
                     echo '<center>'.'<p>'.'<strong>'.$errorMsg.'</strong>'.'</p>'.'</center>';   
                    }
                
                ?>

            </form>
        </div>
	</div>
    
    <script src="script.js"></script>
    
    </body>
</html>