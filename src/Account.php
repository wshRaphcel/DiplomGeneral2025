<?php
namespace Jm\Webproject;

use Exception;
use Jm\Webproject\App;

class Account extends Database {
    public function __construct()
    {
        // initialise the database connection
        parent::__construct();

    }

    public function create(
        $email,
        $password,
        $username,
        $first,
        $last
        ) 
    {
        $query = "
        INSERT INTO Account
        (Email,Password,Username,First,Last,Type)
        VALUES
        (?,?,?,?,?,1)
        ";
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $statement = $this -> connection -> prepare($query);
        $statement -> bind_param("sssss", $email,$hash,$username,$first,$last);
        try {
            if ( !$statement -> execute() ) {
                throw new Exception("Whoopsi ! Something is incorrect");
            }
            else {
                // account is created
                return true;
            }
        }
        catch( Exception $e ) {
            // do something
            echo $e -> GetMessage();
            //failure to create account
            return false;
        }

    }

}
?>