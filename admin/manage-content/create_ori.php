<?php
 include_once '../sql/submit.php';
?>
<!DOCTYPE html>
<html>
    <body>
        <head>  

        <title>Create content</title>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">

            <!--Bootstrap Link-->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
            rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
            <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
            
            <!--Styles-->
            <link rel="stylesheet" href="../styles/home.css">

            <!-- Font Awesome JS -->
            <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
            <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

            <!--CKEEDITOR: RICH TEXT API-->
            <script src="/ckeditor_4.21.0_full/ckeditor/ckeditor.js"></script>
        </head>
        
    <div class="wrapper">

        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Bootstrap Sidebar</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Dummy Heading</p>
                <li>
                    <a href="home.php">Home</a>
                </li>
                <li>
                    <a href="view.php">Knowledge Base</a>
                </li>
                <!-- <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">View Content</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Courses</a>
                        </li>
                        <li>
                            <a href="#">Document</a>
                        </li>
                        <li>
                            <a href="#">Videos</a>
                        </li>
                    </ul>
                </li> -->
                <li  class="active">
                    <a href="create.php">Create Content</a>
                </li>
                <li>
                    <a href="#">Upload Content</a>
                </li>
                <!-- <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Upload Content</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li> -->

                <li>
                    <a href="#">Logout</a>
                </li>
            </ul>
        </nav>
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info" style="margin: 0px">
                        <i class="fas fa-align-left"></i>
                        <span></span>
                    </button>
                </div>
            </nav>
        </div>

        <!-- Buttons-->
        
        <div class="container">
            <!-- We'll fill this with dummy content -->
            <div class="row">
                <div class="col">
                <br>
                <h1>Manage Content</h1>
            </div>
            <div class="row">
            <a href="manage-content/create.php">
            <button type="button" class="btn btn-info">Create Content</button>
            </a>
            <a href="manage-content/upload.php">
            <button type="button" class="btn btn-info">Upload Content</button>
            </a>
            <a href="manage.php">
            <button type="button" class="btn btn-info active">View</button>
            </div>
        </div>


        <!--Content-->
        <br>
        <div class="container">

        <?php if(!empty($statusMsg)){?>
        <p><?php echo $statusMsg; ?></p>
        <?php } ?>

        <form method="post" action="">
            <textarea name="editor" id="editor" rows="10" cols="80">
             This is my textarea to be replaced with HTML editor.
            </textarea>
            <input type="submit" name="submit" value="SUBMIT">
        </form>

        
    <?php if(!empty($statusMsg)){ ?>
        
        <h4>Inserted Content</h4>
        <?php echo $editorContent?>
        
    <?php } ?>
    </div>

    

        <script>
            CKEDITOR.replace('editor');
        </script>
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