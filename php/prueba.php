<?php

session_start();


if (isset($_SESSION['test'])) {
    echo 'Las sesiones están habilitadas.';
    echo $_SESSION['test']++;

} else {
    $_SESSION['test'] = 1;
    echo 'Las sesiones no están habilitadas.';
}


?>