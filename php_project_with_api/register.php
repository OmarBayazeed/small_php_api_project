<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['username']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $phone = mysqli_real_escape_string($conn, $_POST['phone']);

   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){

      echo json_encode(array('status'=>'fail')) ;

   }else{
      mysqli_query($conn, "INSERT INTO `users`(username, email, password, phone) VALUES('$name', '$email', '$pass', '$phone')") or die('query failed');

      echo json_encode(array('status'=>'success'));

   }

}

?>

