<?php
namespace Jm\webproject;
// declare other components used in this class
use Dotenv;
use \Exception;

class App {
    // visibility
    public function __construct() {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    }
    
}
?>