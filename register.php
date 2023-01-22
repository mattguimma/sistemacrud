<?php 
    session_start(); 
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
    <link rel="stylesheet" href="./assets/register.css">
    <link rel="stylesheet" href="./assets/overall.css">
</head>

<body>
    <h1>SISTEMA CRUD</h1>
    <a id="home" href='home.php'>Home</a> <br><br>
    
    <div id="mensagem">
    <?php
    if (isset($_SESSION['failedregister'])) {
        echo $_SESSION['failedregister'];
        unset($_SESSION['failedregister']);
    }

    if ($_SESSION['useradm']==null) {
        $_SESSION['notadm'] = "<p style='color:red;'>Apenas administradores podem registrar usuários.</p>";
        header("Location: home.php");
    }
    ?>
    </div>

    <form method="POST" action="proceed.php">
    <div id = "mainform">
        <label for = "login">
            <span>Nome de usuário</span>
            <input type="text" name="login" placeholder="Nome de usuário" required><br><br>
        </label>
        
        <label for = "fullname">
            <span>Nome completo</span>
            <input type="text" name="fullname" placeholder="Nome completo" required><br><br>
        </label>

        <label for = "email">
            <span>E-mail</span>
        <input type="email" name="email" placeholder="E-mail" required><br><br>
        </label>

        <label for = "password">
            <span>Senha</span>
        <input type="password" name="password" minlength="8" required placeholder="Senha" required><br><br>
        </label>

        <label for = "niver">
            <span>Data de Nascimento</span>
        <input type="date" name="niver" placeholder="Data de Nascimento" required><br><br>
        </label>

        <label for = "uf">
            <span>Estado</span>
        <select name="uf" id="uf" required>
            <option value="">UF</option>
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amapá</option>
            <option value="AM">Amazonas</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espírito Santo</option>
            <option value="MA">Maranhão</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MG">Minas Gerais</option>
            <option value="PA">Pará</option>
            <option value="PB">Paraíba</option>
            <option value="PR">Paraná</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piauí</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="RO">Rondônia</option>
            <option value="RR">Roraima</option>
            <option value="SC">Santa Catarina</option>
            <option value="SP">São Paulo</option>
            <option value="SE">Sergipe</option>
            <option value="TO">Tocantins</option>
        </select></label><br><br>

        <label for = "cidade">
            <span>Cidade</span>
        <input type="text" name="cidade" placeholder="Cidade" required><br><br>
        </label>

        <label for = "logradouro">
            <span>Logradouro</span>
        <input type="text" name="logradouro" placeholder="Logradouro" required><br><br>
        </label>

        <label for = "casanum">
            <span>Número</span>
        <input type="text" name="casanum" placeholder="Número" required><br><br>
        </label>

        <label for = "complemento">
            <span>Complemento</span>
        <input type="text" name="complemento" placeholder="Complemento"><br><br>
        </label>

        <label for = "bairro">
            <span>Bairro</span>
        <input type="text" name="bairro" placeholder="Bairro" required><br><br>
        </label>

        <label for = "cep">
            <span>Código Postal</span>
        <input type="text" name="cep" placeholder="Código Postal" required><br><br>
        </label>
    </div>

        <div id = "dsexo">
        <label for = "sexo">
            <span>Sexo</span><br>
            <input type="radio" name="sexo" value="Masculino" required> Masculino
            <input type="radio" name="sexo" value="Feminino"> Feminino
            <input type="radio" name="sexo" value="Não declarado"> Outro
        </label>
        </div>

        <br><br><br>
        <div id = "mainform">
        <input id="button" type="submit" value="Cadastrar">
        </div>
    </form>
</body>

</html>