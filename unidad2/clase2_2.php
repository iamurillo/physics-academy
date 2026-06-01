<?php require_once '../auth.php'; ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Física 2.2 — Distancia y Desplazamiento</title>
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
            <i class="fas fa-route icon-large"></i>
            <h1>Distancia y Desplazamiento</h1>
            <h3>¿Cuánto y en qué dirección nos movimos?</h3>
            <p class="indigo-accent">Unidad 2 — Módulo 2.2</p>
            <hr>
            <p><small>Física Academy | 2026</small></p>
            <aside class="notes">Bienvenidos al módulo 2.2. Hoy aprenderemos a diferenciar dos conceptos que en el lenguaje cotidiano suelen usarse como sinónimos, pero que en Física representan magnitudes completamente distintas: la distancia y el desplazamiento.</aside>
        </section>

        <!-- DISTANCIA -->
        <section>
            <h2><i class="fas fa-arrows-alt-h"></i> Distancia ($d$)</h2>
            <div class="box">
                <p>La <strong>distancia</strong> es la longitud total de la trayectoria recorrida por un objeto. Es una magnitud <span class="highlight">escalar</span> (solo tiene número y unidad; siempre es positiva).</p>
            </div>
            <p><strong>Ejemplo:</strong> Si caminas 5 metros al norte y luego 3 metros al sur, la distancia total que recorriste es:</p>
            <div class="formula-highlight">d = 5\text{ m} + 3\text{ m} = 8\text{ m}</div>
            <aside class="notes">La distancia nos dice cuánto caminó el cuerpo en total. No le importa la dirección del movimiento, solo la acumulación de la trayectoria.</aside>
        </section>

        <!-- DESPLAZAMIENTO -->
        <section>
            <h2><i class="fas fa-long-arrow-alt-right"></i> Desplazamiento ($\Delta x$)</h2>
            <div class="box">
                <p>El <strong>desplazamiento</strong> es el cambio de posición de un objeto desde su punto inicial hasta su punto final. Es una magnitud <span class="indigo-accent">vectorial</span> (tiene magnitud, dirección y sentido).</p>
            </div>
            <div class="formula-highlight">\Delta x = x_f - x_i</div>
            <p><strong>Ejemplo anterior:</strong> 5m al norte ($+5$) y 3m al sur ($-3$):</p>
            <div class="formula-highlight">\Delta x = +5\text{ m} - 3\text{ m} = +2\text{ m} \text{ (2 metros al Norte)}</div>
            <aside class="notes">A diferencia de la distancia, el desplazamiento solo compara la posición final contra la inicial. Es el vector directo entre el inicio y el fin.</aside>
        </section>

        <!-- COMPARATIVA -->
        <section>
            <h2><i class="fas fa-balance-scale"></i> Distancia vs Desplazamiento</h2>
            <table>
                <thead><tr><th>Propiedad</th><th>Distancia ($d$)</th><th>Desplazamiento ($\Delta x$)</th></tr></thead>
                <tbody>
                    <tr><td><strong>Tipo</strong></td><td class="highlight">Escalar</td><td class="indigo-accent">Vectorial</td></tr>
                    <tr><td><strong>Trayectoria</strong></td><td>Depende del camino tomado</td><td>Solo depende del inicio y el fin</td></tr>
                    <tr><td><strong>Valor</strong></td><td>Siempre positivo</td><td>Puede ser positivo, negativo o cero</td></tr>
                    <tr><td><strong>Vuelta completa</strong></td><td>Mayor que cero</td><td>Cero (si regresa al origen)</td></tr>
                </tbody>
            </table>
            <aside class="notes">Si un corredor da una vuelta completa a una pista de 400m, su distancia recorrida es 400m, pero su desplazamiento es cero porque regresó exactamente al mismo punto de partida.</aside>
        </section>

        <!-- RESUMEN -->
        <section>
            <h2><i class="fas fa-clipboard-check"></i> Resumen</h2>
            <div class="box">
                <ul class="custom-list">
                    <li><i class="fas fa-check green"></i> La distancia mide la longitud del camino recorrido (escalar).</li>
                    <li><i class="fas fa-check green"></i> El desplazamiento mide la línea recta desde el origen al fin (vectorial).</li>
                    <li><i class="fas fa-check green"></i> Si vuelves al inicio, el desplazamiento es nulo.</li>
                </ul>
            </div>
            <div class="success-box">
                <i class="fas fa-arrow-right green"></i> <strong>Siguiente módulo:</strong> Rapidez y Velocidad — Módulo 2.3
            </div>
        </section>

        <!-- MINI MISIÓN -->
        <section>
            <h2><i class="fas fa-crosshairs highlight"></i> Mini Misión 2.2</h2>
            <div class="box">
                <p>Si una persona da dos vueltas completas alrededor de una pista circular de 400 metros de circunferencia, ¿cuál es su desplazamiento total final en metros?</p>
            </div>
            <input type="text" id="mission-2-2-input" class="mission-input" placeholder="Escribe tu respuesta numérica aquí...">
            <button onclick="checkMission2_2()" class="mission-btn">Verificar</button>
            <div id="mission-2-2-feedback" class="mission-feedback"></div>
            <script>
                function checkMission2_2() {
                    const ans = document.getElementById('mission-2-2-input').value.trim();
                    const fb = document.getElementById('mission-2-2-feedback');
                    fb.style.display = 'block';
                    if (ans === '0' || ans === 'cero') {
                        fb.className = 'mission-feedback success-box';
                        fb.style.border = '1px solid #00e676';
                        fb.innerHTML = '<i class="fas fa-check-circle green"></i> ¡Correcto! El desplazamiento es cero porque el punto final coincide exactamente con el punto de partida.';
                    } else {
                        fb.className = 'mission-feedback warning-box';
                        fb.style.border = '1px solid #ff5252';
                        fb.innerHTML = '<i class="fas fa-times-circle highlight"></i> Incorrecto. Recuerda que el desplazamiento mide la distancia directa entre la posición inicial y final.';
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
            <i class="fas fa-route icon-large"></i>
            <p>Física Academy — Módulo 2.2</p>
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
