<?php  include "includes/database.php"; ?>
 <?php  include "includes/header.php"; ?>
<?php

if(isset($_POST['send'])){
    
    $to = "sanish.gurung@icp.edu.np";
    $subject = $_POST['subject'];
    $message= $_POST['message'];
    $message = wordwrap($message,70);
    $header = "From: ".$_POST['user_email'];
    
    if(mail($to,$subject,$message,$header)){
        $message="Thank You For Message! Will Reply Soon..";
    }
    else{
        $error = "Error While Sending! Please Try Again..";
    }
}

?>
    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    <style>
        .label-width{
            width: 10pc;
        }
        #login-header{
            margin-bottom: 30px;
        }
        .form-wrap{
            margin-top:60px;
        }

    </style>
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
           <h1 class="text-center">Contact Us</h1>
            <div class="well" style="width:70%;margin:auto;">
                <div class="form-wrap" id="form-border">
                <h3 id="login-header" class="text-center">Leave a Message</h3>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                       <div class="form-group">
                            <span class="input-group">
                              <span class="input-group-btn">
                                  <label for="username" class="btn btn-default label-width"> Subject </label>
                               </span>
                               <input type="text" class="form-control" name="subject" placeholder="John">
                            </span>
                        </div>
                        <div class="form-group">
                            <span class="input-group">
                              <span class="input-group-btn">
                                  <label class="btn btn-default label-width" for="username"> Email </label>
                               </span>
                               <input type="email" class="form-control" name="user_email" placeholder="john@gmail.com">
                            </span>
                        </div>
                       <div class="form-group">
                            <textarea name="message" class="form-control" id="" cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group text-center">
                        <input type="submit" name="send" id="btn-login" class="btn btn-primary btn-lg btn-block text-center" value="Send">
                        </div>
                    </form>
                     <?php
                    if(isset($message)){
                        echo "<h4 class='alert alert-success text-center'>{$message}</h4>";
                    }if(isset($error)){
                        echo "<h4 class='alert alert-danger text-center'>{$error}</h4>";
                    }
                    ?>
                </div>
            </div> <!-- /.col-md-6 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


<?php include "includes/footer.php";?>
