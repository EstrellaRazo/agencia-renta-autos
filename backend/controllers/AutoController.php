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

		/*public function borrarUsuario($id) {
			$resultado = $this->userService->borrarUsuario($id);
			if($resultado){
				echo json_encode(array("success" => true, "message" => "Usuario eliminado correctamente"));
			}
			else{
				echo json_encode(array("success" => false, "message" => "Error al borrar usuario"));
			}
		}

		public function obtenerUsuarioporId($id) {
			$resultado = $this->userService->obtenerUsuarioPorId($id);
			if($resultado){
				echo json_encode(array("success" => true, "users" => $resultado));
			}
			else{
				echo json_encode(array("success" => false, "message" => "Error al actualizar usuario"));
			}
		}

		public function actualizarUsuario ($id) {
			$nombre = $_POST['nombre'];
			$apaterno = $_POST['apaterno'];
			$amaterno = $_POST['amaterno'];
			$direccion = $_POST['direccion'];
			$telefono = $_POST['telefono'];
			$correo = $_POST['correo'];
			$usuario = $_POST['usuario'];
			$password = $_POST['password'];

			$usuarioNuevo = new User($nombre, $apaterno, $amaterno, $direccion, $telefono, $correo, $usuario, $password);
			$resultado = $this->userService->actualizarUsuario($id, $usuarioNuevo);

			if ($resultado) {
				echo json_encode(array("success" => true, "message" => "Usuario Actualizado Satisfactoriamente"));
			} else {
				echo json_encode(array("success" => false, "message" => "Error al Actualizar Usuario"));
			}
		}*/
	}
?>