<?php
   if($_SERVER['HTTP_HOST'] == "localhost"){
      include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/parkplace/database/db.php');
  }
  else {
      include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/database/db.php');
  }
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $email=mysqli_real_escape_string($conn,$_POST['email']);
      $password = mysqli_real_escape_string($conn,$_POST['password']);
      
      $sql = "SELECT `id`,`email`,`password` FROM users WHERE email = '$email' and password = '$password'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         // session_register("email");
         $_SESSION['login_user'] = $email;
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
