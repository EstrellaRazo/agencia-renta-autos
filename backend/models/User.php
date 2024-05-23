<?php
    class UserController {
        private $userService;

        #Creamos la nueva bade de datos
        public function __construct(){
            $db = (new Database())->getConnection();
            
        }
    }
?>