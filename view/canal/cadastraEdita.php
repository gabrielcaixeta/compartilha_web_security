<?php


$idCanal = $descricao = '';
$acao = 'Cadastro';
if (isset($_GET['idCanal'])) {
  require_once($_SERVER['DOCUMENT_ROOT'] . '/control/canal/lista.php');
  $acao = 'Edição';
  $idCanal = $_GET['idCanal'];

  $controle = new CanalController();
  $canal = $controle->selecionaCanalPorId($idCanal);
  $descricao = $canal->getDescricao();
}

?>



<h2><?php echo $acao; ?> de Canal</h2>

<form name="cadastraEdita" action="control/canal/cadastraEdita.php" method="post">
  <input type="hidden" name="idCanal" value="<?php echo $idCanal; ?>" />
  <table width="458" border="0">
    <?php
    if ($idCanal != '') {
      echo '<tr>';
      echo '<td width="198">Canal:</td>';
      echo '<td width="250">' . $idCanal . '</td>';
      echo '</tr>';
    }
    ?>
    <tr>
      <td width="198">Nome do Canal:</td>
      <td width="250"><input name="txtCanal" type="text" id="txtCanal" size="45" maxlength="45" value="<?php echo $descricao; ?>" /></td>
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