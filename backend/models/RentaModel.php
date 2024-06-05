<?php
class Renta{
    private $id;
    private $usuId;
    private $vehId;
    private $fechaRenta;
    private $fechaDev;
    private $costo;

    public function __construct($usuId, $vehId, $fechaRenta, $fechaDev, $costo){
        $this->usuId = $usuId;
        $this->vehId = $vehId;
        $this->fechaRenta = $fechaRenta;
        $this->fechaDev = $fechaDev;
        $this->costo = $costo;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getUsuId(){
        return $this->usuId;
    }

    public function setUsuId($usuId){
        $this->usu_id = $usuId;
    }

    public function getVehId(){
        return $this->vehId;
    }

    public function setVehId($vehId){
        $this->veh_id = $vehId;
    }

    public function getFechaRenta(){
        return $this->fechaRenta;
    }

    public function setFechaRenta($fechaRenta){
        $this->fechaRenta = $fechaRenta;
    }

    public function getFechaDev(){
        return $this->fechaDev;
    }

    public function setFechaDev($fechaDev){
        $this->fechaDev = $fechaDev;
    }

    public function getCosto(){
        return $this->costo;
    }

    public function setCosto($costo){
        $this->costo = $costo;
    }
}
?>