<?php

    class Database{
        private $severname = "localhost";
        private $username = "root";
        private $password = "root";
        private $database = "EC";

        public $conn;



        public function __construct(){
            $this->conn = new mysqli($this->severname,$this->username,$this->password,$this->database);
            //connection string
            if($this->conn->connect_error){
                die("Connection error: " .$this->conn->connect_error);
            }

            return $this->conn;
        }


    }
?>