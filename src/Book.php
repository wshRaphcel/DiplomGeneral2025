<?php
namespace Jm\Webproject;

use Exception;
use Jm\Webproject\App;
use Jm\Webproject\Database;

class Book extends Database {
    public function __construct() {
        parent::__construct();
    }
    public function getBooks() {
        $query = "
        SELECT 
        id,
        Title,
        Author,
        Cover,
        Publisher,
        Genre
        FROM Book
        ";
        // run the query against the database connection
        $statement = $this -> connection -> prepare( $query );
        // execute the query
        $statement -> execute();
        // get the result
        $result = $statement -> get_result();
        // create an array to store result
        $books = array();
        // loop through every row in the result
        while( $row = $result -> fetch_assoc() ) {
            array_push( $books, $row );
        }
        return $books;
    }
}
?>