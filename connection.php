<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$database = "userbd";

// abrir a conexão
$conn = mysqli_connect($servidor, $usuario, $senha, $database);

if(!$conn){
    die("Falha na conexao: " . mysqli_connect_error());
}else{
    //echo "Conexao realizada com sucesso";
}	