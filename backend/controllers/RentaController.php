<?php
require_once '../backend/services/RentaService.php';

	class RentaController {
		private $rentaService;
		private $archivo;
		private $db;

		public function __construct() {
			$db = (new Database())->getConnection();
			$this->rentaService = new RentaService($db);
		}

		public function agregar () {
			$archivo = 'usuario.json';
			if (file_exists($archivo)) {
				// Leer el contenido del archivo
				$contenido = file_get_contents($archivo);
				$usuario = json_decode($contenido, true);
			}
				
			$archivo1 = 'auto.json';
			if (file_exists($archivo1)) {
				// Leer el contenido del archivo
				$contenido1 = file_get_contents($archivo1);
				$auto = json_decode($contenido1, true);
			}
	

			$usuId = $usuario['id'];
			$vehId = $auto['id'];
			
			// Recibir las fechas del formulario
			$fechaRenta = $_POST['fechaRecoleccion'];
			$fechaDev = $_POST['fechaDevolucion'];

			// Convertir las fechas a objetos DateTime
			$fechaInicio = new DateTime($fechaRenta);
			$fechaFin = new DateTime($fechaDev);

			// Calcular la diferencia entre las dos fechas
			$diferencia = $fechaInicio->diff($fechaFin);

			// Obtener la diferencia en días
			$diasDiferencia = $diferencia->days;

		
            $precio = $auto['precio']; 

            $costo = $precio * $diasDiferencia;

			$rentaNueva = new Renta($usuId, $vehId, $fechaRenta, $fechaDev, $costo);

			$resultado = $this->rentaService->agregarRenta($rentaNueva);

			if ($resultado) {
				echo json_encode(array("success" => true, "message" => "Renta Agregada Satisfactoriamente"));
			} else {
				echo json_encode(array("success" => false, "message" => "Error al Registrar Renta"));
			}

			$idRenta = $this->rentaService->getLastInsertedId();

			$array = array(
				"costo" => $costo,
				"fechaRenta" => $fechaRenta,
				"fechaDev" => $fechaDev,
				"id" => $idRenta,
			);

			$arrayJson = json_encode($array);
            $archivo = 'renta.json';

			file_put_contents($archivo, $arrayJson);
		}
    }
?>