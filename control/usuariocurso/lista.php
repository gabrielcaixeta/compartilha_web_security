<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/dal/UsuarioCurso.php');
class UsuarioCursoController
{
    public function selecionaCursosUsuario($idUsuario)
    {
        $dal = new DalUsuarioCurso();
        return $dal->selecionaCursosUsuario($idUsuario);
    }
}
