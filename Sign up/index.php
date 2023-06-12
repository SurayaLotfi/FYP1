<?php
    require "connect.php";
    if(!empty($_SESSION["id"])){ //since we already set the session id at login, we check ada tak.
        $id = $_SESSION["id"]; //if ada, we pass the $id so this page can use it.
        $result = mysqli_query($db, "SELECT * FROM users WHERE user_id = $id");
        $row = mysqli_fetch_assoc($result); //to retrieve data from the row
        //we can set awal2 the variables for this page to use.
        $username = $row['username']; 

        ?>
            <!DOCTYPE html>
            <HTML>
                <head>
                    <body>
                        <h1>Hello, <?php echo $username ?></h1>
                        <a href="logout.php">Logout</a>
                    </body>
                </head>
            </HTML>

        <?php
    }else{
        header("Location: login.php");//if i want to reload this page but there's no session yet (not yet logged in), kene re-direct to login.
    }
?> 
