<?php
    require 'connection.php';
    session_start();
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $regex_email="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";
    if(!preg_match($regex_email,$email)){
        echo "Incorrect email. Redirecting you back to login page...";
        ?>
        <meta http-equiv="refresh" content="2;url=login.php" />
        <?php
    }
	//mysqli_real_escape_string
    $password=mysqli_real_escape_string($con,$_POST['password']);
	
	/*if (isset($_POST['password']) && !empty($_POST['user_password'])) {
		$user_password = $_POST['password'];
		echo $user_passkey =$user_password.'<br>';

		$filename = 'hash.txt';
		$handle = fopen($filename, 'r');
		echo $file_password  = fread($handle, filesize($filename));

		if ($user_passkey==$file_password) {
			echo 'correct password';
		} else {
			echo 'Incorrect Password';
			}

			} else {
			echo 'Please enter a password';
		}*/
	
    if(strlen($password)<6){
        echo "Password should have atleast 6 characters. Redirecting you back to login page...";
        ?>
        <meta http-equiv="refresh" content="2;url=login.php" />
        <?php
    }
    $user_authentication_query="select id,email from users where email='$email' and password='$password'";
    $user_authentication_result=mysqli_query($con,$user_authentication_query) or die(mysqli_error($con));
    $rows_fetched=mysqli_num_rows($user_authentication_result);
    if($rows_fetched==0){
        //no user
        //redirecting to same login page
        ?>
        <script>
            window.alert("Wrong username or password");
        </script>
        <meta http-equiv="refresh" content="1;url=login.php" />
        <?php
        //header('location: login');
        //echo "Wrong email or password.";
    }else{
        $row=mysqli_fetch_array($user_authentication_result);
        $_SESSION['email']=$email;
        $_SESSION['id']=$row['id'];  //user id
        header('location: products.php');
    }
    
 ?>