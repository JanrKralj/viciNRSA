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

?>