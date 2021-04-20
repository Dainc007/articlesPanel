<?php

namespace Src\Core;

class Helpers
{
    public static function escape(string $string): string
    {
        return htmlspecialchars($string, ENT_QUOTES); 
    }
}