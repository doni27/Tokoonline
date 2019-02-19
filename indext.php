    <?php include "includes/database.php"; ?>
    <?php include "includes/header.php"; ?>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>
<div id="header" align="center" ">
    <center>
    <!-- Page Content -->
   <div class="items_area">


<?php
               
              
               
                
                $query = "SELECT * FROM produk ORDER BY id DESC LIMIT 500";
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
    <a href="produk.php?id=<?php echo $id; ?>">
                <img src="<?php echo $gambar; ?>" alt="images" style="width:120px; height: 100%;" />
                <br>
                <span class="nama"><small><?php echo $nama; ?></small></span>
                <br>
            </a>
                <span class="nama"><small>Rp <?php echo $total; ?>.000</small></span>
                  <br> <a href="" class="mboh btn-xs btn-primary">Pesan via WA </a>  
            </div>
           
 <?php } ?>    
</div>








            <!-- Blog Entries Column -->
          

            <!-- Blog Sidebar Widgets Column -->
            
     

        </div>
        <!-- /.row -->

        <hr>
        <!-- Pagination Numbering According to post count  -->
        <div>
            <ul class="pager">
                <?php
                for($i =1;$i <= $post_count;$i++){
                    if($i == $page){
                        echo "<li><a class='active_link' href='index.php?page=$i'>$i</a></li>";
                    }
                    else{
                        echo "<li><a href='index.php?page=$i'>$i</a></li>";
                    }
                    
                }
                ?>
            </ul>
         </div>

       <?php include "includes/footer.php" ?>
