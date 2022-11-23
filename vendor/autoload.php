<?php

function loadingClass($trieda)
{
    if (preg_match('/Controller$/', $trieda))
    {
        require ("Controller/" . $trieda . ".php");
    }
    else if (preg_match('/Model$/', $trieda))
    {
        require ("Models/" . $trieda . ".php");
    }
    else
    {
        require($trieda . ".php");
    }
}

spl_autoload_register("loadingClass");

