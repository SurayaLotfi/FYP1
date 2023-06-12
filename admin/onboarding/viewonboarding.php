<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Home</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="/admin/styles/home.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <!--CKEEDITOR: RICH TEXT API-->
    <script src="/ckeditor_4.21.0_full/ckeditor/ckeditor.js"></script>

    <!--Data Tables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

</head>

<body>
    <!-- Modal foor update-->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <div class="modal-body">
      <form action="fileprocessupdate.php" method="post" enctype="multipart/form-data" >
        <input type = "text" name="id" id="id">
      <div class="row" style="padding: 30px">
            <div class="card">
                <h5 class="card-header info-color white-text text-center py-4">
                <strong>Upload File Form</strong>
                </h5>
                <div class="card-body px-lg-5 pt-0">

                    <div class="container">
                    <div class="row" style="padding: 10px"><br><br>
                        
                            <!--Document Title-->
                            <div class="form-group">
                                <label for="Title">Title</label>
                                <input type="text" class="form-control" id="content_name" name="content_name" placeholder="Enter Title">
                            </div>

                            <!--Which Department-->
                            <div class="form-group">
                                    <label for="department-select"><h6>Select Department</h6></label>
                                    <select class="form-control" id="department" name="department">
                                        <option value="Training">Training</option>
                                        <option value="Engineering">Engineering</option>
                                        <option value="Maintenance">Maintenance</option>
                                        <option value="IT">IT</option>
                                    </select>
                            </div>

                        <label for="subject" class="">Upload File</label>
                        <input type="file" id="content" name="my_pdf"> <br>

                        
                    </div>
                    </div>
                </div>
                </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  type="submit" class="btn btn-info btn-rounded btn-block my-4 waves-effect z-depth-0"  name="update" type="submit">EDIT</button>

        <footer style="font-size: 12px"><b>File Type:</b><font color="red"><i> .pdf only</i></font></footer>
        </form>
      </div>
    </div>
  </div>
</div>

    <!-- Modal for delete -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
      <form action="delete.php" method="post" enctype="multipart/form-data" >
        <input type = "hide" name="delete_id" id="delete_id">
      <h3>Are you sure you want to delete?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  type="submit" class="btn btn-info"  name="delete">Delete</button>

        </form>
      </div>
    </div>
  </div>
</div>
    <div class="wrapper">

        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Welcome, Admin</h3>
            </div>
    
            <ul class="list-unstyled components">
                <p>Dummy Heading</p>
                <li>
                    <a href="/admin/home.php">Home</a>
                </li>
                <li>
                    <a href="/admin/manage-content/manage.php">Manage Content</a>
                </li>
                <li class="active">
                    <a href="onboarding.php">Onboarding</a>
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
       
        <div class="container-fluid" style="margin-left: 10px">
            <!-- We'll fill this with dummy content -->
            <div class="row" style="margin-top: 20px">
          
            <div style="margin-left: 12px">
                <h3>Onboarding</h3>
            </div>
            </div>
                <div class="row">
                <div class="buttons">
                    <a href="onboarding.php">
                    <button type="button" class="btn btn-info ">Upload</button>
                    </a>
                    <a href="viewonboarding.php">
                    <button type="button" class="btn btn-info active">View Uploaded</button>
                    </a>
                </div>

                <!--Display Table-->
            <div class="container">   
            <table id="dataTableid" class="table" style="margin-top: 10px">
                <thead>
                    <tr>
                        <th scope ="col">ID</th>
                        <th scope ="col">Title</th>
                        <th scope ="col">Department</th>
                        <th scope ="col">Content</th>
                        <th scope ="col">Date Created</th>
                        <th scope ="col">Action</th>
                    </tr>
                </thead>
               
                <?php
                include "connect.php";
                $query = "SELECT * FROM onboarding";
                $result = mysqli_query($db, $query);
               
                 $i = 1;
                    if($result){
                        foreach($result as $row){
                        $content = $row["content"];
                        $words = explode(" ", $content);
                        $truncatedContent = implode(" ", array_slice($words, 0, 10));
                
                        // Add ellipsis if the content has more than 10 words
                        if (count($words) > 10) {
                            $truncatedContent .= "...";
                        }
                        $id=$row['id']; //for retrieving id purposes utk delete & update
                        $content_name=$row['content_name'];
                        $department=$row['department'];
                        $date_created=$row['date'];
                        
                    ?> 
                            
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['content_name'] ?></td>
                            <td><?php echo $row['department'] ?></td>
                            <td><?php echo $row['content'] ?></td>
                            <td><?php echo $row['date'] ?></td>
                            <td>
                            <!-- <a href='view.php?viewid="<?php echo $id?>"' class='btn btn-info'>View</a></button> -->
                            <a href='#' class='btn btn-info'>View</a></button>
                            <!-- <a href='#' class='btn btn-info'>Delete</a></button> -->
                            <button type="button" class="btn btn-info deletebtn">Delete</button>
                            <button type="button" class="btn btn-primary editbtn">Edit</button>
                            </td>
                            
                        </tr>
                    <?php
                        
                        $i++;
                            
                        }

                    }
                ?>
            </table>
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
   
    <script>
        $(document).ready(function(){
           $('.deletebtn').on('click', function(){

                $('#deletemodal').modal('show');
                //to display current value 
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

           });
        });

    </script>

    <script>
        $(document).ready(function(){
           $('.editbtn').on('click', function(){

                $('#editmodal').modal('show');
                //to display current value 
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#id').val(data[0]);
                $('#content_name').val(data[1]);
                $('#department').val(data[2]);
                $('#content').val(data[3]);
               

           });
        });

    </script>

    <script>
    
    $(document).ready(function () {

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    
    });
    
    </script>



        <!--Data Tables-->
        <script src= "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

        <!--Modal-->
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
      
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
            // Add custom filter dropdown
        var filterDropdown = $('<select class="form-select form-control form-control-sm mb-3" aria-label="Content Type Filter"><option value=""selected disabled>Department</option><option value=>All</option><option value="Training">Training</option><option value="Engineering">Engineering</option><option value="IT">IT</option><option value="Maintenance">Maintenance</option></select>')
        .css('width','150px')
        
        .css('margin-left', '390px')
        .css('margin-top', '10px')
          
        .appendTo('#dataTableid_wrapper .dataTables_filter')
        .on('change', function () {
                var filterValue = $(this).val();
                table.column(2).search(filterValue).draw();
            });
        });
    </script>




</body>

</html>