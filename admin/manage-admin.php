<?php include('partials/menu.php');?>
    <div class="main-content">
        <div class="wrapper">
           <h1>Manage Admin</h1>

<?php echo "<br><br>";?>
          <a href="add-admin.php" class="btn-primary">Add Admin</a>

            <?php 
                  echo "<br><br>";  
                if(isset($_SESSION['ad']))
                {
                    echo "<br>";
                    echo $_SESSION['ad'];
                    //echo $_SESSION
                    unset($_SESSION['ad']);
                }
                if(isset($_SESSION['delete']))
                {
                    echo "<br>";
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                if(isset($_SESSION['update']))
                {
                    echo "<br>";
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
                if(isset($_SESSION['change_pass']))
                {
                    echo "<br>";
                    echo $_SESSION['change_pass'];
                    unset($_SESSION['change_pass']);
                }
                echo "<br><br>";
            ?>
               <table class="tbl-full">
                   <tr>
                       <th> Serial Number</th>
                       <th> Full Name</th>
                       <th>Username</th>
                       <th>Action</th>
                   </tr>
                   <?php 
                        $c=1;
                        $sql = "SELECT * FROM tbl_admin";
                        // to execute the array 
                        $res = mysqli_query($conn, $sql);
                        if($res== TRUE)
                        {
                            //$count = mysqli_num_rows($res);
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                $full_name = $rows['full_name'];
                                $id = $rows['id'];
                                $user_name= $rows['user_name'];
                                ?>
                                <tr>
                                    
                       <td><?php echo $c++ ;?></td>
                       <td><?php echo $full_name ;?></td>
                       
                       <td><?php echo $user_name ;?></td>
                       <td>
                            <a href="<?php echo SITEURL;?>admin/change-password.php? id=<?php echo $id?>" class="btn-primary">Change Password</a>

                           <a href="<?php echo SITEURL;?>admin/update-admin.php? id=<?php echo $id?>" class="btn-secondary">Update</a>
                           <a href="<?php echo SITEURL;?>admin/delete-admin.php? id=<?php echo $id?>" class="btn-danger">Delete</a>
                        </td>
                   </tr>
                   <?php

                            }
                        }
                        else 
                        {
                            echo "some problem has occured";
                            header('location:'.SITEURL.'manage-admin.php');
                        }

                   ?>
                   
                   
               </table>
           
           
            <div class="clearfix"></div>
        </div>
   
    </div>
<?php include('partials/footer.php');?>