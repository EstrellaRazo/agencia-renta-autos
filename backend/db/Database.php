<?php
    class Database{
        private $con;

        public function --construct(){
            this->con = new mysqli('localhost:8889', 'root', 'root', 'auto-aventura');
            
            if($this->con->connect_error){
                die('Error en la conexión a la db' . $this->vcon->connect_error);
            }

            public function getConnection(){
                return $this->con;
            }
        }
    }
?>