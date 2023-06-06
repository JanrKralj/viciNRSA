<?php
    ob_start();
    require 'template/layout.html.php';
    require_once("../model.php");
?>

<div id="wrapper">
    <h1>Uredi vic</h1>
    <form method="POST">
<?php
    najdiVic($_GET['vic']);
    if(isset($_POST['urediVic'])) {
        $novNaslov = $_POST['naslovVica'];
        $novaVsebina = $_POST['vsebinaVica'];
        $idVica = $_GET['vic'];
        $date = date('Y-m-d H:i:s');
        $query = "UPDATE VIC SET NASLOV='$novNaslov', VSEBINA='$novaVsebina', datumSpremembe = '$date' WHERE ID = $idVica";
        $res = mysqli_query(mysqli_connect('localhost', 'janrk', '12345678', 'nrsa'), $query);

        if($res) {
            echo '<div class="alert alert-success" role="alert">
            Vic posodobljen uspešno!
          </div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">
            Napaka pri posodobitvi!
          </div>';
        }
    }
?>
<a style="margin-top: 3em;" class="link-opacity-100" href="index.php?stran=admin">Nazaj na admin</a>
</form>
</div>




<style>

@import url("https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap");

    #wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    form {
        width: 600px;
    }

    h1 {
        color: black;
        text-align: center;
        font-family: Outfit, sans-serif;
    }

    a:first-child() {
        display: flex;
        flex-direction: column;
        margin-top: 4vh;
        justify-content: center;
        align-items: center;
    }

    input {
        width: 600px;
    }

    .alert {
        margin-top: 2em;
    }
</style>