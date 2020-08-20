<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/conexao/Conexao.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/class/UsuarioCurso.php');

class DalUsuarioCurso
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

    public function selecionaCursosUsuario($idUsuario)
    {
        $sql = "SELECT * FROM Usuario_Curso where idUsuario = " . $idUsuario;
        $res = $this->conexao->query($sql);
        return $res;
    }

    public function selecionaCursoUsuario($idUsuario, $idCurso)
    {
        $sql = "SELECT * FROM Usuario_Curso where idUsuario = " . $idUsuario;
        $sql = $sql . " and idCurso = " . $idCurso;
        $res = $this->conexao->query($sql);

        $obj = mysqli_fetch_object($res);

        $cursoUsuario = new UsuarioCurso();
        $cursoUsuario->setIdCurso($obj->idCurso);
        $cursoUsuario->setIdUsuario($obj->idUsuario);
        return $cursoUsuario;
    }

    public function insere($cursoUsuario)
    {
        $sql = "INSERT INTO Usuario_Curso (idUsuario , idCurso) VALUES(";
        $sql = $sql . $cursoUsuario->getIdUsuario() . " , ";
        $sql = $sql . $cursoUsuario->getIdCurso() . ");";
        $this->conexao->query($sql);
    }

    public function exclui($usuarioCurso)
    {
        $sql = "DELETE FROM Usuario_Curso ";
        $sql = $sql . "WHERE idUsuario = " . $usuarioCurso->getIdUsuario();
        $sql = $sql . " and idCurso = " . $usuarioCurso->getIdCurso();
        $this->conexao->query($sql);
    }
}
