<?php
require_once dirname(__DIR__, 2) . '/conexao/Conexao.php';
require_once dirname(__DIR__, 2) . '/model/class/UsuarioCurso.php';

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
        $sql = "SELECT * FROM usuario_curso where idUsuario = " . $idUsuario;
        $res = $this->conexao->query($sql);
        return $res;
    }

    public function selecionaCursoUsuario($idUsuario, $idCurso)
    {
        $sql = "SELECT * FROM usuario_curso where idUsuario = " . $idUsuario;
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
        $sql = "INSERT INTO usuario_curso (idUsuario , idCurso) VALUES(";
        $sql = $sql . $cursoUsuario->getIdUsuario() . " , ";
        $sql = $sql . $cursoUsuario->getIdCurso() . ");";
        $this->conexao->query($sql);
    }

    public function exclui($usuarioCurso)
    {
        $sql = "DELETE FROM usuario_curso ";
        $sql = $sql . "WHERE idUsuario = " . $usuarioCurso->getIdUsuario();
        $sql = $sql . " and idCurso = " . $usuarioCurso->getIdCurso();
        $this->conexao->query($sql);
    }
}
