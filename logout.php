<?php

    session_start();
    session_destroy();

    unset($_COOKIE['usuario']);
    setcookie('usuario', '');

    $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
    
    if(isset($trace[0]['file']) && strstr($trace[0]['file'], 'login.php')){
        // echo "true";
    }
    else{
        header("Location: login.php");
    }    