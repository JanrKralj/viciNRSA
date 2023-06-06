<?php
//front controller
session_start();
if (isset($_GET['stran'])){ //ce se v URL naslovu nahaja spremenljivka stran
	if (($_GET['stran']=="registracija")){
		include 'template/registracija.html.php';
	} else if ($_GET['stran']=="prijava" && !isset($_SESSION['user'])){
		include 'template/prijava.html.php';
  }
  else if(($_GET['stran']=="odjava")) {
    include 'template/odjava.html.php';
  }
  else if(($_GET['stran']=="admin" && isset($_SESSION['user']))) {
    include 'template/admin.html.php';
  }
  else if(($_GET['stran']=="dodajVic" && isset($_SESSION['user']))) {
    include 'template/dodajVic.html.php';
  }
  else if($_GET['stran'] == "vsiVici") {
    include "template/vsiVici.html.php";
  }
  else if($_GET['stran'] == 'urediBrisi' && isset($_SESSION['user'])) {
    include "template/urediBrisi.html.php";
  }
  else if($_GET['stran'] == 'uredi' && isset($_SESSION['user'])) {
    include 'template/uredi.html.php';
  }
  else if($_GET['stran'] == 'brisi' && isset($_SESSION['user'])) {
    include 'template/brisi.html.php';
  }
  else {
    include 'template/error.html.php';
  }
} else {
  include 'template/index.html.php';
}
?>