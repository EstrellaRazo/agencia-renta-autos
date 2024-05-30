<?php
    class Database{
        private $conn;

        public function __construct() {
            $this->conn = new mysqli('localhost:8889', 'root', 'root', 'auto-aventura');
            
            if($this->conn->connect_error){
                die('Error en la conexión a la db: ' . $this->conn->connect_error);
            }
        }

        public function getConnection(){
            return $this->conn;
        }
    }
?>