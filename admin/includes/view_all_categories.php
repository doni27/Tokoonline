<?php

$query = "SELECT * FROM categories";
$get_categories = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($get_categories)){
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];
?>
<tr><td><?php echo  $cat_id; ?></td><td><a href="produk.php?kat=<?php echo  $cat_id; ?>" title=""><?php echo $cat_title ; ?></a></td>
<td><a class='btn btn-danger' data-toggle='modal' data-target='#myModal' data-href='categories.php?delete=<?= $cat_id; ?>' href='javascript:void(0)'>Delete</a> <a class='btn btn-primary' href='categories.php?update=<?=  $cat_id; ?>'>Update</a></td></tr>
<?php }

?>