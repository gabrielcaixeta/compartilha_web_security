<h1>Meus Cursos</h1>
<form name="lista" id="lista" action="" method="post">
    <table>
        <tr class="titulo">
            <th>ID</th>
            <th>Curso</th>
            <th>Canal</th>
            <th colspan="2">Ações</th>
        </tr>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/control/curso/lista.php');
        require_once($_SERVER['DOCUMENT_ROOT'] . '/control/canal/lista.php');
        require_once($_SERVER['DOCUMENT_ROOT'] . '/control/usuariocurso/lista.php');

        $idUsuario = $_SESSION['idUsuario'];
        $usuariocurso = new UsuarioCursoController();
        $canalController = new CanalController();
        $cursocontroller = new CursoController();
        $res = $usuariocurso->selecionaCursosUsuario($idUsuario);

        $linha = 0;
        while ($obj = mysqli_fetch_object($res)) {
            if ($linha % 2 == 0) {
                $classCSS = 'linhapar';
            } else {
                $classCSS = 'linhaimpar';
            }
            $curso = $cursocontroller->selecionaCursoPorId($obj->idCurso);
            $canal = $canalController->selecionaCanalPorId($curso->getIdCurso());

            echo '<tr class="' . $classCSS . '">';
            echo '<td>' . $obj->idCurso . '</td>';
            echo '<td>' . $curso->getDescricao() . '</td>';
            echo '<td>' . $canal->getDescricao() . '</td>';
            echo '<td><a href="area_restrita.php?pg=control/usuariocurso/exclui&idCurso=' . $obj->idCurso . '">Excluir</a></td>';
            echo '</tr>';
            $linha++;
        }
        ?>
    </table>

    <br />
    <a href="area_restrita.php?pg=view/usuariocurso/cadastraEdita"> Inserir cursos à minha lista </a>


</form>