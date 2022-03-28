<?php
session_start();

require "../server/config.php";
$id=$ctg['id'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css.css">   
        <title>Создание темы</title>
    </head>
    <body>
        <form method="post" action="../server/topicadd.php">
            <input type="text" name="razdel_title" placeholder="Название раздела"/> <br />
            <input type="submit" name="submit" value="Создать" />
        </form>
        <a href="../forum_click.php"> Назад </a>
    </body>
</html>