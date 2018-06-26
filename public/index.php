<?php

define("ROOT", dirname(__DIR__) . DIRECTORY_SEPARATOR);
require(ROOT . "config/config.php");
require('../vendor/autoload.php');

new Core();

