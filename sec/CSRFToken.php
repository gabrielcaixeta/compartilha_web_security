<?php

class CSRFToken
{

    // Inicia a sessão se ainda não estiver ativa
    private static function startSession()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Gera um novo token e o adiciona à lista de tokens da sessão
    public static function generate()
    {
        self::startSession();

        // Garante que o array de tokens existe
        if (!isset($_SESSION['csrf_tokens'])) {
            $_SESSION['csrf_tokens'] = [];
        }

        // Gera o token e o adiciona ao array
        $token = bin2hex(random_bytes(32));
        $_SESSION['csrf_tokens'][] = $token;

        return $token;
    }

    // Valida o token recebido e o remove da lista
    public static function validate($token)
    {
        self::startSession();

        // Verifica se o array de tokens existe e se o token recebido está nele
        if (isset($_SESSION['csrf_tokens']) && in_array($token, $_SESSION['csrf_tokens'])) {

            // Encontra a posição do token no array
            $key = array_search($token, $_SESSION['csrf_tokens']);

            // Remove o token do array para que não possa ser reutilizado
            unset($_SESSION['csrf_tokens'][$key]);

            return true;
        }

        return false;
    }
}
