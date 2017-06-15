<?php
    session_start();
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Sign Up Now! | NTU Survey </title>
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
    <div class="container">
        <div class="reg">
            <form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <label><b>Name</b></label>
                <input type="text" placeholder="Enter Name" name="name" required>
                
                <br>
                <br>
                
                <br>
                <br>
                <div class="btn">
                    <a href="../landing/index.php"><button type="button" class="cancelbtn">Cancel</button></a>
                    <button type="submit" class="submitbtn" name="login">Sign Up</button>
                </div>     
            </form>
        </div>
	</div>
    
    <script src="script.js"></script>
    
    </body>
</html>