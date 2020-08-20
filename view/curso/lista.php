<h1>Lista de Cursos</h1>
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
        $canalController = new CanalController();
        $curso = new CursoController();
        $res = $curso->selecionaCursos();

        $linha = 0;
        while ($obj = mysqli_fetch_object($res)) {
            if ($linha % 2 == 0) {
                $classCSS = 'linhapar';
            } else {
                $classCSS = 'linhaimpar';
            }

            $canal = $canalController->selecionaCanalPorId($obj->idCanal);

            echo '<tr class="' . $classCSS . '">';
            echo '<td>' . $obj->idCurso . '</td>';
            echo '<td>' . $obj->descricao . '</td>';
            echo '<td>' . $canal->getDescricao() . '</td>';
            echo '<td><a href="area_restrita.php?pg=view/curso/cadastraEdita&idCurso=' . $obj->idCurso . '" >Editar</a></td>';
            echo '<td><a href="area_restrita.php?pg=control/curso/exclui&idCurso=' . $obj->idCurso . '">Excluir</a></td>';
            echo '</tr>';
            $linha++;
        }
        ?>
    </table>

    <br />
    <a href="area_restrita.php?pg=view/curso/cadastraEdita"> Inserir novos Cursos </a>


</form>