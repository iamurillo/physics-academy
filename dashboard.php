<?php require_once 'auth.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhysicsAcademy — Portal de Módulos</title>
    <meta name="description" content="Dashboard de PhysicsAcademy. 11 unidades de Física General: mecánica, termodinámica, electricidad, ondas y más.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/physics.css">
</head>

<body class="dashboard-page">

    <!-- ═══════ SCIENTIFIC LAYERS BACKGROUND ═══════ -->
    <div class="grid-overlay"></div>
    <div class="floating-equations" id="floating-equations"></div>

    <!-- ═══════ HEADER ═══════ -->
    <header>
        <div class="brand">
            <i class="fas fa-atom"></i>
            PHYSICS<span style="color:#e8ecf4;">ACADEMY</span>
        </div>
        <div class="header-right">
            <a href="dashboard.php" class="btn-header" style="color: var(--primary); border-color: rgba(0, 229, 255, 0.25); background: rgba(0, 229, 255, 0.05);"><i class="fas fa-layer-group"></i> PORTAL</a>
            <a href="ejercicios.php" class="btn-header"><i class="fas fa-pen-clip"></i> EJERCICIOS</a>
            <a href="#" class="btn-header" id="btn-toggle-tasks" onclick="toggleTasks(event)"><i class="fas fa-tasks"></i> TAREAS: OCULTAS</a>
            <div class="user-status">
                <span class="online-dot"></span>
                <span id="user-display">ESTUDIANTE</span>
            </div>
            <a href="index.php" class="btn-header" onclick="handleLogout()">
                <i class="fas fa-sign-out-alt"></i> SALIR
            </a>
        </div>
    </header>

    <!-- ═══════ STATS BAR ═══════ -->
    <div class="system-stats">
        <span><i class="fas fa-layer-group" style="color:var(--physics-cyan);"></i> 11 UNIDADES</span>
        <span><i class="fas fa-book-open" style="color:var(--physics-indigo);"></i> 70 MÓDULOS</span>
        <span><i class="fas fa-flask" style="color:var(--physics-green);"></i> SIMULACIONES</span>
        <span><i class="fas fa-calculator" style="color:var(--physics-orange);"></i> FÓRMULAS</span>
        <span><i class="fas fa-cat" style="color:var(--physics-pink);"></i> COHERENCIA DEL GATO: 50% / 50%</span>
        <span><i class="fas fa-bolt" style="color:var(--physics-yellow);"></i> CONDENSADOR DE FLUJO: ACTIVO (1.21 GW)</span>
        <span style="margin-left:auto;color:#5c6f84;"><i class="fas fa-clock"></i> v1.7 — 2026</span>
    </div>

    <!-- ═══════ MAIN CONTENT ═══════ -->
    <div class="dashboard-main">

        <!-- ══════════════════════════════════════════════════════
             UNIDAD 1 — INTRODUCCIÓN A LA FÍSICA Y MEDICIÓN (CIAN)
             ══════════════════════════════════════════════════════ -->
        <h2 class="section-title" style="color:var(--physics-cyan); border-left-color:var(--physics-cyan); background:linear-gradient(90deg, rgba(0,229,255,0.06) 0%, transparent 100%);">
            <i class="fas fa-ruler-combined section-icon"></i>
            UNIDAD 1 <small>INTRODUCCIÓN A LA FÍSICA Y MEDICIÓN</small>
        </h2>
        <div class="modules-grid">
            <article class="class-card card-cyan">
                <div>
                    <span class="unit-badge" style="color:var(--physics-cyan);">MÓDULO 1.1</span>
                    <h3 class="card-title">Concepto e Importancia de la Física</h3>
                    <p class="card-desc">¿Qué es la Física? Ramas principales, relación con otras ciencias y su papel fundamental en la tecnología moderna.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-cyan);"><i class="fas fa-microscope"></i> CLASE</span>
                    <a href="unidad1/clase1_1.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-cyan); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Investigar las ramas emergentes de la física clásica y escribir un ensayo corto sobre cómo la física fundamenta la carrera de ingeniería elegida.</span>
                </div>
            </article>

            <article class="class-card card-cyan">
                <div>
                    <span class="unit-badge" style="color:var(--physics-cyan);">MÓDULO 1.2</span>
                    <h3 class="card-title">Sistema Internacional de Unidades (SI)</h3>
                    <p class="card-desc">Las 7 magnitudes fundamentales, unidades derivadas, prefijos del SI y estándares internacionales de medición.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-cyan);"><i class="fas fa-ruler"></i> CLASE</span>
                    <a href="unidad1/clase1_2.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-cyan); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Redactar un reporte sobre la pérdida de la Mars Climate Orbiter debido a la mezcla de unidades del SI e inglesas.</span>
                </div>
            </article>

            <article class="class-card card-cyan">
                <div>
                    <span class="unit-badge" style="color:var(--physics-cyan);">MÓDULO 1.3</span>
                    <h3 class="card-title">Notación Científica</h3>
                    <p class="card-desc">Expresión de cantidades muy grandes o pequeñas. Operaciones con potencias de 10 y órdenes de magnitud.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-cyan);"><i class="fas fa-superscript"></i> CLASE</span>
                    <a href="unidad1/clase1_4.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-cyan); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Resolver 5 problemas de expresión en notación científica y cálculo del orden de magnitud de distancias cósmicas.</span>
                </div>
            </article>

            <article class="class-card card-cyan">
                <div>
                    <span class="unit-badge" style="color:var(--physics-cyan);">MÓDULO 1.4</span>
                    <h3 class="card-title">Conversión de Unidades</h3>
                    <p class="card-desc">Factores de conversión, método de cancelación de unidades y conversiones entre sistemas (SI, CGS, Inglés).</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-cyan);"><i class="fas fa-exchange-alt"></i> CLASE</span>
                    <a href="unidad1/clase1_5.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-cyan); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Realizar conversiones de unidades compuestas (velocidad, flujo, densidad) entre el sistema inglés y el SI.</span>
                </div>
            </article>

            <article class="class-card card-cyan">
                <div>
                    <span class="unit-badge" style="color:var(--physics-cyan);">MÓDULO 1.5</span>
                    <h3 class="card-title">Análisis Dimensional</h3>
                    <p class="card-desc">Verificación de ecuaciones mediante dimensiones. Dimensiones de M, L, T y su uso para validar fórmulas físicas.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-cyan);"><i class="fas fa-check-double"></i> CLASE</span>
                    <a href="unidad1/clase1_6.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-cyan); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Derivar y verificar las unidades base de la Constante de Gravitación Universal (G) mediante análisis dimensional.</span>
                </div>
            </article>

            <article class="class-card card-cyan">
                <div>
                    <span class="unit-badge" style="color:var(--physics-cyan);">MÓDULO 1.6</span>
                    <h3 class="card-title">Error e Incertidumbre en las Mediciones</h3>
                    <p class="card-desc">Tipos de error (sistemático, aleatorio), incertidumbre absoluta y relativa, cifras significativas y propagación de errores.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-cyan);"><i class="fas fa-exclamation-triangle"></i> CLASE</span>
                    <a href="unidad1/clase1_7.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-cyan); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Calcular la propagación de incertidumbre en el cálculo del volumen de un cilindro a partir de medidas directas.</span>
                </div>
            </article>

            <article class="class-card card-cyan">
                <div>
                    <span class="unit-badge" style="color:var(--physics-cyan);">MÓDULO 1.7</span>
                    <h3 class="card-title">Magnitudes Escalares y Vectoriales</h3>
                    <p class="card-desc">Diferencia entre escalares y vectores. Representación gráfica, componentes, suma y resta de vectores.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-cyan);"><i class="fas fa-arrows-alt"></i> CLASE</span>
                    <a href="unidad1/clase1_3.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-cyan); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Resolver analítica y gráficamente la suma de tres fuerzas concurrentes representadas como vectores.</span>
                </div>
            </article>

            <!-- LABORATORIO DE UNIDAD 1 -->
            <article class="class-card card-cyan lab-card" style="border: 1px solid rgba(0, 229, 255, 0.4); box-shadow: 0 0 15px rgba(0, 229, 255, 0.15);">
                <div>
                    <span class="unit-badge" style="color:var(--physics-cyan);"><i class="fas fa-flask"></i> LABORATORIO 1</span>
                    <h3 class="card-title" style="color: #fff;">Simulador de Mediciones y Vectores</h3>
                    <p class="card-desc">Uso virtual del calibrador vernier de precisión e interactivo sumador de vectores dinámico 2D en plano cartesiano.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-cyan);"><i class="fas fa-flask"></i> SIMULACIÓN</span>
                    <a href="labs/lab_unidad1.php" class="btn-launch" style="background: var(--physics-cyan); color: #111; box-shadow: 0 0 10px rgba(0,229,255,0.3);"><i class="fas fa-flask"></i> INICIAR LAB</a>
                </div>
            </article>
        </div>

        <!-- ══════════════════════════════════════════════════════
             UNIDAD 2 — CINEMÁTICA (ÍNDIGO)
             ══════════════════════════════════════════════════════ -->
        <h2 class="section-title" style="color:var(--physics-indigo); border-left-color:var(--physics-indigo); background:linear-gradient(90deg, rgba(61,90,254,0.06) 0%, transparent 100%);">
            <i class="fas fa-tachometer-alt section-icon"></i>
            UNIDAD 2 <small>CINEMÁTICA</small>
        </h2>
        <div class="modules-grid">
            <article class="class-card card-indigo">
                <div>
                    <span class="unit-badge" style="color:var(--physics-indigo);">MÓDULO 2.1</span>
                    <h3 class="card-title">Movimiento Rectilíneo</h3>
                    <p class="card-desc">Concepto de movimiento, marco de referencia, trayectoria rectilínea y sistemas de coordenadas para describir el movimiento.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-indigo);"><i class="fas fa-arrow-right"></i> CLASE</span>
                    <a href="unidad2/clase2_1.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-indigo); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Diseñar y graficar el recorrido de una partícula en un plano cartesiano identificando los vectores de posición.</span>
                </div>
            </article>

            <article class="class-card card-indigo">
                <div>
                    <span class="unit-badge" style="color:var(--physics-indigo);">MÓDULO 2.2</span>
                    <h3 class="card-title">Distancia y Desplazamiento</h3>
                    <p class="card-desc">Diferencia entre distancia (escalar) y desplazamiento (vectorial). Diagramas de posición vs tiempo.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-indigo);"><i class="fas fa-route"></i> CLASE</span>
                    <a href="unidad2/clase2_2.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-indigo); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Resolver el reto de la diferencia entre distancia total recorrida y desplazamiento para una pista atlética ovalada.</span>
                </div>
            </article>

            <article class="class-card card-indigo">
                <div>
                    <span class="unit-badge" style="color:var(--physics-indigo);">MÓDULO 2.3</span>
                    <h3 class="card-title">Rapidez y Velocidad</h3>
                    <p class="card-desc">Rapidez media e instantánea. Velocidad como vector: magnitud y dirección. Gráficas x-t y v-t.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-indigo);"><i class="fas fa-gauge-high"></i> CLASE</span>
                    <a href="unidad2/clase2_3.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-indigo); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Dibujar gráficas de posición vs tiempo (x-t) y obtener la velocidad instantánea en 3 puntos usando tangentes.</span>
                </div>
            </article>

            <article class="class-card card-indigo">
                <div>
                    <span class="unit-badge" style="color:var(--physics-indigo);">MÓDULO 2.4</span>
                    <h3 class="card-title">Aceleración</h3>
                    <p class="card-desc">Aceleración media e instantánea. Relación con cambios de velocidad. Gráficas a-t y su interpretación.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-indigo);"><i class="fas fa-forward"></i> CLASE</span>
                    <a href="unidad2/clase2_4.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-indigo); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Resolver problemas donde un móvil cambia de sentido y calcular su aceleración media y su velocidad promedio.</span>
                </div>
            </article>

            <article class="class-card card-indigo">
                <div>
                    <span class="unit-badge" style="color:var(--physics-indigo);">MÓDULO 2.5</span>
                    <h3 class="card-title">Movimiento Rectilíneo Uniforme (MRU)</h3>
                    <p class="card-desc">Velocidad constante, ecuación x = x₀ + vt. Gráficas características y problemas de aplicación.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-indigo);"><i class="fas fa-equals"></i> CLASE</span>
                    <a href="unidad2/clase2_5.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-indigo); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Modelar el encuentro de dos móviles con MRU que parten de extremos opuestos de una autopista.</span>
                </div>
            </article>

            <article class="class-card card-indigo">
                <div>
                    <span class="unit-badge" style="color:var(--physics-indigo);">MÓDULO 2.6</span>
                    <h3 class="card-title">Movimiento Rectilíneo Uniformemente Acelerado (MRUA)</h3>
                    <p class="card-desc">Ecuaciones cinemáticas: v = v₀ + at, x = v₀t + ½at², v² = v₀² + 2aΔx. Problemas resueltos.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-indigo);"><i class="fas fa-chart-line"></i> CLASE</span>
                    <a href="unidad2/clase2_6.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-indigo); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Resolver una serie de 3 ejercicios prácticos de MRUA (tiempo de frenado de un tren, aceleración de un jet, etc.).</span>
                </div>
            </article>

            <article class="class-card card-indigo">
                <div>
                    <span class="unit-badge" style="color:var(--physics-indigo);">MÓDULO 2.7</span>
                    <h3 class="card-title">Caída Libre</h3>
                    <p class="card-desc">Aceleración gravitacional g = 9.81 m/s². Ecuaciones de caída libre, tiempo de vuelo y altura máxima.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-indigo);"><i class="fas fa-arrow-down"></i> CLASE</span>
                    <a href="unidad2/clase2_7.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-indigo); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Calcular la altura de un puente y la velocidad de impacto de un objeto dejado caer sabiendo que tarda 4.2 segundos en tocar el agua.</span>
                </div>
            </article>

            <article class="class-card card-indigo">
                <div>
                    <span class="unit-badge" style="color:var(--physics-indigo);">MÓDULO 2.8</span>
                    <h3 class="card-title">Movimiento Parabólico</h3>
                    <p class="card-desc">Tiro parabólico: descomposición en Vx y Vy, ecuaciones paramétricas, alcance máximo y ángulo óptimo de 45°.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-indigo);"><i class="fas fa-basketball"></i> CLASE</span>
                    <a href="unidad2/clase2_8.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-indigo); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Determinar el ángulo de lanzamiento y la velocidad mínima para que un proyectil supere un muro de 10 metros de altura a 50 metros de distancia.</span>
                </div>
            </article>

            <!-- LABORATORIO DE UNIDAD 2 -->
            <article class="class-card card-indigo lab-card" style="border: 1px solid rgba(61, 90, 254, 0.4); box-shadow: 0 0 15px rgba(61, 90, 254, 0.15);">
                <div>
                    <span class="unit-badge" style="color:var(--physics-indigo);"><i class="fas fa-flask"></i> LABORATORIO 2</span>
                    <h3 class="card-title" style="color: #fff;">Simulador de MRU/MRUA y Tiro Parabólico</h3>
                    <p class="card-desc">Gráficas cinemáticas continuas de móviles en tiempo real y lanzamiento bidimensional de proyectiles interactivos.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-indigo);"><i class="fas fa-flask"></i> SIMULACIÓN</span>
                    <a href="labs/lab_unidad2.php" class="btn-launch" style="background: var(--physics-indigo); color: #fff; box-shadow: 0 0 10px rgba(61,90,254,0.3);"><i class="fas fa-flask"></i> INICIAR LAB</a>
                </div>
            </article>
        </div>

        <!-- ══════════════════════════════════════════════════════
             UNIDAD 3 — DINÁMICA (VERDE)
             ══════════════════════════════════════════════════════ -->
        <h2 class="section-title" style="color:var(--physics-green); border-left-color:var(--physics-green); background:linear-gradient(90deg, rgba(0,230,118,0.06) 0%, transparent 100%);">
            <i class="fas fa-arrows-alt section-icon"></i>
            UNIDAD 3 <small>DINÁMICA</small>
        </h2>
        <div class="modules-grid">
            <article class="class-card card-green">
                <div>
                    <span class="unit-badge" style="color:var(--physics-green);">MÓDULO 3.1</span>
                    <h3 class="card-title">Concepto de Fuerza</h3>
                    <p class="card-desc">¿Qué es una fuerza? Tipos de fuerzas (contacto, distancia), representación vectorial y unidades (Newton).</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-green);"><i class="fas fa-hand-fist"></i> CLASE</span>
                    <a href="unidad3/clase3_1.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-green); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Escribir un análisis crítico sobre la definición de Newton y cómo se calibran los dinamómetros de resorte.</span>
                </div>
            </article>

            <article class="class-card card-green">
                <div>
                    <span class="unit-badge" style="color:var(--physics-green);">MÓDULO 3.2</span>
                    <h3 class="card-title">Leyes de Newton</h3>
                    <p class="card-desc">Primera Ley (Inercia), Segunda Ley (F=ma), Tercera Ley (Acción-Reacción). Ejemplos y aplicaciones cotidianas.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-green);"><i class="fas fa-apple-whole"></i> CLASE</span>
                    <a href="unidad3/clase3_2.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-green); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Identificar 3 aplicaciones diarias de cada una de las Leyes de Newton en el funcionamiento de un automóvil moderno.</span>
                </div>
            </article>

            <article class="class-card card-green">
                <div>
                    <span class="unit-badge" style="color:var(--physics-green);">MÓDULO 3.3</span>
                    <h3 class="card-title">Diagramas de Cuerpo Libre</h3>
                    <p class="card-desc">Técnica para identificar y representar todas las fuerzas sobre un cuerpo. Descomposición en componentes y suma vectorial.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-green);"><i class="fas fa-diagram-project"></i> CLASE</span>
                    <a href="unidad3/clase3_3.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-green); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Dibujar el diagrama de cuerpo libre (DCL) de un bloque apoyado en una pared vertical mientras se le aplica una fuerza diagonal.</span>
                </div>
            </article>

            <article class="class-card card-green">
                <div>
                    <span class="unit-badge" style="color:var(--physics-green);">MÓDULO 3.4</span>
                    <h3 class="card-title">Fuerza de Fricción</h3>
                    <p class="card-desc">Fricción estática y cinética, coeficientes de fricción (μs, μk), fuerza normal y problemas de plano inclinado.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-green);"><i class="fas fa-grip-lines"></i> CLASE</span>
                    <a href="unidad3/clase3_4.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-green); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Calcular la fuerza necesaria para iniciar el movimiento de una caja de madera de 40 kg sobre concreto seco y mantenerla a velocidad constante.</span>
                </div>
            </article>

            <article class="class-card card-green">
                <div>
                    <span class="unit-badge" style="color:var(--physics-green);">MÓDULO 3.5</span>
                    <h3 class="card-title">Peso y Masa</h3>
                    <p class="card-desc">Diferencia entre masa (kg) y peso (N). Fuerza gravitacional W = mg, variación de g según la ubicación.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-green);"><i class="fas fa-weight-hanging"></i> CLASE</span>
                    <a href="unidad3/clase3_5.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-green); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Investigar la diferencia de peso de un astronauta de 80 kg en la Tierra, la Luna y Marte de acuerdo a sus gravedades locales.</span>
                </div>
            </article>

            <article class="class-card card-green">
                <div>
                    <span class="unit-badge" style="color:var(--physics-green);">MÓDULO 3.6</span>
                    <h3 class="card-title">Tensión</h3>
                    <p class="card-desc">Fuerza de tensión en cuerdas y cables. Poleas ideales, sistemas de Atwood y problemas con múltiples cuerdas.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-green);"><i class="fas fa-link"></i> CLASE</span>
                    <a href="unidad3/clase3_6.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-green); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Resolver el sistema de la máquina de Atwood determinando la aceleración y tensión con masas de 8 kg y 12 kg.</span>
                </div>
            </article>

            <article class="class-card card-green">
                <div>
                    <span class="unit-badge" style="color:var(--physics-green);">MÓDULO 3.7</span>
                    <h3 class="card-title">Aplicaciones de las Leyes de Newton</h3>
                    <p class="card-desc">Problemas integrales: planos inclinados con fricción, sistemas de cuerpos conectados, elevadores y fuerzas aparentes.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-green);"><i class="fas fa-gears"></i> CLASE</span>
                    <a href="unidad3/clase3_7.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-green); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Calcular la aceleración y la tensión de las cuerdas de un sistema de tres masas en serie arrastradas por un plano inclinado con fricción.</span>
                </div>
            </article>

            <!-- LABORATORIO DE UNIDAD 3 -->
            <article class="class-card card-green lab-card" style="border: 1px solid rgba(0, 230, 118, 0.4); box-shadow: 0 0 15px rgba(0, 230, 118, 0.15);">
                <div>
                    <span class="unit-badge" style="color:var(--physics-green);"><i class="fas fa-flask"></i> LABORATORIO 3</span>
                    <h3 class="card-title" style="color: #fff;">Simulador de Dinámica y Fuerzas</h3>
                    <p class="card-desc">Análisis dinámico de bloques en plano inclinado con vectores de fuerza interactivos y máquina de Atwood animada.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-green);"><i class="fas fa-flask"></i> SIMULACIÓN</span>
                    <a href="labs/lab_unidad3.php" class="btn-launch" style="background: var(--physics-green); color: #060a14; box-shadow: 0 0 10px rgba(0,230,118,0.3);"><i class="fas fa-flask"></i> INICIAR LAB</a>
                </div>
            </article>
        </div>

        <!-- ══════════════════════════════════════════════════════
             UNIDAD 4 — TRABAJO Y ENERGÍA (NARANJA)
             ══════════════════════════════════════════════════════ -->
        <h2 class="section-title" style="color:var(--physics-orange); border-left-color:var(--physics-orange); background:linear-gradient(90deg, rgba(255,145,0,0.06) 0%, transparent 100%);">
            <i class="fas fa-bolt section-icon"></i>
            UNIDAD 4 <small>TRABAJO Y ENERGÍA</small>
        </h2>
        <div class="modules-grid">
            <article class="class-card card-orange">
                <div>
                    <span class="unit-badge" style="color:var(--physics-orange);">MÓDULO 4.1</span>
                    <h3 class="card-title">Trabajo Mecánico</h3>
                    <p class="card-desc">Definición de trabajo W = Fd cos θ. Trabajo positivo, negativo y nulo. Trabajo realizado por fuerzas variables.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-orange);"><i class="fas fa-hammer"></i> CLASE</span>
                    <a href="unidad4/clase4_1.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-orange); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Calcular el trabajo neto realizado por una fuerza variable expresada en una gráfica Fuerza vs Posición.</span>
                </div>
            </article>

            <article class="class-card card-orange">
                <div>
                    <span class="unit-badge" style="color:var(--physics-orange);">MÓDULO 4.2</span>
                    <h3 class="card-title">Potencia</h3>
                    <p class="card-desc">Tasa de realización de trabajo P = W/t = Fv. Unidades (Watts, HP) y eficiencia energética.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-orange);"><i class="fas fa-gauge-high"></i> CLASE</span>
                    <a href="unidad4/clase4_2.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-orange); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Diseñar el cálculo de potencia de una bomba hidráulica requerida para llenar un tanque a 15 metros de altura.</span>
                </div>
            </article>

            <article class="class-card card-orange">
                <div>
                    <span class="unit-badge" style="color:var(--physics-orange);">MÓDULO 4.3</span>
                    <h3 class="card-title">Energía Cinética</h3>
                    <p class="card-desc">KE = ½mv². Teorema del trabajo-energía: el trabajo neto es igual al cambio en energía cinética.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-orange);"><i class="fas fa-person-running"></i> CLASE</span>
                    <a href="unidad4/clase4_3.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-orange); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Calcular el trabajo de frenado realizado por la fricción sobre un coche de 1200 kg que reduce su velocidad de 100 km/h a cero.</span>
                </div>
            </article>

            <article class="class-card card-orange">
                <div>
                    <span class="unit-badge" style="color:var(--physics-orange);">MÓDULO 4.4</span>
                    <h3 class="card-title">Energía Potencial</h3>
                    <p class="card-desc">Energía potencial gravitacional PE = mgh. Energía potencial elástica PE = ½kx². Fuerzas conservativas.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-orange);"><i class="fas fa-mountain"></i> CLASE</span>
                    <a href="unidad4/clase4_4.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-orange); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Determinar la compresión requerida de un resorte con constante k = 500 N/m para almacenar 10 Joules de energía elástica.</span>
                </div>
            </article>

            <article class="class-card card-orange">
                <div>
                    <span class="unit-badge" style="color:var(--physics-orange);">MÓDULO 4.5</span>
                    <h3 class="card-title">Conservación de la Energía</h3>
                    <p class="card-desc">Principio de conservación: KE₁ + PE₁ = KE₂ + PE₂. Sistemas conservativos y no conservativos.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-orange);"><i class="fas fa-infinity"></i> CLASE</span>
                    <a href="unidad4/clase4_5.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-orange); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Resolver el problema de una montaña rusa que parte del reposo, calculando su velocidad en diferentes crestas y valles.</span>
                </div>
            </article>

            <article class="class-card card-orange">
                <div>
                    <span class="unit-badge" style="color:var(--physics-orange);">MÓDULO 4.6</span>
                    <h3 class="card-title">Aplicaciones de Energía Mecánica</h3>
                    <p class="card-desc">Montaña rusa, resortes, péndulos. Problemas integrales de conservación de energía con fricción.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-orange);"><i class="fas fa-cogs"></i> CLASE</span>
                    <a href="unidad4/clase4_6.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-orange); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Resolver un problema integrado de conservación con pérdidas de energía mecánica debido al coeficiente de fricción de una pista rugosa.</span>
                </div>
            </article>

            <!-- LABORATORIO DE UNIDAD 4 -->
            <article class="class-card card-orange lab-card" style="border: 1px solid rgba(255, 145, 0, 0.4); box-shadow: 0 0 15px rgba(255, 145, 0, 0.15);">
                <div>
                    <span class="unit-badge" style="color:var(--physics-orange);"><i class="fas fa-flask"></i> LABORATORIO 4</span>
                    <h3 class="card-title" style="color: #fff;">Simulador de Trabajo y Energía</h3>
                    <p class="card-desc">Simulación interactiva de montañas rusas con conservación de energía, fricción y sistema oscilador masa-resorte.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-orange);"><i class="fas fa-flask"></i> SIMULACIÓN</span>
                    <a href="labs/lab_unidad4.php" class="btn-launch" style="background: var(--physics-orange); color: #060a14; box-shadow: 0 0 10px rgba(255,145,0,0.3);"><i class="fas fa-flask"></i> INICIAR LAB</a>
                </div>
            </article>
        </div>

        <!-- ══════════════════════════════════════════════════════
             UNIDAD 5 — CANTIDAD DE MOVIMIENTO (MAGENTA)
             ══════════════════════════════════════════════════════ -->
        <h2 class="section-title" style="color:var(--physics-magenta); border-left-color:var(--physics-magenta); background:linear-gradient(90deg, rgba(224,64,251,0.06) 0%, transparent 100%);">
            <i class="fas fa-meteor section-icon"></i>
            UNIDAD 5 <small>CANTIDAD DE MOVIMIENTO</small>
        </h2>
        <div class="modules-grid">
            <article class="class-card card-magenta">
                <div>
                    <span class="unit-badge" style="color:var(--physics-magenta);">MÓDULO 5.1</span>
                    <h3 class="card-title">Impulso</h3>
                    <p class="card-desc">Impulso J = FΔt. Relación con el cambio de momento. Fuerza impulsiva y gráficas F-t.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-magenta);"><i class="fas fa-hand-back-fist"></i> CLASE</span>
                    <a href="unidad5/clase5_1.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-magenta); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Estimar la fuerza promedio de impacto que ejerce una raqueta de tenis sobre una pelota durante un contacto de 5 milisegundos.</span>
                </div>
            </article>

            <article class="class-card card-magenta">
                <div>
                    <span class="unit-badge" style="color:var(--physics-magenta);">MÓDULO 5.2</span>
                    <h3 class="card-title">Momento Lineal</h3>
                    <p class="card-desc">Momento lineal p = mv. Segunda ley de Newton como F = dp/dt. Sistemas de partículas.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-magenta);"><i class="fas fa-arrow-trend-up"></i> CLASE</span>
                    <a href="unidad5/clase5_2.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-magenta); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Calcular el momento lineal total de un sistema de tres partículas de diferentes masas que viajan en direcciones coplanares.</span>
                </div>
            </article>

            <article class="class-card card-magenta">
                <div>
                    <span class="unit-badge" style="color:var(--physics-magenta);">MÓDULO 5.3</span>
                    <h3 class="card-title">Conservación del Momento</h3>
                    <p class="card-desc">Ley de conservación: p₁ + p₂ = p₁' + p₂'. Sistemas aislados y aplicaciones (retroceso, cohetes).</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-magenta);"><i class="fas fa-scale-balanced"></i> CLASE</span>
                    <a href="unidad5/clase5_3.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-magenta); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Resolver la velocidad de retroceso de un cañón de 800 kg tras disparar una bala de 12 kg a una velocidad de salida de 300 m/s.</span>
                </div>
            </article>

            <article class="class-card card-magenta">
                <div>
                    <span class="unit-badge" style="color:var(--physics-magenta);">MÓDULO 5.4</span>
                    <h3 class="card-title">Colisiones Elásticas e Inelásticas</h3>
                    <p class="card-desc">Colisión elástica (conserva KE), inelástica y perfectamente inelástica. Coeficiente de restitución y simulaciones.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-magenta);"><i class="fas fa-burst"></i> CLASE</span>
                    <a href="unidad5/clase5_4.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-magenta); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Calcular el ángulo y velocidad final tras una colisión inelástica bidimensional (2D) de dos masas en un plano sin fricción.</span>
                </div>
            </article>

            <!-- LABORATORIO DE UNIDAD 5 -->
            <article class="class-card card-magenta lab-card" style="border: 1px solid rgba(224, 64, 251, 0.4); box-shadow: 0 0 15px rgba(224, 64, 251, 0.15);">
                <div>
                    <span class="unit-badge" style="color:var(--physics-magenta);"><i class="fas fa-flask"></i> LABORATORIO 5</span>
                    <h3 class="card-title" style="color: #fff;">Simulador de Colisiones</h3>
                    <p class="card-desc">Análisis de colisiones elásticas e inelásticas en 1D con masas y velocidades iniciales variables en tiempo real.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-magenta);"><i class="fas fa-flask"></i> SIMULACIÓN</span>
                    <a href="labs/lab_unidad5.php" class="btn-launch" style="background: var(--physics-magenta); color: #fff; box-shadow: 0 0 10px rgba(224,64,251,0.3);"><i class="fas fa-flask"></i> INICIAR LAB</a>
                </div>
            </article>
        </div>

        <!-- ══════════════════════════════════════════════════════
             UNIDAD 6 — MOVIMIENTO ROTACIONAL (AMARILLO)
             ══════════════════════════════════════════════════════ -->
        <h2 class="section-title" style="color:var(--physics-yellow); border-left-color:var(--physics-yellow); background:linear-gradient(90deg, rgba(255,234,0,0.06) 0%, transparent 100%);">
            <i class="fas fa-rotate section-icon"></i>
            UNIDAD 6 <small>MOVIMIENTO ROTACIONAL</small>
        </h2>
        <div class="modules-grid">
            <article class="class-card card-yellow">
                <div>
                    <span class="unit-badge" style="color:var(--physics-yellow);">MÓDULO 6.1</span>
                    <h3 class="card-title">Desplazamiento Angular</h3>
                    <p class="card-desc">Ángulo θ en radianes, revolución completa (2π rad), relación entre desplazamiento lineal y angular: s = rθ.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-yellow);"><i class="fas fa-compass"></i> CLASE</span>
                    <a href="unidad6/clase6_1.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-yellow); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Calcula el momento de inercia de una esfera sólida de masa 5 kg y radio 0.2 metros girando sobre su eje centroidal.</span>
                </div>
            </article>

            <article class="class-card card-yellow">
                <div>
                    <span class="unit-badge" style="color:var(--physics-yellow);">MÓDULO 6.2</span>
                    <h3 class="card-title">Velocidad Angular</h3>
                    <p class="card-desc">ω = Δθ/Δt. RPM vs rad/s. Relación con velocidad lineal v = rω. Periodo y frecuencia.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-yellow);"><i class="fas fa-circle-notch"></i> CLASE</span>
                    <a href="#" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-yellow); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Calcula el momento de inercia de una esfera sólida de masa 5 kg y radio 0.2 metros girando sobre su eje centroidal.</span>
                </div>
            </article>

            <article class="class-card card-yellow">
                <div>
                    <span class="unit-badge" style="color:var(--physics-yellow);">MÓDULO 6.3</span>
                    <h3 class="card-title">Aceleración Angular</h3>
                    <p class="card-desc">α = Δω/Δt. Ecuaciones cinemáticas rotacionales análogas a las lineales. Aceleración centrípeta y tangencial.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-yellow);"><i class="fas fa-spinner"></i> CLASE</span>
                    <a href="#" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-yellow); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Calcula el momento de inercia de una esfera sólida de masa 5 kg y radio 0.2 metros girando sobre su eje centroidal.</span>
                </div>
            </article>

            <article class="class-card card-yellow">
                <div>
                    <span class="unit-badge" style="color:var(--physics-yellow);">MÓDULO 6.4</span>
                    <h3 class="card-title">Torque</h3>
                    <p class="card-desc">Momento de fuerza τ = rF sin θ. Brazo de palanca, equilibrio rotacional y la analogía con F = ma: τ = Iα.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-yellow);"><i class="fas fa-wrench"></i> CLASE + LAB</span>
                    <a href="#" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-yellow); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Calcula el momento de inercia de una esfera sólida de masa 5 kg y radio 0.2 metros girando sobre su eje centroidal.</span>
                </div>
            </article>

            <article class="class-card card-yellow">
                <div>
                    <span class="unit-badge" style="color:var(--physics-yellow);">MÓDULO 6.5</span>
                    <h3 class="card-title">Momento de Inercia</h3>
                    <p class="card-desc">I = Σmr². Momentos de inercia de cuerpos comunes (disco, esfera, cilindro). Teorema de ejes paralelos.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-yellow);"><i class="fas fa-circle"></i> CLASE</span>
                    <a href="#" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-yellow); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Calcula el momento de inercia de una esfera sólida de masa 5 kg y radio 0.2 metros girando sobre su eje centroidal.</span>
                </div>
            </article>

            <article class="class-card card-yellow">
                <div>
                    <span class="unit-badge" style="color:var(--physics-yellow);">MÓDULO 6.6</span>
                    <h3 class="card-title">Energía Rotacional</h3>
                    <p class="card-desc">KE_rot = ½Iω². Rodadura sin deslizamiento, combinación de energía translacional y rotacional.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-yellow);"><i class="fas fa-bolt"></i> CLASE + LAB</span>
                    <a href="#" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-yellow); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Calcula el momento de inercia de una esfera sólida de masa 5 kg y radio 0.2 metros girando sobre su eje centroidal.</span>
                </div>
            </article>
        </div>

        <!-- ══════════════════════════════════════════════════════
             UNIDAD 7 — FLUIDOS (AQUA)
             ══════════════════════════════════════════════════════ -->
        <h2 class="section-title" style="color:var(--physics-aqua); border-left-color:var(--physics-aqua); background:linear-gradient(90deg, rgba(24,255,255,0.06) 0%, transparent 100%);">
            <i class="fas fa-water section-icon"></i>
            UNIDAD 7 <small>FLUIDOS</small>
        </h2>
        <div class="modules-grid">
            <article class="class-card card-aqua">
                <div>
                    <span class="unit-badge" style="color:var(--physics-aqua);">MÓDULO 7.1</span>
                    <h3 class="card-title">Densidad</h3>
                    <p class="card-desc">ρ = m/V. Densidad de sólidos, líquidos y gases. Densidad relativa y gravedad específica.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-aqua);"><i class="fas fa-cube"></i> CLASE</span>
                    <a href="unidad7/clase7_1.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-aqua); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Determina la presión hidrostática a 50 metros bajo el nivel del mar y la fuerza de empuje sobre una esfera metálica sumergida.</span>
                </div>
            </article>

            <article class="class-card card-aqua">
                <div>
                    <span class="unit-badge" style="color:var(--physics-aqua);">MÓDULO 7.2</span>
                    <h3 class="card-title">Presión</h3>
                    <p class="card-desc">P = F/A. Presión atmosférica, manómetros, presión hidrostática P = ρgh y presión absoluta vs manométrica.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-aqua);"><i class="fas fa-compress-alt"></i> CLASE</span>
                    <a href="#" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-aqua); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Determina la presión hidrostática a 50 metros bajo el nivel del mar y la fuerza de empuje sobre una esfera metálica sumergida.</span>
                </div>
            </article>

            <article class="class-card card-aqua">
                <div>
                    <span class="unit-badge" style="color:var(--physics-aqua);">MÓDULO 7.3</span>
                    <h3 class="card-title">Principio de Pascal</h3>
                    <p class="card-desc">La presión se transmite uniformemente. Prensa hidráulica, frenos hidráulicos y ventaja mecánica.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-aqua);"><i class="fas fa-compress-arrows-alt"></i> CLASE + LAB</span>
                    <a href="#" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-aqua); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Determina la presión hidrostática a 50 metros bajo el nivel del mar y la fuerza de empuje sobre una esfera metálica sumergida.</span>
                </div>
            </article>

            <article class="class-card card-aqua">
                <div>
                    <span class="unit-badge" style="color:var(--physics-aqua);">MÓDULO 7.4</span>
                    <h3 class="card-title">Principio de Arquímedes</h3>
                    <p class="card-desc">Fuerza de empuje FB = ρfVg. Flotabilidad, condiciones de flotación y aplicaciones (barcos, submarinos).</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-aqua);"><i class="fas fa-ship"></i> CLASE + SIM</span>
                    <a href="#" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-aqua); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Determina la presión hidrostática a 50 metros bajo el nivel del mar y la fuerza de empuje sobre una esfera metálica sumergida.</span>
                </div>
            </article>

            <article class="class-card card-aqua">
                <div>
                    <span class="unit-badge" style="color:var(--physics-aqua);">MÓDULO 7.5</span>
                    <h3 class="card-title">Ecuación de Bernoulli</h3>
                    <p class="card-desc">P + ½ρv² + ρgh = constante. Efecto Venturi, sustentación aerodinámica y ecuación de continuidad.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-aqua);"><i class="fas fa-wind"></i> CLASE</span>
                    <a href="#" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-aqua); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Determina la presión hidrostática a 50 metros bajo el nivel del mar y la fuerza de empuje sobre una esfera metálica sumergida.</span>
                </div>
            </article>

            <article class="class-card card-aqua">
                <div>
                    <span class="unit-badge" style="color:var(--physics-aqua);">MÓDULO 7.6</span>
                    <h3 class="card-title">Aplicaciones de los Fluidos</h3>
                    <p class="card-desc">Viscosidad, flujo laminar vs turbulento, número de Reynolds. Aplicaciones en ingeniería y medicina.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-aqua);"><i class="fas fa-faucet"></i> CLASE + LAB</span>
                    <a href="#" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-aqua); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Determina la presión hidrostática a 50 metros bajo el nivel del mar y la fuerza de empuje sobre una esfera metálica sumergida.</span>
                </div>
            </article>
        </div>

        <!-- ══════════════════════════════════════════════════════
             UNIDAD 8 — TERMODINÁMICA (ROJO)
             ══════════════════════════════════════════════════════ -->
        <h2 class="section-title" style="color:var(--physics-red); border-left-color:var(--physics-red); background:linear-gradient(90deg, rgba(255,82,82,0.06) 0%, transparent 100%);">
            <i class="fas fa-fire section-icon"></i>
            UNIDAD 8 <small>TERMODINÁMICA</small>
        </h2>
        <div class="modules-grid">
            <article class="class-card card-red">
                <div>
                    <span class="unit-badge" style="color:var(--physics-red);">MÓDULO 8.1</span>
                    <h3 class="card-title">Temperatura y Calor</h3>
                    <p class="card-desc">Concepto de temperatura, equilibrio térmico (Ley Cero), calor como transferencia de energía y capacidad calorífica.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-red);"><i class="fas fa-temperature-high"></i> CLASE</span>
                    <a href="unidad8/clase8_1.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-red); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Calcula la eficiencia teórica de una máquina térmica de Carnot operando entre las temperaturas de 500 K y 300 K.</span>
                </div>
            </article>

            <article class="class-card card-red">
                <div>
                    <span class="unit-badge" style="color:var(--physics-red);">MÓDULO 8.2</span>
                    <h3 class="card-title">Escalas de Temperatura</h3>
                    <p class="card-desc">Celsius, Fahrenheit y Kelvin. Conversiones entre escalas, cero absoluto y puntos de referencia.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-red);"><i class="fas fa-thermometer-half"></i> CLASE + LAB</span>
                    <a href="#" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-red); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Calcula la eficiencia teórica de una máquina térmica de Carnot operando entre las temperaturas de 500 K y 300 K.</span>
                </div>
            </article>

            <article class="class-card card-red">
                <div>
                    <span class="unit-badge" style="color:var(--physics-red);">MÓDULO 8.3</span>
                    <h3 class="card-title">Dilatación Térmica</h3>
                    <p class="card-desc">Dilatación lineal (ΔL = αLΔT), superficial y volumétrica. Juntas de expansión y aplicaciones prácticas.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-red);"><i class="fas fa-expand-alt"></i> CLASE</span>
                    <a href="#" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-red); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Calcula la eficiencia teórica de una máquina térmica de Carnot operando entre las temperaturas de 500 K y 300 K.</span>
                </div>
            </article>

            <article class="class-card card-red">
                <div>
                    <span class="unit-badge" style="color:var(--physics-red);">MÓDULO 8.4</span>
                    <h3 class="card-title">Transferencia de Calor</h3>
                    <p class="card-desc">Conducción, convección y radiación. Ley de Fourier, ley de Stefan-Boltzmann y aislamiento térmico.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-red);"><i class="fas fa-arrows-alt-h"></i> CLASE + LAB</span>
                    <a href="#" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-red); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Calcula la eficiencia teórica de una máquina térmica de Carnot operando entre las temperaturas de 500 K y 300 K.</span>
                </div>
            </article>

            <article class="class-card card-red">
                <div>
                    <span class="unit-badge" style="color:var(--physics-red);">MÓDULO 8.5</span>
                    <h3 class="card-title">Leyes de la Termodinámica</h3>
                    <p class="card-desc">Primera ley (ΔU = Q - W), segunda ley (entropía), procesos termodinámicos (isotérmico, adiabático, isobárico).</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-red);"><i class="fas fa-scroll"></i> CLASE</span>
                    <a href="#" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-red); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Calcula la eficiencia teórica de una máquina térmica de Carnot operando entre las temperaturas de 500 K y 300 K.</span>
                </div>
            </article>

            <article class="class-card card-red">
                <div>
                    <span class="unit-badge" style="color:var(--physics-red);">MÓDULO 8.6</span>
                    <h3 class="card-title">Máquinas Térmicas</h3>
                    <p class="card-desc">Ciclo de Carnot, eficiencia η = W/QH, refrigeradores, bombas de calor y la imposibilidad del perpetuum mobile.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-red);"><i class="fas fa-industry"></i> CLASE + LAB</span>
                    <a href="#" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-red); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Calcula la eficiencia teórica de una máquina térmica de Carnot operando entre las temperaturas de 500 K y 300 K.</span>
                </div>
            </article>
        </div>

        <!-- ══════════════════════════════════════════════════════
             UNIDAD 9 — ELECTRICIDAD Y MAGNETISMO (VIOLETA)
             ══════════════════════════════════════════════════════ -->
        <h2 class="section-title" style="color:var(--physics-violet); border-left-color:var(--physics-violet); background:linear-gradient(90deg, rgba(124,77,255,0.06) 0%, transparent 100%);">
            <i class="fas fa-bolt section-icon"></i>
            UNIDAD 9 <small>ELECTRICIDAD Y MAGNETISMO</small>
        </h2>
        <div class="modules-grid">
            <article class="class-card card-violet">
                <div>
                    <span class="unit-badge" style="color:var(--physics-violet);">MÓDULO 9.1</span>
                    <h3 class="card-title">Carga Eléctrica</h3>
                    <p class="card-desc">Carga eléctrica, cuantización (e = 1.6×10⁻¹⁹ C), conservación de la carga y métodos de electrización.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-violet);"><i class="fas fa-circle-dot"></i> CLASE</span>
                    <a href="unidad9/clase9_1.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-violet); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Dibuja el diagrama y resuelve el circuito mixto (serie-paralelo) determinando corriente y voltaje de cada resistor individual.</span>
                </div>
            </article>

            <article class="class-card card-violet">
                <div>
                    <span class="unit-badge" style="color:var(--physics-violet);">MÓDULO 9.2</span>
                    <h3 class="card-title">Ley de Coulomb</h3>
                    <p class="card-desc">F = kq₁q₂/r². Constante de Coulomb, fuerza entre cargas puntuales y principio de superposición.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-violet);"><i class="fas fa-magnet"></i> CLASE + LAB</span>
                    <a href="#" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-violet); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Dibuja el diagrama y resuelve el circuito mixto (serie-paralelo) determinando corriente y voltaje de cada resistor individual.</span>
                </div>
            </article>

            <article class="class-card card-violet">
                <div>
                    <span class="unit-badge" style="color:var(--physics-violet);">MÓDULO 9.3</span>
                    <h3 class="card-title">Campo Eléctrico</h3>
                    <p class="card-desc">E = F/q = kQ/r². Líneas de campo, campo uniforme entre placas y simulación de campos eléctricos.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-violet);"><i class="fas fa-wave-square"></i> CLASE</span>
                    <a href="#" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-violet); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Dibuja el diagrama y resuelve el circuito mixto (serie-paralelo) determinando corriente y voltaje de cada resistor individual.</span>
                </div>
            </article>

            <article class="class-card card-violet">
                <div>
                    <span class="unit-badge" style="color:var(--physics-violet);">MÓDULO 9.4</span>
                    <h3 class="card-title">Potencial Eléctrico</h3>
                    <p class="card-desc">V = kQ/r, diferencia de potencial, relación E-V, superficies equipotenciales y energía potencial eléctrica.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-violet);"><i class="fas fa-battery-half"></i> CLASE</span>
                    <a href="#" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-violet); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Dibuja el diagrama y resuelve el circuito mixto (serie-paralelo) determinando corriente y voltaje de cada resistor individual.</span>
                </div>
            </article>

            <article class="class-card card-violet">
                <div>
                    <span class="unit-badge" style="color:var(--physics-violet);">MÓDULO 9.5</span>
                    <h3 class="card-title">Corriente Eléctrica</h3>
                    <p class="card-desc">I = ΔQ/Δt. Corriente convencional vs electrónica, conductores, semiconductores y aislantes.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-violet);"><i class="fas fa-plug"></i> CLASE</span>
                    <a href="#" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-violet); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Dibuja el diagrama y resuelve el circuito mixto (serie-paralelo) determinando corriente y voltaje de cada resistor individual.</span>
                </div>
            </article>

            <article class="class-card card-violet">
                <div>
                    <span class="unit-badge" style="color:var(--physics-violet);">MÓDULO 9.6</span>
                    <h3 class="card-title">Ley de Ohm</h3>
                    <p class="card-desc">V = IR. Resistencia eléctrica, resistividad, factores que afectan la resistencia y materiales óhmicos.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-violet);"><i class="fas fa-right-left"></i> CLASE + LAB</span>
                    <a href="#" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-violet); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Dibuja el diagrama y resuelve el circuito mixto (serie-paralelo) determinando corriente y voltaje de cada resistor individual.</span>
                </div>
            </article>

            <article class="class-card card-violet">
                <div>
                    <span class="unit-badge" style="color:var(--physics-violet);">MÓDULO 9.7</span>
                    <h3 class="card-title">Circuitos en Serie y Paralelo</h3>
                    <p class="card-desc">Resistencia equivalente, leyes de Kirchhoff, caídas de voltaje, distribución de corriente y circuitos mixtos.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-violet);"><i class="fas fa-diagram-project"></i> CLASE + SIM</span>
                    <a href="#" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-violet); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Dibuja el diagrama y resuelve el circuito mixto (serie-paralelo) determinando corriente y voltaje de cada resistor individual.</span>
                </div>
            </article>

            <article class="class-card card-violet">
                <div>
                    <span class="unit-badge" style="color:var(--physics-violet);">MÓDULO 9.8</span>
                    <h3 class="card-title">Campo Magnético</h3>
                    <p class="card-desc">Campo magnético B, fuerza de Lorentz F = qvB sin θ, campos de corrientes rectilíneas y espiras.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-violet);"><i class="fas fa-magnet"></i> CLASE</span>
                    <a href="#" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-violet); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Dibuja el diagrama y resuelve el circuito mixto (serie-paralelo) determinando corriente y voltaje de cada resistor individual.</span>
                </div>
            </article>

            <article class="class-card card-violet">
                <div>
                    <span class="unit-badge" style="color:var(--physics-violet);">MÓDULO 9.9</span>
                    <h3 class="card-title">Inducción Electromagnética</h3>
                    <p class="card-desc">Ley de Faraday (ε = -dΦ/dt), Ley de Lenz, generadores, transformadores y aplicaciones industriales.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-violet);"><i class="fas fa-rotate"></i> CLASE + LAB</span>
                    <a href="#" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-violet); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Dibuja el diagrama y resuelve el circuito mixto (serie-paralelo) determinando corriente y voltaje de cada resistor individual.</span>
                </div>
            </article>
        </div>

        <!-- ══════════════════════════════════════════════════════
             UNIDAD 10 — ONDAS Y ÓPTICA (TEAL)
             ══════════════════════════════════════════════════════ -->
        <h2 class="section-title" style="color:var(--physics-teal); border-left-color:var(--physics-teal); background:linear-gradient(90deg, rgba(100,255,218,0.06) 0%, transparent 100%);">
            <i class="fas fa-wave-square section-icon"></i>
            UNIDAD 10 <small>ONDAS Y ÓPTICA</small>
        </h2>
        <div class="modules-grid">
            <article class="class-card card-teal">
                <div>
                    <span class="unit-badge" style="color:var(--physics-teal);">MÓDULO 10.1</span>
                    <h3 class="card-title">Movimiento Ondulatorio</h3>
                    <p class="card-desc">Tipos de ondas (transversales, longitudinales), propagación, velocidad de onda y la ecuación v = fλ.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-teal);"><i class="fas fa-water"></i> CLASE</span>
                    <a href="unidad10/clase10_1.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-teal); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Investiga el efecto Doppler y resuelve el problema de frecuencia aparente para una ambulancia acercándose a un observador.</span>
                </div>
            </article>

            <article class="class-card card-teal">
                <div>
                    <span class="unit-badge" style="color:var(--physics-teal);">MÓDULO 10.2</span>
                    <h3 class="card-title">Características de las Ondas</h3>
                    <p class="card-desc">Amplitud, frecuencia, periodo, longitud de onda. Superposición, interferencia y ondas estacionarias.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-teal);"><i class="fas fa-signal"></i> CLASE + SIM</span>
                    <a href="labs/lab_ondas.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-teal); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Investiga el efecto Doppler y resuelve el problema de frecuencia aparente para una ambulancia acercándose a un observador.</span>
                </div>
            </article>

            <article class="class-card card-teal">
                <div>
                    <span class="unit-badge" style="color:var(--physics-teal);">MÓDULO 10.3</span>
                    <h3 class="card-title">Sonido</h3>
                    <p class="card-desc">Ondas sonoras, velocidad del sonido en diferentes medios, efecto Doppler, decibeles e intensidad sonora.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-teal);"><i class="fas fa-volume-high"></i> CLASE</span>
                    <a href="#" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-teal); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Investiga el efecto Doppler y resuelve el problema de frecuencia aparente para una ambulancia acercándose a un observador.</span>
                </div>
            </article>

            <article class="class-card card-teal">
                <div>
                    <span class="unit-badge" style="color:var(--physics-teal);">MÓDULO 10.4</span>
                    <h3 class="card-title">Reflexión y Refracción</h3>
                    <p class="card-desc">Ley de reflexión, Ley de Snell (n₁ sin θ₁ = n₂ sin θ₂), ángulo crítico, reflexión total interna y fibra óptica.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-teal);"><i class="fas fa-arrows-split-up-and-left"></i> CLASE + SIM</span>
                    <a href="#" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-teal); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Investiga el efecto Doppler y resuelve el problema de frecuencia aparente para una ambulancia acercándose a un observador.</span>
                </div>
            </article>

            <article class="class-card card-teal">
                <div>
                    <span class="unit-badge" style="color:var(--physics-teal);">MÓDULO 10.5</span>
                    <h3 class="card-title">Espejos y Lentes</h3>
                    <p class="card-desc">Espejos planos y curvos, lentes convergentes y divergentes. Ecuación de lentes 1/f = 1/do + 1/di y magnificación.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-teal);"><i class="fas fa-glasses"></i> CLASE + LAB</span>
                    <a href="#" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-teal); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Investiga el efecto Doppler y resuelve el problema de frecuencia aparente para una ambulancia acercándose a un observador.</span>
                </div>
            </article>

            <article class="class-card card-teal">
                <div>
                    <span class="unit-badge" style="color:var(--physics-teal);">MÓDULO 10.6</span>
                    <h3 class="card-title">Instrumentos Ópticos</h3>
                    <p class="card-desc">Microscopio, telescopio, cámara fotográfica. Poder de resolución, aberraciones y diseño óptico moderno.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-teal);"><i class="fas fa-binoculars"></i> CLASE</span>
                    <a href="#" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-teal); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Investiga el efecto Doppler y resuelve el problema de frecuencia aparente para una ambulancia acercándose a un observador.</span>
                </div>
            </article>
        </div>

        <!-- ══════════════════════════════════════════════════════
             UNIDAD 11 — FÍSICA MODERNA (ROSA)
             ══════════════════════════════════════════════════════ -->
        <h2 class="section-title" style="color:var(--physics-pink); border-left-color:var(--physics-pink); background:linear-gradient(90deg, rgba(255,64,129,0.06) 0%, transparent 100%);">
            <i class="fas fa-star section-icon"></i>
            UNIDAD 11 <small>FÍSICA MODERNA (OPCIONAL)</small>
        </h2>
        <div class="modules-grid">
            <article class="class-card card-pink">
                <div>
                    <span class="unit-badge" style="color:var(--physics-pink);">MÓDULO 11.1</span>
                    <h3 class="card-title">Teoría Cuántica</h3>
                    <p class="card-desc">Radiación del cuerpo negro, hipótesis de Planck (E = hf), dualidad onda-partícula y principio de incertidumbre de Heisenberg.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-pink);"><i class="fas fa-atom"></i> CLASE</span>
                    <a href="unidad11/clase11_1.php" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-pink); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Calcula la longitud de onda de De Broglie para un electrón moviéndose al 10% de la velocidad de la luz.</span>
                </div>
            </article>

            <article class="class-card card-pink">
                <div>
                    <span class="unit-badge" style="color:var(--physics-pink);">MÓDULO 11.2</span>
                    <h3 class="card-title">Efecto Fotoeléctrico</h3>
                    <p class="card-desc">Experimento de Einstein, función de trabajo, frecuencia umbral, fotones y la ecuación KE = hf - φ.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-pink);"><i class="fas fa-sun"></i> CLASE + SIM</span>
                    <a href="#" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-pink); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Calcula la longitud de onda de De Broglie para un electrón moviéndose al 10% de la velocidad de la luz.</span>
                </div>
            </article>

            <article class="class-card card-pink">
                <div>
                    <span class="unit-badge" style="color:var(--physics-pink);">MÓDULO 11.3</span>
                    <h3 class="card-title">Estructura Atómica</h3>
                    <p class="card-desc">Modelo de Bohr, niveles de energía, espectros atómicos, modelo cuántico del átomo y números cuánticos.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-pink);"><i class="fas fa-circle-nodes"></i> CLASE</span>
                    <a href="#" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-pink); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Calcula la longitud de onda de De Broglie para un electrón moviéndose al 10% de la velocidad de la luz.</span>
                </div>
            </article>

            <article class="class-card card-pink">
                <div>
                    <span class="unit-badge" style="color:var(--physics-pink);">MÓDULO 11.4</span>
                    <h3 class="card-title">Radiactividad</h3>
                    <p class="card-desc">Decaimiento alfa, beta y gamma. Vida media, ley de decaimiento exponencial, fisión y fusión nuclear.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-pink);"><i class="fas fa-radiation"></i> CLASE</span>
                    <a href="#" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-pink); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Calcula la longitud de onda de De Broglie para un electrón moviéndose al 10% de la velocidad de la luz.</span>
                </div>
            </article>

            <article class="class-card card-pink">
                <div>
                    <span class="unit-badge" style="color:var(--physics-pink);">MÓDULO 11.5</span>
                    <h3 class="card-title">Relatividad Especial</h3>
                    <p class="card-desc">Postulados de Einstein, dilatación del tiempo, contracción de longitud, E = mc² y paradoja de los gemelos.</p>
                </div>
                <div class="card-footer">
                    <span class="status-text" style="color:var(--physics-pink);"><i class="fas fa-rocket"></i> CLASE</span>
                    <a href="#" class="btn-launch"><i class="fas fa-rocket"></i> INICIAR</a>
                </div>
            
                <div class="card-task" style="display: none; border-top: 1px dashed rgba(255, 255, 255, 0.1); margin-top: 12px; padding-top: 12px; font-size: 0.78em;">
                    <span style="color: var(--physics-pink); font-weight: bold;"><i class="fas fa-edit"></i> TAREA:</span>
                    <span class="task-text" style="color: #a4b3c6;">Calcula la longitud de onda de De Broglie para un electrón moviéndose al 10% de la velocidad de la luz.</span>
                </div>
            </article>
        </div>

    </div>

    <!-- ═══════ FOOTER ═══════ -->
    <footer>
        <i class="fas fa-atom"></i> PHYSICSACADEMY — PLATAFORMA DE FÍSICA GENERAL <i class="fas fa-atom"></i> 2026
    </footer>

    <script src="js/physics.js"></script>
</body>

</html>
