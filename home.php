<?php session_start();
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
    <link rel="stylesheet" href="./assets/home.css">
</head>

<body>
    <h1>SISTEMA CRUD</h1> <br>

    <div id="main">
    <div id="butoes">
    <?php 
        echo "Seja bem vindo, ". $_SESSION['fulluser'] . ".<br>";
        if (isset($_SESSION['sucessregister'])) {
            echo $_SESSION['sucessregister'];
            unset($_SESSION['sucessregister']);
        }

        if (isset($_SESSION['sucessedit'])) {
            echo $_SESSION['sucessedit'];
            unset($_SESSION['sucessedit']);
        }

        if (isset($_SESSION['notadm'])) {
            echo $_SESSION['notadm'];
            unset($_SESSION['notadm']);
        }
        
        if ($_SESSION['useradm']==1) {
        echo "<br><a id='opcoes' href='register.php'>CADASTRAR</a>";
        }
    ?>
    
    <br>
	<a id="opcoes" href="list.php">REGISTROS</a>
    </div>
    <br><br>
    <a id="sair" href="logoff.php">SAIR</a><br>
    </div>   
</body>
</html>