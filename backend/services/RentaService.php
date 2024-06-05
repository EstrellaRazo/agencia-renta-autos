<?php
    require_once '../backend/models/RentaModel.php';
    require_once '../backend/db/Database.php';
    require_once '../backend/interfaces/RentaInterface.php';

    class RentaService implements RentaInterface {
        private $db;

        public function __construct ($db) {
            $this->db = $db;
        }

        public function agregarRenta($renta) {
            $usuId = (int)$renta->getUsuId();
            $vehId = (int)$renta->getVehId();
            $fechaRenta = $renta->getFechaRenta();
            $fechaDev = $renta->getFechaDev();
            $costo = $renta->getCosto();

            $sql_insertar = "INSERT INTO renta (id, usu_id, veh_id, fechaRenta, fechaDevolucion, costo) VALUES (null, '$usuId', '$vehId', '$fechaRenta', '$fechaDev', '$costo')";

            if ($this->db->query($sql_insertar) === TRUE) { //Si se pudo insertar la renta
                return true;
            } else {
                return false;
            }
        }

        public function getLastInsertedId() {
            return $this->db->insert_id;
        }
    }
?>