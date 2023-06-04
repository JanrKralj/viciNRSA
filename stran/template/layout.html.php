<?php
  ob_start();
  session_start();
?>

<!DOCTYPE HTML>
<html>
  <head>
    <link rel=stylesheet type="text/css" href="./css/slog.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="template/css/slog.css">
    <script src="template/js/moment.min.js"></script>
    <script type="text/javascript" src="template/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" href="template/css/bootstrap-datetimepicker.min.css" />
    <title>Moja spletna stran</title>
  </head>
  <body>
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Heci Online</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      
        <?php
          if(isset($_SESSION['user'])) {
            echo '<ul id="nav" class="nav navbar-nav navbar-right">';
            echo "<li id='trenutno-prijavljen'>" . $_SESSION['user'] ."</li>";
            echo "<li><a href='index.php'><i class='fa fa-home' aria-hidden='true'></i></a></li>";
            echo '<li><a href="index.php?stran=odjava">Odjava</li>';
            echo '</ul>';
          } else {
            echo '<ul id="nav" class="nav navbar-nav navbar-right">';
            echo "<li><a href='index.php'><i class='fa fa-home' aria-hidden='true'></i></a></li>";
            echo '<li><a href="index.php?stran=registracija">Registracija</a></li>';
            echo '<li><a href="index.php?stran=prijava">Prijava</a></li>';
            echo '</ul>';
          }
        ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container">
<?php

$content = ob_get_clean();
echo $content;
 ?>
 </div>

  <style>
    .navbar {
      background-color: transparent;
      border: none;
      font-family: Poppins, sans-serif;
    }

    #nav {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    #trenutno-prijavljen {
      color: grey;
      opacity: 0.5;
      margin-right: 1em;
    }

  </style>
  </body>
</html>
