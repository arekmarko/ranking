<?php
function get_db_connection() {
    return mysqli_connect('db', 'root', 'example', 'ranking');
}
?>
