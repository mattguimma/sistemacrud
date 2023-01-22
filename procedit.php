<?php

session_start();
include_once("connection.php");

$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
$fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$niver = filter_input(INPUT_POST, 'niver', FILTER_SANITIZE_STRING);
$uf = filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$logradouro = filter_input(INPUT_POST, 'logradouro', FILTER_SANITIZE_STRING);
$casanum = filter_input(INPUT_POST, 'casanum', FILTER_SANITIZE_STRING);
$complemento = filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
$sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

if(isset($login)){
    $dados_login = "UPDATE user_access SET user = '$login' WHERE id='$id'";
    $dados_info = "UPDATE user_info SET user = '$login' WHERE id='$id'";
    $result_login = mysqli_query($conn, $dados_login);
    $result_info = mysqli_query($conn, $dados_info);
    $modified = true;
}

if(isset($fullname)){
    $dados_login = "UPDATE user_info SET fullname = '$fullname' WHERE id='$id'";
    $result_login = mysqli_query($conn, $dados_login);
    $modified = true;
}

if(isset($email)){
    $dados_login = "UPDATE user_access SET email = '$email' WHERE id='$id'";
    $dados_info = "UPDATE user_info SET email = $email WHERE id='$id'";
    $result_login = mysqli_query($conn, $dados_login);
    $result_info = mysqli_query($conn, $dados_info);
    $modified = true;
}

if(isset($password)){
    $dados_login = "UPDATE user_access SET password = '$password' WHERE id='$id'";
    $result_login = mysqli_query($conn, $dados_login);
    $modified = true;
}

if(isset($niver)){
    $dados_login = "UPDATE user_info SET niver = '$niver' WHERE id='$id'";
    $result_login = mysqli_query($conn, $dados_login);
    $modified = true;
}

if(isset($uf)){
    $dados_login = "UPDATE user_info SET uf = '$uf' WHERE id='$id'";
    $result_login = mysqli_query($conn, $dados_login);
    $modified = true;
}

if(isset($cidade)){
    $dados_login = "UPDATE user_info SET cidade = '$cidade' WHERE id='$id'";
    $result_login = mysqli_query($conn, $dados_login);
    $modified = true;
}

if(isset($logradouro)){
    $dados_login = "UPDATE user_info SET logradouro = '$logradouro' WHERE id='$id'";
    $result_login = mysqli_query($conn, $dados_login);
    $modified = true;
}

if(isset($casanum)){
    $dados_login = "UPDATE user_info SET casanum = '$casanum' WHERE id='$id'";
    $result_login = mysqli_query($conn, $dados_login);
    $modified = true;
}

if(isset($complemento)){
    $dados_login = "UPDATE user_info SET complemento = '$complemento' WHERE id='$id'";
    $result_login = mysqli_query($conn, $dados_login);
    $modified = true;
}

if(isset($bairro)){
    $dados_login = "UPDATE user_info SET bairro = '$bairro' WHERE id='$id'";
    $result_login = mysqli_query($conn, $dados_login);
    $modified = true;
}

if(isset($cep)){
    $dados_login = "UPDATE user_info SET cep = '$cep' WHERE id='$id'";
    $result_login = mysqli_query($conn, $dados_login);
    $modified = true;
}

if(isset($sexo)){
    $dados_login = "UPDATE user_info SET sexo = '$sexo' WHERE id='$id'";
    $result_login = mysqli_query($conn, $dados_login);
    $modified = true;
}

//$dados_login = "UPDATE user_access SET (user, password, email) VALUES ('$login', '$password', '$email') WHERE id='$id'";
//$dados_info = "UPDATE user_info SET (user, fullname, email, niver, uf, cidade, logradouro, casanum, complemento, bairro, cep, sexo) VALUES ('$login', '$fullname', '$email', '$niver', '$uf', '$cidade', '$logradouro', '$casanum', '$complemento', '$bairro', '$cep', '$sexo') WHERE id='$id'";

if($modified == true){
	$_SESSION['sucessedit'] = "<p style='color:green;'>Usuário editado com sucesso</p>";
	header("Location: home.php");
}

else if ($modified == false){
	$_SESSION['failedit'] = "<p style='color:red;'>Usuário não foi editado com sucesso</p>";
	header("Location: edit.php?id=$id");
}