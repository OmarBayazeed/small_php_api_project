<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE username = '$username' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $data = mysqli_fetch_assoc($select);
      echo json_encode(array('status' => 'success','data' => $data));
   }else{
       echo json_encode(array('status' => 'fail'));
   }

}

?>

