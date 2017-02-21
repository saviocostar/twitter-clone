<?php 
	
	session_start();
	if(!isset($_SESSION['usuario'])){
		header('Location: index.php?erro=1');
	}

	require_once('db.class.php');

	$id_usuario = $_SESSION['id_usuario'] ;

	//Instância do objeto DB e conexão do BD
	$objDb = new db();
	$link = $objDb->conecta_mysql();

	// -- qtde de tweets
	$sql = " SELECT COUNT(*) as qtde_tweets FROM tweet WHERE id_usuario = $id_usuario ";
	$resultado_id = mysqli_query($link, $sql);
	$qtde_tweets = 0;

	if($resultado_id){
		$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
		echo 'TWEETS '.$registro['qtde_tweets'];
	}
	else{
		echo 'Erro ao executar a query';
	}
	
 ?>