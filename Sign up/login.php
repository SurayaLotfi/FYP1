<?php
require "connect.php";

if(!empty($_SESSION["id"])){ //if a user is still in a session and wants to login, we won't allow them.
    header("Location: index.php");
}

if(isset($_POST["submit"])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $result = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'"); //retrieve dulu row yang ada same username
    $row = mysqli_fetch_assoc($result); //get the row
    if(mysqli_num_rows($result) > 0){ //check whether the result exists or not
        if($password == $row['password']){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["user_id"];
            $_SESSION["position"] = $row["position"];
            $_SESSION["fullname"] = $row["fullname"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["department"] = $row["department"];
            $_SESSION["email"] = $row["email"];
            echo "<script> alert('Success!'); </script>";
            if($_SESSION["position"] == "Admin")
                header("Location: ../admin/manage-content/manage.php"); //login successful, set the session id and navigate user to the homepage.
            else 
                header("Location: ../user/user_home.php");
        }
        else{
            echo "<script> alert('Wrong Password or Email!'); </script>";
        }
    }else{
        echo "<script> alert('User not registered!'); </script>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sign Up</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <link rel = "stylesheet" href = "testing.css">

        <!--Fonts-->
        <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid&family=Rubik:wght@500&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;1,200;1,300;1,400&display=swap" rel="stylesheet">   
        </head>
        <body>
            <div class="container">
                <h1><center>LOGIN</center></h1>
                <form class="" action="" method="post" autocomplete="off">
                <label for="username">Username : </label>
                    <input type="text" name="username" id = "username" required value=""> <br>
                <label for="email">Email : </label>
                    <input type="email" name="email" id = "email"  value=""> <br>
                <label for="password">Password : </label>
                    <input type="password" name="password" id = "password" required value=""> <br>
                <button class="btn btn-info" type="submit" name="submit">Login</button>
                </form>

                <br>
                 <a  href="signup.php" class="btn btn-success" >Register</a>

            </div>
        </body>
    
</html>