<?php
require_once dirname(__DIR__, 2) . '/conexao/Conexao.php';
require_once dirname(__DIR__, 2) . '/model/class/Canal.php';

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
        $sql = "SELECT * FROM canal";
        $res = $this->conexao->query($sql);
        return $res;
    }

    public function selecionaCanalPorId($idCanal)
    {
        $sql = 'SELECT * FROM canal WHERE idCanal =' . $idCanal;
        $res = $this->conexao->query($sql);

        $canal = new Canal();
        $obj = mysqli_fetch_object($res);
        $canal->setIdCanal($obj->idCanal);
        $canal->setDescricao($obj->descricao);

        return $canal;
    }

    public function insere($canal)
    {
        $sql = "INSERT INTO canal (descricao) VALUES('";
        $sql = $sql . $canal->getDescricao() . "');";
        $this->conexao->query($sql);
    }

    public function atualiza($canal)
    {
        $sql = "UPDATE canal SET ";
        $sql = $sql . "descricao = '" . $canal->getDescricao() . "' ";
        $sql = $sql . "WHERE idCanal = " . $canal->getIdCanal();
        $this->conexao->query($sql);
    }

    public function exclui($canal)
    {
        $sql = "DELETE FROM canal ";
        $sql = $sql . "WHERE idCanal = " . $canal->getIdCanal();
        $this->conexao->query($sql);
    }
}
