<?php
	require_once '../backend/services/PagoService.php';

	class PagoController {
		private $pagoService;
		private $archivo;
		private $db;

		public function __construct() {
			$db = (new Database())->getConnection();
			$this->pagoService = new PagoService($db);
		}

		public function agregar () {
			$archivo = 'renta.json';
			if (file_exists($archivo)) {
				// Leer el contenido del archivo
				$contenido = file_get_contents($archivo);
				$renta = json_decode($contenido, true);
			}

            $rentaId = $renta['id'];
            $nombre = $_POST['nombre'];
            $fecha = $_POST['fecha'];
            $metodoPago = $_POST['metodo'];

			$pagoNuevo = new Pago($rentaId, $nombre, $fecha, $metodoPago);

			$resultado = $this->pagoService->agregarPago($pagoNuevo);

			if ($resultado) {
				echo json_encode(array("success" => true, "message" => "Pago Agregado Satisfactoriamente"));
			} else {
				echo json_encode(array("success" => false, "message" => "Error al Agregar Pago"));
			}
		}
    }
