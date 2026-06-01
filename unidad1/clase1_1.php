<?php require_once '../auth.php'; ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Física 1.1 — Concepto e Importancia de la Física</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.5.0/reveal.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.5.0/theme/night.min.css">
    <link rel="stylesheet" href="../css/physics_presentation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .reveal { font-size: 28px; }
        .reveal h1,.reveal h2,.reveal h3 { text-transform:none; color:#00e5ff; text-shadow:0 0 10px rgba(0,229,255,0.3); margin-bottom:0.4em; }
        .reveal h1 { font-size:2.2em; } .reveal h2 { font-size:1.5em; }
        .reveal .slides section { text-align:left; padding:20px 0; }
        .reveal .centered { text-align:center; }
        .highlight { color:#ff5252; font-weight:bold; }
        .accent { color:#3d5afe; }
        .green { color:#00e676; }
        .orange { color:#ff9100; }
        .box { background:rgba(255,255,255,0.07); padding:18px; border-radius:10px; border:1px solid #00e5ff; margin-bottom:15px; }
        .warning-box { background:rgba(255,82,82,0.08); padding:14px; border-radius:8px; border:1px solid #ff5252; font-size:0.85em; margin-top:15px; }
        .success-box { background:rgba(0,230,118,0.08); padding:14px; border-radius:8px; border:1px solid #00e676; font-size:0.85em; margin-top:15px; }
        .flex-container { display:flex; justify-content:space-between; align-items:flex-start; gap:20px; }
        .col { flex:1; }
        .icon-large { font-size:3em; margin-bottom:15px; color:#00e5ff; }
        table { border-collapse:collapse; width:100%; font-size:0.85em; }
        th { border-bottom:2px solid #00e5ff; padding:10px; text-align:left; color:#00e5ff; }
        td { padding:10px; border-bottom:1px solid #333; }
        ul.custom-list { list-style:none; margin-left:0; padding-left:0; }
        ul.custom-list li { margin-bottom:10px; }
        ul.custom-list li i { width:25px; text-align:center; margin-right:10px; }
        .formula-highlight { background:rgba(0,229,255,0.1); padding:8px 16px; border-radius:6px; border-left:3px solid #00e5ff; font-family:monospace; font-size:1.1em; margin:10px 0; display:inline-block; }
        .notes-hint { position:absolute; bottom:8px; left:10px; font-size:0.35em; color:#444; font-family:monospace; }
        
        /* Botón Volver al Dashboard */
        .btn-back-dashboard {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 9999;
            background: rgba(10, 10, 14, 0.85);
            border: 1px solid #00e5ff;
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
            box-shadow: 0 0 10px rgba(0, 229, 255, 0.15);
        }
        .btn-back-dashboard:hover {
            background: #00e5ff;
            color: #111;
            box-shadow: 0 0 15px rgba(0, 229, 255, 0.4);
            transform: translateY(-1px);
        }
        .btn-back-dashboard i {
            font-size: 12px;
        }
        .mission-input {
            background: #000;
            border: 1px solid #00e5ff;
            color: #00e5ff;
            padding: 10px;
            width: 100%;
            font-family: monospace;
            font-size: 0.9em;
            margin-top: 10px;
            border-radius: 4px;
        }
        .mission-btn {
            background: #00e5ff;
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
            <i class="fas fa-atom icon-large"></i>
            <h1>Física General</h1>
            <h3>Concepto e Importancia de la Física</h3>
            <p class="accent">Unidad 1 — Módulo 1.1</p>
            <hr>
            <p><small>Física General | Semestre 2026</small></p>
            <aside class="notes">Bienvenidos al curso de Física General. En esta primera sesión entenderemos qué es la Física, por qué es importante y cómo se relaciona con todas las áreas de la ingeniería.</aside>
        </section>

        <!-- ¿QUÉ ES LA FÍSICA? -->
        <section>
            <h2><i class="fas fa-atom"></i> ¿Qué es la Física?</h2>
            <div class="box">
                <p>La <strong>Física</strong> es la ciencia natural que estudia la <span class="accent">materia</span>, la <span class="accent">energía</span>, el <span class="accent">espacio</span> y el <span class="accent">tiempo</span>, así como las interacciones fundamentales entre ellos.</p>
            </div>
            <p>Del griego <em>φύσις</em> (physis) = <strong>naturaleza</strong>.</p>
            <div class="fragment success-box">
                <i class="fas fa-lightbulb green"></i> <strong>Objetivo:</strong> Describir y predecir el comportamiento del universo mediante leyes matemáticas.
            </div>
            <aside class="notes">La Física busca encontrar las leyes fundamentales que rigen el universo. Todo lo que nos rodea, desde la caída de una manzana hasta el funcionamiento de un GPS, se explica con Física.</aside>
        </section>

        <!-- RAMAS DE LA FÍSICA -->
        <section>
            <h2><i class="fas fa-project-diagram"></i> Ramas de la Física</h2>
            <div class="flex-container">
                <div class="col">
                    <h3 style="font-size:0.9em;">Física Clásica</h3>
                    <ul class="custom-list" style="font-size:0.8em; margin-bottom:10px;">
                        <li><i class="fas fa-tachometer-alt accent"></i> <strong>Mecánica</strong> — movimiento y fuerzas</li>
                        <li><i class="fas fa-fire orange"></i> <strong>Termodinámica</strong> — calor y energía</li>
                        <li><i class="fas fa-bolt" style="color:#ffea00;"></i> <strong>Electromagnetismo</strong> — electromagnetismo</li>
                    </ul>
                    <h3 style="font-size:0.9em;">Física Moderna</h3>
                    <ul class="custom-list" style="font-size:0.8em;">
                        <li><i class="fas fa-atom" style="color:#e040fb;"></i> <strong>Mecánica Cuántica</strong> — escala atómica</li>
                        <li><i class="fas fa-rocket highlight"></i> <strong>Relatividad</strong> — espaciotiempo</li>
                    </ul>
                </div>
                <div class="col" style="text-align: center;">
                    <img src="../images/ramas_fisica.png" style="max-height: 250px; border-radius: 8px; border: 1px solid rgba(0, 229, 255, 0.3); box-shadow: 0 0 15px rgba(0, 229, 255, 0.25); animation: floatImage 4s ease-in-out infinite;">
                </div>
            </div>
            <style>
                @keyframes floatImage {
                    0%, 100% { transform: translateY(0px) rotate(0deg); }
                    50% { transform: translateY(-6px) rotate(0.5deg); }
                }
            </style>
            <aside class="notes">La Física se divide en clásica (lo que podemos observar a escala humana) y moderna (fenómenos a escala atómica o a velocidades cercanas a la luz). En este curso cubriremos principalmente la Física clásica.</aside>
        </section>

        <!-- ¿POR QUÉ ESTUDIAR FÍSICA? -->
        <section>
            <h2><i class="fas fa-question-circle"></i> ¿Por qué Estudiar Física?</h2>
            <ul class="custom-list">
                <li class="fragment"><i class="fas fa-check-circle green"></i> <strong>Base de toda la ingeniería</strong> — estructuras, circuitos, máquinas, software</li>
                <li class="fragment"><i class="fas fa-check-circle green"></i> <strong>Pensamiento analítico</strong> — aprendes a modelar problemas reales</li>
                <li class="fragment"><i class="fas fa-check-circle green"></i> <strong>Tecnología</strong> — GPS (relatividad), MRI (magnetismo), láser (cuántica)</li>
                <li class="fragment"><i class="fas fa-check-circle green"></i> <strong>Innovación</strong> — semiconductores, energía renovable, comunicaciones</li>
            </ul>
            <div class="fragment warning-box">
                <i class="fas fa-exclamation-triangle"></i> <strong>Sin Física no hay:</strong> celulares, internet, aviones, hospitales modernos, ni ninguna tecnología que usas a diario.
            </div>
            <aside class="notes">Todo ingeniero necesita Física. Ya sea que diseñen puentes, programen robots o desarrollen apps, las leyes de la Física están detrás de cada pieza de tecnología.</aside>
        </section>

        <!-- FÍSICA EN LA VIDA COTIDIANA -->
        <section>
            <h2><i class="fas fa-globe"></i> Física en la Vida Cotidiana</h2>
            <table>
                <thead><tr><th>Situación</th><th>Rama de la Física</th><th>Concepto</th></tr></thead>
                <tbody>
                    <tr><td><i class="fas fa-car accent"></i> Frenar un auto</td><td>Mecánica</td><td>Fricción, inercia</td></tr>
                    <tr><td><i class="fas fa-mug-hot orange"></i> Café se enfría</td><td>Termodinámica</td><td>Transferencia de calor</td></tr>
                    <tr><td><i class="fas fa-wifi green"></i> Señal WiFi</td><td>Electromagnetismo</td><td>Ondas electromagnéticas</td></tr>
                    <tr><td><i class="fas fa-eye accent"></i> Ver colores</td><td>Óptica</td><td>Espectro visible</td></tr>
                    <tr><td><i class="fas fa-plane highlight"></i> Vuelo de un avión</td><td>Fluidos</td><td>Bernoulli, sustentación</td></tr>
                    <tr><td><i class="fas fa-mobile-alt" style="color:#e040fb;"></i> Pantalla táctil</td><td>Electricidad</td><td>Capacitancia</td></tr>
                </tbody>
            </table>
            <aside class="notes">La Física no es abstracta, está en absolutamente todo lo que hacemos. Cada vez que usamos un dispositivo, conducimos, o incluso respiramos, hay principios físicos involucrados.</aside>
        </section>

        <!-- EL MÉTODO CIENTÍFICO -->
        <section>
            <h2><i class="fas fa-flask"></i> El Método Científico</h2>
            <p>La Física se construye sobre el <strong>método científico</strong>:</p>
            <div style="text-align:center; margin:20px 0;">
                <div style="display:inline-flex; gap:10px; flex-wrap:wrap; justify-content:center; font-size:0.8em;">
                    <div class="box fragment" style="min-width:130px; text-align:center;">
                        <i class="fas fa-eye accent" style="font-size:1.5em;"></i><br>
                        <strong>1. Observar</strong>
                    </div>
                    <div style="align-self:center; color:#556;">→</div>
                    <div class="box fragment" style="min-width:130px; text-align:center;">
                        <i class="fas fa-question green" style="font-size:1.5em;"></i><br>
                        <strong>2. Preguntar</strong>
                    </div>
                    <div style="align-self:center; color:#556;">→</div>
                    <div class="box fragment" style="min-width:130px; text-align:center;">
                        <i class="fas fa-lightbulb orange" style="font-size:1.5em;"></i><br>
                        <strong>3. Hipótesis</strong>
                    </div>
                    <div style="align-self:center; color:#556;">→</div>
                    <div class="box fragment" style="min-width:130px; text-align:center;">
                        <i class="fas fa-vial" style="color:#e040fb; font-size:1.5em;"></i><br>
                        <strong>4. Experimentar</strong>
                    </div>
                    <div style="align-self:center; color:#556;">→</div>
                    <div class="box fragment" style="min-width:130px; text-align:center;">
                        <i class="fas fa-chart-bar" style="color:#00e5ff; font-size:1.5em;"></i><br>
                        <strong>5. Concluir</strong>
                    </div>
                </div>
            </div>
            <div class="fragment success-box">
                <i class="fas fa-info-circle"></i> Si la hipótesis falla, se modifica y se repite. <strong>La ciencia es autocorrectiva.</strong>
            </div>
            <aside class="notes">El método científico es la base de todo lo que hacemos en Física. No aceptamos nada "porque sí": todo debe poder verificarse experimentalmente y reproducirse.</aside>
        </section>

        <!-- FÍSICA Y MATEMÁTICAS -->
        <section>
            <h2><i class="fas fa-calculator"></i> Física y Matemáticas</h2>
            <p>Las matemáticas son el <strong>lenguaje</strong> de la Física:</p>
            <div class="flex-container" style="margin-top:15px;">
                <div class="col box" style="text-align:center;">
                    <h4 class="accent">Álgebra</h4>
                    <div class="formula-highlight">F = ma</div>
                    <p style="font-size:0.75em;">Ecuaciones, despeje de variables</p>
                </div>
                <div class="col box" style="text-align:center;">
                    <h4 class="accent">Trigonometría</h4>
                    <div class="formula-highlight">Fx = F cos θ</div>
                    <p style="font-size:0.75em;">Vectores, componentes</p>
                </div>
                <div class="col box" style="text-align:center;">
                    <h4 class="accent">Geometría</h4>
                    <div class="formula-highlight">A = πr²</div>
                    <p style="font-size:0.75em;">Áreas, volúmenes</p>
                </div>
            </div>
            <div class="fragment warning-box">
                <i class="fas fa-exclamation-triangle"></i> <strong>Importante:</strong> No se puede aprender Física sin dominar álgebra y trigonometría. ¡Repasen!
            </div>
            <aside class="notes">A lo largo del curso usaremos mucho álgebra y trigonometría. Si sienten que necesitan repasar, este es el momento. Las fórmulas son herramientas, no cosas que memorizar.</aside>
        </section>

        <!-- GRANDES FÍSICOS -->
        <section>
            <h2><i class="fas fa-users"></i> Gigantes de la Física</h2>
            <table style="font-size:0.82em;">
                <thead><tr><th>Científico</th><th>Contribución</th><th>Época</th></tr></thead>
                <tbody>
                    <tr><td><strong>Galileo Galilei</strong></td><td>Padre de la física experimental, caída libre</td><td>1564–1642</td></tr>
                    <tr><td><strong>Isaac Newton</strong></td><td>Leyes del movimiento, gravitación universal</td><td>1643–1727</td></tr>
                    <tr><td><strong>James C. Maxwell</strong></td><td>Unificación del electromagnetismo</td><td>1831–1879</td></tr>
                    <tr><td><strong>Albert Einstein</strong></td><td>Relatividad, E = mc²</td><td>1879–1955</td></tr>
                    <tr><td><strong>Richard Feynman</strong></td><td>Electrodinámica cuántica</td><td>1918–1988</td></tr>
                </tbody>
            </table>
            <div class="fragment" style="text-align:center; margin-top:15px;">
                <em style="color:#889; font-size:0.85em;">"Si he visto más lejos, es porque estoy sobre hombros de gigantes." — Newton</em>
            </div>
            <aside class="notes">La Física se ha construido gracias a siglos de trabajo de científicos brillantes. Cada una de las leyes que estudiaremos lleva el nombre de alguien que dedicó su vida a entender el universo.</aside>
        </section>

        <!-- RESUMEN -->
        <section>
            <h2><i class="fas fa-clipboard-check"></i> Resumen</h2>
            <div class="box">
                <ul class="custom-list">
                    <li><i class="fas fa-check green"></i> La Física estudia materia, energía, espacio y tiempo</li>
                    <li><i class="fas fa-check green"></i> Se divide en clásica y moderna</li>
                    <li><i class="fas fa-check green"></i> Usa el método científico para verificar hipótesis</li>
                    <li><i class="fas fa-check green"></i> Las matemáticas son su lenguaje fundamental</li>
                    <li><i class="fas fa-check green"></i> Es la base de toda la tecnología e ingeniería</li>
                </ul>
            </div>
            <div class="success-box">
                <i class="fas fa-arrow-right green"></i> <strong>Siguiente módulo:</strong> Sistema Internacional de Unidades (SI) — Módulo 1.2
            </div>
        </section>

        <!-- MINI MISIÓN -->
        <section>
            <h2><i class="fas fa-crosshairs highlight"></i> Mini Misión 1.1</h2>
            <div class="box">
                <p>¿Qué rama de la física clásica estudia específicamente el movimiento y las fuerzas que lo producen?</p>
            </div>
            <input type="text" id="mission-1-1-input" class="mission-input" placeholder="Escribe tu respuesta aquí...">
            <button onclick="checkMission1_1()" class="mission-btn">Verificar</button>
            <div id="mission-1-1-feedback" class="mission-feedback"></div>
            <script>
                function checkMission1_1() {
                    const ans = document.getElementById('mission-1-1-input').value.trim().toLowerCase();
                    const fb = document.getElementById('mission-1-1-feedback');
                    fb.style.display = 'block';
                    if (ans === 'mecanica' || ans === 'mecánica') {
                        fb.className = 'mission-feedback success-box';
                        fb.style.border = '1px solid #00e676';
                        fb.innerHTML = '<i class="fas fa-check-circle green"></i> ¡Correcto! La Mecánica es la rama de la física que estudia el movimiento y el equilibrio de los cuerpos, así como las fuerzas que los producen.';
                    } else {
                        fb.className = 'mission-feedback warning-box';
                        fb.style.border = '1px solid #ff5252';
                        fb.innerHTML = '<i class="fas fa-times-circle highlight"></i> Incorrecto. Pista: Empieza con "M" y se encarga del movimiento de los objetos cotidianos.';
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
                <p>Investiga y redacta un reporte de 1 página sobre la importancia del Sistema Internacional de Unidades y las consecuencias de no estandarizar las mediciones.</p>
            </div>
            <div class="warning-box">
                <i class="fas fa-exclamation-triangle"></i> Recuerda resolver este problema detallando el paso a paso y subir tu resolución en formato PDF.
            </div>
        </section>

<section class="centered">
            <h1>¿Preguntas?</h1>
            <i class="fas fa-atom icon-large"></i>
            <p>Física General — Módulo 1.1</p>
            <p><small>Presiona 'S' para notas del orador</small></p>
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
