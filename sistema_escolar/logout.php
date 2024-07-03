<?php
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}
session_start();
session_destroy();
header("Location: index.php");
?>