


 <?php include('../config/constant.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">

    <title>Food management system</title>
</head>
<body class="login">
   
    <div class="wrapper">
       
           
            <div>
           

             <form action="" method="POST">
              <div class="loginsid">
              `     <?php
                        if(isset($_SESSION['login']))
                         {
                             echo $_SESSION['login'];
                             unset($_SESSION['login']);
                        }
                      if(isset($_SESSION['no_login']))
                      {
                          echo $_SESSION['no_login'];
                          unset($_SESSION['no_login']);
                      }
                        ?>
                  <legend class ="text-center"><h1><strong>Login</strong></h1></legend>
                  <div class="order-label">User Name</div>
                <input type="text" name ="user_name" placeholder="user Name" class="input-responsive">
                <div class="order-label">Password</div>
                <input type="password" name="password" placeholder="Password" class= "input-responsive">

                <input type="submit" name ="submit"  value= "Login" class="btn-primary">
</br>           Created by <a href="#">Akram Sarkar</a>
             </div> 

            </form>
            </div>
        
          

    </div>
        <?php
        
        
       
        if(isset($_POST['submit']))
        {  
            $user_name=$_POST['user_name'];
            $password=md5($_POST['password']);
            $sql="SELECT * FROM tbl_admin WHERE user_name='$user_name' AND password='$password'";
            $res=mysqli_query($conn,$sql);
            if($res==true)
            {
                $count=mysqli_num_rows($res);
                if($count==1)
                {
                    $_SESSION['login']="<div class='success'><strong>Login Successfull</strong></div>";
                    $_SESSION['user']=$user_name;
                    header("location:".SITEURL.'admin/index.php');
                }
                else 
                {
                    $_SESSION['login']="<div class='error text-center'><strong>User name or Password is not matched</strong></div>";
                    
                    header("location:".SITEURL.'admin/login.php');
                }
            }
            
            
        }
        ?>

</body>
</html>