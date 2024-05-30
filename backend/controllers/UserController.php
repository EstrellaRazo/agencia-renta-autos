<?php
	require_once '../backend/services/UserService.php';

	class UserController {
		private $userService;

		public function __construct() {
			$db = (new Database())->getConnection();
			$this->userService = new UserService($db);
		}

		public function login() {
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$email = $_POST['email'];
				$contrasena = $_POST['contrasena'];

				if (!empty($email) && !empty($contrasena)) {
					$user = $this->userService->login($email, $contrasena);
					if ($user) { //Si existe el usuario
						// redirigir a otra pagina
						echo json_encode(array("success" => true, "message" => "Inicio Satisfactorio"));
					} else {
						echo json_encode(array("success" => false, "message" => "Credenciales Incorrectas"));
					}
				} else {
					echo json_encode(array("success" => false, "message" => "Faltan Datos"));
				}
			} else {
				echo json_encode(array("success" => false, "message" => "Tipo de peticion incorrecta"));
			}
		}

		public function registrar () {
			$nombre = $_POST['nombre'];
			$apaterno = $_POST['apaterno'];
			$amaterno = $_POST['amaterno'];
			$fechaNacimiento = $_POST['fechaNacimiento'];
			$telefono = $_POST['telefono'];
			$email = $_POST['email'];
			$contrasena = $_POST['contrasena'];

			$usuarioNuevo = new User($nombre, $apaterno, $amaterno, $fechaNacimiento, $telefono, $email, $contrasena);

			$resultado = $this->userService->registrarUsuario($usuarioNuevo);

			if ($resultado) {
				echo json_encode(array("success" => true, "message" => "Usuario Registrado Satisfactoriamente"));
			} else {
				echo json_encode(array("success" => false, "message" => "Error al Registrar Usuario"));
			}
		}

		/*public function obtenerTodosUsuarios() {
			$users = $this->userService->obtenerTodosUsuarios();
			if($users){
				echo json_encode(array("success" => true, "users" => $users));
			}
			else{
				echo json_encode(array("success" => false, "message" => "Error al obtener usuarios"));
			}
		}

		public function borrarUsuario($id) {
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