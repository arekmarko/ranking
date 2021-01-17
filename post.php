<?php
session_start();
if (!isset($_SESSION['ok']))
{
    header('Location: index.php');
    exit();
}
else
{
    echo "Oddałeś głos na numer ".$_SESSION['vote'];
    unset($_SESSION['vote']);
    unset($_SESSION['ok']);
}
?>