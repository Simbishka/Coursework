<?php
session_start();

require "../server/config.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css.css">   
        <title>Регистрация</title>
    </head>
    <body>
        <form method="post" action="/server/reg.php" class="reg_form">
            <input type="text" name="login" placeholder="Логин"/> <br />
            <input type="password" name="password" placeholder="Пароль"/> <br />
            <input type="text" name="name" placeholder="Имя"/> <br />
            <input type="text" name="gender" placeholder="Пол"/>   <br />
            <input class="reg_button" type="submit" name="reg" value="Регистрация"/>
         

        </form>
    </body>
</html>