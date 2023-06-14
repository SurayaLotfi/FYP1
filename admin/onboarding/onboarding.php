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
                    <button type="button" class="btn btn-info active">Upload</button>
                    </a>
                    <a href="create.php">
                    <button type="button" class="btn btn-info">Create</button>
                    </a>
                    <a href="viewonboarding.php">
                    <button type="button" class="btn btn-info">View Uploaded</button>
                    </a>
                </div>
            </div>
            
            <div class="container">
                <div class="row">
                    <div class="col">
                        <!--PDF-->
                    <div class="card">
                        <h5 class="card-header info-color white-text text-center py-4">
                        <strong>Upload File Form</strong>
                        </h5>
                        <div class="card-body  px-lg-5 pt-0">
                            <div class="container" style="display: flex; justify-content: center; align-items: center">
                            <div class="row" style="padding: 10px"><br><br>
                                <form action="fileprocess.php" method="post" enctype="multipart/form-data" >
                                    <!--Document Title-->
                                    <div class="form-group">
                                        <label for="Title">Title</label>
                                        <input type="text" class="form-control" id="Title" name="title" placeholder="Enter Title">
                                    </div>

                                    <!--Which Department-->
                                    <div class="form-group">
                                            <label for="department-select"><h6>Select Department</h6></label>
                                            <select class="form-control" id="department-select" name="department">
                                                <option value="Training">Training</option>
                                                <option value="Engineering">Engineering</option>
                                                <option value="Maintenance">Maintenance</option>
                                                <option value="IT">IT</option>
                                            </select>
                                    </div>

                                <label for="subject" class="">Upload File</label>
                                <input type="file" name="my_pdf"> <br>
                                <button  type="submit" class="btn btn-info btn-rounded btn-block my-4 waves-effect z-depth-0"  name="save" type="submit">UPLOAD</button>
                                <footer style="font-size: 12px"><b>File Type:</b><font color="red"><i> .pdf only</i></font></footer>
                                </form>

                                
                            </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <!--Video-->
                        <h5 class="card-header info-color white-text text-center py-4">
                        <strong>Upload Video Form</strong>
                        </h5>
                        <div class="card-body  px-lg-5 pt-0">
                            <div class="container" style="display: flex; justify-content: center; align-items: center">
                            <div class="row" style="padding: 10px"><br><br>
                                <form action="fileprocess.php" method="post" enctype="multipart/form-data" >
                                    <!--Document Title-->
                                    <div class="form-group">
                                        <label for="Title">Title</label>
                                        <input type="text" class="form-control" id="Title" name="title" placeholder="Enter Title">
                                    </div>

                                    <!--Which Department-->
                                    <div class="form-group">
                                            <label for="department-select"><h6>Select Department</h6></label>
                                            <select class="form-control" id="department-select" name="department">
                                                <option value="Training">Training</option>
                                                <option value="Engineering">Engineering</option>
                                                <option value="Maintenance">Maintenance</option>
                                                <option value="IT">IT</option>
                                            </select>
                                    </div>

                                <label for="subject" class="">Upload Video</label>
                                <input type="file" name="my_video"> <br>
                                <button  type="submit" class="btn btn-info btn-rounded btn-block my-4 waves-effect z-depth-0"  name="savevideo" type="submit">UPLOAD</button>
                                <footer style="font-size: 12px"><b>File Type:</b><font color="red"><i> .mp4, .webm, .avi, .flv, .mov only</i></font></footer>
                                </form>

                                
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <!--Image-->
                        <div class="card">
                        <h5 class="card-header info-color white-text text-center py-4">
                        <strong>Upload Image Form</strong>
                        </h5>
                        <div class="card-body  px-lg-5 pt-0">
                            <div class="container" style="display: flex; justify-content: center; align-items: center">
                            <div class="row" style="padding: 10px"><br><br>
                                <form action="fileprocess.php" method="post" enctype="multipart/form-data" >
                                    <!--Document Title-->
                                    <div class="form-group">
                                        <label for="Title">Title</label>
                                        <input type="text" class="form-control" id="Title" name="title" placeholder="Enter Title">
                                    </div>

                                    <!--Which Department-->
                                    <div class="form-group">
                                            <label for="department-select"><h6>Select Department</h6></label>
                                            <select class="form-control" id="department-select" name="department">
                                                <option value="Training">Training</option>
                                                <option value="Engineering">Engineering</option>
                                                <option value="Maintenance">Maintenance</option>
                                                <option value="IT">IT</option>
                                            </select>
                                    </div>

                                <label for="subject" class="">Upload Image</label>
                                <input type="file" name="my_image"> <br>
                                <button  type="submit" class="btn btn-info btn-rounded btn-block my-4 waves-effect z-depth-0"  name="saveimage" type="submit">UPLOAD</button>
                                <footer style="font-size: 12px"><b>File Type:</b><font color="red"><i> .jpg, .jpeg, .png only</i></font></footer>
                                </form>

                                
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
                            
                                }
                            }?>
   
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