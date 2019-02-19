    <?php include "includes/database.php"; ?>
    <?php include "includes/header.php"; ?>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column --><?php 
            $query = mysqli_query($connection, "SELECT count(*) totaltahun FROM produk  ");
                      $dataencrypt = mysqli_fetch_array($query);
              $totaltahun =  $dataencrypt['totaltahun'];

   
 ?>
            
                
           <div class="col-xs-12 ">
   <ul class="list-group">
 <a href="#" class="list-group-item active"style="background-color: #009090;">
   Kategori
  </a>
  <ul class="list-group">
  <li class="list-group-item" style="font-size: 12px;">
     <span class="badge"><?php echo $totaltahun; ?></span>
    <a href=" semua.php?urut=3">
      SEMUA</a></li>
<?php $query = mysqli_query($connection, "SELECT * FROM categories ORDER BY cat_title ASC   ");
while ($data = mysqli_fetch_array($query)) { ?>
<li class="list-group-item" style="font-size: 12px;">
    <span class="badge"><?php echo $data['jumlah']; ?></span>
    <a href=" kategori.php?kat_id= <?php echo $data['cat_id']; ?>&urut=3&l=1">
      <?php echo $data['cat_title']; ?></a></li>
      <?php  } ?>
    
</ul>

</div></ul></div>
        <!-- /.row -->

        <hr>

       <?php include "includes/footer.php" ?>
