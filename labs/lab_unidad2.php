<?php require_once '../auth.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhysicsLab — Cinemática</title>
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
            color: var(--indigo);
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
        .btn-back:hover { color: var(--indigo); border-color: var(--indigo); background: rgba(61,90,254,0.05); }

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
            color: var(--indigo);
            border-bottom-color: var(--indigo);
            background: rgba(61,90,254,0.02);
        }
        .lab-tab:hover { color: var(--indigo); }

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
            color: rgba(61,90,254,0.6);
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
            color: var(--indigo);
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
            background: var(--indigo);
            cursor: pointer;
            box-shadow: 0 0 8px rgba(61,90,254,0.4);
        }

        .btn-action {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, rgba(61,90,254,0.15), rgba(0,229,255,0.15));
            border: 1px solid var(--indigo);
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
            background: var(--indigo);
            color: #fff;
            box-shadow: 0 0 20px rgba(61,90,254,0.3);
        }
        .btn-secondary {
            background: transparent;
            border: 1px solid #1a1e30;
            color: #567;
        }
        .btn-secondary:hover { color: var(--red); border-color: var(--red); background: rgba(255,82,82,0.05); }

        .results-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }
        .result-box {
            background: rgba(0,0,0,0.3);
            border: 1px solid #151a2e;
            border-radius: 4px;
            padding: 12px;
            text-align: center;
        }
        .result-box .result-label {
            font-size: 0.65em;
            color: #556;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 4px;
        }
        .result-box .result-value {
            font-family: 'JetBrains Mono', monospace;
            font-size: 1em;
            color: var(--indigo);
            font-weight: 700;
        }

        .formula-box {
            background: rgba(61,90,254,0.03);
            border: 1px solid rgba(61,90,254,0.15);
            border-radius: 4px;
            padding: 14px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.75em;
            color: #889;
            line-height: 1.8;
        }
        .formula-box .formula { color: var(--indigo); font-weight: 700; }

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
        <h1><i class="fas fa-flask"></i> Laboratorio 2: Cinemática</h1>
        <a href="../dashboard.php" class="btn-back"><i class="fas fa-arrow-left"></i> Volver al Portal</a>
    </div>

    <div class="lab-tabs">
        <div class="lab-tab active" onclick="switchTab('graphs')">Movimiento MRU/MRUA (Gráficas)</div>
        <div class="lab-tab" onclick="switchTab('parabolic')">Tiro Parabólico 2D</div>
    </div>

    <!-- TAB 1: MRU/MRUA GRAFICAS -->
    <div class="lab-content active" id="content-graphs">
        <div class="canvas-area">
            <canvas id="graphsCanvas"></canvas>
            <div class="canvas-overlay">
                <div id="graphsTime">t = 0.00 s</div>
                <div id="graphsX">x = 0.00 m</div>
                <div id="graphsV">v = 0.00 m/s</div>
            </div>
        </div>

        <div class="control-panel">
            <div class="panel-title">Parámetros del Móvil</div>
            
            <div class="control-group">
                <label>Posición Inicial ($x_0$)</label>
                <span class="value-display" id="val-x0">0 m</span>
                <input type="range" id="param-x0" min="0" max="50" value="0" step="1">
            </div>

            <div class="control-group">
                <label>Velocidad Inicial ($v_0$)</label>
                <span class="value-display" id="val-v0">10 m/s</span>
                <input type="range" id="param-v0" min="0" max="30" value="10" step="0.5">
            </div>

            <div class="control-group">
                <label>Aceleración ($a$)</label>
                <span class="value-display" id="val-a">2.0 m/s²</span>
                <input type="range" id="param-a" min="-10" max="10" value="2.0" step="0.2">
            </div>

            <div style="display:flex; gap:10px;">
                <button class="btn-action" id="btn-graphs-start"><i class="fas fa-play"></i> Iniciar</button>
                <button class="btn-action btn-secondary" id="btn-graphs-reset"><i class="fas fa-redo"></i> Reset</button>
            </div>

            <div class="panel-title" style="margin-top:8px;">Gráficas de Movimiento</div>
            <p style="font-size:0.72em; color:#789;">La parte superior dibuja la posición del móvil. La parte inferior grafica $x(t)$ [Cian], $v(t)$ [Índigo], y $a(t)$ [Naranja].</p>

            <div class="panel-title">Fórmulas</div>
            <div class="formula-box">
                <span class="formula">x(t) = x₀ + v₀t + ½at²</span><br>
                <span class="formula">v(t) = v₀ + at</span>
            </div>
        </div>
    </div>

    <!-- TAB 2: TIRO PARABOLICO 2D -->
    <div class="lab-content" id="content-parabolic">
        <div class="canvas-area">
            <canvas id="parabolicCanvas"></canvas>
            <div class="canvas-overlay">
                <div>g = 9.81 m/s²</div>
                <div id="parabolicTime">t = 0.00 s</div>
            </div>
        </div>

        <div class="control-panel">
            <div class="panel-title">Lanzamiento</div>
            
            <div class="control-group">
                <label>Velocidad Inicial ($v_0$)</label>
                <span class="value-display" id="val-pv0">30 m/s</span>
                <input type="range" id="param-pv0" min="5" max="80" value="30" step="1">
            </div>

            <div class="control-group">
                <label>Ángulo de Disparo ($\theta$)</label>
                <span class="value-display" id="val-pangle">45°</span>
                <input type="range" id="param-pangle" min="5" max="85" value="45" step="1">
            </div>

            <div class="control-group">
                <label>Altura del Cañón ($h_0$)</label>
                <span class="value-display" id="val-ph0">0 m</span>
                <input type="range" id="param-ph0" min="0" max="50" value="0" step="1">
            </div>

            <div style="display:flex; gap:10px;">
                <button class="btn-action" id="btn-parabolic-fire"><i class="fas fa-play"></i> Lanzar</button>
                <button class="btn-action btn-secondary" id="btn-parabolic-reset"><i class="fas fa-redo"></i> Reset</button>
            </div>

            <div class="panel-title" style="margin-top:8px;">Resultados Analíticos</div>
            <div class="results-grid">
                <div class="result-box">
                    <div class="result-label">Alcance (R)</div>
                    <div class="result-value" id="res-r">— m</div>
                </div>
                <div class="result-box">
                    <div class="result-label">Altura Máx.</div>
                    <div class="result-value" id="res-h">— m</div>
                </div>
                <div class="result-box">
                    <div class="result-label">Tiempo total</div>
                    <div class="result-value" id="res-t">— s</div>
                </div>
                <div class="result-box">
                    <div class="result-label">V. Impacto</div>
                    <div class="result-value" id="res-v">— m/s</div>
                </div>
            </div>

            <div class="legend">
                <span><span class="dot" style="background:#00e5ff;"></span> Trayectoria</span>
                <span><span class="dot" style="background:#ff9100;"></span> V_total</span>
                <span><span class="dot" style="background:#00e676;"></span> V_componentes</span>
            </div>
        </div>
    </div>

    <script>
        function switchTab(tab) {
            document.querySelectorAll('.lab-tab').forEach(el => el.classList.remove('active'));
            document.querySelectorAll('.lab-content').forEach(el => el.classList.remove('active'));
            
            if (tab === 'graphs') {
                document.querySelector('.lab-tab:nth-child(1)').classList.add('active');
                document.getElementById('content-graphs').classList.add('active');
                resizeGraphs();
            } else {
                document.querySelector('.lab-tab:nth-child(2)').classList.add('active');
                document.getElementById('content-parabolic').classList.add('active');
                resizeParabolic();
            }
        }

        // ==================== MRU / MRUA SIMULATION ====================
        const gCanvas = document.getElementById('graphsCanvas');
        const gCtx = gCanvas.getContext('2d');
        const btnGStart = document.getElementById('btn-graphs-start');
        const btnGReset = document.getElementById('btn-graphs-reset');

        const sliderX0 = document.getElementById('param-x0');
        const sliderV0 = document.getElementById('param-v0');
        const sliderA = document.getElementById('param-a');

        let graphsActive = false;
        let graphsTime = 0;
        let graphsData = []; // array of {t, x, v, a}
        let maxDuration = 10; // seconds

        // Mobile car physics parameters
        let pX0 = 0, pV0 = 10, pA = 2;

        function updateGraphsDisplays() {
            pX0 = parseFloat(sliderX0.value);
            pV0 = parseFloat(sliderV0.value);
            pA = parseFloat(sliderA.value);
            document.getElementById('val-x0').textContent = pX0 + ' m';
            document.getElementById('val-v0').textContent = pV0 + ' m/s';
            document.getElementById('val-a').textContent = pA.toFixed(1) + ' m/s²';
            if (!graphsActive) {
                graphsTime = 0;
                graphsData = [];
                drawGraphsFrame();
            }
        }

        [sliderX0, sliderV0, sliderA].forEach(s => s.addEventListener('input', updateGraphsDisplays));

        function resizeGraphs() {
            gCanvas.width = gCanvas.parentElement.clientWidth;
            gCanvas.height = gCanvas.parentElement.clientHeight;
            drawGraphsFrame();
        }

        btnGStart.addEventListener('click', () => {
            if (!graphsActive) {
                graphsActive = true;
                btnGStart.innerHTML = '<i class="fas fa-pause"></i> Pausar';
                animateGraphs();
            } else {
                graphsActive = false;
                btnGStart.innerHTML = '<i class="fas fa-play"></i> Reanudar';
            }
        });

        btnGReset.addEventListener('click', () => {
            graphsActive = false;
            graphsTime = 0;
            graphsData = [];
            btnGStart.innerHTML = '<i class="fas fa-play"></i> Iniciar';
            updateGraphsDisplays();
        });

        function animateGraphs() {
            if (!graphsActive) return;
            graphsTime += 0.016 * 1.5; // Speed multiplier

            // Physics calculation
            const x = pX0 + pV0 * graphsTime + 0.5 * pA * graphsTime * graphsTime;
            const v = pV0 + pA * graphsTime;
            const a = pA;

            graphsData.push({ t: graphsTime, x, v, a });

            document.getElementById('graphsTime').textContent = `t = ${graphsTime.toFixed(2)} s`;
            document.getElementById('graphsX').textContent = `x = ${x.toFixed(2)} m`;
            document.getElementById('graphsV').textContent = `v = ${v.toFixed(2)} m/s`;

            drawGraphsFrame();

            // Stop if car reaches wall or time limit
            if (graphsTime >= maxDuration || x >= 280 || x < -20) {
                graphsActive = false;
                btnGStart.innerHTML = '<i class="fas fa-play"></i> Iniciar';
                return;
            }

            requestAnimationFrame(animateGraphs);
        }

        function drawGraphsFrame() {
            gCtx.clearRect(0, 0, gCanvas.width, gCanvas.height);
            
            const partitionY = 130; // split screen for physical track (top) and graphs (bottom)

            // Draw separation line
            gCtx.strokeStyle = 'rgba(255,255,255,0.08)';
            gCtx.lineWidth = 2;
            gCtx.beginPath(); gCtx.moveTo(0, partitionY); gCtx.lineTo(gCanvas.width, partitionY); gCtx.stroke();

            // --- DRAW TRACK & CAR (TOP SECTION) ---
            const trackY = 90;
            gCtx.strokeStyle = '#1e293b';
            gCtx.lineWidth = 4;
            gCtx.beginPath(); gCtx.moveTo(20, trackY); gCtx.lineTo(gCanvas.width - 20, trackY); gCtx.stroke();

            // tick marks on track
            gCtx.strokeStyle = 'rgba(255,255,255,0.1)';
            gCtx.lineWidth = 1;
            gCtx.fillStyle = 'rgba(255,255,255,0.3)';
            gCtx.font = '9px monospace';
            const scaleFactorX = (gCanvas.width - 60) / 300; // 300 meters maximum track length visual

            for (let m = 0; m <= 300; m += 30) {
                const tx = 30 + m * scaleFactorX;
                gCtx.beginPath(); gCtx.moveTo(tx, trackY); gCtx.lineTo(tx, trackY + 8); gCtx.stroke();
                gCtx.fillText(m + 'm', tx - 8, trackY + 22);
            }

            // Draw current car position
            const currentX = graphsData.length > 0 ? graphsData[graphsData.length - 1].x : pX0;
            const carVisualX = 30 + currentX * scaleFactorX;

            // Car body
            gCtx.fillStyle = 'var(--indigo)';
            gCtx.shadowColor = 'var(--indigo)';
            gCtx.shadowBlur = 10;
            gCtx.beginPath();
            gCtx.roundRect(carVisualX - 16, trackY - 22, 32, 14, 4);
            gCtx.fill();
            gCtx.shadowBlur = 0;

            // Cabin
            gCtx.fillStyle = '#00e5ff';
            gCtx.beginPath();
            gCtx.roundRect(carVisualX - 6, trackY - 32, 16, 11, 2);
            gCtx.fill();

            // Wheels
            gCtx.fillStyle = '#fff';
            gCtx.beginPath(); gCtx.arc(carVisualX - 9, trackY - 6, 6, 0, Math.PI*2); gCtx.fill();
            gCtx.beginPath(); gCtx.arc(carVisualX + 9, trackY - 6, 6, 0, Math.PI*2); gCtx.fill();

            // --- DRAW LIVE GRAPHS (BOTTOM SECTION) ---
            const graphsW = gCanvas.width - 100;
            const graphsH = gCanvas.height - partitionY - 60;
            const graphX = 60;
            const graphY = partitionY + 30;

            // Draw background graph axes
            gCtx.strokeStyle = 'rgba(255,255,255,0.1)';
            gCtx.lineWidth = 1.5;
            gCtx.beginPath(); gCtx.moveTo(graphX, graphY); gCtx.lineTo(graphX, graphY + graphsH); gCtx.lineTo(graphX + graphsW, graphY + graphsH); gCtx.stroke();

            // Labels on Axes
            gCtx.fillStyle = 'rgba(255,255,255,0.4)';
            gCtx.font = '10px monospace';
            gCtx.fillText("t (s)", graphX + graphsW + 10, graphY + graphsH + 4);
            gCtx.fillText("Magnitud", graphX - 45, graphY - 10);

            // Draw graph lines if data exists
            if (graphsData.length > 1) {
                // Determine max limits dynamically
                let maxX = Math.max(10, ...graphsData.map(d => d.x));
                let maxV = Math.max(5, ...graphsData.map(d => d.v));
                let maxA = Math.max(2, ...graphsData.map(d => Math.abs(d.a)));

                const limitVal = Math.max(maxX, maxV, maxA) * 1.1;

                // X Plot (Cian)
                gCtx.strokeStyle = 'var(--cyan)';
                gCtx.lineWidth = 2;
                gCtx.beginPath();
                graphsData.forEach((d, i) => {
                    const gx = graphX + (d.t / maxDuration) * graphsW;
                    const gy = graphY + graphsH - (d.x / limitVal) * graphsH;
                    if (i === 0) gCtx.moveTo(gx, gy); else gCtx.lineTo(gx, gy);
                });
                gCtx.stroke();

                // V Plot (Indigo)
                gCtx.strokeStyle = 'var(--indigo)';
                gCtx.lineWidth = 2;
                gCtx.beginPath();
                graphsData.forEach((d, i) => {
                    const gx = graphX + (d.t / maxDuration) * graphsW;
                    const gy = graphY + graphsH - (d.v / limitVal) * graphsH;
                    if (i === 0) gCtx.moveTo(gx, gy); else gCtx.lineTo(gx, gy);
                });
                gCtx.stroke();

                // A Plot (Orange)
                gCtx.strokeStyle = 'var(--orange)';
                gCtx.lineWidth = 2;
                gCtx.beginPath();
                graphsData.forEach((d, i) => {
                    const gx = graphX + (d.t / maxDuration) * graphsW;
                    const gy = graphY + graphsH - (d.a / limitVal) * graphsH;
                    if (i === 0) gCtx.moveTo(gx, gy); else gCtx.lineTo(gx, gy);
                });
                gCtx.stroke();

                // Legend
                gCtx.font = '10px Inter';
                gCtx.fillStyle = 'var(--cyan)'; gCtx.fillText("■ Posición x(t)", graphX, graphY + graphsH + 25);
                gCtx.fillStyle = 'var(--indigo)'; gCtx.fillText("■ Velocidad v(t)", graphX + 110, graphY + graphsH + 25);
                gCtx.fillStyle = 'var(--orange)'; gCtx.fillText("■ Aceleración a(t)", graphX + 230, graphY + graphsH + 25);
            }
        }


        // ==================== TIRO PARABOLICO SIMULATION ====================
        const pCanvas = document.getElementById('parabolicCanvas');
        const pCtx = pCanvas.getContext('2d');

        const sliderPV0 = document.getElementById('param-pv0');
        const sliderPAngle = document.getElementById('param-pangle');
        const sliderPH0 = document.getElementById('param-ph0');

        const btnPFire = document.getElementById('btn-parabolic-fire');
        const btnPReset = document.getElementById('btn-parabolic-reset');

        let pRunning = false;
        let pProjectile = null;
        let pTrails = [];
        let pScale = 8;
        let pOriginX = 60;
        let pOriginY = 0;
        let pAnimId = null;

        function updateParabolicDisplays() {
            document.getElementById('val-pv0').textContent = sliderPV0.value + ' m/s';
            document.getElementById('val-pangle').textContent = sliderPAngle.value + '°';
            document.getElementById('val-ph0').textContent = sliderPH0.value + ' m';
            if (!pRunning) {
                drawParabolicFrame();
                drawParabolicPreview();
            }
        }

        [sliderPV0, sliderPAngle, sliderPH0].forEach(s => s.addEventListener('input', updateParabolicDisplays));

        function resizeParabolic() {
            pCanvas.width = pCanvas.parentElement.clientWidth;
            pCanvas.height = pCanvas.parentElement.clientHeight;
            pOriginY = pCanvas.height - 50;
            drawParabolicFrame();
            drawParabolicPreview();
        }

        btnPFire.addEventListener('click', fireParabolic);
        btnPReset.addEventListener('click', resetParabolic);

        function fireParabolic() {
            if (pRunning) return;
            pRunning = true;
            
            const v0 = parseFloat(sliderPV0.value);
            const angle = parseFloat(sliderPAngle.value) * Math.PI / 180;
            const h0 = parseFloat(sliderPH0.value);
            const g = 9.81;

            const vx = v0 * Math.cos(angle);
            const vy = v0 * Math.sin(angle);

            // Compute physics
            const tUp = vy / g;
            const hMax = h0 + (vy * vy) / (2 * g);
            const disc = vy * vy + 2 * g * h0;
            const tTotal = (vy + Math.sqrt(Math.max(0, disc))) / g;
            const range = vx * tTotal;
            const vImpact = Math.sqrt(vx * vx + (vy - g * tTotal) ** 2);

            // Adjust scale
            const maxDim = Math.max(range, hMax);
            const availW = pCanvas.width - 120;
            const availH = pCanvas.height - 100;
            pScale = Math.min(availW / (maxDim * 1.1), availH / (hMax * 1.2));
            pScale = Math.max(pScale, 2);
            pScale = Math.min(pScale, 25);

            pProjectile = { x: 0, y: h0, vx, vy, t: 0, h0, tTotal, range, hMax, vImpact };
            pTrails = [{ x: 0, y: h0 }];

            document.getElementById('res-r').textContent = range.toFixed(1) + ' m';
            document.getElementById('res-h').textContent = hMax.toFixed(1) + ' m';
            document.getElementById('res-t').textContent = tTotal.toFixed(2) + ' s';
            document.getElementById('res-v').textContent = vImpact.toFixed(1) + ' m/s';

            animateParabolic();
        }

        function animateParabolic() {
            if (!pProjectile) return;
            pProjectile.t += 0.016 * 1.8; // speed multiplier

            const t = pProjectile.t;
            const g = 9.81;
            pProjectile.x = pProjectile.vx * t;
            pProjectile.y = pProjectile.h0 + pProjectile.vy * t - 0.5 * g * t * t;

            pTrails.push({ x: pProjectile.x, y: pProjectile.y });
            document.getElementById('parabolicTime').textContent = `t = ${t.toFixed(2)} s`;

            drawParabolicFrame();
            drawParabolicTrails();
            drawParabolicBullet();
            drawParabolicVectors();

            if (pProjectile.y <= 0 || t > pProjectile.tTotal + 0.1) {
                pRunning = false;
                pProjectile.y = Math.max(0, pProjectile.y);
                drawParabolicFrame();
                drawParabolicTrails();
                drawParabolicBullet();
                return;
            }

            pAnimId = requestAnimationFrame(animateParabolic);
        }

        function toPX(x) { return pOriginX + x * pScale; }
        function toPY(y) { return pOriginY - y * pScale; }

        function drawParabolicFrame() {
            pCtx.clearRect(0, 0, pCanvas.width, pCanvas.height);
            
            // Grid
            pCtx.strokeStyle = 'rgba(255, 255, 255, 0.03)';
            pCtx.lineWidth = 1;
            for (let i = 0; i < pCanvas.width; i += 40) {
                pCtx.beginPath(); pCtx.moveTo(i, 0); pCtx.lineTo(i, pCanvas.height); pCtx.stroke();
            }
            for (let i = 0; i < pCanvas.height; i += 40) {
                pCtx.beginPath(); pCtx.moveTo(0, i); pCtx.lineTo(pCanvas.width, i); pCtx.stroke();
            }

            // Floor
            pCtx.strokeStyle = 'rgba(61, 90, 254, 0.3)';
            pCtx.lineWidth = 2.5;
            pCtx.beginPath(); pCtx.moveTo(0, pOriginY); pCtx.lineTo(pCanvas.width, pOriginY); pCtx.stroke();

            // X scale ticks
            pCtx.fillStyle = 'rgba(61,90,254,0.4)';
            pCtx.font = '10px monospace';
            const tickSpacing = Math.max(10, Math.round(50 / pScale / 10) * 10);
            for (let m = 0; m <= 300; m += tickSpacing) {
                const tx = toPX(m);
                if (tx > pCanvas.width - 20) break;
                pCtx.fillText(m + 'm', tx - 8, pOriginY + 20);
                pCtx.beginPath(); pCtx.moveTo(tx, pOriginY - 4); pCtx.lineTo(tx, pOriginY + 4); pCtx.stroke();
            }
            for (let m = tickSpacing; m <= 200; m += tickSpacing) {
                const ty = toPY(m);
                if (ty < 20) break;
                pCtx.fillText(m + 'm', 15, ty + 4);
                pCtx.beginPath(); pCtx.moveTo(pOriginX - 4, ty); pCtx.lineTo(pOriginX + 4, ty); pCtx.stroke();
            }
        }

        function drawParabolicPreview() {
            const v0 = parseFloat(sliderPV0.value);
            const angle = parseFloat(sliderPAngle.value) * Math.PI / 180;
            const h0 = parseFloat(sliderPH0.value);

            const cx = toPX(0);
            const cy = toPY(h0);

            // draw cannon
            const len = 30;
            const ex = cx + len * Math.cos(-angle);
            const ey = cy + len * Math.sin(-angle);

            pCtx.strokeStyle = 'rgba(61,90,254,0.6)';
            pCtx.lineWidth = 6;
            pCtx.lineCap = 'round';
            pCtx.beginPath(); pCtx.moveTo(cx, cy); pCtx.lineTo(ex, ey); pCtx.stroke();

            pCtx.fillStyle = 'rgba(61,90,254,0.4)';
            pCtx.beginPath(); pCtx.arc(cx, cy, 8, 0, Math.PI*2); pCtx.fill();
        }

        function drawParabolicTrails() {
            if (pTrails.length < 2) return;
            pCtx.strokeStyle = 'rgba(61, 90, 254, 0.6)';
            pCtx.lineWidth = 2;
            pCtx.beginPath();
            pTrails.forEach((p, i) => {
                const tx = toPX(p.x);
                const ty = toPY(Math.max(0, p.y));
                if (i === 0) pCtx.moveTo(tx, ty); else pCtx.lineTo(tx, ty);
            });
            pCtx.stroke();
        }

        function drawParabolicBullet() {
            if (!pProjectile) return;
            const tx = toPX(pProjectile.x);
            const ty = toPY(Math.max(0, pProjectile.y));

            pCtx.fillStyle = '#00e5ff';
            pCtx.shadowColor = '#00e5ff';
            pCtx.shadowBlur = 10;
            pCtx.beginPath(); pCtx.arc(tx, ty, 6, 0, Math.PI*2); pCtx.fill();
            pCtx.shadowBlur = 0;
        }

        function drawParabolicVectors() {
            if (!pProjectile || !pRunning) return;
            const tx = toPX(pProjectile.x);
            const ty = toPY(Math.max(0, pProjectile.y));
            const g = 9.81;

            const currentVy = pProjectile.vy - g * pProjectile.t;
            const scaleVec = 1.5;

            // horizontal vx
            pCtx.strokeStyle = 'rgba(0,230,118,0.7)';
            pCtx.lineWidth = 2;
            pCtx.beginPath(); pCtx.moveTo(tx, ty); pCtx.lineTo(tx + pProjectile.vx * scaleVec, ty); pCtx.stroke();

            // vertical vy
            pCtx.beginPath(); pCtx.moveTo(tx, ty); pCtx.lineTo(tx, ty - currentVy * scaleVec); pCtx.stroke();

            // total v
            pCtx.strokeStyle = 'rgba(255,145,0,0.8)';
            pCtx.lineWidth = 2.5;
            pCtx.beginPath(); pCtx.moveTo(tx, ty); pCtx.lineTo(tx + pProjectile.vx * scaleVec, ty - currentVy * scaleVec); pCtx.stroke();
        }

        function resetParabolic() {
            if (pAnimId) cancelAnimationFrame(pAnimId);
            pRunning = false;
            pProjectile = null;
            pTrails = [];
            document.getElementById('parabolicTime').textContent = 't = 0.00 s';
            document.getElementById('res-r').textContent = '— m';
            document.getElementById('res-h').textContent = '— m';
            document.getElementById('res-t').textContent = '— s';
            document.getElementById('res-v').textContent = '— m/s';
            drawParabolicFrame();
            drawParabolicPreview();
        }

        // Initialize setup
        window.addEventListener('load', () => {
            resizeGraphs();
            updateGraphsDisplays();
            updateParabolicDisplays();
            window.addEventListener('resize', () => {
                if (document.getElementById('content-graphs').classList.contains('active')) {
                    resizeGraphs();
                } else {
                    resizeParabolic();
                }
            });
        });
    </script>
</body>
</html>
