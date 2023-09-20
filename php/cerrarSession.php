<?php
session_start(); // Iniciar la sesión

// Verificar si la sesión está iniciada
if (isset($_SESSION['ingreso'])) {
    // Eliminar la variable de sesión
    unset($_SESSION['ingreso']);
}

// Redireccionar al usuario a la página de inicio
header('Location: ../index.php');
exit;
?>
