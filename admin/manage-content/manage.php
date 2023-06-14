<?php
    session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
            rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
            <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
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
    <script src="/ckeditor_4.21.0_full/ckeditor/ckeditor.js"></script>

    <!--Sweet Alert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--Data Tables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

</head>

<body>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="submit.php" method="POST">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type = "hidden" name = "id" id="id">
            <h5>Are you sure you want to delete?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </form>
    </div>
  </div>
</div>
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
                <li class="active">
                    <a href="manage.php">Manage Content</a>
                </li>
                <li>
                    <a href="/admin/onboarding/onboarding.php">Onboarding</a>
                </li>
                <li>
                    <a href="/admin/dashboard/dashboard.php">Dashboard</a>
                </li>
                <li>
                    <a href="/Sign up/logout.php">Logout</a>
                </li>
            </ul>
        </nav>
    
        <!-- Home -->
        <!-- <div id="content"> -->
            
        <div class="container-fluid" style="margin-left: 10px">
            <!-- We'll fill this with dummy content -->
            <div class="row" style="margin-top: 20px">
          
            <div style="margin-left: 3px">
                <h3>Manage Content</h3>
            </div>
            <div class="row">
                <div class="buttons">
                    <a href="manage.php">
                    <button type="button" class="btn btn-info active">View</button>
                    </a>
                    <a href="upload.php">
                    <button type="button" class="btn btn-info">Upload Content</button>
                    </a>
                    <a href="create.php">
                    <button type="button" class="btn btn-info">Create Content</button>
                    </a>
                </div>
            </div>

            <div class="row">
            
            </div>    
            <div class="row">
            <form action="submit.php" method= "POST">
            <!--Displaying All Contents-->
            <table class="table table-bordered" id="dataTableid">
                <thead class="thead-dark">
                    <th>No</th>
                    <th>Name</th>
                    <th>Format</th>
                    <th>Location</th>
                    <th>Date Created</th>
                    <th>Action</th>
                </thead>
            <?php
                $i = 1;
                include "submit.php";

                 $sql = "SELECT * FROM manage_content";
                 $result = mysqli_query($db, $sql);

                 if($result){
                    while($row = mysqli_fetch_assoc($result)){
                        $content = $row["content"];
                        $words = explode(" ", $content);
                        $truncatedContent = implode(" ", array_slice($words, 0, 10));
                
                        // Add ellipsis if the content has more than 10 words
                        if (count($words) > 10) {
                            $truncatedContent .= "...";
                        }
                        $id=$row['id']; //for retrieving id purposes utk delete & update
                        $confirmDelete = $row['id'];
                        $content_name=$row['content_name'];
                        $content_format=$row['content_format'];
                        $content_type=$row['content_type'];
                        $date_created=$row['date_created'];
                        echo 
                         "
                         
                        <tr>
                            <td>" . $i ."</td>
                            <td>" . $content_name ."</td>
                            <td>" . $content_format ."</td>
                            <td>" . $content_type ."</td>
                            <td>" . $date_created ."</td>
                            <td> 


                            <div class='btn-group' role='group'>
                                <a href='update.php?updateid=".$id."' class='btn btn-success'>Update</a></button>
                                <!--<a href='submit.php?deleteid=<?php echo $id; ?>' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#confirmDeleteModal'>Delete</a>-->
                                <button type='button' class='btn btn-danger deleteCategoryBtn' value = '".$id."'>Delete</button>
                                <a href='preview.php?viewid=".$id."' class='btn btn-info'>Preview</a>
                            </div>
                            </td>
                        </tr>
                        ";
                        $i++;
                    }
                 }
            ?>
            </table>
            </form>
                
            <?php 
            if(isset($_GET['status'])){
                $status = $_GET['status'];

                if($status === 'success'){
                    ?>
                    <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                           text: 'The record has been inserted.'
                       })
                    </script>
                     
               <?php
               
                }elseif($status === 'updatesuccess'){
                ?>
                
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                           text: 'The record has been updated.'
                       })
                    </script>
                <?php

                }elseif($status === 'deletesuccess'){
                    ?>
                    
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                               text: 'The record has been deleted.'
                           })
                        </script>
                    <?php
            }
        }?>
                                             
            </div>
            
        </div>
        
        </div>  

 
    </div>  
    
  <!--Footer-->
  <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
          <center><span class="text-muted">2022 - Made for WIA3002 Academic Project | by Wan Suraya Binti Wan Mohd Lotfi u2005345</span></center>
        </div>
      </footer>
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

    <script>
        $(document).ready(function(){
            $('.deleteCategoryBtn').click(function(e){
                e.preventDefault();

                var id = $(this).val();
                $('#id').val(id);
                $('#deleteModal').modal('show');
            });
        });
    </script>

<script src= "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
      
      <script>
  $(document).ready(function () {
    var table = $('#dataTableid').DataTable({
      "pagingType": "full_numbers",
      "lengthMenu": [
        [5, 10, 15, 50, -1],
        [5, 10, 15, 50, "All"]
      ],
      responsive: true,
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Search",
      }
    });

    // Add custom filter dropdown for Content Type
    var filterDropdown = $('<select class="form-select form-control form-control-sm mb-3" aria-label="Content Type Filter"><option value="" selected disabled>Select Format</option><option value="">All</option><option value="pdf">PDF</option><option value="html">HTML</option><option value="video">Video</option><option value="image">Image</option></select>')
      .css('width', '150px')
      .css('margin-top','7px')
      .css('margin-left','10px')
      .css('margin-right','10px');


    // Add custom filter dropdown for Location
    var filterDropdown2 = $('<select class="form-select form-control form-control-sm mb-3" aria-label="Location"><option value="" selected disabled>Location</option><option value="">All</option><option value="knowledge_base">Knowledge Base</option><option value="classes">Class</option><option value="both">Both</option></select>')
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
      table.column(2).search(filterValue).draw();
    });

    filterDropdown2.on('change', function () {
      var filterValue = $(this).val();
      table.column(3).search(filterValue).draw();
    });
  });
</script>



</body>

</html>