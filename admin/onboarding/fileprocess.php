<?php
// connect to the database
require_once "../manage-content/dbConfig.php";

//for video
//video upload
if (isset($_POST['savevideo']) && isset($_FILES['my_video'])) {
	include "dbConfig.php";
    $video_name = $_FILES['my_video']['name'];
    $tmp_name = $_FILES['my_video']['tmp_name'];
    $error = $_FILES['my_video']['error'];
    $content_format = "Video";
    $title = $_POST['title'];
    $department = $_POST['department'];


    if ($error === 0) {
    	$video_ex = pathinfo($video_name, PATHINFO_EXTENSION);

    	$video_ex_lc = strtolower($video_ex);

    	$allowed_exs = array("mp4", 'webm', 'avi', 'flv');

    	if (in_array($video_ex_lc, $allowed_exs)) {
    		
    		$new_video_name = uniqid("video-", true). '.'.$video_ex_lc;
    		$video_upload_path = 'video/'.$new_video_name;
    		move_uploaded_file($tmp_name, $video_upload_path);

                //insert into database
                $sql = "INSERT INTO onboarding (department, content_name, content, content_format) VALUES ('$department', '$title', '$new_video_name', '$content_format')";
                $insert = mysqli_query($db, $sql);

            if($insert){
                header('location: onboarding.php?status=success');
            }
            else{
                echo '
                <script type = "text/javascript">
                  alert("Unsuccessful");
                  window.location = "onboarding.php";
                </script>';
            }
            //header("Location: ../manage-content/upload.php");
    	}else {
    		$em = "You can't upload files of this type";
            echo '
            <script type = "text/javascript">
              alert("Wrong format");
              window.location = "onboarding.php";
            </script>';
    		//header("Location: upload.php?error=$em");
    	}
    }


}else{
	//header("Location: upload.php");
}

//for image
if (isset($_POST['saveimage']) && isset($_FILES['my_image'])) {
 

    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];
    $content_format = "Image";
    $title = $_POST['title'];
    $department = $_POST['department'];

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
                $img_upload_path = 'image/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
                
                //insert into database
                $sql = "INSERT INTO onboarding (department, content_name, content, content_format) VALUES ('$department', '$title', '$new_img_name', '$content_format')";
                $insert = mysqli_query($db, $sql);
   
               if($insert){
                header('location: onboarding.php?status=success');
               }
               else{
                echo '
                <script type = "text/javascript">
                  alert("Unsuccessful");
                  window.location = "onboarding.php";
                </script>';
               }
            }else{
                echo '
                <script type = "text/javascript">
                  alert("Wrong format");
                  window.location = "onboarding.php";
                </script>';
            }
        }
    }else{
        $em = "unknown error expected!";

    }
}else{
        
}
//for pdf
if (isset($_POST['save'])) {
    $filename = $_FILES['my_pdf']['name'];
    $pdf_size = $_FILES['my_pdf']['size'];
    $tmp_name = $_FILES['my_pdf']['tmp_name'];
    $error = $_FILES['my_pdf']['error'];
    $title = $_POST['title'];
    $department = $_POST['department'];
    $content_format = 'PDF';

    if($error === 0){
        if($pdf_size > 12500000){
            $em = "Sorry, file too large";
           // header("Location: upload.php?error=$em");
        }else{
            $pdf_ex = pathinfo($filename, PATHINFO_EXTENSION); //checking extension belakang.. .txt, .png etc. can echo ($img_ex) to try
            $pdf_ex_lc = strtolower($pdf_ex);

            $allowed_exs = array("pdf");

            if(in_array($pdf_ex_lc, $allowed_exs)){
              $query=mysqli_query($db,"SELECT * FROM onboarding WHERE content = '$filename'")or die(mysqli_error($db));
              $counter=mysqli_num_rows($query);
                        
                        if ($counter == 1) 
                          { 
                            
                               echo '
                            <script type = "text/javascript">
                                alert("Files already taken");
                                window.location = "onboarding.php";
                            </script>
            
            
                           ';
                          }
                else{
                $new_pdf_name = uniqid("PDF-",true).'.'.$pdf_ex_lc;
                $pdf_upload_path = 'OBuploads/'.$new_pdf_name;
                move_uploaded_file($tmp_name, $pdf_upload_path);

                $sql = "INSERT INTO onboarding (department, content_name, content, content_format) VALUES ('$department', '$title', '$new_pdf_name', '$content_format')";
                $insert = mysqli_query($db, $sql);

               if($insert){
                header('location: onboarding.php?status=success');
               }
               else{
                echo '
                <script type = "text/javascript">
                alert("File Not Uploaded");
                window.location = "onboarding.php";
                </script>';
               }
              }
            }else{
              echo '
              <script type = "text/javascript">
                alert("Wrong Format");
                window.location = "onboarding.php";
              </script>';
            }
        }
    }else{
        $em = "unknown error expected!";

    }
}else{
   
}