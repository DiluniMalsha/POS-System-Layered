<?php
/**
 * Created by IntelliJ IDEA.
 * User: HP
 * Date: 7/17/2019
 * Time: 1:30 PM
 */

class DBConnection
{
    private $host = "localhost";
    private $username = "root";
    private $password = "9899";
    private $database = "possystem";
    private $port = "3306";


    private $connection;

    public function __construct()
    {


        $this->connection = new mysqli(

            $this->host, $this->username, $this->password, $this->database, $this->port
        );


        if ($this->connection->connect_errno) {

            echo $this->connection->connect_error;
            die();

        }
    }

    public function getConnection()
    {

        return $this->connection;
    }


}