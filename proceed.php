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

$password = md5($password);

$dados_login = "INSERT INTO user_access (user, password, email) VALUES ('$login', '$password', '$email')";
$dados_info = "INSERT INTO user_info (user, fullname, email, niver, uf, cidade, logradouro, casanum, complemento, bairro, cep, sexo) VALUES ('$login', '$fullname', '$email', '$niver', '$uf', '$cidade', '$logradouro', '$casanum', '$complemento', '$bairro', '$cep', '$sexo')";

$resultado_login = mysqli_query($conn, $dados_login);
$resultado_info = mysqli_query($conn, $dados_info);

if (mysqli_insert_id($conn))
{
	$_SESSION['sucessregister'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: home.php");
}
else if (!mysqli_insert_id($conn))
{
	$_SESSION['failedregister'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
	header("Location: register.php");
}

?>