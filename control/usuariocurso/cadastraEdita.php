<?php
require_once dirname(__DIR__, 2) . '/model/dal/UsuarioCurso.php';
require_once dirname(__DIR__, 2) . '/model/class/UsuarioCurso.php';

$idCurso = $_GET['idCurso'];
$idUsuario = $_SESSION['idUsuario'];

$cursoUsuario = new UsuarioCurso();
$dalUsuarioCurso = new DalUsuarioCurso();

$cursoUsuario->setIdUsuario($idUsuario);
$cursoUsuario->setIdCurso($idCurso);

$dalUsuarioCurso->insere($cursoUsuario);


header('location: ../../area_restrita.php?pg=view/usuariocurso/lista');
