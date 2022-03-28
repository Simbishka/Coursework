<?php
session_start();

require "config.php";

if(!$_SESSION['id']) {
  if(isset($_POST['sub'])) {
      $login=$_POST['login'];
      $password=$_POST['password'];

      //print $login. " ".$password;

      $query=mysqli_query($db, "SELECT * FROM `users` WHERE `email`='$login' AND `password`='$password'");

      if (mysqli_num_rows($query)>0) {
        $user=mysqli_fetch_assoc($query);
        $id=$user['id'];
        $_SESSION['id']=$id;
        header("Location: ../forum_click.php");
      }
      else {
        header("Location: ../modules/auth_error.php");
        
      }

  }
}
else {
    header("Location: ../forum_click.php");
}

?>