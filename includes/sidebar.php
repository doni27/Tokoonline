<div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form><!-- End of  FORM -->
                    <!-- /.input-group -->
                </div>
                
               <!--  Login Well -->
                <div class="well">
                   <?php if(!isset($_SESSION['user_role'])): ?> 
                        <h4>Sign In</h4>
                        <form action="includes/login.php" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" placeholder="Username">
                            </div>
                            <span class="input-group">
                               <input type="password" class="form-control" name="user_password" placeholder="Password">
                               <span class="input-group-btn">
                                   <button class="btn btn-default" type="submit" name="login">Proceed</button>
                               </span>
                            </span>
                        </form>
                   <!--  Login Error Message -->
                    <?php else: ?>
                    <h4>Logged In As</h4>
                        <h2><?php echo $_SESSION['username'];?>, <small><?php echo $_SESSION['user_role'];?></small></h2>
                        <hr>
                        <a href="includes/logout.php" class="btn btn-primary btn-lg btn-block" href="">Logout</a>
                    <?php endif; ?>
                    <?php    
                    if(isset($_GET['message'])){ 
                        $message = $_GET['message'];
                        echo "<hr><h5 class='alert alert-danger text-center'>$message</h5>";
                    } 
                    ?>
                </div>
                 <div class="well">
                   <?php if(!isset($_SESSION['user_role'])): ?> 
                        <h4>Sign In Dashboard</h4>
                        <form action="includes/login_dashboard.php" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" placeholder="Username">
                            </div>
                            <span class="input-group">
                               <input type="password" class="form-control" name="user_password" placeholder="Password">
                               <span class="input-group-btn">
                                   <button class="btn btn-default" type="submit" name="login">Proceed</button>
                               </span>
                            </span>
                        </form>
                   <!--  Login Error Message -->
                    <?php else: ?>
                    <h4>Logged In As</h4>
                        <h2><?php echo $_SESSION['username'];?>, <small><?php echo $_SESSION['user_role'];?></small></h2>
                        <hr>
                        <a href="includes/logout.php" class="btn btn-primary btn-lg btn-block" href="">Logout</a>
                    <?php endif; ?>
                    <?php    
                    if(isset($_GET['message'])){ 
                        $message = $_GET['message'];
                        echo "<hr><h5 class='alert alert-danger text-center'>$message</h5>";
                    } 
                    ?>
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <?php
                    
                                $query = "SELECT * FROM categories LIMIT 6";
                                $get_categories = mysqli_query($connection, $query);

                                while($row = mysqli_fetch_assoc($get_categories)){
                                    $sidebar_cat_id = $row['cat_id'];
                                    $sidebar_cat_title = $row['cat_title'];

                                echo "<li><a href='./category.php?cat_id=$sidebar_cat_id'>{$sidebar_cat_title}</a></li>";
                                }

                               ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <!-- <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div> -->
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include("widget.php"); ?>

            </div>