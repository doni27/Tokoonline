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
        <li id="apps"><a href="apps.html">APPS</a></li>
        <li id="games"><a href="games.html">GAMES</a></li>
        <li id="news"  onmouseover="dropdownmenu()" onmouseout="dropdownmenu_hide()"><a href="news.html">NEWS <span class="caret"></span></a></li>
        <li id="contact"><a href="contact.html">CONTACT</a></li>
        <li onclick="about_dialog_show()" id="about" style="float:right;"><a href="#">ABOUT</a></li>
    </ul>
</div>
<!--||||||||||||||||||||||||||||||||||||||||||||||||||Div Mobile NavBar|||||||||||||||||||||||||||||||||||||||||||||||||||||-->
    <div id="m_navbar">
        
  <a class="glyphicon glyphicon-menu-hamburger dropdown-toggle " type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
  
   
  </a>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another action</a></li>
    <li><a href="#">Something else here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated link</a></li>
  </ul>

<!--home-->
<a href="index.html" ><span class="fa fa-home"></span></a> <!--home-->
<a href="apps.html" ><span class="fa fa-rocket"></span></a> <!--apps-->
<a href="games.html" ><span class="fa fa-gamepad"></span></a> <!--games-->
<!-- <a href="news.html" ><span class="fa fa-newspaper-o"></span></a> --> <!--news-->
<!-- <a href="contact.html" ><span class="fa fa-phone"></span></a> --> <!--contact-->
<a href="#" onclick="about_dialog_show()" id="about"><span class="fa fa-user"></span></a> <!--about-->
    </div>
<!--||||||||||||||||||||||||||||||||||||||||||||||||||Div Header|||||||||||||||||||||||||||||||||||||||||||||||||||||-->
<div id="header" align="center" style="padding-top: 70px;padding-bottom:80px;">
    <center>
        
        <div class="items_area">

        
     <?php
     $id = $_GET['id'];

                    $per_page = 10;
                
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    
                    $page_1 = ($page*$per_page)-$per_page;
                    }
                else{
                    $page = 1;
                    $page_1 = 0;
                }
                
               
               
                
                $query = "SELECT * FROM produk where id =$id";
                $get_all_posts = mysqli_query($connection, $query);
                
                while($row = mysqli_fetch_assoc($get_all_posts)){
                    $id = $row['id'];
                    $nama=  $row['nama'];
                    $harga = $row['harga'];
                    $deskripsi = $row['deskripsi'];
                    $gambar = $row['gambar'];
                    $total = $harga + '30';
                    $kategori = $row['kategori'];
                ?>
              
   
    
  

                <img src="<?php echo $gambar; ?>" alt="Game" style="width:100%; height:100%;" /> 
                  
                <br>
                <span ><small><?php echo $nama; ?></small></span>
                <br>
                <span><small>Rp <?php echo $total; ?>.000</small></span>
                  <br><div class="item"><small> <a href="" class="button item"> Pesan via WA   </a>
               </small></div>
               <br>
  <span ><small>Deskripsi</small></span>
             <br>
   <p ><?php echo $deskripsi; ?></p>
            
           <span ><small><?php echo $kategori; ?></small></span>
 <?php } ?>    


     





          </div>



           </div>
    </center>
    <!--||||||||||||||||||||||||||||||||||||||||||||news_dropdownmenu||||||||||||||||||||||||||||||||||||||||||||||||||||-->
  
<!--|||||||||||||||||||||||||||||||||||||||||||||||||||Div Footer||||||||||||||||||||||||||||||||||||||||||||||||||||-->
<div class="footer icon-bar" align="center">
  
  <a class="active" href="#"><i class="fa fa-home"></i></a>
  <a href="#"><i class="fa fa-search"></i></a>
  <a href="#"><i class="fa fa-envelope"></i></a>
  <a href="#"><i class="fa fa-globe"></i></a>
  <a href="#"><i class="fa fa-trash"></i></a>

</div>
<!--|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||-->
</body>
</html>
<!-- Designed and programmed by : Munaf Aqeel Mahdi - Web , Android and Java developer -->
