<?php require_once '../auth.php'; ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Física 8.1 — Temperatura y Calor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.5.0/reveal.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.5.0/theme/night.min.css">
    <link rel="stylesheet" href="../css/physics_presentation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .reveal { font-size: 28px; }
        .reveal h1,.reveal h2,.reveal h3 { text-transform:none; color:#ff5252; text-shadow:0 0 10px rgba(255,82,82,0.3); margin-bottom:0.4em; }
        .reveal h1 { font-size:2.2em; } .reveal h2 { font-size:1.5em; }
        .reveal .slides section { text-align:left; padding:20px 0; }
        .reveal .centered { text-align:center; }
        .highlight { color:#ff5252; font-weight:bold; }
        .accent { color:#00e5ff; }
        .red-accent { color:#ff5252; }
        .green { color:#00e676; }
        .box { background:rgba(255,255,255,0.07); padding:18px; border-radius:10px; border:1px solid #ff5252; margin-bottom:15px; }
        .warning-box { background:rgba(255,82,82,0.08); padding:14px; border-radius:8px; border:1px solid #ff5252; font-size:0.85em; margin-top:15px; }
        .success-box { background:rgba(0,230,118,0.08); padding:14px; border-radius:8px; border:1px solid #00e676; font-size:0.85em; margin-top:15px; }
        .flex-container { display:flex; justify-content:space-between; align-items:flex-start; gap:20px; }
        .col { flex:1; }
        .icon-large { font-size:3em; margin-bottom:15px; color:#ff5252; }
        table { border-collapse:collapse; width:100%; font-size:0.85em; }
        th { border-bottom:2px solid #ff5252; padding:10px; text-align:left; color:#ff5252; }
        td { padding:10px; border-bottom:1px solid #333; }
        ul.custom-list { list-style:none; margin-left:0; padding-left:0; }
        ul.custom-list li { margin-bottom:10px; }
        ul.custom-list li i { width:25px; text-align:center; margin-right:10px; }
        .formula-highlight { background:rgba(255,82,82,0.1); padding:8px 16px; border-radius:6px; border-left:3px solid #ff5252; font-family:monospace; font-size:1.1em; margin:10px 0; display:inline-block; }
        .notes-hint { position:absolute; bottom:8px; left:10px; font-size:0.35em; color:#444; font-family:monospace; }
        
        /* Botón Volver al Dashboard */
        .btn-back-dashboard {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 9999;
            background: rgba(10, 10, 14, 0.85);
            border: 1px solid #ff5252;
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
            box-shadow: 0 0 10px rgba(255, 82, 82, 0.15);
        }
        .btn-back-dashboard:hover {
            background: #ff5252;
            color: #fff;
            box-shadow: 0 0 15px rgba(255, 82, 82, 0.4);
            transform: translateY(-1px);
        }
        .btn-back-dashboard i {
            font-size: 12px;
        }
        .mission-input {
            background: #000;
            border: 1px solid #ff5252;
            color: #ff5252;
            padding: 10px;
            width: 100%;
            font-family: monospace;
            font-size: 0.9em;
            margin-top: 10px;
            border-radius: 4px;
        }
        .mission-btn {
            background: #ff5252;
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
            <i class="fas fa-fire icon-large"></i>
            <h1>Termodinámica</h1>
            <h3>Temperatura y Calor</h3>
            <p class="red-accent">Unidad 8 — Módulo 8.1</p>
            <hr>
            <p><small>Física Academy | 2026</small></p>
            <aside class="notes">Bienvenidos a la Unidad 8: Termodinámica. Hoy estudiaremos la diferencia entre dos conceptos muy relacionados pero físicamente distintos: la temperatura y el calor.</aside>
        </section>

        <!-- TEMPERATURA Y CALOR -->
        <section>
            <h2><i class="fas fa-temperature-high"></i> Temperatura vs Calor</h2>
            <div class="box">
                <p>La <strong>Temperatura</strong> mide la energía cinética promedio de las moléculas de un cuerpo. El <strong>Calor ($Q$)</strong> es la energía en tránsito debido a una diferencia de temperatura.</p>
            </div>
            <p>• <strong>Temperatura:</strong> Escala intensiva (K, °C, °F).<br>• <strong>Calor:</strong> Energía transferida medida en Joules (J) o Calorías (cal).</p>
            <aside class="notes">La temperatura es una propiedad de estado del sistema, mientras que el calor es energía en movimiento. No se puede "poseer" calor, solo transferir.</aside>
        </section>

        <!-- RESUMEN -->
        <section>
            <h2><i class="fas fa-clipboard-check"></i> Resumen</h2>
            <div class="box">
                <ul class="custom-list">
                    <li><i class="fas fa-check green"></i> La temperatura mide el movimiento promedio de los átomos.</li>
                    <li><i class="fas fa-check green"></i> El calor es energía térmica en movimiento de un cuerpo caliente a uno frío.</li>
                    <li><i class="fas fa-check green"></i> Se llega al equilibrio térmico cuando las temperaturas se igualan.</li>
                </ul>
            </div>
            <div class="success-box">
                <i class="fas fa-arrow-right green"></i> <strong>Siguiente módulo:</strong> Escalas de Temperatura — Módulo 8.2
            </div>
        </section>

        <!-- MINI MISIÓN -->
        <section>
            <h2><i class="fas fa-crosshairs highlight"></i> Mini Misión 8.1</h2>
            <div class="box">
                <p>¿Qué escala de temperatura se utiliza como escala de temperatura absoluta en el Sistema Internacional de Unidades?</p>
            </div>
            <input type="text" id="mission-8-1-input" class="mission-input" placeholder="Escribe tu respuesta aquí...">
            <button onclick="checkMission8_1()" class="mission-btn">Verificar</button>
            <div id="mission-8-1-feedback" class="mission-feedback"></div>
            <script>
                function checkMission8_1() {
                    const ans = document.getElementById('mission-8-1-input').value.trim().toLowerCase();
                    const fb = document.getElementById('mission-8-1-feedback');
                    fb.style.display = 'block';
                    if (ans === 'kelvin' || ans === 'k') {
                        fb.className = 'mission-feedback success-box';
                        fb.style.border = '1px solid #00e676';
                        fb.innerHTML = '<i class="fas fa-check-circle green"></i> ¡Correcto! La escala Kelvin (K) es la escala de temperatura absoluta adoptada en el SI.';
                    } else {
                        fb.className = 'mission-feedback warning-box';
                        fb.style.border = '1px solid #ff5252';
                        fb.innerHTML = '<i class="fas fa-times-circle highlight"></i> Incorrecto. Pista: Empieza con "K" y su unidad no lleva el símbolo de grado (°).';
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
                <p>Calcula la cantidad de calor necesaria para elevar la temperatura de 500 g de hielo a -10°C hasta agua líquida a 25°C.</p>
            </div>
            <div class="warning-box">
                <i class="fas fa-exclamation-triangle"></i> Recuerda resolver este problema detallando el paso a paso y subir tu resolución en formato PDF.
            </div>
        </section>

<section class="centered">
            <h1>¿Preguntas?</h1>
            <i class="fas fa-fire icon-large"></i>
            <p>Física Academy — Módulo 8.1</p>
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
