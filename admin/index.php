<?php include('partials/menu.php');?>
<!--Main content starts from here-->
    <div class="main-content">
        <div class="wrapper">
            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                    echo "<br>";
                }
            ?>
           <h1>DASHBOARD</h1>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br/>
                Categories
</div>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br/>
                Categories
            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br/>
                Categories
            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br/>
                Categories
            </div>
            <div class="clearfix"></div>
        </div>
   
    </div>
    <?php include('partials/footer.php');?>