<?php

	//Variável que guarda o nome do proj.
	$project_name = "slim";
	//Variável que guarda o caminho do projeto no servidor.
	$project_index = "http://".$_SERVER['SERVER_NAME']."/$project_name";	
	//Variável do projeto no diretório de localização
	$project_path = $_SERVER['DOCUMENT_ROOT']."/$project_name";


	function include_class(){

		require ($GLOBALS['project_path'].'/models/class/User.class.php');

		require ($GLOBALS['project_path'].'/controller/class/Manager.class.php');
		require ($GLOBALS['project_path'].'/models/class/Connect.class.php');
	}

		