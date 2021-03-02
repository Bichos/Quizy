<?php
session_start();


if(isset($_SESSION['id_user'])){
     if($_SESSION['role'] != 1){
        header('Location: menu.php');
     }
    }  
    else{
        header('Location: login.php');
    }

?>
<!doctype html>
<html lang="pl">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/v4-shims.css">
    <title>Panel administracyjny</title>
  </head>
  <body>
  <div class="container">
    <h1>Panel administracyjny</h1>
    <a class="btn " href="./admin/achievements.php">Osiągnięcia</a>
    <a class="btn " href="./admin/categories.php">Kategorie</a>
    <a class="btn " href="./admin/questions.php">Pytania</a>
    <a class="btn " href="./admin/users.php">Użytkownicy</a>
    <a class="btn " href="menu.php">Menu gry</a>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  </body>
</html>