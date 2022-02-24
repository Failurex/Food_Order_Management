<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        
                <?php
                    if(isset($_SESSION['ad']))
                    {
                        echo "<br>";
                        echo $_SESSION['ad'];
                        //echo $_SESSION
                        unset($_SESSION['ad']);
                    }
                    echo "<br>"
                ?>
            <form action="" method="POST">
                <fieldset class="tbl-30">
                    <legend><h1><strong>Add Amin</strong></h1></legend>

                    <div class="order-label">Full Name</div>
                    <input type="text" name="full_name" placeholder="E.g. Akram Sarkar" class="input-responsive" required>

                    <div class="order-label">User Name</div>
                    <input type="text" name="user_name" placeholder="E.g. akram_sarkar" class="input-responsive" required>

                    <div class="order-label">Password</div>
                    <input type="password" name="password" placeholder="E.g. 3dja*" class="input-responsive" required>
                    <input type="submit" name="submit" value="Add Admin" class="btn-primary">
                    

                   
                </fieldset>
            </form>
    </div>

</div>

<?php include('partials/footer.php');?>

<?php
//for proccessihng data from page and push into database ;
    if(isset($_POST['submit']))
    {
        //echo "Button activated<br>";
        //get data from form 
          $full_name = $_POST['full_name'];
          "<br>";
          $user_name = $_POST['user_name'];
          "<br>";
          $password = md5($_POST['password']);

         // pass the data to database using set query
         $sql ="INSERT INTO tbl_admin SET
                full_name = '$full_name',
                user_name = '$user_name',
                password = '$password'         
         
         ";
       // execute the query
         $res = mysqli_query($conn, $sql) or die(mysqli_error());

         if($res == TRUE )
         {
            // echo "data is inserted";
            $_SESSION['ad']="<div class='success'>Admin is added successfully</div>";
            // to redirect the page 
            header("location:".SITEURL.'admin/manage-admin.php');
         }
         else{
            $_SESSION['ad']='Admin is added successfully';
            header("location:".SITEURL."admin/manage-admin.php");
         }
         
    }
   
?>
