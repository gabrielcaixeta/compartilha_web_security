<?php
class BD
{
    public static function getConexao()
    {
        $conexao = mysqli_connect('localhost', 'root', '50ft4t1', 'compartilha')
            or die('<p style="color:red;"><b>Erro de conexão ao BD.</b></p>');

        return $conexao;
    }
}
