<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/dal/Canal.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/class/Canal.php');

$idCanal = $_GET['idCanal'];



$dal = new DalCanal();
$canal = $dal->selecionaCanalPorId($idCanal);
$dal->exclui($canal);

header('location: /area_restrita.php?pg=view/canal/lista');
