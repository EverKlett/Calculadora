<?php
spl_autoload_register(function($className) {
    $file = $_SERVER["DOCUMENT_ROOT"].'/Calculadora/lib/' . $className . '.class.php';
    if (file_exists($file)) {
        require_once $file;
    }
});