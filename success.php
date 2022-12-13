<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }else{
        $user_id=$_GET['id'];
        $confirm_query="update users_items set status='Confirmed' where user_id=$user_id";
        $confirm_query_result=mysqli_query($con,$confirm_query) or die(mysqli_error($con));
        
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Lifestyle Store</title>
		
        <link rel="stylesheet" href="CSS/col_css.css" type="text/css">
		<link rel="stylesheet" href="CSS/btn.css" type="text/css">
		<link rel="stylesheet" href="CSS/panel.css" type="text/css">
		<link rel="stylesheet" href="CSS/label.css" type="text/css">
		<link rel="stylesheet" href="CSS/Navbar.css" type="text/css">
        <link rel="stylesheet" href="CSS/css1.css" type="text/css">
		
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body class="bs">
        <div>
            <?php
                require 'header.php';
            ?>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading"></div>
                            <div class="panel-body">
                                <p><font color="#FF7A59">Your order is confirmed. Thank you for shopping with us. <a href="products.php">Click here</a> to purchase any other item.</font></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
               <div class="container">
               
               </div>
           </footer>
        </div>
    </body>
</html>
