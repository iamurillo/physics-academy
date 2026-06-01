<?php require_once '../auth.php'; ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Física 1.7 — Error e Incertidumbre</title>
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
    
        

<section class="centered"><i class="fas fa-exclamation-triangle icon-large"></i><h1>Error e Incertidumbre</h1><h3>en las Mediciones</h3><p class="accent">Unidad 1 — Módulo 1.7</p><hr><p><small>Física General</small></p></section>

    <section>
        <h2><i class="fas fa-crosshairs"></i> Ninguna Medición es Perfecta</h2>
        <div class="box">
            <p>Toda medición tiene un grado de <strong>incertidumbre</strong>. El valor verdadero está en un <span class="accent">rango</span> alrededor del valor medido.</p>
        </div>
        <div style="text-align:center; margin:20px 0;">
            <div class="formula-highlight" style="font-size:1.2em;">Medición = valor ± incertidumbre</div>
        </div>
        <p><strong>Ejemplo:</strong> L = (25.3 ± 0.1) cm</p>
        <p style="font-size:0.85em; color:#889;">Significa que el valor real está entre 25.2 cm y 25.4 cm.</p>
    </section>

    <section>
        <h2><i class="fas fa-bug"></i> Tipos de Error</h2>
        <div class="flex-container">
            <div class="col box" style="border-color:#ff5252;">
                <h4 class="highlight"><i class="fas fa-cog"></i> Error Sistemático</h4>
                <ul style="font-size:0.82em;">
                    <li>Siempre en la <strong>misma dirección</strong></li>
                    <li>Causado por instrumentos mal calibrados o método defectuoso</li>
                    <li>Se puede <strong>corregir</strong></li>
                </ul>
                <p style="font-size:0.78em; color:#889;"><em>Ej: regla dañada, balanza descalibrada</em></p>
            </div>
            <div class="col box" style="border-color:#ff9100;">
                <h4 class="orange"><i class="fas fa-random"></i> Error Aleatorio</h4>
                <ul style="font-size:0.82em;">
                    <li>Varía en <strong>ambas direcciones</strong></li>
                    <li>Causado por factores impredecibles</li>
                    <li>Se reduce con <strong>más mediciones</strong></li>
                </ul>
                <p style="font-size:0.78em; color:#889;"><em>Ej: variaciones al cronometrar, vibraciones</em></p>
            </div>
        </div>
    </section>

    <section>
        <h2><i class="fas fa-bullseye"></i> Exactitud vs Precisión</h2>
        <div class="flex-container">
            <div class="col box">
                <h4 class="green">Exactitud</h4>
                <p style="font-size:0.8em; margin-bottom: 15px;">Qué tan cerca está la medición del <span class="green"><strong>valor real</strong></span> (el centro del blanco).</p>
                <h4 class="accent">Precisión</h4>
                <p style="font-size:0.8em;">Qué tan cerca están las medidas <span class="accent"><strong>entre sí</strong></span> (la agrupación de los tiros, repetibilidad).</p>
            </div>
            <div class="col" style="text-align: center;">
                <img src="../images/exactitud_precision.png" style="max-height: 250px; border-radius: 8px; border: 1px solid rgba(0, 229, 255, 0.3); box-shadow: 0 0 15px rgba(0, 229, 255, 0.25); animation: floatTarget 5s ease-in-out infinite;">
            </div>
        </div>
        <style>
            @keyframes floatTarget {
                0%, 100% { transform: scale(1); }
                50% { transform: scale(1.02); }
            }
        </style>
    </section>

    <section>
        <h2><i class="fas fa-calculator"></i> Incertidumbre Absoluta y Relativa</h2>
        <div class="box">
            <h4 class="accent">Incertidumbre Absoluta (Δx)</h4>
            <p>El rango de variación en las <strong>mismas unidades</strong> que la medición.</p>
            <div class="formula-highlight">Δx = |valor medido − valor real|</div>
        </div>
        <div class="box">
            <h4 class="green">Incertidumbre Relativa (εᵣ)</h4>
            <p>Proporción de la incertidumbre respecto al valor medido.</p>
            <div class="formula-highlight">εᵣ = Δx / x</div>
        </div>
        <div class="box">
            <h4 class="orange">Error Porcentual (%)</h4>
            <div class="formula-highlight">% error = (Δx / x) × 100%</div>
        </div>
    </section>

    <section>
        <h2><i class="fas fa-hashtag"></i> Cifras Significativas</h2>
        <div class="box">
            <p>Las <strong>cifras significativas</strong> indican la precisión de una medición.</p>
        </div>
        <table>
            <thead><tr><th>Valor</th><th>Cifras Sig.</th><th>Regla</th></tr></thead>
            <tbody>
                <tr><td>3.45</td><td class="green">3</td><td>Todos los dígitos no cero son significativos</td></tr>
                <tr><td>0.0034</td><td class="green">2</td><td>Ceros a la izquierda NO son significativos</td></tr>
                <tr><td>5.00</td><td class="green">3</td><td>Ceros a la derecha del punto SÍ son significativos</td></tr>
                <tr><td>1500</td><td class="orange">2 o 4</td><td>Ambiguo → usar notación científica</td></tr>
                <tr><td>1.500 × 10³</td><td class="green">4</td><td>La notación aclara</td></tr>
            </tbody>
        </table>
    </section>

    <section>
        <h2><i class="fas fa-cogs"></i> Propagación de Errores</h2>
        <table style="font-size:0.85em;">
            <thead><tr><th>Operación</th><th>Fórmula</th><th>Regla</th></tr></thead>
            <tbody>
                <tr><td><strong>Suma / Resta</strong></td><td>z = x ± y</td><td class="accent">Δz = Δx + Δy</td></tr>
                <tr><td><strong>Multiplicación</strong></td><td>z = x · y</td><td class="green">Δz/z = Δx/x + Δy/y</td></tr>
                <tr><td><strong>División</strong></td><td>z = x / y</td><td class="green">Δz/z = Δx/x + Δy/y</td></tr>
                <tr><td><strong>Potencia</strong></td><td>z = xⁿ</td><td class="orange">Δz/z = n · Δx/x</td></tr>
            </tbody>
        </table>
        <div class="fragment box" style="margin-top:15px;">
            <p><strong>Ejemplo:</strong> Área = L × W, L = (5.0±0.1) cm, W = (3.0±0.1) cm</p>
            <p>A = 15.0 cm² &nbsp;|&nbsp; ΔA/A = 0.1/5.0 + 0.1/3.0 = 0.053</p>
            <p>ΔA = 15.0 × 0.053 = <span class="green"><strong>0.8 cm²</strong></span> → A = (15.0 ± 0.8) cm²</p>
        </div>
    </section>

    <section>
        <h2><i class="fas fa-clipboard-check"></i> Resumen</h2>
        <div class="box"><ul class="custom-list">
            <li><i class="fas fa-check green"></i> Toda medición tiene incertidumbre: valor ± Δx</li>
            <li><i class="fas fa-check green"></i> Error sistemático se corrige; aleatorio se reduce con más datos</li>
            <li><i class="fas fa-check green"></i> Exactitud ≠ Precisión</li>
            <li><i class="fas fa-check green"></i> Las cifras significativas reflejan la precisión del instrumento</li>
            <li><i class="fas fa-check green"></i> Los errores se propagan al hacer operaciones</li>
        </ul></div>
        <div class="success-box"><i class="fas fa-arrow-right green"></i> <strong>Siguiente unidad:</strong> Cinemática — Unidad 2</div>
    </section>

    <!-- MINI MISIÓN -->
    <section>
        <h2><i class="fas fa-crosshairs highlight"></i> Mini Misión 1.7</h2>
        <div class="box">
            <p>Si medimos el largo de una mesa obteniendo L = (1.54 ± 0.02) m, ¿cuál es la incertidumbre absoluta de esta medida en metros? (Escribe solo el número, ej: 0.05)</p>
        </div>
        <input type="text" id="mission-1-7-input" class="mission-input" placeholder="Escribe tu respuesta aquí...">
        <button onclick="checkMission1_7()" class="mission-btn">Verificar</button>
        <div id="mission-1-7-feedback" class="mission-feedback"></div>
        <script>
            function checkMission1_7() {
                const ans = document.getElementById('mission-1-7-input').value.trim();
                const fb = document.getElementById('mission-1-7-feedback');
                fb.style.display = 'block';
                if (ans === '0.02') {
                    fb.className = 'mission-feedback success-box';
                    fb.style.border = '1px solid #00e676';
                    fb.innerHTML = '<i class="fas fa-check-circle green"></i> ¡Correcto! La incertidumbre absoluta es la cantidad que acompaña al valor medido tras el signo ±, en este caso 0.02 m.';
                } else {
                    fb.className = 'mission-feedback warning-box';
                    fb.style.border = '1px solid #ff5252';
                    fb.innerHTML = '<i class="fas fa-times-circle highlight"></i> Incorrecto. Pista: Observa el número que está después del símbolo ±.';
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

<section class="centered"><h1>¿Preguntas?</h1><i class="fas fa-exclamation-triangle icon-large"></i><p>Módulo 1.7</p></section>
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
