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
    <link rel="stylesheet" href="../styles/home.css">

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
                <li>
                    <a href="/admin/home.php">Home</a>
                </li>
                <li>
                    <a href="/admin/manage-content/manage.php">Manage Content</a>
                </li>
                <li>
                    <a href="/admin/onboarding/onboarding.php">Onboarding</a>
                </li>
                <li  class="active">
                    <a href="dashboard.php">Dashboard</a>
                </li>
                <li>
                    <a href="logout.php">Logout</a>
                </li>
            </ul>
        </nav>
    
        <!-- Home -->
        <!--Retrieving data from database-->
        <?php
            include "../manage-content/dbConfig.php";

            $query = "SELECT * from users WHERE position = 'User'";
            $result = mysqli_query($db, $query);
            $total_users = mysqli_num_rows($result); //calculating total number of rows that follows the rule

            //Retrieving KB data
            $query = "SELECT * from manage_content WHERE content_type = 'knowledge_base'";
            $result = mysqli_query($db, $query);
            $total_kb = mysqli_num_rows($result); //calculating total number of rows that follows the rule
            $query = "SELECT * from manage_content WHERE content_type IN ('knowledge_base','both') AND content_format = 'PDF'";
            $result = mysqli_query($db, $query);
            $total_pdf_kb = mysqli_num_rows($result); //calculating total number of rows that follows the rule
            $query = "SELECT * from manage_content WHERE content_type IN ('knowledge_base','both') AND content_format = 'Video'";
            $result = mysqli_query($db, $query);
            $total_video_kb = mysqli_num_rows($result); //calculating total number of rows that follows the rule
            $query = "SELECT * from manage_content WHERE content_type IN ('knowledge_base','both') AND content_format = 'Image'";
            $result = mysqli_query($db, $query);
            $total_image_kb = mysqli_num_rows($result); //calculating total number of rows that follows the rule
            $query = "SELECT * from manage_content WHERE content_type IN ('knowledge_base','both') AND content_format = 'HTML'";
            $result = mysqli_query($db, $query);
            $total_html_kb = mysqli_num_rows($result); //calculating total number of rows that follows the rule

            //Retrieving Class Data
            $query = "SELECT * from manage_content WHERE content_type = 'classes'";
            $result = mysqli_query($db, $query);
            $total_class = mysqli_num_rows($result); //calculating total number of rows that follows the rule
            $query = "SELECT * from manage_content WHERE content_type = 'classes' AND content_format = 'PDF'";
            $result = mysqli_query($db, $query);
            $total_pdf_class = mysqli_num_rows($result); //calculating total number of rows that follows the rule
            $query = "SELECT * from manage_content WHERE content_type = 'classes' AND content_format = 'Video'";
            $result = mysqli_query($db, $query);
            $total_video_class = mysqli_num_rows($result); //calculating total number of rows that follows the rule
            $query = "SELECT * from manage_content WHERE content_type = 'classes' AND content_format = 'Images'";
            $result = mysqli_query($db, $query);
            $total_image_class = mysqli_num_rows($result); //calculating total number of rows that follows the rule
            $query = "SELECT * from manage_content WHERE content_type = 'classes' AND content_format = 'HTML'";
            $result = mysqli_query($db, $query);
            $total_html_class = mysqli_num_rows($result); //calculating total number of rows that follows the rule

            $query = "SELECT * from onboarding";
            $result = mysqli_query($db, $query);
            $total_ob = mysqli_num_rows($result); //calculating total number of rows that follows the rule
            $query = "SELECT * from onboarding WHERE department = 'Training' ";
            $result = mysqli_query($db, $query);
            $total_training = mysqli_num_rows($result); //calculating total number of rows that follows the rule
            $query = "SELECT * from onboarding WHERE department = 'Engineering' ";
            $result = mysqli_query($db, $query);
            $total_engineering = mysqli_num_rows($result); //calculating total number of rows that follows the rule
            $query = "SELECT * from onboarding WHERE department = 'IT' ";
            $result = mysqli_query($db, $query);
            $total_it = mysqli_num_rows($result); //calculating total number of rows that follows the rule
            $query = "SELECT * from onboarding WHERE department = 'Maintenance' ";
            $result = mysqli_query($db, $query);
            $total_maintain = mysqli_num_rows($result); //calculating total number of rows that follows the rule
  

        ?>
        
            <div class="container-fluid" style="margin-left: 10px">
            <!-- We'll fill this with dummy content -->
            <div class="row" style="margin-top: 20px">
            <div style="margin-left: 12px">
               
            </div>
            </div>
                <div class="row">
                    <div class="col">
                    <div class="card text-white bg-dark mb-3"> 
                          <div class="card-body">
                            Total Employees
                            <br>
                            <br>
                            <h1 class="mb-0"><?php echo $total_users ?></h1>
                        </div>
                        <div class="card-footer" style="height: 63px">
                                         
                        </div> 
                    </div>
                    </div>
                    <div class="col">
                    <div class="card text-white bg-dark mb-3"> 
                          <div class="card-body">
                            Total Knowledge Content
                            <br>
                            <br>
                             <h1 class="mb-0"><?php echo $total_kb ?></h1>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary view-details-btn" 
                            data-details="
                                        <?php echo "Total Video: $total_video_kb <br>
                                        Total Images: $total_image_kb <br>
                                        Total HTML: $total_html_kb <br>
                                        Total PDF: $total_pdf_kb <br>" 
                                        ?>">View Details</a>                    
                        </div> 
                    </div>
                    </div>
                    <div class="col">
                    <div class="card text-white bg-dark mb-3"> 
                          <div class="card-body">
                            Total Classes Content
                            <br>
                            <br>
                             <h1 class="mb-0"><?php echo $total_class ?></h1>
                        </div>
                        <div class="card-footer">
                        <a href="#" class="btn btn-primary view-details-btn" 
                            data-details="
                                        <?php echo "Total Video: $total_video_class <br>
                                        Total Images: $total_image_class <br>
                                        Total HTML: $total_html_class <br>
                                        Total PDF: $total_pdf_class <br>" 
                                        ?>">View Details</a>                     
                        </div> 
                    </div>
                    </div>
                    <div class="col">
                    <div class="card text-white bg-dark mb-3"> 
                          <div class="card-body">
                            Total Onboarding Content
                            <br>
                            <br>
                             <h1 class="mb-0"><?php echo $total_ob ?></h1>
                        </div>
                        <div class="card-footer">
                        <a href="#" class="btn btn-primary view-details-btn" 
                            data-details="
                                        <?php echo "Training: $total_training document(s) <br>
                                        Engineering: $total_engineering document(s)<br>
                                        IT: $total_it document(s)<br>
                                        Maintainence: $total_maintain document(s)<br>" 
                                        ?>">View Details</a>                     
                        </div> 
                    </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-8">
                            <div class="card text-light bg-dark mb-3" style="max-width: 100%; height: 460px;">
                                <div class="card-header">Employees</div>
                                    <div class="card-body">
                      
                            <table id="dataTableid" class="table table-bordered" style="margin-top: 10px">
                                <thead class= "thead-dark">
                                    <tr>
                                        <th scope ="col">No</th>
                                        <th scope ="col">Full Name</th>
                                        <th scope ="col">Username</th>
                                        <th scope ="col">Email</th>
                                        <th scope ="col">Department</th>
                                        <th scope ="col">Action</th>
                                    </tr>
                                </thead>
                            <?php
                                $query = "SELECT * FROM users WHERE position = 'User'";
                                $result = mysqli_query($db, $query);
                                $i = 1;
                                while($row = mysqli_fetch_assoc($result)){ //loop through the rows in the table fetched by result
                                    $id = $row['user_id'];
                                    $fullname = $row['fullname'];
                                    $username = $row['username'];
                                    $email = $row['email'];
                                    $department = $row['department'];

                                    ?>

                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $row['fullname'] ?></td>
                                        <td><?php echo $row['username'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $row['department'] ?></td>
                                        <td>
                                        <a href='viewdashboard.php?viewid="<?php echo $id?>"' class='btn btn-info'>View</a></button>
                                        </td>
                                    </tr>

                                <?php
                                    $i++;
                                }
                            ?>
                            </table>
                            </div>
                        </div>
                        </div>
                    
                    <div class="col">
                        <!-- <div style="border: 1px solid; border-radius: 10px; height: 500px; padding: 10px"  id="detailSection"> -->
                        <div class="card text-light bg-dark mb-3" style="max-width: 100%; height: 460px;" >
                                <div class="card-header">Details</div>
                                    <div class="card-body" id="detailSection">
                                    Click 'View Details' for output
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

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.view-details-btn').on('click', function() {
                var details = $(this).data('details');
                // Update the content in the leaderboardSection div
                $('#detailSection').html(details);
            });
        });
    </script>

     <!--Data Tables-->
     <script src= "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
      
      <script>
        $(document).ready(function () {
           var table = $('#dataTableid').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [3,8,15,50, -1],
                    [3,10,15,50, "All"]

                ],
                responsive:true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search",
                }
            })
        });
    </script>

</body>

</html>