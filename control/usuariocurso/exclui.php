<?php
require_once dirname(__DIR__, 2) . '/model/dal/UsuarioCurso.php';
require_once dirname(__DIR__, 2) . '/model/class/UsuarioCurso.php';

$idCurso = $_GET['idCurso'];
$idUsuario = $_SESSION['idUsuario'];

$dal = new DalUsuarioCurso();
$curso = $dal->selecionaCursoUsuario($idUsuario, $idCurso);
$dal->exclui($curso);

header('location: ../../area_restrita.php?pg=view/usuariocurso/lista');
