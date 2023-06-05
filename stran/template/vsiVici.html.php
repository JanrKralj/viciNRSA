<?php
    ob_start();
?>

<?php
    require 'template/layout.html.php';
?>

<h1>Vsi vici</h1>
<div id="wrapper">
    <?php
        require_once("../model.php");
        vrniVseVice();
    ?>
</div>

<style>

@import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap');

h1 {
    text-align: center;
    font-family: Outfit, sans-serif;
    color: black;
    margin-bottom: 6vh;
}

    #wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
</style>