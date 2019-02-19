    <?php include "includes/database.php"; ?>
    <?php include "includes/header.php"; ?>

    <!-- Navigation -->
   <style>
    #logo{
        width: 150px;
        margin-right: 10px;

    }
    #logo_link{
        padding:0;
    }
</style>
       <nav class="navbar navbar-teal navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header ">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
             
        
      <a href="index.php" type="button" class=" navbar-toggle">Menu</a>
  <a type="button" class=" dropdown navbar-toggle"  id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Urutkan
    
  </a>
  <ul class="dropdown-menu " aria-labelledby="dropdownMenu1">
    <li><a href="#">Terbaru</a></li>
    <li><a href="#">Termurah</a></li>
    <li><a href="#">Termahal</a></li>
   
  </ul>

                 
                 
               
                <!-- <a type="button" class=" navbar-toggle">Menu</a> -->
                 
               <!--  <a class="navbar-brand" id="logo_link" href="index.php"><img id="logo" src="./images/Sanish1.png" alt="logo"></a> -->
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
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
                        
                        // echo "<li class='$class_category'><a href='./category.php?cat_id=$cat_id'>{$cat_title}</a></li>";
                    }
                    
                   ?>
                   <li>
                        <a href="index.php">Menu </a>
                    </li>
                   <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Urutkan <span class="caret"></span></a>
          <ul class="dropdown-menu">
             <li><a href="semua.php?urut=1">Terbaru</a></li>
    <li><a href="semua.php?urut=3">Termurah</a></li>
    <li><a href="semua.php?urut=2">Termahal</a></li>
            
          </ul>
        </li>
                    <li>
                        <a href="search.php">WA 082383093423 </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<div id="header" align="center" ">
    <center>
    <!-- Page Content -->
   <div class="items_area">


<?php
               
           $urut = $_GET['urut'];





switch ($urut) {
    case 1:
      


                $query = "SELECT * FROM produk LIMIT 200  ";
                $get_all_posts = mysqli_query($connection, $query);
                
                while($row = mysqli_fetch_assoc($get_all_posts)){
                    $id = $row['id'];
                    $nama=  substr($row['nama'],0,18);
                    $harga = $row['harga'];
                    $deskripsi = $row['deskripsi'];
                    $gambar = $row['gambar'];
                    $total = $harga + '30';
               
                ?>
<div  class="item">
    <a href="details.php?id=<?php echo $id; ?>">
                <img src="<?php echo $gambar; ?>" alt="Game" style="width:120px; height: 100%;" />
                <br>
                <span class="nama"><small><?php echo $nama; ?></small></span>
                <br>
            </a>
                <span class="nama"><small>Rp <?php echo $total; ?>.000</small></span>
                 <br> <a href="" class="mboh btn-xs btn-primary">Pesan via WA </a> 
            </div>
           
 <?php } 
     


        break;
    case 2:
        
                $query = "SELECT * FROM produk  ORDER BY harga DESC LIMIT 200";
                $get_all_posts = mysqli_query($connection, $query);
                
                while($row = mysqli_fetch_assoc($get_all_posts)){
                    $id = $row['id'];
                    $nama=  substr($row['nama'],0,18);
                    $harga = $row['harga'];
                    $deskripsi = $row['deskripsi'];
                    $gambar = $row['gambar'];
                    $total = $harga + '30';
               
                ?>
<div  class="item">
    <a href="details.php?id=<?php echo $id; ?>">
                <img src="<?php echo $gambar; ?>" alt="Game" style="width:120px; height: 100%;" />
                <br>
                <span class="nama"><small><?php echo $nama; ?></small></span>
                <br>
            </a>
                <span class="nama"><small>Rp <?php echo $total; ?>.000</small></span>
                <br> <a href="" class="mboh btn-xs btn-primary">Pesan via WA </a> 
            </div>
           
 <?php } 
       
        break;
    case 3:
        
                $query = "SELECT * FROM produk  ORDER BY harga ASC LIMIT 200";
                $get_all_posts = mysqli_query($connection, $query);
                
                while($row = mysqli_fetch_assoc($get_all_posts)){
                    $id = $row['id'];
                    $nama=  substr($row['nama'],0,18);
                    $harga = $row['harga'];
                    $deskripsi = $row['deskripsi'];
                    $gambar = $row['gambar'];
                    $total = $harga + '30';
               
                ?>
<div  class="item">
    <a href="details.php?id=<?php echo $id; ?>">
                <img src="<?php echo $gambar; ?>" alt="Game" style="width:120px; height: 100%;" />
                <br>
                <span class="nama"><small><?php echo $nama; ?></small></span>
                <br>
            </a>
                <span class="nama"><small>Rp <?php echo $total; ?>.000</small></span>
                 <br> <a href="" class="mboh btn-xs btn-primary">Pesan via WA </a> 
            </div>
           
 <?php } 
     
        break;
    default:
        echo "Isi variabel tidak di temukan";
        break;
}
?>
















</div>








            <!-- Blog Entries Column -->
          

            <!-- Blog Sidebar Widgets Column -->
            
     

        </div>
        <!-- /.row -->

        <hr>
        <!-- Pagination Numbering According to post count  -->
        <div>
         
         </div>

       <?php include "includes/footer.php" ?>
