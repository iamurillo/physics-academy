<?php require_once '../auth.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhysicsLab — Simulador de Tiro Parabólico</title>
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
            border-bottom: 1px solid rgba(0,229,255,0.15);
            background: rgba(6,10,20,0.97);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .lab-header h1 {
            font-size: 1em;
            color: var(--cyan);
            display: flex; align-items: center; gap: 10px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .btn-back {
            color: #556;
            text-decoration: none;
            border: 1px solid #1a1e30;
            padding: 8px 16px;
            font-size: 0.78em;
            border-radius: 3px;
            transition: all 0.3s;
            display: flex; align-items: center; gap: 6px;
        }
        .btn-back:hover { color: var(--cyan); border-color: var(--cyan); }

        .lab-container {
            flex: 1;
            display: flex;
            gap: 0;
        }

        /* Canvas area */
        .canvas-area {
            flex: 1;
            position: relative;
            background: linear-gradient(180deg, #080c18 0%, #0a1020 100%);
            border-right: 1px solid #151a2e;
        }
        #simCanvas {
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
            color: rgba(0,229,255,0.5);
            pointer-events: none;
        }

        /* Control panel */
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
            color: var(--cyan);
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
            background: var(--cyan);
            cursor: pointer;
            box-shadow: 0 0 8px rgba(0,229,255,0.4);
        }

        .btn-fire {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, rgba(0,229,255,0.15), rgba(61,90,254,0.15));
            border: 1px solid var(--cyan);
            color: var(--cyan);
            font-family: 'Inter', sans-serif;
            font-size: 0.9em;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 3px;
            cursor: pointer;
            border-radius: 4px;
            transition: all 0.3s;
        }
        .btn-fire:hover {
            background: var(--cyan);
            color: #060a14;
            box-shadow: 0 0 25px rgba(0,229,255,0.3);
        }
        .btn-reset {
            width: 100%;
            padding: 10px;
            background: transparent;
            border: 1px solid #1a1e30;
            color: #556;
            font-family: 'Inter', sans-serif;
            font-size: 0.78em;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            cursor: pointer;
            border-radius: 4px;
            transition: all 0.3s;
        }
        .btn-reset:hover { color: var(--red); border-color: var(--red); }

        /* Results */
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
            font-size: 1.05em;
            color: var(--cyan);
            font-weight: 700;
        }

        /* Formula display */
        .formula-box {
            background: rgba(0,229,255,0.03);
            border: 1px solid rgba(0,229,255,0.1);
            border-radius: 4px;
            padding: 14px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.75em;
            color: #889;
            line-height: 1.8;
        }
        .formula-box .formula {
            color: var(--cyan);
            font-weight: 700;
        }

        /* Trail color legend */
        .trail-legend {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            font-size: 0.7em;
        }
        .trail-legend span {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .trail-legend .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            display: inline-block;
        }

        @media (max-width: 768px) {
            .lab-container { flex-direction: column; }
            .control-panel { width: 100%; }
            .canvas-area { min-height: 350px; }
        }
    </style>
</head>
<body>
    <div class="lab-header">
        <h1><i class="fas fa-basketball"></i> Simulador de Tiro Parabólico</h1>
        <a href="dashboard.php" class="btn-back"><i class="fas fa-arrow-left"></i> Volver al Dashboard</a>
    </div>

    <div class="lab-container">
        <div class="canvas-area">
            <canvas id="simCanvas"></canvas>
            <div class="canvas-overlay">
                <div>g = 9.81 m/s²</div>
                <div id="timeDisplay" style="margin-top:4px;">t = 0.00 s</div>
            </div>
        </div>

        <div class="control-panel">
            <div class="panel-title"><i class="fas fa-sliders-h"></i> Controles</div>

            <div class="control-group">
                <label>Velocidad Inicial (v₀)</label>
                <span class="value-display" id="v0-display">30 m/s</span>
                <input type="range" id="v0" min="5" max="80" value="30" step="1">
            </div>

            <div class="control-group">
                <label>Ángulo de Lanzamiento (θ)</label>
                <span class="value-display" id="angle-display">45°</span>
                <input type="range" id="angle" min="5" max="85" value="45" step="1">
            </div>

            <div class="control-group">
                <label>Altura Inicial (h₀)</label>
                <span class="value-display" id="h0-display">0 m</span>
                <input type="range" id="h0" min="0" max="50" value="0" step="1">
            </div>

            <button class="btn-fire" id="btnFire"><i class="fas fa-play"></i> &nbsp;LANZAR</button>
            <button class="btn-reset" id="btnReset"><i class="fas fa-redo"></i> &nbsp;RESETEAR</button>

            <div class="panel-title" style="margin-top:8px;"><i class="fas fa-chart-bar"></i> Resultados</div>

            <div class="results-grid">
                <div class="result-box">
                    <div class="result-label">Alcance (R)</div>
                    <div class="result-value" id="res-range">— m</div>
                </div>
                <div class="result-box">
                    <div class="result-label">Altura Máx.</div>
                    <div class="result-value" id="res-height">— m</div>
                </div>
                <div class="result-box">
                    <div class="result-label">Tiempo de Vuelo</div>
                    <div class="result-value" id="res-time">— s</div>
                </div>
                <div class="result-box">
                    <div class="result-label">V. Impacto</div>
                    <div class="result-value" id="res-impact">— m/s</div>
                </div>
            </div>

            <div class="panel-title"><i class="fas fa-square-root-alt"></i> Fórmulas</div>
            <div class="formula-box">
                <span class="formula">x(t) = v₀·cos(θ)·t</span><br>
                <span class="formula">y(t) = h₀ + v₀·sin(θ)·t − ½gt²</span><br>
                <span class="formula">R = v₀²·sin(2θ) / g</span><br>
                <span class="formula">H = v₀²·sin²(θ) / 2g</span><br>
                <span class="formula">T = 2·v₀·sin(θ) / g</span>
            </div>

            <div class="trail-legend">
                <span><span class="dot" style="background:#00e5ff;"></span> Trayectoria</span>
                <span><span class="dot" style="background:#ff9100;"></span> Velocidad</span>
                <span><span class="dot" style="background:#00e676;"></span> Componentes</span>
            </div>
        </div>
    </div>

    <script>
        const canvas = document.getElementById('simCanvas');
        const ctx = canvas.getContext('2d');
        const g = 9.81;
        let animId = null;
        let trails = [];
        let projectile = null;
        let isRunning = false;
        let startTime = 0;

        // Scale: pixels per meter
        let scale = 8;
        let originX = 60;
        let originY;

        function resize() {
            canvas.width = canvas.parentElement.clientWidth;
            canvas.height = canvas.parentElement.clientHeight;
            originY = canvas.height - 50;
            draw();
        }
        window.addEventListener('resize', resize);
        resize();

        // Controls
        const v0Slider = document.getElementById('v0');
        const angleSlider = document.getElementById('angle');
        const h0Slider = document.getElementById('h0');

        v0Slider.addEventListener('input', updateDisplays);
        angleSlider.addEventListener('input', updateDisplays);
        h0Slider.addEventListener('input', updateDisplays);

        function updateDisplays() {
            document.getElementById('v0-display').textContent = v0Slider.value + ' m/s';
            document.getElementById('angle-display').textContent = angleSlider.value + '°';
            document.getElementById('h0-display').textContent = h0Slider.value + ' m';
            if (!isRunning) {
                draw();
                drawLaunchPreview();
            }
        }

        document.getElementById('btnFire').addEventListener('click', launch);
        document.getElementById('btnReset').addEventListener('click', reset);

        function launch() {
            if (isRunning) return;
            isRunning = true;
            const v0 = parseFloat(v0Slider.value);
            const angle = parseFloat(angleSlider.value) * Math.PI / 180;
            const h0 = parseFloat(h0Slider.value);

            const vx = v0 * Math.cos(angle);
            const vy = v0 * Math.sin(angle);

            // Calculate theoretical values
            const tUp = vy / g;
            const hMax = h0 + (vy * vy) / (2 * g);
            // Time to hit ground: h0 + vy*t - 0.5*g*t^2 = 0
            const disc = vy * vy + 2 * g * h0;
            const tTotal = (vy + Math.sqrt(disc)) / g;
            const range = vx * tTotal;
            const vImpact = Math.sqrt(vx * vx + (vy - g * tTotal) ** 2);

            // Adjust scale to fit
            const maxDim = Math.max(range, hMax);
            const availW = canvas.width - 120;
            const availH = canvas.height - 100;
            scale = Math.min(availW / (maxDim * 1.1), availH / (hMax * 1.2));
            scale = Math.max(scale, 2);
            scale = Math.min(scale, 25);

            projectile = { x: 0, y: h0, vx, vy: vy, t: 0, h0, tTotal, range, hMax, vImpact };
            trails = [{ x: 0, y: h0 }];
            startTime = performance.now();

            // Update results
            document.getElementById('res-range').textContent = range.toFixed(1) + ' m';
            document.getElementById('res-height').textContent = hMax.toFixed(1) + ' m';
            document.getElementById('res-time').textContent = tTotal.toFixed(2) + ' s';
            document.getElementById('res-impact').textContent = vImpact.toFixed(1) + ' m/s';

            animate();
        }

        function animate() {
            if (!projectile) return;

            projectile.t += 0.016 * 2; // Speed up a bit
            const t = projectile.t;
            projectile.x = projectile.vx * t;
            projectile.y = projectile.h0 + projectile.vy * t - 0.5 * g * t * t;

            trails.push({ x: projectile.x, y: projectile.y });

            document.getElementById('timeDisplay').textContent = 't = ' + t.toFixed(2) + ' s';

            draw();
            drawTrails();
            drawProjectile();
            drawVelocityVector();

            if (projectile.y <= 0 || t > projectile.tTotal + 0.1) {
                isRunning = false;
                projectile.y = Math.max(0, projectile.y);
                draw();
                drawTrails();
                drawProjectile();
                return;
            }

            animId = requestAnimationFrame(animate);
        }

        function toCanvasX(x) { return originX + x * scale; }
        function toCanvasY(y) { return originY - y * scale; }

        function draw() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            // Grid
            ctx.strokeStyle = 'rgba(0,229,255,0.04)';
            ctx.lineWidth = 1;
            for (let i = 0; i < canvas.width; i += 40) {
                ctx.beginPath(); ctx.moveTo(i, 0); ctx.lineTo(i, canvas.height); ctx.stroke();
            }
            for (let i = 0; i < canvas.height; i += 40) {
                ctx.beginPath(); ctx.moveTo(0, i); ctx.lineTo(canvas.width, i); ctx.stroke();
            }

            // Ground
            ctx.strokeStyle = 'rgba(0,229,255,0.3)';
            ctx.lineWidth = 2;
            ctx.beginPath();
            ctx.moveTo(0, originY);
            ctx.lineTo(canvas.width, originY);
            ctx.stroke();

            // Ground hash marks
            ctx.strokeStyle = 'rgba(0,229,255,0.1)';
            ctx.lineWidth = 1;
            for (let i = 0; i < canvas.width; i += 20) {
                ctx.beginPath();
                ctx.moveTo(i, originY);
                ctx.lineTo(i + 10, originY + 10);
                ctx.stroke();
            }

            // Axis labels
            ctx.fillStyle = 'rgba(0,229,255,0.3)';
            ctx.font = '11px JetBrains Mono';
            const meterStep = Math.max(10, Math.round(50 / scale / 10) * 10);
            for (let m = 0; m <= 200; m += meterStep) {
                const px = toCanvasX(m);
                if (px > canvas.width - 20) break;
                ctx.fillText(m + 'm', px - 8, originY + 22);
                ctx.beginPath();
                ctx.moveTo(px, originY - 3);
                ctx.lineTo(px, originY + 3);
                ctx.stroke();
            }
            for (let m = meterStep; m <= 200; m += meterStep) {
                const py = toCanvasY(m);
                if (py < 20) break;
                ctx.fillText(m + 'm', 8, py + 4);
                ctx.beginPath();
                ctx.moveTo(originX - 3, py);
                ctx.lineTo(originX + 3, py);
                ctx.stroke();
            }
        }

        function drawLaunchPreview() {
            const v0 = parseFloat(v0Slider.value);
            const angle = parseFloat(angleSlider.value) * Math.PI / 180;
            const h0 = parseFloat(h0Slider.value);

            // Cannon position
            const cx = toCanvasX(0);
            const cy = toCanvasY(h0);

            // Draw cannon
            const len = 30;
            const ex = cx + len * Math.cos(-angle);
            const ey = cy + len * Math.sin(-angle);

            ctx.strokeStyle = 'rgba(0,229,255,0.5)';
            ctx.lineWidth = 6;
            ctx.lineCap = 'round';
            ctx.beginPath();
            ctx.moveTo(cx, cy);
            ctx.lineTo(ex, ey);
            ctx.stroke();

            // Draw base
            ctx.fillStyle = 'rgba(0,229,255,0.3)';
            ctx.beginPath();
            ctx.arc(cx, cy, 8, 0, Math.PI * 2);
            ctx.fill();

            // Dotted trajectory preview
            ctx.strokeStyle = 'rgba(0,229,255,0.12)';
            ctx.lineWidth = 1;
            ctx.setLineDash([4, 6]);
            ctx.beginPath();
            const vx = v0 * Math.cos(angle);
            const vy = v0 * Math.sin(angle);
            const disc = vy * vy + 2 * g * h0;
            const tTotal = (vy + Math.sqrt(Math.max(0, disc))) / g;
            for (let t = 0; t <= tTotal; t += 0.05) {
                const x = vx * t;
                const y = h0 + vy * t - 0.5 * g * t * t;
                if (y < 0) break;
                const px = toCanvasX(x);
                const py = toCanvasY(y);
                if (t === 0) ctx.moveTo(px, py);
                else ctx.lineTo(px, py);
            }
            ctx.stroke();
            ctx.setLineDash([]);
        }

        function drawTrails() {
            if (trails.length < 2) return;

            // Trail path
            ctx.strokeStyle = 'rgba(0,229,255,0.6)';
            ctx.lineWidth = 2;
            ctx.shadowColor = 'rgba(0,229,255,0.3)';
            ctx.shadowBlur = 8;
            ctx.beginPath();
            trails.forEach((p, i) => {
                const px = toCanvasX(p.x);
                const py = toCanvasY(Math.max(0, p.y));
                if (i === 0) ctx.moveTo(px, py);
                else ctx.lineTo(px, py);
            });
            ctx.stroke();
            ctx.shadowBlur = 0;

            // Trail dots
            trails.forEach((p, i) => {
                if (i % 3 !== 0) return;
                const px = toCanvasX(p.x);
                const py = toCanvasY(Math.max(0, p.y));
                ctx.beginPath();
                ctx.arc(px, py, 2, 0, Math.PI * 2);
                ctx.fillStyle = 'rgba(0,229,255,0.4)';
                ctx.fill();
            });
        }

        function drawProjectile() {
            if (!projectile) return;
            const px = toCanvasX(projectile.x);
            const py = toCanvasY(Math.max(0, projectile.y));

            // Glow
            const gradient = ctx.createRadialGradient(px, py, 0, px, py, 20);
            gradient.addColorStop(0, 'rgba(0,229,255,0.4)');
            gradient.addColorStop(1, 'rgba(0,229,255,0)');
            ctx.fillStyle = gradient;
            ctx.beginPath();
            ctx.arc(px, py, 20, 0, Math.PI * 2);
            ctx.fill();

            // Ball
            ctx.fillStyle = '#00e5ff';
            ctx.shadowColor = '#00e5ff';
            ctx.shadowBlur = 15;
            ctx.beginPath();
            ctx.arc(px, py, 6, 0, Math.PI * 2);
            ctx.fill();
            ctx.shadowBlur = 0;
        }

        function drawVelocityVector() {
            if (!projectile || !isRunning) return;
            const px = toCanvasX(projectile.x);
            const py = toCanvasY(Math.max(0, projectile.y));

            const currentVy = projectile.vy - g * projectile.t;
            const vScale = 1.5;

            // Vx component
            ctx.strokeStyle = 'rgba(0,230,118,0.6)';
            ctx.lineWidth = 2;
            ctx.beginPath();
            ctx.moveTo(px, py);
            ctx.lineTo(px + projectile.vx * vScale, py);
            ctx.stroke();

            // Vy component
            ctx.strokeStyle = 'rgba(0,230,118,0.6)';
            ctx.beginPath();
            ctx.moveTo(px, py);
            ctx.lineTo(px, py - currentVy * vScale);
            ctx.stroke();

            // Total velocity
            ctx.strokeStyle = 'rgba(255,145,0,0.8)';
            ctx.lineWidth = 2.5;
            ctx.beginPath();
            ctx.moveTo(px, py);
            ctx.lineTo(px + projectile.vx * vScale, py - currentVy * vScale);
            ctx.stroke();

            // Arrowhead
            const angle = Math.atan2(-currentVy, projectile.vx);
            const endX = px + projectile.vx * vScale;
            const endY = py - currentVy * vScale;
            ctx.fillStyle = 'rgba(255,145,0,0.8)';
            ctx.beginPath();
            ctx.moveTo(endX, endY);
            ctx.lineTo(endX - 10 * Math.cos(angle - 0.3), endY + 10 * Math.sin(angle - 0.3));
            ctx.lineTo(endX - 10 * Math.cos(angle + 0.3), endY + 10 * Math.sin(angle + 0.3));
            ctx.fill();
        }

        function reset() {
            if (animId) cancelAnimationFrame(animId);
            isRunning = false;
            projectile = null;
            trails = [];
            document.getElementById('timeDisplay').textContent = 't = 0.00 s';
            document.getElementById('res-range').textContent = '— m';
            document.getElementById('res-height').textContent = '— m';
            document.getElementById('res-time').textContent = '— s';
            document.getElementById('res-impact').textContent = '— m/s';
            draw();
            drawLaunchPreview();
        }

        // Initial draw
        updateDisplays();
    </script>
</body>
</html>
