<?php require_once '../auth.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhysicsLab — Trabajo y Energía</title>
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
            --glass-bg: rgba(8, 14, 28, 0.75);
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
            color: var(--cyan);
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
        .btn-back:hover { color: var(--cyan); border-color: var(--cyan); background: rgba(0,229,255,0.05); }

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
            color: var(--cyan);
            border-bottom-color: var(--cyan);
            background: rgba(0,229,255,0.02);
        }
        .lab-tab:hover { color: var(--cyan); }

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
            color: rgba(0,229,255,0.5);
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

        .ex-btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, rgba(0,229,255,0.15), rgba(61,90,254,0.15));
            border: 1px solid var(--cyan);
            color: var(--cyan);
            font-size: 0.85em;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            cursor: pointer;
            border-radius: 4px;
            transition: all 0.3s;
        }
        .ex-btn:hover {
            background: var(--cyan);
            color: #060a14;
            box-shadow: 0 0 20px rgba(0,229,255,0.3);
        }
        
        .btn-danger {
            background: rgba(255,82,82,0.15);
            border-color: var(--red);
            color: var(--red);
        }
        .btn-danger:hover {
            background: var(--red);
            color: #000;
            box-shadow: 0 0 20px rgba(255,82,82,0.3);
        }

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
        .results-row b { font-family: 'JetBrains Mono', monospace; color: var(--cyan); }

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
        .formula-box .formula { color: var(--cyan); font-weight: 700; }

        @media (max-width: 768px) {
            .lab-container { flex-direction: column; }
            .control-panel { width: 100%; }
            .canvas-area { min-height: 350px; }
            .lab-content.active { flex-direction: column; }
        }
        
        /* Controles checkbox estilo switch */
        .switch {
            position: relative;
            display: inline-block;
            width: 40px;
            height: 20px;
        }
        .switch input { opacity: 0; width: 0; height: 0; }
        .slider {
            position: absolute; cursor: pointer;
            top: 0; left: 0; right: 0; bottom: 0;
            background-color: #1a1e30; transition: .4s;
            border-radius: 20px;
        }
        .slider:before {
            position: absolute; content: "";
            height: 14px; width: 14px; left: 3px; bottom: 3px;
            background-color: white; transition: .4s;
            border-radius: 50%;
        }
        input:checked + .slider { background-color: var(--cyan); }
        input:checked + .slider:before { transform: translateX(20px); }
    </style>
</head>
<body>
    <div class="lab-header">
        <h1><i class="fas fa-flask"></i> Laboratorio 4: Trabajo y Energía</h1>
        <a href="../dashboard.php" class="btn-back"><i class="fas fa-arrow-left"></i> Volver al Portal</a>
    </div>

    <div class="lab-tabs">
        <div class="lab-tab active" onclick="switchTab('coaster')">Montaña Rusa (Conservación)</div>
        <div class="lab-tab" onclick="switchTab('spring')">Sistema Masa-Resorte</div>
    </div>

    <!-- TAB 1: MONTAÑA RUSA -->
    <div class="lab-content active" id="content-coaster">
        <div class="canvas-area">
            <canvas id="coasterCanvas"></canvas>
            <div class="canvas-overlay">
                <div>Montaña Rusa Interactiva</div>
                <div>Ley de Conservación de Energía (ET = Ec + Ep + Eterm)</div>
            </div>
        </div>

        <div class="control-panel">
            <div class="panel-title">Parámetros del Sistema</div>
            
            <div class="control-group">
                <label>Masa (kg): <span class="value-display" id="val-mass">50.0</span></label>
                <input type="range" id="slider-mass" min="10" max="100" value="50" step="1">
            </div>
            
            <div class="control-group">
                <label>Fricción (μk): <span class="value-display" id="val-friction">0.00</span></label>
                <input type="range" id="slider-friction" min="0" max="0.5" value="0" step="0.01">
            </div>
            
            <div class="control-group" style="flex-direction:row; align-items:center; justify-content:space-between; margin-top:10px;">
                <label style="margin-bottom:0;">Mostrar Gráficas</label>
                <label class="switch">
                    <input type="checkbox" id="check-graphs" checked>
                    <span class="slider"></span>
                </label>
            </div>

            <button class="ex-btn" id="btn-coaster-play" style="margin-top:10px;"><i class="fas fa-play"></i> Soltar Esfera</button>
            <button class="ex-btn btn-danger" id="btn-coaster-reset" style="margin-top:5px;"><i class="fas fa-undo"></i> Reiniciar Posición</button>

            <div class="panel-title" style="margin-top:15px;">Energías en Tiempo Real</div>
            <div class="results-box">
                <div class="results-row">
                    <span>Cinetica (Ec)</span>
                    <b id="res-ec" style="color:var(--green)">0.0 J</b>
                </div>
                <div class="results-row">
                    <span>Potencial (Ep)</span>
                    <b id="res-ep" style="color:var(--indigo)">0.0 J</b>
                </div>
                <div class="results-row">
                    <span>Térmica (Eterm)</span>
                    <b id="res-eth" style="color:var(--red)">0.0 J</b>
                </div>
                <div class="results-row" style="margin-top:8px; border-top:1px solid rgba(255,255,255,0.1); padding-top:8px;">
                    <span>Energía Total (ET)</span>
                    <b id="res-et" style="color:var(--orange)">0.0 J</b>
                </div>
                <div class="results-row">
                    <span>Velocidad (v)</span>
                    <b id="res-vel">0.0 m/s</b>
                </div>
            </div>

            <div class="panel-title">Fórmulas</div>
            <div class="formula-box">
                <span class="formula">Ec = ½mv²</span><br>
                <span class="formula">Ep = mgh</span><br>
                <span class="formula">Eterm = Fk·d</span><br>
                <span class="formula">ET = Ec + Ep + Eterm</span>
            </div>
        </div>
    </div>

    <!-- TAB 2: MASA RESORTE -->
    <div class="lab-content" id="content-spring">
        <div class="canvas-area">
            <canvas id="springCanvas"></canvas>
            <div class="canvas-overlay">
                <div>Oscilador Armónico Simple</div>
                <div>Energía Potencial Elástica</div>
            </div>
        </div>

        <div class="control-panel">
            <div class="panel-title">Control del Oscilador</div>
            
            <div class="control-group">
                <label>Constante Elástica k (N/m): <span class="value-display" id="val-k">100</span></label>
                <input type="range" id="slider-k" min="20" max="300" value="100" step="5">
            </div>

            <div class="control-group">
                <label>Masa (kg): <span class="value-display" id="val-smass">2.0</span></label>
                <input type="range" id="slider-smass" min="0.5" max="10" value="2.0" step="0.5">
            </div>
            
            <div class="control-group">
                <label>Amplitud Inicial (m): <span class="value-display" id="val-amp">0.50</span></label>
                <input type="range" id="slider-amp" min="0.1" max="1.0" value="0.5" step="0.05">
            </div>

            <div class="control-group" style="flex-direction:row; align-items:center; justify-content:space-between; margin-top:10px;">
                <label style="margin-bottom:0;">Fricción (Amortiguamiento)</label>
                <label class="switch">
                    <input type="checkbox" id="check-sdamping">
                    <span class="slider"></span>
                </label>
            </div>

            <div class="panel-title" style="margin-top:15px;">Monitor de Energía</div>
            <div class="results-box">
                <div class="results-row">
                    <span>Cinética (Ec)</span>
                    <b id="res-sec" style="color:var(--green)">0.0 J</b>
                </div>
                <div class="results-row">
                    <span>Pot. Elástica (Epe)</span>
                    <b id="res-sepe" style="color:var(--indigo)">0.0 J</b>
                </div>
                <div class="results-row" style="margin-top:8px; border-top:1px solid rgba(255,255,255,0.1); padding-top:8px;">
                    <span>Energía Mecánica (Em)</span>
                    <b id="res-sem" style="color:var(--orange)">0.0 J</b>
                </div>
                <div class="results-row">
                    <span>Posición (x)</span>
                    <b id="res-sx">0.00 m</b>
                </div>
            </div>

            <div class="panel-title">Fórmulas</div>
            <div class="formula-box">
                <span class="formula">F = -kx</span><br>
                <span class="formula">Epe = ½kx²</span><br>
                <span class="formula">ω = √(k/m)</span><br>
                <span class="formula">T = 2π√(m/k)</span>
            </div>
        </div>
    </div>

    <script>
        function switchTab(tab) {
            document.querySelectorAll('.lab-tab').forEach(el => el.classList.remove('active'));
            document.querySelectorAll('.lab-content').forEach(el => el.classList.remove('active'));
            
            if (tab === 'coaster') {
                document.querySelector('.lab-tab:nth-child(1)').classList.add('active');
                document.getElementById('content-coaster').classList.add('active');
                resizeCoaster();
            } else {
                document.querySelector('.lab-tab:nth-child(2)').classList.add('active');
                document.getElementById('content-spring').classList.add('active');
                resizeSpring();
            }
        }

        // ==================== MONTAÑA RUSA ====================
        const cCanvas = document.getElementById('coasterCanvas');
        const cCtx = cCanvas.getContext('2d');
        
        let cWidth, cHeight;
        let mass = 50;
        let friction = 0;
        let gravity = 9.81;
        
        let path = [];
        let state = {
            t: 0, // paramétrico 0 a 1 largo de la curva
            v: 0, // velocidad
            s: 0, // distancia recorrida en la curva
            running: false,
            eth: 0 // energía térmica acumulada
        };
        
        let lastTime = 0;
        let totalPathLength = 0;

        function generatePath() {
            path = [];
            // generate a smooth sine-like path
            let points = 200;
            let startY = cHeight * 0.2;
            let endY = cHeight * 0.8;
            for(let i=0; i<=points; i++) {
                let x = (i/points) * cWidth;
                // combination of sines to make it interesting: hill, valley, loop-like or just bumps
                let normX = i/points;
                let y = cHeight*0.2 + (cHeight*0.6) * (
                    0.5 - 0.5 * Math.cos(normX * Math.PI) + 
                    0.2 * Math.sin(normX * Math.PI * 3)
                );
                
                // Keep y within bounds
                if (y > cHeight * 0.9) y = cHeight * 0.9;
                
                path.push({x, y});
            }
            
            // Calculate segments length
            totalPathLength = 0;
            path[0].s = 0;
            for(let i=1; i<path.length; i++) {
                let dx = path[i].x - path[i-1].x;
                let dy = path[i].y - path[i-1].y;
                let dist = Math.sqrt(dx*dx + dy*dy);
                totalPathLength += dist;
                path[i].s = totalPathLength;
            }
        }

        function getPointAtDist(dist) {
            if(dist <= 0) return {x: path[0].x, y: path[0].y, angle: getAngle(0)};
            if(dist >= totalPathLength) return {x: path[path.length-1].x, y: path[path.length-1].y, angle: getAngle(path.length-2)};
            
            for(let i=1; i<path.length; i++) {
                if(path[i].s >= dist) {
                    let prev = path[i-1];
                    let curr = path[i];
                    let t = (dist - prev.s) / (curr.s - prev.s);
                    let x = prev.x + (curr.x - prev.x) * t;
                    let y = prev.y + (curr.y - prev.y) * t;
                    let angle = Math.atan2(curr.y - prev.y, curr.x - prev.x);
                    return {x, y, angle};
                }
            }
            return {x: path[0].x, y: path[0].y, angle: 0};
        }

        function getAngle(index) {
            if(index >= path.length-1) return 0;
            return Math.atan2(path[index+1].y - path[index].y, path[index+1].x - path[index].x);
        }

        function resizeCoaster() {
            cWidth = cCanvas.parentElement.clientWidth;
            cHeight = cCanvas.parentElement.clientHeight;
            cCanvas.width = cWidth;
            cCanvas.height = cHeight;
            generatePath();
            drawCoaster();
        }

        document.getElementById('slider-mass').addEventListener('input', (e) => {
            mass = parseFloat(e.target.value);
            document.getElementById('val-mass').textContent = mass.toFixed(1);
            if(!state.running) updateCoasterUI();
        });
        
        document.getElementById('slider-friction').addEventListener('input', (e) => {
            friction = parseFloat(e.target.value);
            document.getElementById('val-friction').textContent = friction.toFixed(2);
        });

        document.getElementById('btn-coaster-reset').addEventListener('click', () => {
            state.running = false;
            state.s = 0;
            state.v = 0;
            state.eth = 0;
            drawCoaster();
            updateCoasterUI();
        });

        document.getElementById('btn-coaster-play').addEventListener('click', () => {
            if(!state.running && state.s < totalPathLength) {
                state.running = true;
                lastTime = performance.now();
                requestAnimationFrame(loopCoaster);
            }
        });

        function drawCoaster() {
            cCtx.clearRect(0, 0, cWidth, cHeight);
            
            // Draw grid
            cCtx.strokeStyle = 'rgba(255,255,255,0.03)';
            cCtx.lineWidth = 1;
            for(let i=0; i<cHeight; i+=40) {
                cCtx.beginPath(); cCtx.moveTo(0, i); cCtx.lineTo(cWidth, i); cCtx.stroke();
            }

            // Draw track
            cCtx.strokeStyle = '#3d5afe';
            cCtx.lineWidth = 8;
            cCtx.lineCap = 'round';
            cCtx.lineJoin = 'round';
            cCtx.beginPath();
            cCtx.moveTo(path[0].x, path[0].y);
            for(let i=1; i<path.length; i++) {
                cCtx.lineTo(path[i].x, path[i].y);
            }
            cCtx.stroke();
            
            // Draw track supports
            cCtx.strokeStyle = 'rgba(255,255,255,0.05)';
            cCtx.lineWidth = 4;
            for(let i=0; i<path.length; i+=10) {
                cCtx.beginPath();
                cCtx.moveTo(path[i].x, path[i].y + 4);
                cCtx.lineTo(path[i].x, cHeight);
                cCtx.stroke();
            }

            // Draw sphere
            let p = getPointAtDist(state.s);
            cCtx.save();
            cCtx.translate(p.x, p.y - 12);
            // Rotate sphere visually
            cCtx.rotate(state.s * 0.1); 
            
            cCtx.fillStyle = '#ff9100';
            cCtx.beginPath();
            cCtx.arc(0, 0, 12, 0, Math.PI*2);
            cCtx.fill();
            // Draw a dot on sphere to show rotation
            cCtx.fillStyle = '#fff';
            cCtx.beginPath();
            cCtx.arc(6, 0, 3, 0, Math.PI*2);
            cCtx.fill();
            cCtx.restore();

            // Draw Bar Chart if enabled
            if(document.getElementById('check-graphs').checked) {
                drawCoasterEnergyChart();
            }
        }

        function drawCoasterEnergyChart() {
            let p = getPointAtDist(state.s);
            
            // scale factors
            let hMeters = (cHeight - p.y) / 20; // 20px = 1m
            let ep = mass * gravity * hMeters;
            let ec = 0.5 * mass * state.v * state.v;
            let eth = state.eth;
            let et = ep + ec + eth;
            
            let maxE = mass * gravity * ((cHeight - path[0].y) / 20); // Initial energy
            
            let barW = 30;
            let barScale = 150 / (maxE || 1); // Max height 150px
            
            let chartX = cWidth - 180;
            let chartY = 40;
            
            cCtx.fillStyle = 'rgba(0,0,0,0.6)';
            cCtx.fillRect(chartX - 10, chartY, 170, 180);
            
            cCtx.fillStyle = '#fff';
            cCtx.font = '10px Inter';
            cCtx.fillText("Ec", chartX, chartY + 170);
            cCtx.fillText("Ep", chartX + 40, chartY + 170);
            cCtx.fillText("Eterm", chartX + 80, chartY + 170);
            cCtx.fillText("ET", chartX + 130, chartY + 170);
            
            // Ec (Green)
            let hEc = ec * barScale;
            cCtx.fillStyle = 'var(--green)';
            cCtx.fillRect(chartX, chartY + 150 - hEc, barW, hEc);
            
            // Ep (Indigo)
            let hEp = ep * barScale;
            cCtx.fillStyle = 'var(--indigo)';
            cCtx.fillRect(chartX + 40, chartY + 150 - hEp, barW, hEp);
            
            // Eterm (Red)
            let hEth = eth * barScale;
            cCtx.fillStyle = 'var(--red)';
            cCtx.fillRect(chartX + 80, chartY + 150 - hEth, barW, hEth);

            // ET (Orange)
            let hEt = et * barScale;
            cCtx.fillStyle = 'var(--orange)';
            cCtx.fillRect(chartX + 130, chartY + 150 - hEt, barW, hEt);
        }

        function updateCoasterUI() {
            let p = getPointAtDist(state.s);
            let hMeters = (cHeight - p.y) / 20;
            let ep = mass * gravity * hMeters;
            let ec = 0.5 * mass * state.v * state.v;
            let et = ep + ec + state.eth;
            
            document.getElementById('res-ec').textContent = ec.toFixed(0) + ' J';
            document.getElementById('res-ep').textContent = ep.toFixed(0) + ' J';
            document.getElementById('res-eth').textContent = state.eth.toFixed(0) + ' J';
            document.getElementById('res-et').textContent = et.toFixed(0) + ' J';
            document.getElementById('res-vel').textContent = Math.abs(state.v).toFixed(1) + ' m/s';
        }

        function loopCoaster(time) {
            if(!state.running) return;
            let dt = (time - lastTime) / 1000;
            lastTime = time;
            
            // Limit dt to avoid explosions if tab goes background
            if(dt > 0.1) dt = 0.1;
            
            // Calculate forces
            let p = getPointAtDist(state.s);
            let angle = p.angle;
            
            // Acceleration along the track
            // a = g * sin(theta) - mu * g * cos(theta) * sign(v)
            let a = gravity * Math.sin(angle);
            
            let normal = mass * gravity * Math.cos(angle);
            let fFriction = friction * normal;
            
            // apply friction opposing motion
            if (state.v > 0) a -= (fFriction/mass);
            else if (state.v < 0) a += (fFriction/mass);
            
            // Update velocity and position
            state.v += a * dt * 10; // *10 speed up factor for simulation
            
            let ds = state.v * dt * 10 * 20; // 20 px per meter
            state.s += ds;
            
            // accumulate thermal energy (W = F * d)
            if (Math.abs(state.v) > 0.01) {
                state.eth += fFriction * Math.abs(ds / 20);
            }
            
            if(state.s < 0) { state.s = 0; state.v = 0; }
            if(state.s >= totalPathLength) { 
                state.s = totalPathLength; 
                state.v = 0; 
                state.running = false; 
            }
            
            drawCoaster();
            updateCoasterUI();
            
            if(state.running) requestAnimationFrame(loopCoaster);
        }

        // ==================== SISTEMA MASA RESORTE ====================
        const sCanvas = document.getElementById('springCanvas');
        const sCtx = sCanvas.getContext('2d');
        
        let sWidth, sHeight;
        let sMass = 2.0;
        let sK = 100;
        let sAmp = 0.5; // meters
        let sDamping = false;
        
        let springState = {
            t: 0,
            x: 0.5, // current pos
            v: 0,
            lastTime: 0
        };

        function resizeSpring() {
            sWidth = sCanvas.parentElement.clientWidth;
            sHeight = sCanvas.parentElement.clientHeight;
            sCanvas.width = sWidth;
            sCanvas.height = sHeight;
            drawSpring();
        }

        document.getElementById('slider-k').addEventListener('input', (e) => {
            sK = parseFloat(e.target.value);
            document.getElementById('val-k').textContent = sK;
        });
        document.getElementById('slider-smass').addEventListener('input', (e) => {
            sMass = parseFloat(e.target.value);
            document.getElementById('val-smass').textContent = sMass.toFixed(1);
        });
        document.getElementById('slider-amp').addEventListener('input', (e) => {
            sAmp = parseFloat(e.target.value);
            document.getElementById('val-amp').textContent = sAmp.toFixed(2);
            springState.x = sAmp;
            springState.v = 0;
            drawSpring();
            updateSpringUI();
        });
        document.getElementById('check-sdamping').addEventListener('change', (e) => {
            sDamping = e.target.checked;
        });

        function drawSpring() {
            sCtx.clearRect(0, 0, sWidth, sHeight);
            
            let cx = sWidth / 2;
            let cy = sHeight / 2;
            
            // Draw track line
            sCtx.strokeStyle = '#151a2e';
            sCtx.lineWidth = 4;
            sCtx.beginPath();
            sCtx.moveTo(0, cy + 30);
            sCtx.lineTo(sWidth, cy + 30);
            sCtx.stroke();
            
            // Equilibrium point (dashed)
            sCtx.strokeStyle = 'rgba(255,255,255,0.2)';
            sCtx.lineWidth = 1;
            sCtx.setLineDash([5, 5]);
            sCtx.beginPath();
            sCtx.moveTo(cx, cy - 50);
            sCtx.lineTo(cx, cy + 50);
            sCtx.stroke();
            sCtx.setLineDash([]);
            
            // Translate physics x to pixels (1 m = 150 px)
            let pxX = cx + springState.x * 150;
            
            // Draw Wall
            sCtx.fillStyle = '#334155';
            sCtx.fillRect(0, cy - 40, 20, 70);
            
            // Draw Spring
            sCtx.strokeStyle = '#94a3b8';
            sCtx.lineWidth = 3;
            sCtx.beginPath();
            sCtx.moveTo(20, cy);
            
            let coils = 15;
            let springWidth = pxX - 20 - 30; // 30 is half block
            for(let i=1; i<=coils; i++) {
                let xx = 20 + (i/coils) * springWidth;
                let yy = cy + (i%2 === 0 ? 15 : -15);
                if(i === coils) yy = cy;
                sCtx.lineTo(xx, yy);
            }
            sCtx.stroke();
            
            // Draw Mass Block
            sCtx.fillStyle = '#00e5ff';
            sCtx.fillRect(pxX - 30, cy - 30, 60, 60);
            sCtx.fillStyle = '#060a14';
            sCtx.font = 'bold 14px Inter';
            sCtx.fillText(`${sMass} kg`, pxX - 18, cy + 5);
        }

        function updateSpringUI() {
            let ep = 0.5 * sK * springState.x * springState.x;
            let ec = 0.5 * sMass * springState.v * springState.v;
            let em = ep + ec;
            
            document.getElementById('res-sec').textContent = ec.toFixed(1) + ' J';
            document.getElementById('res-sepe').textContent = ep.toFixed(1) + ' J';
            document.getElementById('res-sem').textContent = em.toFixed(1) + ' J';
            document.getElementById('res-sx').textContent = springState.x.toFixed(2) + ' m';
        }

        function loopSpring(time) {
            if(!springState.lastTime) springState.lastTime = time;
            let dt = (time - springState.lastTime) / 1000;
            springState.lastTime = time;
            if(dt > 0.1) dt = 0.1;
            
            // F = -kx - bv
            let b = sDamping ? 1.5 : 0;
            let a = (-sK * springState.x - b * springState.v) / sMass;
            
            springState.v += a * dt;
            springState.x += springState.v * dt;
            
            if(document.getElementById('content-spring').classList.contains('active')) {
                drawSpring();
                updateSpringUI();
            }
            
            requestAnimationFrame(loopSpring);
        }
        
        // Start spring animation loop
        requestAnimationFrame(loopSpring);

        // Initial setup
        window.addEventListener('load', () => {
            resizeCoaster();
            window.addEventListener('resize', () => {
                if (document.getElementById('content-coaster').classList.contains('active')) {
                    resizeCoaster();
                } else {
                    resizeSpring();
                }
            });
        });
    </script>
</body>
</html>
