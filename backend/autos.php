<?php
	require_once '../backend/controllers/AutoController.php';

	$autoController = new AutoController();

	switch ($_SERVER["REQUEST_METHOD"]) {
		case 'POST':
			$accion = $_POST['accion'];
			if ($accion == 'agregar') {
				$autoController->agregar();
            } else if ($accion == 'obtener') {
				$id = $_POST['id'];
				$autoController->obtenerAutoPorId($id);
			}
		break;
		case 'GET':
			$accion = $_GET['accion'];
			if($accion == "todos"){
				$autoController->obtenerTodosAutos();
			}
		break;
	}
?>