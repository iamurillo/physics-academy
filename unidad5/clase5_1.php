<?php require_once '../auth.php'; ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Física 5.1 — Impulso</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.5.0/reveal.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.5.0/theme/night.min.css">
    <link rel="stylesheet" href="../css/physics_presentation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .reveal { font-size: 28px; }
        .reveal h1,.reveal h2,.reveal h3 { text-transform:none; color:#e040fb; text-shadow:0 0 10px rgba(224,64,251,0.3); margin-bottom:0.4em; }
        .reveal h1 { font-size:2.2em; } .reveal h2 { font-size:1.5em; }
        .reveal .slides section { text-align:left; padding:20px 0; }
        .reveal .centered { text-align:center; }
        .highlight { color:#ff5252; font-weight:bold; }
        .accent { color:#00e5ff; }
        .magenta-accent { color:#e040fb; }
        .green { color:#00e676; }
        .box { background:rgba(255,255,255,0.07); padding:18px; border-radius:10px; border:1px solid #e040fb; margin-bottom:15px; }
        .warning-box { background:rgba(255,82,82,0.08); padding:14px; border-radius:8px; border:1px solid #ff5252; font-size:0.85em; margin-top:15px; }
        .success-box { background:rgba(0,230,118,0.08); padding:14px; border-radius:8px; border:1px solid #00e676; font-size:0.85em; margin-top:15px; }
        .flex-container { display:flex; justify-content:space-between; align-items:flex-start; gap:20px; }
        .col { flex:1; }
        .icon-large { font-size:3em; margin-bottom:15px; color:#e040fb; }
        table { border-collapse:collapse; width:100%; font-size:0.85em; }
        th { border-bottom:2px solid #e040fb; padding:10px; text-align:left; color:#e040fb; }
        td { padding:10px; border-bottom:1px solid #333; }
        ul.custom-list { list-style:none; margin-left:0; padding-left:0; }
        ul.custom-list li { margin-bottom:10px; }
        ul.custom-list li i { width:25px; text-align:center; margin-right:10px; }
        .formula-highlight { background:rgba(224,64,251,0.1); padding:8px 16px; border-radius:6px; border-left:3px solid #e040fb; font-family:monospace; font-size:1.1em; margin:10px 0; display:inline-block; }
        .notes-hint { position:absolute; bottom:8px; left:10px; font-size:0.35em; color:#444; font-family:monospace; }
        .mission-input {
            background: #000;
            border: 1px solid #e040fb;
            color: #e040fb;
            padding: 10px;
            width: 100%;
            font-family: monospace;
            font-size: 0.9em;
            margin-top: 10px;
            border-radius: 4px;
        }
        .mission-btn {
            background: #e040fb;
            color: #111;
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
        
        /* Botón Volver al Dashboard */
        .btn-back-dashboard {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 9999;
            background: rgba(10, 10, 14, 0.85);
            border: 1px solid #e040fb;
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
            box-shadow: 0 0 10px rgba(224, 64, 251, 0.15);
        }
        .btn-back-dashboard:hover {
            background: #e040fb;
            color: #111;
            box-shadow: 0 0 15px rgba(224, 64, 251, 0.4);
            transform: translateY(-1px);
        }
        .btn-back-dashboard i {
            font-size: 12px;
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
            <i class="fas fa-meteor icon-large"></i>
            <h1>Cantidad de Movimiento</h1>
            <h3>Impulso</h3>
            <p class="magenta-accent">Unidad 5 — Módulo 5.1</p>
            <hr>
            <p><small>Física Academy | 2026</small></p>
            <aside class="notes">Bienvenidos a la Unidad 5: Cantidad de Movimiento. Hoy estudiaremos el Impulso mecánico, que define el cambio en el momento lineal debido a una fuerza aplicada durante un intervalo de tiempo.</aside>
        </section>

        <!-- CONCEPTO DE IMPULSO -->
        <section>
            <h2><i class="fas fa-hand-back-fist"></i> ¿Qué es el Impulso?</h2>
            <div class="box">
                <p>El <strong>Impulso ($I$)</strong> es la magnitud vectorial que mide el efecto que produce una fuerza que actúa sobre un cuerpo durante un tiempo determinado.</p>
            </div>
            <div class="formula-highlight">I = F · \Delta t</div>
            <p><strong>Unidad de medida:</strong> N·s o kg·m/s</p>
            <aside class="notes">El impulso se calcula multiplicando la fuerza promedio aplicada por el intervalo de tiempo durante el cual actúa dicha fuerza.</aside>
        </section>

        <!-- TEUREMA IMPULSO-MOMENTO -->
        <section>
            <h2><i class="fas fa-arrow-trend-up"></i> Teorema del Impulso y Cantidad de Movimiento</h2>
            <div class="box">
                <p>El impulso aplicado a un cuerpo es igual al cambio en su cantidad de movimiento (momento lineal).</p>
            </div>
            <div class="formula-highlight">I = \Delta p = p_f - p_i = m(v_f - v_i)</div>
            <aside class="notes">Este teorema explica por qué los airbags en los autos previenen lesiones: aumentan el tiempo de colisión, lo que reduce la fuerza promedio necesaria para detener el cuerpo.</aside>
        </section>

        <!-- RESUMEN -->
        <section>
            <h2><i class="fas fa-clipboard-check"></i> Resumen</h2>
            <div class="box">
                <ul class="custom-list">
                    <li><i class="fas fa-check green"></i> El impulso es fuerza multiplicada por el tiempo de aplicación.</li>
                    <li><i class="fas fa-check green"></i> Provoca un cambio directo en la cantidad de movimiento del objeto.</li>
                    <li><i class="fas fa-check green"></i> Un mayor tiempo de impacto reduce la fuerza de colisión para el mismo cambio de momento.</li>
                </ul>
            </div>
            <div class="success-box">
                <i class="fas fa-arrow-right green"></i> <strong>Siguiente módulo:</strong> Momento Lineal — Módulo 5.2
            </div>
        </section>

        <!-- MINI MISIÓN -->
        <section>
            <h2><i class="fas fa-crosshairs highlight"></i> Mini Misión 5.1</h2>
            <div class="box">
                <p>Si una fuerza constante de 20 N se aplica sobre una pelota durante un tiempo de 0.5 segundos, ¿cuál es la magnitud del impulso en N·s recibido por la pelota?</p>
            </div>
            <input type="text" id="mission-5-1-input" class="mission-input" placeholder="Escribe tu respuesta numérica aquí...">
            <button onclick="checkMission5_1()" class="mission-btn">Verificar</button>
            <div id="mission-5-1-feedback" class="mission-feedback"></div>
            <script>
                function checkMission5_1() {
                    const ans = document.getElementById('mission-5-1-input').value.trim();
                    const fb = document.getElementById('mission-5-1-feedback');
                    fb.style.display = 'block';
                    if (ans === '10') {
                        fb.className = 'mission-feedback success-box';
                        fb.style.border = '1px solid #00e676';
                        fb.innerHTML = '<i class="fas fa-check-circle green"></i> ¡Correcto! I = F · \\Delta t = 20 N × 0.5 s = 10 N·s.';
                    } else {
                        fb.className = 'mission-feedback warning-box';
                        fb.style.border = '1px solid #ff5252';
                        fb.innerHTML = '<i class="fas fa-times-circle highlight"></i> Incorrecto. Pista: Multiplica la fuerza por el intervalo de tiempo.';
                    }
                }
            </script>
        </section>

        <!-- CIERRE -->
        <!-- DIAPOSITIVA DE TAREA -->
        <section class="homework-slide">
            <h2><i class="fas fa-edit highlight"></i> Tarea de la Unidad</h2>
            <div class="box">
                <p><strong>Actividad de Aprendizaje:</strong></p>
                <p>Calcula la velocidad final de dos esferas (2 kg y 3 kg) tras una colisión completamente inelástica si se movían en sentidos opuestos.</p>
            </div>
            <div class="warning-box">
                <i class="fas fa-exclamation-triangle"></i> Recuerda resolver este problema detallando el paso a paso y subir tu resolución en formato PDF.
            </div>
        </section>

<section class="centered">
            <h1>¿Preguntas?</h1>
            <i class="fas fa-meteor icon-large"></i>
            <p>Física Academy — Módulo 5.1</p>
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
<div class="notes-hint">Presiona 'S' para notas del orador</div>
</body>
</html>
