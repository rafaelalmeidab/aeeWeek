<?php

include('sessaoCookie/sessao.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="recursos/css/estilo.css">
    <title>AEE Week - Web Development Course</title>
</head>

<body>
    <header class="cabecalho">
        <h1>AEE Week - Web Development Course</h1>
        <h2>Índice dos Exercícios</h2>
    </header>
    <nav class="navegacao">
        <span class='usuario'>Usuário: <?= $_SESSION['usuario'] ?></span>
        <a href="logout.php" class="vermelho">Sair</a>
    </nav>
    <main class="principal">
        <div class="conteudo">
            <nav class="modulos">
                <div class="modulo curso">
                    <h3>Informações</h3>
                    <ul>
                        <li>
                            <a href="exercicio.php?dir=informacoes&file=tiposTarifas">
                                Tipos de Tarifas
                            </a>
                        </li>
                        <li>
                            <a href="exercicio.php?dir=informacoes&file=unidadesEnergia">
                                Unidades de Energia
                            </a>
                        </li>
                    </ul>
                </div>

            </nav>
        </div>
    </main>
    <footer class="rodape">
        AEE WEEK <?= date('Y'); ?>
    </footer>
</body>

</html>