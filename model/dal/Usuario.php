<?php
require_once dirname(__DIR__, 2) . '/conexao/Conexao.php';
require_once dirname(__DIR__, 2) . '/model/class/Usuario.php';
class DalUsuario
{
    private $conexao;

    function __construct()
    {
        $this->conexao = BD::getConexao();
    }

    function __destruct()
    {
        mysqli_close($this->conexao);
    }

    function selecionaUsuarios()
    {
        $sql = "select * from usuario";
        $res = $this->conexao->query($sql);

        return $res;
    }

    function selecionaUsuarioPorId($idUsuario)
    {
        $sql = "select * from usuario where idUsuario = " . $idUsuario;
        $res = $this->conexao->query($sql);

        $usuario = new Usuario();
        $obj = mysqli_fetch_object($res);
        $usuario->setIdUsuario($obj->idUsuario);
        $usuario->setLogin($obj->login);
        $usuario->setNome($obj->nome);
        $usuario->setSenha($obj->senha);

        return $usuario;
    }

    function autentica($login, $senha)
    {
        $sql = "select * from usuario where login = '" . $login . "' and senha = '" . md5($senha) . "'";
        $res = $this->conexao->query($sql);

        $usuario = new Usuario();
        $obj = mysqli_fetch_object($res);
        $usuario->setIdUsuario($obj->idUsuario);
        $usuario->setLogin($obj->login);
        $usuario->setNome($obj->nome);
        $usuario->setSenha($obj->senha);

        return $usuario;
    }
}
