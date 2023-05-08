<?php
    session_start();

    $_SESSION['erros'] = '';
    $_SESSION['user'] = '';
    $email = '';
    $senha = '';

    $email = isset($_POST['email'])? $_POST['email'] : '';
    $senha = isset($_POST['senha'])? $_POST['senha'] : '';

    if ($email) {
        $users = [
            [
                "nome" => "Rafael Almeida",
                "email" => "rafael@hotmail.com",
                "senha" => "123"
            ],
            [
                "nome" => "Teste",
                "email" => "teste@teste.com",
                "senha" => "teste"
            ]
        ];

        foreach ($users as $user) {
            $emailValido = $email === $user['email'];
            $senhaValido = $senha === $user['senha'];

            if ($emailValido == true && $senhaValido == true) {
                $_SESSION['erros'] = null;
                $_SESSION['usuario'] = $user['nome'];

                //COOKIE (10 MINUTOS)
                $exp = time() + (60 * 1);
                setcookie('usuario', $_SESSION['usuario'], $exp);

                header("Location: http://localhost:8080/aeeWeek/index.php");
            }
        }

        if (!isset($_SESSION['usuario'])) {
            $_SESSION['erros'] = ['Usuário/senha inválido!'];
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="recursos/css/estilo.css">
    <link rel="stylesheet" href="recursos/css/login.css">
    <title>AEE Week - Web Development Course</title>
</head>

<body class="login">
    <header class="cabecalho">
        <h1>AEE Week - Web Development Course</h1>
        <h2>Seja bem-vindo!</h2>
    </header>
    <main class="principal">
        <div class="conteudo">
            <h3>Identifique-se!</h3>
            <?php if ($_SESSION['erros']) { ?>
                <div class="erros">
                    <?php
                    $erros = $_SESSION['erros'];
                    foreach ($erros as $erro) { ?>
                        <p><?= $erro ?></p>
                    <?php } ?>
                </div>
            <?php } ?>

            <form action="#" method="post">
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                </div>
                <div>
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha">
                </div>
                <button>Entrar</button>
            </form>

        </div>
    </main>
    <footer class="rodape">
        AEE WEEK <?= date('Y'); ?>
    </footer>
</body>

</html>