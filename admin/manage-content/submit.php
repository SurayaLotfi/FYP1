<html>
    <head>
                        <!--Sweet Alert-->
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <body>


<?php
require_once 'dbConfig.php';
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
        $insert = $db->query("INSERT INTO manage_content (content_format, content_type, content_name, content, date_created)
                 VALUES ('$content_format','$content_type','$content_name','".$editorContent."', NOW())"); 
        
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

//inserting content based on content type they have chose to upload

//video upload
if (isset($_POST['submit']) && isset($_FILES['my_video'])) {
	include "dbConfig.php";
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
    		
    		$new_video_name = uniqid("video-", true). '.'.$video_ex_lc;
    		$video_upload_path = 'uploads/'.$new_video_name;
    		move_uploaded_file($tmp_name, $video_upload_path);

    		// Now let's Insert the video path into database
            // $sql = "INSERT INTO manage_content(content) 
            //        VALUES('$new_video_name')";
            $insert = $db->query("INSERT INTO manage_content(content_name, content_format, content_type, content)
             VALUES('$content_name', '$content_format', '$content_type', '$new_video_name')");

            if($insert){
                echo "Upload Successful";
            }
            else{
                echo "Upload Unsuccesful";
            }
            //header("Location: ../manage-content/upload.php");
    	}else {
    		$em = "You can't upload files of this type";
    		//header("Location: upload.php?error=$em");
    	}
    }


}else{
	//header("Location: upload.php");
}

//for image
include "dbConfig.php";
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
                
                //insert into database
                $insert = $db->query("INSERT INTO manage_content(content_name, content_format, content_type, content)
                VALUES('$content_name', '$content_format', '$content_type', '$new_img_name')");
   
               if($insert){
                   echo "Upload Successful";
               }
               else{
                   echo "Upload Unsuccesful do";
               }
            }else{
                echo "wrong format!";
            }
        }
    }else{
        $em = "unknown error expected!";

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
                $new_pdf_name = uniqid("PDF-",true).'.'.$pdf_ex_lc;
                $pdf_upload_path = 'pdf/'.$new_pdf_name;
                move_uploaded_file($tmp_name, $pdf_upload_path);
                
                //insert into database
                $insert = $db->query("INSERT INTO manage_content(content_name, content_format, content_type, content)
                VALUES('$content_name', '$content_format', '$content_type', '$new_pdf_name')");
   
               if($insert){
                   echo "Upload Successful";
               }
               else{
                   echo "Upload Unsuccesful";
               }
            }else{
                echo "Wrong format";
            }
        }
    }else{
        $em = "unknown error expected!";

    }
}else{
        
}




// delete
// include "dbConfig.php";

// if(isset($_GET['deleteid'])){
//    $id = $_GET['deleteid'];
//     $statusMsg = "";


//    $sql = "DELETE FROM manage_content WHERE id=$id";
//    $result = mysqli_query($db,$sql);
//    if($result){
//     header('location: manage.php?status=success'); //navigate to manage.php.. where? at the status where it mentions success.
//    }else{
//     header('location: manage.php?status=error');
//    }
// }else{
//}
// 
include "dbConfig.php";

if(isset($_POST['id'])){
   $id = $_POST['id'];
    $statusMsg = "";


   $sql = "DELETE FROM manage_content WHERE id=$id";
   $result = mysqli_query($db,$sql);
   if($result){
    header('location: manage.php?status=success'); //navigate to manage.php.. where? at the status where it mentions success.
   }else{
    header('location: manage.php?status=error');
   }
}else{
   
}

// // update

// //video update
// if (isset($_POST['updateid']) && isset($_FILES['my_video'])) {
//     $id = $_POST['updateid'];
//     $sql = "SELECT * FROM manage_content WHERE id=$id";
//     $result=mysqli_query($db, $sql);
//     $row = mysqli_fetch_assoc($result);
//     $content_name = $row['content_name'];
//     $content_format = $row['content_format'];
//     $content_type = $row['content_type'];

// 	include "dbConfig.php";
//     $video_name = $_FILES['my_video']['name'];
//     $tmp_name = $_FILES['my_video']['tmp_name'];
//     $error = $_FILES['my_video']['error'];
//     $content_format = "Video";
//     $content_name = $_POST['content_name'];
//     $content_type = $_POST['content_type'];


//     if ($error === 0) {
//     	$video_ex = pathinfo($video_name, PATHINFO_EXTENSION);

//     	$video_ex_lc = strtolower($video_ex);

//     	$allowed_exs = array("mp4", 'webm', 'avi', 'flv');

//     	if (in_array($video_ex_lc, $allowed_exs)) {
    		
//     		$new_video_name = uniqid("video-", true). '.'.$video_ex_lc;
//     		$video_upload_path = 'uploads/'.$new_video_name;
//     		move_uploaded_file($tmp_name, $video_upload_path);

//     		// Now let's update the video path into database
//             $insert = $db -> query("UPDATE manage_content set id=$id, content_name='$content_name',
//                                     content_format='$content_format', content_type='$content_type', content='$content' WHERE id=$id");

//             if($insert){
//                 echo "Update Successful";
//             }
//             else{
//                 echo "Update Unsuccesful";
//             }
//             //header("Location: ../manage-content/upload.php");
//     	}else {
//     		$em = "You can't upload files of this type";
//     		//header("Location: upload.php?error=$em");
//     	}
//     }


// }else{
// 	//header("Location: upload.php");
// }

// //for image
// include "dbConfig.php";
// if (isset($_POST['updateid']) && isset($_FILES['my_image'])) {
//     $id = $_POST['updateid'];

//     $img_name = $_FILES['my_image']['name'];
//     $img_size = $_FILES['my_image']['size'];
//     $tmp_name = $_FILES['my_image']['tmp_name'];
//     $error = $_FILES['my_image']['error'];
//     $content_format = "Image";
//     $content_name = $_POST['content_name'];
//     $content_type = $_POST['content_type'];

//     if($error === 0){
//         if($img_size > 12500000){
//             $em = "Sorry, file too large";
//            // header("Location: upload.php?error=$em");
//         }else{
//             $img_ex = pathinfo($img_name, PATHINFO_EXTENSION); //checking extension belakang.. .txt, .png etc. can echo $img_ex to try
//             $img_ex_lc = strtolower($img_ex);

//             $allowed_exs = array("jpg", "jpeg", "png");

//             if(in_array($img_ex_lc, $allowed_exs)){
//                 $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
//                 $img_upload_path = 'img/'.$new_img_name;
//                 move_uploaded_file($tmp_name, $img_upload_path);
                
//                 //update into database
//                 $insert = $db -> query("UPDATE manage_content set id=$id, content_name='$content_name',
//                 content_format='$content_format', content_type='$content_type', content='$content' WHERE id=$id");
   
//                if($insert){
//                    echo "Upload Successful";
//                }
//                else{
//                    echo "Upload Unsuccesful do";
//                }
//             }else{
//                 echo "wrong format!";
//             }
//         }
//     }else{
//         $em = "unknown error expected!";

//     }
// }else{
        
// }


// //for pdf
// include "dbConfig.php";
// if (isset($_POST['updateid']) && isset($_FILES['my_pdf'])) {
//     $id = $_POST['updateid'];

//     $pdf_name = $_FILES['my_pdf']['name'];
//     $pdf_size = $_FILES['my_pdf']['size'];
//     $tmp_name = $_FILES['my_pdf']['tmp_name'];
//     $error = $_FILES['my_pdf']['error'];
//     $content_format = "PDF";
//     $content_name = $_POST['content_name'];
//     $content_type = $_POST['content_type'];

//     if($error === 0){
//         if($pdf_size > 12500000){
//             $em = "Sorry, file too large";
//            // header("Location: upload.php?error=$em");
//         }else{
//             $pdf_ex = pathinfo($pdf_name, PATHINFO_EXTENSION); //checking extension belakang.. .txt, .png etc. can echo ($img_ex) to try
//             $pdf_ex_lc = strtolower($pdf_ex);

//             $allowed_exs = array("pdf");

//             if(in_array($pdf_ex_lc, $allowed_exs)){
//                 $new_pdf_name = uniqid("IMG-",true).'.'.$pdf_ex_lc;
//                 $pdf_upload_path = 'img/'.$new_pdf_name;
//                 move_uploaded_file($tmp_name, $pdf_upload_path);
                
//                 //update into database
//                 $insert = $db -> query("UPDATE manage_content set id=$id, content_name='$content_name',
//                 content_format='$content_format', content_type='$content_type', content='$content' WHERE id=$id");
   
//                if($insert){
//                    echo "Upload Successful";
//                }
//                else{
//                    echo "Upload Unsuccesful";
//                }
//             }else{
//                 echo "Wrong format";
//             }
//         }
//     }else{
//         $em = "unknown error expected!";

//     }
// }else{
        
// }


?>

</body>
    </head>
</html>