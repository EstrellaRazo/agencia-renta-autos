<?php
    require_once '../backend/models/AutoModel.php';
    require_once '../backend/db/Database.php';
    require_once '../backend/interfaces/AutoInterface.php';

    class AutoService implements AutoInterface {
        private $db;

        public function __construct ($db) {
            $this->db = $db;
        }

        public function agregarAuto($auto) {
            $url = $auto->getUrl();
            $marca = $auto->getMarca();
            $modelo = $auto->getModelo();
            $anio = $auto->getAnio();
            $plazas = $auto->getPlazas();
            $puertas = $auto->getPuertas();
            $transmision = $auto->getTransmision();
            $categoria = $auto->getCategoria();
            $precio = $auto->getPrecio();

            $sql_insertar = "INSERT INTO autos (id, url, marca, modelo, anio, plazas, puertas, transmision, categoria, precio) VALUES (null, 
                    '$url', '$marca', '$modelo', '$anio', '$plazas', '$puertas', '$transmision', '$categoria', '$precio')";

            if ($this->db->query($sql_insertar) === TRUE) { //Si se pudo insertar el usuario nuevo
                return true;
            } else {
                return false;
            }
        }

        public function obtenerTodosAutos() {
			$sql = "SELECT * FROM autos";
			$result = $this->db->query($sql);
			$autos = array();

			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$autos[] = $row;
				}
			}

			return $autos;
		}
    }

?>