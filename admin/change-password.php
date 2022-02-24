<?php include('partials/menu.php');?>
    <div class ="main-content">
        <div class="wrapper">

        <?php
         $id = $_GET['id'];      
                $sql= "SELECT * FROM tbl_admin WHERE id=$id";
                $res=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($res); 
                if($count!=1)
                {
                    $_SESSION['change_pass']="<div class='error'>user not found</div>";
                    header("location:".SITEURL.'admin/manage-admin.php');
                } 
                if(isset($_SESSION['change_pass']))
                {
                    echo $_SESSION['change_pass'];
                    unset($_SESSION['change_pass']);
                    echo "<br><br>";
                }  
         
        ?>
       
            <form action="" method="POST">
              <fieldset class="tbl-30">
                  <legend><h1><strong>Change Password</strong></h1></legend>
                  <div class="order-label">Current Password</div>
                <input type="password" name="current_password"  placeholder= "Current password" class="input-responsive" required>
                <div class="order-label">New Password</div>
                <input type="password" name="new_password"  placeholder= "New password" class="input-responsive" required>
                <div class="order-level">Confirm Password</div>
                <input type="password" name="confirm_password" placeholder="current password" class="input-responsive" required>
                <input type="hidden" name="id" value="<?php echo $id?>">
                <input type="submit" name ="submit"  value= "submit" class="btn-primary">
              </fieldset> 

            </form>
        </div>

    </div>
    <?php
    if(isset($_POST['submit']))
        {
             $id =$_POST['id'];
             $current_password=md5($_POST['current_password']);
             $new_password=md5($_POST['new_password']);
             $confirm_password=md5($_POST['confirm_password']);
             $sql="SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";
             $res=mysqli_query($conn,$sql);
             if($res==TRUE)//if the query executed then it will be true a
             {
                 $count=mysqli_num_rows($res);
                 if($count==1)
                 {
                    if($confirm_password==$new_password)
                    {
                        $sql="UPDATE tbl_admin SET password='$new_password' WHERE id=$id";
                        $res=mysqli_query($conn,$sql);
                        $_SESSION['change_pass']="<div class='success'>Password updation succcessful</div>";;
                        header("location:".SITEURL."admin/manage-admin.php");

                    }
                    else 
                    {
                        
                            $_SESSION['change_pass']="<div class='error'><strong>Passwords do not match</strong></div>";
                            header("location: change-password.php? id=$id");

                    }
                 }
                 else 
                 {
                      $_SESSION['change_pass']="<div class='error'>Wrong password</div>";
                      header("location:".SITEURL.'admin/manage-admin.php');
                 }
                
             }
             
        }



    ?>

<?php include('partials/footer.php');?>