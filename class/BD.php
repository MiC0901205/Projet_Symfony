<?php

class BD {
    public $DB;
    private $DBInfo = 'mysql:host=localhost;port=3306;dbname=db_locboat';
    private $hostname = 'root';
    private $password = '';

    public function __construct() {
        try {
            $this->DB = new PDO($this->DBInfo, $this->hostname, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>