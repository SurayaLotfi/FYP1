<?php
include "dbConfig.php";
// update
if(isset($_GET['updateid'])){
 $id = $_GET['updateid'];
$sql = "SELECT * FROM manage_content WHERE id=$id";
$result=mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
$content_name = $row['content_name'];
$content_format = $row['content_format'];
$content_type = $row['content_type'];
$content = $row['content'];

//editor update
$editorContent = $statusMsg = '';

// If the form is submitted
if(isset($_POST['submit']) && isset($_POST['editor'])){
    // Get editor content

    $editorContent = $_POST['editor'];
    $content_format = "HTML";
    $content_type = $_POST['content_type'];
    $content_name = $_POST['content_name'];

    
    // Check whether the editor content is empty
    if(!empty($editorContent)){
        // Insert editor content in the database
$insert = $db -> query("UPDATE manage_content set id=$id, content_name='$content_name',
                                        content_format='$content_format', content_type='$content_type', content='$editorContent' WHERE id=$id");
        
        // If database insertion is successful
        if($insert){
            $statusMsg = "The editor content has been inserted successfully.";
        }else{
            $statusMsg = "Some problem occurred, please try again.";
        } 
    }else{
        $statusMsg = 'Please add content in the editor.';
    }
}else{
    
}

//video update
if (isset($_POST['submit']) && isset($_FILES['my_video'])) {
   
        $video_name = $_FILES['my_video']['name'];
        $tmp_name = $_FILES['my_video']['tmp_name'];
        $error = $_FILES['my_video']['error'];
        $content_format = "Video";
        $content_name = $_POST['content_name'];
        $content_type = $_POST['content_type'];
        if ($error === 0) {
            $video_ex = pathinfo($video_name, PATHINFO_EXTENSION);

            $video_ex_lc = strtolower($video_ex);

            $allowed_exs = array("mp4", 'webm', 'avi', 'flv');

            if (in_array($video_ex_lc, $allowed_exs)) {
                echo "hello 4";
                $new_video_name = uniqid("video-", true). '.'.$video_ex_lc;
                $video_upload_path = 'uploads/'.$new_video_name;
                move_uploaded_file($tmp_name, $video_upload_path);

                // Now let's update the video path into database
                $insert = $db -> query("UPDATE manage_content set id=$id, content_name='$content_name',
                                        content_format='$content_format', content_type='$content_type', content='$new_video_name' WHERE id=$id");

                if($insert){
                    echo "Update Successful";
                }
                else{
                    echo "Update Unsuccesful";
                }
                //header("Location: ../manage-content/upload.php");
            }else {
                $em = "You can't upload files of this type";
                //header("Location: upload.php?error=$em");
            }
        }else{
        $video_name = $_FILES['my_video']['name'];
        $tmp_name = $_FILES['my_video']['tmp_name'];
        $error = $_FILES['my_video']['error'];
        $content_format = "Video";
        $content_name = $_POST['content_name'];
        $content_type = $_POST['content_type'];
            // No new file uploaded, keep the previous file's name
            // Update the other form data in the database without changing the content field
            $insert = $db -> query("UPDATE manage_content set id=$id, content_name='$content_name',
            content_format='$content_format', content_type='$content_type' WHERE id=$id");

            if ($insert) {
                echo "Update Successful";
            } else {
                echo "Update Unsuccessful";
            }
        }
}else{

}

//for image
if (isset($_POST['submit']) && isset($_FILES['my_image'])) {


    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];
    $content_format = "Image";
    $content_name = $_POST['content_name'];
    $content_type = $_POST['content_type'];

    if($error === 0){
        if($img_size > 12500000){
            $em = "Sorry, file too large";
           // header("Location: upload.php?error=$em");
        }else{
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION); //checking extension belakang.. .txt, .png etc. can echo $img_ex to try
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if(in_array($img_ex_lc, $allowed_exs)){
                $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
                $img_upload_path = 'img/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
                
                //update into database
                $insert = $db -> query("UPDATE manage_content set id=$id, content_name='$content_name',
                content_format='$content_format', content_type='$content_type', content='$content' WHERE id=$id");
   
               if($insert){
                   echo "Update Successful";
               }
               else{
                   echo "Update Unsuccesful do";
               }
            }else{
                echo "wrong format!";
            }
        }
    }else{
        $insert = $db -> query("UPDATE manage_content set id=$id, content_name='$content_name',
        content_format='$content_format', content_type='$content_type' WHERE id=$id");
        if ($insert) {
            echo "Update Successful";
        } else {
            echo "Update Unsuccessful";
        }

    }
}else{
        
}


//for pdf
include "dbConfig.php";
if (isset($_POST['submit']) && isset($_FILES['my_pdf'])) {
  

    $pdf_name = $_FILES['my_pdf']['name'];
    $pdf_size = $_FILES['my_pdf']['size'];
    $tmp_name = $_FILES['my_pdf']['tmp_name'];
    $error = $_FILES['my_pdf']['error'];
    $content_format = "PDF";
    $content_name = $_POST['content_name'];
    $content_type = $_POST['content_type'];

    if($error === 0){
        if($pdf_size > 12500000){
            $em = "Sorry, file too large";
           // header("Location: upload.php?error=$em");
        }else{
            $pdf_ex = pathinfo($pdf_name, PATHINFO_EXTENSION); //checking extension belakang.. .txt, .png etc. can echo ($img_ex) to try
            $pdf_ex_lc = strtolower($pdf_ex);

            $allowed_exs = array("pdf");

            if(in_array($pdf_ex_lc, $allowed_exs)){
                $new_pdf_name = uniqid("IMG-",true).'.'.$pdf_ex_lc;
                $pdf_upload_path = 'img/'.$new_pdf_name;
                move_uploaded_file($tmp_name, $pdf_upload_path);
                
                //update into database
                $insert = $db -> query("UPDATE manage_content set id=$id, content_name='$content_name',
                content_format='$content_format', content_type='$content_type', content='$content' WHERE id=$id");
   
               if($insert){
                   echo "Update Successful";
               }
               else{
                   echo "Update Unsuccesful";
               }
            }else{
                echo "Wrong format";
            }
        }
    }else{
        $insert = $db -> query("UPDATE manage_content set id=$id, content_name='$content_name',
        content_format='$content_format', content_type='$content_type' WHERE id=$id");
                if ($insert) {
                    echo "Update Successful";
                } else {
                    echo "Update Unsuccessful";
                }
        
    }
}else{
        
}
}


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
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="/admin/styles/home.css">
    <link rel="stylesheet" href="/admin/manage-content/manage.css">

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
        
        <div class="container-fluid" style="margin-left: 10px">
            <!-- We'll fill this with dummy content -->
            <div class="row" style="margin-top: 20px">
                <div style="margin-left: 9px">
                <h3>Update Content</h3>
                </div>
            </div>
            <div class="row">
                <div class="buttons">
                <a href="manage.php">
                    <button type="button" class="btn btn-info active ">Back</button>
                    </a>
                    <a href="upload.php">
                    <button type="button" class="btn btn-info ">Upload Content</button>
                    </a>
                    <a href="create.php">
                    <button type="button" class="btn btn-info ">Create Content</button>
                    </a>
                </div>
            </div>

            <!--Uploads-->
            
            <div class="container">
            <div class="row">
                
        <?php


            if($content_format === "Video"){
                ?>
            <!--Form for Video-->
            <div class="card">
                <h5 class="card-header info-color white-text text-center py-4">
                <strong>Upload Video Form</strong>
                </h5>
                <div class="card-body  px-lg-5 pt-0">
                    <div class="container" style="display: flex; justify-content: center; align-items: center">
                    <div class="row" style="padding: 10px"><br><br>
                        <form action="" method="post" enctype="multipart/form-data" >
                            <!--Document Title-->
                            <div class="form-group">
                                <label for="Title">Title</label>
                                <input type="text" class="form-control" id="content_name" name="content_name" value="<?php echo $content_name?>">
                            </div>

                            <!--Enter Content Type-->
                            <div class="form-group" style="margin: 10px;">
                                    <label for="content-type-select"><h6>Post to:</h6></label>
                                    <select class="form-control" id="content-type-select" name="content_type">
                                        <option value="knowledge_base" <?php if ($content_type === 'knowledge_base') echo 'selected'; ?>>Knowledge Base</option>
                                        <option value="classes" <?php if ($content_type === 'classes') echo 'selected'; ?>>Classes</option>
                                        <option value="both" <?php if ($content_type === 'both') echo 'selected'; ?>>Both</option>
                                    </select>
                            </div>

                        <label for="subject" class="">Upload Video</label>
                        <input type="file" name="my_video">
                        
                        <button  type="submit" class="btn btn-info btn-rounded btn-block my-4 waves-effect z-depth-0"  name="submit" type="submit">UPDATE</button>
                        <footer style="font-size: 12px"><b>File Type:</b><font color="red"><i> .png .jpeg only</i></font></footer>
                        </form>
                    </div>
                    </div>  
                </div>
                </div>
                <?php }

                elseif($content_format === "Image"){
                ?>
                
                <!--Form for Images-->   
                <form action="" method="post" enctype="multipart/form-data">

                <!--Enter Content Name-->
                    <div class="input-group mb-3" style="margin: 10px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Enter Content Name</span>
                        </div>
                        <input type="text"  value="<?php echo $content_name?>" name= "content_name" id="content_name" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>


                   <!--Enter Content Type-->
                   <div class="form-group" style="margin: 10px;">
                        <label for="content-type-select"><h6>Post to:</h6></label>
                        <select class="form-control" id="content-type-select" name="content_type">
                            <option value="knowledge_base" <?php if ($content_type === 'knowledge_base') echo 'selected'; ?>>Knowledge Base</option>
                            <option value="classes" <?php if ($content_type === 'classes') echo 'selected'; ?>>Classes</option>
                            <option value="both" <?php if ($content_type === 'both') echo 'selected'; ?>>Both</option>
                        </select>
                </div>

                
                <div style="margin: 15px;">
                            <label>Image</label>
                            <input type = "file" name="my_image">
                </div>

                <div style="margin: 15px;">
                    <input type="submit" name="submit"  value="Update Image">
                </div>

            </form>
            <?php
                }
                elseif($content_format==="PDF"){
                ?>

                           <!--Form for PDF-->   
                           <form action="" method="post" enctype="multipart/form-data">

                                <!--Enter Content Name-->
                                    <div class="input-group mb-3" style="margin: 10px;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Enter Content Name</span>
                                        </div>
                                        <input type="text"  value="<?php echo $content_name?>" name= "content_name" id="content_name" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>


                 <!--Enter Content Type-->
                 <div class="form-group" style="margin: 10px;">
                        <label for="content-type-select"><h6>Post to:</h6></label>
                        <select class="form-control" id="content-type-select" name="content_type">
                            <option value="knowledge_base" <?php if ($content_type === 'knowledge_base') echo 'selected'; ?>>Knowledge Base</option>
                            <option value="classes" <?php if ($content_type === 'classes') echo 'selected'; ?>>Classes</option>
                            <option value="both" <?php if ($content_type === 'both') echo 'selected'; ?>>Both</option>
                        </select>
                </div>


                                <div style="margin: 15px;">
                                            <label>PDF</label>
                                            <input type = "file" name="my_pdf">
                                </div>

                                <div style="margin: 15px;">
                                    <input type="submit" name="submit"  value="Update PDF">
                                </div>

                                </form>
                    <!--ckeditor-->
                    <?php
                }elseif($content_format==="HTML"){
                ?>
            <div class="container">
            <?php if(!empty($statusMsg)){?>
            <p><?php echo $statusMsg; ?></p>
            <?php } ?>

            <form method="post" action="">
                <textarea name="editor"  id="editor" rows="10" cols="80">
                <?php echo $content ?>
                </textarea>

            <!--Enter Content Name-->
            <div class="input-group mb-3" style="margin: 10px;">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Enter Content Name</span>
                    </div>
                        <input type="text" value="<?php echo $content_name?>" name= "content_name" id="content_name" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>

                <!--Enter Content Type-->
                <div class="form-group" style="margin: 10px;">
                        <label for="content-type-select"><h6>Post to:</h6></label>
                        <select class="form-control" id="content-type-select" name="content_type">
                            <option value="knowledge_base" <?php if ($content_type === 'knowledge_base') echo 'selected'; ?>>Knowledge Base</option>
                            <option value="classes" <?php if ($content_type === 'classes') echo 'selected'; ?>>Classes</option>
                            <option value="both" <?php if ($content_type === 'both') echo 'selected'; ?>>Both</option>
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

                <?php }
                ?>
                    <!-- Upload response -->
                <!-- <?php 
                // if(isset($_SESSION['message'])){
                // echo $_SESSION['message'];
                // unset($_SESSION['message']);
                // }
                ?> -->
               
               


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