<?php
    class Database{
        private $con;

        public function --construct(){
            this->conn = new mysqli('localhost:8889', 'root', 'root', 'auto-aventura');
        }
    }
?>