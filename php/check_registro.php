<?php
include_once '../init.php';
        // se guardan los valores del formulario registro para su procesamiento 
		$nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];
        $conf_contrasena = $_POST['conf_contrasena'];
        $direccion = $_POST['direccion'];
        $dni = $_POST['dni'];
        $pais = $_POST['pais'];
        $ciudad = $_POST['ciudad'];
        $telefono = $_POST['telefono'];
        $codigo_postal = $_POST['codigo_postal'];
        
        //se comprueba que no esten vacios por si acaso
        
        
		if(!empty($nombre) or !empty($apellidos) or !empty($correo) or !empty($contrasena) or !empty($conf_contrasena) or !empty($direccion) or !empty($dni) or !empty($pais) or !empty($ciudad) or !empty($telefono) or !empty($codigo_postal)){
            //se comprueba el tipo de cada variable
			$nombre = $usuario->checkInput($nombre);
            $apellidos = $usuario->checkInput($apellidos);
            $correo = $usuario->checkInput($correo);
            $contrasena = $usuario->checkInput($contrasena);
            $direccion = $usuario->checkInput($direccion);
            $dni = $usuario->checkInput($dni);
            $pais = $usuario->checkInput($pais);
            $ciudad = $usuario->checkInput($ciudad);
            $telefono = $usuario->checkInput($telefono);
            $codigo_postal = $usuario->checkInput($codigo_postal);
            
            //se comprueba de que el correo no esté en la base de datos, si lo está, se rediccionará de nuevo a registro
            if($usuario->checkCorreo($correo) === true){
					header('Location: ./registro.php');
				}else{  //si no está se enviará a la pagina principal con la sesión iniciada
					$usuario->registro($nombre, $apellidos, $correo, $contrasena, $direccion, $dni, $pais, $ciudad, $telefono, $codigo_postal);
					header('Location: ../index.php');
				}
		}
?>