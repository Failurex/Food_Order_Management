

<?php
        
        
        if(!isset($_SESSION['user']))
        {
                $_SESSION['no_login']="<div class='text-center '><div class='error'>Please login first to access the admin panel</div></div>";
                header('location:'.SITEURL.'admin/login.php');
        }
?>