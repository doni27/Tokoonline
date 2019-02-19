<?php
if(!isset($_SESSION['user_role'])){ 
        header("Location: ../index.php");
}
else{
    if($_SESSION['user_role'] !== "Admin"){
        
        header("Location: ../index.php");
    }

}

?>