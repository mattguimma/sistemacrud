<?php 
    session_start(); include_once("connection.php");
    if(!isset($_SESSION['username'])){
        header("Location: index.php");
    }
    
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Sistema CRUD</title>
    <link rel="shortcut icon" type="imagex/png" href="./assets/icone.ico">
    <link rel="stylesheet" href="./assets/overall.css"> 
    <link rel="stylesheet" href="./assets/list.css"> 
</head>

<body>
    <h1>LISTAGEM DE REGISTROS</h1>

    <a href='home.php' id="home">Home</a>  <br> <br>

    <form method="POST" id="searching" action="search.php">
			<input id="searchbar" type="text" name = "search" placeholder = "Pesquisar por usuário...">
            <button type="submit" aria-label="Pesquisar">
                <img src="./assets/698627.png"  style="max-width:32px; max-height:32px; margin-left: 10px; cursor:pointer">
            </button>
	</form>
    
    <?php
        echo "<div id = 'mensagem'>";
        if (isset($_SESSION['sucessremove'])) {
        echo $_SESSION['sucessremove'];
        unset($_SESSION['sucessremove']);
        }

        if (isset($_SESSION['removeadmattempt'])) {
            echo $_SESSION['removeadmattempt'];
            unset($_SESSION['removeadmattempt']);
        }

        if (isset($_SESSION['failedremove'])) {
            echo $_SESSION['failedremove'];
            unset($_SESSION['failedremove']);
        }

        if (isset($_SESSION['nulluser'])) {
            echo $_SESSION['nulluser'];
            unset($_SESSION['nulluser']);
        }

        if (isset($_SESSION['notadm'])) {
            echo $_SESSION['notadm'];
            unset($_SESSION['notadm']);
        }

        if (isset($_SESSION['nosearchinfo'])) {
            echo $_SESSION['nosearchinfo'];
            unset($_SESSION['nosearchinfo']);
        }
        echo "</div>";

        $pagina_atual = filter_input(INPUT_GET,'pg', FILTER_SANITIZE_NUMBER_INT);		
		$pg = (!empty($pagina_atual)) ? $pagina_atual : 1; ;
        $itemspg = 5;
        $inipg = ($pg * $itemspg) - $itemspg;

        $query = "SELECT * FROM user_info LIMIT $inipg, $itemspg";
        $v_exit = mysqli_query($conn, $query);
        
        while($rowuser = mysqli_fetch_assoc($v_exit)){

            echo "<div id = 'linha'>";
            echo "<input type='hidden' name='adm' value'" . $rowuser['adm'] . "'>" ;
            echo "<h2>" . $rowuser['fullname'] . " (". $rowuser['user'] .") </h2>";
            echo "<div id = 'info'>";
            echo 'Data de nascimento: ' . $rowuser['niver'] . '<br>';
            echo 'Sexo: ' . $rowuser['sexo'] . '<br>';
            echo 'E-mail: ' . $rowuser['email'] . '<br><br>';
            echo $rowuser['logradouro'] . ', ' . $rowuser['casanum'] . ' ' . $rowuser['complemento'] . ' - ' . $rowuser['bairro'] . '<br>';
            echo $rowuser['cidade'] . ' - ' . $rowuser['uf'] . ' - Código Postal: ' . $rowuser['cep'] . '<br><br>';
            echo "</div>";

            if($_SESSION['useradm']!=null){
            echo "<a style='color:#daa520'; href='edit.php?id=" . $rowuser['id'] . "'>Editar registro</a> <a style='color:red' href='remove.php?id=" . $rowuser['id'] . "'>Remover registro</a><br><hr>"; }
        
            else echo "<hr>";  
            echo "</div>";
        }

        $v_numpg = "SELECT COUNT(id) AS num_result FROM user_info";
		$numpg = mysqli_query($conn, $v_numpg);
		$row_pg = mysqli_fetch_assoc($numpg);
        $qntpg = ceil($row_pg['num_result'] / $itemspg);
		$backpg = $pg - 1; 
        $nextpg = $pg + 1;
		
        echo "<div id = 'paginacao'>";

        if($qntpg != 1){
            if($pg > 1)
            echo "<a href='list.php?pg=$backpg'><<</a>  ";

            echo "$pg";

            if($pg < $qntpg)
            echo "  <a href='list.php?pg=$nextpg'>>></a> ";
        }
		
        echo "</div>";

    ?>

</body>
</html>