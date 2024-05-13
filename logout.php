<?php 
session_start();
if (isset($_SESSION["KH_USERNAME"])){
    unset($_SESSION["KH_USERNAME"]);
};
header('Location: index.php');
?>