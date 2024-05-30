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
				//Verificamos que la contraseña sea correcta
				if (password_verify($contrasena, $usuario['contrasena'])) {
					return $usuario;
				}
			}
			return false;
		}

		/*public function obtenerTodosUsuarios() {
			$sql = "SELECT * FROM usuarios";
			$result = $this->db->query($sql);
			$users = array();

			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$users[] = $row;
				}
			}
			return $users;
		}

		public function actualizarUsuario ($id, $usuario) {
			$nombre = $usuario->getNombre();
			$apaterno = $usuario->getApaterno();
			$amaterno = $usuario->getAmaterno();
			$direccion = $usuario->getDireccion();
			$telefono = $usuario->getTelefono();
			$correo = $usuario->getCorreo();
			$username = $usuario->getUsuario();

			$sql_update = "UPDATE usuarios
				SET nombre='$nombre', apaterno='$apaterno', amaterno='$amaterno', direccion='$direccion', telefono='$telefono', correo='$correo', usuario='$username'
				WHERE id='$id'";
			if ($this->db->query($sql_update) === TRUE) {
				return true;
			} else {
				return false;
			}
		}

		public function borrarUsuario ($id) {
			$sql_borrar = "DELETE FROM usuarios WHERE id='$id'";
			if ($this->db->query($sql_borrar) === TRUE) {
				return true;
			} else {
				return false;
			}
		}

		public function obtenerUsuarioPorId($id) {
			$sql = "SELECT * FROM usuarios WHERE id='$id'";
			$result = $this->db->query($sql);
			if ($result->num_rows == 1) {
				return $result->fetch_assoc();
			}
			return null;
		}

		public function obtenerUsuarioPorCorreo($correo) {
			$sql = "SELECT * FROM usuarios WHERE correo='$correo'";
			$result = $this->db->query($sql);
			if ($result->num_rows == 1) {
				return $result->fetch_assoc();
			}
			return null;
		}*/
	}
?>