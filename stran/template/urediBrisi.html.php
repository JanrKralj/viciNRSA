<?php
    ob_start();
?>

<?php
require 'template/layout.html.php';
    require_once("../model.php");
?>

<h1>Uredi brisi</h1>
<div id="wrapper">
    <?php
        urediBrisiVice();
    ?>
    <p><a class="link-opacity-100" href="index.php?stran=admin">Nazaj na admin</a></p>
</div>

<style>

@import url("https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap");

    h1 {
        font-family: Outfit, sans-serif;
        text-align: center;
        color: black;
    }

    .jumbotron {
        width: 600px;
        font-family: Outfit, sans-serif;
    }

    #wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 8vh;
    }

</style>

