<?php

require_once 'config.php';

spl_autoload_register('autoload');

function autoload($class_name){
    require_once dirname(__FILE__) . '/../lib/' . $class_name . '.php';
}