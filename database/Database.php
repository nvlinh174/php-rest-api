<?php
class Database
{
    private $hostname = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'php_rest_api';

    public function getConnection()
    {
        error_reporting(0);
        mysqli_report(MYSQLI_REPORT_OFF);

        $mysqli = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);

        if ($mysqli->connect_errno > 0) {
            die('Error: ' . $mysqli->connect_error);
        } else {
            return $mysqli;
        }
    }
}
