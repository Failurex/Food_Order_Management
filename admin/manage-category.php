<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
    <h1>Manage Category</h1>
</br></br>
<?php
                    if(isset($_SESSION['add-category']))
                    {
                        echo $_SESSION['add-category'];
                        unset($_SESSION['add-category']);
                    }
                ?>
    </br></br>
          <a href="<?php echo SITEURL;?>admin/add-category.php" class="btn-primary">Add Category</a>
</br></br></br>
               <table class="tbl-full">
                   <tr>
                       <th> Serial Number</th>
                       <th> Title</th>
                       <th>Image Name</th>
                       <th>Active</th>
                       <th>Featured</th>
                       <th>Action</th>
                   </tr>
                   <?php
                   // taking all element from tbl_category table 
                   $sql= "SELECT * FROM tbl_category";
                   // let execute the query 
                   $res=mysqli_query($conn,$sql);
                   if($res==True)
                   {
                       $c=1;
                     while($rows=mysqli_fetch_assoc($res))
                     {
                         $title =$rows['title'];
                         $image_name=$rows['image_name'];
                         $active =$rows['active'];
                         $featured=$rows['featured'];
                         ?>
                         <tr>
                        <td><?php echo $c++;?></td>
                            <td><?php echo $title;?></td>
                            <td><?php 
                            if($image_name!="")
                            {
                                ?>
                                <img src="<?php echo SITEURL?>images/category<?php echo $image_name;?>"  width="100%" >
                                <?php
                            }
                            else 
                            {
                                echo "<div class='error'> It has no image name</div>";
                            }                        
                            
                            
                            ?></td>
                            <td><?php echo $active;?></td>
                            <td> <?php echo $featured;?></td>
                            <td>
                                <a href="#" class="btn-secondary">Update</a>
                                <a href="#" class="btn-danger">Delete</a>
                            </td>
                     </tr>
                     
                        <?php
                        // if we do nnot have data in the ddatabase 
                        // and we want to display a message in table 
                        // we will just show the meassage into the table will 
                        //colspan 6 which means i td or colum will take place equal to 
                        // 6 column
                     }   
                   }

                   ?>
                   
                   
                   
               </table>
           
    </div>
   
</div>
<?php include('partials/footer.php');?>