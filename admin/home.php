<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Home</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="styles/home.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <!--CKEEDITOR: RICH TEXT API-->
    <script src="../ckeditor_4.21.0_full/ckeditor/ckeditor.js"></script>

</head>

<body>
    <div class="wrapper">

        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
            <div class="d-flex justify-content-center">
                <h3>Admin</h3>
            </div>
            </div>
    
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="home.php">Home</a>
                </li>
                <li>
                    <a href="./manage-content/manage.php">Manage Content</a>
                </li>
                <li>
                    <a href="./onboarding/onboarding.php">Onboarding</a>
                </li>
                <li>
                    <a href="./dashboard/dashboard.php">Dashboard</a>
                </li>
                <li>
                    <a href="/Sign up/logout.php">Logout</a>
                </li>
            </ul>
        </nav>
 
    
        <!-- Home -->
       
        <div class="container-fluid"  style="background-color: #001D47; padding:50px; color: white;">
            <!-- We'll fill this with dummy content -->
            
                <h1>Welcome Back, Admin</h1>
              
        
            <div class="text" style="display: flex; justify-content: center; margin: 10px; color: white;">
                <h1>Explore What We Have For You</h1>
            </div>
            <div class="container" style="padding: 50;">
            <div class="row" style="margin: 50; margin-top: 20px">
                <div class="col">
                    <div class="card-text-above" style="text-align: center;">Manage Content </div>
                        <div class="card" style="margin: 20px">
                            <img src="images/manage_content.jpg" class="card-img-top" alt="..." style="width: 100%; height: 15vw; object-fit: cover;">
                        
                            <div class="card-body">
                            <h5 class="card-title"  style="color:black">Manage Content</h5>
                            <p class="card-text">Create or Upload knowledge for your employees.</p>
                            <a href="./manage-content/manage.php" class="btn btn-primary">Go to Manage Content</a>
                            </div>
                        </div>
                </div>
                <div class="col">
                    <div class="card-text-above" style="text-align: center;">Onboarding</div>
                    <div class="card" style="margin: 20px">
                        <img src="images/onboarding.jpg" class="card-img-top" alt="..." style="width: 100%; height: 15vw; object-fit: cover;">
                    
                        <div class="card-body">
                        <h5 class="card-title" style="color:black">Welcome new trainees</h5>
                        <p class="card-text">Manage onboarding knowledge for new employees.</p>
                        <a href="./onboarding/onboarding.php" class="btn btn-primary">Go to Onboarding</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card-text-above" style="text-align: center;">Dashboard</div>
                    <div class="card" style="margin: 20px">
                        <img src="images/dashboard3.jpg" class="card-img-top" alt="..." style="width: 100%; height: 15vw; object-fit: cover;">
                    
                        <div class="card-body">
                        <h5 class="card-title" style="color:black">See Dashboard</h5>
                        <p class="card-text">Have an overview on all the knowledge within the system.</p>
                        <a href="./dashboard/dashboard.php" class="btn btn-primary">Go to Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
         
        </div>
        </div>  
   
    

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script>
    
    $(document).ready(function () {

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    
    });
    
    </script>

</body>

</html>