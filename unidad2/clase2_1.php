<?php require_once '../auth.php'; ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Física 2.1 — Movimiento Rectilíneo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.5.0/reveal.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.5.0/theme/night.min.css">
    <link rel="stylesheet" href="../css/physics_presentation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .reveal { font-size: 28px; }
        .reveal h1,.reveal h2,.reveal h3 { text-transform:none; color:#3d5afe; text-shadow:0 0 10px rgba(61,90,254,0.3); margin-bottom:0.4em; }
        .reveal h1 { font-size:2.2em; } .reveal h2 { font-size:1.5em; }
        .reveal .slides section { text-align:left; padding:20px 0; }
        .reveal .centered { text-align:center; }
        .highlight { color:#ff5252; font-weight:bold; }
        .accent { color:#00e5ff; }
        .indigo-accent { color:#3d5afe; }
        .green { color:#00e676; }
        .orange { color:#ff9100; }
        .box { background:rgba(255,255,255,0.07); padding:18px; border-radius:10px; border:1px solid #3d5afe; margin-bottom:15px; }
        .warning-box { background:rgba(255,82,82,0.08); padding:14px; border-radius:8px; border:1px solid #ff5252; font-size:0.85em; margin-top:15px; }
        .success-box { background:rgba(0,230,118,0.08); padding:14px; border-radius:8px; border:1px solid #00e676; font-size:0.85em; margin-top:15px; }
        .flex-container { display:flex; justify-content:space-between; align-items:flex-start; gap:20px; }
        .col { flex:1; }
        .icon-large { font-size:3em; margin-bottom:15px; color:#3d5afe; }
        table { border-collapse:collapse; width:100%; font-size:0.85em; }
        th { border-bottom:2px solid #3d5afe; padding:10px; text-align:left; color:#3d5afe; }
        td { padding:10px; border-bottom:1px solid #333; }
        ul.custom-list { list-style:none; margin-left:0; padding-left:0; }
        ul.custom-list li { margin-bottom:10px; }
        ul.custom-list li i { width:25px; text-align:center; margin-right:10px; }
        .formula-highlight { background:rgba(61,90,254,0.1); padding:8px 16px; border-radius:6px; border-left:3px solid #3d5afe; font-family:monospace; font-size:1.1em; margin:10px 0; display:inline-block; }
        .notes-hint { position:absolute; bottom:8px; left:10px; font-size:0.35em; color:#444; font-family:monospace; }
        
        /* Botón Volver al Dashboard */
        .btn-back-dashboard {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 9999;
            background: rgba(10, 10, 14, 0.85);
            border: 1px solid #3d5afe;
            color: #e8ecf4;
            padding: 8px 14px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            text-decoration: none;
            border-radius: 4px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 0 10px rgba(61, 90, 254, 0.15);
        }
        .btn-back-dashboard:hover {
            background: #3d5afe;
            color: #fff;
            box-shadow: 0 0 15px rgba(61, 90, 254, 0.4);
            transform: translateY(-1px);
        }
        .btn-back-dashboard i {
            font-size: 12px;
        }
        
        .mission-input {
            background: #000;
            border: 1px solid #3d5afe;
            color: #3d5afe;
            padding: 10px;
            width: 100%;
            font-family: monospace;
            font-size: 0.9em;
            margin-top: 10px;
            border-radius: 4px;
        }
        .mission-btn {
            background: #3d5afe;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-weight: bold;
            font-family: sans-serif;
            margin-top: 10px;
            border-radius: 4px;
        }
        .mission-feedback {
            margin-top: 10px;
            padding: 8px;
            border-radius: 4px;
            font-size: 0.85em;
            display: none;
        }
    </style>
</head>
<body>
<a href="../dashboard.php" class="btn-back-dashboard">
    <i class="fas fa-arrow-left"></i> VOLVER AL PORTAL
</a>
<div class="reveal">
    <div class="slides">

        <!-- PORTADA -->
        
        

<section class="centered">
            <i class="fas fa-arrow-right icon-large"></i>
            <h1>Cinemática</h1>
            <h3>Movimiento Rectilíneo</h3>
            <p class="indigo-accent">Unidad 2 — Módulo 2.1</p>
            <hr>
            <p><small>Física Academy | 2026</small></p>
        </section>

        <!-- ¿QUÉ ES LA CINEMÁTICA? -->
        <section>
            <h2><i class="fas fa-tachometer-alt"></i> ¿Qué es la Cinemática?</h2>
            <div class="box">
                <p>La <strong>Cinemática</strong> es la rama de la física que estudia el <span class="indigo-accent">movimiento</span> de los objetos sin considerar las causas (fuerzas) que lo producen.</p>
            </div>
            <p>Se enfoca en describir cómo cambia la posición con respecto al tiempo.</p>
            <div class="fragment success-box">
                <i class="fas fa-lightbulb green"></i> <strong>Concepto clave:</strong> El movimiento siempre es relativo y requiere de un <strong>sistema de referencia</strong>.
            </div>
        </section>

        <!-- MARCOS DE REFERENCIA -->
        <section>
            <h2><i class="fas fa-crosshairs"></i> Marcos de Referencia</h2>
            <p>Un sistema de referencia es un punto físico y un conjunto de coordenadas desde el cual medimos la posición de un cuerpo:</p>
            <ul class="custom-list">
                <li class="fragment"><i class="fas fa-check-circle indigo-accent"></i> <strong>Unidimensional (1D):</strong> Una línea recta (e.g. movimiento de un auto en una carretera recta).</li>
                <li class="fragment"><i class="fas fa-check-circle indigo-accent"></i> <strong>Bidimensional (2D):</strong> Un plano xy (e.g. tiro parabólico, órbitas).</li>
                <li class="fragment"><i class="fas fa-check-circle indigo-accent"></i> <strong>Tridimensional (3D):</strong> Espacio xyz (e.g. el vuelo de una mosca).</li>
            </ul>
        </section>

        <!-- POSICIÓN Y TRAYECTORIA -->
        <section>
            <h2><i class="fas fa-route"></i> Posición y Trayectoria</h2>
            <ul class="custom-list">
                <li><strong>Posición ($x$):</strong> Ubicación de un objeto respecto al origen del sistema de referencia.</li>
                <li><strong>Trayectoria:</strong> La línea o camino geométrico que describe el cuerpo al moverse.</li>
            </ul>
            <div class="box fragment" style="margin-top:15px;">
                <h4 style="color:var(--physics-indigo); margin-top:0;">Tipos de trayectoria:</h4>
                <p>• <strong>Rectilínea:</strong> Línea recta.<br>• <strong>Curvilínea:</strong> Curva (circular, elíptica, parabólica, etc.).</p>
            </div>
        </section>

        <!-- RESUMEN -->
        <section>
            <h2><i class="fas fa-clipboard-check"></i> Resumen</h2>
            <div class="box">
                <ul class="custom-list">
                    <li><i class="fas fa-check green"></i> La cinemática describe el movimiento de los cuerpos.</li>
                    <li><i class="fas fa-check green"></i> Se requiere de un marco de referencia para medir.</li>
                    <li><i class="fas fa-check green"></i> La trayectoria es el camino geométrico recorrido.</li>
                </ul>
            </div>
            <div class="success-box">
                <i class="fas fa-arrow-right green"></i> <strong>Siguiente módulo:</strong> Distancia y Desplazamiento — Módulo 2.2
            </div>
        </section>

        <!-- MINI MISIÓN -->
        <section>
            <h2><i class="fas fa-crosshairs highlight"></i> Mini Misión 2.1</h2>
            <div class="box">
                <p>Si medimos el movimiento de un tren que viaja por una vía completamente recta, ¿cuántas dimensiones de coordenadas (1D, 2D, o 3D) requerimos para su sistema de referencia?</p>
            </div>
            <input type="text" id="mission-2-1-input" class="mission-input" placeholder="Escribe tu respuesta aquí...">
            <button onclick="checkMission2_1()" class="mission-btn">Verificar</button>
            <div id="mission-2-1-feedback" class="mission-feedback"></div>
            <script>
                function checkMission2_1() {
                    const ans = document.getElementById('mission-2-1-input').value.trim().toLowerCase();
                    const fb = document.getElementById('mission-2-1-feedback');
                    fb.style.display = 'block';
                    if (ans === '1d' || ans === 'una' || ans === '1') {
                        fb.className = 'mission-feedback success-box';
                        fb.style.border = '1px solid #00e676';
                        fb.innerHTML = '<i class="fas fa-check-circle green"></i> ¡Correcto! Solo necesitamos una dimensión lineal (coordenada x) ya que el movimiento es rectilíneo unidimensional.';
                    } else {
                        fb.className = 'mission-feedback warning-box';
                        fb.style.border = '1px solid #ff5252';
                        fb.innerHTML = '<i class="fas fa-times-circle highlight"></i> Incorrecto. Pista: Es a lo largo de una única línea recta recta.';
                    }
                }
            </script>
        </section>

        <!-- PREGUNTAS -->
        <!-- DIAPOSITIVA DE TAREA -->
        <section class="homework-slide">
            <h2><i class="fas fa-edit highlight"></i> Tarea de la Unidad</h2>
            <div class="box">
                <p><strong>Actividad de Aprendizaje:</strong></p>
                <p>Grafica las curvas de Posición vs Tiempo (x-t) y Velocidad vs Tiempo (v-t) para un objeto en caída libre desde 50 metros de altura.</p>
            </div>
            <div class="warning-box">
                <i class="fas fa-exclamation-triangle"></i> Recuerda resolver este problema detallando el paso a paso y subir tu resolución en formato PDF.
            </div>
        </section>

<section class="centered">
            <h1>¿Preguntas?</h1>
            <i class="fas fa-arrow-right icon-large"></i>
            <p>Física Academy — Módulo 2.1</p>
        </section>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.5.0/reveal.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.5.0/plugin/notes/notes.min.js"></script>
<script>
    
    // Ocultar diapositiva de tarea si está desactivado en el localStorage
    if (localStorage.getItem('physics_show_tasks') !== 'true') {
        const hw = document.querySelector('.homework-slide');
        if (hw) hw.remove();
    }
Reveal.initialize({
        hash: false, history: false,
        plugins: [RevealNotes],
        slideNumber: true, controls: true, progress: true, center: true,
        transition: 'slide'
    });
</script>
</body>
</html>
