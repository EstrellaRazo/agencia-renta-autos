<?php
	require_once '../backend/controllers/PagoController.php';

	$pagoController = new PagoController();

	switch ($_SERVER["REQUEST_METHOD"]) {
		case 'POST':
			$accion = $_POST['accion'];
			if ($accion == 'agregar') {
				$pagoController->agregar();
            }
        break;
    }
?>