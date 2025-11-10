<?php
require('vendor/autoload.php');

use Jm\Webproject\App;

$app = new App();

session_destroy();

header("location:/");

?>