<?php
// db_config.php

// Función ligera para cargar variables de entorno desde .env
function loadEnv($path) {
    if (!file_exists($path)) {
        return;
    }
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $line = trim($line);
        if (empty($line) || strpos($line, '#') === 0) {
            continue;
        }
        $parts = explode('=', $line, 2);
        if (count($parts) === 2) {
            $name = trim($parts[0]);
            $value = trim($parts[1]);
            // Remover comillas del valor si existen
            if (preg_match('/^["\'](.*)["\']$/', $value, $matches)) {
                $value = $matches[1];
            }
            if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
                putenv("$name=$value");
                $_ENV[$name] = $value;
                $_SERVER[$name] = $value;
            }
        }
    }
}

// Cargar .env desde el directorio raíz
loadEnv(__DIR__ . '/.env');

$db_host = getenv('DB_HOST') ?: 'sql312.infinityfree.com';
$db_user = getenv('DB_USER') ?: 'if0_42066037';
$db_pass = getenv('DB_PASS') ?: 'PaladinDuerme';
$db_name = getenv('DB_NAME') ?: 'if0_42066037_physics'; // Asegúrate de haber creado esta base de datos en tu panel de InfinityFree

// Llave maestra para cifrar/descifrar datos personales en la DB con AES
$aes_key = getenv('AES_KEY') ?: 'MasterPhysicsAESKey2026!';

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Creación automática de la estructura de tablas si no existe (Self-healing Schema)
    $pdo->exec("CREATE TABLE IF NOT EXISTS alumnos (
        matricula VARCHAR(50) PRIMARY KEY,
        nombre_cifrado BLOB NOT NULL,
        correo_cifrado BLOB NOT NULL,
        password_hash VARCHAR(255) NOT NULL,
        rol VARCHAR(20) NOT NULL DEFAULT 'ALUMNO',
        unidad_maxima INT NOT NULL DEFAULT 1,
        acceso_tareas TINYINT(1) NOT NULL DEFAULT 1,
        cuenta_activa TINYINT(1) NOT NULL DEFAULT 1
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8");

    $pdo->exec("CREATE TABLE IF NOT EXISTS log_accesos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        fecha DATETIME NOT NULL,
        ip_cifrada BLOB NOT NULL,
        matricula VARCHAR(50) NOT NULL,
        accion_cifrada BLOB NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8");

    // Verificar e insertar el alumno por defecto 'ESTUDIANTE' (contraseña: fisica2026)
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM alumnos WHERE matricula = 'ESTUDIANTE'");
    $stmt->execute();
    if ($stmt->fetchColumn() == 0) {
        $student_hash = password_hash('fisica2026', PASSWORD_BCRYPT);
        $insert = $pdo->prepare("INSERT INTO alumnos (matricula, nombre_cifrado, correo_cifrado, password_hash, rol, unidad_maxima) 
            VALUES ('ESTUDIANTE', AES_ENCRYPT('Estudiante de Física', :key), AES_ENCRYPT('estudiante@physics.com', :key), :hash, 'ALUMNO', 1)");
        $insert->execute([':key' => $aes_key, ':hash' => $student_hash]);
    }

    // Verificar e insertar el administrador por defecto 'ADMIN' (contraseña: admin1234)
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM alumnos WHERE matricula = 'ADMIN'");
    $stmt->execute();
    if ($stmt->fetchColumn() == 0) {
        $admin_hash = password_hash('admin1234', PASSWORD_BCRYPT);
        $insert = $pdo->prepare("INSERT INTO alumnos (matricula, nombre_cifrado, correo_cifrado, password_hash, rol, unidad_maxima) 
            VALUES ('ADMIN', AES_ENCRYPT('Administrador General', :key), AES_ENCRYPT('admin@physics.com', :key), :hash, 'ADMIN', 11)");
        $insert->execute([':key' => $aes_key, ':hash' => $admin_hash]);
    }
    
} catch (PDOException $e) {
    die("Error de conexión a la Base de Datos: " . $e->getMessage());
}
?>
