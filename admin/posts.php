<?php include"includes/admin_header.php"; ?>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include"includes/admin_navigation.php"; ?>
         
    <!-- Content of the admin page --->
       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to the Admin,
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="./index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Posts
                            </li>
                        </ol>
                        
                        
                        
                    </div>
                    <div class="col-md-12">
                        
                              <?php
                                if(isset($_GET['source'])){
                                    
                                    $source = $_GET['source'];
                                }
                                else{
                                    $source = "";
                                }
                                switch($source){
                                        
                                    case "add_posts":
                                        include "includes/add_posts.php";
                                        break;
                                        
                                    case "edit_posts":
                                        include"includes/edit_posts.php";
                                        break;
                                        
                                    case "100":
                                        echo "Nice 100";
                                        break;
                                        
                                    default:
                                        include "includes/view_all_posts.php";
                                        break;
                                }
                                ?>
                          
                    </div>
                    
                    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include"includes/admin_footer.php"; ?>
