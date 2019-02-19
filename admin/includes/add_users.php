<?php
if(isset($_POST['create_user'])){
    
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    
    $user_image = $_FILES['user_image']['name'];
    $tmp_user_image = $_FILES['user_image']['tmp_name'];
    
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];

    move_uploaded_file($tmp_user_image, "./images/$user_image");
    
    $query="SELECT randSalt FROM users";
    $get_randSalt = mysqli_query($connection,$query);
    confirm_query($get_randSalt);
    while($row = mysqli_fetch_assoc($get_randSalt)){
        $randSalt = $row['randSalt'];
    }
    $user_password = crypt($user_password,$randSalt);
    
    $query = "INSERT INTO users(username,user_password,user_firstname,user_lastname,user_image,user_email,user_role) ";
    
    $query .= "VALUES ('$username','$user_password','$user_firstname','$user_lastname','$user_image','$user_email','$user_role')";
    
    $create_user = mysqli_query($connection,$query);
    
    confirm_query($create_user);
    echo "<h5 class='well col-md-7'>User Created! '<a href='users.php'>  View Users </a>'</h5>";
    }
    

?>
<!--What enctype does is..it prepares form to receive the file such as image using type="file" in input form   -->
<div class="col-md-7">
<h1 class="text-center">Create User</h1>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
       <label for="username">Enter Username</label>
        <input type="text" class="form-control" name="username">
    </div>
    
    <div class="form-group">
       <label for="user_password">Enter Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>
    
            
     <div class="form-group">
       <label for="user_role">User Role: </label>
        <p><select name="user_role" id="">
           <option value="Subscriber">Select Options</option>
            <option value="Admin">Admin</option>
            <option value="Subscriber">Subscriber</option>
         </select></p>
    </div>
    
    <div class="form-group">
       <label for="user_firstname">User First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    
    <div class="form-group">
       <label for="user_lastname">User Last Name</label>
       <input type="text" class="form-control" name="user_lastname">
    </div>
    
     <div class="form-group">
       <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>
    
    <div class="form-group">
       <label for="user_image">User Image</label>
        <input type="file" name="user_image">
    </div>

    
    <div class="form-group text-center">
        <input type="submit" value="Create User" class="btn btn-primary" name="create_user">
    </div>
</form>
</div>