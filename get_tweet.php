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

	$sql = " SELECT date_format(t.data_inclusao, '%d/%b/%Y %T' ) AS data_inclusao_formatada, t.tweet, u.usuario, t.id_tweet, u.id";
	$sql.= " FROM tweet AS t JOIN usuarios AS u ON(t.id_usuario = u.id) ";
	$sql.= " WHERE id_usuario = $id_usuario ";
	$sql.= " OR id_usuario IN ( select seguindo_id_usuario from usuarios_seguidores where id_usuario = $id_usuario ) ";
	$sql.= " ORDER BY data_inclusao_formatada DESC ";

	/*ECHO $sql;*/
	
	$resultado_id = mysqli_query($link, $sql);

	if($resultado_id){
		while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
			
			echo '<a href="#" class="list-group-item">';
				echo '<h4 class="list-group-item-heading"> '.$registro['usuario'].' <small> - '.$registro['data_inclusao_formatada'].'</small></h4>';
				echo '<p class="list-group-item-text">'.$registro['tweet'];
					if($id_usuario == $registro['id']){
						echo '<button id="btn_delete_tweet_'.$registro['id_tweet'].'"class="glyphicon glyphicon-trash btn_delete" style="float:right; background-color: Transparent; border: none; outline:none" data-id_tweet="'.$registro['id_tweet'].'"></button>';
						
					}
				echo '</p>';
			echo '</a>';
		}
	}
	else {
		echo 'Erro na consulta de tweets no banco de dados!';
	}
	
 ?>