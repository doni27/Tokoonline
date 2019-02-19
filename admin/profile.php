<?php include"includes/admin_header.php"; ?>
<?php
if(isset($_SESSION['username'])){
    
    $profile_user = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username = '$profile_user'";
    $edit_user_profile = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($edit_user_profile)){
        
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_image = $row['user_image'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];

    }
    
    if(isset($_POST['update_profile'])){
    $username = $_SESSION['username'];
    $user_password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    
    $user_image = $_FILES['user_image']['name'];
    $tmp_user_image = $_FILES['user_image']['tmp_name'];
    
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];
    move_uploaded_file($tmp_user_image, "./images/$user_image");
        
        if(!$user_image){
            $query = "SELECT * FROM users WHERE username = '$profile_user'";
            $edit_user_profile = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($edit_user_profile)){

               $user_image = $row['user_image'];
            }
        }
    
    $query = "UPDATE users SET user_password='$user_password', user_firstname ='$user_firstname',user_lastname = '$user_lastname',user_image='$user_image',user_email='$user_email',user_role ='$user_role' WHERE username ='$username' ";

    
    $create_user = mysqli_query($connection,$query);
    
    confirm_query($create_user);
    }
}


    

?>
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
                                <i class="fa fa-file"></i> Profile
                            </li>
                        </ol>
                        
                        
                        
                    </div>
                    <div class="col-md-12">
                        
                        <form action="" method="post" enctype="multipart/form-data">
                           <div class="col-md-5">
                               <div class="form-group">
                               <label for="user_image">Profile Image</label>
                               <p><img width="400px" src="./images/<?php echo $user_image; ?>" alt=""></p>
                                <input type="file" name="user_image">
                            </div>
                           </div>
                            <div class="col-md-6">
                            <h1 >User Profile</h1>
                            <div class="form-group">
                               <label for="username"> Username</label>
                                <input value='<?php echo $username; ?>' type="text" class="form-control" name="username" disabled>
                            </div>

                            <div class="form-group">
                               <label for="user_password"> Password</label>
                                <input value='<?php echo $user_password; ?>' type="password" class="form-control" name="user_password">
                            </div>


                             <div class="form-group">
                               <label for="user_role"> User Role: </label>
                                <p><select name="user_role" id="">
                                   <option value="<?php echo $user_role;?>"><?php echo $user_role;?></option>
                                    <?php  
                                    if($user_role == "Admin"){
                                        echo "<option value='Subscriber'>Subscriber</option>";
                                    }
                                    else{
                                        echo "<option value='Admin'>Admin</option>";
                                    }

                                    ?>
                                 </select></p>
                            </div>

                            <div class="form-group">
                               <label for="user_firstname"> First Name</label>
                                <input value='<?php echo $user_firstname; ?>' type="text" class="form-control" name="user_firstname">
                            </div>

                            <div class="form-group">
                               <label for="user_lastname"> Last Name</label>
                               <input value='<?php echo $user_lastname; ?>' type="text" class="form-control" name="user_lastname">
                            </div>

                             <div class="form-group">
                               <label for="user_email"> Email</label>
                                <input value='<?php echo $user_email; ?>' type="email" class="form-control" name="user_email">
                            </div>

                            <div class="form-group text-center">
                                <input type="submit" value="Update Profile" class="btn btn-primary" name="update_profile">
                            </div>
                            </div>
                        </form>
                        

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
