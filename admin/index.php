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
        
                        </ol>
                    </div>
                           <div class="col-md-12">
                               <div class="col-lg-3 col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-file-text fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                          <div class='huge'>
                                               <?php
                                                $query = "SELECT * FROM posts";
                                                $get_posts = mysqli_query($connection, $query);
                                                $count_posts = mysqli_num_rows($get_posts);
                                                echo $count_posts;
                                              ?>
                                               </div>
                                                <div>Posts</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="posts.php">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-green">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-comments fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                             <div class='huge'>
                                                <?php
                                                $query = "SELECT * FROM comments";
                                                $get_comments = mysqli_query($connection, $query);
                                                $count_comments = mysqli_num_rows($get_comments);
                                                echo $count_comments;
                                              ?>
                                                </div>
                                              <div>Comments</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="comment.php">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-yellow">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-user fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                            <div class='huge'>
                                                <?php
                                                $query = "SELECT * FROM users";
                                                $get_users = mysqli_query($connection, $query);
                                                $count_users = mysqli_num_rows($get_users);
                                                echo $count_users;
                                              ?>
                                            </div>
                                                <div> Users</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="users.php">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-red">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-list fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class='huge'>
                                                    <?php
                                                $query = "SELECT * FROM categories";
                                                $get_categories = mysqli_query($connection, $query);
                                                $count_categories = mysqli_num_rows($get_categories);
                                                echo $count_categories;
                                              ?>
                                                </div>
                                                 <div>Categories</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="categories.php">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                           </div>
                  <?php
                  $query = "SELECT * FROM posts WHERE post_status ='Draft'";  //Draft Posts
                  $get_draft_posts = mysqli_query($connection, $query);
                  $count_drafts  = mysqli_num_rows($get_draft_posts);
                  
                  $query = "SELECT * FROM comments WHERE comment_status ='Unapproved'";  //Unapproved Comments
                  $get_unapproved_comment = mysqli_query($connection, $query);
                  $unapproved_comment_count  = mysqli_num_rows($get_unapproved_comment);
                  
                  $query = "SELECT * FROM users WHERE user_role ='Subscriber'";  //Subscriber Count
                  $get_subscriber = mysqli_query($connection, $query);
                  $count_subscriber  = mysqli_num_rows($get_subscriber);
                  
                  
                  
                  ?>

                <script type="text/javascript" src="js/loader.js"></script>
                <script type="text/javascript">
                  google.charts.load('current', {'packages':['bar']});
                  google.charts.setOnLoadCallback(drawChart);

                  function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                      ['Activities','Count'],
                              <?php
                              $element = ['Active Posts','Draft Posts','Approved Comments','Unapproved Comments','Subscriber','Categories'];
                              $value = [$count_posts,$count_drafts,$count_comments,$unapproved_comment_count,$count_ubscriber,$count_categories];
                              
                              for($i = 0;$i <= 5;$i++){
                                echo "['{$element[$i]}'".","."'{$value[$i]}'],";
                              }
                              
                              ?>
                            ]);

                            var options = {
                              chart: {
                                title: 'Activities Report',
                                subtitle: 'Active Posts, Drafts, Comments...',
                              }
                            };

                            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                            chart.draw(data, google.charts.Bar.convertOptions(options));
                          }
                        </script>
                   
                  <div class="container">
                  <div id="columnchart_material" style="width: 100%; height: 500px; margin-top:320px;"></div>
                  </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include"includes/admin_footer.php"; ?>
