<?php include('partials/menu.php');?>
 <div class="main-content">
     <div class="wrapper">
        <form action="" method="POST" enctype="multipart/form-data">
            <fieldset class="tbl-30">
                <?php
                    if(isset($_SESSION['add-category']))
                    {
                        echo $_SESSION['add-category'];
                        unset($_SESSION['add-category']);
                    }
                    if(isset($_SESSION['uploaded']))
                    {
                        echo $_SESSION['uploaded'];
                        unset($_SESSION['uploaded']);
                    }
                ?>
                <legend><h1><strong>Add Category</strong></h1></legend>
                <div class="order-label">Title</div>
                <input type="text" name="title" placeholder="Title of the food" class="input-responsive" required>
                
                <div class="order-label">Select Image</div>
                <input type="file" name="image" class="margin2">;      
                <div class="order-label">Featured:</div>
                <input type="radio" name="featured" value="Yes" class="margin2">Yes
                <input type="radio" name="featured" value="No" class="margin2">No

                <div class="order-label">Active:</div>
                <input type="radio" name="active" value="Yes"class="margin2" >Yes
                <input type="radio" name="active" value="No" class="margin2">No
                <br><br>

                <input type="submit" name="submit" value="submit" class="btn-secondary">

            </fieldset>
        </form>
         
     </div>
 </div>
 <?php
        if(isset($_POST['submit']))
        {
          $title=$_POST['title'];
         
          if(isset($_POST['featured']))
          {
                $featured=$_POST['featured'];
          }
          else 
          {
             $featured="No";
          }
          if(isset($_POST['active']))
          {
                $active=$_POST['active'];
          }
          else 
          {
             $active="No";
          }
          //check whether image set or not 
          //let print the file
          
         // print_r($_FILES['image']);
          //break the remaining code 
          //die();
          if(isset($_FILES['image']['name']))
          {
              //upload the image 
              //to upload the image we need name of the image and source path and destination location 
              //first take image name 
              $image_name=$_FILES['image']['name'];
            //let get the extension for renaming the image name
            //explode function break the string whenever it finds . dot sign. like if image_name = hello.food.jpg then it 
            //will return the hello , food , jpg
            // end function will return the jpg only as it is in end position string after . dot sign 
            $ext=end(explode('.',$image_name));
            $image_name=('category_food_'.rand(000,999).'.'.$ext); // now our food name will be like category_food_453jpg
        


              //taking the source of the image from tmp_name which holds the link of the path 
              $source_path=$_FILES['image']['tmp_name'];
              //let upload the image 
              
              //destination path 
              $destination_path='../images/category'.$image_name;
              //let upload the image to the images/category folder
              //to upload the image we need to declar below function and source path and destination path 
              $uploaded=move_uploaded_file($source_path,$destination_path);
              //echo $uploaded;
              //die();
              if($uploaded==false)
              {
                  $_SESSION['uploaded']="<div class='error'>The image has not been uploaded</div>";
                  header('location:'.SITEURL.'admin/add-category.php');
                  die();
              }
             

          }
        

          $sql="INSERT INTO tbl_category SET
          title = '$title',
          image_name= '$image_name',
          featured ='$featured',
          
          active ='$active'
          ";
          

         
          $res=mysqli_query($conn,$sql);
          //check wether quey executed or not 
          if($res==TRUE)
          {
              //query executed
              $_SESSION['add-category']="<div class='success'>Addition of category successfully</div>";
              header('location:'.SITEURL.'admin/manage-category.php');
          }
          else 
          {
              //query not executed
              $_SESSION['add-category']="<div class='error'> Addition of category failed</div>";
              header('location:'.SITEURL.'admin/add-category.php');
          }
          

        }
?>


<?php include('partials/footer.php');?>
