<?php
require_once dirname(__DIR__, 2) . '/model/dal/Canal.php';
class CanalController
{
    public function selecionaCanais()
    {
        $dal = new DalCanal();
        return $dal->selecionaCanais();
    }

    public function selecionaCanalPorId($idCanal)
    {
        $dal = new DalCanal();
        return $dal->selecionaCanalPorId($idCanal);
    }
}
