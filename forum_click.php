<?php
session_start();
require "server/config.php";
if(!$_SESSION['id'])
{
  header("Location: modules/auth.php");
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lazy English</title>
      <link rel="stylesheet" type="text/css" href="css.css">          
  </head>
  <body>   
<header class="header">
  <a href="index.html" class="logo"><img src="images/face.svg"></a>
  <input class="menu-btn" type="checkbox" id="menu-btn" />
  <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
  <li class="site_title">Lazy English</li>
  <ul class="menu">
    <li><a href="forum_click.php">Форум</a></li>
    <li><a href="index.php">Главная</a></li>
    <li><a href="page1.php">Фразовые глаголы, устойчивые выражения</a></li>
    <li><a href="page2.php">Времена в английском языке</a></li>
    <li><a href="page3.php">Топ  используемых слов </a></li>
  </ul>
</header>
<br> <br> <br> <br> <br> <br>  
<a href="modules/logout.php"> Выйти </a>
<br>
<?php
$topics = mysqli_query($db, "SELECT * FROM `topics`");
if(mysqli_num_rows($topics)>0){
  while($topic=mysqli_fetch_assoc($topics)) {
    $id=$topic['id'];
    $name=$topic['name'];

    print "<a href='/modules/themes.php?id=$id'>$name</a> <br/>";
  }
}
else {
  print "Нет разделов";
}
?>
<a href="/modules/topic_new.php"> Создать новый раздел </a>
<p class="message_sum"> Сообщений в теме: </p>

<div class="message_top">
<p class="username"> Имя пользователя </p>
<p class="delivered"> Отправлено ( <span class="date">Дата </span>, <span class="time"> Время </span>  )
</div>

<section class="message_content">
  <div class="message_container">
    <div class="user_details">
      <p class="user_role"> Роль пользователя </p>
      <img class="user_pic" src = "images/profile_pic_example.png" alt="">
    </div>

    <div class="message_text">
      <p class="user_message"> Товарищи! укрепление и развитие структуры позволяет выполнять важные задания по разработке системы обучения кадров, соответствует насущным потребностям. Разнообразный и богатый опыт укрепление и развитие структуры в значительной степени обуславливает создание направлений прогрессивного развития. Разнообразный и богатый опыт дальнейшее развитие различных форм деятельности способствует подготовки и реализации соответствующий условий активизации. Равным образом реализация намеченных плановых заданий представляет собой интересный эксперимент проверки соответствующий условий активизации.
Задача организации, в особенности же рамки и место обучения кадров требуют определения и уточнения модели развития. Не следует, однако забывать, что консультация с широким активом способствует подготовки и реализации форм развития.
Товарищи! начало повседневной работы по формированию позиции способствует подготовки и реализации форм развития. Идейные соображения высшего порядка, а также начало повседневной работы по формированию позиции влечет за собой процесс внедрения и модернизации соответствующий условий активизации.</p>
    </div>
  </div>
</section>

<footer class="Footer">
      <br><br>
      <p class="footer_par">© Панфилов Б.А., 2021<p>   
      </footer>

</body>
</html>
