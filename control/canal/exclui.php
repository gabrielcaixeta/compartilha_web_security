<?php
require_once dirname(__DIR__, 2) . '/model/dal/Canal.php';
require_once dirname(__DIR__, 2) . '/model/class/Canal.php';

$idCanal = $_GET['idCanal'];



$dal = new DalCanal();
$canal = $dal->selecionaCanalPorId($idCanal);
$dal->exclui($canal);

header('location: ../../area_restrita.php?pg=view/canal/lista');
