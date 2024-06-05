<?php
	require_once '../backend/services/AutoService.php';

	class AutoController {
		private $autoService;

		public function __construct() {
			$db = (new Database())->getConnection();
			$this->autoService = new AutoService($db);
		}

		public function agregar () {
            $url = $_POST['url'];
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $anio = $_POST['anio'];
            $plazas = $_POST['plazas'];
            $puertas = $_POST['puertas'];
            $transmision = $_POST['transmision'];
            $categoria = $_POST['categoria'];
            $precio = $_POST['precio'];

			$autoNuevo = new Auto($url, $marca, $modelo, $anio, $plazas, $puertas, $transmision, $categoria, $precio);

			$resultado = $this->autoService->agregarAuto($autoNuevo);

			if ($resultado) {
				echo json_encode(array("success" => true, "message" => "Auto Agregado Satisfactoriamente"));
			} else {
				echo json_encode(array("success" => false, "message" => "Error al Registrar Auto"));
			}
		}

		public function obtenerTodosAutos() {
			$autos = $this->autoService->obtenerTodosAutos();
			if($autos){
				echo json_encode(array("success" => true, "autos" => $autos));
			}
			else{
				echo json_encode(array("success" => false, "message" => "Error al obtener autos"));
			}
		}

		
		public function obtenerAutoporId($id) {
			$resultado = $this->autoService->obtenerAutoPorId($id);

			if($resultado){
				echo json_encode(array("success" => true, "autos" => $resultado));
			}
			else{
				echo json_encode(array("success" => false, "message" => "Error al encontrar auto"));
			}
		}
	}
?>