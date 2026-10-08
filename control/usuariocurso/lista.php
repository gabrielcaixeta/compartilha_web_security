<?php
require_once dirname(__DIR__, 2) . '/model/dal/UsuarioCurso.php';
class UsuarioCursoController
{
    public function selecionaCursosUsuario($idUsuario)
    {
        $dal = new DalUsuarioCurso();
        return $dal->selecionaCursosUsuario($idUsuario);
    }
}
