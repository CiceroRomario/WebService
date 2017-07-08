<?php
	//arquivo principal de toda página
	//possui as rotas de todos os arquivos
	require 'model/urls.php';
	require 'controller/validate.php';
	require	//classe de modelo do Usuário
	require 'model/class/User.class.php';
	//iniciar a sessao
	session_start();

	//testa se ja existe usuario logado
	if(isset($_SESSION[md5('us_inventory')])){		
		//recupera os dados do usuário
		$user = $_SESSION[md5('us_inventory')];

		//testa se é admin
		if($user->profile_page != "admin"){
			header("location: $project_index?error=permission_denied");
		}
	}else{
		header("location: $project_index?error=permission_denied");
	}

	//titulo da página
	$page_title = "Página do Administrador";

	function page_content(){
		validate_message();

		if(validate_option() == false){
			include_once $GLOBALS['project_path'].'/templates/welcome.phtml';
		}
	}

	//incluindo template
	require 'templates/template.phtml';