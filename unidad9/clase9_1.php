<?php require_once '../auth.php'; ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Física 9.1 — Carga Eléctrica</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.5.0/reveal.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.5.0/theme/night.min.css">
    <link rel="stylesheet" href="../css/physics_presentation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .reveal { font-size: 28px; }
        .reveal h1,.reveal h2,.reveal h3 { text-transform:none; color:#7c4dff; text-shadow:0 0 10px rgba(124,77,255,0.3); margin-bottom:0.4em; }
        .reveal h1 { font-size:2.2em; } .reveal h2 { font-size:1.5em; }
        .reveal .slides section { text-align:left; padding:20px 0; }
        .reveal .centered { text-align:center; }
        .highlight { color:#ff5252; font-weight:bold; }
        .accent { color:#00e5ff; }
        .violet-accent { color:#7c4dff; }
        .green { color:#00e676; }
        .box { background:rgba(255,255,255,0.07); padding:18px; border-radius:10px; border:1px solid #7c4dff; margin-bottom:15px; }
        .warning-box { background:rgba(255,82,82,0.08); padding:14px; border-radius:8px; border:1px solid #ff5252; font-size:0.85em; margin-top:15px; }
        .success-box { background:rgba(0,230,118,0.08); padding:14px; border-radius:8px; border:1px solid #00e676; font-size:0.85em; margin-top:15px; }
        .flex-container { display:flex; justify-content:space-between; align-items:flex-start; gap:20px; }
        .col { flex:1; }
        .icon-large { font-size:3em; margin-bottom:15px; color:#7c4dff; }
        table { border-collapse:collapse; width:100%; font-size:0.85em; }
        th { border-bottom:2px solid #7c4dff; padding:10px; text-align:left; color:#7c4dff; }
        td { padding:10px; border-bottom:1px solid #333; }
        ul.custom-list { list-style:none; margin-left:0; padding-left:0; }
        ul.custom-list li { margin-bottom:10px; }
        ul.custom-list li i { width:25px; text-align:center; margin-right:10px; }
        .formula-highlight { background:rgba(124,77,255,0.1); padding:8px 16px; border-radius:6px; border-left:3px solid #7c4dff; font-family:monospace; font-size:1.1em; margin:10px 0; display:inline-block; }
        .notes-hint { position:absolute; bottom:8px; left:10px; font-size:0.35em; color:#444; font-family:monospace; }
        
        /* Botón Volver al Dashboard */
        .btn-back-dashboard {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 9999;
            background: rgba(10, 10, 14, 0.85);
            border: 1px solid #7c4dff;
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
            box-shadow: 0 0 10px rgba(124, 77, 255, 0.15);
        }
        .btn-back-dashboard:hover {
            background: #7c4dff;
            color: #fff;
            box-shadow: 0 0 15px rgba(124, 77, 255, 0.4);
            transform: translateY(-1px);
        }
        .btn-back-dashboard i {
            font-size: 12px;
        }
        .mission-input {
            background: #000;
            border: 1px solid #7c4dff;
            color: #7c4dff;
            padding: 10px;
            width: 100%;
            font-family: monospace;
            font-size: 0.9em;
            margin-top: 10px;
            border-radius: 4px;
        }
        .mission-btn {
            background: #7c4dff;
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
            <i class="fas fa-bolt icon-large"></i>
            <h1>Electricidad y Magnetismo</h1>
            <h3>Carga Eléctrica</h3>
            <p class="violet-accent">Unidad 9 — Módulo 9.1</p>
            <hr>
            <p><small>Física Academy | 2026</small></p>
            <aside class="notes">Bienvenidos a la Unidad 9: Electromagnetismo. Comenzaremos con la carga eléctrica, que es la propiedad que define la interacción electromagnética de la materia.</aside>
        </section>

        <!-- CARGA ELECTRICA -->
        <section>
            <h2><i class="fas fa-bolt"></i> Carga Eléctrica ($q$)</h2>
            <div class="box">
                <p>La <strong>Carga Eléctrica</strong> es una propiedad intrínseca de algunas partículas subatómicas que se manifiesta mediante fuerzas de atracción y repulsión entre ellas.</p>
            </div>
            <p>• <strong>Tipos:</strong> Positiva (protones) y Negativa (electrones).<br>• <strong>Conservación:</strong> La carga total de un sistema aislado permanece constante.<br>• <strong>Unidad de medida:</strong> Coulomb (C)</p>
            <aside class="notes">Las cargas iguales se repelen y las opuestas se atraen. La carga fundamental es la del electrón (-1.6e-19 C).</aside>
        </section>

        <!-- RESUMEN -->
        <section>
            <h2><i class="fas fa-clipboard-check"></i> Resumen</h2>
            <div class="box">
                <ul class="custom-list">
                    <li><i class="fas fa-check green"></i> La carga eléctrica puede ser positiva o negativa.</li>
                    <li><i class="fas fa-check green"></i> Las cargas del mismo signo se repelen y de distinto signo se atraen.</li>
                    <li><i class="fas fa-check green"></i> La unidad básica es el Coulomb (C).</li>
                </ul>
            </div>
            <div class="success-box">
                <i class="fas fa-arrow-right green"></i> <strong>Siguiente módulo:</strong> Ley de Coulomb — Módulo 9.2
            </div>
        </section>

        <!-- MINI MISIÓN -->
        <section>
            <h2><i class="fas fa-crosshairs highlight"></i> Mini Misión 9.1</h2>
            <div class="box">
                <p>¿Qué tipo de fuerza eléctrica (atracción o repulsión) experimentan dos cargas del mismo signo?</p>
            </div>
            <input type="text" id="mission-9-1-input" class="mission-input" placeholder="Escribe tu respuesta aquí...">
            <button onclick="checkMission9_1()" class="mission-btn">Verificar</button>
            <div id="mission-9-1-feedback" class="mission-feedback"></div>
            <script>
                function checkMission9_1() {
                    const ans = document.getElementById('mission-9-1-input').value.trim().toLowerCase();
                    const fb = document.getElementById('mission-9-1-feedback');
                    fb.style.display = 'block';
                    if (ans === 'repulsión' || ans === 'repulsion') {
                        fb.className = 'mission-feedback success-box';
                        fb.style.border = '1px solid #00e676';
                        fb.innerHTML = '<i class="fas fa-check-circle green"></i> ¡Correcto! Las cargas de igual signo se repelen (fuerza de repulsión) y las de signo opuesto se atraen.';
                    } else {
                        fb.className = 'mission-feedback warning-box';
                        fb.style.border = '1px solid #ff5252';
                        fb.innerHTML = '<i class="fas fa-times-circle highlight"></i> Incorrecto. Pista: Recuerda la ley de las cargas: polos iguales se...';
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
                <p>Diseña un circuito mixto con 5 resistores en serie-paralelo, calcula la resistencia equivalente y la potencia disipada por cada elemento.</p>
            </div>
            <div class="warning-box">
                <i class="fas fa-exclamation-triangle"></i> Recuerda resolver este problema detallando el paso a paso y subir tu resolución en formato PDF.
            </div>
        </section>

<section class="centered">
            <h1>¿Preguntas?</h1>
            <i class="fas fa-bolt icon-large"></i>
            <p>Física Academy — Módulo 9.1</p>
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
