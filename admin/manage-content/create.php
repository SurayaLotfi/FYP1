<?php
 include_once 'submit.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Home</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">   
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../styles/home.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <!--CKEEDITOR: RICH TEXT API-->
    <script src="/ckeditor_4.21.0_full/ckeditor/ckeditor.js"></script>

</head>

<body>
    <div class="wrapper">

        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Bootstrap Sidebar</h3>
            </div>
    
            <ul class="list-unstyled components">
                <p>Dummy Heading</p>
                <li>
                    <a href="/admin/home.php">Home</a>
                </li>
                <li class="active">
                    <a href="/admin/manage.php">Manage Content</a>
                </li>
                <li>
                    <a href="/admin/kb.php">Knowledge Base</a>
                </li>
                <!-- <li >
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
                <li>
                    <a href="/admin/class.php">Classes</a>
                </li>
                <li>
                    <a href="/admin/onboarding.php">Onboarding</a>
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
        <div id="home">
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
        <div id="content">
            <div class="container">
            <!-- We'll fill this with dummy content -->
            <div class="row">   
            <h1>Manage Content</h1>
            
            </div>
            <div class="row">
                <div class="buttons">
                    <a href="manage.php">
                    <button type="button" class="btn btn-info ">View</button>
                    </a>
                    <a href="upload.php">
                    <button type="button" class="btn btn-info">Upload Content</button>
                    </a>
                    <a href="create.php">
                    <button type="button" class="btn btn-info active">Create Content</button>
                    </a>
                </div>
            </div>
        <br>
        
        

        <!--Create Content-->
        
        <div class="container">
           
           
            <?php if(!empty($statusMsg)){?>
            <p><?php echo $statusMsg; ?></p>
            <?php } ?>

            <form method="post" action="">
                <textarea name="editor" id="editor" rows="10" cols="80">
                Enter text
                </textarea>

                <form>
                    <div class="form-group">
                        <label for="content-type-select"><h3>Post to:</h3></label>
                        <select class="form-control" id="content-type-select" name="content_type">
                            <option value="knowledge_base">Knowledge Base</option>
                            <option value="classes">Classes</option>
                            <option value="both">Both</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info" name="submit">SUBMIT</button>
                    </form>

            <?php if(!empty($statusMsg)){ ?>

            <h4>Inserted Content</h4>
            <?php echo $editorContent?>

            <?php } ?>
            </div> <!--div for the ckeditor's container-->
        
            <script>
                CKEDITOR.replace('editor');
            </script>
        </div> 
            
        </div>
    </div>  

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!--JScript to handle dropdown select-->
    <script>
$(document).ready(function() {
  $('.dropdown-item').on('click', function() {
    var selectedValue = $(this).data('value');
    $('#content-type-input').val(selectedValue);
    $('.dropdown-toggle').text('Post to ');
    $('.dropdown-toggle').append('<span class="caret"></span>');
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

</body>

</html>