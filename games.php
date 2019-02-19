    <?php include "includes/database.php"; ?>
   <?php include "admin/functions.php" ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
    <title>Andystore - Your Guide Of Android</title>
        <link rel="stylesheet" type="text/css" href="assets/css/main.css">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    

   <script src="js/jquery.min.js"></script>
   
    <script src="js/bootstrap.min.js"></script>



      <script type="text/javascript" src="datatabel/jquery-3.1.0.js"></script>
  <script type="text/javascript" src="datatabel/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="datatabel/css/jquery.dataTables.min.css">

   <link rel="stylesheet" type="text/css" href="css/style.css">


<script type="text/javascript" src="js/loader.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">

        <link href="https://fonts.googleapis.com/css?family=Amaranth" rel="stylesheet">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
        <script src="javascript/javascript.js" type="text/javascript"></script>
        <meta charset="utf-8" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Free android apps and games and also last news about android phones and apps development">
        <meta name="keywords" content="android,mobile,phone,apps,games,android news,gaming,free,store">
        <meta name="author" content="Munaf Aqeel Mahdi">
    </head>
<body>
<!--||||||||||||||||||||||||||||||||||||||||||||||||||Div NavBar|||||||||||||||||||||||||||||||||||||||||||||||||||||-->
<div id="navbar">
    <ul>
        <li id="home"><a href="index.html">HOME</a></li>
        <ul class="nav navbar-nav">
      <?php
                    
                    $query = "SELECT * FROM categories";
                    $getData = mysqli_query($connection, $query);
                    
                    while($row = mysqli_fetch_assoc($getData)){
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        
                        $class_category = '';
                        $registration = 'registration.php';
                        $registration_class = '';
                        $contact = 'contact.php';
                        $contact_class = '';
                        
                        $pageName = basename($_SERVER['PHP_SELF']);
                        
                        if(isset($_GET['cat_id']) && $_GET['cat_id'] == $cat_id){
                            $class_category = 'active';
                        }
                        else if($pageName == $registration){
                            $registration_class ='active';
                        }
                        else if($pageName == $contact){
                            $contact_class = 'active';
                        }
                        
                        echo "<li class='$class_category'><a href='./category.php?cat_id=$cat_id'>{$cat_title}</a></li>";
                    }
                    
                   ?>
        <li id="menu"><a href="menu.php">Menu</a></li>
        <li id="games"><a href="games.html">GAMES</a></li>
        <li id="news"  onmouseover="dropdownmenu()" onmouseout="dropdownmenu_hide()"><a href="news.html">NEWS <span class="caret"></span></a></li>
        <li id="contact"><a href="contact.html">CONTACT</a></li>
        <li onclick="about_dialog_show()" id="about" style="float:right;"><a href="#">ABOUT</a></li>
    </ul>
</div>
<!--||||||||||||||||||||||||||||||||||||||||||||||||||Div Mobile NavBar|||||||||||||||||||||||||||||||||||||||||||||||||||||-->
    <div id="m_navbar">
        
 

<!--home-->
<a href="menu.php" ><span class="glyphicon glyphicon-menu-hamburger"></span></a> 
<a href="index.html" ><span class="fa fa-home"> Urutkan</span></a> <!--home-->

<!-- <a href="news.html" ><span class="fa fa-newspaper-o"></span></a> --> <!--news-->
<!-- <a href="contact.html" ><span class="fa fa-phone"></span></a> --> <!--contact-->
<a href="#" onclick="about_dialog_show()" id="about"><span class="fa fa-user"></span></a> <!--about-->
    </div>
<!--||||||||||||||||||||||||||||||||||||||||||||||||||Div Header|||||||||||||||||||||||||||||||||||||||||||||||||||||-->
<div id="header" align="center" style="padding-top: 70px;padding-bottom:80px;">
    <center>
        <input type="text" name="search_app" placeholder="Search ..." class="search_app" />
        <div class="items_area">
            <!--------------------------------------line------------------------------------------>


                <?php
               
              
               
                
                $query = "SELECT * FROM produk ";
                $get_all_posts = mysqli_query($connection, $query);
                
                while($row = mysqli_fetch_assoc($get_all_posts)){
                    $id = $row['id'];
                    $nama=  substr($row['nama'],10,20);
                    $harga = $row['harga'];
                    $deskripsi = $row['deskripsi'];
                    $gambar = $row['gambar'];
                    $total = $harga + '30';
                ?>
              
   
    
  
<div  class="item">
    <a href="produk.php?id=<?php echo $id; ?>">
                <img src="<?php echo $gambar; ?>" alt="Game" style="width:120px; height: 100%;" />
                <br>
                <span class="nama"><small><?php echo $nama; ?></small></span>
                <br>
            </a>
                <span class="nama"><small>Rp <?php echo $total; ?>.000</small></span>
                  <br> <button class="button" href ="<?php echo $gambar; ?>">  Pesan via WA </a>  
               </button>
            </div>
           
 <?php } ?>    
</div>
            

        </div>
    </center>
    <!--||||||||||||||||||||||||||||||||||||||||||||news_dropdownmenu||||||||||||||||||||||||||||||||||||||||||||||||||||-->
    <div align="left" id="dropdownmenu" onmouseover="dropdownmenu()" onmouseout="dropdownmenu_hide()">
        <div class="news-listmenu">
            <div style="display: inline-block;background:url('images/samsung-galaxy-note-3-neo.jpg') no-repeat;background-size:cover;width:350px;height:200px;margin: 5px;">
                <h3 class="item-title"><a href="#">SAMSUNG GALAXY NOTE 3</a></h3>
            </div>
            <div style="display: inline-block;background:url('images/Smartphones.jpg') no-repeat;background-size:cover;width:350px;height:200px;margin: 5px;">
                <h3 class="item-title"><a href="#">SMART PHONES</a></h3>
            </div>
            <div style="display: inline-block;background:url('images/google_messenger.jpg') no-repeat;background-size:cover;width:350px;height:200px;margin: 5px;">
                <h3 class="item-title"><a href="#">MESSENGER</a></h3>
            </div>
        </div>

    </div>
    <!--|||||||||||||||||||||||||||||||||||||||||||||||||||About Dialog||||||||||||||||||||||||||||||||||||||||||||||||||-->
    <div id="about_dialog_bg">
        <div id="about_dialog">
            <p onclick="about_dialog_hide()" style="color:white;"><span id="close_dialog"></span></p>
            <h2 align="center">ANDYSTORE</h2>
            <p>Designed and programmed by : Munaf Aqeel Mahdi</p>
            <p>Web, Android and Java developer.</p>
            <p>Andystore is a simple website of android apps , games and last news about smart android phones and more you can find it here.</p>
            <hr style="
width: 350px;
border: 1px solid rgba(255, 255, 255, 0.6);
border-radius: 100%;
">
            <a href="http://www.facebook.com/munafaqeelmahdi.official/"><span class="fa fa-facebook-official"></span> Facebook </a>
            <a href="http://www.facebook.com/manaf.almamori.1"><span class="fa fa-facebook-official"></span> Facebook </a>
            <a href="http://twitter.com/munaf_mahdi"><span class="fa fa-twitter"></span> Twitter</a>
        </div></div>
</div>
<!--|||||||||||||||||||||||||||||||||||||||||||||||||||Div Footer||||||||||||||||||||||||||||||||||||||||||||||||||||-->
<div class="footer icon-bar" align="center">
  
  <a class="active" href="#"><i class="fa fa-home"></i></a>
  <a href="#"><i class="fa fa-search"></i></a>
  <a href="#"><i class="fa fa-envelope"></i></a>
  <a href="#"><i class="fa fa-globe"></i></a>
  <a href="#"><i class="fa fa-trash"></i></a>

</div>
<!--|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||-->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<!-- Designed and programmed by : Munaf Aqeel Mahdi - Web , Android and Java developer -->
