<?php
// check_db.php
require_once 'db_config.php';

echo "<h2>Estado de la Base de Datos de PhysicsAcademy</h2>";

try {
    // 1. Verificar si las tablas existen
    $tables = ['alumnos', 'log_accesos'];
    foreach ($tables as $table) {
        $stmt = $pdo->query("SHOW TABLES LIKE '$table'");
        if ($stmt->rowCount() > 0) {
            echo "✅ Tabla <strong>$table</strong> existe.<br>";
        } else {
            echo "❌ Tabla <strong>$table</strong> NO existe.<br>";
        }
    }

    echo "<br><h3>Registros de Usuarios en 'alumnos':</h3>";
    $stmt = $pdo->query("SELECT matricula, rol, unidad_maxima, acceso_tareas, cuenta_activa, password_hash FROM alumnos");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($users) === 0) {
        echo "⚠️ La tabla de alumnos está vacía.<br>";
    } else {
        echo "<table border='1' cellpadding='5' style='border-collapse: collapse;'>";
        echo "<tr><th>Matrícula</th><th>Rol</th><th>Unidad Máxima</th><th>Acceso Tareas</th><th>Cuenta Activa</th><th>Hash Valido (fisica2026)?</th><th>Hash Valido (admin1234)?</th></tr>";
        foreach ($users as $u) {
            $is_fisica = password_verify('fisica2026', $u['password_hash']) ? 'SÍ' : 'NO';
            $is_admin = password_verify('admin1234', $u['password_hash']) ? 'SÍ' : 'NO';
            echo "<tr>";
            echo "<td>" . htmlspecialchars($u['matricula']) . "</td>";
            echo "<td>" . htmlspecialchars($u['rol']) . "</td>";
            echo "<td>" . htmlspecialchars($u['unidad_maxima']) . "</td>";
            echo "<td>" . htmlspecialchars($u['acceso_tareas']) . "</td>";
            echo "<td>" . htmlspecialchars($u['cuenta_activa']) . "</td>";
            echo "<td>$is_fisica</td>";
            echo "<td>$is_admin</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

} catch (Exception $e) {
    echo "❌ Error al verificar la base de datos: " . $e->getMessage();
}
?>
