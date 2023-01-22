<?php
session_start();
include_once("connection.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$adm = filter_input(INPUT_GET, 'adm', FILTER_SANITIZE_NUMBER_INT);

if(!empty($id)){
    
    if ($_SESSION['useradm']==null) {
        $_SESSION['notadm'] = "<p style='color:red;'>Apenas administradores podem remover usuários.</p>";
        header("Location: list.php");
        exit();
    }
    
    if($id == 1){
        $_SESSION['removeadmattempt'] = "<p style='color:red;'>Não pode remover um administrador!</p>";
		header("Location: list.php");
        exit();
    }

	$v_access = "DELETE FROM user_access WHERE id='$id'";
    $v_info = "DELETE FROM user_info WHERE id='$id'";

	$resultado_access = mysqli_query($conn, $v_access);
    $resultado_info = mysqli_query($conn, $v_info);

    if(mysqli_affected_rows($conn)){
		$_SESSION['sucessremove'] = "<p style='color:green;'>Usuário apagado com sucesso.</p>";
		header("Location: list.php");
	}
    
    else{	
		$_SESSION['failedremove'] = "<p style='color:red;'>Erro o usuário não foi apagado com sucesso</p>";
		header("Location: list.php");
	}


}

else{	
	$_SESSION['nulluser'] = "<p style='color:red;'>Necessário selecionar um usuário</p>";
	header("Location: list.php");
}

