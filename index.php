<?php 
spl_autoload_register(function ($classes) {
    include "systems/libs/" . $classes . ".php";
}); 
include "app/config/config.php";

$main = new Main();

