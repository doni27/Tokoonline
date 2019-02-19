<table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Post ID</th>
                                    <th>Author</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Post Name</th>
                                    <th>Date</th>
                                    <th>Content</th>
                                    <th>Approval Status</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                $query = "SELECT * FROM comments ORDER BY comment_id DESC";
                                $get_comments = mysqli_query($connection,$query);
                                
                                while($row = mysqli_fetch_assoc($get_comments)){
                                    
                                    $comment_id = $row['comment_id'];
                                    $comment_post_id = $row['comment_post_id'];
                                    $comment_author = $row['comment_author'];
                                    $comment_email = $row['comment_email'];
                                    $comment_status = $row['comment_status'];
                                    $comment_date = $row['comment_date'];
                                    $comment_content = substr($row['comment_content'],0,25);
                                    
                                    
                                    echo "<tr>";
                                    echo "<td>$comment_id</td>";
                                    echo "<td>$comment_post_id</td>";
                                    echo "<td>$comment_author</td>";
                                    echo "<td>$comment_email</td>";
                                    echo "<td>$comment_status</td>";
                                    
                                    $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
                                    $get_comment_post = mysqli_query($connection,$query);
                                    while($row = mysqli_fetch_assoc($get_comment_post)){
                                        
                                        $post_id = $row['post_id'];
                                        $post_title = $row['post_title'];
                                        
                                        echo "<td><a href='../post.php?post_id=$post_id'>{$post_title}</a></td>";
                                    }
                                    
                                    echo "<td>$comment_date</td>";
                                    echo "<td>$comment_content"."..."."</td>";
                                    
                                    if($comment_status == "Approved"){
                                        echo "<td>Approve / <a href='comment.php?unapprove={$comment_id}'> Unapprove</a></td>";
                                    }
                                    else{
                                        echo "<td><a href='comment.php?approve={$comment_id}'>Approve </a> / Unapprove</td>";
                                    }
                                    
                                    echo "<td><a href='comment.php?delete={$comment_id}'>Delete</a></td>";
                                    echo "</tr>";
              
                                }
                                ?>
                                
                                <?php
                                 if(isset($_GET['unapprove'])){
                                    
                                    comment_unapprove();
                                }
                                
                                 if(isset($_GET['approve'])){
                                    
                                    comment_approve();
                                }
                                
                                if(isset($_GET['delete'])){
                                    
                                    comment_delete();
                                }
                                
                                ?> 
                                  </tbody>
                        </table>