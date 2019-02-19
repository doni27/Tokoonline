    <?php include "includes/database.php"; ?>
    <?php include "includes/header.php"; ?>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
 <?php
     $id = $_GET['id'];

                
               
               
                
                $query = "SELECT * FROM produk  INNER JOIN categories ON cat_id = kategori where id =$id";
                $get_all_posts = mysqli_query($connection, $query);
                
                while($row = mysqli_fetch_assoc($get_all_posts)){
                    $id = $row['id'];
                    $nama=  $row['nama'];
                    $harga = $row['harga'];
                    $deskripsi = $row['deskripsi'];
                    $gambar = $row['gambar'];
                    $total = $harga + '30';
                      $kategori = $row['cat_title'];
                ?>
              <div class="row">
  <div class="col-xs-12">
    <div class="thumbnail">
      <img  src='<?= $gambar; ?>' alt='images'>
      <div class="caption">
        <h5><?= $nama; ?></h5>
        <p>
              <h4>Rp <?= $harga; ?>.000</h4>
       <a href="#" class="btn btn-danger" style="background-color: #009090;" >Pesan Via WA</a>
<h5><?= $deskripsi ?></h5>

 <a href="kategori.php?kat_id=<?php echo $row['kategori'];  ?>&urut=3" class="btn-xs btn-danger" style="background-color: #009090;" >Menu <?php echo $kategori; ?></a>


   </p>
      </div>
    </div>
  </div>
</div>
   
            <!-- Blog Entries Column -->
           <?php } ?>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            
      

        </div>
        <!-- /.row -->

        <hr>

       <?php include "includes/footer.php" ?>
