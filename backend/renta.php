<?php
	require_once '../backend/controllers/RentaController.php';

	$rentaController = new RentaController();

	switch ($_SERVER["REQUEST_METHOD"]) {
		case 'POST':
			$accion = $_POST['accion'];
			if ($accion == 'agregar') {
				$rentaController->agregar();
            }
        break;
		
    }
?>