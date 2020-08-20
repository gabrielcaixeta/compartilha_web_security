<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/dal/Curso.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/class/Curso.php');

$idCurso = $_GET['idCurso'];



$dal = new DalCurso();
$curso = $dal->selecionaCursoPorId($idCurso);
$dal->exclui($curso);

header('location: /area_restrita.php?pg=view/curso/lista');
