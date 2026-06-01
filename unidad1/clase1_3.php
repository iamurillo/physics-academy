<?php require_once '../auth.php'; ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Física 1.7 — Magnitudes Escalares y Vectoriales</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.5.0/reveal.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.5.0/theme/night.min.css">
    <link rel="stylesheet" href="../css/physics_presentation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .reveal{font-size:28px}.reveal h1,.reveal h2,.reveal h3{text-transform:none;color:#00e5ff;text-shadow:0 0 10px rgba(0,229,255,0.3);margin-bottom:.4em}.reveal h1{font-size:2.2em}.reveal h2{font-size:1.5em}.reveal .slides section{text-align:left;padding:20px 0}.reveal .centered{text-align:center}.highlight{color:#ff5252;font-weight:bold}.accent{color:#3d5afe}.green{color:#00e676}.orange{color:#ff9100}.box{background:rgba(255,255,255,0.07);padding:18px;border-radius:10px;border:1px solid #00e5ff;margin-bottom:15px}.warning-box{background:rgba(255,82,82,0.08);padding:14px;border-radius:8px;border:1px solid #ff5252;font-size:0.85em;margin-top:15px}.success-box{background:rgba(0,230,118,0.08);padding:14px;border-radius:8px;border:1px solid #00e676;font-size:0.85em;margin-top:15px}.flex-container{display:flex;justify-content:space-between;align-items:flex-start;gap:20px}.col{flex:1}.icon-large{font-size:3em;margin-bottom:15px;color:#00e5ff}table{border-collapse:collapse;width:100%;font-size:0.82em}th{border-bottom:2px solid #00e5ff;padding:10px;text-align:left;color:#00e5ff}td{padding:10px;border-bottom:1px solid #333}ul.custom-list{list-style:none;margin-left:0;padding-left:0}ul.custom-list li{margin-bottom:10px}ul.custom-list li i{width:25px;text-align:center;margin-right:10px}.formula-highlight{background:rgba(0,229,255,0.1);padding:8px 16px;border-radius:6px;border-left:3px solid #00e5ff;font-family:monospace;font-size:1.1em;margin:10px 0;display:inline-block}
        
        /* Arrow design background overlay */
        .reveal {
            background-image: 
                linear-gradient(rgba(0, 229, 255, 0.012) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 229, 255, 0.012) 1px, transparent 1px),
                url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='240' height='240' viewBox='0 0 240 240'><defs><marker id='arrow' viewBox='0 0 10 10' refX='5' refY='5' markerWidth='6' markerHeight='6' orient='auto-start-reverse'><path d='M0,2 L8,5 L0,8 z' fill='rgba(0,229,255,0.08)'/></marker><marker id='arrow2' viewBox='0 0 10 10' refX='5' refY='5' markerWidth='6' markerHeight='6' orient='auto-start-reverse'><path d='M0,2 L8,5 L0,8 z' fill='rgba(61,90,254,0.06)'/></marker></defs><line x1='20' y1='220' x2='220' y2='220' stroke='rgba(0,229,255,0.04)' stroke-width='1.5' marker-end='url(%23arrow)'/><line x1='20' y1='220' x2='20' y2='20' stroke='rgba(0,229,255,0.04)' stroke-width='1.5' marker-end='url(%23arrow)'/><line x1='20' y1='220' x2='180' y2='60' stroke='rgba(0,229,255,0.06)' stroke-width='2' marker-end='url(%23arrow)'/><line x1='180' y1='60' x2='230' y2='110' stroke='rgba(61,90,254,0.05)' stroke-width='1.5' marker-end='url(%23arrow2)'/><line x1='20' y1='220' x2='230' y2='110' stroke='rgba(255,145,0,0.05)' stroke-width='2' stroke-dasharray='4,3'/><path d='M 50,220 A 30,30 0 0 0 45,195' fill='none' stroke='rgba(0,229,255,0.05)' stroke-width='1'/><text x='55' y='190' fill='rgba(0,229,255,0.03)' font-size='10' font-family='monospace'>&theta;</text><text x='100' y='125' fill='rgba(0,229,255,0.04)' font-size='12' font-family='monospace'>A&rarr;</text><text x='200' y='80' fill='rgba(61,90,254,0.04)' font-size='12' font-family='monospace'>B&rarr;</text><text x='120' y='180' fill='rgba(255,145,0,0.04)' font-size='12' font-family='monospace'>R&rarr; = A&rarr; + B&rarr;</text></svg>") !important;
            background-size: 40px 40px, 240px 240px !important;
        }
        
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
        <i class="fas fa-arrows-alt icon-large"></i>
        <h1>Magnitudes Escalares y Vectoriales</h1>
        <p class="accent">Unidad 1 — Módulo 1.7</p>
        <hr><p><small>Física General | Semestre 2026</small></p>
    </section>

    <section>
        <h2><i class="fas fa-circle"></i> Magnitudes Escalares</h2>
        <div class="box">
            <p>Una <strong>magnitud escalar</strong> queda completamente definida con un <span class="accent">número</span> y su <span class="accent">unidad</span>.</p>
        </div>
        <ul class="custom-list">
            <li><i class="fas fa-thermometer-half orange"></i> <strong>Temperatura:</strong> 25 °C</li>
            <li><i class="fas fa-weight-hanging accent"></i> <strong>Masa:</strong> 70 kg</li>
            <li><i class="fas fa-clock green"></i> <strong>Tiempo:</strong> 5.3 s</li>
            <li><i class="fas fa-ruler accent"></i> <strong>Distancia:</strong> 100 m</li>
            <li><i class="fas fa-bolt" style="color:#ffea00;"></i> <strong>Energía:</strong> 500 J</li>
        </ul>
        <div class="fragment success-box">
            <i class="fas fa-info-circle green"></i> Los escalares se suman, restan, multiplican y dividen <strong>aritméticamente</strong> (como números normales).
        </div>
    </section>

    <section>
        <h2><i class="fas fa-arrow-right"></i> Magnitudes Vectoriales</h2>
        <div class="box">
            <p>Una <strong>magnitud vectorial</strong> necesita <span class="accent">magnitud</span> (tamaño), <span class="green">dirección</span> y <span class="orange">sentido</span>.</p>
        </div>
        <ul class="custom-list">
            <li><i class="fas fa-tachometer-alt accent"></i> <strong>Velocidad:</strong> 60 km/h <em>hacia el norte</em></li>
            <li><i class="fas fa-hand-fist green"></i> <strong>Fuerza:</strong> 50 N a <em>30° sobre la horizontal</em></li>
            <li><i class="fas fa-route orange"></i> <strong>Desplazamiento:</strong> 3 m <em>al este</em></li>
            <li><i class="fas fa-forward highlight"></i> <strong>Aceleración:</strong> 9.81 m/s² <em>hacia abajo</em></li>
        </ul>
        <div class="fragment warning-box">
            <i class="fas fa-exclamation-triangle"></i> <strong>¡Cuidado!</strong> Decir "voy a 100 km/h" no es suficiente si no dices <em>hacia dónde</em>. Eso es solo <strong>rapidez</strong> (escalar), no velocidad (vectorial).
        </div>
    </section>

    <section>
        <h2><i class="fas fa-table"></i> Escalar vs Vectorial</h2>
        <table>
            <thead><tr><th>Propiedad</th><th style="color:#00e676;">Escalar</th><th style="color:#ff9100;">Vectorial</th></tr></thead>
            <tbody>
                <tr><td>¿Qué necesita?</td><td>Magnitud + unidad</td><td>Magnitud + dirección + sentido</td></tr>
                <tr><td>Representación</td><td>Número: 5 kg</td><td>Flecha: →</td></tr>
                <tr><td>Suma</td><td>Aritmética</td><td>Ley del paralelogramo / componentes</td></tr>
                <tr><td>Ejemplos</td><td>masa, tiempo, temperatura, energía</td><td>fuerza, velocidad, aceleración, campo E</td></tr>
            </tbody>
        </table>
    </section>

    <section>
        <h2><i class="fas fa-drafting-compass"></i> Representación de Vectores</h2>
        <p>Un vector se representa con una <strong>flecha</strong>:</p>
        <div class="flex-container" style="margin-top:15px;">
            <div class="col box" style="text-align:center;">
                <p class="accent"><strong>Longitud</strong></p>
                <p style="font-size:0.85em;">= magnitud del vector</p>
                <p style="font-size:4em; margin:0;">→</p>
            </div>
            <div class="col box" style="text-align:center;">
                <p class="green"><strong>Dirección</strong></p>
                <p style="font-size:0.85em;">= ángulo respecto a un eje</p>
                <p style="font-size:0.85em;">θ = 45° sobre la horizontal</p>
            </div>
            <div class="col box" style="text-align:center;">
                <p class="orange"><strong>Sentido</strong></p>
                <p style="font-size:0.85em;">= punta de la flecha</p>
                <p style="font-size:0.85em;">← vs →</p>
            </div>
        </div>
        <div class="fragment" style="text-align:center; margin-top:15px;">
            <p>Notación: <span class="formula-highlight">v⃗</span> o <span class="formula-highlight"><strong>v</strong></span> (negritas)</p>
        </div>
    </section>

    <section>
        <h2><i class="fas fa-project-diagram"></i> Componentes de un Vector</h2>
        <p>Todo vector se puede <strong>descomponer</strong> en componentes sobre los ejes X e Y:</p>
        <div style="text-align:center; margin:20px 0;">
            <div class="formula-highlight">Ax = A · cos θ</div><br>
            <div class="formula-highlight">Ay = A · sin θ</div><br>
            <div class="formula-highlight">A = √(Ax² + Ay²)</div><br>
            <div class="formula-highlight">θ = tan⁻¹(Ay / Ax)</div>
        </div>
        <div class="fragment box" style="text-align:center;">
            <strong>Ejemplo:</strong> F = 100 N a 30°<br>
            Fx = 100 cos(30°) = <span class="green"><strong>86.6 N</strong></span><br>
            Fy = 100 sin(30°) = <span class="orange"><strong>50.0 N</strong></span>
        </div>
    </section>

    <section>
        <h2><i class="fas fa-plus-circle"></i> Suma de Vectores</h2>
        <div class="flex-container">
            <div class="col">
                <h4 class="accent">Método Gráfico</h4>
                <ul class="custom-list" style="font-size:0.8em;">
                    <li><i class="fas fa-1 accent"></i> Dibujar <b>A⃗</b> desde el origen.</li>
                    <li><i class="fas fa-2 accent"></i> Colocar la cola de <b>B⃗</b> en la punta de <b>A⃗</b> (punta-cola).</li>
                    <li><i class="fas fa-3 accent"></i> El vector resultante <b>R⃗</b> = <b>A⃗</b> + <b>B⃗</b> va del origen al final.</li>
                </ul>
                <div class="warning-box" style="margin-top:10px; font-size:0.8em;">
                    <strong>Propiedad Conmutativa:</strong><br>
                    <b>A⃗</b> + <b>B⃗</b> = <b>B⃗</b> + <b>A⃗</b>
                </div>
            </div>
            <div class="col">
                <h4 class="green">Método Analítico</h4>
                <div class="box" style="font-size:0.8em;">
                    <p>Sumar componente a componente:</p>
                    <div class="formula-highlight" style="display:block; text-align:center;">R<sub>x</sub> = A<sub>x</sub> + B<sub>x</sub></div>
                    <div class="formula-highlight" style="display:block; text-align:center;">R<sub>y</sub> = A<sub>y</sub> + B<sub>y</sub></div>
                    <p style="margin-top:8px;">Magnitud y dirección:</p>
                    <div class="formula-highlight" style="display:block; text-align:center;">R = √(R<sub>x</sub>² + R<sub>y</sub>²)</div>
                    <div class="formula-highlight" style="display:block; text-align:center;">θ = tan⁻¹(R<sub>y</sub> / R<sub>x</sub>)</div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <h2><i class="fas fa-minus-circle"></i> Resta de Vectores</h2>
        <div class="flex-container">
            <div class="col">
                <h4 class="accent">Concepto Clave</h4>
                <p style="font-size:0.85em;">Restar un vector <b>B⃗</b> de <b>A⃗</b> equivale a sumarle su <strong>vector opuesto</strong> (que tiene la misma magnitud pero dirección invertida 180°):</p>
                <div class="formula-highlight" style="display:block; text-align:center;"><b>R⃗</b> = <b>A⃗</b> - <b>B⃗</b> = <b>A⃗</b> + (-<b>B⃗</b>)</div>
                <div class="warning-box" style="margin-top:10px; font-size:0.8em;">
                    <strong>¡No es conmutativo!</strong><br>
                    <b>A⃗</b> - <b>B⃗</b> ≠ <b>B⃗</b> - <b>A⃗</b>
                </div>
            </div>
            <div class="col">
                <h4 class="green">Componentes de la Resta</h4>
                <div class="box" style="font-size:0.8em;">
                    <p>Restar componente a componente:</p>
                    <div class="formula-highlight" style="display:block; text-align:center;">R<sub>x</sub> = A<sub>x</sub> - B<sub>x</sub></div>
                    <div class="formula-highlight" style="display:block; text-align:center;">R<sub>y</sub> = A<sub>y</sub> - B<sub>y</sub></div>
                    <p style="margin-top:8px;">Magnitud y ángulo resultante:</p>
                    <div class="formula-highlight" style="display:block; text-align:center;">R = √(R<sub>x</sub>² + R<sub>y</sub>²)</div>
                    <div class="formula-highlight" style="display:block; text-align:center;">θ<sub>R</sub> = tan⁻¹(R<sub>y</sub> / R<sub>x</sub>)</div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <h2><i class="fas fa-expand-arrows-alt"></i> Multiplicación por un Escalar</h2>
        <div class="flex-container">
            <div class="col">
                <h4 class="accent">Efecto Geométrico</h4>
                <p style="font-size:0.85em;">Multiplicar un vector <b>A⃗</b> por un número real k genera un nuevo vector <b>C⃗</b> = k·<b>A⃗</b>:</p>
                <ul class="custom-list" style="font-size:0.8em;">
                    <li><i class="fas fa-circle-dot green"></i> **Si k > 0:** Misma dirección, magnitud cambia por factor k.</li>
                    <li><i class="fas fa-circle-dot orange"></i> **Si k < 0:** Dirección opuesta (gira 180°).</li>
                    <li><i class="fas fa-circle-dot highlight"></i> **Si |k| > 1:** El vector se estira.</li>
                    <li><i class="fas fa-circle-dot accent"></i> **Si |k| < 1:** El vector se encoge.</li>
                </ul>
            </div>
            <div class="col">
                <h4 class="green">Cálculo Analítico</h4>
                <div class="box" style="font-size:0.85em;">
                    <p>Se multiplica cada componente por el escalar k:</p>
                    <div class="formula-highlight" style="display:block; text-align:center;">C<sub>x</sub> = k · A<sub>x</sub></div>
                    <div class="formula-highlight" style="display:block; text-align:center;">C<sub>y</sub> = k · A<sub>y</sub></div>
                    <p style="margin-top:10px;">En notación de vectores unitarios:</p>
                    <div class="formula-highlight" style="display:block; text-align:center;"><b>C⃗</b> = (k·A<sub>x</sub>)î + (k·A<sub>y</sub>)ĵ</div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <h2><i class="fas fa-calculator"></i> Multiplicación entre Vectores</h2>
        <div class="flex-container">
            <div class="col">
                <h4 class="accent">1. Producto Escalar (Punto ·)</h4>
                <p style="font-size:0.8em;">El resultado es un **escalar (número)**. Mide la proyección de un vector sobre otro:</p>
                <div class="formula-highlight" style="display:block; font-size:0.85em;"><b>A⃗</b> · <b>B⃗</b> = A · B · cos θ</div>
                <div class="formula-highlight" style="display:block; font-size:0.85em;"><b>A⃗</b> · <b>B⃗</b> = A<sub>x</sub>·B<sub>x</sub> + A<sub>y</sub>·B<sub>y</sub></div>
                <p style="font-size:0.75em; color:var(--primary-green); margin-top:5px;"><i class="fas fa-flask"></i> **Ejemplo Físico:** Trabajo mecánico (W = <b>F⃗</b> · <b>d⃗</b>).</p>
            </div>
            <div class="col">
                <h4 class="orange">2. Producto Vectorial (Cruz ×)</h4>
                <p style="font-size:0.8em;">El resultado es un **vector perpendicular** al plano de <b>A⃗</b> y <b>B⃗</b>.</p>
                <p style="font-size:0.8em;">Magnitud:</p>
                <div class="formula-highlight" style="display:block; font-size:0.85em;">|<b>A⃗</b> × <b>B⃗</b>| = A · B · sen θ</div>
                <p style="font-size:0.8em;">Dirección: **Regla de la mano derecha**.</p>
                <p style="font-size:0.75em; color:var(--primary-orange); margin-top:5px;"><i class="fas fa-flask"></i> **Ejemplo Físico:** Torque o momento de fuerza (<b>τ⃗</b> = <b>r⃗</b> × <b>F⃗</b>).</p>
            </div>
        </div>
    </section>

    <section>
        <h2><i class="fas fa-pencil-alt"></i> Ejemplo Resuelto Integral</h2>
        <div class="box" style="font-size:0.8em;">
            <p>Sean los vectores: <b>A⃗</b> = 3î + 4ĵ y <b>B⃗</b> = 2î - 1ĵ</p>
        </div>
        <div class="flex-container" style="font-size:0.75em;">
            <div class="col box">
                <p class="accent"><strong>1. Suma (<b>A⃗</b> + <b>B⃗</b>):</strong></p>
                <b>R⃗</b> = (3+2)î + (4 - 1)ĵ = <b>5î + 3ĵ</b>
                <p class="orange" style="margin-top:8px;"><strong>2. Resta (<b>A⃗</b> - <b>B⃗</b>):</strong></p>
                <b>D⃗</b> = (3-2)î + (4 - (-1))ĵ = <b>1î + 5ĵ</b>
            </div>
            <div class="col box">
                <p class="green"><strong>3. Escalar (2<b>A⃗</b>):</strong></p>
                <b>C⃗</b> = 2(3)î + 2(4)ĵ = <b>6î + 8ĵ</b>
                <p class="highlight" style="margin-top:8px;"><strong>4. Producto Escalar (<b>A⃗</b> · <b>B⃗</b>):</strong></p>
                <b>A⃗</b> · <b>B⃗</b> = (3)(2) + (4)(-1) = 6 - 4 = <b>2</b> (es un número)
            </div>
        </div>
    </section>

    <section>
        <h2><i class="fas fa-clipboard-check"></i> Resumen de Operaciones</h2>
        <div class="box" style="font-size:0.85em;">
            <ul class="custom-list">
                <li><i class="fas fa-check green"></i> **Suma / Resta:** Se realiza sumando/restando componentes homólogas.</li>
                <li><i class="fas fa-check green"></i> **Escalar:** Multiplica magnitud y componentes; invierte sentido si es negativo.</li>
                <li><i class="fas fa-check green"></i> **Producto Escalar:** <b>A⃗</b> · <b>B⃗</b> = A<sub>x</sub>·B<sub>x</sub> + A<sub>y</sub>·B<sub>y</sub>, da un valor escalar.</li>
                <li><i class="fas fa-check green"></i> **Producto Vectorial:** Genera un vector perpendicular cuya magnitud es A · B · sen θ.</li>
            </ul>
        </div>
        <div class="success-box"><i class="fas fa-arrow-right green"></i> **Fin de la Unidad 1.** Siguiente: **Cinemática — Módulo 2.1**</div>
    </section>

    <!-- MINI MISIÓN -->
    <section>
        <h2><i class="fas fa-crosshairs highlight"></i> Mini Misión 1.7</h2>
        <div class="box">
            <p>Si <b>A⃗</b> = 2î + 3ĵ y <b>B⃗</b> = 4î - 2ĵ, calcula el producto escalar <b>A⃗</b> · <b>B⃗</b>. (Escribe solo el número resultante)</p>
        </div>
        <input type="text" id="mission-1-7-input" class="mission-input" placeholder="Escribe tu respuesta aquí...">
        <button onclick="checkMission1_7()" class="mission-btn">Verificar</button>
        <div id="mission-1-7-feedback" class="mission-feedback"></div>
        <script>
            function checkMission1_7() {
                const ans = document.getElementById('mission-1-7-input').value.trim();
                const fb = document.getElementById('mission-1-7-feedback');
                fb.style.display = 'block';
                if (ans === '2') {
                    fb.className = 'mission-feedback success-box';
                    fb.style.border = '1px solid #00e676';
                    fb.innerHTML = '<i class="fas fa-check-circle green"></i> ¡Correcto! <b>A⃗</b> · <b>B⃗</b> = (2)(4) + (3)(-2) = 8 - 6 = 2.';
                } else {
                    fb.className = 'mission-feedback warning-box';
                    fb.style.border = '1px solid #ff5252';
                    fb.innerHTML = '<i class="fas fa-times-circle highlight"></i> Incorrecto. Pista: Multiplica las componentes x (2 * 4) y las y (3 * -2), luego súmalas.';
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

<section class="centered"><h1>¿Preguntas?</h1><i class="fas fa-arrows-alt icon-large"></i><p>Módulo 1.7</p></section>

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
