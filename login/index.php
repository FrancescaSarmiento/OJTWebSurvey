<?php
    session_start();
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Log in now! | NTU Intern </title>
        <link href="style.css" type="text/css" rel="stylesheet" >    
    </head>

    
<body>
    <?php

        $ntu_survey = new mysqli("localhost", "root", "", "ntu_survey");
        // Check connection
        if ($ntu_survey->connect_error) {
            die("Connection failed: " . $ntu_survey->connect_error);
        }
    ?>
    <div class="container">
        <div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
                                <h1>LOG IN</h1>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-5">
                                <?php
                                    $err = '';

                                    if(isset($_POST["login"]) && !empty($_POST["uname"]) && !empty($_POST["psw"])) {
                                        $username = $_POST["uname"];
                                        $password = $_POST["psw"];

                                        $result = mysqli_query($ntu_survey, "SELECT * FROM user WHERE email = '$username' AND password = '$password'");
                                        
                                        if(mysqli_num_rows($result) > 0) {
                                            $_SESSION['loggedin'] = true;
                                            $_SESSION['username'] = $email;
                                            header("Location: ../admin/index.php");
                                            
                                        } else if ($username == "admin" && $password == "ntusurvey101") {
                                            $_SESSION['loggedin'] = true;
                                            $_SESSION['username'] = "admin";
                                            header("Location: ../admin/index.php"); 
                                        }else {
                                            echo "<div class='err'> Incorrect email or password! </div>";
                                            mysqli_free_result($result);
                                        }
                                    }
                                ?>
				                <form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

                                    <div class="container">
                                        <label><b>Username</b></label>
                                        <input type="text" placeholder="Enter Username" name="uname" required>

                                        <label><b>Password</b></label>
                                        <input type="password" placeholder="Enter Password" name="psw" required>
                                        
                                        <a href="../landing/index.php"><button type="button" class="cancelbtn">Cancel</button></a>
                                        <button type="submit" class="submitbtn" name="login">Login</button>
                                        
                                    </div>

                                </form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    
    <script src="script.js"></script>
    
    </body>
    </html>