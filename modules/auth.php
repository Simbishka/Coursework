<?php
session_start();

require "../server/config.php";

if($_SESSION['id']){
    header("Location: ../forum_click.php");
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css.css"> 
        <title>Авторизация</title>
    </head>
    <body>
        <form method="post" action="../server/auth.php" class="auth_form">
            <input class="auth_login" type="text" name="login" placeholder="Логин"/> <br />
            <input class="auth_password" type="password" name="password" placeholder="Пароль"/> <br />
            <input class="auth_button" type="submit" name="sub" value="Вход"/>
        </form>
        <a href="reg.php"> Зарегистрироваться </a>
        <br>
        <a href="../index.php">Главная</a>
    </body>
</html>

