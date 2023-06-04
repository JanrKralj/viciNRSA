<?php
//front controller

if (isset($_GET['stran'])){ //ce se v URL naslovu nahaja spremenljivka stran
	if (($_GET['stran']=="registracija")){
		include 'template/registracija.html.php';
	} else if ($_GET['stran']=="prijava" && !isset($_SESSION['user'])){
		include 'template/prijava.html.php';
  }
  else if(($_GET['stran']=="odjava")) {
    include 'template/odjava.html.php';
  } else {
    include 'template/error.html.php';
  }
} else {
  include 'template/index.html.php';
}
?>
