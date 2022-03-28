<?php
session_start();

require "config.php";

  if(isset($_POST['reg'])) {
      $login=$_POST['login'];
      $password=$_POST['password'];
      $name=$_POST['name'];
      $gender=$_POST['gender'];
      
    
      //print $login. " ".$password;

      $users = mysqli_query($db, "SELECT * FROM `users` WHERE `email`='$login' AND `password`='$password'");
      if (mysqli_num_rows($users) == 0) {
        mysqli_query($db, "INSERT INTO `users`(`password`, `email`, `name`, `photo`, `gender`) VALUES ('$password', '$login', '$name', 'user.png', '$gender')");

        $users = mysqli_query($db, "SELECT * FROM `users` WHERE `email`='$login' AND `password`='$password'");
        $user=mysqli_fetch_assoc($users);
        $id=$user['id'];
        $_SESSION['id']=$id;
        header("Location:".$site_url);
      }
      else {
        print "Логин или пароль неверный, попробуйте снова! </br>";
        print "<a href=".$site_url.">Назад</a>";
      }

  }
else {
    // session_unset();
    header("Location:".$site_url);
}
?>