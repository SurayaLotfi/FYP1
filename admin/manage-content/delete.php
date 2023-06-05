<?
require_once 'dbConfig.php';

if(isset($_GET['deleteid'])){
   $id = $_GET['deleteid'];

   $sql = "DELETE FROM manage_content WHERE id=$id";
   $result = mysqli_query($db,$sql);
   if($result){
      echo "Deleted successfully";
      header('location: manage.php');
   }else{
      echo "Connection failed";
   }
}else{
   echo "hello";
}
 
?>