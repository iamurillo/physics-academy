<?php
// auth.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['physics_logged_in']) || $_SESSION['physics_logged_in'] !== true) {
    // Determine path back to login
    $current_dir = basename(dirname($_SERVER['PHP_SELF']));
    if (in_array($current_dir, ['labs', 'unidad1', 'unidad2', 'unidad3', 'unidad4', 'unidad5', 'unidad6', 'unidad7', 'unidad8', 'unidad9', 'unidad10', 'unidad11'])) {
        header('Location: ../index.php');
    } else {
        header('Location: index.php');
    }
    exit;
}
?>
