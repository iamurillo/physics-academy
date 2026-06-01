<?php require_once '../auth.php'; ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Física 1.2 — Sistema Internacional de Unidades (SI)</title>
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

    
        

<section class="centered">
        <i class="fas fa-ruler icon-large"></i>
        <h1>Sistema Internacional de Unidades</h1>
        <h3>El Lenguaje Universal de la Medición</h3>
        <p class="accent">Unidad 1 — Módulo 1.2</p>
        <hr><p><small>Física General | Semestre 2026</small></p>
    </section>

    <section>
        <h2><i class="fas fa-history"></i> Historia del SI</h2>
        <ul class="custom-list">
            <li class="fragment"><i class="fas fa-calendar accent"></i> <strong>1791:</strong> Francia crea el sistema métrico decimal durante la Revolución</li>
            <li class="fragment"><i class="fas fa-calendar accent"></i> <strong>1875:</strong> Convención del Metro — 17 naciones firman el tratado</li>
            <li class="fragment"><i class="fas fa-calendar accent"></i> <strong>1960:</strong> Se establece oficialmente el <strong>Sistema Internacional (SI)</strong></li>
            <li class="fragment"><i class="fas fa-calendar accent"></i> <strong>2019:</strong> Redefinición basada en constantes fundamentales de la naturaleza</li>
        </ul>
        <div class="fragment success-box">
            <i class="fas fa-globe green"></i> Hoy, el SI es usado por <strong>todos los países</strong> en ciencia (excepto Myanmar, Liberia y EE.UU. en vida cotidiana).
        </div>
    </section>

    <section>
        <h2><i class="fas fa-th-list"></i> Las 7 Magnitudes Fundamentales</h2>
        <table>
            <thead><tr><th>Magnitud</th><th>Unidad</th><th>Símbolo</th><th>Mide...</th></tr></thead>
            <tbody>
                <tr><td><strong>Longitud</strong></td><td>metro</td><td class="accent"><strong>m</strong></td><td>Distancias</td></tr>
                <tr><td><strong>Masa</strong></td><td>kilogramo</td><td class="accent"><strong>kg</strong></td><td>Cantidad de materia</td></tr>
                <tr><td><strong>Tiempo</strong></td><td>segundo</td><td class="accent"><strong>s</strong></td><td>Duración</td></tr>
                <tr><td><strong>Corriente eléctrica</strong></td><td>ampere</td><td class="accent"><strong>A</strong></td><td>Flujo de carga</td></tr>
                <tr><td><strong>Temperatura</strong></td><td>kelvin</td><td class="accent"><strong>K</strong></td><td>Energía térmica</td></tr>
                <tr><td><strong>Cantidad de sustancia</strong></td><td>mol</td><td class="accent"><strong>mol</strong></td><td>Número de partículas</td></tr>
                <tr><td><strong>Intensidad luminosa</strong></td><td>candela</td><td class="accent"><strong>cd</strong></td><td>Brillo</td></tr>
            </tbody>
        </table>
    </section>

    <section>
        <h2><i class="fas fa-cubes"></i> Unidades Derivadas</h2>
        <p>Se forman <strong>combinando</strong> las magnitudes fundamentales:</p>
        <table style="font-size:0.8em;">
            <thead><tr><th>Magnitud</th><th>Unidad</th><th>Símbolo</th><th>En unidades base</th></tr></thead>
            <tbody>
                <tr><td>Velocidad</td><td>—</td><td>m/s</td><td>m·s⁻¹</td></tr>
                <tr><td>Aceleración</td><td>—</td><td>m/s²</td><td>m·s⁻²</td></tr>
                <tr><td>Fuerza</td><td>newton</td><td class="green"><strong>N</strong></td><td>kg·m·s⁻²</td></tr>
                <tr><td>Energía</td><td>joule</td><td class="orange"><strong>J</strong></td><td>kg·m²·s⁻²</td></tr>
                <tr><td>Potencia</td><td>watt</td><td class="highlight"><strong>W</strong></td><td>kg·m²·s⁻³</td></tr>
                <tr><td>Presión</td><td>pascal</td><td class="accent"><strong>Pa</strong></td><td>kg·m⁻¹·s⁻²</td></tr>
                <tr><td>Frecuencia</td><td>hertz</td><td style="color:#e040fb;"><strong>Hz</strong></td><td>s⁻¹</td></tr>
            </tbody>
        </table>
    </section>

    <section>
        <h2><i class="fas fa-search-plus"></i> Prefijos del SI</h2>
        <div class="flex-container">
            <div class="col">
                <h4 class="green">Múltiplos</h4>
                <table style="font-size:0.8em;">
                    <tr><td>kilo (k)</td><td>10³</td><td>1,000</td></tr>
                    <tr><td>mega (M)</td><td>10⁶</td><td>1,000,000</td></tr>
                    <tr><td>giga (G)</td><td>10⁹</td><td>mil millones</td></tr>
                    <tr><td>tera (T)</td><td>10¹²</td><td>billón</td></tr>
                </table>
            </div>
            <div class="col">
                <h4 class="highlight">Submúltiplos</h4>
                <table style="font-size:0.8em;">
                    <tr><td>mili (m)</td><td>10⁻³</td><td>0.001</td></tr>
                    <tr><td>micro (μ)</td><td>10⁻⁶</td><td>0.000001</td></tr>
                    <tr><td>nano (n)</td><td>10⁻⁹</td><td>milmillonésima</td></tr>
                    <tr><td>pico (p)</td><td>10⁻¹²</td><td>billonésima</td></tr>
                </table>
            </div>
        </div>
        <div class="fragment box" style="text-align:center; margin-top:15px;">
            <strong>Ejemplo:</strong> 5.2 km = 5,200 m &nbsp;|&nbsp; 3.7 μs = 0.0000037 s
        </div>
    </section>

    <section>
        <h2><i class="fas fa-exchange-alt"></i> Otros Sistemas</h2>
        <div class="flex-container">
            <div class="col box" style="border-color:#00e5ff;">
                <h4 style="color:#00e5ff;">SI (MKS)</h4>
                <p>metro, kilogramo, segundo</p>
                <p style="font-size:0.8em; color:#889;"><em>Estándar mundial en ciencia</em></p>
            </div>
            <div class="col box" style="border-color:#ff9100;">
                <h4 class="orange">CGS</h4>
                <p>centímetro, gramo, segundo</p>
                <p style="font-size:0.8em; color:#889;"><em>Usado en química y ciertas ramas</em></p>
            </div>
            <div class="col box" style="border-color:#ff5252;">
                <h4 class="highlight">Inglés</h4>
                <p>pie, libra, segundo</p>
                <p style="font-size:0.8em; color:#889;"><em>EE.UU. en uso cotidiano</em></p>
            </div>
        </div>
        <div class="fragment warning-box">
            <i class="fas fa-exclamation-triangle"></i> <strong>Desastre real:</strong> En 1999, la NASA perdió la sonda Mars Climate Orbiter ($327M) porque un equipo usó pies y otro metros.
        </div>
    </section>

    <section>
        <h2><i class="fas fa-clipboard-check"></i> Resumen</h2>
        <div class="box">
            <ul class="custom-list">
                <li><i class="fas fa-check green"></i> El SI tiene <strong>7 magnitudes fundamentales</strong> (m, kg, s, A, K, mol, cd)</li>
                <li><i class="fas fa-check green"></i> Las unidades derivadas se combinan de las fundamentales</li>
                <li><i class="fas fa-check green"></i> Los prefijos permiten expresar cantidades muy grandes o pequeñas</li>
                <li><i class="fas fa-check green"></i> <strong>Siempre</strong> incluir unidades en tus respuestas</li>
            </ul>
        </div>
        <div class="success-box">
            <i class="fas fa-arrow-right green"></i> <strong>Siguiente:</strong> Magnitudes Escalares y Vectoriales — Módulo 1.3
        </div>
    </section>

    <!-- MINI MISIÓN -->
    <section>
        <h2><i class="fas fa-crosshairs highlight"></i> Mini Misión 1.2</h2>
        <div class="box">
            <p>¿Cuál es el símbolo de la unidad fundamental del SI para la temperatura? (Escribe la letra en mayúscula)</p>
        </div>
        <input type="text" id="mission-1-2-input" class="mission-input" placeholder="Escribe tu respuesta aquí...">
        <button onclick="checkMission1_2()" class="mission-btn">Verificar</button>
        <div id="mission-1-2-feedback" class="mission-feedback"></div>
        <script>
            function checkMission1_2() {
                const ans = document.getElementById('mission-1-2-input').value.trim();
                const fb = document.getElementById('mission-1-2-feedback');
                fb.style.display = 'block';
                if (ans === 'K') {
                    fb.className = 'mission-feedback success-box';
                    fb.style.border = '1px solid #00e676';
                    fb.innerHTML = '<i class="fas fa-check-circle green"></i> ¡Correcto! El kelvin (K) es la unidad fundamental de temperatura en el SI.';
                } else {
                    fb.className = 'mission-feedback warning-box';
                    fb.style.border = '1px solid #ff5252';
                    fb.innerHTML = '<i class="fas fa-times-circle highlight"></i> Incorrecto. Pista: Es una sola letra en mayúscula (Kelvin).';
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

<section class="centered">
        <h1>¿Preguntas?</h1>
        <i class="fas fa-ruler icon-large"></i>
        <p>Física General — Módulo 1.2</p>
    </section>

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
