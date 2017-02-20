<?php 

	
	require_once('db.class.php');



	$sql = " SELECT * FROM usuarios ";

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	//update true/false
	//insert true/false
	//select false/resource
	//delete true/false
	//executar a query (conexão, $sql)
	$resultado_id = mysqli_query($link,$sql);

	if($resultado_id){

		$dados_usuario = array();
		
		//MYSQLI_ASSOC retorna o item indexado por associação de identificadores
		//MYSQLI_NUM retorna o item indexado por número
		while($linha = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
			$dados_usuario[] = $linha;
		}

		foreach ($dados_usuario as $usuario) {
			var_dump($usuario['email']);
			echo "<br />";
		}
	}
	else{
		echo 'Erro na execução da consulta, favor entrar em contato com o admin do site';
	}

 ?>