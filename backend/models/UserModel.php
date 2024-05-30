<?php
    class User{
        private $id;
        private $nombre;
        private $apaterno;
        private $amaterno;
        private $fechaNacimiento;
        private $telefono;
        private $email;
        private $contrasena;

        // Creacion del Constructor de la Clase
        public function __construct ($nombre, $apaterno, $amaterno, $fechaNacimiento, $telefono, $email, $contrasena) {
            $this->nombre = $nombre;
            $this->apaterno = $apaterno;
            $this->amaterno = $amaterno;
            $this->fechaNacimiento = $fechaNacimiento;
            $this->telefono = $telefono;
            $this->email= $email;
            $this->contrasena = $contrasena;
        }

        // Getters y Setters para cada una de las propiedades
        public function getId () {
            return $this->id;
        }

        public function setId ($id) {
            $this->id = $id;
        }

        public function getNombre () {
            return $this->nombre;
        }

        public function setNombre ($nombre) {
            $this->nombre = $nombre;
        }

        public function getApaterno () {
            return $this->apaterno;
        }

        public function setApaterno ($apaterno) {
            $this->apaterno = $apaterno;
        }

        public function getAmaterno () {
            return $this->amaterno;
        }

        public function setAmaterno ($amaterno) {
            $this->amaterno = $amaterno;
        }

        public function getFechaNacimiento () {
            return $this->fechaNacimiento;
        }

        public function setFechaNacimiento ($fechaNacimiento) {
            $this->fechaNacimiento = $fechaNacimiento;
        }

        public function getTelefono () {
            return $this->telefono;
        }

        public function setTelefono ($telefono) {
            $this->telefono = $telefono;
        }

        public function getEmail () {
            return $this->email;
        }

        public function setEmail ($email) {
            $this->email = $email;
        }

        public function getContrasena () {
            return $this->contrasena;
        }

        public function setContrasena ($contrasena) {
            $this->contrasena = $contrasena;
        }
    }
?>