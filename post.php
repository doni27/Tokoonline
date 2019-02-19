    <?php include "includes/database.php"; ?>
    <?php include "includes/header.php"; ?>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
                <?php
                if(isset($_GET['post_id'])){
                    
                $post_id = $_GET['post_id'];
                    
                $query="UPDATE posts SET post_views = post_views + 1 WHERE post_id = $post_id";
                $get_post_view = mysqli_query($connection,$query);
                    
                $query = "SELECT * FROM posts WHERE post_id ={$post_id} ";
                $get_all_posts = mysqli_query($connection, $query);
                
                while($row = mysqli_fetch_assoc($get_all_posts)){
                    
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    $post_views = $row['post_views'];
                ?>
                <!-- <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1> -->

                <!-- First Blog Post -->
                <h1>
                    <a href="#"><?php echo $post_title; ?></a>
                    <?php
                    if(isset($_SESSION['user_role'])){
                        if($_SESSION['user_role'] === "Admin"){
                        echo "<a href='admin/posts.php?source=edit_posts&update=$post_id'><button class='btn btn-default pull-right'> Edit Post</button></a>";
                        }
                    }        
                    ?>
                    
                </h1>
                <p class="lead">
                    by <a href="author_related_posts.php?author=<?php echo $post_author; ?>"><?php echo $post_author; ?></a>
                    <small class="pull-right"><?php echo $post_views;?> Views</small>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>

                <hr>
                <?php } 
                }
                else{
                    header("Location: index.php");    
                }
                ?>
                
                <!-- Comments Form -->
                
                <?php
                
                if(isset($_POST['add_comment'])){
                        $comment_post_id = $_GET['post_id'];
                        $comment_author = $_POST['comment_author'];
                        $comment_email = $_POST['comment_email'];
                        $comment_content = $_POST['comment_content'];
                        $comment_date = date('d-m-y');

                        if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content)){
                             $query = "INSERT INTO comments(comment_post_id ,comment_author ,comment_email, comment_content, comment_date) values($comment_post_id,'$comment_author','$comment_email','$comment_content',now() )";

                            $add_comment = mysqli_query($connection, $query);

                            confirm_query($add_comment);
                                $success = "Succesfully Commented!";
                        }
                        else{
                            $error = "All fields are requried!";
                        }
                } 
                ?>
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                          
                           <div class="form-group">
                           <label for="comment_author">Author</label>
                           <input type="text" class="form-control" name="comment_author">
                            </div>
                            
                            <div class="form-group">
                           <label for="comment_email">Email</label>
                           <input type="email" class="form-control" name="comment_email">
                            </div>
                            
                        <div class="form-group">
                           <label for="comment_content">Comment</label>
                            <textarea class="form-control" name="comment_content" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="add_comment">Add Comment</button>
                    </form>
                    <?php if(isset($error)){
                    echo "<h4 class='alert alert-danger text-center'>{$error}</h4>";
                        } 
                    if(isset($success)){
                    echo "<h4 class='alert alert-success text-center'>{$success}</h4>";
                        }
                    ?>
                    
                </div>

                <hr>

                <!-- Posted Comments -->

                <!--Display Only Approved Comments Comment -->
                <?php
                
                if(isset($_GET['post_id'])){
                    $post_id = $_GET['post_id'];
                    
                    $query = "SELECT * FROM comments WHERE comment_post_id = $post_id AND comment_status ='Approved' ORDER BY comment_id DESC";
                    $get_comments = mysqli_query($connection,$query);
                    
                    while($row = mysqli_fetch_assoc($get_comments)){
                        $comment_author = $row['comment_author'];
                        $comment_email = $row['comment_email'];
                        $comment_content = $row['comment_content'];
                        $comment_date = $row['comment_date'];
                        $comment_status = $row['comment_status'];
                         ?>
                        <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" width="64" height="64" src="images/Dark%20path.jpg" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author;?>
                            <small>From <?php echo $comment_email; ?>, <?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                    </div>
                               
                        <?php } } ?>


            </div>

            <!-- Blog Sidebar Widgets Column -->
            
       <?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>

       <?php include "includes/footer.php" ?>
