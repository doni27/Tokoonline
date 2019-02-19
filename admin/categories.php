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
                                <i class="fa fa-file"></i> Categories
                            </li>
                        </ol>
                        
                        <div class="col-xs-6">
                         <?php insert_categories(); ?>
                        <form action="" method="post">
                            <div class="form-group">
                            <label for="cat_title">Category's Name</label>
                            <input type="text" placeholder="Eg.PHP" name="cat_title" class="form-control">
                            </div>
                            <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
                            </div>
                        </form>
                        
                        <?php  //Show update function
                        
                            if(isset($_GET['update'])){
                            
                                $cat_id =$_GET['update'];
                                include "includes/update_categories.php";
                        
                            }
                            
                        ?>    
                        </div>
                        
                        <div class="col-xs-6">
                            <table class="table table-hover table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php  //Displasy table from categories
                                    include "includes/view_all_categories.php";?>
                                    
                                    
                                <?php  //delete categories
                                 delete_categories();
                                ?>
                                 
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <p class="text-center">Note: * Deleting categories will also delete the thier corresponding posts *</p>
                    </div>
                    
                     
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
    <script>

  $('#myModal').on('show.bs.modal', function (e) {
	
    	$(this).find('.modal_delete_link').attr('href', $(e.relatedTarget).data('href'));

	});

</script>

    <?php include"includes/admin_footer.php"; ?>
