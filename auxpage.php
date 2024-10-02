<?php
session_start();
echo($_SESSION['loggedin']);
    if ($_SESSION['loggedin']) {
        header('Location: adminpage.php');
    } else {
        header('Location: loginpage.php');
    }

?>