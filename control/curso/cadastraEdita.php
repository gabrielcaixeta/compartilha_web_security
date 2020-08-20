<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/dal/Curso.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/class/Curso.php');

$idCurso = $_POST['idCurso'];
$descricao = $_POST['txtCurso'];
$idCanal = $_POST['txtCanal'];

$curso = new Curso();
$dalCurso = new DalCurso();

$curso->setDescricao($descricao);
$curso->setIdCanal($idCanal);

if (empty($idCurso)) {
    $dalCurso->insere($curso);
} else {
    $curso->setIdCurso($idCurso);
    $dalCurso->atualiza($curso);
}

header('location: /area_restrita.php?pg=view/curso/lista');
