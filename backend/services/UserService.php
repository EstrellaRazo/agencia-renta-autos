<?php
  	require_once '../backend/models/UserModel.php';
	require_once '../backend/db/Database.php';
	require_once '../backend/interfaces/UserInterface.php';

	class UserService implements UserInterface {
		private $db;

		public function __construct ($db) {
			$this->db = $db;
		}

		public function registrarUsuario($usuario) {
			$nombre = $usuario->getNombre();
			$apaterno = $usuario->getApaterno();
			$amaterno = $usuario->getAmaterno();
			$fechaNacimiento = $usuario->getFechaNacimiento();
			$telefono = $usuario->getTelefono();
			$email = $usuario->getEmail();
			$contrasena = password_hash($usuario->getContrasena(), PASSWORD_DEFAULT);

			$sql_insertar = "INSERT INTO usuarios (id, nombre, apaterno, amaterno,
					fechaNacimiento, telefono, email, contrasena) VALUES (null, 
					'$nombre', '$apaterno', '$amaterno', '$fechaNacimiento', '$telefono',
					'$email', '$contrasena')";

			if ($this->db->query($sql_insertar) === TRUE) { //Si se pudo insertar el usuario nuevo
				return true;
			} else {
				return false;
			}
		}

		public function login($email, $contrasena) {
			$sql_usuario = "SELECT * FROM usuarios WHERE email = '$email'";
			$result = $this->db->query($sql_usuario);

			if ($result->num_rows == 1) {
				$usuario = $result->fetch_assoc(); //Guardamos los datos del usuario en una variable
				$usuarioJson = json_encode($usuario);
				$archivo = 'usuario.json';
				file_put_contents($archivo, $usuarioJson);

				//Verificamos que la contraseña sea correcta
				if (password_verify($contrasena, $usuario['contrasena'])) {
					return $usuario;
				}

			}
			return false;
		}
	}
?>