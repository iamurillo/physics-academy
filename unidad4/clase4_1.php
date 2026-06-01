<?php require_once '../auth.php'; ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Física 4.1 — Trabajo Mecánico</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.5.0/reveal.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.5.0/theme/night.min.css">
    <link rel="stylesheet" href="../css/physics_presentation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .reveal { font-size: 28px; }
        .reveal h1,.reveal h2,.reveal h3 { text-transform:none; color:#ff9100; text-shadow:0 0 10px rgba(255,145,0,0.3); margin-bottom:0.4em; }
        .reveal h1 { font-size:2.2em; } .reveal h2 { font-size:1.5em; }
        .reveal .slides section { text-align:left; padding:20px 0; }
        .reveal .centered { text-align:center; }
        .highlight { color:#ff5252; font-weight:bold; }
        .accent { color:#00e5ff; }
        .orange-accent { color:#ff9100; }
        .green { color:#00e676; }
        .box { background:rgba(255,255,255,0.07); padding:18px; border-radius:10px; border:1px solid #ff9100; margin-bottom:15px; }
        .warning-box { background:rgba(255,82,82,0.08); padding:14px; border-radius:8px; border:1px solid #ff5252; font-size:0.85em; margin-top:15px; }
        .success-box { background:rgba(0,230,118,0.08); padding:14px; border-radius:8px; border:1px solid #00e676; font-size:0.85em; margin-top:15px; }
        .flex-container { display:flex; justify-content:space-between; align-items:flex-start; gap:20px; }
        .col { flex:1; }
        .icon-large { font-size:3em; margin-bottom:15px; color:#ff9100; }
        table { border-collapse:collapse; width:100%; font-size:0.85em; }
        th { border-bottom:2px solid #ff9100; padding:10px; text-align:left; color:#ff9100; }
        td { padding:10px; border-bottom:1px solid #333; }
        ul.custom-list { list-style:none; margin-left:0; padding-left:0; }
        ul.custom-list li { margin-bottom:10px; }
        ul.custom-list li i { width:25px; text-align:center; margin-right:10px; }
        .formula-highlight { background:rgba(255,145,0,0.1); padding:8px 16px; border-radius:6px; border-left:3px solid #ff9100; font-family:monospace; font-size:1.1em; margin:10px 0; display:inline-block; }
        .notes-hint { position:absolute; bottom:8px; left:10px; font-size:0.35em; color:#444; font-family:monospace; }
        .mission-input {
            background: #000;
            border: 1px solid #ff9100;
            color: #ff9100;
            padding: 10px;
            width: 100%;
            font-family: monospace;
            font-size: 0.9em;
            margin-top: 10px;
            border-radius: 4px;
        }
        .mission-btn {
            background: #ff9100;
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
            border: 1px solid #ff9100;
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
            box-shadow: 0 0 10px rgba(255, 145, 0, 0.15);
        }
        .btn-back-dashboard:hover {
            background: #ff9100;
            color: #111;
            box-shadow: 0 0 15px rgba(255, 145, 0, 0.4);
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
            <i class="fas fa-bolt icon-large"></i>
            <h1>Trabajo y Energía</h1>
            <h3>Trabajo Mecánico</h3>
            <p class="orange-accent">Unidad 4 — Módulo 4.1</p>
            <hr>
            <p><small>Física Academy | 2026</small></p>
            <aside class="notes">Bienvenidos al módulo 4.1: Trabajo Mecánico. Aquí veremos cómo la fuerza y la distancia recorrida se relacionan para transferir energía.</aside>
        </section>

        <!-- CONCEPTO DE TRABAJO -->
        <section>
            <h2><i class="fas fa-hammer"></i> Trabajo Mecánico ($W$)</h2>
            <div class="box">
                <p>El <strong>Trabajo Mecánico</strong> es una magnitud escalar que mide la transferencia de energía realizada cuando una fuerza actúa sobre un cuerpo y produce un desplazamiento.</p>
            </div>
            <div class="formula-highlight">W = F · d · \cos \theta</div>
            <p><strong>Unidad de medida:</strong> Joule (J) = N·m</p>
            <aside class="notes">El trabajo requiere dos cosas: que haya una fuerza y que haya un desplazamiento. Si empujas una pared muy fuerte pero no se mueve, físicamente no has hecho ningún trabajo.</aside>
        </section>

        <!-- CASOS DE TRABAJO -->
        <section>
            <h2><i class="fas fa-arrows-alt-h"></i> Casos según el Ángulo ($\theta$)</h2>
            <ul class="custom-list">
                <li class="fragment"><i class="fas fa-plus-circle green"></i> <strong>Trabajo Positivo ($\theta = 0^\circ$):</strong> La fuerza ayuda al movimiento ($W = Fd$).</li>
                <li class="fragment"><i class="fas fa-minus-circle highlight"></i> <strong>Trabajo Negativo ($\theta = 180^\circ$):</strong> La fuerza se opone al movimiento ($W = -Fd$).</li>
                <li class="fragment"><i class="fas fa-dot-circle accent"></i> <strong>Trabajo Nulo ($\theta = 90^\circ$):</strong> La fuerza es perpendicular al movimiento ($W = 0$).</li>
            </ul>
            <aside class="notes">La fuerza de gravedad no realiza trabajo sobre una persona que camina horizontalmente porque el ángulo es de 90 grados.</aside>
        </section>

        <!-- RESUMEN -->
        <section>
            <h2><i class="fas fa-clipboard-check"></i> Resumen</h2>
            <div class="box">
                <ul class="custom-list">
                    <li><i class="fas fa-check green"></i> Trabajo ($W$) requiere fuerza y desplazamiento en la misma dirección.</li>
                    <li><i class="fas fa-check green"></i> Se mide en Joules ($J$).</li>
                    <li><i class="fas fa-check green"></i> Puede ser positivo, negativo o nulo según el ángulo de aplicación.</li>
                </ul>
            </div>
            <div class="success-box">
                <i class="fas fa-arrow-right green"></i> <strong>Siguiente módulo:</strong> Potencia — Módulo 4.2
            </div>
        </section>

        <!-- MINI MISIÓN -->
        <section>
            <h2><i class="fas fa-crosshairs highlight"></i> Mini Misión 4.1</h2>
            <div class="box">
                <p>Si empujas un bloque horizontalmente con una fuerza constante de 10 N y este se desplaza una distancia de 5 metros en la misma dirección de la fuerza, ¿cuánto trabajo realizas en Joules?</p>
            </div>
            <input type="text" id="mission-4-1-input" class="mission-input" placeholder="Escribe tu respuesta numérica aquí...">
            <button onclick="checkMission4_1()" class="mission-btn">Verificar</button>
            <div id="mission-4-1-feedback" class="mission-feedback"></div>
            <script>
                function checkMission4_1() {
                    const ans = document.getElementById('mission-4-1-input').value.trim();
                    const fb = document.getElementById('mission-4-1-feedback');
                    fb.style.display = 'block';
                    if (ans === '50') {
                        fb.className = 'mission-feedback success-box';
                        fb.style.border = '1px solid #00e676';
                        fb.innerHTML = '<i class="fas fa-check-circle green"></i> ¡Correcto! W = F · d = 10 N × 5 m = 50 J.';
                    } else {
                        fb.className = 'mission-feedback warning-box';
                        fb.style.border = '1px solid #ff5252';
                        fb.innerHTML = '<i class="fas fa-times-circle highlight"></i> Incorrecto. Pista: Multiplica la magnitud de la fuerza por el desplazamiento.';
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
                <p>Resuelve el problema de la montaña rusa: calcula la velocidad de un carrito en tres puntos diferentes usando el principio de conservación de la energía.</p>
            </div>
            <div class="warning-box">
                <i class="fas fa-exclamation-triangle"></i> Recuerda resolver este problema detallando el paso a paso y subir tu resolución en formato PDF.
            </div>
        </section>

<section class="centered">
            <h1>¿Preguntas?</h1>
            <i class="fas fa-bolt icon-large"></i>
            <p>Física Academy — Módulo 4.1</p>
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
