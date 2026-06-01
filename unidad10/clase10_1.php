<?php require_once '../auth.php'; ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Física 10.1 — Movimiento Ondulatorio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.5.0/reveal.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.5.0/theme/night.min.css">
    <link rel="stylesheet" href="../css/physics_presentation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .reveal { font-size: 28px; }
        .reveal h1,.reveal h2,.reveal h3 { text-transform:none; color:#64ffda; text-shadow:0 0 10px rgba(100,255,218,0.3); margin-bottom:0.4em; }
        .reveal h1 { font-size:2.2em; } .reveal h2 { font-size:1.5em; }
        .reveal .slides section { text-align:left; padding:20px 0; }
        .reveal .centered { text-align:center; }
        .highlight { color:#ff5252; font-weight:bold; }
        .accent { color:#3d5afe; }
        .teal-accent { color:#64ffda; }
        .green { color:#00e676; }
        .box { background:rgba(255,255,255,0.07); padding:18px; border-radius:10px; border:1px solid #64ffda; margin-bottom:15px; }
        .warning-box { background:rgba(255,82,82,0.08); padding:14px; border-radius:8px; border:1px solid #ff5252; font-size:0.85em; margin-top:15px; }
        .success-box { background:rgba(0,230,118,0.08); padding:14px; border-radius:8px; border:1px solid #00e676; font-size:0.85em; margin-top:15px; }
        .flex-container { display:flex; justify-content:space-between; align-items:flex-start; gap:20px; }
        .col { flex:1; }
        .icon-large { font-size:3em; margin-bottom:15px; color:#64ffda; }
        table { border-collapse:collapse; width:100%; font-size:0.85em; }
        th { border-bottom:2px solid #64ffda; padding:10px; text-align:left; color:#64ffda; }
        td { padding:10px; border-bottom:1px solid #333; }
        ul.custom-list { list-style:none; margin-left:0; padding-left:0; }
        ul.custom-list li { margin-bottom:10px; }
        ul.custom-list li i { width:25px; text-align:center; margin-right:10px; }
        .formula-highlight { background:rgba(100,255,218,0.1); padding:8px 16px; border-radius:6px; border-left:3px solid #64ffda; font-family:monospace; font-size:1.1em; margin:10px 0; display:inline-block; }
        .notes-hint { position:absolute; bottom:8px; left:10px; font-size:0.35em; color:#444; font-family:monospace; }
        
        /* Botón Volver al Dashboard */
        .btn-back-dashboard {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 9999;
            background: rgba(10, 10, 14, 0.85);
            border: 1px solid #64ffda;
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
            box-shadow: 0 0 10px rgba(100, 255, 218, 0.15);
        }
        .btn-back-dashboard:hover {
            background: #64ffda;
            color: #111;
            box-shadow: 0 0 15px rgba(100, 255, 218, 0.4);
            transform: translateY(-1px);
        }
        .btn-back-dashboard i {
            font-size: 12px;
        }
        .mission-input {
            background: #000;
            border: 1px solid #64ffda;
            color: #64ffda;
            padding: 10px;
            width: 100%;
            font-family: monospace;
            font-size: 0.9em;
            margin-top: 10px;
            border-radius: 4px;
        }
        .mission-btn {
            background: #64ffda;
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
            <i class="fas fa-wave-square icon-large"></i>
            <h1>Ondas y Óptica</h1>
            <h3>Movimiento Ondulatorio</h3>
            <p class="teal-accent">Unidad 10 — Módulo 10.1</p>
            <hr>
            <p><small>Física Academy | 2026</small></p>
            <aside class="notes">Bienvenidos a la Unidad 10: Ondas y Óptica. Hoy iniciaremos estudiando el Movimiento Ondulatorio y cómo la energía viaja a través del espacio sin transportar materia.</aside>
        </section>

        <!-- CONCEPTO DE ONDAS -->
        <section>
            <h2><i class="fas fa-water"></i> ¿Qué es una Onda?</h2>
            <div class="box">
                <p>Una <strong>Onda</strong> es una perturbación que se propaga a través del espacio o de un medio material transportando <span class="teal-accent">energía</span> pero sin transportar <span class="highlight">materia</span>.</p>
            </div>
            <p>• <strong>Mecánicas:</strong> Requieren un medio elástico (e.g. sonido, ondas en el agua).<br>• <strong>Electromagnéticas:</strong> Pueden viajar por el vacío (e.g. luz, WiFi, rayos X).</p>
            <aside class="notes">Cuando una ola viaja en el océano, el agua sube y baja pero permanece en su lugar promedio; solo la energía del viento original es la que se desplaza.</aside>
        </section>

        <!-- RESUMEN -->
        <section>
            <h2><i class="fas fa-clipboard-check"></i> Resumen</h2>
            <div class="box">
                <ul class="custom-list">
                    <li><i class="fas fa-check green"></i> Las ondas transportan energía sin transferencia física de materia.</li>
                    <li><i class="fas fa-check green"></i> Las ondas mecánicas necesitan un medio, las electromagnéticas no.</li>
                    <li><i class="fas fa-check green"></i> Su velocidad depende de las propiedades físicas del medio por el que viajan.</li>
                </ul>
            </div>
            <div class="success-box">
                <i class="fas fa-arrow-right green"></i> <strong>Siguiente módulo:</strong> Características de las Ondas — Módulo 10.2
            </div>
        </section>

        <!-- MINI MISIÓN -->
        <section>
            <h2><i class="fas fa-crosshairs highlight"></i> Mini Misión 10.1</h2>
            <div class="box">
                <p>¿Qué transporta una onda a través del espacio sin transportar materia?</p>
            </div>
            <input type="text" id="mission-10-1-input" class="mission-input" placeholder="Escribe tu respuesta aquí...">
            <button onclick="checkMission10_1()" class="mission-btn">Verificar</button>
            <div id="mission-10-1-feedback" class="mission-feedback"></div>
            <script>
                function checkMission10_1() {
                    const ans = document.getElementById('mission-10-1-input').value.trim().toLowerCase();
                    const fb = document.getElementById('mission-10-1-feedback');
                    fb.style.display = 'block';
                    if (ans === 'energía' || ans === 'energia') {
                        fb.className = 'mission-feedback success-box';
                        fb.style.border = '1px solid #00e676';
                        fb.innerHTML = '<i class="fas fa-check-circle green"></i> ¡Correcto! Las ondas son portadoras fundamentales de energía a través del espacio sin necesidad de arrastrar masa consigo.';
                    } else {
                        fb.className = 'mission-feedback warning-box';
                        fb.style.border = '1px solid #ff5252';
                        fb.innerHTML = '<i class="fas fa-times-circle highlight"></i> Incorrecto. Pista: Empieza con "E" y es la capacidad para realizar un trabajo.';
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
                <p>Determina la frecuencia percibida por un observador en reposo si una fuente sonora de 440 Hz se aleja a una velocidad constante de 25 m/s.</p>
            </div>
            <div class="warning-box">
                <i class="fas fa-exclamation-triangle"></i> Recuerda resolver este problema detallando el paso a paso y subir tu resolución en formato PDF.
            </div>
        </section>

<section class="centered">
            <h1>¿Preguntas?</h1>
            <i class="fas fa-wave-square icon-large"></i>
            <p>Física Academy — Módulo 10.1</p>
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
