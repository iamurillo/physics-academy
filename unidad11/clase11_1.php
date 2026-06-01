<?php require_once '../auth.php'; ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Física 11.1 — Teoría Cuántica</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.5.0/reveal.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.5.0/theme/night.min.css">
    <link rel="stylesheet" href="../css/physics_presentation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .reveal { font-size: 28px; }
        .reveal h1,.reveal h2,.reveal h3 { text-transform:none; color:#ff4081; text-shadow:0 0 10px rgba(255,64,129,0.3); margin-bottom:0.4em; }
        .reveal h1 { font-size:2.2em; } .reveal h2 { font-size:1.5em; }
        .reveal .slides section { text-align:left; padding:20px 0; }
        .reveal .centered { text-align:center; }
        .highlight { color:#ff5252; font-weight:bold; }
        .accent { color:#00e5ff; }
        .pink-accent { color:#ff4081; }
        .green { color:#00e676; }
        .box { background:rgba(255,255,255,0.07); padding:18px; border-radius:10px; border:1px solid #ff4081; margin-bottom:15px; }
        .warning-box { background:rgba(255,82,82,0.08); padding:14px; border-radius:8px; border:1px solid #ff5252; font-size:0.85em; margin-top:15px; }
        .success-box { background:rgba(0,230,118,0.08); padding:14px; border-radius:8px; border:1px solid #00e676; font-size:0.85em; margin-top:15px; }
        .flex-container { display:flex; justify-content:space-between; align-items:flex-start; gap:20px; }
        .col { flex:1; }
        .icon-large { font-size:3em; margin-bottom:15px; color:#ff4081; }
        table { border-collapse:collapse; width:100%; font-size:0.85em; }
        th { border-bottom:2px solid #ff4081; padding:10px; text-align:left; color:#ff4081; }
        td { padding:10px; border-bottom:1px solid #333; }
        ul.custom-list { list-style:none; margin-left:0; padding-left:0; }
        ul.custom-list li { margin-bottom:10px; }
        ul.custom-list li i { width:25px; text-align:center; margin-right:10px; }
        .formula-highlight { background:rgba(255,64,129,0.1); padding:8px 16px; border-radius:6px; border-left:3px solid #ff4081; font-family:monospace; font-size:1.1em; margin:10px 0; display:inline-block; }
        .notes-hint { position:absolute; bottom:8px; left:10px; font-size:0.35em; color:#444; font-family:monospace; }
        
        /* Botón Volver al Dashboard */
        .btn-back-dashboard {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 9999;
            background: rgba(10, 10, 14, 0.85);
            border: 1px solid #ff4081;
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
            box-shadow: 0 0 10px rgba(255, 64, 129, 0.15);
        }
        .btn-back-dashboard:hover {
            background: #ff4081;
            color: #fff;
            box-shadow: 0 0 15px rgba(255, 64, 129, 0.4);
            transform: translateY(-1px);
        }
        .btn-back-dashboard i {
            font-size: 12px;
        }
        .mission-input {
            background: #000;
            border: 1px solid #ff4081;
            color: #ff4081;
            padding: 10px;
            width: 100%;
            font-family: monospace;
            font-size: 0.9em;
            margin-top: 10px;
            border-radius: 4px;
        }
        .mission-btn {
            background: #ff4081;
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
            <i class="fas fa-atom icon-large"></i>
            <h1>Física Moderna</h1>
            <h3>Teoría Cuántica</h3>
            <p class="pink-accent">Unidad 11 — Módulo 11.1</p>
            <hr>
            <p><small>Física Academy | 2026</small></p>
            <aside class="notes">Bienvenidos a la Unidad 11: Física Moderna. Hoy estudiaremos los cimientos de la Teoría Cuántica y el nacimiento de una nueva física a escala atómica.</aside>
        </section>

        <!-- TEORIA CUANTICA -->
        <section>
            <h2><i class="fas fa-atom"></i> El Nacimiento del Cuanto</h2>
            <div class="box">
                <p>La <strong>Teoría Cuántica</strong> surge al descubrirse que a escalas subatómicas la energía no se transfiere de forma continua, sino en paquetes discretos llamados <strong>cuantos</strong> o fotones.</p>
            </div>
            <div class="formula-highlight">E = h \cdot f</div>
            <p>Donde $h = 6.63 \times 10^{-34}$ J·s es la constante de Planck y $f$ es la frecuencia.</p>
            <aside class="notes">Max Planck postuló esto para resolver la catástrofe del ultravioleta en la radiación del cuerpo negro. Posteriormente Einstein lo usó para explicar el efecto fotoeléctrico.</aside>
        </section>

        <!-- RESUMEN -->
        <section>
            <h2><i class="fas fa-clipboard-check"></i> Resumen</h2>
            <div class="box">
                <ul class="custom-list">
                    <li><i class="fas fa-check green"></i> A escala atómica la energía está cuantizada ($E = hf$).</li>
                    <li><i class="fas fa-check green"></i> Representa la transición de la física clásica a la física moderna.</li>
                    <li><i class="fas fa-check green"></i> Sentó las bases para el desarrollo de semiconductores, láseres y ordenadores cuánticos.</li>
                </ul>
            </div>
            <div class="success-box">
                <i class="fas fa-arrow-right green"></i> <strong>Siguiente módulo:</strong> Efecto Fotoeléctrico — Módulo 11.2
            </div>
        </section>

        <!-- MINI MISIÓN -->
        <section>
            <h2><i class="fas fa-crosshairs highlight"></i> Mini Misión 11.1</h2>
            <div class="box">
                <p>Según la ecuación $E = hf$, si la frecuencia ($f$) de un fotón aumenta, ¿su energía ($E$) aumenta, disminuye o permanece igual?</p>
            </div>
            <input type="text" id="mission-11-1-input" class="mission-input" placeholder="Escribe tu respuesta aquí...">
            <button onclick="checkMission11_1()" class="mission-btn">Verificar</button>
            <div id="mission-11-1-feedback" class="mission-feedback"></div>
            <script>
                function checkMission11_1() {
                    const ans = document.getElementById('mission-11-1-input').value.trim().toLowerCase();
                    const fb = document.getElementById('mission-11-1-feedback');
                    fb.style.display = 'block';
                    if (ans === 'aumenta') {
                        fb.className = 'mission-feedback success-box';
                        fb.style.border = '1px solid #00e676';
                        fb.innerHTML = '<i class="fas fa-check-circle green"></i> ¡Correcto! La energía es directamente proporcional a la frecuencia del fotón.';
                    } else {
                        fb.className = 'mission-feedback warning-box';
                        fb.style.border = '1px solid #ff5252';
                        fb.innerHTML = '<i class="fas fa-times-circle highlight"></i> Incorrecto. Pista: Puesto que $E = h \\cdot f$, un incremento en $f$ produce un incremento en $E$.';
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
                <p>Calcula la energía cinética máxima de los fotoelectrones emitidos cuando luz de 350 nm incide sobre una superficie de sodio.</p>
            </div>
            <div class="warning-box">
                <i class="fas fa-exclamation-triangle"></i> Recuerda resolver este problema detallando el paso a paso y subir tu resolución en formato PDF.
            </div>
        </section>

<section class="centered">
            <h1>¿Preguntas?</h1>
            <i class="fas fa-atom icon-large"></i>
            <p>Física Academy — Módulo 11.1</p>
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
