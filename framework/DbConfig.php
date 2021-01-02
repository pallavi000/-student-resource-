<?php
class DbConfig {

        private $dns = "";
        private $hostname = "localhost";
        private $username = "root";
        private $password = "";
        private $database = "scholarmaterials_db";

    /*private $hostname = "localhost";
    private $username = "standard_intech_user";
    private $password = "W=7@+7ZMACn4";
    private $database = "standard_intech_db";*/


    public function connect() {

        if ($_SERVER['REMOTE_ADDR'] == '197.0.0.1' || $_SERVER['REMOTE_ADDR'] == '::1') {
            try{
                $this->dns = "mysql:host=$this->hostname;dbname=$this->database";
                $con = new PDO($this->dns, $this->username, $this->password);

                return $con;
            }catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }

        } else {
            try{
                $this->dns = "mysql:host=$this->hostname;dbname=$this->database";
                $con = new PDO($this->dns, $this->username, $this->password);

                return $con;
            }catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
    }

}