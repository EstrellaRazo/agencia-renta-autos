<?php
    class Auto{
        private $id;
        private $url;
        private $marca;
        private $modelo;
        private $anio;
        private $plazas;
        private $puertas;
        private $transmision;
        private $categoria;
        private $precio;

        // Creacion del Constructor de la Clase
        public function __construct ($url, $marca, $modelo, $anio, $plazas, $puertas, $transmision, $categoria, $precio) {
            $this->url = $url;
            $this->marca = $marca;
            $this->modelo = $modelo;
            $this->anio = $anio;
            $this->plazas = $plazas;
            $this->puertas = $puertas;
            $this->transmision = $transmision;
            $this->categoria = $categoria;
            $this->precio = $precio;
        }

        // Getters y Setters para cada una de las propiedades
        public function getId () {
            return $this->id;
        }

        public function getUrl () { 
            return $this->url;
        }

        public function getMarca () {
            return $this->marca;
        }

        public function getModelo () {
            return $this->modelo;
        }

        public function getAnio () {
            return $this->anio;
        }

        public function getPlazas () {
            return $this->plazas;
        }

        public function getPuertas () {
            return $this->puertas;
        }

        public function getTransmision () {
            return $this->transmision;
        }

        public function getCategoria () {
            return $this->categoria;
        }

        public function getprecio () {
            return $this->precio;
        }

        //---------------Setters------------

        public function setId ($id) {
            $this->id = $id;
        }

        public function setUrl ($url) {
            $this->url = $url;  
        }

        public function setMarca ($marca) {
            $this->marca = $marca;
        }

        public function setModelo ($modelo) {
            $this->modelo = $modelo;
        }

        public function setAnio ($anio) {
            $this->anio = $anio;
        }

        public function setPlazas ($plazas) {
            $this->plazas = $plazas;
        }

        public function setPuertas ($puertas) {
            $this->puertas = $puertas;
        }

        public function setTransmision ($transmision) {
            $this->transmision = $transmision;
        }

        public function setCategoria ($categoria) {
            $this->categoria = $categoria;
        }

        public function setPrecio ($precio) {
            $this->precio = $precio;
        }
    }
?>