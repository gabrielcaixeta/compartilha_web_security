<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Lista de Canais</title>
</head>

<body>
    <h2>Lista de Canais</h2>
    <form name="lista" id="lista" action="" method="post">
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Login</th>
                <th>Passwd</th>
            </tr>
            <?php
            require_once('/control/usuario/lista.php');
            $usuario = new UsuarioController();
            $res = $usuario->listaUsuarios();

            while ($obj = mysqli_fetch_object($res)) {
                echo '<tr>';
                echo '<td>' . $obj->idUsuario . '</td>';
                echo '<td>' . $obj->nome . '</td>';
                echo '<td>' . $obj->login . '</td>';
                echo '<td>' . $obj->senha . '</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </form>
</body>

</html>