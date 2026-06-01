<?php require_once '../auth.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhysicsLab — Cantidad de Movimiento</title>
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
            --pink: #ff4081;
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

        .lab-content {
            flex: 1;
            display: flex;
            gap: 0;
        }

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
            width: 380px;
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

        .ex-input {
            width: 100%;
            background: rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(255,255,255,0.08);
            color: #fff;
            padding: 8px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.9em;
            border-radius: 4px;
            outline: none;
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

        .flex-row {
            display: flex;
            gap: 15px;
        }
        .flex-row > div {
            flex: 1;
        }

        @media (max-width: 768px) {
            .lab-content { flex-direction: column; }
            .control-panel { width: 100%; }
            .canvas-area { min-height: 350px; }
        }
    </style>
</head>
<body>
    <div class="lab-header">
        <h1><i class="fas fa-flask"></i> Laboratorio 5: Momento Lineal y Colisiones</h1>
        <a href="../dashboard.php" class="btn-back"><i class="fas fa-arrow-left"></i> Volver al Portal</a>
    </div>

    <div class="lab-content">
        <div class="canvas-area">
            <canvas id="collisionCanvas"></canvas>
            <div class="canvas-overlay">
                <div>Pista de Colisiones 1D</div>
                <div>Conservación del Momento (p = mv)</div>
            </div>
        </div>

        <div class="control-panel">
            <div class="panel-title">Ajustes de Colisión</div>
            
            <div class="control-group">
                <label>Tipo de Choque</label>
                <select id="select-type" class="ex-input" style="background:#060a14;">
                    <option value="1">Elástico (e = 1.0)</option>
                    <option value="0.5">Inelástico (e = 0.5)</option>
                    <option value="0">Perfectamente Inelástico (e = 0)</option>
                </select>
            </div>

            <div class="flex-row" style="margin-top:10px;">
                <div class="control-group">
                    <label style="color:var(--indigo)">Masa 1 (kg): <span id="val-m1" class="value-display">2.0</span></label>
                    <input type="range" id="slider-m1" min="1" max="10" value="2" step="0.5">
                </div>
                <div class="control-group">
                    <label style="color:var(--pink)">Masa 2 (kg): <span id="val-m2" class="value-display">2.0</span></label>
                    <input type="range" id="slider-m2" min="1" max="10" value="2" step="0.5">
                </div>
            </div>

            <div class="flex-row">
                <div class="control-group">
                    <label style="color:var(--indigo)">Vel 1 (m/s): <span id="val-v1" class="value-display">5.0</span></label>
                    <input type="range" id="slider-v1" min="-10" max="10" value="5" step="0.5">
                </div>
                <div class="control-group">
                    <label style="color:var(--pink)">Vel 2 (m/s): <span id="val-v2" class="value-display">-3.0</span></label>
                    <input type="range" id="slider-v2" min="-10" max="10" value="-3" step="0.5">
                </div>
            </div>

            <div style="display:flex; gap:10px; margin-top:10px;">
                <button class="ex-btn" id="btn-play" style="flex:2;"><i class="fas fa-play"></i> Iniciar</button>
                <button class="ex-btn btn-danger" id="btn-reset" style="flex:1;"><i class="fas fa-undo"></i></button>
            </div>

            <div class="panel-title" style="margin-top:15px;">Monitor Cinético</div>
            <div class="results-box">
                <div class="results-row" style="margin-bottom:12px; border-bottom:1px solid #151a2e; padding-bottom:5px;">
                    <span style="font-weight:bold; color:#fff;">Antes del Impacto</span>
                </div>
                <div class="results-row">
                    <span>Momento Total (P_i)</span>
                    <b id="res-pi">0.0 kg·m/s</b>
                </div>
                <div class="results-row">
                    <span>Energía Cinética (Ec_i)</span>
                    <b id="res-eci">0.0 J</b>
                </div>

                <div class="results-row" style="margin-top:12px; margin-bottom:12px; border-bottom:1px solid #151a2e; padding-bottom:5px;">
                    <span style="font-weight:bold; color:#fff;">Después del Impacto</span>
                </div>
                <div class="results-row">
                    <span>Momento Total (P_f)</span>
                    <b id="res-pf">0.0 kg·m/s</b>
                </div>
                <div class="results-row">
                    <span>Energía Cinética (Ec_f)</span>
                    <b id="res-ecf">0.0 J</b>
                </div>
                
                <div class="results-row" style="margin-top:12px; padding-top:8px; border-top:1px dashed #151a2e;">
                    <span style="color:var(--indigo)">V1 Final</span>
                    <b id="res-v1f" style="color:var(--indigo)">0.0 m/s</b>
                </div>
                <div class="results-row">
                    <span style="color:var(--pink)">V2 Final</span>
                    <b id="res-v2f" style="color:var(--pink)">0.0 m/s</b>
                </div>
            </div>

            <div class="panel-title">Fórmulas</div>
            <div class="formula-box">
                <span class="formula">p = m·v</span><br>
                <span class="formula">P_total = m1·v1 + m2·v2</span><br>
                <span class="formula">Coef. Restitución (e):</span><br>
                <span class="formula">v2_f - v1_f = e(v1_i - v2_i)</span>
            </div>
        </div>
    </div>

    <script>
        const canvas = document.getElementById('collisionCanvas');
        const ctx = canvas.getContext('2d');

        let cWidth, cHeight;
        
        let m1 = 2.0; let v1 = 5.0;
        let m2 = 2.0; let v2 = -3.0;
        let restitution = 1.0;

        let obj1 = { x: 0, v: v1, m: m1, width: 40, color: 'var(--indigo)' };
        let obj2 = { x: 0, v: v2, m: m2, width: 40, color: 'var(--pink)' };

        let running = false;
        let lastTime = 0;
        let hasCollided = false;

        function updateMasses() {
            obj1.m = parseFloat(document.getElementById('slider-m1').value);
            obj2.m = parseFloat(document.getElementById('slider-m2').value);
            document.getElementById('val-m1').textContent = obj1.m.toFixed(1);
            document.getElementById('val-m2').textContent = obj2.m.toFixed(1);
            
            // Visual size based on mass
            obj1.width = 30 + obj1.m * 8;
            obj2.width = 30 + obj2.m * 8;
        }

        function resetSimulation() {
            running = false;
            hasCollided = false;
            
            updateMasses();
            restitution = parseFloat(document.getElementById('select-type').value);
            
            let initial_v1 = parseFloat(document.getElementById('slider-v1').value);
            let initial_v2 = parseFloat(document.getElementById('slider-v2').value);
            
            document.getElementById('val-v1').textContent = initial_v1.toFixed(1);
            document.getElementById('val-v2').textContent = initial_v2.toFixed(1);

            obj1.v = initial_v1;
            obj2.v = initial_v2;

            // positions
            obj1.x = cWidth * 0.25;
            obj2.x = cWidth * 0.75;

            updateUI(true);
            draw();
        }

        function calculateFinalVelocities(u1, u2, m1, m2, e) {
            // v1 = ((m1 - e*m2)u1 + (1+e)m2*u2) / (m1+m2)
            // v2 = ((m2 - e*m1)u2 + (1+e)m1*u1) / (m1+m2)
            let sum_m = m1 + m2;
            let v1_final = ((m1 - e*m2)*u1 + (1+e)*m2*u2) / sum_m;
            let v2_final = ((m2 - e*m1)*u2 + (1+e)*m1*u1) / sum_m;
            return { v1f: v1_final, v2f: v2_final };
        }

        function updateUI(isInitial) {
            let pi = (obj1.m * obj1.v + obj2.m * obj2.v).toFixed(2);
            let eci = (0.5 * obj1.m * obj1.v * obj1.v + 0.5 * obj2.m * obj2.v * obj2.v).toFixed(2);

            if (isInitial) {
                document.getElementById('res-pi').textContent = pi + ' kg·m/s';
                document.getElementById('res-eci').textContent = eci + ' J';
                document.getElementById('res-pf').textContent = '-';
                document.getElementById('res-ecf').textContent = '-';
                document.getElementById('res-v1f').textContent = '-';
                document.getElementById('res-v2f').textContent = '-';
            } else {
                document.getElementById('res-pf').textContent = pi + ' kg·m/s';
                document.getElementById('res-ecf').textContent = eci + ' J';
                document.getElementById('res-v1f').textContent = obj1.v.toFixed(2) + ' m/s';
                document.getElementById('res-v2f').textContent = obj2.v.toFixed(2) + ' m/s';
            }
        }

        document.getElementById('slider-m1').addEventListener('input', resetSimulation);
        document.getElementById('slider-m2').addEventListener('input', resetSimulation);
        document.getElementById('slider-v1').addEventListener('input', resetSimulation);
        document.getElementById('slider-v2').addEventListener('input', resetSimulation);
        document.getElementById('select-type').addEventListener('change', resetSimulation);

        document.getElementById('btn-play').addEventListener('click', () => {
            if (!running && !hasCollided) {
                running = true;
                lastTime = performance.now();
                requestAnimationFrame(loop);
            }
        });

        document.getElementById('btn-reset').addEventListener('click', resetSimulation);

        function resize() {
            cWidth = canvas.parentElement.clientWidth;
            cHeight = canvas.parentElement.clientHeight;
            canvas.width = cWidth;
            canvas.height = cHeight;
            resetSimulation();
        }

        function drawVector(ctx, x, y, vx, color) {
            if(Math.abs(vx) < 0.1) return;
            let len = vx * 15; // scale factor
            let headlen = 8;
            let angle = vx > 0 ? 0 : Math.PI;

            ctx.strokeStyle = color;
            ctx.lineWidth = 3;
            ctx.beginPath();
            ctx.moveTo(x, y);
            ctx.lineTo(x + len, y);
            ctx.stroke();

            ctx.fillStyle = color;
            ctx.beginPath();
            ctx.moveTo(x + len, y);
            ctx.lineTo(x + len - headlen * Math.cos(angle - Math.PI / 6), y - headlen * Math.sin(angle - Math.PI / 6));
            ctx.lineTo(x + len - headlen * Math.cos(angle + Math.PI / 6), y - headlen * Math.sin(angle + Math.PI / 6));
            ctx.fill();
            
            // Text
            ctx.font = '12px monospace';
            ctx.fillText(vx.toFixed(1) + ' m/s', x + len/2 - 20, y - 10);
        }

        function draw() {
            ctx.clearRect(0, 0, cWidth, cHeight);
            
            let cy = cHeight / 2 + 50;

            // Track line
            ctx.strokeStyle = '#151a2e';
            ctx.lineWidth = 6;
            ctx.beginPath();
            ctx.moveTo(0, cy + 20);
            ctx.lineTo(cWidth, cy + 20);
            ctx.stroke();
            
            // Grid markings
            ctx.strokeStyle = 'rgba(255,255,255,0.05)';
            ctx.lineWidth = 1;
            for(let x=0; x<cWidth; x+=50) {
                ctx.beginPath(); ctx.moveTo(x, cy+20); ctx.lineTo(x, cy+40); ctx.stroke();
            }

            // Object 1
            ctx.fillStyle = obj1.color;
            ctx.fillRect(obj1.x - obj1.width/2, cy - obj1.width/2, obj1.width, obj1.width);
            ctx.fillStyle = '#fff';
            ctx.font = 'bold 12px Inter';
            ctx.fillText("M1", obj1.x - 8, cy + 4);

            // Object 2
            ctx.fillStyle = obj2.color;
            ctx.fillRect(obj2.x - obj2.width/2, cy - obj2.width/2, obj2.width, obj2.width);
            ctx.fillStyle = '#fff';
            ctx.fillText("M2", obj2.x - 8, cy + 4);
            
            // Vectors
            drawVector(ctx, obj1.x, cy - obj1.width/2 - 20, obj1.v, obj1.color);
            drawVector(ctx, obj2.x, cy - obj2.width/2 - 20, obj2.v, obj2.color);
        }

        function loop(time) {
            if (!running) return;
            let dt = (time - lastTime) / 1000;
            lastTime = time;
            if (dt > 0.1) dt = 0.1;

            // Update positions (pixels per meter scale = 15)
            obj1.x += obj1.v * dt * 15;
            obj2.x += obj2.v * dt * 15;

            // Collision Check
            if (!hasCollided && (obj1.x + obj1.width/2 >= obj2.x - obj2.width/2)) {
                hasCollided = true;
                
                // Set exactly at boundary to prevent sticking
                let overlap = (obj1.x + obj1.width/2) - (obj2.x - obj2.width/2);
                obj1.x -= overlap/2;
                obj2.x += overlap/2;

                let vf = calculateFinalVelocities(obj1.v, obj2.v, obj1.m, obj2.m, restitution);
                
                // If perfectly inelastic, force same velocity
                if (restitution === 0) {
                    let common_v = (obj1.m * obj1.v + obj2.m * obj2.v) / (obj1.m + obj2.m);
                    obj1.v = common_v;
                    obj2.v = common_v;
                } else {
                    obj1.v = vf.v1f;
                    obj2.v = vf.v2f;
                }

                updateUI(false);
            }

            draw();

            // Stop if both off screen or very slow and diverging
            if (obj1.x < -100 && obj2.x > cWidth + 100) running = false;

            if (running) requestAnimationFrame(loop);
        }

        window.addEventListener('load', resize);
        window.addEventListener('resize', resize);
    </script>
</body>
</html>
