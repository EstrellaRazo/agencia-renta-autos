<?php
    interface UserInterface {
        public function registrarUsuario($usuario);
        public function login($email, $contrasena);
    }
?>