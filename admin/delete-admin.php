<?php
   // first we need to get the id
   $id = $_GET['id'];
    include('../config/constant.php');

   // then we need to write query
    $sql= "DELETE FROM tbl_admin WHERE id=$id";

   // then we need to execute the query
   $res= mysqli_query($conn, $sql);
   if($res == TRUE)
   {
       $_SESSION['delete']="<div class='success'>Deletion Successflly</div>";
       header("location:".SITEURL.'admin/manage-admin.php');
   }
   else 
   {
    $_SESSION['delete']="Deletion Failed";
    header("location:".SITEURL.'admin/manage-admin.php');
   }

   // then we need to redirect to the manage-admin page 
?>