<?php

	session_start();
	
	unset(
        $_SESSION['username'],
        $_SESSION['userpass'],
        $_SESSION['usermail'],
        $_SESSION['useradm'],
        $_SESSION['logged'],
    );

    $_SESSION['sucessfullogoff'] = "Obrigado por utilizar nosso projeto!";
	header("Location: index.php");

?>