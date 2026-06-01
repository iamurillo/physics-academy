<?php require_once '../auth.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhysicsLab — Mediciones y Vectores</title>
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

        .ex-input {
            width: 100%;
            background: rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(255,255,255,0.08);
            color: #fff;
            padding: 10px;
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

        .feedback-msg {
            margin-top: 10px;
            padding: 10px;
            border-radius: 4px;
            font-size: 0.78em;
            display: none;
        }
        .feedback-msg.success { background: rgba(0,230,118,0.08); border: 1px solid var(--green); color: var(--green); }
        .feedback-msg.error { background: rgba(255,82,82,0.08); border: 1px solid var(--red); color: var(--red); }

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
        <h1><i class="fas fa-flask"></i> Laboratorio 1: Mediciones y Vectores</h1>
        <a href="../dashboard.php" class="btn-back"><i class="fas fa-arrow-left"></i> Volver al Portal</a>
    </div>

    <div class="lab-tabs">
        <div class="lab-tab active" onclick="switchTab('vernier')">Calibrador Vernier</div>
        <div class="lab-tab" onclick="switchTab('vectors')">Suma de Vectores 2D</div>
    </div>

    <!-- TAB 1: CALIBRADOR VERNIER -->
    <div class="lab-content active" id="content-vernier">
        <div class="canvas-area">
            <canvas id="vernierCanvas"></canvas>
            <div class="canvas-overlay">
                <div>Instrumento de Precisión</div>
                <div>Resolución: 0.05 mm</div>
            </div>
        </div>

        <div class="control-panel">
            <div class="panel-title">Medición Virtual</div>
            
            <div class="control-group">
                <label>Objeto a medir</label>
                <select id="select-object" class="ex-input" style="background:#060a14;">
                    <option value="cylinder">Cilindro de Acero</option>
                    <option value="sphere">Esfera de Balín</option>
                    <option value="washer">Arandela (Diámetro Externo)</option>
                    <option value="block">Bloque de Bronce</option>
                </select>
            </div>

            <div class="control-group">
                <label>Ajuste Fino de Medida</label>
                <input type="range" id="slider-vernier" min="2" max="60" value="25" step="0.05">
            </div>

            <div class="panel-title" style="margin-top:8px;">Evaluar Medición</div>
            <p style="font-size:0.75em; color:#789;">Lee la escala de milímetros (escala principal) donde se alinea el cero del nonio, luego encuentra la línea del nonio que coincide perfectamente con la escala principal.</p>
            
            <div class="control-group">
                <label>Tu Medida (en mm)</label>
                <input type="text" class="ex-input" id="input-vernier" placeholder="Ej: 24.35">
            </div>
            
            <button class="ex-btn" onclick="checkVernier()">Verificar Medida</button>
            <div class="feedback-msg" id="feedback-vernier"></div>

            <div class="panel-title"><i class="fas fa-calculator"></i> Lectura</div>
            <div class="formula-box">
                Lectura = <span class="formula">Escala Principal + (Coincidencia Nonio × 0.05)</span>
            </div>
        </div>
    </div>

    <!-- TAB 2: SUMA DE VECTORES -->
    <div class="lab-content" id="content-vectors">
        <div class="canvas-area">
            <canvas id="vectorsCanvas"></canvas>
            <div class="canvas-overlay">
                <div>Plano Cartesiano Interactiva</div>
                <div>Arrastra el extremo de los vectores A y B</div>
            </div>
        </div>

        <div class="control-panel">
            <div class="panel-title">Componentes de Vectores</div>
            
            <div class="results-box">
                <div class="results-row">
                    <span>Vector A (Azul)</span>
                    <b>[<span id="vec-a-val">30, 20</span>]</b>
                </div>
                <div class="results-row">
                    <span>Magnitud |A|</span>
                    <b id="vec-a-mag">36.1</b>
                </div>
                <div class="results-row">
                    <span>Ángulo θ_A</span>
                    <b id="vec-a-ang">33.7°</b>
                </div>
            </div>

            <div class="results-box">
                <div class="results-row">
                    <span>Vector B (Verde)</span>
                    <b>[<span id="vec-b-val">-15, 30</span>]</b>
                </div>
                <div class="results-row">
                    <span>Magnitud |B|</span>
                    <b id="vec-b-mag">33.5</b>
                </div>
                <div class="results-row">
                    <span>Ángulo θ_B</span>
                    <b id="vec-b-ang">116.6°</b>
                </div>
            </div>

            <div class="panel-title" style="margin-top:8px;">Vector Resultante R = A + B</div>
            <div class="results-box" style="border-color: rgba(255, 145, 0, 0.3);">
                <div class="results-row">
                    <span>Rx = Ax + Bx</span>
                    <b id="vec-r-x">15.0</b>
                </div>
                <div class="results-row">
                    <span>Ry = Ay + By</span>
                    <b id="vec-r-y">50.0</b>
                </div>
                <div class="results-row">
                    <span>Magnitud |R|</span>
                    <b id="vec-r-mag" style="color:var(--orange)">52.2</b>
                </div>
                <div class="results-row">
                    <span>Ángulo θ_R</span>
                    <b id="vec-r-ang" style="color:var(--orange)">73.3°</b>
                </div>
            </div>

            <div class="panel-title">Fórmulas</div>
            <div class="formula-box">
                <span class="formula">R = √(Rx² + Ry²)</span><br>
                <span class="formula">θ = arctan(Ry / Rx)</span>
            </div>
        </div>
    </div>

    <script>
        // Switch between tabs
        function switchTab(tab) {
            document.querySelectorAll('.lab-tab').forEach(el => el.classList.remove('active'));
            document.querySelectorAll('.lab-content').forEach(el => el.classList.remove('active'));
            
            if (tab === 'vernier') {
                document.querySelector('.lab-tab:nth-child(1)').classList.add('active');
                document.getElementById('content-vernier').classList.add('active');
                resizeVernier();
            } else {
                document.querySelector('.lab-tab:nth-child(2)').classList.add('active');
                document.getElementById('content-vectors').classList.add('active');
                resizeVectors();
            }
        }

        // ==================== CALIBRADOR VERNIER SIMULATION ====================
        const vCanvas = document.getElementById('vernierCanvas');
        const vCtx = vCanvas.getContext('2d');
        const vSlider = document.getElementById('slider-vernier');
        const vSelect = document.getElementById('select-object');

        let valVernier = 25.0; // mm

        // Object real sizes (approximate values that match slider ranges)
        const objectSizes = {
            cylinder: 34.45,
            sphere: 18.80,
            washer: 42.15,
            block: 28.60
        };

        vSelect.addEventListener('change', () => {
            const size = objectSizes[vSelect.value];
            vSlider.value = size;
            valVernier = size;
            drawVernier();
        });

        vSlider.addEventListener('input', () => {
            valVernier = parseFloat(vSlider.value);
            drawVernier();
        });

        function resizeVernier() {
            vCanvas.width = vCanvas.parentElement.clientWidth;
            vCanvas.height = vCanvas.parentElement.clientHeight;
            drawVernier();
        }

        function drawVernier() {
            vCtx.clearRect(0, 0, vCanvas.width, vCanvas.height);
            
            const pxPerMm = 12; // Scale factor: 1 mm is 12 pixels
            const startX = 100;
            const startY = 150;

            // Draw object being measured
            const objectType = vSelect.value;
            vCtx.fillStyle = 'rgba(255, 145, 0, 0.4)';
            vCtx.strokeStyle = 'var(--orange)';
            vCtx.lineWidth = 2;
            vCtx.beginPath();
            
            const objW = valVernier * pxPerMm;
            if (objectType === 'cylinder') {
                vCtx.roundRect(startX, startY + 5, objW, 70, 8);
                vCtx.fill(); vCtx.stroke();
                vCtx.fillStyle = '#fff';
                vCtx.font = '12px Inter';
                vCtx.fillText("CILINDRO", startX + 15, startY + 45);
            } else if (objectType === 'sphere') {
                vCtx.arc(startX + objW/2, startY + 40, objW/2, 0, Math.PI*2);
                vCtx.fill(); vCtx.stroke();
            } else if (objectType === 'washer') {
                vCtx.arc(startX + objW/2, startY + 40, objW/2, 0, Math.PI*2);
                vCtx.fill();
                vCtx.stroke();
                // inner circle cutout
                vCtx.globalCompositeOperation = 'destination-out';
                vCtx.beginPath();
                vCtx.arc(startX + objW/2, startY + 40, objW/4, 0, Math.PI*2);
                vCtx.fill();
                vCtx.globalCompositeOperation = 'source-over';
                vCtx.beginPath();
                vCtx.arc(startX + objW/2, startY + 40, objW/4, 0, Math.PI*2);
                vCtx.stroke();
            } else if (objectType === 'block') {
                vCtx.rect(startX, startY + 5, objW, 70);
                vCtx.fill(); vCtx.stroke();
            }

            // --- DRAW FIXED BEAM (MAIN SCALE) ---
            vCtx.fillStyle = '#1e293b';
            vCtx.fillRect(startX - 50, startY - 60, vCanvas.width - startX + 50, 60); // Beam bar
            vCtx.fillRect(startX - 50, startY - 60, 50, 160); // Fixed jaw

            // Draw ticks on Main Scale (top)
            vCtx.strokeStyle = '#fff';
            vCtx.lineWidth = 1;
            vCtx.fillStyle = '#fff';
            vCtx.font = '10px monospace';
            
            const maxMm = 80;
            for (let i = 0; i <= maxMm; i++) {
                const tickX = startX + i * pxPerMm;
                let h = 8;
                if (i % 10 === 0) {
                    h = 16;
                    vCtx.fillText(i, tickX - 3, startY - 25);
                } else if (i % 5 === 0) {
                    h = 12;
                }
                vCtx.beginPath();
                vCtx.moveTo(tickX, startY);
                vCtx.lineTo(tickX, startY - h);
                vCtx.stroke();
            }

            // --- DRAW SLIDING JAW (VERNIER SCALE) ---
            const slideX = startX + valVernier * pxPerMm;
            vCtx.fillStyle = '#334155';
            // Sliding main frame
            vCtx.fillRect(slideX, startY - 70, 240, 190);
            // Sliding jaw extension downwards
            vCtx.fillRect(slideX, startY + 5, 40, 120);

            // Draw ticks on Vernier Scale (Bottom)
            vCtx.strokeStyle = 'var(--cyan)';
            vCtx.fillStyle = 'var(--cyan)';
            vCtx.lineWidth = 1.2;
            
            // Vernier scale matches 19 mm in 20 divisions (each division is 0.95 mm)
            // Vernier zero line is slideX
            const vernierDivs = 20;
            const vernierSpacing = 0.95 * pxPerMm; // 0.95 mm per division
            
            for (let j = 0; j <= vernierDivs; j++) {
                const tickX = slideX + j * vernierSpacing;
                let h = 10;
                if (j % 2 === 0) {
                    h = 16;
                    const numVal = j / 2;
                    vCtx.fillText(numVal, tickX - 3, startY + 30);
                }
                vCtx.beginPath();
                vCtx.moveTo(tickX, startY);
                vCtx.lineTo(tickX, startY + h);
                vCtx.stroke();
            }

            // Draw alignment indices / highlight the coincident one
            // Mathematically check which one aligns best
            const decimals = (valVernier % 1);
            const alignedIdx = Math.round(decimals / 0.05);

            // Highlight coincident tick
            const alignTickX = slideX + alignedIdx * vernierSpacing;
            vCtx.strokeStyle = 'var(--green)';
            vCtx.lineWidth = 1.5;
            vCtx.beginPath();
            vCtx.arc(alignTickX, startY + 5, 6, 0, Math.PI*2);
            vCtx.stroke();
        }

        function checkVernier() {
            const ans = parseFloat(document.getElementById('input-vernier').value.trim());
            const feedback = document.getElementById('feedback-vernier');
            feedback.style.display = 'block';

            if (isNaN(ans)) {
                feedback.className = 'feedback-msg error';
                feedback.innerHTML = 'Ingresa un valor numérico válido.';
                return;
            }

            const diff = Math.abs(ans - valVernier);
            if (diff < 0.04) {
                feedback.className = 'feedback-msg success';
                feedback.innerHTML = `<i class="fas fa-check-circle"></i> ¡Correcto! La medida exacta es ${valVernier.toFixed(2)} mm.`;
            } else {
                feedback.className = 'feedback-msg error';
                feedback.innerHTML = `<i class="fas fa-times-circle"></i> Incorrecto. Intenta de nuevo. Asegúrate de leer los decimales en la escala inferior donde coincida la línea.`;
            }
        }

        // ==================== SUMA DE VECTORES SIMULATION ====================
        const vecCanvas = document.getElementById('vectorsCanvas');
        const vecCtx = vecCanvas.getContext('2d');

        let vecA = { x: 80, y: 50 };  // values in canvas space offset from center
        let vecB = { x: -40, y: 80 };
        let activeHandle = null; // 'A' or 'B'
        const gridUnit = 3; // 1 meter is 3 pixels

        function resizeVectors() {
            vecCanvas.width = vecCanvas.parentElement.clientWidth;
            vecCanvas.height = vecCanvas.parentElement.clientHeight;
            drawVectors();
        }

        function drawVectors() {
            vecCtx.clearRect(0, 0, vecCanvas.width, vecCanvas.height);

            const cx = vecCanvas.width / 2;
            const cy = vecCanvas.height / 2;

            // Draw Cartesian Grid
            vecCtx.strokeStyle = 'rgba(255, 255, 255, 0.03)';
            vecCtx.lineWidth = 1;
            const spacing = 30; // 10 units of distance
            for (let x = cx % spacing; x < vecCanvas.width; x += spacing) {
                vecCtx.beginPath(); vecCtx.moveTo(x, 0); vecCtx.lineTo(x, vecCanvas.height); vecCtx.stroke();
            }
            for (let y = cy % spacing; y < vecCanvas.height; y += spacing) {
                vecCtx.beginPath(); vecCtx.moveTo(0, y); vecCtx.lineTo(vecCanvas.width, y); vecCtx.stroke();
            }

            // Main axes
            vecCtx.strokeStyle = 'rgba(0, 229, 255, 0.15)';
            vecCtx.lineWidth = 2;
            vecCtx.beginPath(); vecCtx.moveTo(0, cy); vecCtx.lineTo(vecCanvas.width, cy); vecCtx.stroke();
            vecCtx.beginPath(); vecCtx.moveTo(cx, 0); vecCtx.lineTo(cx, vecCanvas.height); vecCtx.stroke();

            // Labels on Axes
            vecCtx.fillStyle = 'rgba(0, 229, 255, 0.4)';
            vecCtx.font = '9px monospace';
            for (let i = spacing; i < cx; i += spacing) {
                const units = i / gridUnit;
                vecCtx.fillText(units, cx + i - 6, cy + 12);
                vecCtx.fillText(-units, cx - i - 12, cy + 12);
            }
            for (let i = spacing; i < cy; i += spacing) {
                const units = i / gridUnit;
                vecCtx.fillText(-units, cx + 6, cy + i + 4);
                vecCtx.fillText(units, cx + 6, cy - i + 4);
            }

            // Draw vector A (Blue)
            drawArrow(cx, cy, cx + vecA.x, cy - vecA.y, '#3d5afe', 3);
            // Draw vector B (Green)
            drawArrow(cx, cy, cx + vecB.x, cy - vecB.y, '#00e676', 3);

            // Draw vector B placed at tip of A (dotted line representing tail-to-tip addition)
            vecCtx.strokeStyle = 'rgba(0, 230, 118, 0.35)';
            vecCtx.lineWidth = 1.5;
            vecCtx.setLineDash([4, 4]);
            vecCtx.beginPath();
            vecCtx.moveTo(cx + vecA.x, cy - vecA.y);
            vecCtx.lineTo(cx + vecA.x + vecB.x, cy - vecA.y - vecB.y);
            vecCtx.stroke();
            vecCtx.setLineDash([]);

            // Draw Resultant vector R (Orange)
            drawArrow(cx, cy, cx + vecA.x + vecB.x, cy - vecA.y - vecB.y, '#ff9100', 4.5);

            // Handles / endpoints
            vecCtx.fillStyle = '#fff';
            vecCtx.beginPath(); vecCtx.arc(cx + vecA.x, cy - vecA.y, 6, 0, Math.PI*2); vecCtx.fill();
            vecCtx.beginPath(); vecCtx.arc(cx + vecB.x, cy - vecB.y, 6, 0, Math.PI*2); vecCtx.fill();

            // Tip labels
            vecCtx.fillStyle = '#fff';
            vecCtx.font = 'bold 12px Inter';
            vecCtx.fillText("A", cx + vecA.x + 8, cy - vecA.y - 8);
            vecCtx.fillText("B", cx + vecB.x + 8, cy - vecB.y - 8);
            vecCtx.fillStyle = 'var(--orange)';
            vecCtx.fillText("R", cx + vecA.x + vecB.x + 10, cy - vecA.y - vecB.y - 10);

            // Calculate values
            const valAx = Math.round(vecA.x / gridUnit);
            const valAy = Math.round(vecA.y / gridUnit);
            const valBx = Math.round(vecB.x / gridUnit);
            const valBy = Math.round(vecB.y / gridUnit);

            const magA = Math.sqrt(valAx*valAx + valAy*valAy);
            const magB = Math.sqrt(valBx*valBx + valBy*valBy);
            const angA = (Math.atan2(valAy, valAx) * 180 / Math.PI + 360) % 360;
            const angB = (Math.atan2(valBy, valBx) * 180 / Math.PI + 360) % 360;

            const valRx = valAx + valBx;
            const valRy = valAy + valBy;
            const magR = Math.sqrt(valRx*valRx + valRy*valRy);
            const angR = (Math.atan2(valRy, valRx) * 180 / Math.PI + 360) % 360;

            // Update UI displays
            document.getElementById('vec-a-val').textContent = `${valAx}, ${valAy}`;
            document.getElementById('vec-a-mag').textContent = magA.toFixed(1) + ' m';
            document.getElementById('vec-a-ang').textContent = angA.toFixed(1) + '°';

            document.getElementById('vec-b-val').textContent = `${valBx}, ${valBy}`;
            document.getElementById('vec-b-mag').textContent = magB.toFixed(1) + ' m';
            document.getElementById('vec-b-ang').textContent = angB.toFixed(1) + '°';

            document.getElementById('vec-r-x').textContent = valRx.toFixed(1);
            document.getElementById('vec-r-y').textContent = valRy.toFixed(1);
            document.getElementById('vec-r-mag').textContent = magR.toFixed(1) + ' m';
            document.getElementById('vec-r-ang').textContent = angR.toFixed(1) + '°';
        }

        function drawArrow(fromx, fromy, tox, toy, color, thickness) {
            const headlen = 12; // length of head in pixels
            const dx = tox - fromx;
            const dy = toy - fromy;
            const angle = Math.atan2(dy, dx);

            vecCtx.strokeStyle = color;
            vecCtx.lineWidth = thickness;
            vecCtx.beginPath();
            vecCtx.moveTo(fromx, fromy);
            vecCtx.lineTo(tox, toy);
            vecCtx.stroke();

            // Draw arrowhead
            vecCtx.fillStyle = color;
            vecCtx.beginPath();
            vecCtx.moveTo(tox, toy);
            vecCtx.lineTo(tox - headlen * Math.cos(angle - Math.PI / 6), toy - headlen * Math.sin(angle - Math.PI / 6));
            vecCtx.lineTo(tox - headlen * Math.cos(angle + Math.PI / 6), toy - headlen * Math.sin(angle + Math.PI / 6));
            vecCtx.fill();
        }

        // Mouse handlers for dragging vectors A and B
        vecCanvas.addEventListener('mousedown', (e) => {
            const rect = vecCanvas.getBoundingClientRect();
            const mx = e.clientX - rect.left;
            const my = e.clientY - rect.top;

            const cx = vecCanvas.width / 2;
            const cy = vecCanvas.height / 2;

            const distA = Math.sqrt((mx - (cx + vecA.x))**2 + (my - (cy - vecA.y))**2);
            const distB = Math.sqrt((mx - (cx + vecB.x))**2 + (my - (cy - vecB.y))**2);

            if (distA < 15) { activeHandle = 'A'; }
            else if (distB < 15) { activeHandle = 'B'; }
        });

        vecCanvas.addEventListener('mousemove', (e) => {
            if (!activeHandle) return;
            const rect = vecCanvas.getBoundingClientRect();
            const mx = e.clientX - rect.left;
            const my = e.clientY - rect.top;

            const cx = vecCanvas.width / 2;
            const cy = vecCanvas.height / 2;

            // snap to grid units
            const dx = mx - cx;
            const dy = cy - my;
            const gridX = Math.round(dx / gridUnit) * gridUnit;
            const gridY = Math.round(dy / gridUnit) * gridUnit;

            if (activeHandle === 'A') {
                vecA.x = gridX;
                vecA.y = gridY;
            } else if (activeHandle === 'B') {
                vecB.x = gridX;
                vecB.y = gridY;
            }
            drawVectors();
        });

        window.addEventListener('mouseup', () => { activeHandle = null; });

        // Initial setup
        window.addEventListener('load', () => {
            resizeVernier();
            window.addEventListener('resize', () => {
                if (document.getElementById('content-vernier').classList.contains('active')) {
                    resizeVernier();
                } else {
                    resizeVectors();
                }
            });
        });
    </script>
</body>
</html>
