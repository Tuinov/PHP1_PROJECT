<?php

define("TEMPLATES_DIR", "../views/");
define("LAYOUTS_DIR", "layouts/");
define("ENGINE_DIR", "../engine/");


define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'geekbrains');

// include_once ENGINE_DIR . 'lib_autoload.php';

include "../engine/db.php";
include "../engine/goods.php";
include "../engine/cart.php";
include "../engine/controller.php";
include "../engine/render.php";
include "../engine/resize.php";
include "../engine/admin.php";