<?php session_start(); 
require_once('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/myprofile.css">
    <title>
        Myprofile
    </title>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/myprofile.css"> 
    <title>
        My Site
    </title>
</head>
<?php
        $idid = $_SESSION['user']['id'];
        $list = mysqli_query($connect, "SELECT * FROM users WHERE id = '$idid' ");
        $list = mysqli_fetch_all($list);
        foreach($list as $li){
        }
    ?>
<body style="background-image:url(../images/1626192986_52-kartinkin-com-p-fon-dlya-messendzhera-krasivo-54.jpg); background-repeat: no-repeat;background-position: center center;background-attachment: fixed;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> 
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Zer0</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 top-menu">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Главная</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./about.php">Обо мне</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./galery.php">Галерея</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./hobby.php">Хобби</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./projects.php">Мои проекты</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./game.php">Игра</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle" aria-current="page" data-bs-toggle="dropdown" href="#">Настройки</a>
<ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
<?php $a='<li><a class="dropdown-item" href="./login.php" >Войти</a></li>';
$b='<li><a class="dropdown-item" href="./registration.php" >Зарегистрироваться</a></li>';
$c='';
if ($_SESSION['user']) {
$a='';
$b='';
$c='<li><a class="dropdown-item" href="./myprofile.php">Об аккаунте</a></li>';
}
?>
<?=$a?>
<?=$b?>
<?=$c?>
</ul>
        </li>
      </ul>
    </div>
  </div>
</nav> 
<script src="/examples/vendors/bootstrap-4.1/js/bootstrap.bundle.min.js"></script>
<div class="users">
            <h1>Список пользователей</h1>
            <table>
                <tr>
                    <td>id</td>
                    <td>Логин</td>
                    <td>Аватар</td>
                    <td>Тип пользователя</td>
                    <td>Очки</td>
                    <td>Редактировать</td>
                    <td>Удалить</td>
                </tr>
            <?php
            $query = "SELECT * FROM users";
            $res = mysqli_query($connect, $query);
            while( ($user = mysqli_fetch_array($res))) {
                ?>
                <tr>
                    <?php 
                    $delete = "deletepage.php?id=";
                    if($user['type'] === 'admin'){
                        $delete = ("#");
                    }
                        ?>
                    <td class="data"><?=$user['id']?></td>
                    <td class="data"><?=$user['login']?></td>
                    <td class="data"><img src="<?="../" . $user['avatar']?>" width="100" height = "90" class="avatarimg" alt="Аватарка"></td>
                    <td class ="data"><?=$user['type']?></td>
                    <td class ="data"><?=$user['score']?></td>
                    <td class="data"><a href="./changepage.php?id=<?=$user['id']?>"><img src="../images/icons/edit.png" width="50" class="edel" alt="Редактировать"></a></td>
                    <td class="data"><a href="<?= $delete ?><?=$user['id']?>"><img src="../images/icons/delete.png" width="50" class="edel" alt="Удалить"></a></td>
                </tr>
        </div>
        <?php
    }
    ?>
        </table>