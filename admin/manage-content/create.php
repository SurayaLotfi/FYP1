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
                <h3>Welcome, Admin</h3>
            </div>
    
            <ul class="list-unstyled components">
                <p>Admin</p>
                <li>
                    <a href="/admin/home.php">Home</a>
                </li>
                <li class="active">
                    <a href="/admin/manage.php">Manage Content</a>
                </li>
                <li>
                    <a href="/admin/kb.php">Onboarding</a>
                </li>
                <li>
                    <a href="/admin/class.php">Dashboard</a>
                </li>
                <li>
                    <a href="#">Logout</a>
                </li>
            </ul>
        </nav>

    
        <!-- Buttons-->
        
        <div class="container-fluid" style="margin-left: 19px">
            <!-- We'll fill this with dummy content -->
            <div class="row" style="margin-top: 20px">
          
            <div style="margin-left: 6px">
                <h3>Manage Content</h3>
            </div>
            
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
        
        <div class="container" style="padding: 50px; padding-top: 5px">
           
           
            <?php if(!empty($statusMsg)){?>
            <p><?php echo $statusMsg; ?></p>
            <?php } ?>

            <form method="post" action="">
                <textarea name="editor" id="editor" rows="10" cols="80">
                Enter text
                </textarea>

            <!--Enter Content Name-->
            <div class="input-group mb-3" style="margin: 10px;">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Enter Content Name</span>
                    </div>
                        <input type="text"  name= "content_name" id="content_name" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>

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