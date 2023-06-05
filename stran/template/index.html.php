<?php
require "template/layout.html.php";
?>
<div class="row">
    <h1 id="naslov">Vsi heci na enem mestu.</h1>
    <p id="intro">Tukaj lahko najdete najboljše hece na enem mestu. Če jih želite urejati, se prijavite.</p>
    
    <h2>Kategorije</h2>
    <div id="kategorija-wrapper">
        <?php
        require_once("../model.php");
            vrniVseKategorije();
        ?>
    </div>
    <h2>Najnovejši vici</h2>
    <div id="wrapper">
        <?php
        require_once("../model.php");
        
        vrni3Vice();
        ?>
    </div>

</div>

<style>
    body {
        font-family: Poppins, sans-serif;
    }

    h1 {
        color: black;
        text-align: center;
        margin-top: 3em;
    }

    #intro {
        text-align: center;
        line-height: 2.5em;
    }

    #wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 4vh;
    }

    #kategorija-wrapper {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }

    #kategorija-wrapper div {
        width: 600px;
    }

    h2 {
        text-align: center;
        margin-top: 60px;
        margin-bottom: 10px;
    }
</style>