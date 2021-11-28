<?php
require dirname(__FILE__). '/config/config.php';
$_SESSION = array();
session_destroy();
header("location: login.php");