
<?php

include "connect.php";
if(isset($_GET['editid'])){
    $id = $_GET['editid'];
    $query = "SELECT * FROM onboarding WHERE id = $id";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result); //catchig the columns for that particular id
    if(mysqli_num_rows($result)>0){
    $department = $row['department'];
    $content_name = $row['content_name'];
    $content = $row['content'];
    $content_format = $row['content_format'];
    }else{
        echo "no records";
    }
}else{
   
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Onboarding</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="/admin/styles/home.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <!--CKEEDITOR: RICH TEXT API-->
    <script src="/ckeditor_4.21.0_full/ckeditor/ckeditor.js"></script>

      <!--Sweet Alert-->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                    <button type="button" class="btn btn-info">Upload</button>
                    </a>
                    <a href="create.php">
                    <button type="button" class="btn btn-info">Create</button>
                    </a>
                    <a href="viewonboarding.php">
                    <button type="button" class="btn btn-info active">Edit</button>
                    </a>
                </div>
            </div>
            

            <div class="container" style="padding: 50px; padding-top: 5px">

                    <?php if(!empty($statusMsg)){?>
                    <p><?php echo $statusMsg; ?></p>
                    <?php } ?>
                    
                    <form method="post" action="fileprocessupdate.php">

                    <input type = "hidden" name="id" value= <?php echo $id ?>>

                    <textarea name="editor" id="editor" rows="10" cols="80">
                    <?php echo $content ?>
                    </textarea>

                    <!--Document Title-->
                    <div class="form-group">
                        <label for="Title">Title</label>
                        <input type="text" class="form-control" id="Title" value="<?php echo $content_name ?>" name="title" placeholder="Enter Title">
                    </div>

                    <!--Which Department-->
                    <div class="form-group">
                            <label for="department-select"><h6>Select Department</h6></label>
                            <select class="form-control" id="department-select" name="department" value=<?php echo $department ?>>
                                <option value="Training" <?php if ($department === 'Training') echo 'selected'; ?>>Training</option>
                                <option value="Engineering" <?php if ($department === 'Engineering') echo 'selected'; ?>>Engineering</option>
                                <option value="Maintenance" <?php if ($department === 'Maintenance') echo 'selected'; ?>>Maintenance</option>
                                <option value="IT" <?php if ($department === 'IT') echo 'selected'; ?>>IT</option>
                            </select>
                    </div>

                    <button type="submit" class="btn btn-info" name="updateeditor">EDIT</button>
                    </form>

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
                            
                                }
                            }?>
   
    </div>  
    <script>
        CKEDITOR.replace('editor');
    </script>
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