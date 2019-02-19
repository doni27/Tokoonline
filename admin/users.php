<?php include"includes/admin_header.php"; ?>
<?php include"includes/delete_modal.php"; ?>
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
                                <i class="fa fa-file"></i> Users
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
                                        
                                    case "add_user":
                                        include"includes/add_users.php";
                                        break;
                                        
                                    case "edit_user":
                                        include"includes/edit_users.php";
                                        break;
                                        
                                    case "100":
                                        echo "Nice 100";
                                        break;
                                        
                                    default:
                                        include "includes/view_all_users.php";
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
