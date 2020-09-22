<?php
try{//try é tentar ou seja iremos tentar fazer a conexão com o bd
	
 $conexao = new PDO ('mysql:host=localhost;dbname=minhaloja;charset=utf8','root','',array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8'));
 $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//tratamento de erro
	
} catch (PDOException $e){//caso essa conexão não seja realizada retornará esse erro
	echo 'Erro na conexão:' .$e->getMEssage().'<br>';
	echo 'Código erro:' .$e->getCode();
	
}

?>