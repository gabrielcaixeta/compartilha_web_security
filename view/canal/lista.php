<h1>Lista de Canais</h1>
<form name="lista" id="lista" action="" method="post">
    <table>
        <tr class="titulo">
            <th>ID</th>
            <th>Canal</th>
            <th colspan="2">Ações</th>
        </tr>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/control/canal/lista.php');
        $canal = new CanalController();
        $res = $canal->selecionaCanais();

        $linha = 0;
        while ($obj = mysqli_fetch_object($res)) {

            if ($linha % 2 == 0) {
                $classCSS = 'linhapar';
            } else {
                $classCSS = 'linhaimpar';
            }

            echo '<tr class="' . $classCSS . '">';
            echo '<td>' . $obj->idCanal . '</td>';
            echo '<td>' . $obj->descricao . '</td>';
            echo '<td><a href="area_restrita.php?pg=view/canal/cadastraEdita&idCanal=' . $obj->idCanal . '" >Editar</a></td>';
            echo '<td><a href="area_restrita.php?pg=control/canal/exclui&idCanal=' . $obj->idCanal . '">Excluir</a></td>';
            echo '</tr>';
            $linha++;
        }
        ?>
    </table>

    <br />
    <a href="area_restrita.php?pg=view/canal/cadastraEdita"> Inserir novos Canais </a>


</form>