<?php
session_start();
include "connect.php";
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $query = "SELECT * FROM users WHERE user_id=$id";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $department = $row['department'];
    $username = $row['username'];
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
        <link rel="stylesheet" href="styles.css">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Source+Sans+Pro&display=swap" rel="stylesheet">
        <!--Data Tables-->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->


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
                        <li><a class="dropdown-item" href="../Sign up/logout.php">Logout</a></li>
                      </ul>
                </li>
            </ul>
                <ul class="navbar-nav nav-underline" >
                    <li class = "nav-item">
                        <a href="user_home.html" class="nav-link"><b>Home</a></b>
                    </li>
                    <li class = "nav-item">
                        <a href="KB.html" class="nav-link active" style="color:rgb(138, 239, 255)" aria-current="page">Knowledge Base</a>
                    </li>
                    <li class = "nav-item">
                        <a href="classes.html" class="nav-link">Classes</a>
                    </li>
                    <li class = "nav-item">
                        <a href="dashboard.html" class="nav-link">Dashboard</a>
                    </li>

                </ul>

        </nav>
    </section> 
        <!--Body-->
        <?php
            include "connect.php";
            // view by id
            if(isset($_GET['OBviewid'])){
            $id = $_GET['OBviewid'];
            $sql = "SELECT * FROM onboarding WHERE id=$id";
            $result=mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result);
            $title = $row['content_name'];
            $content_format = $row['content_format'];
            $content = $row['content'];
           
            }

            ?>
        <div class="container-fluid"  style="background-color: #9299a4; padding:50px;">
        <a href=OB.php class="btn btn-dark">Back</a>
            <div class="row" style="color: aliceblue;">
            
            <center><h3><?php echo $title?></h3></center>
            
            <?php if($content_format==="Video"){ ?>
                    <div style="display: flex; justify-content: center; align-items: center; ">
                        <video src="../admin/onboarding/video/<?=$content?>" style="width: 60%; max-height: 100%;" controls>
                        </video>
                    </div>

            <?php 
                }if($content_format==="Image"){ ?>
                <div style="display: flex; justify-content: center; align-items: center; ">
                    <img src="../admin/onboarding/image/<?=$content?>" 
                    style="width: 80%; max-height: 100%;" controls>      
                </img>
                </div>
            <?php
                }if($content_format === "PDF"){ ?>
            <div style="width: 100%; min-height: 1000px;">
            <center><embed src="../admin/onboarding/OBuploads/<?=$content?>" type="application/pdf" width="100%" height=1000px controls></center>
                        
            </div>
            <?php }
            ?>
        </div>
        </div>
    
    <!--Footer-->
    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
          <center><span class="text-muted">2022 - Made for WIA3002 Academic Project | by Wan Suraya Binti Wan Mohd Lotfi u2005345</span></center>
        </div>
      </footer>

      <script src= "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
      
      <script>
        $(document).ready(function () {
           var table = $('#dataTableid').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [5,10,15,50, -1],
                    [5,10,15,50, "All"]

                ],
                responsive:true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search",
                }
            })
          // Add custom filter dropdown for Content Type
          var filterDropdown = $('<select class="form-select form-control form-control-sm mb-3" aria-label="Content Type Filter"><option value="" selected disabled>Select Format</option><option value="">All</option><option value="pdf">PDF</option><option value="html">HTML</option><option value="video">Video</option><option value="image">Image</option></select>')
              .css('width', '150px')
              .css('margin-top','7px')
              .css('margin-left','10px')
              .css('margin-right','10px');


            // Add custom filter dropdown for Location
            var filterDropdown2 = $('<select class="form-select form-control form-control-sm mb-3" aria-label="Department"><option value="" selected disabled>Department</option><option value="">All</option><option value="Training">Training</option><option value="Engineering">Engineering</option><option value="IT">IT</option><option value="Maintenance">Maintenance</option></select>')
              .css('width', '150px')
              .css('margin-top','7px')
              .css('margin-left','10px')
              .css('margin-right','10px');

            // Insert filter dropdowns next to the search input
            $('.dataTables_filter')
              .addClass('d-flex align-items-center')
              .append(filterDropdown)
              .append(filterDropdown2);

            filterDropdown.on('change', function () {
              var filterValue = $(this).val();
              table.column(3).search(filterValue).draw();
            });

            filterDropdown2.on('change', function () {
              var filterValue = $(this).val();
              table.column(2).search(filterValue).draw();
            });
        });
    </script>
    </body>
</html>