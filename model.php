<?php
    function open_database_connection() {
        mysqli_connect('localhost', 'janrk', '12345678', 'nrsa');
    }

    function close_database_connection() {
        mysqli_close(open_database_connection());
    }

    function vrni3Vice() {
        $zadnji3Vici = "SELECT * FROM VIC ORDER BY ID DESC LIMIT 3;";
    
        $res = mysqli_query(mysqli_connect('localhost', 'janrk', '12345678', 'nrsa'), $zadnji3Vici);
        if ($res) {
            while ($row = mysqli_fetch_assoc($res)) {
                echo '<div class="jumbotron">';
                echo '<h1 class="display-4">' . $row['naslov'] . '</h1>';
                echo '<hr class="my-4">';
                echo '<p>' . $row['vsebina'] .'</p>';
                echo '</div>';
                echo '<style>

                @import url("https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap");


                    .jumbotron {
                        width: 1000px;
                        height: auto;
                    }

                    .display-4, p {
                        margin-left: 3vh;
                        font-family: Outfit, sans-serif;
                    }

                    hr {
                        margin-left: 3vh;
                        margin-right: 3vh;	
                    }

                
                </style>';
            }
        }
    }

    function vrniVseKategorije() {
        $vseKategorije = "SELECT * FROM KATEGORIJA;";
        $res = mysqli_query(mysqli_connect('localhost', 'janrk', '12345678', 'nrsa'), $vseKategorije);
        if ($res) {
            while ($row = mysqli_fetch_assoc($res)) {
                echo '<div class="jumbotron">';
                echo '<h4 class="display-4">' . $row['ime_kategorije'] . '</h1>';
                echo '<hr class="my-4">';
                echo '</div>';
                echo '<style>

                @import url("https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap");


                    .jumbotron {
                        width: 600px;
                    }

                    .display-4, p {
                        margin-left: 3vh;
                        font-family: Outfit, sans-serif;
                    }

                    hr {
                        margin-left: 3vh;
                        margin-right: 3vh;	
                    }

                
                </style>';
            }
        }
    }

    function vrniVseVice() {
        $vsiVici = "SELECT * FROM VIC ORDER BY ID DESC";
        $res = mysqli_query(mysqli_connect('localhost', 'janrk', '12345678', 'nrsa'), $vsiVici);
        if ($res) {
            while ($row = mysqli_fetch_assoc($res)) {
                echo '<div class="jumbotron">';
                echo '<h1 class="display-4">' . $row['naslov'] . '</h1>';
                echo '<hr class="my-4">';
                echo '<p>' . $row['vsebina'] .'</p>';
                echo '</div>';
                echo '<style>

                @import url("https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap");


                    .jumbotron {
                        width: 1000px;
                    }

                    .display-4, p {
                        margin-left: 3vh;
                        font-family: Outfit, sans-serif;
                    }

                    hr {
                        margin-left: 3vh;
                        margin-right: 3vh;	
                    }

                
                </style>';
            }
        }
    }

    function urediBrisiVice() {
        $vsiVici = "SELECT * FROM VIC ORDER BY ID DESC";
        $res = mysqli_query(mysqli_connect('localhost', 'janrk', '12345678', 'nrsa'), $vsiVici);

        if ($res) {
            while ($row = mysqli_fetch_assoc($res)) {
                echo '<div class="jumbotron">';
                echo '<h1 class="display-4">' . $row['naslov'] . '</h1>';
                echo '<hr class="my-4">';
                echo '<p>' . $row['vsebina'] .'</p>';
                echo '<div id="urediBrisi" style="margin-left: 3vh;"><a class="btn btn-warning" style="color: white; text-decoration: none;" href="index.php?stran=uredi&vic=' . $row['id'] .'">Uredi</a><a style="margin-left: 1.5vh;" class="btn btn-danger" style="color: white; text-decoration: none;" href="index.php?stran=brisi&vic=' . $row['id'] .'">Briši</a></div>';
                echo '</div>';
                echo '<style>

                @import url("https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap");


                    .jumbotron {
                        width: 1000px;
                    }

                    .display-4, p {
                        margin-left: 3vh;
                        font-family: Outfit, sans-serif;
                    }

                    hr {
                        margin-left: 3vh;
                        margin-right: 3vh;	
                    }

                    #operate {
                        display: flex;
                        gap: 20px;
                        margin-left: 3vh;
                    }

                
                </style>';
            }
        }
    }

    function najdiVic($idVica) {
        $query = "SELECT * FROM VIC WHERE ID = $idVica";
        $res = mysqli_query(mysqli_connect('localhost', 'janrk', '12345678', 'nrsa'), $query);
        while($row = mysqli_fetch_assoc($res)) {
            if($row) {
                $naslovVica = $row['naslov'];
                $vsebina = $row['vsebina'];
                echo '<div id="form-wrapper">';
                echo '<div class="mb-3">';
                echo '<label for="exampleFormControlInput1" class="form-label">Naslov vica</label>';
                echo '<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Vnesite naslov vica..." name="naslovVica" value=" '. $naslovVica . '" required>';
                echo '</div>';
                echo '<div class="mb-3">';
                echo '<label for="exampleFormControlTextarea1" class="form-label">Vsebina vica</label>';
                echo '<textarea class="form-control" id="exampleFormControlTextarea1" name="vsebinaVica" required>' . $vsebina . '</textarea>';
                echo '<button type="submit" name="urediVic" style="margin-top: 1em;" class="btn btn-success">Uredi</button>';
                echo '</div>';
                echo "</div>";
                
            }
        }
    }

    function izbrisiVic($idVica) {
        $deleteQuery = "DELETE FROM VIC WHERE ID = $idVica";
        $res = mysqli_query(mysqli_connect('localhost', 'janrk', '12345678', 'nrsa'), $deleteQuery);
        if($res) {
            echo '<div class="alert alert-danger" role="alert"><br><p>Izbris uspešno zaključen!</p></div>';
        } else {
            echo '<div class="alert alert-danger" role="alert"><br><p>Napaka pri izbrisu!</p></div>';
        }
    }
?>