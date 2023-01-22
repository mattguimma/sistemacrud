<?php

session_start();
include_once("connection.php");

if(empty($_POST['password']) or empty($_POST['email'])){
    $_SESSION['loginError'] = "Usuário ou senha incorretos!";
    header('Location: index.php');
    exit();
}

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$password = md5($password);

$query = "SELECT * FROM user_access WHERE email = '$email' AND password = '$password' LIMIT 1";
$nm_query = "SELECT fullname FROM user_info WHERE email = '$email' LIMIT 1";
$v_exit = mysqli_query($conn, $query);
$nmv_exit = mysqli_query($conn, $nm_query);
$exit = mysqli_fetch_assoc($v_exit);
$nm_exit = mysqli_fetch_assoc($nmv_exit);

if(empty($exit)){
    $_SESSION['loginError'] = "Usuário ou senha incorretos!";
    header('Location: index.php');
}

else if(isset($exit)){
    $_SESSION['username'] = $exit['user'];
    $_SESSION['fulluser'] = $nm_exit['fullname'];
    $_SESSION['useradm'] = $exit['adm'];
    $_SESSION['logged'] = true;
    header('Location: home.php');
}


?>