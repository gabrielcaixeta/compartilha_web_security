<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/dal/Curso.php');
class CursoController
{
    public function selecionaCursos()
    {
        $dal = new DalCurso();
        return $dal->selecionaCursos();
    }

    public function selecionaCursoPorId($idCurso)
    {
        $dal = new DalCurso();
        return $dal->selecionaCursoPorId($idCurso);
    }
}
