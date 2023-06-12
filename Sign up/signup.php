<?php
    require 'connect.php'; //connecting to database
    if(!empty($_SESSION['id'])){ //if session has no id (no start yet)
        header("Location: index.php"); 
    }else{
        
    }

    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $department = $_POST["department"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];
        $duplicate = mysqli_query($db, "SELECT * FROM users WHERE username = '$username' OR email = '$email'"); //checking whether user exist or not
        if(mysqli_num_rows($duplicate) > 0){ //if $duplicate shows results, meaning there is an existing user
          echo
          "<script> alert('Username or Email Has Already Taken'); </script>";
        }
        else{
          if($password == $confirmpassword){
            $query = "INSERT INTO users (fullname, username, email, department, password) VALUES('$name','$username','$email', '$department','$password')";
            $result = mysqli_query($db, $query);
            if($result){
            echo
            "<script> alert('Registration Successful'); </script>";
            }else{
            "<script> alert('Registration unSuccessful'); </script>";
            }
          }
          else{
            echo
            "<script> alert('Password Does Not Match'); </script>";
          }
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
        <body>
            <div class="container">
                <h1><center>REGISTER</center></h1>
                <form class="" action="" method="post" autocomplete="off">
                <label for="name">Full Name : </label>
                    <input type="text" name="name" id = "name" required value=""> <br>
                <label for="username">Username : </label>
                    <input type="text" name="username" id = "username" required value=""> <br>
                <label for="email">Email : </label>
                    <input type="email" name="email" id = "email" required value=""> <br>
                <label for="department">Department : </label>
                <input type="text" name="department" id = "department" required value=""> <br>
                <label for="password">Password : </label>
                    <input type="password" name="password" id = "password" required value=""> <br>
                <label for="confirmpassword">Confirm Password : </label>
                    <input type="password" name="confirmpassword" id = "confirmpassword" required value=""> <br>
                <button class="btn btn-info" type="submit" name="submit">Register</button>
                </form>

                <br>
                 <a  href="index.php" class="btn btn-success" >Login</a>

            </div>
        </body>
    </head>
</html>