<?php
if (isset($_POST['Entrar'])) {
  if (!empty($_POST['login']) && !empty($_POST['senha'])) {
    $login = addslashes($_POST['login']);
    $senha = addslashes($_POST['senha']); // trata SQL Injection
    require_once './control/usuario/lista.php';

    $controller = new UsuarioController();
    $usuario = $controller->autentica($login, $senha);

    if ($usuario->getNome() != '') //por questão de segurança verifica se foi inserido apenas um registro
    {
      session_start();
      $_SESSION['idUsuario'] = $usuario->getIdUsuario();
      $_SESSION['usuario'] = $usuario->getNome();
      $_SESSION['inicio'] = time();
      header('location: /area_restrita.php');
    } else {

      $erro = 1;
    }
  }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <title>Compartilha</title>
  <link href="css/style.css" type="text/css" rel="stylesheet" />
</head>

<body>
  <div id="header">
    <div id="logo">
      Compartilha
    </div>
    <!--FECHA LOGO -->

    <div id="autentica">
      <P>Usuario não Logado!</P>
    </div>
  </div>
  <!--FECHA HEADER -->

  <div id="content">
    <div id="plogin">
      <?php
      if (isset($_POST['Entrar'])) {
        if (trim($login, '') == '' && trim($senha, ' ') == '') {
          echo '<p style="color:blue"> Login e senha são obrigatórios</p>';
        } else
                                if (isset($erro) and $erro = true) {
          echo '<p style="color:red"> Login ou senha digitados incorretamente</p>';
        }
      }
      ?>
      <h2>Entre e Compartilhe!</h2>
      <form name="autentica" method="post" action="">
        <table width="200" border="0">
          <tr>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td><label for="login">Login</label></td>
            <td><input type="text" name="login" id="login" /></td>
          </tr>
          <tr>
            <td><label for="senha">Senha</label></td>
            <td><input type="password" name="senha" id="senha" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><label>
                <input type="submit" name="Entrar" id="Entrar" value="Enviar" class="btn" />
              </label></td>
            <td>&nbsp;</td>
          </tr>
        </table>
    </div>
    <!--FECHA PLOGIN-->
  </div>
  <!--FECHA CONTENT-->

  <div id="footer">
    Todos os direitos resevados. &COPY;2012, SI.COM
  </div>
  <!--FECHA FOOTER -->
</body>

</html>