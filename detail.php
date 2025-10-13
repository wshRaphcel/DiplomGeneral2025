<?php
require('vendor/autoload.php');

use Jm\Webproject\App;
use Jm\Webproject\Book;

// create an app object based on App class
$app = new App();

$title = "Detail Page";
$message = "Hello there";

// create an instance of the book class
$cls_book = new Book();

if( isset($_GET["id"]) ) {
    echo "<h2>" . $_GET["id"] . "</h2>";
}
else {
    header("location: index.php");
}
?>