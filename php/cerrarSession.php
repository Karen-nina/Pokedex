<?php
session_start();

if (isset($_SESSION['ingreso'])) {
    // Eliminar la variable de sesión
    unset($_SESSION['ingreso']);
}

header('Location: ../index.php');
exit;
?>
