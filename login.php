<?php   

    $_SESSION['erros'] = '';
    $_SESSION['user'] = '';
    $email = '';
    $senha = '';

    $email = isset($_POST['email'])? $_POST['email'] : '';
    $senha = isset($_POST['senha'])? $_POST['senha'] : '';

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
            

        </div>
    </main>
    <footer class="rodape">
        AEE WEEK <?= date('Y'); ?>
    </footer>
</body>

</html>