<?php
	// OFICINA DE PHP E MYSQL
	mysql_connect("localhost", "root", "usbw") or die("Erro ao conectar com mysql");
	mysql_select_db("projetophp") or die("Erro ao selecionar o banco de dados");

	$deleteID = (!empty($_GET['delete']) ? $_GET['delete'] : "");
	if(!empty($deleteID)){
		$del = mysql_query("DELETE FROM contatos WHERE id = {$deleteID}");
		$msg = ($del == true ? 'deletou' : 'erro ao deletar');	
		echo '<script type="text/javascript">alert("Usuário: '.$del['Nome'].' deletado!");</script>';
	}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<title>Projeto PHP</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.4/semantic.min.css" />
	<link href="https://fonts.googleapis.com/css?family=Exo:300" rel="stylesheet">
</head>
<body>
	<header>
		<div class="title">Projeto PHP e MySQL</div>
	</header>



<div class="ui container">
<div class="ui inverted segment">
	<form action="" method="post">
		<div class="ui input">
			<input required  type="text" name="nome" placeholder="Nome">
		</div>
	<br>
		<div class="ui input">
			<input  required type="text" name="telefone" placeholder="Telefone">
		</div>
	</form>
	<a href="#" class="ui positive button">Acionar usuarios</a>
</div>



	<table class="ui celled table">
  <thead>
    <tr><th>id</th>
    <th>Nome</th>
    <th>Telefone</th>
    <th>Opçoes de Edição</th>
  </tr></thead>
  <tbody>
  <?php 
  		$sql = "SELECT * FROM contatos";
  		$read = mysql_query($sql);
  		while($res = mysql_fetch_array($read)){		
  ?>
    <tr>
      <td><?= $res['id'];?></td>
      <td><?= $res['Nome'];?></td>
      <td><?= $res['Telefone'];?></td>
      <td>
      	<div class="ui buttons">
      		<a class="ui positive button" href="#">Editar</a>
      		<div class="or" data-text="ou"></div>
      		<a class="ui negative button" href="?delete=<?= $res['id'];?>">Apagar</a>
      	</div>
      </td>
    </tr>
  <?php 
  		}
  ?>
  </tbody>
</div>  
</table>






<script   src="http://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.4/semantic.min.js"></script>
</body>
</html>