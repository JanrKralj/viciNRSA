<?php ob_start() ?>
<?php require 'template/layout.html.php'; ?>

<div id="wrapper">
    <form method="POST">
        <h2>Dodaj vic</h2>
        <div class="form-group">
            <label for="exampleInputEmail1">Ime vica</label>
            <input name="ime-vica" type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Tukaj napiši ime vica..." required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Vsebina</label>
            <input name="vsebina-vica" type="text" class="form-control" id="exampleInputPassword1"
                placeholder="Tukaj napiši vsebino vica..." required>
        </div>
        <div id="izbira-kategorije">
            <select class="form-control form-control-lg">
            <?php
                $host = 'localhost';
                $username = 'janrk';
                $userPassword = "12345678";
                $db = 'nrsa';
                $conn = mysqli_connect($host, $username, $userPassword, $db);

                $izpisVsehKategorij = "SELECT * FROM KATEGORIJA;";

                $kategorije = mysqli_query($conn, $izpisVsehKategorij);

                if ($kategorije) {

                    while ($row = mysqli_fetch_assoc($kategorije)) {
                        echo "<option>" . $row['ime_kategorije'] . "</option>";
                    }
                }


                ?>
                <option></option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="dodajVic" style="margin-top: 10px;">Dodaj vic</button>
    </form>
</div>

<?php
$host = 'localhost';
$username = 'janrk';
$userPassword = "12345678";
$db = 'nrsa';

if (isset($_POST['dodajVic'])) {
    $imeVica = $_POST['ime-vica'];
    $vsebinaVica = $_POST['vsebina-vica'];
    $trenutenUporabnik = $_SESSION['user'];

    $najdiUporabnika = "SELECT * FROM USER WHERE USERNAME = '$trenutenUporabnik'";


    $conn = mysqli_connect($host, $username, $userPassword, $db);
    $res = mysqli_query($conn, $najdiUporabnika);
    $userID = 0;

    if ($res) {

        while ($row = mysqli_fetch_assoc($res)) {
            echo $row['id'];
            $userID = $row['id'];
        }
        $vstaviVic = "INSERT INTO VIC (NASLOV, VSEBINA, ID_USER) VALUES ('$imeVica', '$vsebinaVica', $userID);";
        mysqli_query($conn, $vstaviVic);

    }
}
?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap');

    form {
        width: 30vw;
    }

    h2 {
        text-align: center;
        font-family: Outfit, sans-serif;
    }

    #wrapper {
        display: flex;
        justify-content: center;
    }
</style>