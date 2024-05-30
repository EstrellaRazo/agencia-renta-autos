<?php
    interface UserInterface {
        public function registrarUsuario($usuario);
        public function login($email, $contrasena);
        /*public function actualizarUsuario($id, $email);
        public function borrarUsuario($id);
        public function obtenerUsuarioPorId($id);
        public function obtenerTodosUsuarios();*/
    }
?>