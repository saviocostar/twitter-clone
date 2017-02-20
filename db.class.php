<?php 
	
	/**
	* 
	*/
	class db 
	{
		//HOST
		private $host = 'localhost';
		
		//USUARIO
		private $usuario = 'root';

		//SENHA
		private $senha = '';

		//BANCO DE DADOS
		private $database = 'twitter_clone';


		public function conecta_mysql(){

			//criar a conexao (localização do BD, usuario de acesso, senha, banco de dados)
			$con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

			//ajustar o charset de comunicação entre a aplicação e o banco de dados
			mysqli_set_charset($con, 'utf8');

			//verificar se houve erro de conexão
			if(mysqli_connect_errno()){
				echo 'Erro ao tentar se conectar com o BD MySQL: '.mysqli_connect_error();
			}

			return $con;
		}
	}


 ?>