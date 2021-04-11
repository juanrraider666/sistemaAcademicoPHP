<?php


namespace App\Util;


class SecurityUtil
{


    /**
     * Calcula el sha1 del texto enviado por parametro
     */
    public static function calcSHA(string $text): string
    {
        return sha1($text);
    }

}