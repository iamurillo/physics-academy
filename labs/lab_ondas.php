<?php require_once '../auth.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhysicsLab — Simulador de Ondas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root { --bg:#060a14; --surface:#0c1020; --teal:#64ffda; --cyan:#00e5ff; --red:#ff5252; --orange:#ff9100; }
        * { margin:0; padding:0; box-sizing:border-box; }
        body { background:var(--bg); color:#c8d6e5; font-family:'Inter',sans-serif; min-height:100vh; display:flex; flex-direction:column; }
        .lab-header { padding:16px 30px; border-bottom:1px solid rgba(100,255,218,0.15); background:rgba(6,10,20,0.97); display:flex; justify-content:space-between; align-items:center; }
        .lab-header h1 { font-size:1em; color:var(--teal); display:flex; align-items:center; gap:10px; letter-spacing:2px; text-transform:uppercase; }
        .btn-back { color:#556; text-decoration:none; border:1px solid #1a1e30; padding:8px 16px; font-size:0.78em; border-radius:3px; transition:all 0.3s; display:flex; align-items:center; gap:6px; }
        .btn-back:hover { color:var(--teal); border-color:var(--teal); }

        .lab-container { flex:1; display:flex; gap:0; }
        .canvas-area { flex:1; position:relative; background:linear-gradient(180deg,#080c18 0%,#0a1020 100%); border-right:1px solid #151a2e; }
        #waveCanvas { width:100%; height:100%; display:block; }

        .control-panel { width:320px; background:var(--surface); padding:24px; overflow-y:auto; display:flex; flex-direction:column; gap:18px; }
        .panel-title { font-size:0.8em; color:var(--teal); text-transform:uppercase; letter-spacing:2px; font-weight:700; padding-bottom:10px; border-bottom:1px solid #151a2e; }
        .control-group { display:flex; flex-direction:column; gap:6px; }
        .control-group label { font-size:0.75em; color:#667; text-transform:uppercase; letter-spacing:1px; font-weight:600; }
        .control-group .value-display { font-family:'JetBrains Mono',monospace; font-size:1.05em; color:#fff; font-weight:700; }
        input[type="range"] { -webkit-appearance:none; width:100%; height:4px; background:#1a1e30; border-radius:2px; outline:none; }
        input[type="range"]::-webkit-slider-thumb { -webkit-appearance:none; width:16px; height:16px; border-radius:50%; background:var(--teal); cursor:pointer; box-shadow:0 0 8px rgba(100,255,218,0.4); }

        .wave-mode-btns { display:flex; gap:8px; }
        .wave-mode-btn { flex:1; padding:10px; background:transparent; border:1px solid #1a1e30; color:#556; font-family:'Inter',sans-serif; font-size:0.72em; font-weight:600; text-transform:uppercase; letter-spacing:1px; cursor:pointer; border-radius:4px; transition:all 0.3s; text-align:center; }
        .wave-mode-btn.active { background:rgba(100,255,218,0.1); border-color:var(--teal); color:var(--teal); }
        .wave-mode-btn:hover { border-color:var(--teal); color:var(--teal); }

        .formula-box { background:rgba(100,255,218,0.03); border:1px solid rgba(100,255,218,0.1); border-radius:4px; padding:14px; font-family:'JetBrains Mono',monospace; font-size:0.75em; color:#889; line-height:1.8; }
        .formula-box .formula { color:var(--teal); font-weight:700; }

        .info-grid { display:grid; grid-template-columns:1fr 1fr; gap:8px; }
        .info-box { background:rgba(0,0,0,0.3); border:1px solid #151a2e; border-radius:4px; padding:10px; text-align:center; }
        .info-box .info-label { font-size:0.65em; color:#556; text-transform:uppercase; letter-spacing:1px; margin-bottom:4px; }
        .info-box .info-value { font-family:'JetBrains Mono',monospace; font-size:0.95em; color:var(--teal); font-weight:700; }

        .checkbox-group { display:flex; align-items:center; gap:10px; cursor:pointer; }
        .checkbox-group input[type="checkbox"] { accent-color: var(--teal); width:16px; height:16px; }
        .checkbox-group label { font-size:0.78em; color:#889; cursor:pointer; }

        @media(max-width:768px) { .lab-container{flex-direction:column;} .control-panel{width:100%;} .canvas-area{min-height:300px;} }
    </style>
</head>
<body>
    <div class="lab-header">
        <h1><i class="fas fa-wave-square"></i> Simulador de Ondas</h1>
        <a href="dashboard.php" class="btn-back"><i class="fas fa-arrow-left"></i> Volver</a>
    </div>

    <div class="lab-container">
        <div class="canvas-area">
            <canvas id="waveCanvas"></canvas>
        </div>

        <div class="control-panel">
            <div class="panel-title"><i class="fas fa-sliders-h"></i> Controles de Onda</div>

            <div class="wave-mode-btns">
                <button class="wave-mode-btn active" data-mode="single" onclick="setMode('single',this)">Una Onda</button>
                <button class="wave-mode-btn" data-mode="superposition" onclick="setMode('superposition',this)">Superposición</button>
                <button class="wave-mode-btn" data-mode="standing" onclick="setMode('standing',this)">Estacionaria</button>
            </div>

            <div class="control-group">
                <label>Amplitud (A₁)</label>
                <span class="value-display" id="amp1-display">50 px</span>
                <input type="range" id="amp1" min="10" max="120" value="50" step="1">
            </div>

            <div class="control-group">
                <label>Frecuencia (f₁)</label>
                <span class="value-display" id="freq1-display">2.0 Hz</span>
                <input type="range" id="freq1" min="0.5" max="8" value="2" step="0.1">
            </div>

            <div class="control-group">
                <label>Longitud de Onda (λ₁)</label>
                <span class="value-display" id="wl1-display">200 px</span>
                <input type="range" id="wl1" min="50" max="500" value="200" step="10">
            </div>

            <div id="wave2-controls" style="display:none;">
                <div class="panel-title" style="margin-top:6px;"><i class="fas fa-plus"></i> Segunda Onda</div>
                <div class="control-group" style="margin-top:10px;">
                    <label>Amplitud (A₂)</label>
                    <span class="value-display" id="amp2-display">50 px</span>
                    <input type="range" id="amp2" min="10" max="120" value="50" step="1">
                </div>
                <div class="control-group">
                    <label>Frecuencia (f₂)</label>
                    <span class="value-display" id="freq2-display">3.0 Hz</span>
                    <input type="range" id="freq2" min="0.5" max="8" value="3" step="0.1">
                </div>
                <div class="control-group">
                    <label>Longitud de Onda (λ₂)</label>
                    <span class="value-display" id="wl2-display">150 px</span>
                    <input type="range" id="wl2" min="50" max="500" value="150" step="10">
                </div>
            </div>

            <div class="checkbox-group">
                <input type="checkbox" id="showEnvelope">
                <label for="showEnvelope">Mostrar envolvente</label>
            </div>

            <div class="panel-title"><i class="fas fa-chart-bar"></i> Propiedades</div>
            <div class="info-grid">
                <div class="info-box">
                    <div class="info-label">Velocidad</div>
                    <div class="info-value" id="info-v">400 px/s</div>
                </div>
                <div class="info-box">
                    <div class="info-label">Periodo</div>
                    <div class="info-value" id="info-T">0.50 s</div>
                </div>
                <div class="info-box">
                    <div class="info-label">v = fλ</div>
                    <div class="info-value" id="info-eq">✓</div>
                </div>
                <div class="info-box">
                    <div class="info-label">Modo</div>
                    <div class="info-value" id="info-mode">TRANS.</div>
                </div>
            </div>

            <div class="formula-box">
                <span class="formula">y(x,t) = A·sin(kx − ωt)</span><br>
                <span class="formula">k = 2π/λ</span> &nbsp;|&nbsp; <span class="formula">ω = 2πf</span><br>
                <span class="formula">v = fλ = ω/k</span><br>
                <span class="formula">T = 1/f</span>
            </div>
        </div>
    </div>

    <script>
        const canvas = document.getElementById('waveCanvas');
        const ctx = canvas.getContext('2d');
        let mode = 'single';
        let time = 0;

        function resize() {
            canvas.width = canvas.parentElement.clientWidth;
            canvas.height = canvas.parentElement.clientHeight;
        }
        window.addEventListener('resize', resize);
        resize();

        // Sliders
        const sliders = {
            amp1: document.getElementById('amp1'),
            freq1: document.getElementById('freq1'),
            wl1: document.getElementById('wl1'),
            amp2: document.getElementById('amp2'),
            freq2: document.getElementById('freq2'),
            wl2: document.getElementById('wl2'),
        };

        Object.values(sliders).forEach(s => s.addEventListener('input', updateInfo));

        function setMode(m, btn) {
            mode = m;
            document.querySelectorAll('.wave-mode-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            document.getElementById('wave2-controls').style.display =
                (m === 'superposition' || m === 'standing') ? 'block' : 'none';
            document.getElementById('info-mode').textContent =
                m === 'single' ? 'SIMPLE' : m === 'superposition' ? 'SUPER.' : 'ESTAC.';
            updateInfo();
        }

        function updateInfo() {
            const f1 = parseFloat(sliders.freq1.value);
            const wl1 = parseFloat(sliders.wl1.value);
            const v1 = f1 * wl1;
            const T1 = 1 / f1;

            document.getElementById('amp1-display').textContent = sliders.amp1.value + ' px';
            document.getElementById('freq1-display').textContent = f1.toFixed(1) + ' Hz';
            document.getElementById('wl1-display').textContent = wl1 + ' px';
            document.getElementById('amp2-display').textContent = sliders.amp2.value + ' px';
            document.getElementById('freq2-display').textContent = parseFloat(sliders.freq2.value).toFixed(1) + ' Hz';
            document.getElementById('wl2-display').textContent = sliders.wl2.value + ' px';

            document.getElementById('info-v').textContent = v1.toFixed(0) + ' px/s';
            document.getElementById('info-T').textContent = T1.toFixed(2) + ' s';
        }
        updateInfo();

        function drawWave(amp, freq, wavelength, color, alpha, phaseOffset = 0, direction = 1) {
            const k = 2 * Math.PI / wavelength;
            const omega = 2 * Math.PI * freq;
            const cy = canvas.height / 2;

            ctx.strokeStyle = color;
            ctx.lineWidth = 2.5;
            ctx.globalAlpha = alpha;
            ctx.beginPath();

            for (let x = 0; x < canvas.width; x++) {
                const y = cy - amp * Math.sin(k * x - direction * omega * time + phaseOffset);
                if (x === 0) ctx.moveTo(x, y);
                else ctx.lineTo(x, y);
            }
            ctx.stroke();
            ctx.globalAlpha = 1;
        }

        function drawEnvelope(amp1, freq1, wl1, amp2, freq2, wl2) {
            if (!document.getElementById('showEnvelope').checked) return;
            const k1 = 2 * Math.PI / wl1;
            const k2 = 2 * Math.PI / wl2;
            const o1 = 2 * Math.PI * freq1;
            const o2 = 2 * Math.PI * freq2;
            const cy = canvas.height / 2;

            ctx.strokeStyle = 'rgba(255,145,0,0.4)';
            ctx.lineWidth = 1;
            ctx.setLineDash([4, 4]);

            // Upper envelope
            ctx.beginPath();
            for (let x = 0; x < canvas.width; x++) {
                let maxY = 0;
                for (let dt = 0; dt < 2; dt += 0.05) {
                    const y1 = amp1 * Math.sin(k1 * x - o1 * dt);
                    const y2 = amp2 * Math.sin(k2 * x - o2 * dt);
                    maxY = Math.max(maxY, Math.abs(y1 + y2));
                }
                if (x === 0) ctx.moveTo(x, cy - maxY);
                else ctx.lineTo(x, cy - maxY);
            }
            ctx.stroke();

            // Lower envelope
            ctx.beginPath();
            for (let x = 0; x < canvas.width; x++) {
                let maxY = 0;
                for (let dt = 0; dt < 2; dt += 0.05) {
                    const y1 = amp1 * Math.sin(k1 * x - o1 * dt);
                    const y2 = amp2 * Math.sin(k2 * x - o2 * dt);
                    maxY = Math.max(maxY, Math.abs(y1 + y2));
                }
                if (x === 0) ctx.moveTo(x, cy + maxY);
                else ctx.lineTo(x, cy + maxY);
            }
            ctx.stroke();
            ctx.setLineDash([]);
        }

        function animate() {
            time += 0.016;
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            // Grid
            ctx.strokeStyle = 'rgba(100,255,218,0.03)';
            ctx.lineWidth = 1;
            for (let i = 0; i < canvas.width; i += 40) {
                ctx.beginPath(); ctx.moveTo(i, 0); ctx.lineTo(i, canvas.height); ctx.stroke();
            }
            for (let i = 0; i < canvas.height; i += 40) {
                ctx.beginPath(); ctx.moveTo(0, i); ctx.lineTo(canvas.width, i); ctx.stroke();
            }

            // Center line
            ctx.strokeStyle = 'rgba(100,255,218,0.15)';
            ctx.lineWidth = 1;
            ctx.setLineDash([5, 5]);
            ctx.beginPath();
            ctx.moveTo(0, canvas.height / 2);
            ctx.lineTo(canvas.width, canvas.height / 2);
            ctx.stroke();
            ctx.setLineDash([]);

            const a1 = parseFloat(sliders.amp1.value);
            const f1 = parseFloat(sliders.freq1.value);
            const w1 = parseFloat(sliders.wl1.value);
            const a2 = parseFloat(sliders.amp2.value);
            const f2 = parseFloat(sliders.freq2.value);
            const w2 = parseFloat(sliders.wl2.value);

            if (mode === 'single') {
                drawWave(a1, f1, w1, '#64ffda', 1);
            } else if (mode === 'superposition') {
                drawWave(a1, f1, w1, '#64ffda', 0.4);
                drawWave(a2, f2, w2, '#e040fb', 0.4);
                // Sum
                const k1 = 2 * Math.PI / w1, o1 = 2 * Math.PI * f1;
                const k2 = 2 * Math.PI / w2, o2 = 2 * Math.PI * f2;
                const cy = canvas.height / 2;
                ctx.strokeStyle = '#fff';
                ctx.lineWidth = 2.5;
                ctx.beginPath();
                for (let x = 0; x < canvas.width; x++) {
                    const y = cy - (a1 * Math.sin(k1 * x - o1 * time) + a2 * Math.sin(k2 * x - o2 * time));
                    if (x === 0) ctx.moveTo(x, y); else ctx.lineTo(x, y);
                }
                ctx.stroke();
                drawEnvelope(a1, f1, w1, a2, f2, w2);
            } else if (mode === 'standing') {
                // Two waves traveling in opposite directions
                drawWave(a1, f1, w1, 'rgba(100,255,218,0.25)', 1, 0, 1);
                drawWave(a1, f1, w1, 'rgba(224,64,251,0.25)', 1, 0, -1);
                // Standing wave result
                const k1 = 2 * Math.PI / w1, o1 = 2 * Math.PI * f1;
                const cy = canvas.height / 2;
                ctx.strokeStyle = '#fff';
                ctx.lineWidth = 3;
                ctx.shadowColor = '#64ffda';
                ctx.shadowBlur = 8;
                ctx.beginPath();
                for (let x = 0; x < canvas.width; x++) {
                    const y = cy - 2 * a1 * Math.sin(k1 * x) * Math.cos(o1 * time);
                    if (x === 0) ctx.moveTo(x, y); else ctx.lineTo(x, y);
                }
                ctx.stroke();
                ctx.shadowBlur = 0;

                // Nodes
                for (let x = 0; x < canvas.width; x += w1 / 2) {
                    ctx.fillStyle = 'rgba(255,82,82,0.8)';
                    ctx.beginPath();
                    ctx.arc(x, cy, 5, 0, Math.PI * 2);
                    ctx.fill();
                }
                // Antinodes
                for (let x = w1 / 4; x < canvas.width; x += w1 / 2) {
                    ctx.strokeStyle = 'rgba(255,145,0,0.4)';
                    ctx.lineWidth = 1;
                    ctx.setLineDash([3, 3]);
                    ctx.beginPath();
                    ctx.moveTo(x, cy - 2 * a1);
                    ctx.lineTo(x, cy + 2 * a1);
                    ctx.stroke();
                    ctx.setLineDash([]);
                }
            }

            // Labels
            ctx.fillStyle = 'rgba(100,255,218,0.4)';
            ctx.font = '12px JetBrains Mono';
            ctx.fillText('y', 12, canvas.height / 2 - a1 - 20);
            ctx.fillText('x', canvas.width - 25, canvas.height / 2 + 20);

            if (mode === 'standing') {
                ctx.fillStyle = 'rgba(255,82,82,0.6)';
                ctx.font = '11px Inter';
                ctx.fillText('● Nodos', 15, 25);
                ctx.fillStyle = 'rgba(255,145,0,0.6)';
                ctx.fillText('┊ Antinodos', 15, 42);
            }

            requestAnimationFrame(animate);
        }
        animate();
    </script>
</body>
</html>
