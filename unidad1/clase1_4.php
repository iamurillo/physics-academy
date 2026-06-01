<?php require_once '../auth.php'; ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Física 1.4 — Notación Científica</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.5.0/reveal.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.5.0/theme/night.min.css">
    <link rel="stylesheet" href="../css/physics_presentation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .reveal{font-size:28px}.reveal h1,.reveal h2,.reveal h3{text-transform:none;color:#00e5ff;text-shadow:0 0 10px rgba(0,229,255,0.3);margin-bottom:.4em}.reveal h1{font-size:2.2em}.reveal h2{font-size:1.5em}.reveal .slides section{text-align:left;padding:20px 0}.reveal .centered{text-align:center}.highlight{color:#ff5252;font-weight:bold}.accent{color:#3d5afe}.green{color:#00e676}.orange{color:#ff9100}.box{background:rgba(255,255,255,0.07);padding:18px;border-radius:10px;border:1px solid #00e5ff;margin-bottom:15px}.warning-box{background:rgba(255,82,82,0.08);padding:14px;border-radius:8px;border:1px solid #ff5252;font-size:0.85em;margin-top:15px}.success-box{background:rgba(0,230,118,0.08);padding:14px;border-radius:8px;border:1px solid #00e676;font-size:0.85em;margin-top:15px}.flex-container{display:flex;justify-content:space-between;align-items:flex-start;gap:20px}.col{flex:1}.icon-large{font-size:3em;margin-bottom:15px;color:#00e5ff}table{border-collapse:collapse;width:100%;font-size:0.82em}th{border-bottom:2px solid #00e5ff;padding:10px;text-align:left;color:#00e5ff}td{padding:10px;border-bottom:1px solid #333}ul.custom-list{list-style:none;margin-left:0;padding-left:0}ul.custom-list li{margin-bottom:10px}ul.custom-list li i{width:25px;text-align:center;margin-right:10px}.formula-highlight{background:rgba(0,229,255,0.1);padding:8px 16px;border-radius:6px;border-left:3px solid #00e5ff;font-family:monospace;font-size:1.1em;margin:10px 0;display:inline-block}
        
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
    
        

<section class="centered"><i class="fas fa-superscript icon-large"></i><h1>Notación Científica</h1><p class="accent">Unidad 1 — Módulo 1.4</p><hr><p><small>Física General</small></p></section>

    <section>
        <h2><i class="fas fa-question-circle"></i> ¿Por qué Notación Científica?</h2>
        <p>En Física manejamos números <strong>extremadamente</strong> grandes y pequeños:</p>
        <div class="flex-container" style="margin-top:15px;">
            <div class="col box" style="text-align:center;">
                <p class="green"><strong>Muy grandes</strong></p>
                <p style="font-size:0.75em;">Distancia al Sol:<br><strong>150,000,000,000 m</strong></p>
                <p><span class="formula-highlight">1.5 × 10¹¹ m</span></p>
            </div>
            <div class="col box" style="text-align:center;">
                <p class="highlight"><strong>Muy pequeños</strong></p>
                <p style="font-size:0.75em;">Masa del electrón:<br><strong>0.000000000000000000000000000000911 kg</strong></p>
                <p><span class="formula-highlight">9.11 × 10⁻³¹ kg</span></p>
            </div>
        </div>
    </section>

    <section>
        <h2><i class="fas fa-edit"></i> Formato General</h2>
        <div class="box" style="text-align:center; font-size:1.2em;">
            <div class="formula-highlight" style="font-size:1.3em;">N = a × 10ⁿ</div>
        </div>
        <p>Donde:</p>
        <ul class="custom-list">
            <li><i class="fas fa-circle accent"></i> <strong>a</strong> = coeficiente (1 ≤ |a| < 10) — un solo dígito antes del punto</li>
            <li><i class="fas fa-circle green"></i> <strong>n</strong> = exponente entero (positivo o negativo)</li>
        </ul>
        <div class="fragment box">
            <strong>Regla:</strong><br>
            • Número > 1 → exponente <span class="green"><strong>positivo</strong></span> (punto se movió a la izquierda)<br>
            • Número < 1 → exponente <span class="highlight"><strong>negativo</strong></span> (punto se movió a la derecha)
        </div>
    </section>

    <section>
        <h2><i class="fas fa-exchange-alt"></i> Convertir a Notación Científica</h2>
        <table>
            <thead><tr><th>Número</th><th>Movimiento del punto</th><th>Notación Científica</th></tr></thead>
            <tbody>
                <tr><td>384,000</td><td>5 posiciones a la izquierda</td><td class="green">3.84 × 10⁵</td></tr>
                <tr><td>6,371,000</td><td>6 posiciones a la izquierda</td><td class="green">6.371 × 10⁶</td></tr>
                <tr><td>0.00045</td><td>4 posiciones a la derecha</td><td class="highlight">4.5 × 10⁻⁴</td></tr>
                <tr><td>0.0000000016</td><td>9 posiciones a la derecha</td><td class="highlight">1.6 × 10⁻⁹</td></tr>
                <tr><td>299,792,458</td><td>8 posiciones a la izquierda</td><td class="accent">2.998 × 10⁸</td></tr>
            </tbody>
        </table>
    </section>

    <section>
        <h2><i class="fas fa-calculator"></i> Operaciones</h2>
        <div class="flex-container">
            <div class="col box">
                <h4 class="green">Multiplicación</h4>
                <p style="font-size:0.85em;">Se multiplican coeficientes y se <strong>suman</strong> exponentes:</p>
                <div class="formula-highlight" style="font-size:0.85em;">(a×10ᵐ)(b×10ⁿ) = ab × 10ᵐ⁺ⁿ</div>
                <p style="font-size:0.8em; margin-top:10px;"><strong>Ej:</strong> (3×10⁴)(2×10³) = 6×10⁷</p>
            </div>
            <div class="col box">
                <h4 class="orange">División</h4>
                <p style="font-size:0.85em;">Se dividen coeficientes y se <strong>restan</strong> exponentes:</p>
                <div class="formula-highlight" style="font-size:0.85em;">(a×10ᵐ)/(b×10ⁿ) = (a/b) × 10ᵐ⁻ⁿ</div>
                <p style="font-size:0.8em; margin-top:10px;"><strong>Ej:</strong> (8×10⁶)/(4×10²) = 2×10⁴</p>
            </div>
        </div>
        <div class="fragment box">
            <h4 class="accent">Suma/Resta</h4>
            <p style="font-size:0.85em;"><strong>Mismo exponente</strong> requerido: 3.2×10⁴ + 1.5×10⁴ = 4.7×10⁴</p>
            <p style="font-size:0.8em; color:#889;">Si los exponentes son diferentes, primero hay que igualarlos.</p>
        </div>
    </section>

    <section>
        <h2><i class="fas fa-atom"></i> Constantes Físicas Importantes</h2>
        <table style="font-size:0.8em;">
            <thead><tr><th>Constante</th><th>Valor</th><th>Unidades</th></tr></thead>
            <tbody>
                <tr><td>Velocidad de la luz (c)</td><td class="accent">3.00 × 10⁸</td><td>m/s</td></tr>
                <tr><td>Gravedad terrestre (g)</td><td class="green">9.81</td><td>m/s²</td></tr>
                <tr><td>Carga del electrón (e)</td><td class="orange">1.60 × 10⁻¹⁹</td><td>C</td></tr>
                <tr><td>Constante de Planck (h)</td><td style="color:#e040fb;">6.63 × 10⁻³⁴</td><td>J·s</td></tr>
                <tr><td>Número de Avogadro (Nₐ)</td><td class="highlight">6.022 × 10²³</td><td>mol⁻¹</td></tr>
                <tr><td>Constante gravitacional (G)</td><td style="color:#64ffda;">6.674 × 10⁻¹¹</td><td>N·m²/kg²</td></tr>
            </tbody>
        </table>
    </section>

    <section>
        <h2><i class="fas fa-clipboard-check"></i> Resumen</h2>
        <div class="box"><ul class="custom-list">
            <li><i class="fas fa-check green"></i> Formato: a × 10ⁿ donde 1 ≤ a < 10</li>
            <li><i class="fas fa-check green"></i> Multiplicar → sumar exponentes</li>
            <li><i class="fas fa-check green"></i> Dividir → restar exponentes</li>
            <li><i class="fas fa-check green"></i> Sumar/restar → mismo exponente primero</li>
        </ul></div>
        <div class="success-box"><i class="fas fa-arrow-right green"></i> <strong>Siguiente:</strong> Conversión de Unidades — Módulo 1.5</div>
    </section>

    <!-- MINI MISIÓN -->
    <section>
        <h2><i class="fas fa-crosshairs highlight"></i> Mini Misión 1.4</h2>
        <div class="box">
            <p>Expresa el número 45,000 en notación científica standard. (Usa la letra x minúscula para la multiplicación y ^ para el exponente, sin espacios. Ej: 3.2x10^5)</p>
        </div>
        <input type="text" id="mission-1-4-input" class="mission-input" placeholder="Escribe tu respuesta aquí...">
        <button onclick="checkMission1_4()" class="mission-btn">Verificar</button>
        <div id="mission-1-4-feedback" class="mission-feedback"></div>
        <script>
            function checkMission1_4() {
                const ans = document.getElementById('mission-1-4-input').value.trim().replace(/\s+/g, '');
                const fb = document.getElementById('mission-1-4-feedback');
                fb.style.display = 'block';
                if (ans === '4.5x10^4' || ans === '4.5x10**4') {
                    fb.className = 'mission-feedback success-box';
                    fb.style.border = '1px solid #00e676';
                    fb.innerHTML = '<i class="fas fa-check-circle green"></i> ¡Correcto! 45,000 = 4.5 × 10⁴.';
                } else {
                    fb.className = 'mission-feedback warning-box';
                    fb.style.border = '1px solid #ff5252';
                    fb.innerHTML = '<i class="fas fa-times-circle highlight"></i> Incorrecto. Pista: Mueve la coma decimal 4 posiciones a la izquierda. La base es 4.5 y el exponente es 4.';
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

<section class="centered"><h1>¿Preguntas?</h1><i class="fas fa-superscript icon-large"></i><p>Módulo 1.4</p></section>
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
