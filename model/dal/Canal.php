<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/conexao/Conexao.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/class/Canal.php');

class DalCanal
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

    public function selecionaCanais()
    {
        $sql = "SELECT * FROM Canal";
        $res = $this->conexao->query($sql);
        return $res;
    }

    public function selecionaCanalPorId($idCanal)
    {
        $sql = 'SELECT * FROM Canal WHERE idCanal =' . $idCanal;
        $res = $this->conexao->query($sql);

        $canal = new Canal();
        $obj = mysqli_fetch_object($res);
        $canal->setIdCanal($obj->idCanal);
        $canal->setDescricao($obj->descricao);

        return $canal;
    }

    public function insere($canal)
    {
        $sql = "INSERT INTO Canal (descricao) VALUES('";
        $sql = $sql . $canal->getDescricao() . "');";
        $this->conexao->query($sql);
    }

    public function atualiza($canal)
    {
        $sql = "UPDATE Canal SET ";
        $sql = $sql . "descricao = '" . $canal->getDescricao() . "' ";
        $sql = $sql . "WHERE idCanal = " . $canal->getIdCanal();
        $this->conexao->query($sql);
    }

    public function exclui($canal)
    {
        $sql = "DELETE FROM Canal ";
        $sql = $sql . "WHERE idCanal = " . $canal->getIdCanal();
        $this->conexao->query($sql);
    }
}
