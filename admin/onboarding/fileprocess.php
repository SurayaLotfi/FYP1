<?php
// connect to the database
require_once "../manage-content/dbConfig.php";

//for pdf
if (isset($_POST['save'])) {
    $filename = $_FILES['my_pdf']['name'];
    $pdf_size = $_FILES['my_pdf']['size'];
    $tmp_name = $_FILES['my_pdf']['tmp_name'];
    $error = $_FILES['my_pdf']['error'];
    $title = $_POST['title'];
    $department = $_POST['department'];

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
                
                //insert into database
                // $insert = $db->query("INSERT INTO manage_content(content_name, content_format, content_type, content)
                // VALUES('$content_name', '$content_format', '$content_type', '$new_pdf_name')");

                $sql = "INSERT INTO onboarding (department, content_name, content) VALUES ('$department', '$title', '$new_pdf_name')";
                $insert = mysqli_query($db, $sql);

               if($insert){
                echo '
                <script type = "text/javascript">
                alert("File Uploaded");
                window.location = "onboarding.php";
                 </script>';
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