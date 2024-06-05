<?php
    require_once '../backend/models/PagoModel.php';
    require_once '../backend/db/Database.php';
    require_once '../backend/interfaces/PagoInterface.php';

    class PagoService implements PagoInterface {
        private $db;

        public function __construct ($db) {
            $this->db = $db;
        }

        public function agregarPago($pago) {
            $rentaId = $pago->getRentaId();
            $nombre = $pago->getNombre();
            $fecha = $pago->getFecha();
            $metodoPago = $pago->getMetodoPago();


            $sql_insertar = "INSERT INTO pago (id, renta_id, nombre, fecha, metodoPago) VALUES (null, '$rentaId', '$nombre', '$fecha', '$metodoPago')";

            if ($this->db->query($sql_insertar) === TRUE) { //Si se pudo insertar el pago
                return true;
            } else {
                return false;
            }
        }
    }
?>
