<?php
include('../config/constant.php');
//destroy our session that we have created
session_destroy();
// redirect to the login page 
header("location:".SITEURL.'admin/login.php');
?>