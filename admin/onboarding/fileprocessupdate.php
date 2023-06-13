<?php
// connect to the database
require_once "../manage-content/dbConfig.php";

//for image
if (isset($_POST['updateimage'])) {

  $img_name = $_FILES['my_image']['name'];
  $img_size = $_FILES['my_image']['size'];
  $tmp_name = $_FILES['my_image']['tmp_name'];
  $error = $_FILES['my_image']['error'];
  $content_format = "Image";
  $content_name = $_POST['content_name'];
  $department = $_POST['department'];
  $id = $_POST['image_id'];

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
              
              //update into database
              $sql = "UPDATE onboarding set department = '$department', content_name='$content_name', content='$new_img_name' WHERE id=$id";
              $insert = mysqli_query($db, $sql);
 
             if($insert){
              header('location: viewonboarding.php?status=updatesuccess');
             }
             else{
                 echo "Update Unsuccesful do";
             }
          }else{
              echo "wrong format!";
          }
      }
  }else{
    //if content was not changed
    $sql = "UPDATE onboarding set  department = '$department', content_name='$content_name' WHERE id=$id";
    $insert = mysqli_query($db, $sql);
      if ($insert) {
        header('location: viewonboarding.php?status=updatesuccess');
      } else {
          echo "Update Unsuccessful";
      }

  }
}else{
      
}
//for video
if (isset($_POST['updatevideo'])) {
   
  $video_name = $_FILES['my_video']['name'];
  $tmp_name = $_FILES['my_video']['tmp_name'];
  $error = $_FILES['my_video']['error'];
  $content_format = "Video";
  $content_name = $_POST['content_name'];
  $department = $_POST['department'];
  $id = $_POST['video_id'];
  if ($error === 0) {
      $video_ex = pathinfo($video_name, PATHINFO_EXTENSION);

      $video_ex_lc = strtolower($video_ex);

      $allowed_exs = array("mp4", 'webm', 'avi', 'flv');

      if (in_array($video_ex_lc, $allowed_exs)) {
          echo "hello 4";
          $new_video_name = uniqid("video-", true). '.'.$video_ex_lc;
          $video_upload_path = 'video/'.$new_video_name;
          move_uploaded_file($tmp_name, $video_upload_path);

          // Now let's update the video path into database
          $sql = "UPDATE onboarding set department = '$department', content_name='$content_name', content='$new_video_name' WHERE id=$id";
          $insert = mysqli_query($db, $sql);

          if($insert){
            header('location: viewonboarding.php?status=updatesuccess');
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

      // No new file uploaded, keep the previous file's name
      // Update the other form data in the database without changing the content field
      $sql = "UPDATE onboarding set department = '$department', content_name='$content_name' WHERE id=$id";
      $insert = mysqli_query($db, $sql);

      if ($insert) {
          header('location: viewonboarding.php?status=updatesuccess');
      } else {
          echo "Update Unsuccessful";
      }
  }
}else{

}
//for pdf
if (isset($_POST['updatepdf'])) {
    $filename = $_FILES['my_pdf']['name'];
    $pdf_size = $_FILES['my_pdf']['size'];
    $tmp_name = $_FILES['my_pdf']['tmp_name'];
    $error = $_FILES['my_pdf']['error'];
    $content_name = $_POST['content_name'];
    $department = $_POST['department'];
    $id = $_POST['pdf_id'];
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
                                window.location = "viewonboarding.php";
                            </script>
            
            
                           ';
                          }
                else{
                $new_pdf_name = uniqid("PDF-",true).'.'.$pdf_ex_lc;
                $pdf_upload_path = 'OBuploads/'.$new_pdf_name;
                move_uploaded_file($tmp_name, $pdf_upload_path);
                
                //insert into database
                // $insert = $db->query("INSERT INTO manage_content(content_name, content_format, content_type, content)
                // VALUES('$content_name', '$content_format', '$content_type', '$new_pdf_name')");
                
                $sql = "UPDATE onboarding set department = '$department', content_name='$content_name', content='$new_pdf_name' WHERE id=$id";
                $insert = mysqli_query($db, $sql);
               if($insert){
                header('location: viewonboarding.php?status=updatesuccess');
               }
               else{
                echo '
                <script type = "text/javascript">
                alert("File Not Updated");
                window.location = "viewonboarding.php";
                </script>';
               }
              }
            }else{
              echo '
              <script type = "text/javascript">
                alert("Wrong Format");
                window.location = "viewonboarding.php";
              </script>';
            }
        }
    }else{
        //if there's no new file uploaded
        $sql = "UPDATE onboarding set  department = '$department', content_name='$content_name' WHERE id=$id";
        $insert = mysqli_query($db, $sql);
            if($insert){
              header('location: viewonboarding.php?status=updatesuccess');
            }
       else{
        echo '
        <script type = "text/javascript">
        alert("File Not Updated");
        window.location = "viewonboarding.php";
        </script>';
       }

    }
}else{
   
}