<?php
require_once dirname(__DIR__, 2) . '/model/dal/Canal.php';
require_once dirname(__DIR__, 2) . '/model/class/Canal.php';

$idCanal = $_POST['idCanal'];
$descricao = $_POST['txtCanal'];
$canal = new Canal();
$dalCanal = new DalCanal();
$canal->setDescricao($descricao);
if (empty($idCanal)) {
    $dalCanal->insere($canal);
} else {
    echo $canal->getDescricao();
    $canal->setIdCanal($idCanal);
    $dalCanal->atualiza($canal);
}

header('location: area_restrita.php?pg=view/canal/lista');
