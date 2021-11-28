<?php

if(!isset($_SESSION['IS_LOGGED']) || (int)$_SESSION['IS_LOGGED'] != 1){
    header("location: logout.php");
}
?>