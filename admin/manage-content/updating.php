<?php
require_once 'dbConfig.php';
echo "Hello!";
//video update
if (isset($_POST['submit']) && isset($_FILES['my_video'])) {
    echo "Hello!";
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
            echo "Hello!";
    		
    		$new_video_name = uniqid("video-", true). '.'.$video_ex_lc;
    		$video_upload_path = 'uploads/'.$new_video_name;
    		move_uploaded_file($tmp_name, $video_upload_path);

    		// Now let's update the video path into database
            $insert = $db -> query("UPDATE manage_content set id=$id, content_name='$content_name',
                                    content_format='$content_format', content_type='$content_type', content='$content' WHERE id=$id");

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
    }


}else{
    echo "invalid";
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
        $em = "unknown error expected!";

    }
}else{
        
}
?>