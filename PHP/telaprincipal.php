<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styletelaprincipal.css">
    <title>Tela Principal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .success-message {
            color: green;
            font-size: 24px;
            margin-top: 20px;
        }

        .dev-section {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }

        .dev-info {
            margin: 20px;
        }

        .dev-info img {
            width: 150px;
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <div class="success-message">
        Login feito com sucesso!
    </div>

    <h1>Desenvolvedores do Site</h1>

    <div class="dev-section">
        <div class="dev-info">
            <img src="../IMG/download.webp" alt="Desenvolvedor 1">
            <h2>Gustavo O.</h2>
            <p>Nº 13</p>
            <a href="https://github.com/Guh13" target="_blank">Ver perfil</a>
        </div>

        <div class="dev-info">
            <img src="../IMG/download.webp" alt="Desenvolvedor 2">
            <h2>Kauã Alves</h2>
            <p>Nº 17</p>
            <a href="https://github.com/KauaAlvs" target="_blank">Ver perfil</a>
        </div>
    </div>
</body>

</html>
