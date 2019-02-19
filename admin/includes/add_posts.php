<?php
    
    if(isset($_POST['add_post'])){
     $id = $_POST['id'];
    $post_title = $_POST['nama'];
    $post_category_id = $_POST['kategori'];
  

     $harga = $_POST['harga'];
   
    
    $post_tags = $_POST['gambar'];
    $post_content = $_POST['deskripsi'];

    if ($addjurusan = mysqli_query($connection, "INSERT INTO produk (id,kategori,nama,harga, gambar,deskripsi) VALUES 
    ('$id','$post_category_id','$post_title','$harga','$post_tags','$post_content')")){
       echo'berhasl di input';
    }
die ("Terdapat kesalahan : ". mysqli_error($connection));

    }
    

?>
<!--What enctype does is..it prepares form to receive the file such as image using type="file" in input form   -->

<div class="col-md-9">
 <?php
                              
                                $query = "SELECT * FROM produk  ORDER BY id DESC LIMIT 1";
                                $get_posts = mysqli_query($connection,$query);
                                
                                while($row = mysqli_fetch_assoc($get_posts)){
                                    
                                   $post_id = $row['id'];
                                   echo $post_id; }

                                    ?>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
       <label for="title">id</label>
        <input type="text" class="form-control" name="id">
    </div>
    <div class="form-group">
       <label for="title">Nama</label>
        <input type="text" class="form-control" name="nama">
    </div>
    <div class="form-group">
       <label for="post_category_id">Post Category Title</label>
        <select class="form-control" name="kategori" id="">
            <?php
            $query = "SELECT * FROM categories";
            $get_categories = mysqli_query($connection, $query);
            
            confirm_query($get_categories);
            
            while($row = mysqli_fetch_assoc($get_categories)){
                $cat_title = $row['cat_title'];
                $cat_id = $row['cat_id'];
                echo "<option value='$cat_id'>{$cat_title}</option>";
            }
            ?>
        </select>
    </div>
       
    
    <div class="form-group">
       <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="gambar">
    </div>
    
    <div class="form-group">
       <label for="post_content">Post Content</label>
        <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
       <label for="harga">Harga</label>
        <input type="text" class="form-control" name="harga">
    </div>
    <div class="form-group">
        <input type="submit" value="Publish Post" class="btn btn-primary" name="add_post">
    </div>
</form>
</div>