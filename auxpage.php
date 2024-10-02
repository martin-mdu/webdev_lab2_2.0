<?php
session_start();
if ($_SESSION['loggedin']) {
    header('Location: adminpage.php');
} else {
    header('Location: loginpage.php');
}
