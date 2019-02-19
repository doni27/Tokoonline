    <?php include "includes/database.php"; ?>
    <?php include "includes/header.php"; ?>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
    

            <!-- Blog Sidebar Widgets Column -->
            
       <?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->
        <div>
           
            <ul class="pager">
                <?php
                for($i =1;$i <= $post_count;$i++){
                    if($i == $page){
                        echo "<li><a class='active_link' href='category.php?cat_id=$cat_id&page=$i'>$i</a></li>";
                    }
                    else{
                        echo "<li><a href='category.php?cat_id=$cat_id&page=$i'>$i</a></li>";
                    }
                    
                }
                ?>
            </ul>
         </div>

        <hr>

       <?php include "includes/footer.php" ?>
