// ADMINISTRADOR DADOS DE ENTRADA
// EMAIL - master@master.com 
// SENHA - admin123


<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Sistema CRUD \\ Login</title>
    <link rel="shortcut icon" type="imagex/png" href="./assets/icone.ico">
    <link rel="stylesheet" href="./assets/overall.css">
    <link rel="stylesheet" href="./assets/index.css">
</head>

<body>
    
<h1>SISTEMA CRUD</h1>

    <p id = "mensagem">
			<?php if(isset ($_SESSION['loginError']) )
            {
				echo $_SESSION['loginError'];
				unset($_SESSION['loginError']);
		    }
            ?>

            <?php if(isset ($_SESSION['sucessfullogoff']) )
            {
				echo $_SESSION['sucessfullogoff'];
				unset($_SESSION['sucessfullogoff']);
		    }
            ?>
    </p>

    <form method="POST" action="login.php">

        <label for = "email">
            <span>Email</span>
            <input type="email" name="email" class="form-control" placeholder="exemplo@exemplo.com" required autofocus>
        </label>
        
        <label for = "senha">
            <span>Senha</span>
            <input type="password" name="password" class="form-control" minlength="8" required>
        </label>
        
        <button type="submit">Acessar</button>

    </form>

</body>
</html>