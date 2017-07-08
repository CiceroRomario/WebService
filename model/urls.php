<?php

	//Variável que guarda o nome do proj.
	$project_name = "slim";
	//Variável que guarda o caminho do projeto no servidor.
	$project_index = "http://".$_SERVER['SERVER_NAME']."/$project_name";	
	//Variável do projeto no diretório de localização
	$project_path = $_SERVER['DOCUMENT_ROOT']."/$project_name";




	function include_class(){

		require ($GLOBALS['project_path'].'/models/class/User.class.php');
		require ($GLOBALS['project_path'].'/models/class/Category.class.php');
		require ($GLOBALS['project_path'].'/models/class/Product.class.php');
		require ($GLOBALS['project_path'].'/models/class/People.class.php');

		//Manager e Connect
		require ($GLOBALS['project_path'].'/models/class/Connect.class.php');
		require ($GLOBALS['project_path'].'/models/class/Manager.class.php');
		
		//Incluindo arquivo de validação de mensagens (success, errors e infos)
		require ($GLOBALS['project_path'].'/controller/validate.php');

		//functions: menu, get_timestamp, return_month, send_email...
		require ($GLOBALS['project_path'].'/controller/functions.php');
	}

		