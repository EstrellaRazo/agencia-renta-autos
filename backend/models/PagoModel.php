<?php
    class Pago{
        private $id;
        private $rentaId;
        private $nombre;
        private $fecha;
        private $metodoPago;
        private $importe;

        public function __construct($rentaId, $nombre, $fecha, $metodoPago){
            $this->rentaId = $rentaId;
            $this->nombre = $nombre;
            $this->fecha = $fecha;
            $this->metodoPago = $metodoPago;
        }

        public function getId(){
            return $this->id;
        }

        public function getRentaId(){
            return $this->rentaId;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function getFecha(){
            return $this->fecha;
        }

        public function getMetodoPago(){
            return $this->metodoPago;
        }

        //SETTERS

        public function setId($id){
            $this->id = $id;
        }

        public function setRentaId($rentaId){
            $this->rentaId = $rentaId;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function setFecha($fecha){
            $this->fecha = $fecha;
        }

        public function setMetodoPago($metodoPago){
            $this->metodoPago = $metodoPago;
        }
    }
?>