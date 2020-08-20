<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/conexao/Conexao.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/class/Usuario.php');
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
        $sql = "select * from Usuario";
        $res = $this->conexao->query($sql);

        return $res;
    }

    function selecionaUsuarioPorId($idUsuario)
    {
        $sql = "select * from Usuario where idUsuario = " . $idUsuario;
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
        $sql = "select * from Usuario where login = '" . $login . "' and senha = '" . md5($senha) . "'";
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
