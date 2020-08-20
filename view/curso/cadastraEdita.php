<?php


$idCurso = $descricao = $idCanal = '';
$acao = 'Cadastro';
if (isset($_GET['idCurso'])) {
  require_once($_SERVER['DOCUMENT_ROOT'] . '/control/curso/lista.php');
  $acao = 'Edição';
  $idCurso = $_GET['idCurso'];

  $controle = new CursoController();
  $curso = $controle->selecionaCursoPorId($idCurso);
  $descricao = $curso->getDescricao();
  $idCanal = $curso->getIdCanal();
}

?>



<h2><?php echo $acao; ?> de Curso</h2>

<form name="cadastraEdita" action="control/curso/cadastraEdita.php" method="post">
  <input type="hidden" name="idCurso" value="<?php echo $idCurso; ?>" />
  <table width="458" border="0">
    <?php
    if ($idCurso != '') {
      echo '<tr>';
      echo '<td width="198">Curso:</td>';
      echo '<td width="250">' . $idCurso . '</td>';
      echo '</tr>';
    }
    ?>
    <tr>
      <td width="198">Nome do Curso:</td>
      <td width="250"><input name="txtCurso" type="text" id="txtCurso" size="45" maxlength="45" value="<?php echo $descricao; ?>" /></td>
    </tr>
    <tr>
      <td>Canal</td>
      <td>
        <select name="txtCanal" id="txtCanal">
          <?php
          require_once($_SERVER['DOCUMENT_ROOT'] . '/control/canal/lista.php');
          $dal = new DalCanal();
          $res = $dal->selecionaCanais();
          while ($canal = mysqli_fetch_object($res)) {
            if ($canal->idCanal == $idCanal) {
              echo '<option value="' . $canal->idCanal . '" selected="selected">';
              echo $canal->idCanal . ' - ' . $canal->descricao . '</option>';
            } else {
              echo '<option value="' . $canal->idCanal . '">';
              echo $canal->idCanal . ' - ' . $canal->descricao . '</option>';
            }
          }

          ?>
        </select>

      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="btnCadastrar" id="btnEnviar" value="Enviar" class="btn" />
        <input type="button" name="btnCancelar" id="btnCancelar" value="Cancelar" class="btn" onclick="history.back();" />
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>