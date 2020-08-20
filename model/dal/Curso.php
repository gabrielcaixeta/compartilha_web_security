<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/conexao/Conexao.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/class/Curso.php');

class DalCurso
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

    public function selecionaCursos()
    {
        $sql = "SELECT * FROM Curso";
        $res = $this->conexao->query($sql);
        return $res;
    }

    public function selecionaCursoPorId($idCurso)
    {
        $sql = 'SELECT * FROM Curso WHERE idCurso =' . $idCurso;
        $res = $this->conexao->query($sql);

        $curso = new Curso();
        $obj = mysqli_fetch_object($res);
        $curso->setIdCurso($obj->idCurso);
        $curso->setDescricao($obj->descricao);
        $curso->setIdCanal($obj->idCanal);

        return $curso;
    }

    public function insere($curso)
    {
        $sql = "INSERT INTO Curso (descricao, idCanal) VALUES('";
        $sql = $sql . $curso->getDescricao() . "',";
        $sql = $sql . $curso->getIdCanal() . ");";
        $this->conexao->query($sql);
    }

    public function atualiza($curso)
    {
        $sql = "UPDATE Curso SET ";
        $sql = $sql . "descricao = '" . $curso->getDescricao() . "', ";
        $sql = $sql . "idCanal = " . $curso->getIdCanal() . " ";
        $sql = $sql . "WHERE idCurso = " . $curso->getIdCurso();
        $this->conexao->query($sql);
    }

    public function exclui($curso)
    {
        $sql = "DELETE FROM Curso ";
        $sql = $sql . "WHERE idCurso = " . $curso->getIdCurso();
        $this->conexao->query($sql);
    }
}
