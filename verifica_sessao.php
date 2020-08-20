<div id="autentica">
    <?php
    session_start();
    if (isset($_SESSION['usuario'])) {
        $inatividade_max = 60 * 10; // em segundos
        $inatividade = time() - $_SESSION['inicio'];

        if ($inatividade <= $inatividade_max) {
            echo '<p> Bem vindo, ' . ($_SESSION['usuario']) . ' | <a href="logout.php"> Sair</a></p>';
            $_SESSION['inicio'] = time();
        } else { // a sessão expirou
            session_destroy();
            header('location: sessao_expirada.html');
        }
    } else {
        header('location: acesso_negado.html');
    }
    ?>
</div>