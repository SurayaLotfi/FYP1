<?php

include "connect.php";


if(isset($_POST['delete'])){
   $id = $_POST['delete_id'];
    $statusMsg = "";


   $sql = "DELETE FROM onboarding WHERE id=$id";
   $result = mysqli_query($db,$sql);
   if($result){
    ?>
            <script type = "text/javascript">
            alert("Delete Successful");
            window.location = "viewonboarding.php";
            </script>
    <?php
   }else{
    ?>
    <script type = "text/javascript">
    alert("Delete unSuccessful");
    window.location = "viewonboarding.php";
    </script>
    <?php
   }
   
}else{
   
}
?>