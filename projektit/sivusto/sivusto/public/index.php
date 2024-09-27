<?php

error_reporting(E_ERROR);

set_include_path(dirname(__FILE__) . '/../');

$path = explode("?", $_SERVER["REQUEST_URI"]);
$route = explode("/", $path[0]);
$method = strtolower($_SERVER["REQUEST_METHOD"]);

require_once 'libraries/auth.php';
require_once 'controllers/userManagement.php';
require_once 'controllers/apartmentsManagement.php';

require_once 'controllers/apartmentController.php';


switch($route[1]) {
	case "" :{
		viewApartmentsController();
		break;
	} case "register" :{
		registerController();
		break;
	} case "login" :{
		loginController();
		break;
	} case "logout" :{
		logoutController();
		break;
	} case "asunnot" :{
		viewApartmentController($route[2]);
		break;
	} case "update_apartment" :{
		editApartmentController();
		break;
	}
	case "delete_apartment" :{
		if(isLoggedIn()){
			deleteApartmentController();
		  } else {
			loginController();
		  }
		  break;
	}
	case "edit_apartment" :{
		if(isLoggedIn()){
			editApartmentController();
		  } else {
			loginController();
		  }
		  break;
	}
	case "add_apartment" :{
		if(isLoggedIn()){
			addApartmentController();
		  } else {
			loginController();
		  }
		  break;
	}
	default :{
		echo "404";
	}
}
