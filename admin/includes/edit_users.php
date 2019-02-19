<?php
if(isset($_GET['edit_id'])){
    $edit_id = $_GET['edit_id'];
    $query = "SELECT * FROM users WHERE user_id = $edit_id";
    $edit_user = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($edit_user)){
        
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_image = $row['user_image'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];

    }
    
    if(isset($_POST['edit_user'])){
    $edit_id = $_GET['edit_id'];
        
    $user_password = $_POST['user_password'];
    
//    $query="SELECT randSalt FROM users";
//    $get_randSalt = mysqli_query($connection,$query);
//    confirm_query($get_randSalt);
//    $row = mysqli_fetch_assoc($get_randSalt);
//    $randSalt = $row['randSalt'];
//
//    $user_password = crypt($user_password, $randSalt);
    $user_password = md5($user_password, array('cost' => 10));

    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    
    $user_image = $_FILES['user_image']['name'];
    $tmp_user_image = $_FILES['user_image']['tmp_name'];
    
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];

    move_uploaded_file($tmp_user_image, "./images/$user_image");
    
    if(empty($user_image)){
            
            $query = "SELECT * FROM users WHERE user_id =$edit_id";
            $select_image = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($select_image)){
                
                $user_image = $row['user_image'];
            }
        }
    
    $query = "UPDATE users SET user_password='$user_password', user_firstname ='$user_firstname',user_lastname = '$user_lastname',user_image='$user_image',user_email='$user_email',user_role ='$user_role' WHERE user_id =$edit_id ";

    $create_user = mysqli_query($connection,$query);
    
    confirm_query($create_user);
    echo "<h5 class='well col-xs-7'>User Updated! '<a href='users.php'>  View Users </a>'</h5>";
    }
}


    

?>
<!--What enctype does is..it prepares form to receive the file such as image using type="file" in input form   -->
<div class="col-md-7">

<h1 class="text-center">Edit User</h1>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
       <label for="username">Enter Username</label>
        <input value='<?php echo $username; ?>' type="text" class="form-control" name="username" disabled>
    </div>
    
    <div class="form-group">
       <label for="user_password">Enter Password</label>
        <input value='<?php echo $user_password; ?>' type="text" class="form-control" name="user_password">
    </div>
    
            
     <div class="form-group">
       <label for="user_role">User Role: </label>
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
       <label for="user_firstname">User First Name</label>
        <input value='<?php echo $user_firstname; ?>' type="text" class="form-control" name="user_firstname">
    </div>
    
    <div class="form-group">
       <label for="user_lastname">User Last Name</label>
       <input value='<?php echo $user_lastname; ?>' type="text" class="form-control" name="user_lastname">
    </div>
    
     <div class="form-group">
       <label for="user_email">Email</label>
        <input value='<?php echo $user_email; ?>' type="email" class="form-control" name="user_email">
    </div>
    
    <div class="form-group">
       <p><img width="200px" src="./images/<?php echo $user_image; ?>" alt=""></p>
        <input type="file" name="user_image">
    </div>

    
    <div class="form-group text-center">
        <input type="submit" value="Edit User" class="btn btn-primary" name="edit_user">
    </div>
</form>
</div>