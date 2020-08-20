<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/dal/Usuario.php');
class UsuarioController
{

    function selecionaUsuarios()
    {
        $dal = new DalUsuario();
        $obj = $dal->selecionaUsuarios();
        return $obj;
    }

    function autentica($login, $senha)
    {
        $dal = new DalUsuario();
        $obj = $dal->autentica($login, $senha);
        return $obj;
    }
}
