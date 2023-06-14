<?php
session_start();
include "connect.php";
 //Retrieving data from database first

    //Retrieve session id first
    if(!empty($_SESSION["id"])){
        $id = $_SESSION["id"];
        $fullname = $_SESSION["fullname"];
        $username = $_SESSION["username"];
        $department = $_SESSION["department"];
        $email = $_SESSION["email"];
        $query = "SELECT * from achievement where user_id = $id";
        $result = mysqli_query($db,$query);
        //get all wanted data
        //getting achievement data
        $row = mysqli_fetch_assoc($result);
        $total_badges = $row['total_badges'];
        $total_certificate = $row['total_certificate'];
        $total_posts = $row['total_posts'];

        //getting courses data
        $query = "SELECT * from courses where user_id = $id";
        $result = mysqli_query($db, $query);
        $total_courses = mysqli_num_rows($result);
        $query = "SELECT * from courses where user_id = $id AND status = 'Completed'";
        $result = mysqli_query($db, $query);
        $total_completed = mysqli_num_rows($result);
        $query = "SELECT * from courses where user_id = $id AND status = 'Pending'";
        $result = mysqli_query($db, $query);
        $total_pending = mysqli_num_rows($result);
        $query = "SELECT * from courses where user_id = $id AND status = 'Ongoing'";
        $result = mysqli_query($db, $query);
        $total_ongoing = mysqli_num_rows($result);




    }else{
        header("Location: ../Sign up/login.php"); 
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <title>KMS4MAE Homepage</title>

        <!-- Bootstrap CSS CDN -->
        <!--TAKYAH, DIA JADIKAN DESIGN LARI-->
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"> -->
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"> -->
        
        <!--css-->
        <link rel="stylesheet" href="styles.css">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Source+Sans+Pro&display=swap" rel="stylesheet">

        <!--Sweet Alert-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>
    <body>

        <!--Navbar-->  
        <section id="nav-bar">
        <nav class = "navbar navbar-expand" style="background-color: #001D47;">
            <div class="container-fluid" style="margin:0px; margin-left:50px; margin-right: 50px">
                <ul class="navbar-nav">
                <li class="navbar-brand" style="color: white"><b>KMS4MAE</b></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                          <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                          <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-start">
                        <li><a class="dropdown-item" href="/Sign up/logout.php">Logout</a></li>
                      </ul>
                </li>
            </ul>
                <ul class="navbar-nav nav-underline" >
                    <li class = "nav-item">
                        <a href="user_home.php" class="nav-link" aria-current="page"><b>Home</a></b>
                    </li>
                    <li class = "nav-item">
                        <a href="KBhome.html" class="nav-link">Knowledge Base</a>
                    </li>
                    <li class = "nav-item">
                        <a href="classes.html" class="nav-link">Classes</a>
                    </li>
                    <li class = "nav-item">
                        <a href="dashboard.php" class="nav-link active" style="color:rgb(138, 239, 255)">Dashboard</a>
                    </li>

                </ul>

        </nav>
    </section> 

        <!--Body-->
        <div class="container-fluid"  style="background-color: #9299a4; padding:20px; padding-left: 50px; padding-right: 50px">
            <div class="row" style="color: aliceblue;">
            <h2>Dashboard</h2>
                <div class="col-9">
                    
                        <div class="row">
                            <div class="col">
                                <div>
                                    <div class="card text-light bg-dark mb-3" style="max-width: 100%; height: 200px">
                                        <div class="card-header">Total Courses: <?php echo $total_courses ?></div>
                                        <div class="card-body">
                                        <div class="row text-center" style="padding: 20px;">
                                            <div class="col-3 ">
                                                <div class="card-title">Pending</div>
                                                <h1><?php echo $total_pending ?></h1>
                                            </div>
                                            <div class="col-5">
                                                <div class="card-title">Ongoing</div>
                                                <h1><?php echo $total_ongoing ?></h1>
                                            </div>
                                            <div class="col-4">
                                                <div class="card-title">Completed</div>
                                                <h1><?php echo $total_completed ?></h1>
                                            </div>
                                            </div>
                                        </div>
                                      </div>
                                </div>
                             </div>
                             <div class="col">
                                <div>
                                    <div class="card text-light bg-dark mb-3" style="max-width: 100%; height: 200px;">
                                        <div class="card-header">Total Achievements</div>
                                        <div class="card-body">
                                            <div class="row text-center" style="padding: 20px;">
                                            <div class="col-3 ">
                                                <div class="card-title">Total Badges</div>
                                                <h1><?php echo $total_badges ?></h1>
                                            </div>
                                            <div class="col-6">
                                                <div class="card-title">Total Certficate</div>
                                                <h1><?php echo $total_certificate ?></h1>
                                            </div>
                                            <div class="col-3">
                                                <div class="card-title">Total Posts</div>
                                                <h1><?php echo $total_posts ?></h1>
                                            </div>
                                            </div>
                                        </div>
                                      </div>
                                </div>
                             </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div>
                                    <div class="card text-light bg-dark mb-3" style="max-width: 100%; height: 313px">
                                        <div class="card-header">
                                            <div class="d-flex align-items-center">
                                                <img src="images/leaderboard3.png" alt="Logo" style="width: 30px; height: 30px; margin-right: 20px;">
                                                <div style="margin-top: 10px">
                                                <h3>Leaderboard</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <?php

                                            $query = "SELECT * FROM achievement ORDER BY (total_badges + total_certificate + total_posts) DESC ";
                                            $result = mysqli_query($db, $query);
                                            if ($result) {
                                                $rank = 1;

                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $user_id = $row['user_id']; //getting achievement's user_id to retrieve username from users table
                                                    $total = $row['total_badges'] + $row['total_certificate'] + $row['total_posts'];
                                                    $query_users = "SELECT * FROM users WHERE user_id = $user_id"; //retrieve id from previously fetched id form achievement
                                                    $result_users = mysqli_query($db, $query_users);
                                                    $row_users = mysqli_fetch_assoc($result_users);
                                                    $users = $row_users['username'];
                                                    $department = $row_users['department'];
                                                    ?>
                                                    <div class="row align-items-center">
                                                        <div class="col-2">
                                                            <div style="margin-bottom: 30px">
                                                                <h4><?php echo $rank; ?></h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                        <div style="margin-bottom: 30px">
                                                            <h4><?php echo $users; ?></h4>
                                                        </div>
                                                        </div>
                                                        <div class="col-4">
                                                        <div style="margin-bottom: 30px">
                                                            <h4>Total Points: <?php echo $total; ?></h4>
                                                        </div>
                                                        </div>
                                                        <div class="col">
                                                        <div style="margin-bottom: 30px">
                                                            <h4><?php echo $department; ?></h4>
                                                        </div>  
                                                        </div>
                                                    </div>
                                                    <?php
                                                    $rank++;
                                                }
                                            } else {
                                                echo "No data found.";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                    <div class="col">
                        <div>
                            <div class="card text-light bg-dark mb-3" style="max-width: 100%; height: 530px">
                                <div class="card-header" style="padding-top: 30px">
                                    <div class="d-flex justify-content-center">
                                        <img src="images/user3.png" alt="Profile Picture" style="width: 150px; height: 150px; border-radius: 50%;">
                                    </div>
                                    <h3 class="text-center mt-3"><?php echo $fullname ?></h3>
                                </div>
                                <div class="card-body text-center">
                                    
                                    <p><strong>Username:</strong> <?php echo $username ?></p>
                                    <hr>
                                    <p><strong>Department:</strong> <?php echo $department ?></p>
                                    <hr>
                                    <p><strong>Email:</strong> <?php echo $email ?></p>
                                    <hr>
                                    <button type="button" class = "btn btn-success" data-toggle="modal" data-target="#editbutton">Edit</button>
                                </div>
                                   <!--Modal for edit-->
                                        <div class="modal fade" id="editbutton" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel" style="color: black">Update Profile</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="updateprofile.php" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="Username" style="color: black">Full Name</label>
                                                    <input type="text" name="fullname" class="form-control" id="exampleFormControlInput1" value="<?php echo $fullname?>">
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label for="Username" style="color: black">Username</label>
                                                    <input type="text" name="username" class="form-control" id="exampleFormControlInput1" value=<?php echo $username?>>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label for="Username" style="color: black">Department</label>
                                                    <input type="text" class="form-control" id="exampleFormControlInput1" value=<?php echo $department?> disabled>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label for="Username" style="color: black">Email</label>
                                                    <input type="text" name="email" class="form-control" id="exampleFormControlInput1" value=<?php echo $email?>>
                                                </div>
                                                <br>

                                               
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="editprofile" class="btn btn-primary">Save changes</button>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                
                            </div>
                            
                        </div>
                    </div>

        </div>
        </div>

    <!--Sweet Alert Message-->
    <?php 
      if(isset($_GET['status'])){
          $status = $_GET['status'];

          if($status === 'success'){
              ?>
              <script>
              Swal.fire({
                  icon: 'success',
                  title: 'Success!',
                  text: 'File Uploaded.'
              })
              </script>      
      <?php
          }elseif($status === 'deletesuccess'){
            ?>
              <script>
              Swal.fire({
                  icon: 'success',
                  title: 'Success!',
                  text: 'File Deleted.'
              })
              </script>      
      <?php
          }elseif($status === 'updatesuccess'){
            ?>
              <script>
              Swal.fire({
                  icon: 'success',
                  title: 'Success!',
                  text: 'Profile Updated.'
              })
              </script>      
      <?php
          }
      }?>


     <!--Footer-->
    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
          <center><span class="text-muted">2022 - Made for WIA3002 Academic Project | by Wan Suraya Binti Wan Mohd Lotfi u2005345</span></center>
        </div>
    </footer>

    <!--Javascript-->

    <!--Modal-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    
    </body>
</html>