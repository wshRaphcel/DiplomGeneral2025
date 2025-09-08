<?php
namespace Jm\Webproject;

use Exception;
use Jm\Webproject\App;

class Database extends App {
    protected $connection;
    private $user;
    private $password;
    private $host;
    private $name;
    public function __construct()
    {
        $this -> user = $_ENV['DBUSER'];
        $this -> password = $_ENV['DBPASSWORD'];
        $this -> host = $_ENV['DBHOST'];
        $this -> name = $_ENV['DBNAME'];
        $this -> connect();
    }
    private function connect() {
        try {
            $this -> connection = mysqli_connect(
                $this -> host,
                $this -> user,
                $this -> password,
                $this -> name
            );
            if( !$this -> connection ) {
                throw new Exception("database connection failed");
            }
        }
        catch( Exception $e ) {
            echo $e -> getMessage();
        }
    }
}
?>