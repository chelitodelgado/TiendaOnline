<?php

function controller_autoload($classname) {
    $class_rep = str_replace('\\', '/', $classname);
    include_once 'controllers/' . $class_rep . '.php';
}

spl_autoload_register('controller_autoload');
