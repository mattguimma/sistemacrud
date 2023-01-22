<?php session_start(); 
    if(!isset($_SESSION['username'])){
        header("Location: index.php");
    }
    
    include_once("connection.php");
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM user_info WHERE id = '$id'";
    $v_exit = mysqli_query($conn, $query);
    $rowuser = mysqli_fetch_assoc($v_exit);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Sistema CRUD</title>
    <link rel="shortcut icon" type="imagex/png" href="./assets/icone.ico">
    <link rel="stylesheet" href="./assets/overall.css">
    <link rel="stylesheet" href="./assets/edit.css">
</head>

<body>

    <h1>SISTEMA CRUD</h1>
    <a id="home" href='home.php'>Home</a> <br><br>

    <div id="mensagem">
    <?php
        if (isset($_SESSION['failedit'])) 
        {
            echo $_SESSION['failedit'];
            unset($_SESSION['failedit']);
        }
    ?>
    </div>
    
    <form method="POST" action="procedit.php">

    <div id = "mainform">
        <input type="hidden" name="id" value="<?php echo $rowuser['id']; ?>">
        
        <label for = "login">
            <span>Nome de usuário</span>
            <input type="text" name="login" placeholder="Nome de usuário" value="<?php echo $rowuser['user']; ?>"><br><br>
        </label>

        <label for = "fullname">
            <span>Nome completo</span>
        <input type="text" name="fullname" placeholder="Nome completo" value="<?php echo $rowuser['fullname']; ?>"><br><br>
        </label>

        <label for = "email">
            <span>Email</span>
        <input type="email" name="email" placeholder="E-mail" value="<?php echo $rowuser['email']; ?>"><br><br>
        </label>

        <label for = "password">
            <span>password</span>
        <input type="password" name="password" minlength="8"  placeholder="Senha"><br><br>
        </label>

        <label for = "niver">
            <span>Data de Nascimento</span>
        <input type="date" name="niver" placeholder="Data de Nascimento" value="<?php echo $rowuser['niver']; ?>"><br><br>
        </label>

        <label for = "uf">
            <span>Estado</span>
        <select name="uf" id="uf" value="<?php echo $rowuser['uf']; ?>">
            <option value="<?php echo $rowuser['uf']; ?>"><?php echo $rowuser['uf']; ?></option>
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
        <input type="text" name="cidade" placeholder="Cidade" value="<?php echo $rowuser['cidade']; ?>"><br><br>
        </label>

        <label for = "logradouro">
            <span>Logradouro</span>
        <input type="text" name="logradouro" placeholder="Logradouro" value="<?php echo $rowuser['logradouro']; ?>"><br><br>
        </label>

        <label for = "casanum">
            <span>Número</span>
        <input type="text" name="casanum" placeholder="Número" value="<?php echo $rowuser['casanum']; ?>"><br><br>
        </label>

        <label for = "complemento">
            <span>Complemento</span>
        <input type="text" name="complemento" placeholder="Complemento" value="<?php echo $rowuser['complemento']; ?>"><br><br>
        </label>

        <label for = "bairro">
            <span>Bairro</span>
        <input type="text" name="bairro" placeholder="Bairro" value="<?php echo $rowuser['bairro']; ?>"><br><br>
        </label>

        <label for = "cep">
            <span>Código Postal</span>
        <input type="text" name="cep" placeholder="Código Postal" value="<?php echo $rowuser['cep']; ?>"><br><br>
        </label>
        </div>

        <div id = "dsexo">
        <label for = "sexo">
            <span>Sexo</span><br>
            <input type="radio" name="sexo" value="Masculino" > Masculino
            <input type="radio" name="sexo" value="Feminino"> Feminino
            <input type="radio" name="sexo" value="Não declarado"> Outro
        </label>
        </div>

        <br><br><br>
        <div id = "mainform">
        <input id="button" type="submit" value="Editar dados">
        </div>
    </form>

</body>

</html>