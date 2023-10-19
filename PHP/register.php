<?php
//arquivo register.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];
    $endereco = $_POST["endereco"];
    $numero = $_POST["numero"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $cep = $_POST["cep"];
    $celular = $_POST["celular"];
    $data_nascimento = $_POST["data_nascimento"];
    $senha = $_POST["senha"];

    // Conectar ao banco de dados (substitua as informações conforme necessário)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bd_cadastro";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Verificar se o email já está registrado
    $verificar_email = "SELECT * FROM Usuarios WHERE email = '$email'";
    $resultado = $conn->query($verificar_email);

    if ($resultado->num_rows > 0) {
        echo "Este email já está registrado. Por favor, use outro email.";
        $conn->close();
        exit();
    }

    // Criptografar a senha
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Inserir dados no banco de dados
    $inserir_usuario = "INSERT INTO Usuarios (nome, email, senha, cpf, endereco, numero, cidade, estado, cep, celular, data_nascimento) 
                        VALUES ('$nome', '$email', '$senha_hash', '$cpf', '$endereco', '$numero', '$cidade', '$estado', '$cep', '$celular', '$data_nascimento')";

    if ($conn->query($inserir_usuario) === TRUE) {
        echo "Usuário registrado com sucesso!";
    } else {
        echo "Erro ao registrar o usuário: " . $conn->error;
    }
    header("Location: login.php");
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuário</title>
    <link rel="stylesheet" href="../CSS/styleregister.css">
</head>

<body>
    <main class="register-form">
        <h2>Criar uma Conta</h2>
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" required>
            </div>
            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" id="endereco" name="endereco" required>
            </div>
            <div class="form-group">
                <label for="numero">Número:</label>
                <input type="text" id="numero" name="numero" required>
            </div>
            <div class="form-group">
                <label for="cidade">Cidade:</label>
                <input type="text" id="cidade" name="cidade" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="text" id="estado" name="estado" required>
            </div>
            <div class="form-group">
                <label for="cep">CEP:</label>
                <input type="text" id="cep" name="cep" required>
            </div>
            <div class="form-group">
                <label for="celular">Celular:</label>
                <input type="text" id="celular" name="celular" required>
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" id="data_nascimento" name="data_nascimento" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <button type="submit">Registrar</button>
        </form>
        <p>Criou ou já tem uma conta? <a href="login.php">Faça login aqui</a>.</p>
    </main>
</body>

</html>