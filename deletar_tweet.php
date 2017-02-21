<?php 
	
	session_start();

	if(!isset($_SESSION['usuario'])){
		header('Location: index.php?erro=1');
	}

	require_once('db.class.php');

	$id_usuario = $_SESSION['id_usuario'] ;
	$id_tweet = $_POST['id_tweet'];

	if($id_tweet == '' && $id_usuario == ''){
		die();
	}

	//Instância do objeto DB e conexão do BD
	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$sql = " DELETE FROM tweet WHERE id_usuario = $id_usuario AND id_tweet = $id_tweet ";
	
	mysqli_query($link, $sql);

 ?>