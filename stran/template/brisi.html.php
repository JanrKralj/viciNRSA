<?php ob_start();
    require 'template/layout.html.php';
?>

<div id="wrapper">
    <h1>Potrdi izbris...</h1>
    <form method="POST">
        <a href="index.php?stran=urediBrisi" name="preklici" class="btn btn-danger">Prekliči</a>
        <button type="submit" name="izbrisi" class="btn btn-success">Izbriši</button>
    </form>

    <?php
        require_once("../model.php");

        if(isset($_POST['izbrisi'])) {
            izbrisiVic($_GET['vic']);
        }
    ?>
</div>
