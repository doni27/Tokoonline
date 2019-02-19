<?php 
if(isset($_SESSION['user_role'])){
    if($_SESSION['user_role'] == "Admin"){
?>
<?php include "delete_modal.php"; ?>
<table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Delete User</th>
                                    <th>To Admin</th>
                                    <th>To Subscriber</th>
                                    <th>Edit User</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                $query = "SELECT * FROM users ORDER BY user_id DESC";
                                $get_users = mysqli_query($connection,$query);
                                
                                while($row = mysqli_fetch_assoc($get_users)){
                                    
                                    $user_id = $row['user_id'];
                                    $username = $row['username'];
                                    $user_password = $row['user_password'];
                                    $user_firstname = $row['user_firstname'];
                                    $user_lastname = $row['user_lastname'];
                                    $user_email = $row['user_email'];
                                    $user_image = $row['user_image'];
                                    $user_role = $row['user_role'];
                                    
                                    
                                    echo "<tr>";
                                    echo "<td>$user_id</td>";
                                    echo "<td><img width='100' src='./images/$user_image'></td>";
                                    echo "<td>$username</td>";
                                    echo "<td>$user_firstname</td>";
                                    echo "<td>$user_lastname</td>";
                                    echo "<td>$user_email</td>";
                                    echo "<td>$user_role</td>";
                                    echo "<td><a href='javascript:void(0)' data-href='users.php?delete=$user_id' data-toggle='modal' data-target='#myModal' class='btn btn-danger'>Delete</a></td>";
                                    echo "<td><a class='btn btn-success' href='users.php?change_to_admin=$user_id'>Admin</a></td>";
                                    echo "<td><a class='btn btn-warning' href='users.php?change_to_subscriber=$user_id'>Subscriber</a></td>";
                                    echo "<td><a class='btn btn-primary' href='./users.php?source=edit_user&edit_id=$user_id'>Edit</a></td>";
                                    echo "</tr>";
              
                                }
                                ?>
                                
                                <?php
                                 if(isset($_GET['change_to_admin'])){
                                    
                                    change_to_admin();
                                }
                                
                                 if(isset($_GET['change_to_subscriber'])){
                                    change_to_subscriber();
                                }
                                
                                if(isset($_GET['delete'])){
                                    
                                    delete_users();
                                }
                                
                                ?> 
                                  </tbody>
                        </table>
<script>

  $('#myModal').on('show.bs.modal', function (e) {
	
    	$(this).find('.modal_delete_link').attr('href', $(e.relatedTarget).data('href'));

});

</script>


<?php
}
}
else{
    header("Location: ../index.php");
}
?>