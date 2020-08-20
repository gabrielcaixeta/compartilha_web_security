<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/dal/UsuarioCurso.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/class/UsuarioCurso.php');

$idCurso = $_GET['idCurso'];
$idUsuario = $_SESSION['idUsuario'];

$cursoUsuario = new UsuarioCurso();
$dalUsuarioCurso = new DalUsuarioCurso();

$cursoUsuario->setIdUsuario($idUsuario);
$cursoUsuario->setIdCurso($idCurso);

$dalUsuarioCurso->insere($cursoUsuario);


header('location: /area_restrita.php?pg=view/usuariocurso/lista');
