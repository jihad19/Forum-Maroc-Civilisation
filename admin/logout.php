<?php

    session_start();
    session_unset();
    session_destroy();
    setcookie('rememberMe','',time()-100);
    header('Location: login.php');