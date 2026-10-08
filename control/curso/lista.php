<?php
require_once dirname(__DIR__, 2) . '/model/dal/Curso.php';
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
