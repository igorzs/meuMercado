<?php
    $path = dirname(__DIR__). '/inc/';

    session_start();

    require_all($path);
    function require_all($path) {
        foreach (glob($path.'*.php') as $filename) require_once $filename;
    }
?>