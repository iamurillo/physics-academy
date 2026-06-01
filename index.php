<?php
session_start();
require_once 'db_config.php';

$error = '';
$run_boot = false;
$username_val = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim(strtoupper($_POST['username'] ?? ''));
    $password = trim($_POST['password'] ?? '');
    $username_val = htmlspecialchars($username);
    
    if (empty($username) || empty($password)) {
        $error = 'ACCESO DENEGADO — Ingrese usuario y contraseña';
    } else {
        try {
            $stmt = $pdo->prepare("SELECT matricula, password_hash, rol, unidad_maxima, acceso_tareas, cuenta_activa FROM alumnos WHERE matricula = :matricula");
            $stmt->execute([':matricula' => $username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($user && password_verify($password, $user['password_hash'])) {
                if ($user['cuenta_activa'] == 1) {
                    $_SESSION['physics_user'] = $username;
                    $_SESSION['physics_logged_in'] = true;
                    $_SESSION['physics_rol'] = $user['rol'];
                    $_SESSION['physics_acceso_tareas'] = (bool)$user['acceso_tareas'];
                    $_SESSION['physics_unidad_maxima'] = (int)$user['unidad_maxima'];
                    
                    // Log connection
                    $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
                    $log_stmt = $pdo->prepare("INSERT INTO log_accesos (fecha, ip_cifrada, matricula, accion_cifrada) 
                        VALUES (NOW(), AES_ENCRYPT(:ip, :key), :matricula, AES_ENCRYPT('Inicio de sesión exitoso', :key))");
                    $log_stmt->execute([':ip' => $ip, ':key' => $aes_key, ':matricula' => $username]);
                    
                    $run_boot = true;
                } else {
                    $error = 'CUENTA DESACTIVADA — Contacte al administrador';
                }
            } else {
                $error = 'ACCESO DENEGADO — Credenciales incorrectas';
                
                // Log failed connection
                $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
                $log_stmt = $pdo->prepare("INSERT INTO log_accesos (fecha, ip_cifrada, matricula, accion_cifrada) 
                    VALUES (NOW(), AES_ENCRYPT(:ip, :key), :matricula, AES_ENCRYPT('Intento fallido de inicio de sesión', :key))");
                $log_stmt->execute([':ip' => $ip, ':key' => $aes_key, ':matricula' => $username]);
            }
        } catch (Exception $e) {
            $error = 'Error de conexión con el laboratorio';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhysicsAcademy — Acceso al Laboratorio</title>
    <meta name="description" content="Plataforma educativa de Física. Accede al laboratorio virtual con módulos interactivos de mecánica, termodinámica, electricidad y más.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/physics.css">
</head>

<body class="login-page">
    <!-- Particle Background -->
    <canvas id="particle-canvas"></canvas>

    <!-- Floating Equations -->
    <div class="floating-equations"></div>

    <!-- Grid Overlay -->
    <div class="grid-overlay"></div>

    <!-- Login Form -->
    <div class="login-wrapper">
        <div class="site-title">
            <i class="fas fa-atom"></i>
            PhysicsAcademy — Laboratorio Virtual
        </div>

        <div class="login-container">
            <div class="lab-header">
                <span>LAB_CONTROL v1.7 &nbsp;|&nbsp; Física General</span>
                <span>● EN LÍNEA</span>
            </div>

            <div class="login-title">
                <i class="fas fa-flask"></i>
                Acceso al Laboratorio
            </div>
            <div class="login-subtitle">Ingeniería — Plataforma de Física General</div>

            <form id="login-form" method="POST" action="index.php" autocomplete="off">
                <div class="input-group">
                    <label for="username-input">
                        <i class="fas fa-user-graduate"></i> Matrícula / Usuario
                    </label>
                    <input type="text" id="username-input" name="username" class="lab-input" placeholder="Ej. ESTUDIANTE"
                        value="<?php echo htmlspecialchars($username_val); ?>" autocomplete="off" spellcheck="false" autofocus style="text-transform: uppercase;">
                </div>

                <div class="input-group">
                    <label for="password-input">
                        <i class="fas fa-key"></i> Clave de Acceso
                    </label>
                    <input type="password" id="password-input" name="password" class="lab-input" placeholder="••••••••••••"
                        autocomplete="off" spellcheck="false">
                </div>

                <button type="submit" class="btn-access" id="btn-submit">
                    <i class="fas fa-sign-in-alt" style="margin-right: 10px;"></i>Iniciar Sesión
                </button>

                <div class="error-msg <?php echo !empty($error) ? 'visible' : ''; ?>" id="login-error">
                    <i class="fas fa-exclamation-triangle"></i> <?php echo htmlspecialchars($error); ?>
                </div>
            </form>

            <div id="boot-sequence"></div>

            <div class="hint-box">
                <i class="fas fa-atom"></i>
                LABORATORIO DE FÍSICA — ACCESO AUTORIZADO ÚNICAMENTE PARA ESTUDIANTES
            </div>
        </div>
    </div>

    <script src="js/physics.js"></script>
    <?php if ($run_boot): ?>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Save username to sessionStorage for front-end greeting consistency
            sessionStorage.setItem('physics_user', '<?php echo htmlspecialchars($username); ?>');
            sessionStorage.setItem('physics_logged_in', 'true');
            // Hide the login form
            document.getElementById('login-form').style.display = 'none';
            // Start boot rendering animation and redirect to dashboard
            runBootSequence('dashboard.php');
        });
    </script>
    <?php endif; ?>
</body>

</html>
