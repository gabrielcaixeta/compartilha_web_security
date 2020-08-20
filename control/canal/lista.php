<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/dal/Canal.php');
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
