<?php
    function open_database_connection() {
        mysqli_connect('localhost', 'janrk', '12345678', 'user');
    }

    function close_database_connection() {
        mysqli_close();
    }

?>