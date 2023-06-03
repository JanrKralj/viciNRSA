<?php ob_start()?>
<?php
    require 'template/layout.html.php';
?>
<?php
session_destroy();
$_SESSION = array();
?>

<h2>Želite potrditi odjavo iz računa?</h2>
<div id="odjava-div">
    <a href="index.php?" class="btn btn-danger btn-lg" role="button">Odjava</a>
</div>


<style>

  @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap');


    h2 {
        font-family: Outfit, sans-serif;
        text-align: center;
        margin-top: 8vh;
    }



    #odjava-div {
        display: flex;
        justify-content: center;
        margin-top: 4vh;
    }
</style>


