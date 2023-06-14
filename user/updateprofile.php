<?php
session_start();
include "connect.php";

        //update profile
        if(isset($_POST['editprofile'])){
            $id = $_SESSION["id"];
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $_SESSION['id'] = $id; //there are some variables retrieved from session, thus session pun kene update.
            $_SESSION['username'] = $username;
            $_SESSION['fullname'] = $fullname;
            $_SESSION['email'] = $email;

            $query = "UPDATE users SET fullname = '$fullname',  username = '$username', email='$email' WHERE user_id = $id";
            $result = mysqli_query($db, $query);
            if($result){
                header('location: dashboard.php?status=updatesuccess');
            }
            else{
                header('location: dashboard.php?status=updateerror');
            }
        }
?>