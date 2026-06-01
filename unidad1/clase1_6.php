<?php require_once '../auth.php'; ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Física 1.6 — Análisis Dimensional</title>
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
    
        

<section class="centered"><i class="fas fa-check-double icon-large"></i><h1>Análisis Dimensional</h1><p class="accent">Unidad 1 — Módulo 1.6</p><hr><p><small>Física General</small></p></section>

    <section>
        <h2><i class="fas fa-ruler-combined"></i> Dimensiones Fundamentales</h2>
        <div class="box">
            <p>Cada magnitud física tiene una <strong>dimensión</strong> que indica de qué tipo es, independientemente de la unidad.</p>
        </div>
        <table>
            <thead><tr><th>Magnitud</th><th>Dimensión</th><th>Símbolo</th></tr></thead>
            <tbody>
                <tr><td><strong>Longitud</strong></td><td class="accent"><strong>[L]</strong></td><td>metro, pie, pulgada...</td></tr>
                <tr><td><strong>Masa</strong></td><td class="green"><strong>[M]</strong></td><td>kilogramo, libra...</td></tr>
                <tr><td><strong>Tiempo</strong></td><td class="orange"><strong>[T]</strong></td><td>segundo, minuto...</td></tr>
            </tbody>
        </table>
        <div class="fragment" style="margin-top:15px;">
            <p><strong>Ejemplo:</strong> Velocidad = distancia/tiempo → <span class="formula-highlight">[v] = [L]/[T] = [LT⁻¹]</span></p>
        </div>
    </section>

    <section>
        <h2><i class="fas fa-th-list"></i> Dimensiones de Magnitudes Comunes</h2>
        <table style="font-size:0.82em;">
            <thead><tr><th>Magnitud</th><th>Fórmula</th><th>Dimensión</th></tr></thead>
            <tbody>
                <tr><td>Área</td><td>L × L</td><td class="accent">[L²]</td></tr>
                <tr><td>Volumen</td><td>L × L × L</td><td class="accent">[L³]</td></tr>
                <tr><td>Velocidad</td><td>d / t</td><td class="green">[LT⁻¹]</td></tr>
                <tr><td>Aceleración</td><td>v / t</td><td class="green">[LT⁻²]</td></tr>
                <tr><td>Fuerza</td><td>m × a</td><td class="orange">[MLT⁻²]</td></tr>
                <tr><td>Energía / Trabajo</td><td>F × d</td><td class="highlight">[ML²T⁻²]</td></tr>
                <tr><td>Potencia</td><td>W / t</td><td style="color:#e040fb;">[ML²T⁻³]</td></tr>
                <tr><td>Presión</td><td>F / A</td><td style="color:#64ffda;">[ML⁻¹T⁻²]</td></tr>
            </tbody>
        </table>
    </section>

    <section>
        <h2><i class="fas fa-check-circle"></i> Verificar Ecuaciones</h2>
        <p>Una ecuación es <strong>dimensionalmente correcta</strong> si ambos lados tienen las <span class="accent">mismas dimensiones</span>.</p>
        <div class="box" style="margin-top:15px;">
            <p><strong>Verificar:</strong> v² = v₀² + 2ax</p>
            <div class="fragment" style="margin-top:10px;">
                <p>Lado izquierdo: [v²] = [LT⁻¹]² = <span class="green">[L²T⁻²]</span></p>
                <p>Lado derecho: [2ax] = [LT⁻²][L] = <span class="green">[L²T⁻²]</span> ✓</p>
            </div>
        </div>
        <div class="fragment box" style="border-color:#ff5252;">
            <p><strong>Verificar:</strong> v = at²</p>
            <p>[LT⁻¹] vs [LT⁻²][T²] = [L] <span class="highlight">✗ INCORRECTA</span></p>
        </div>
    </section>

    <section>
        <h2><i class="fas fa-search"></i> Deducir Fórmulas</h2>
        <div class="box">
            <p><strong>Problema:</strong> El periodo T de un péndulo depende de la longitud L y la gravedad g. Encontrar la relación.</p>
        </div>
        <div class="fragment" style="margin-top:15px;">
            <p>Suponer: T = k · L<sup>a</sup> · g<sup>b</sup></p>
            <p>Dimensiones: [T] = [L]<sup>a</sup> · [LT⁻²]<sup>b</sup></p>
            <p>[T¹] = [L<sup>a+b</sup>] · [T<sup>-2b</sup>]</p>
        </div>
        <div class="fragment">
            <p>Para T: -2b = 1 → <span class="green">b = -1/2</span></p>
            <p>Para L: a + b = 0 → <span class="green">a = 1/2</span></p>
            <div class="formula-highlight" style="border-color:#00e676;">T = k · √(L/g)</div>
            <p style="font-size:0.8em; color:#889;">(El análisis dimensional da k = 2π)</p>
        </div>
    </section>

    <section>
        <h2><i class="fas fa-clipboard-check"></i> Resumen</h2>
        <div class="box"><ul class="custom-list">
            <li><i class="fas fa-check green"></i> Dimensiones fundamentales: [M], [L], [T]</li>
            <li><i class="fas fa-check green"></i> Ambos lados de una ecuación deben tener las mismas dimensiones</li>
            <li><i class="fas fa-check green"></i> El análisis dimensional NO da constantes numéricas</li>
            <li><i class="fas fa-check green"></i> Es una herramienta poderosa para verificar y deducir fórmulas</li>
        </ul></div>
        <div class="success-box"><i class="fas fa-arrow-right green"></i> <strong>Siguiente:</strong> Error e Incertidumbre — Módulo 1.7</div>
    </section>

    <!-- MINI MISIÓN -->
    <section>
        <h2><i class="fas fa-crosshairs highlight"></i> Mini Misión 1.6</h2>
        <div class="box">
            <p>¿Cuáles son las dimensiones de la Fuerza en términos de [M], [L] y [T]? (Escribe la respuesta en formato standard sin espacios, ej: [MLT^-2])</p>
        </div>
        <input type="text" id="mission-1-6-input" class="mission-input" placeholder="Escribe tu respuesta aquí...">
        <button onclick="checkMission1_6()" class="mission-btn">Verificar</button>
        <div id="mission-1-6-feedback" class="mission-feedback"></div>
        <script>
            function checkMission1_6() {
                const ans = document.getElementById('mission-1-6-input').value.trim().replace(/\s+/g, '');
                const fb = document.getElementById('mission-1-6-feedback');
                fb.style.display = 'block';
                if (ans === '[MLT^-2]' || ans === '[MLT**-2]' || ans === 'MLT^-2' || ans === 'MLT**-2') {
                    fb.className = 'mission-feedback success-box';
                    fb.style.border = '1px solid #00e676';
                    fb.innerHTML = '<i class="fas fa-check-circle green"></i> ¡Correcto! La Fuerza es masa por aceleración, por lo tanto sus dimensiones son [M][L][T⁻²] o [MLT⁻²].';
                } else {
                    fb.className = 'mission-feedback warning-box';
                    fb.style.border = '1px solid #ff5252';
                    fb.innerHTML = '<i class="fas fa-times-circle highlight"></i> Incorrecto. Pista: La fuerza es masa [M] por aceleración [LT⁻²].';
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

<section class="centered"><h1>¿Preguntas?</h1><i class="fas fa-check-double icon-large"></i><p>Módulo 1.6</p></section>
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
