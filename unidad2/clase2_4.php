<?php require_once '../auth.php'; ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Física 2.4 — Aceleración</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.5.0/reveal.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.5.0/theme/night.min.css">
    <link rel="stylesheet" href="../css/physics_presentation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .reveal { font-size: 28px; }
        .reveal h1,.reveal h2,.reveal h3 { text-transform:none; color:#3d5afe; text-shadow:0 0 10px rgba(61,90,254,0.3); margin-bottom:0.4em; }
        .reveal h1 { font-size:2.2em; } .reveal h2 { font-size:1.5em; }
        .reveal .slides section { text-align:left; padding:20px 0; }
        .reveal .centered { text-align:center; }
        .highlight { color:#ff5252; font-weight:bold; }
        .accent { color:#00e5ff; }
        .indigo-accent { color:#3d5afe; }
        .green { color:#00e676; }
        .orange { color:#ff9100; }
        .box { background:rgba(255,255,255,0.07); padding:18px; border-radius:10px; border:1px solid #3d5afe; margin-bottom:15px; }
        .warning-box { background:rgba(255,82,82,0.08); padding:14px; border-radius:8px; border:1px solid #ff5252; font-size:0.85em; margin-top:15px; }
        .success-box { background:rgba(0,230,118,0.08); padding:14px; border-radius:8px; border:1px solid #00e676; font-size:0.85em; margin-top:15px; }
        .icon-large { font-size:3em; margin-bottom:15px; color:#3d5afe; }
        ul.custom-list { list-style:none; margin-left:0; padding-left:0; }
        ul.custom-list li { margin-bottom:10px; }
        ul.custom-list li i { width:25px; text-align:center; margin-right:10px; }
        
        .btn-back-dashboard {
            position: fixed; top: 20px; left: 20px; z-index: 9999;
            background: rgba(10, 10, 14, 0.85); border: 1px solid #3d5afe; color: #e8ecf4;
            padding: 8px 14px; font-size: 14px; font-family: 'Inter', sans-serif; text-decoration: none; border-radius: 4px;
            display: flex; align-items: center; gap: 8px; transition: all 0.3s ease; box-shadow: 0 0 10px rgba(61, 90, 254, 0.15);
        }
        .btn-back-dashboard:hover { background: #3d5afe; color: #fff; box-shadow: 0 0 15px rgba(61, 90, 254, 0.4); transform: translateY(-1px); }
        
        .mission-input { background: #000; border: 1px solid #3d5afe; color: #3d5afe; padding: 10px; width: 100%; font-family: monospace; font-size: 0.9em; margin-top: 10px; border-radius: 4px; }
        .mission-btn { background: #3d5afe; color: #fff; border: none; padding: 10px 20px; cursor: pointer; font-weight: bold; font-family: sans-serif; margin-top: 10px; border-radius: 4px; }
        .mission-feedback { margin-top: 10px; padding: 8px; border-radius: 4px; font-size: 0.85em; display: none; }
    </style>
</head>
<body>
<a href="../dashboard.php" class="btn-back-dashboard">
    <i class="fas fa-arrow-left"></i> VOLVER AL PORTAL
</a>
<div class="reveal">
    <div class="slides">

        <section class="centered">
            <i class="fas fa-atom icon-large"></i>
            <h1>Aceleración</h1>
            <h3>Cambio de velocidad en el tiempo</h3>
            <p class="indigo-accent">Unidad 2 — Módulo 2.4</p>
            <hr>
            <p><small>Física Academy | 2026</small></p>
        </section>

        <section>
            <h2><i class="fas fa-book-open"></i> Conceptos Clave</h2>
            <div class="box">
                <ul class="custom-list">
                    <li class="fragment"><i class="fas fa-check-circle indigo-accent"></i> <strong>Aceleración:</strong> Tasa de cambio de la velocidad.</li><li class="fragment"><i class="fas fa-check-circle indigo-accent"></i> <strong>Unidades:</strong> Se mide en m/s² en el SI.</li>
                </ul>
            </div>
            <div class="fragment success-box">
                <i class="fas fa-lightbulb green"></i> <strong>Fórmula Principal:</strong> a = Δv / Δt
            </div>
        </section>

        <section>
            <h2><i class="fas fa-crosshairs highlight"></i> Mini Misión 2.4</h2>
            <div class="box">
                <p>¿Cuál es la aceleración (m/s²) si pasas de 0 a 10 m/s en 2 s?</p>
            </div>
            <input type="text" id="mission-2-4-input" class="mission-input" placeholder="Escribe tu respuesta aquí...">
            <button onclick="checkMission()" class="mission-btn">Verificar</button>
            <div id="mission-feedback" class="mission-feedback"></div>
            <script>
                function checkMission() {
                    const ans = document.getElementById('mission-2-4-input').value.trim().toLowerCase();
                    const fb = document.getElementById('mission-feedback');
                    const validAnswers = ['5'];
                    fb.style.display = 'block';
                    if (validAnswers.includes(ans)) {
                        fb.className = 'mission-feedback success-box';
                        fb.style.border = '1px solid #00e676';
                        fb.innerHTML = '<i class="fas fa-check-circle green"></i> ¡Correcto! 10 / 2 = 5 m/s².';
                    } else {
                        fb.className = 'mission-feedback warning-box';
                        fb.style.border = '1px solid #ff5252';
                        fb.innerHTML = '<i class="fas fa-times-circle highlight"></i> Incorrecto. Usa a = v/t';
                    }
                }
            </script>
        </section>

        <section class="homework-slide">
            <h2><i class="fas fa-edit highlight"></i> Actividad de Clase</h2>
            <div class="box">
                <p>Resuelve los ejercicios correspondientes al Módulo 2.4 en tu cuaderno y preséntalos al final de la sesión.</p>
            </div>
        </section>

        <section class="centered">
            <h1>¿Preguntas?</h1>
            <i class="fas fa-arrow-right icon-large"></i>
            <p>Física Academy — Módulo 2.4</p>
        </section>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.5.0/reveal.min.js"></script>
<script>
    if (localStorage.getItem('physics_show_tasks') !== 'true') {
        const hw = document.querySelector('.homework-slide');
        if (hw) hw.remove();
    }
    Reveal.initialize({
        hash: false, history: false, slideNumber: true, controls: true, progress: true, center: true, transition: 'slide'
    });
</script>
</body>
</html>
