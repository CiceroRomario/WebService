<?php
require 'vendor/autoload.php';

$app = new \Slim\App;

$app->get('/', function ($request, $response, $args){

	$text ="Bem vindo ao Sistema de Gerenciamento de Estoque.\n Aqui você encontra o formulário de identificação de usuário para acessar o Sistema.\n\n Em caso de dúvida contate o Administrador.";
	
	echo nl2br($text);

	require "templates/forms/login.phtml";
	require "controller/login.php";


});




$app->run();