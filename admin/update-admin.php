<?php include('partials/menu.php');?>
 <div class="main-content">
     <div class="wrapper">

        <?php
         //first take id
         $id = $_GET['id'];
        // then write the query
         $sql= " SELECT * FROM tbl_admin WHERE id=$id";
         $res= mysqli_query($conn, $sql);
        if($res==TRUE)
        {
            $count = mysqli_num_rows($res);
            //let us check data of this id exist or not 
            if($count == 1)
            {
                echo "hello";
                $rows=mysqli_fetch_assoc($res);
                $user_name=$rows['user_name'];
                $full_name=$rows['full_name'];
                echo $user_name;
            }
            else 
            {
                header("location:".SITEURL.'admin/manage-admin.php');
            }


        }

        ?>




     <form action="" method="POST">
                <fieldset class="tbl-30">
                    <legend><h1><strong>Update Admin</strong></h1></legend>

                    <div class="order-label">Full Name</div>
                    <input type="text" name="full_name" value="<?php echo $full_name?>" class="input-responsive" required>

                    <div class="order-label">User Name</div>
                    <input type="text" name="user_name" value="<?php echo $user_name?>" class="input-responsive" required>
                   <br>
                   <input type="submit" name="submit" value ="Update Admin" class="btn-secondary">            
                    

                   
                </fieldset>
            </form>
            <?php
                 if(isset($_POST['submit']))   
                 {
                     $full_name = $_POST['full_name'];
                     $user_name =$_POST['user_name'];

                     $sql = "UPDATE tbl_admin  SET 
                     full_name = '$full_name',
                     user_name = '$user_name'
                     where id=$id                     
                     ";
                     $res = mysqli_query($conn,$sql);
                     if($res == TRUE)
                     {
                        $_SESSION['update']="<div class='success'>Admin upadation succcessful</div>";
                        // to redirect the page 
                        header("location:".SITEURL.'admin/manage-admin.php');
                     }
                     else 
                     {
                         $_SESSION['update']="<div class='success'>Admin updation is failed</div>";
                         header("location:".SITEURL.'admin/manage-admin.php');
                     }
                 }

            ?>
     </div>
</div>
<?php include('partials/footer.php');?>