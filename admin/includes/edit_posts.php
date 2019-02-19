<?php
if(isset($_GET['update'])){
    $update_id = $_GET['update'];
    $query = "SELECT * FROM produk WHERE id = $update_id ";
    $get_update_data = mysqli_query($connection, $query);
    
        while($row = mysqli_fetch_assoc($get_update_data))
        {
        $post_title = $row['nama'];
        $harga = $row['harga'];
        $post_category_id = $row['kategori'];
  
        $post_tags = $row['gambar'];
      
        $post_content = $row['deskripsi'];
        }

        if(isset($_POST['update_post'])){
        $post_title = $_POST['nama'];
        $post_category_id = $_POST['post_category_id'];
         $post_tags= $_POST['gambar'];
    $harga = $_POST['harga'];
        $post_content = $_POST['deskripsi'];
    
     
        
      
        }
    
        $query = "UPDATE produk SET nama ='{$post_title}',harga= '{$harga}', kategori ='{$post_category_id}', gambar = '{$post_tags}',   deskripsi= '{$post_content}'  WHERE id = $update_id ";
        
        $update_posts = mysqli_query($connection, $query);
        confirm_query($update_posts);
        
        echo "<h5 class='well col-xs-6'>Post Updated! <a href='../post.php?post_id=$update_id'>  View Post </a></h5>";
    }

?>
<!--What enctype does is..it prepares form to receive the file such as image using type="file" in input form   -->
<div class="col-md-9">
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
       <label for="title">nama</label>
        <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="nama">
    </div>
    
    <div class="form-group">
       <label for="post_category_id">Post Category ID</label>
        <select class="form-control" name="post_category_id" id="">
            <?php
            $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
            $get_categories = mysqli_query($connection, $query);
            
            confirm_query($get_categories);
            
            while($row = mysqli_fetch_assoc($get_categories)){
                $cat_title = $row['cat_title'];
                $cat_id = $row['cat_id'];
                
                echo "<option value='$cat_id'>{$cat_title}</option>";
            }
            
            $query = "SELECT * FROM categories";
            $get_categories = mysqli_query($connection, $query);
            
            while($row = mysqli_fetch_assoc($get_categories)){
                $cat_title = $row['cat_title'];
                $cat_id = $row['cat_id'];
                if($cat_id != $post_category_id){
                echo "<option value='$cat_id'>{$cat_title}</option>";
                }
            }
            ?>
        </select>
    </div>
    
   
    

    
    <div class="form-group">
       <label for="post_tags">Harga</label>
    <input value="<?php echo $harga; ?>" type="number" class="form-control" name="harga">
    </div>
     <img src="<?=$post_tags  ?>" alt="images" style="width: 150px;">
    <div class="form-group">
       <label for="post_tags">Gambar</label>
        <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="gambar">
    </div>
    
    <div class="form-group">
       <label for="post_content">Deskripsi</label>
        <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10"><?php echo $post_content; ?></textarea>
    </div>
    
    <div class="form-group">
        <input type="submit" value="Update Post" class="btn btn-primary" name="update_post">
    </div>
</form>
</div>