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
    <title>Panel administracyjny</title>
    <?php include "../templates/links.php" ?>
    <link rel="stylesheet" href="../../css/admin.css">

    <script src="https://cdn.tiny.cloud/1/o8kei060mtzs6lct2dn53kz5vg4hc5s0wgx4k67y3x0c8ovd/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
    $(document).ready(function(){

      load_page();

        $(".nav-link").click(function(){
            var link = this.href.split("#");
            $("#content").load("./"+link[1]+".php");
        });

        function load_page()
        {
          var href = window.location.href.split("#");

          if(href.length > 1)
          {
            $("#content").load("./"+href[1]+".php");
          }
        }
        
    });
    </script>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <h1 class="navbar-brand">Panel administracyjny</h1>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <!-- <li class="nav-item">
        <a class="nav-link" href="#users">Użytkownicy</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="#achievements">Osiągnięcia</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#categories">Kategorie</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#questions">Pytania</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../menu.php">Menu gry</a>
      </li>
    </ul>
  </div>
  </nav>

  <div id="content" class="container"></div>

<?php include "../templates/scripts-links.php" ?>
  </body>
</html>