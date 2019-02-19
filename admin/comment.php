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
                                <i class="fa fa-file"></i> Comments
                            </li>
                        </ol>
                        
                        
                        
                    </div>
                    <div class="col-md-12">
                        
                              <?php
                                include "includes/view_all_comments.php";
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
