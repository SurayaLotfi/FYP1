<?php
session_start();

if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $fullname = $_SESSION["fullname"];
    $username = $_SESSION["username"];
    $department = $_SESSION["department"];
    $email = $_SESSION["email"];
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
        <link rel="stylesheet" href="styles.css">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Source+Sans+Pro&display=swap" rel="stylesheet">
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
                        <a href="user_home.php" class="nav-link active" style="color:rgb(138, 239, 255)" aria-current="page"><b>Home</a></b>
                    </li>
                    <li class = "nav-item">
                        <a href="KBhome.html" class="nav-link">Knowledge Base</a>
                    </li>
                    <li class = "nav-item">
                        <a href="classes.html" class="nav-link">Classes</a>
                    </li>
                    <li class = "nav-item">
                        <a href="dashboard.php" class="nav-link">Dashboard</a>
                    </li>

                </ul>

        </nav>
        </section> 
            <!--Body-->
            <!--Top-->
        <div class="container-fluid" >
            <div class="row" style="margin: 0px;">

                <div class="col" style="display: flex; align-items: center;">
                    <div style="margin: 50px; margin-left:200px; ">
                        <h1>Welcome, <?php echo $fullname?>!</h1>
                        <div style="margin: 0px; margin-left: 3px;">
                            <h4>Malaysia Airline's Knowledge Management System ensures you don't get lost.</h4>
                            <a href="#services">
                            <button type="button" class="btn btn-dark" style="margin:10px">Get Started</button>
                             </a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <img src="images/Malaysia-Airlines-Logo.png" alt="main-icon" style="padding-left: 80px; margin-top: -25px; width: 80%;">
                </div>
            </div>
        </div>

        <!--Services-->
        <section id="services">
        <div class="container-fluid"  style="background-color: #001D47; padding:50px;">
            <div class="text" style="display: flex; justify-content: center; margin: 10px;">
                <h1>Explore What We Have For You</h1>
            </div>
        <div class="container" style="padding: 50;">
            <div class="row" style="margin: 50; margin-top: 20px">
                <div class="col">
                    <div class="card-text-above">Access to our knowledge base! </div>
                        <div class="card" style="margin: 20px">
                            <img src="images/jaredd-craig-HH4WBGNyltc-unsplash.jpg" class="card-img-top" alt="..." style="width: 100%; height: 15vw; object-fit: cover;">
                        
                            <div class="card-body">
                            <h5 class="card-title">Knowledge Base</h5>
                            <p class="card-text">We have stored all type of knowledge within the organization for you to absorb yourself. Gain knowledge and become a better you.</p>
                            <a href="KBhome.html" class="btn btn-primary">Go to Knowledge Base</a>
                            </div>
                        </div>
                </div>
                <div class="col">
                    <div class="card-text-above">Classes </div>
                    <div class="card" style="margin: 20px">
                        <img src="images/training.png" class="card-img-top" alt="..." style="width: 100%; height: 15vw; object-fit: cover;">
                    
                        <div class="card-body">
                        <h5 class="card-title">Let's get into training</h5>
                        <p class="card-text">Let's apply the knowledge and evaluate yourself to see how well do you understand your resources.</p>
                        <a href="classes.html" class="btn btn-primary">Go to classes</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card-text-above">Dashboard</div>
                    <div class="card" style="margin: 20px">
                        <img src="images/view-dashboard.jpg" class="card-img-top" alt="..." style="width: 100%; height: 15vw; object-fit: cover;">
                    
                        <div class="card-body">
                        <h5 class="card-title">See your Dashboard</h5>
                        <p class="card-text">Check your progress and performance throughout this website, see how well you are doing.</p>
                        <a href="dashboard.php" class="btn btn-primary">Go to Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

    <!--Footer-->
    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
          <center><span class="text-muted">2022 - Made for WIA3002 Academic Project | by Wan Suraya Binti Wan Mohd Lotfi u2005345</span></center>
        </div>
      </footer>
      

    <!---------Smooth Scroll-------->
            <script src="smooth-scroll.js"></script>
            <script>
                var scroll = new SmoothScroll('a[href*="#"]');
            </script>
        </body>

    
</html>