<?php require_once '../auth.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhysicsLab — Dinámica</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #060a14;
            --surface: #0c1020;
            --cyan: #00e5ff;
            --indigo: #3d5afe;
            --green: #00e676;
            --orange: #ff9100;
            --red: #ff5252;
            --border-cyan: rgba(0, 229, 255, 0.15);
        }
        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            background: var(--bg);
            color: #c8d6e5;
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .lab-header {
            padding: 16px 30px;
            border-bottom: 1px solid var(--border-cyan);
            background: rgba(6,10,20,0.97);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .lab-header h1 {
            font-size: 1em;
            color: var(--green);
            display: flex; align-items: center; gap: 10px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .btn-back {
            color: #789;
            text-decoration: none;
            border: 1px solid rgba(255,255,255,0.05);
            padding: 8px 16px;
            font-size: 0.78em;
            border-radius: 3px;
            transition: all 0.3s;
            display: flex; align-items: center; gap: 6px;
            background: rgba(255,255,255,0.02);
        }
        .btn-back:hover { color: var(--green); border-color: var(--green); background: rgba(0,230,118,0.05); }

        .lab-tabs {
            display: flex;
            background: rgba(12, 16, 32, 0.5);
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }
        .lab-tab {
            padding: 14px 24px;
            color: #567;
            font-weight: 700;
            font-size: 0.8em;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            border-bottom: 2px solid transparent;
            transition: all 0.3s;
        }
        .lab-tab.active {
            color: var(--green);
            border-bottom-color: var(--green);
            background: rgba(0,230,118,0.02);
        }
        .lab-tab:hover { color: var(--green); }

        .lab-content {
            flex: 1;
            display: none;
            gap: 0;
        }
        .lab-content.active { display: flex; }

        .canvas-area {
            flex: 1;
            position: relative;
            background: linear-gradient(180deg, #080c18 0%, #0a1020 100%);
            border-right: 1px solid #151a2e;
        }
        canvas {
            width: 100%;
            height: 100%;
            display: block;
        }
        .canvas-overlay {
            position: absolute;
            top: 16px;
            left: 16px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.72em;
            color: rgba(0,230,118,0.6);
            pointer-events: none;
        }

        .control-panel {
            width: 340px;
            background: var(--surface);
            padding: 24px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .panel-title {
            font-size: 0.8em;
            color: var(--green);
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 700;
            padding-bottom: 10px;
            border-bottom: 1px solid #151a2e;
        }
        .control-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        .control-group label {
            font-size: 0.75em;
            color: #667;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }
        .control-group .value-display {
            font-family: 'JetBrains Mono', monospace;
            font-size: 1.1em;
            color: #fff;
            font-weight: 700;
        }
        input[type="range"] {
            -webkit-appearance: none;
            appearance: none;
            width: 100%;
            height: 4px;
            background: #1a1e30;
            border-radius: 2px;
            outline: none;
        }
        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: var(--green);
            cursor: pointer;
            box-shadow: 0 0 8px rgba(0,230,118,0.4);
        }

        .btn-action {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, rgba(0,230,118,0.15), rgba(61,90,254,0.15));
            border: 1px solid var(--green);
            color: #fff;
            font-size: 0.85em;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            cursor: pointer;
            border-radius: 4px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn-action:hover {
            background: var(--green);
            color: #060a14;
            box-shadow: 0 0 20px rgba(0,230,118,0.3);
        }
        .btn-secondary {
            background: transparent;
            border: 1px solid #1a1e30;
            color: #567;
        }
        .btn-secondary:hover { color: var(--red); border-color: var(--red); background: rgba(255,82,82,0.05); }

        .results-box {
            background: rgba(0,0,0,0.3);
            border: 1px solid #151a2e;
            border-radius: 4px;
            padding: 14px;
        }
        .results-row {
            display: flex;
            justify-content: space-between;
            font-size: 0.8em;
            margin-bottom: 8px;
        }
        .results-row:last-child { margin-bottom: 0; }
        .results-row span { color: #5c6f84; }
        .results-row b { font-family: 'JetBrains Mono', monospace; color: var(--green); }

        .formula-box {
            background: rgba(0,230,118,0.03);
            border: 1px solid rgba(0,230,118,0.15);
            border-radius: 4px;
            padding: 14px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.75em;
            color: #889;
            line-height: 1.8;
        }
        .formula-box .formula { color: var(--green); font-weight: 700; }

        .legend {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            font-size: 0.7em;
        }
        .legend span { display: flex; align-items: center; gap: 5px; }
        .legend .dot { width: 8px; height: 8px; border-radius: 50%; display: inline-block; }

        @media (max-width: 768px) {
            .lab-container { flex-direction: column; }
            .control-panel { width: 100%; }
            .canvas-area { min-height: 350px; }
            .lab-content.active { flex-direction: column; }
        }
    </style>
</head>
<body>
    <div class="lab-header">
        <h1><i class="fas fa-flask"></i> Laboratorio 3: Dinámica</h1>
        <a href="../dashboard.php" class="btn-back"><i class="fas fa-arrow-left"></i> Volver al Portal</a>
    </div>

    <div class="lab-tabs">
        <div class="lab-tab active" onclick="switchTab('incline')">Plano Inclinado y Fricción</div>
        <div class="lab-tab" onclick="switchTab('atwood')">Máquina de Atwood</div>
    </div>

    <!-- TAB 1: PLANO INCLINADO -->
    <div class="lab-content active" id="content-incline">
        <div class="canvas-area">
            <canvas id="inclineCanvas"></canvas>
            <div class="canvas-overlay">
                <div id="incState">Estado: Equilibrio</div>
                <div id="incAccel">a = 0.00 m/s²</div>
            </div>
        </div>

        <div class="control-panel">
            <div class="panel-title">Parámetros del Plano</div>
            
            <div class="control-group">
                <label>Ángulo de Inclinación ($\theta$)</label>
                <span class="value-display" id="val-angle">30°</span>
                <input type="range" id="param-angle" min="0" max="60" value="30" step="1">
            </div>

            <div class="control-group">
                <label>Masa del Bloque ($m$)</label>
                <span class="value-display" id="val-mass">5 kg</span>
                <input type="range" id="param-mass" min="1" max="20" value="5" step="0.5">
            </div>

            <div class="control-group">
                <label>Coef. Fricción Estática ($\mu_s$)</label>
                <span class="value-display" id="val-us">0.40</span>
                <input type="range" id="param-us" min="0" max="1" value="0.4" step="0.05">
            </div>

            <div class="control-group">
                <label>Coef. Fricción Cinética ($\mu_k$)</label>
                <span class="value-display" id="val-uk">0.25</span>
                <input type="range" id="param-uk" min="0" max="1" value="0.25" step="0.05">
            </div>

            <div style="display:flex; gap:10px;">
                <button class="btn-action" id="btn-incline-run"><i class="fas fa-play"></i> Deslizar</button>
                <button class="btn-action btn-secondary" id="btn-incline-reset"><i class="fas fa-redo"></i> Reset</button>
            </div>

            <div class="panel-title" style="margin-top:8px;">Fuerzas Resultantes</div>
            <div class="results-box">
                <div class="results-row">
                    <span>Peso ($W = mg$)</span>
                    <b id="res-w">49.0 N</b>
                </div>
                <div class="results-row">
                    <span>Normal ($N = W\cos\theta$)</span>
                    <b id="res-n">42.4 N</b>
                </div>
                <div class="results-row">
                    <span>Fuerza Paralela ($W\sin\theta$)</span>
                    <b id="res-fpar">24.5 N</b>
                </div>
                <div class="results-row">
                    <span>Fricción Máxima ($f_{s,\text{max}}$)</span>
                    <b id="res-fsmax">17.0 N</b>
                </div>
            </div>

            <div class="legend">
                <span><span class="dot" style="background:#00e5ff;"></span> Normal N</span>
                <span><span class="dot" style="background:#ff9100;"></span> Peso W</span>
                <span><span class="dot" style="background:#ff5252;"></span> Fricción f</span>
                <span><span class="dot" style="background:#00e676;"></span> Neta F</span>
            </div>
        </div>
    </div>

    <!-- TAB 2: ATWOOD MACHINE -->
    <div class="lab-content" id="content-atwood">
        <div class="canvas-area">
            <canvas id="atwoodCanvas"></canvas>
            <div class="canvas-overlay">
                <div id="atwoodState">Estado: Reposo</div>
                <div id="atwoodAccel">a = 0.00 m/s²</div>
            </div>
        </div>

        <div class="control-panel">
            <div class="panel-title">Masas Suspendidas</div>
            
            <div class="control-group">
                <label>Masa Izquierda ($m_1$)</label>
                <span class="value-display" id="val-m1">6 kg</span>
                <input type="range" id="param-m1" min="1" max="15" value="6" step="0.5">
            </div>

            <div class="control-group">
                <label>Masa Derecha ($m_2$)</label>
                <span class="value-display" id="val-m2">4 kg</span>
                <input type="range" id="param-m2" min="1" max="15" value="4" step="0.5">
            </div>

            <div style="display:flex; gap:10px;">
                <button class="btn-action" id="btn-atwood-run"><i class="fas fa-play"></i> Soltar</button>
                <button class="btn-action btn-secondary" id="btn-atwood-reset"><i class="fas fa-redo"></i> Reset</button>
            </div>

            <div class="panel-title" style="margin-top:8px;">Dinámica del Sistema</div>
            <div class="results-box" style="border-color:rgba(0, 230, 118, 0.35)">
                <div class="results-row">
                    <span>Aceleración ($a$)</span>
                    <b id="res-a-atwood">1.96 m/s²</b>
                </div>
                <div class="results-row">
                    <span>Tensión en Cable ($T$)</span>
                    <b id="res-t-atwood">47.08 N</b>
                </div>
            </div>

            <div class="panel-title">Fórmulas</div>
            <div class="formula-box">
                <span class="formula">a = g • |m₁ - m₂| / (m₁ + m₂)</span><br>
                <span class="formula">T = 2 • g • m₁m₂ / (m₁ + m₂)</span>
            </div>
        </div>
    </div>

    <script>
        function switchTab(tab) {
            document.querySelectorAll('.lab-tab').forEach(el => el.classList.remove('active'));
            document.querySelectorAll('.lab-content').forEach(el => el.classList.remove('active'));
            
            if (tab === 'incline') {
                document.querySelector('.lab-tab:nth-child(1)').classList.add('active');
                document.getElementById('content-incline').classList.add('active');
                resizeIncline();
            } else {
                document.querySelector('.lab-tab:nth-child(2)').classList.add('active');
                document.getElementById('content-atwood').classList.add('active');
                resizeAtwood();
            }
        }

        // ==================== INCLINE PLANE SIMULATION ====================
        const iCanvas = document.getElementById('inclineCanvas');
        const iCtx = iCanvas.getContext('2d');

        const sliderAngle = document.getElementById('param-angle');
        const sliderMass = document.getElementById('param-mass');
        const sliderUs = document.getElementById('param-us');
        const sliderUk = document.getElementById('param-uk');

        const btnIRun = document.getElementById('btn-incline-run');
        const btnIReset = document.getElementById('btn-incline-reset');

        let incAngle = 30; // degrees
        let incMass = 5; // kg
        let incUs = 0.40;
        let incUk = 0.25;

        let incRunning = false;
        let blockPos = 120; // distance along slope (pixels from top-left)
        let blockVel = 0;
        let blockAccel = 0;
        let animInclineId = null;

        function updateInclineParams() {
            incAngle = parseFloat(sliderAngle.value);
            incMass = parseFloat(sliderMass.value);
            incUs = parseFloat(sliderUs.value);
            incUk = parseFloat(sliderUk.value);

            // Keep Uk <= Us logically
            if (incUk > incUs) {
                sliderUk.value = incUs;
                incUk = incUs;
            }

            document.getElementById('val-angle').textContent = incAngle + '°';
            document.getElementById('val-mass').textContent = incMass + ' kg';
            document.getElementById('val-us').textContent = incUs.toFixed(2);
            document.getElementById('val-uk').textContent = incUk.toFixed(2);

            // Compute physics
            const g = 9.81;
            const W = incMass * g;
            const thetaRad = incAngle * Math.PI / 180;
            const N = W * Math.cos(thetaRad);
            const Fparallel = W * Math.sin(thetaRad);
            const Fsmax = N * incUs;

            document.getElementById('res-w').textContent = W.toFixed(1) + ' N';
            document.getElementById('res-n').textContent = N.toFixed(1) + ' N';
            document.getElementById('res-fpar').textContent = Fparallel.toFixed(1) + ' N';
            document.getElementById('res-fsmax').textContent = Fsmax.toFixed(1) + ' N';

            if (!incRunning) {
                blockPos = 120;
                blockVel = 0;
                // Check if it slides automatically from static state
                if (Fparallel > Fsmax) {
                    blockAccel = (Fparallel - N * incUk) / incMass;
                    document.getElementById('incState').textContent = 'Estado: Deslizando';
                    document.getElementById('incAccel').textContent = `a = ${blockAccel.toFixed(2)} m/s²`;
                } else {
                    blockAccel = 0;
                    document.getElementById('incState').textContent = 'Estado: Equilibrio';
                    document.getElementById('incAccel').textContent = 'a = 0.00 m/s²';
                }
                drawInclineFrame();
            }
        }

        [sliderAngle, sliderMass, sliderUs, sliderUk].forEach(s => s.addEventListener('input', updateInclineParams));

        function resizeIncline() {
            iCanvas.width = iCanvas.parentElement.clientWidth;
            iCanvas.height = iCanvas.parentElement.clientHeight;
            drawInclineFrame();
        }

        btnIRun.addEventListener('click', () => {
            const g = 9.81;
            const W = incMass * g;
            const thetaRad = incAngle * Math.PI / 180;
            const N = W * Math.cos(thetaRad);
            const Fparallel = W * Math.sin(thetaRad);
            const Fsmax = N * incUs;

            if (Fparallel <= Fsmax) {
                alert("La componente del peso paralela al plano es menor que la fuerza de fricción estática máxima. ¡El bloque no se moverá! Incrementa el ángulo o disminuye la fricción.");
                return;
            }

            if (!incRunning) {
                incRunning = true;
                btnIRun.innerHTML = '<i class="fas fa-pause"></i> Pausar';
                animateIncline();
            } else {
                incRunning = false;
                btnIRun.innerHTML = '<i class="fas fa-play"></i> Reanudar';
            }
        });

        btnIReset.addEventListener('click', () => {
            if (animInclineId) cancelAnimationFrame(animInclineId);
            incRunning = false;
            btnIRun.innerHTML = '<i class="fas fa-play"></i> Deslizar';
            updateInclineParams();
        });

        function animateIncline() {
            if (!incRunning) return;
            
            blockVel += blockAccel * 0.016 * 15; // accelerated scale
            blockPos += blockVel * 0.016 * 15;

            drawInclineFrame();

            // boundaries (stop at bottom of ramp)
            const maxPos = iCanvas.width - 250;
            if (blockPos >= maxPos) {
                incRunning = false;
                btnIRun.innerHTML = '<i class="fas fa-play"></i> Deslizar';
                document.getElementById('incState').textContent = 'Estado: Detenido (Fin)';
                document.getElementById('incAccel').textContent = 'a = 0.00 m/s²';
                return;
            }

            animInclineId = requestAnimationFrame(animateIncline);
        }

        function drawInclineFrame() {
            iCtx.clearRect(0, 0, iCanvas.width, iCanvas.height);
            
            const startRampX = 100;
            const startRampY = 120;
            const rampLength = iCanvas.width - 200;
            const thetaRad = incAngle * Math.PI / 180;

            const endRampX = startRampX + rampLength * Math.cos(thetaRad);
            const endRampY = startRampY + rampLength * Math.sin(thetaRad);

            // Draw ramp triangle
            iCtx.fillStyle = '#1e293b';
            iCtx.strokeStyle = 'rgba(255,255,255,0.1)';
            iCtx.lineWidth = 1;
            iCtx.beginPath();
            iCtx.moveTo(startRampX, startRampY);
            iCtx.lineTo(endRampX, endRampY);
            iCtx.lineTo(startRampX, endRampY);
            iCtx.closePath();
            iCtx.fill(); iCtx.stroke();

            // Draw ramp surface line
            iCtx.strokeStyle = 'rgba(0, 230, 118, 0.4)';
            iCtx.lineWidth = 4;
            iCtx.beginPath(); iCtx.moveTo(startRampX, startRampY); iCtx.lineTo(endRampX, endRampY); iCtx.stroke();

            // Draw block
            const bx = startRampX + blockPos * Math.cos(thetaRad);
            const by = startRampY + blockPos * Math.sin(thetaRad);
            const size = 45;

            iCtx.save();
            iCtx.translate(bx, by);
            iCtx.rotate(thetaRad);

            // Draw block square
            iCtx.fillStyle = 'var(--indigo)';
            iCtx.strokeStyle = '#fff';
            iCtx.lineWidth = 1.5;
            iCtx.fillRect(-size/2, -size, size, size);
            iCtx.strokeRect(-size/2, -size, size, size);

            // --- DRAW FORCE VECTORS ---
            const g = 9.81;
            const W = incMass * g;
            const N = W * Math.cos(thetaRad);
            const Fparallel = W * Math.sin(thetaRad);
            const friction = incRunning ? N * incUk : Math.min(Fparallel, N * incUs);

            // Vector scales
            const forceScale = 1.5;

            // 1. Normal Force N (pointing perpendicular upwards, relative to slope)
            drawVector(0, -size/2, 0, -size/2 - N * forceScale, 'var(--cyan)');

            // 2. Friction Force f (pointing opposite to motion along slope)
            drawVector(0, -size/2, -friction * forceScale, -size/2, 'var(--red)');

            // 3. Gravity Force W (pointing straight down, relative to world - rotate back)
            iCtx.restore();
            iCtx.save();
            iCtx.translate(bx, by);
            const wy = -size/2 + W * forceScale;
            // Draw weight pointing straight down
            drawVector(0, -size/2, 0, wy, 'var(--orange)');

            // 4. Net Force vector
            const netF = incRunning ? (Fparallel - friction) : 0;
            if (netF > 0.1) {
                // parallel vector
                iCtx.restore();
                iCtx.save();
                iCtx.translate(bx, by);
                iCtx.rotate(thetaRad);
                drawVector(0, -size/2, netF * forceScale, -size/2, 'var(--green)');
            }

            iCtx.restore();

            // Label for angle
            iCtx.fillStyle = '#fff';
            iCtx.font = '11px monospace';
            iCtx.fillText(incAngle + '°', startRampX + 45, endRampY - 10);
        }

        function drawVector(fx, fy, tx, ty, color) {
            iCtx.strokeStyle = color;
            iCtx.lineWidth = 2.5;
            iCtx.beginPath(); iCtx.moveTo(fx, fy); iCtx.lineTo(tx, ty); iCtx.stroke();

            // arrowhead
            const angle = Math.atan2(ty - fy, tx - fx);
            const headlen = 8;
            iCtx.fillStyle = color;
            iCtx.beginPath();
            iCtx.moveTo(tx, ty);
            iCtx.lineTo(tx - headlen * Math.cos(angle - Math.PI/6), ty - headlen * Math.sin(angle - Math.PI/6));
            iCtx.lineTo(tx - headlen * Math.cos(angle + Math.PI/6), ty - headlen * Math.sin(angle + Math.PI/6));
            iCtx.fill();
        }


        // ==================== ATWOOD MACHINE SIMULATION ====================
        const aCanvas = document.getElementById('atwoodCanvas');
        const aCtx = aCanvas.getContext('2d');

        const sliderM1 = document.getElementById('param-m1');
        const sliderM2 = document.getElementById('param-m2');

        const btnARun = document.getElementById('btn-atwood-run');
        const btnAReset = document.getElementById('btn-atwood-reset');

        let mass1 = 6; // left
        let mass2 = 4; // right

        let atwoodRunning = false;
        let atwoodY = 0; // vertical offset of masses (left goes down, right goes up)
        let atwoodVel = 0;
        let atwoodAccel = 0;
        let animAtwoodId = null;

        function updateAtwoodParams() {
            mass1 = parseFloat(sliderM1.value);
            mass2 = parseFloat(sliderM2.value);

            document.getElementById('val-m1').textContent = mass1 + ' kg';
            document.getElementById('val-m2').textContent = mass2 + ' kg';

            // Calculate physics
            const g = 9.81;
            const diff = mass1 - mass2;
            const sum = mass1 + mass2;
            atwoodAccel = g * Math.abs(diff) / sum;
            const Tension = (2 * g * mass1 * mass2) / sum;

            document.getElementById('res-a-atwood').textContent = atwoodAccel.toFixed(2) + ' m/s²';
            document.getElementById('res-t-atwood').textContent = Tension.toFixed(2) + ' N';

            if (!atwoodRunning) {
                atwoodY = 0;
                atwoodVel = 0;
                document.getElementById('atwoodState').textContent = 'Estado: Reposo';
                document.getElementById('atwoodAccel').textContent = `a = ${atwoodAccel.toFixed(2)} m/s²`;
                drawAtwoodFrame();
            }
        }

        [sliderM1, sliderM2].forEach(s => s.addEventListener('input', updateAtwoodParams));

        function resizeAtwood() {
            aCanvas.width = aCanvas.parentElement.clientWidth;
            aCanvas.height = aCanvas.parentElement.clientHeight;
            drawAtwoodFrame();
        }

        btnARun.addEventListener('click', () => {
            if (mass1 === mass2) {
                alert("Las masas son iguales, por lo que el sistema está en equilibrio y no se moverá.");
                return;
            }

            if (!atwoodRunning) {
                atwoodRunning = true;
                btnARun.innerHTML = '<i class="fas fa-pause"></i> Pausar';
                animateAtwood();
            } else {
                atwoodRunning = false;
                btnARun.innerHTML = '<i class="fas fa-play"></i> Reanudar';
            }
        });

        btnAReset.addEventListener('click', () => {
            if (animAtwoodId) cancelAnimationFrame(animAtwoodId);
            atwoodRunning = false;
            btnARun.innerHTML = '<i class="fas fa-play"></i> Soltar';
            updateAtwoodParams();
        });

        function animateAtwood() {
            if (!atwoodRunning) return;

            atwoodVel += atwoodAccel * 0.016 * 12; // speed factor
            const direction = mass1 > mass2 ? 1 : -1;
            atwoodY += direction * atwoodVel * 0.016 * 12;

            drawAtwoodFrame();

            // boundaries (maximum displacement)
            if (Math.abs(atwoodY) >= 120) {
                atwoodRunning = false;
                btnARun.innerHTML = '<i class="fas fa-play"></i> Soltar';
                document.getElementById('atwoodState').textContent = 'Estado: Detenido (Fin)';
                document.getElementById('atwoodAccel').textContent = 'a = 0.00 m/s²';
                return;
            }

            animAtwoodId = requestAnimationFrame(animateAtwood);
        }

        function drawAtwoodFrame() {
            aCtx.clearRect(0, 0, aCanvas.width, aCanvas.height);

            const px = aCanvas.width / 2;
            const py = 60; // pulley center
            const r = 24; // pulley radius

            // Draw pulley
            aCtx.strokeStyle = 'rgba(255,255,255,0.4)';
            aCtx.lineWidth = 3;
            aCtx.fillStyle = '#1e293b';
            aCtx.beginPath(); aCtx.arc(px, py, r, 0, Math.PI*2); aCtx.fill(); aCtx.stroke();
            // pulley axle
            aCtx.fillStyle = '#fff';
            aCtx.beginPath(); aCtx.arc(px, py, 4, 0, Math.PI*2); aCtx.fill();

            // Support bar
            aCtx.strokeStyle = 'rgba(255,255,255,0.1)';
            aCtx.lineWidth = 8;
            aCtx.beginPath(); aCtx.moveTo(px, 0); aCtx.lineTo(px, py - r); aCtx.stroke();

            // Rope endpoints and cords
            const ropeLy = py + 120 + atwoodY;
            const ropeRy = py + 120 - atwoodY;

            aCtx.strokeStyle = '#e2e8f0';
            aCtx.lineWidth = 1.5;
            // Left rope
            aCtx.beginPath(); aCtx.moveTo(px - r, py); aCtx.lineTo(px - r, ropeLy); aCtx.stroke();
            // Right rope
            aCtx.beginPath(); aCtx.moveTo(px + r, py); aCtx.lineTo(px + r, ropeRy); aCtx.stroke();

            // Left block m1
            const m1Size = 25 + mass1 * 2;
            aCtx.fillStyle = 'var(--indigo)';
            aCtx.strokeStyle = '#fff';
            aCtx.lineWidth = 1;
            aCtx.fillRect(px - r - m1Size/2, ropeLy, m1Size, m1Size);
            aCtx.strokeRect(px - r - m1Size/2, ropeLy, m1Size, m1Size);

            // Right block m2
            const m2Size = 25 + mass2 * 2;
            aCtx.fillStyle = 'var(--green)';
            aCtx.fillRect(px + r - m2Size/2, ropeRy, m2Size, m2Size);
            aCtx.strokeRect(px + r - m2Size/2, ropeRy, m2Size, m2Size);

            // Labels on blocks
            aCtx.fillStyle = '#fff';
            aCtx.font = 'bold 11px sans-serif';
            aCtx.fillText(mass1 + 'kg', px - r - 12, ropeLy + m1Size/2 + 4);
            aCtx.fillText(mass2 + 'kg', px + r - 12, ropeRy + m2Size/2 + 4);
        }

        // Initial setup
        window.addEventListener('load', () => {
            updateInclineParams();
            updateAtwoodParams();
            resizeIncline();
            window.addEventListener('resize', () => {
                if (document.getElementById('content-incline').classList.contains('active')) {
                    resizeIncline();
                } else {
                    resizeAtwood();
                }
            });
        });
    </script>
</body>
</html>
