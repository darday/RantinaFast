<?php 
	include_once 'user.php';
	include_once 'user_session.php';

	$userSession = new UserSession();
	$user = new User(); 
	
    if(isset($_SESSION['user']))
    {
		require_once 'lacolmenadata/conexion.php';

		$correo = $_SESSION['user'];
		$query="Select * from usuarios where correo = '$correo' ";
		$run = mysqli_query($conn, $query);
		$row = $run->fetch_array();
		if($row['tipo'] == 1){			
			$user->setUser($userSession->getCurrentUser());
			include_once 'venta.php';
			//header('location: venta.php');
		}else{
			if($row['tipo'] == 2){
				$user->setUser($userSession->getCurrentUser());
				include_once 'panel_prov.php';
			}else{
				if($row['tipo'] == 3){
					$user->setUser($userSession->getCurrentUser());
					include_once 'admin.php';
				}
			}
		}
		
		
		
    }else 
    if (isset($_POST['usuario']) &&  isset($_POST['clave'])) {
    	$userForm = $_POST['usuario'];
	    $passForm = $_POST['clave'];
	    $user = new User();
		    if($user->userExists($userForm, $passForm)){
		        //echo "Existe el usuario";
		        $userSession->setCurrentUser($userForm);
		        $user->setUser($userForm);
		        include_once 'admin.php';
		    }else{
				
				if($user->userExistsProv($userForm, $passForm)){
					//echo "Existe el usuario";
					$userSession->setCurrentUser($userForm);
					$user->setUser($userForm);
					include_once 'panel_prov.php';
				}else{

					if($user->userExistsClien($userForm, $passForm)){
						//echo "Existe el usuario";
						$userSession->setCurrentUser($userForm);
						$user->setUser($userForm);
						include_once 'venta.php';
					} else{
						$errorLogin = "El nombre de usuario y/o clave incorrecto";
	 					include_once 'login.php';

					}

				}
		       
		    }
	}else{
    	include_once 'login.php';
	}


	 //echo "No existe el usuario";
	// $errorLogin = "El nombre de usuario y/o clave incorrecto";
	 //include_once 'login.php';
?>

