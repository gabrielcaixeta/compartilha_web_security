<?php
require_once dirname(__DIR__, 2) . '/model/dal/Curso.php';
require_once dirname(__DIR__, 2) . '/model/class/Curso.php';

$idCurso = $_GET['idCurso'];



$dal = new DalCurso();
$curso = $dal->selecionaCursoPorId($idCurso);
$dal->exclui($curso);

header('location: ../../area_restrita.php?pg=view/curso/lista');
