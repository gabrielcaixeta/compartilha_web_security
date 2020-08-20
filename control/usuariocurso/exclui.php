<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/dal/UsuarioCurso.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/class/UsuarioCurso.php');

$idCurso = $_GET['idCurso'];
$idUsuario = $_SESSION['idUsuario'];

$dal = new DalUsuarioCurso();
$curso = $dal->selecionaCursoUsuario($idUsuario, $idCurso);
$dal->exclui($curso);

header('location: /area_restrita.php?pg=view/usuariocurso/lista');
