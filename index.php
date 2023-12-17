<?php

require_once('userdaten.php');
require_once('products.php');

$name = $_GET['cl'] ?: 'home';
include($name . '.php');



