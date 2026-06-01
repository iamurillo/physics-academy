<?php require_once '../auth.php'; ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Física 1.5 — Conversión de Unidades</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.5.0/reveal.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.5.0/theme/night.min.css">
    <link rel="stylesheet" href="../css/physics_presentation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .reveal{font-size:28px}.reveal h1,.reveal h2,.reveal h3{text-transform:none;color:#00e5ff;text-shadow:0 0 10px rgba(0,229,255,0.3);margin-bottom:.4em}.reveal h1{font-size:2.2em}.reveal h2{font-size:1.5em}.reveal .slides section{text-align:left;padding:20px 0}.reveal .centered{text-align:center}.highlight{color:#ff5252;font-weight:bold}.accent{color:#3d5afe}.green{color:#00e676}.orange{color:#ff9100}.box{background:rgba(255,255,255,0.07);padding:18px;border-radius:10px;border:1px solid #00e5ff;margin-bottom:15px}.warning-box{background:rgba(255,82,82,0.08);padding:14px;border-radius:8px;border:1px solid #ff5252;font-size:0.85em;margin-top:15px}.success-box{background:rgba(0,230,118,0.08);padding:14px;border-radius:8px;border:1px solid #00e676;font-size:0.85em;margin-top:15px}.flex-container{display:flex;justify-content:space-between;align-items:flex-start;gap:20px}.col{flex:1}.icon-large{font-size:3em;margin-bottom:15px;color:#00e5ff}table{border-collapse:collapse;width:100%;font-size:0.82em}th{border-bottom:2px solid #00e5ff;padding:10px;text-align:left;color:#00e5ff}td{padding:10px;border-bottom:1px solid #333}.formula-highlight{background:rgba(0,229,255,0.1);padding:8px 16px;border-radius:6px;border-left:3px solid #00e5ff;font-family:monospace;font-size:1.1em;margin:10px 0;display:inline-block}ul.custom-list{list-style:none;margin-left:0;padding-left:0}ul.custom-list li{margin-bottom:10px}ul.custom-list li i{width:25px;text-align:center;margin-right:10px}
        
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
<div class="reveal"><div class="slides">
    
        

<section class="centered"><i class="fas fa-exchange-alt icon-large"></i><h1>Conversión de Unidades</h1><p class="accent">Unidad 1 — Módulo 1.5</p><hr><p><small>Física General</small></p></section>

    <section>
        <h2><i class="fas fa-key"></i> Método: Factor de Conversión</h2>
        <div class="box">
            <p>Un <strong>factor de conversión</strong> es una fracción que vale <span class="green"><strong>1</strong></span> porque numerador y denominador son equivalentes.</p>
        </div>
        <div style="text-align:center; margin:20px 0;">
            <div class="formula-highlight" style="font-size:1.2em;">1 km = 1000 m → factor: (1000 m / 1 km) = 1</div>
        </div>
        <p><strong>Regla de oro:</strong> Multiplicar por el factor de conversión de modo que las <span class="highlight">unidades no deseadas se cancelen</span>.</p>
        <div class="fragment success-box">
            <i class="fas fa-lightbulb green"></i> Las unidades se tratan como <strong>variables algebraicas</strong>: se cancelan arriba y abajo.
        </div>
    </section>

    <section>
        <h2><i class="fas fa-th-list"></i> Factores de Conversión Comunes</h2>
        <div class="flex-container">
            <div class="col">
                <h4 class="accent">Longitud</h4>
                <table style="font-size:0.8em;">
                    <tr><td>1 km</td><td>= 1000 m</td></tr>
                    <tr><td>1 m</td><td>= 100 cm</td></tr>
                    <tr><td>1 in</td><td>= 2.54 cm</td></tr>
                    <tr><td>1 ft</td><td>= 0.3048 m</td></tr>
                    <tr><td>1 mi</td><td>= 1.609 km</td></tr>
                </table>
            </div>
            <div class="col">
                <h4 class="green">Masa</h4>
                <table style="font-size:0.8em;">
                    <tr><td>1 kg</td><td>= 1000 g</td></tr>
                    <tr><td>1 lb</td><td>= 0.4536 kg</td></tr>
                    <tr><td>1 oz</td><td>= 28.35 g</td></tr>
                    <tr><td>1 ton</td><td>= 1000 kg</td></tr>
                </table>
            </div>
            <div class="col">
                <h4 class="orange">Tiempo</h4>
                <table style="font-size:0.8em;">
                    <tr><td>1 min</td><td>= 60 s</td></tr>
                    <tr><td>1 h</td><td>= 3600 s</td></tr>
                    <tr><td>1 día</td><td>= 86,400 s</td></tr>
                    <tr><td>1 año</td><td>≈ 3.156×10⁷ s</td></tr>
                </table>
            </div>
        </div>
    </section>

    <section>
        <h2><i class="fas fa-pencil-alt"></i> Ejemplo 1: Simple</h2>
        <div class="box">
            <p><strong>Convertir 90 km/h a m/s</strong></p>
        </div>
        <div style="text-align:center; margin:15px 0; font-size:0.9em;">
            <div class="formula-highlight">90 km/h × (1000 m / 1 km) × (1 h / 3600 s)</div>
        </div>
        <div class="fragment" style="text-align:center;">
            <p>= 90 × 1000 / 3600</p>
            <div class="formula-highlight" style="border-color:#00e676;">= <span class="green"><strong>25 m/s</strong></span></div>
        </div>
        <div class="fragment success-box">
            <i class="fas fa-lightbulb green"></i> <strong>Atajo:</strong> Para convertir km/h → m/s, <strong>divide entre 3.6</strong><br>
            Para m/s → km/h, <strong>multiplica por 3.6</strong>
        </div>
    </section>

    <section>
        <h2><i class="fas fa-pencil-alt"></i> Ejemplo 2: Múltiples pasos</h2>
        <div class="box">
            <p><strong>Convertir 5.0 g/cm³ a kg/m³</strong></p>
        </div>
        <div style="font-size:0.85em; margin-top:15px;">
            <div class="formula-highlight" style="font-size:0.9em;">5.0 g/cm³ × (1 kg / 1000 g) × (100 cm / 1 m)³</div>
        </div>
        <div class="fragment" style="margin-top:15px;">
            <p>= 5.0 × (1/1000) × (10⁶)</p>
            <div class="formula-highlight" style="border-color:#00e676;">= <span class="green"><strong>5000 kg/m³</strong></span></div>
        </div>
        <div class="fragment warning-box">
            <i class="fas fa-exclamation-triangle"></i> <strong>¡Cuidado con unidades al cubo!</strong> (100 cm/1 m)³ = 10⁶ cm³/m³, no 100.
        </div>
    </section>

    <section>
        <h2><i class="fas fa-pencil-alt"></i> Ejemplo 3: Sistema Inglés</h2>
        <div class="box"><p><strong>Un auto viaja a 65 mph. ¿Cuánto es en m/s?</strong></p></div>
        <div style="font-size:0.85em;">
            <div class="formula-highlight" style="font-size:0.9em;">65 mi/h × (1.609 km / 1 mi) × (1000 m / 1 km) × (1 h / 3600 s)</div>
        </div>
        <div class="fragment" style="text-align:center; margin-top:15px;">
            <p>= 65 × 1609 / 3600</p>
            <div class="formula-highlight" style="border-color:#00e676;">= <span class="green"><strong>29.1 m/s</strong></span></div>
        </div>
    </section>

    <section>
        <h2><i class="fas fa-clipboard-check"></i> Resumen</h2>
        <div class="box"><ul class="custom-list">
            <li><i class="fas fa-check green"></i> El factor de conversión vale 1 (no cambia el valor, solo la unidad)</li>
            <li><i class="fas fa-check green"></i> Colocar la unidad a cancelar en el lugar opuesto (arriba/abajo)</li>
            <li><i class="fas fa-check green"></i> Unidades al cuadrado o cubo: elevar <strong>todo</strong> el factor</li>
            <li><i class="fas fa-check green"></i> km/h → m/s: ÷ 3.6 &nbsp;|&nbsp; m/s → km/h: × 3.6</li>
        </ul></div>
        <div class="success-box"><i class="fas fa-arrow-right green"></i> <strong>Siguiente:</strong> Análisis Dimensional — Módulo 1.6</div>
    </section>

    <!-- MINI MISIÓN -->
    <section>
        <h2><i class="fas fa-crosshairs highlight"></i> Mini Misión 1.5</h2>
        <div class="box">
            <p>Convierte 72 km/h a m/s. (Escribe solo el número)</p>
        </div>
        <input type="text" id="mission-1-5-input" class="mission-input" placeholder="Escribe tu respuesta aquí...">
        <button onclick="checkMission1_5()" class="mission-btn">Verificar</button>
        <div id="mission-1-5-feedback" class="mission-feedback"></div>
        <script>
            function checkMission1_5() {
                const ans = document.getElementById('mission-1-5-input').value.trim();
                const fb = document.getElementById('mission-1-5-feedback');
                fb.style.display = 'block';
                if (ans === '20') {
                    fb.className = 'mission-feedback success-box';
                    fb.style.border = '1px solid #00e676';
                    fb.innerHTML = '<i class="fas fa-check-circle green"></i> ¡Correcto! 72 km/h dividido entre 3.6 es igual a 20 m/s.';
                } else {
                    fb.className = 'mission-feedback warning-box';
                    fb.style.border = '1px solid #ff5252';
                    fb.innerHTML = '<i class="fas fa-times-circle highlight"></i> Incorrecto. Pista: Divide la rapidez en km/h entre 3.6 para obtener m/s.';
                }
            }
        </script>
    </section>

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

<section class="centered"><h1>¿Preguntas?</h1><i class="fas fa-exchange-alt icon-large"></i><p>Módulo 1.5</p></section>
</div></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.5.0/reveal.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.5.0/plugin/notes/notes.min.js"></script>
<script>
    // Ocultar diapositiva de tarea si está desactivado en el localStorage
    if (localStorage.getItem('physics_show_tasks') !== 'true') {
        const hw = document.querySelector('.homework-slide');
        if (hw) hw.remove();
    }
Reveal.initialize({hash:false,history:false,plugins:[RevealNotes],slideNumber:true,controls:true,progress:true,center:true,transition:'slide'});</script>
</body></html>
