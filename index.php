<?php 
	include_once 'user.php';
	include_once 'user_session.php';

	$userSession = new UserSession();
	$user = new User(); 
    
    if(isset($_SESSION['user']))
    {
        $user->setUser($userSession->getCurrentUser());
        include_once 'panel.php';
    }else 
    if (isset($_POST['usuario']) &&  isset($_POST['clave'])) {
    	$userForm = $_POST['usuario'];
	    $passForm = $_POST['clave'];
	    $user = new User();
		    if($user->userExists($userForm, $passForm)){
		        //echo "Existe el usuario";
		        $userSession->setCurrentUser($userForm);
		        $user->setUser($userForm);
		        include_once 'panel.php';
		    }else{
		        //echo "No existe el usuario";
		        $errorLogin = "El nombre de usuario y/o clave incorrecto";
		        include_once 'login.php';
		    }
	}else{
    	include_once 'login.php';
	}
?>

