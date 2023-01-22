<?php
    session_start();
	include_once('connection.php');
	
	if(empty($_POST['search'])){
        header('Location: list.php');
        $_SESSION['nosearchinfo'] = "<br>Por favor, insira um nome de usuário.";
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
    
    <head>
        <meta charset="utf-8">
        <title>Sistema CRUD // Registros</title>
        <link rel="shortcut icon" type="imagex/png" href="./assets/icone.ico">
        <link rel="stylesheet" href="./assets/overall.css">
        <link rel="stylesheet" href="./assets/search.css">
    </head>

    <body>

    <?php

    $result = $_POST['search'];

    $v_query = "SELECT * FROM user_info WHERE fullname LIKE '%$result%' OR user LIKE '%$result%'";
	$query = mysqli_query($conn, $v_query);

    echo "<h2>PESQUISA</h2><br>";
	
	while($rowresults = mysqli_fetch_array($query)){
        echo "<div id = 'linha'>";
		echo "<input type='hidden' name='adm' value'" . $rowresults['adm'] . "'>" ;
        echo "<h3>" . $rowresults['fullname'] . " (". $rowresults['user'] .") </h3>";
        echo "<div id = 'info'>";
        echo 'Data de nascimento: ' . $rowresults['niver'] . '<br>';
        echo 'Sexo: ' . $rowresults['sexo'] . '<br>';
        echo 'E-mail: ' . $rowresults['email'] . '<br><br>';
        echo $rowresults['logradouro'] . ', ' . $rowresults['casanum'] . ' ' . $rowresults['complemento'] . ' - ' . $rowresults['bairro'] . '<br>';
        echo $rowresults['cidade'] . ' - ' . $rowresults['uf'] . ' - Código Postal: ' . $rowresults['cep'] . '<br><br>';
        echo "</div>";


        if($_SESSION['useradm']!=null){
            echo "<a style='color:#daa520'; href='edit.php?id=" . $rowresults['id'] . "'>Editar registro</a> <a style='color:red' href='remove.php?id=" . $rowresults['id'] . "'>Remover registro</a><br><hr>"; }
        else echo "<hr>"; 
        echo "</div>";
	}

    echo "<a id='back' href='list.php'>RETORNAR</a>";

    ?>

    </body>
</html>