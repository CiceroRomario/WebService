<?php
require 'vendor/autoload.php';

$app = new \Slim\App;

$app->get('/', function ($request, $response, $args){

	//arquivo principal de toda página
	//possui as rotas de todos os arquivos
	include_once 'model/urls.php';
	//validação de mensagens, opções do menu, e ações do sistema
	include_once 'controller/validate.php';
	//dicionário
	include_once 'model/dictionary.php';

	//classe de modelo do Usuário
	include_once 'model/class/User.class.php';

	//iniciar a sessao
	session_start();

	//testa se ja existe usuario logado
	if(isset($_SESSION[md5('us_inventory')])){		
		//recupera os dados do usuário
		$user = $_SESSION[md5('us_inventory')];

		header("location: ".$user->profile_page.".php");
	}

        //titulo da página
	$page_title = "Página Inicial";

	function page_content(){
		validate_message();
		validate_option();
	require $GLOBALS['project_path'].'/templates/welcome.phtml';
	}
	
        //incluindo template
	require 'templates/template.phtml';
});



$app->run();