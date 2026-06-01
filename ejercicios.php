<?php require_once 'auth.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhysicsAcademy — Área de Ejercicios</title>
    <meta name="description" content="Área de ejercicios prácticos interactivos de PhysicsAcademy. Resuelve problemas de física y mide tu puntuación.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/physics.css">
    <style>
        .exercises-progress-card {
            background: rgba(12, 16, 32, 0.95);
            border: 1px solid rgba(0, 229, 255, 0.2);
            padding: 24px;
            margin-bottom: 20px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.3);
        }
        .progress-info { flex-grow: 1; }
        .progress-title {
            font-size: 1.1em; font-weight: 700; color: #fff; margin-bottom: 8px; display: flex; align-items: center; gap: 8px;
        }
        .progress-bar-container {
            background: #060a14; height: 12px; border-radius: 6px; overflow: hidden; border: 1px solid #1a2035; position: relative; margin-top: 10px;
        }
        .progress-bar-fill {
            background: linear-gradient(90deg, var(--physics-indigo), var(--physics-cyan));
            height: 100%; width: 0%; transition: width 0.6s cubic-bezier(0.4, 0, 0.2, 1); box-shadow: 0 0 10px var(--primary-glow);
        }
        .progress-score {
            font-family: var(--font-mono); font-size: 1.5em; color: var(--physics-cyan); font-weight: 700; text-shadow: 0 0 10px var(--primary-glow);
        }
        .reset-btn {
            background: transparent; border: 1px solid #ff5252; color: #ff5252; padding: 8px 16px; border-radius: 3px; cursor: pointer; font-family: var(--font-main); font-size: 0.78em; font-weight: 600; transition: all 0.3s ease;
        }
        .reset-btn:hover { background: rgba(255, 82, 82, 0.1); box-shadow: 0 0 10px rgba(255, 82, 82, 0.2); }

        .lab-tabs {
            display: flex; background: rgba(12, 16, 32, 0.5); border-bottom: 1px solid rgba(255,255,255,0.05); margin-bottom: 20px; overflow-x: auto;
        }
        .lab-tab {
            padding: 14px 24px; color: #567; font-weight: 700; font-size: 0.8em; text-transform: uppercase; letter-spacing: 1px; cursor: pointer; border-bottom: 2px solid transparent; transition: all 0.3s; white-space: nowrap;
        }
        .lab-tab.active { color: var(--physics-cyan); border-bottom-color: var(--physics-cyan); background: rgba(0,229,255,0.02); }
        .lab-tab:hover { color: var(--physics-cyan); }
        .lab-content { display: none; }
        .lab-content.active { display: block; }

        .exercise-card {
            background: var(--card-bg); border: 1px solid rgba(255,255,255,0.03); border-radius: 4px; padding: 24px; display: flex; flex-direction: column; justify-content: space-between; position: relative; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(0,0,0,0.25); min-height: 380px;
        }
        .exercise-card::before {
            content: ''; position: absolute; top: 0; left: 0; width: 4px; height: 100%; background: var(--theme-color, var(--physics-cyan)); border-radius: 4px 0 0 4px;
        }
        .exercise-card:hover { transform: translateY(-4px); border-color: rgba(255, 255, 255, 0.08); box-shadow: 0 8px 25px rgba(0,0,0,0.4); }
        
        .ex-cyan { --theme-color: var(--physics-cyan); }
        .ex-indigo { --theme-color: var(--physics-indigo); }
        .ex-green { --theme-color: var(--physics-green); }
        .ex-orange { --theme-color: var(--physics-orange); }
        .ex-magenta { --theme-color: var(--physics-magenta); }
        .ex-yellow { --theme-color: var(--physics-yellow); }

        .ex-badge { font-size: 0.72em; font-weight: 700; color: var(--theme-color); font-family: var(--font-mono); letter-spacing: 1px; text-transform: uppercase; margin-bottom: 12px; display: inline-block; }
        .ex-title { color: #fff; font-size: 1.15em; font-weight: 700; margin-bottom: 10px; line-height: 1.3; }
        .ex-desc { color: #8fa0b3; font-size: 0.85em; line-height: 1.5; margin-bottom: 18px; flex-grow: 1; }
        .ex-formula { background: rgba(255, 255, 255, 0.03); border: 1px dashed rgba(255, 255, 255, 0.07); border-radius: 4px; padding: 8px 12px; font-family: var(--font-mono); font-size: 0.82em; color: var(--theme-color); margin-bottom: 18px; display: flex; align-items: center; justify-content: center; text-align: center; }
        
        .ex-interactive { margin-top: 10px; }
        .ex-input { width: 100%; background: rgba(0, 0, 0, 0.6); border: 1px solid rgba(255,255,255,0.08); border-bottom: 2px solid var(--theme-color); color: #fff; padding: 10px 14px; font-family: var(--font-mono); font-size: 0.88em; border-radius: 3px 3px 0 0; outline: none; transition: all 0.3s ease; }
        .ex-btn { width: 100%; background: rgba(255, 255, 255, 0.02); border: 1px solid var(--theme-color); color: var(--theme-color); padding: 10px; cursor: pointer; font-weight: 700; font-size: 0.85em; margin-top: 8px; border-radius: 3px; transition: all 0.3s ease; text-transform: uppercase; letter-spacing: 1px; }
        .ex-btn:hover { background: var(--theme-color); color: #060a14; box-shadow: 0 0 15px var(--theme-color); }
        
        .ex-feedback { margin-top: 10px; padding: 8px 12px; border-radius: 3px; font-size: 0.78em; display: none; line-height: 1.4; }
        .ex-feedback.success { background: rgba(0, 230, 118, 0.06); border: 1px solid #00e676; color: #00e676; display: block; }
        .ex-feedback.error { background: rgba(255, 82, 82, 0.06); border: 1px solid #ff5252; color: #ff5252; display: block; }

        .exercise-card.resolved { border-color: rgba(0, 230, 118, 0.3); background: rgba(8, 25, 18, 0.95); }
        .exercise-card.resolved .ex-input { border-bottom-color: #00e676; color: #888; background: rgba(0,0,0,0.8); pointer-events: none; }
        .exercise-card.resolved .ex-btn { border-color: #00e676; background: rgba(0, 230, 118, 0.08); color: #00e676; pointer-events: none; }

        .dynamic-lab-card { background: rgba(12, 16, 32, 0.95); border: 1px solid rgba(0, 230, 118, 0.25); padding: 24px; margin-bottom: 30px; border-radius: 4px; box-shadow: 0 5px 25px rgba(0,0,0,0.3); display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 24px; }
        .lab-canvas-container { background: #040810; border: 1px solid #1a2035; border-radius: 4px; display: flex; align-items: center; justify-content: center; height: 220px; }
        .lab-controls { display: flex; flex-direction: column; justify-content: center; gap: 12px; }
        .control-row { display: flex; flex-direction: column; gap: 4px; }
        .control-row label { font-size: 0.8em; color: #7fa5c4; display: flex; justify-content: space-between; font-family: var(--font-mono); }
        .control-row input[type="range"] { width: 100%; accent-color: #00e676; background: #151a2e; height: 6px; border-radius: 3px; cursor: pointer; }
        .lab-stats { display: flex; gap: 15px; font-family: var(--font-mono); font-size: 0.8em; background: rgba(0,0,0,0.4); padding: 10px 14px; border-radius: 3px; border: 1px solid rgba(255,255,255,0.03); margin-top: 5px; }
        .lab-stats span { color: #fff; } .lab-stats b { color: #00e676; }
    </style>
</head>
<body class="dashboard-page">
    <div class="floating-equations" id="floating-equations"></div>

    <header>
        <div class="brand"><i class="fas fa-atom"></i> PHYSICS<span style="color:#e8ecf4;">ACADEMY</span></div>
        <div class="header-right">
            <a href="dashboard.php" class="btn-header"><i class="fas fa-layer-group"></i> PORTAL</a>
            <a href="ejercicios.php" class="btn-header" style="color: var(--primary); border-color: rgba(0, 229, 255, 0.25); background: rgba(0, 229, 255, 0.05);"><i class="fas fa-pen-clip"></i> EJERCICIOS</a>
            <a href="index.php" class="btn-header" onclick="handleLogout()"><i class="fas fa-sign-out-alt"></i> SALIR</a>
        </div>
    </header>

    <div class="system-stats">
        <span><i class="fas fa-star" style="color:var(--physics-yellow);"></i> PUNTUACIÓN TOTAL: <b id="score-display">0/21</b></span>
        <span><i class="fas fa-spinner" style="color:var(--physics-teal);"></i> PROGRESO: <b id="progress-percent">0%</b></span>
    </div>

    <div class="dashboard-main">
        <h2 class="section-title" style="color:var(--physics-cyan); border-left-color:var(--physics-cyan); background:linear-gradient(90deg, rgba(0,229,255,0.06) 0%, transparent 100%);">
            <i class="fas fa-pen-clip section-icon"></i> ÁREA DE EJERCICIOS PRÁCTICOS
        </h2>

        <div class="exercises-progress-card">
            <div class="progress-info">
                <div class="progress-title"><i class="fas fa-microscope" style="color:var(--physics-cyan);"></i> Progreso Global</div>
                <p style="font-size:0.8em; color:#789;">Completa todos los ejercicios de cada unidad para dominar los conceptos.</p>
                <div class="progress-bar-container"><div class="progress-bar-fill" id="bar-fill"></div></div>
            </div>
            <div style="text-align:right;">
                <div class="progress-score" id="score-text">0 / 21</div>
                <button class="reset-btn" onclick="resetProgress()" style="margin-top:10px;"><i class="fas fa-rotate-left"></i> REINICIAR</button>
            </div>
        </div>

        <div class="lab-tabs">
            <div class="lab-tab active" onclick="switchTab('u1')">Unidad 1</div>
            <div class="lab-tab" onclick="switchTab('u2')">Unidad 2</div>
            <div class="lab-tab" onclick="switchTab('u3')">Unidad 3</div>
            <div class="lab-tab" onclick="switchTab('u4')">Unidad 4</div>
            <div class="lab-tab" onclick="switchTab('u5')">Unidad 5</div>
            <div class="lab-tab" onclick="switchTab('adv')">Temas Avanzados</div>
        </div>

        <!-- UNIDAD 1 -->
        <div class="lab-content active" id="tab-u1">
            <div class="modules-grid">
                <article class="exercise-card ex-cyan" id="card-1">
                    <div>
                        <span class="ex-badge">Módulo 1.1 — Conversiones</span>
                        <h3 class="ex-title">Kilómetros a Metros</h3>
                        <p class="ex-desc">Un automóvil recorre 3.5 km. ¿A cuántos metros equivale esto?</p>
                        <div class="ex-formula">1 km = 1000 m</div>
                    </div>
                    <div class="ex-interactive">
                        <input type="text" class="ex-input" id="input-1" placeholder="Ej: 3500">
                        <button class="ex-btn" onclick="verifyExercise(1)" id="btn-1">Verificar</button>
                        <div class="ex-feedback" id="feedback-1"></div>
                    </div>
                </article>
                <article class="exercise-card ex-cyan" id="card-2">
                    <div>
                        <span class="ex-badge">Módulo 1.3 — Notación</span>
                        <h3 class="ex-title">Orden de Magnitud</h3>
                        <p class="ex-desc">La expresión $10^3$ equivale numéricamente a:</p>
                        <div class="ex-formula">10 × 10 × 10</div>
                    </div>
                    <div class="ex-interactive">
                        <input type="text" class="ex-input" id="input-2" placeholder="Ej: 1000">
                        <button class="ex-btn" onclick="verifyExercise(2)" id="btn-2">Verificar</button>
                        <div class="ex-feedback" id="feedback-2"></div>
                    </div>
                </article>
                <article class="exercise-card ex-cyan" id="card-3">
                    <div>
                        <span class="ex-badge">Módulo 1.6 — Error</span>
                        <h3 class="ex-title">Cifras Significativas</h3>
                        <p class="ex-desc">Aproxima el valor de Pi ($\pi$) a dos lugares decimales.</p>
                        <div class="ex-formula">3.14159...</div>
                    </div>
                    <div class="ex-interactive">
                        <input type="text" class="ex-input" id="input-3" placeholder="Ej: 3.14">
                        <button class="ex-btn" onclick="verifyExercise(3)" id="btn-3">Verificar</button>
                        <div class="ex-feedback" id="feedback-3"></div>
                    </div>
                </article>
            </div>
        </div>

        <!-- UNIDAD 2 -->
        <div class="lab-content" id="tab-u2">
            <div class="modules-grid">
                <article class="exercise-card ex-indigo" id="card-4">
                    <div>
                        <span class="ex-badge">Módulo 2.3 — Velocidad</span>
                        <h3 class="ex-title">Distancia en MRU</h3>
                        <p class="ex-desc">Un dron vuela con MRU a 20 m/s durante 15 s. ¿Qué distancia total recorre (m)?</p>
                        <div class="ex-formula">d = v • t</div>
                    </div>
                    <div class="ex-interactive">
                        <input type="text" class="ex-input" id="input-4" placeholder="Ej: 300">
                        <button class="ex-btn" onclick="verifyExercise(4)" id="btn-4">Verificar</button>
                        <div class="ex-feedback" id="feedback-4"></div>
                    </div>
                </article>
                <article class="exercise-card ex-indigo" id="card-5">
                    <div>
                        <span class="ex-badge">Módulo 2.4 — Aceleración</span>
                        <h3 class="ex-title">Cambio de Velocidad</h3>
                        <p class="ex-desc">Un coche pasa de 0 a 30 m/s en 6 segundos. ¿Cuál es su aceleración (m/s²)?</p>
                        <div class="ex-formula">a = Δv / t</div>
                    </div>
                    <div class="ex-interactive">
                        <input type="text" class="ex-input" id="input-5" placeholder="Ej: 5">
                        <button class="ex-btn" onclick="verifyExercise(5)" id="btn-5">Verificar</button>
                        <div class="ex-feedback" id="feedback-5"></div>
                    </div>
                </article>
                <article class="exercise-card ex-indigo" id="card-6">
                    <div>
                        <span class="ex-badge">Módulo 2.7 — Caída Libre</span>
                        <h3 class="ex-title">Gravedad Terrestre</h3>
                        <p class="ex-desc">¿Cuál es el valor estándar aceptado de la aceleración gravitacional en la Tierra ($g$) en m/s²?</p>
                        <div class="ex-formula">g ≈ 9.8 o 9.81</div>
                    </div>
                    <div class="ex-interactive">
                        <input type="text" class="ex-input" id="input-6" placeholder="Ej: 9.8">
                        <button class="ex-btn" onclick="verifyExercise(6)" id="btn-6">Verificar</button>
                        <div class="ex-feedback" id="feedback-6"></div>
                    </div>
                </article>
            </div>
        </div>

        <!-- UNIDAD 3 -->
        <div class="lab-content" id="tab-u3">
            <div class="modules-grid">
                <article class="exercise-card ex-green" id="card-7">
                    <div>
                        <span class="ex-badge">Módulo 3.2 — Leyes de Newton</span>
                        <h3 class="ex-title">Fuerza Neta</h3>
                        <p class="ex-desc">Una caja de 5 kg se acelera a 9 m/s². ¿Cuánta fuerza (N) se le está aplicando?</p>
                        <div class="ex-formula">F = m • a</div>
                    </div>
                    <div class="ex-interactive">
                        <input type="text" class="ex-input" id="input-7" placeholder="Ej: 45">
                        <button class="ex-btn" onclick="verifyExercise(7)" id="btn-7">Verificar</button>
                        <div class="ex-feedback" id="feedback-7"></div>
                    </div>
                </article>
                <article class="exercise-card ex-green" id="card-8">
                    <div>
                        <span class="ex-badge">Módulo 3.3 — DCL</span>
                        <h3 class="ex-title">Fuerza Normal</h3>
                        <p class="ex-desc">Un objeto de masa 10 kg descansa sobre el piso. ¿Cuál es el valor aproximado de la fuerza Normal (N)? Asume g=10 para facilitar el cálculo.</p>
                        <div class="ex-formula">N = m • g</div>
                    </div>
                    <div class="ex-interactive">
                        <input type="text" class="ex-input" id="input-8" placeholder="Ej: 100">
                        <button class="ex-btn" onclick="verifyExercise(8)" id="btn-8">Verificar</button>
                        <div class="ex-feedback" id="feedback-8"></div>
                    </div>
                </article>
                <article class="exercise-card ex-green" id="card-9">
                    <div>
                        <span class="ex-badge">Módulo 3.6 — Tensiones</span>
                        <h3 class="ex-title">Tensión de Cuerda</h3>
                        <p class="ex-desc">Si levantas un balde de 5 kg verticalmente a velocidad constante, ¿cuál es la tensión de la cuerda? (usa g=10)</p>
                        <div class="ex-formula">T = m • g</div>
                    </div>
                    <div class="ex-interactive">
                        <input type="text" class="ex-input" id="input-9" placeholder="Ej: 50">
                        <button class="ex-btn" onclick="verifyExercise(9)" id="btn-9">Verificar</button>
                        <div class="ex-feedback" id="feedback-9"></div>
                    </div>
                </article>
            </div>
        </div>

        <!-- UNIDAD 4 -->
        <div class="lab-content" id="tab-u4">
            <div class="modules-grid">
                <article class="exercise-card ex-orange" id="card-10">
                    <div>
                        <span class="ex-badge">Módulo 4.1 — Trabajo</span>
                        <h3 class="ex-title">Trabajo Mecánico</h3>
                        <p class="ex-desc">Empujas un carrito con una fuerza de 40 N a lo largo de 5 metros. ¿Cuánto trabajo realizaste (Joules)?</p>
                        <div class="ex-formula">W = F • d</div>
                    </div>
                    <div class="ex-interactive">
                        <input type="text" class="ex-input" id="input-10" placeholder="Ej: 200">
                        <button class="ex-btn" onclick="verifyExercise(10)" id="btn-10">Verificar</button>
                        <div class="ex-feedback" id="feedback-10"></div>
                    </div>
                </article>
                <article class="exercise-card ex-orange" id="card-11">
                    <div>
                        <span class="ex-badge">Módulo 4.3 — Energía</span>
                        <h3 class="ex-title">Energía Cinética</h3>
                        <p class="ex-desc">Un proyectil de 4 kg viaja a 5 m/s. ¿Cuál es su energía cinética (J)?</p>
                        <div class="ex-formula">Ec = ½ • m • v²</div>
                    </div>
                    <div class="ex-interactive">
                        <input type="text" class="ex-input" id="input-11" placeholder="Ej: 50">
                        <button class="ex-btn" onclick="verifyExercise(11)" id="btn-11">Verificar</button>
                        <div class="ex-feedback" id="feedback-11"></div>
                    </div>
                </article>
                <article class="exercise-card ex-orange" id="card-12">
                    <div>
                        <span class="ex-badge">Módulo 4.4 — Resortes</span>
                        <h3 class="ex-title">Energía Potencial Elástica</h3>
                        <p class="ex-desc">Si comprimes 1 metro un resorte ideal con $k = 200$ N/m, ¿cuánta energía se almacena (J)?</p>
                        <div class="ex-formula">Epe = ½ • k • x²</div>
                    </div>
                    <div class="ex-interactive">
                        <input type="text" class="ex-input" id="input-12" placeholder="Ej: 100">
                        <button class="ex-btn" onclick="verifyExercise(12)" id="btn-12">Verificar</button>
                        <div class="ex-feedback" id="feedback-12"></div>
                    </div>
                </article>
            </div>
        </div>

        <!-- UNIDAD 5 -->
        <div class="lab-content" id="tab-u5">
            <div class="modules-grid">
                <article class="exercise-card ex-magenta" id="card-13">
                    <div>
                        <span class="ex-badge">Módulo 5.2 — Momento</span>
                        <h3 class="ex-title">Momento Lineal</h3>
                        <p class="ex-desc">Un carro de 3 kg rueda a 8 m/s. ¿Cuál es su momento lineal (kg•m/s)?</p>
                        <div class="ex-formula">p = m • v</div>
                    </div>
                    <div class="ex-interactive">
                        <input type="text" class="ex-input" id="input-13" placeholder="Ej: 24">
                        <button class="ex-btn" onclick="verifyExercise(13)" id="btn-13">Verificar</button>
                        <div class="ex-feedback" id="feedback-13"></div>
                    </div>
                </article>
                <article class="exercise-card ex-magenta" id="card-14">
                    <div>
                        <span class="ex-badge">Módulo 5.3 — Conservación</span>
                        <h3 class="ex-title">Suma de Momentos</h3>
                        <p class="ex-desc">Si el momento inicial total de un sistema aislado es 12 kg•m/s, tras una colisión su momento total será:</p>
                        <div class="ex-formula">Pi = Pf</div>
                    </div>
                    <div class="ex-interactive">
                        <input type="text" class="ex-input" id="input-14" placeholder="Ej: 12">
                        <button class="ex-btn" onclick="verifyExercise(14)" id="btn-14">Verificar</button>
                        <div class="ex-feedback" id="feedback-14"></div>
                    </div>
                </article>
                <article class="exercise-card ex-magenta" id="card-15">
                    <div>
                        <span class="ex-badge">Módulo 5.4 — Choques</span>
                        <h3 class="ex-title">Coeficiente de Restitución</h3>
                        <p class="ex-desc">En una colisión PERFECTAMENTE inelástica donde ambas masas se pegan, ¿cuál es el valor del coeficiente de restitución $e$?</p>
                        <div class="ex-formula">e = (v2f - v1f) / (v1i - v2i)</div>
                    </div>
                    <div class="ex-interactive">
                        <input type="text" class="ex-input" id="input-15" placeholder="Ej: 0">
                        <button class="ex-btn" onclick="verifyExercise(15)" id="btn-15">Verificar</button>
                        <div class="ex-feedback" id="feedback-15"></div>
                    </div>
                </article>
            </div>
        </div>

        <!-- TEMAS AVANZADOS -->
        <div class="lab-content" id="tab-adv">
            <div class="dynamic-lab-card">
                <div class="lab-controls">
                    <div class="progress-title" style="color: var(--physics-green);">
                        <i class="fas fa-flask"></i> Laboratorio Interactivo: Dinámica Avanzada
                    </div>
                    <p style="font-size: 0.8em; color: #789; margin-bottom: 10px; line-height: 1.5;">
                        Modifica la fuerza y la masa del bloque para ver cómo varía la aceleración en tiempo real ($a = F/m$) según la Segunda Ley de Newton, e inicia la simulación.
                    </p>
                    <div class="control-row">
                        <label>Fuerza Neta: <span id="val-force">50 N</span></label>
                        <input type="range" id="slider-force" min="10" max="100" value="50">
                    </div>
                    <div class="control-row">
                        <label>Masa del Bloque: <span id="val-mass">5 kg</span></label>
                        <input type="range" id="slider-mass" min="1" max="20" value="5">
                    </div>
                    <div class="lab-stats">
                        <span>Fórmula: <b>a = F / m</b></span>
                        <span>Aceleración: <b id="val-accel">10.00 m/s²</b></span>
                    </div>
                    <button class="ex-btn" id="btn-run-sim" style="border-color: #00e676; color: #00e676; margin-top: 5px;">
                        <i class="fas fa-play"></i> Iniciar Simulación
                    </button>
                </div>
                <div class="lab-canvas-container">
                    <canvas id="sim-canvas" width="400" height="200" style="width: 100%; height: 100%;"></canvas>
                </div>
            </div>

            <div class="modules-grid">
                <!-- EJERCICIO 16 -->
                <article class="exercise-card ex-yellow" id="card-16">
                    <div>
                        <span class="ex-badge">Unidad 6 — Movimiento Rotacional</span>
                        <h3 class="ex-title">Aceleración Angular</h3>
                        <p class="ex-desc">Un torque neto de 15 N•m actúa sobre un disco con inercia de 3 kg•m². ¿Cuál es su aceleración angular en rad/s²?</p>
                        <div class="ex-formula">α = τ / I</div>
                    </div>
                    <div class="ex-interactive">
                        <input type="text" class="ex-input" id="input-16" placeholder="Ej: 5">
                        <button class="ex-btn" onclick="verifyExercise(16)" id="btn-16">Verificar</button>
                        <div class="ex-feedback" id="feedback-16"></div>
                    </div>
                </article>
                <article class="exercise-card ex-aqua" id="card-17">
                    <div>
                        <span class="ex-badge">Unidad 7 — Fluidos</span>
                        <h3 class="ex-title">Cálculo de Densidad</h3>
                        <p class="ex-desc">Un sólido de 800 kg ocupa un volumen de 0.8 m³. ¿Cuál es su densidad en kg/m³?</p>
                        <div class="ex-formula">ρ = m / V</div>
                    </div>
                    <div class="ex-interactive">
                        <input type="text" class="ex-input" id="input-17" placeholder="Ej: 1000">
                        <button class="ex-btn" onclick="verifyExercise(17)" id="btn-17">Verificar</button>
                        <div class="ex-feedback" id="feedback-17"></div>
                    </div>
                </article>
                <article class="exercise-card ex-red" id="card-18">
                    <div>
                        <span class="ex-badge">Unidad 8 — Termodinámica</span>
                        <h3 class="ex-title">Escala Kelvin</h3>
                        <p class="ex-desc">¿Cuál es la equivalencia aproximada de 25 °C en Kelvin?</p>
                        <div class="ex-formula">T(K) = T(°C) + 273.15</div>
                    </div>
                    <div class="ex-interactive">
                        <input type="text" class="ex-input" id="input-18" placeholder="Ej: 298.15">
                        <button class="ex-btn" onclick="verifyExercise(18)" id="btn-18">Verificar</button>
                        <div class="ex-feedback" id="feedback-18"></div>
                    </div>
                </article>
                <article class="exercise-card ex-violet" id="card-19">
                    <div>
                        <span class="ex-badge">Unidad 9 — Electricidad y Mag.</span>
                        <h3 class="ex-title">Diferencia de Potencial</h3>
                        <p class="ex-desc">Una corriente de 2A circula a través de un resistor de 10 Ohmios. ¿Cuál es el voltaje?</p>
                        <div class="ex-formula">V = I • R</div>
                    </div>
                    <div class="ex-interactive">
                        <input type="text" class="ex-input" id="input-19" placeholder="Ej: 20">
                        <button class="ex-btn" onclick="verifyExercise(19)" id="btn-19">Verificar</button>
                        <div class="ex-feedback" id="feedback-19"></div>
                    </div>
                </article>
                <article class="exercise-card ex-teal" id="card-20">
                    <div>
                        <span class="ex-badge">Unidad 10 — Ondas y Óptica</span>
                        <h3 class="ex-title">Velocidad de Onda</h3>
                        <p class="ex-desc">Una onda tiene 50 Hz y λ de 6 m. ¿Cuál es la velocidad (m/s)?</p>
                        <div class="ex-formula">v = f • λ</div>
                    </div>
                    <div class="ex-interactive">
                        <input type="text" class="ex-input" id="input-20" placeholder="Ej: 300">
                        <button class="ex-btn" onclick="verifyExercise(20)" id="btn-20">Verificar</button>
                        <div class="ex-feedback" id="feedback-20"></div>
                    </div>
                </article>
                <article class="exercise-card ex-pink" id="card-21">
                    <div>
                        <span class="ex-badge">Unidad 11 — Física Moderna</span>
                        <h3 class="ex-title">Proporcionalidad del Fotón</h3>
                        <p class="ex-desc">Al aumentar la frecuencia de un fotón, ¿su energía aumenta o disminuye?</p>
                        <div class="ex-formula">E = h • f</div>
                    </div>
                    <div class="ex-interactive">
                        <input type="text" class="ex-input" id="input-21" placeholder="Ej: aumenta">
                        <button class="ex-btn" onclick="verifyExercise(21)" id="btn-21">Verificar</button>
                        <div class="ex-feedback" id="feedback-21"></div>
                    </div>
                </article>
            </div>
        </div>
    </div>

    <footer>
        <p>© 2026 PhysicsAcademy. Todos los derechos reservados.</p>
    </footer>

    <script>
        function switchTab(tabId) {
            document.querySelectorAll('.lab-tab').forEach(el => el.classList.remove('active'));
            document.querySelectorAll('.lab-content').forEach(el => el.classList.remove('active'));
            
            document.querySelector(`.lab-tab[onclick*="${tabId}"]`).classList.add('active');
            document.getElementById(`tab-${tabId}`).classList.add('active');
        }

        const totalExercises = 21;
        const correctAnswers = {
            1: ["3500", "3,500"],
            2: ["1000", "1,000"],
            3: ["3.14"],
            4: ["300"],
            5: ["5"],
            6: ["9.8", "9.81", "9,8"],
            7: ["45"],
            8: ["100"],
            9: ["50"],
            10: ["200"],
            11: ["50"],
            12: ["100"],
            13: ["24"],
            14: ["12"],
            15: ["0"],
            16: ["5"],
            17: ["1000", "1,000"],
            18: ["298.15", "298", "298,15"],
            19: ["20"],
            20: ["300"],
            21: ["aumenta", "aumentará"]
        };

        let solvedExercises = JSON.parse(localStorage.getItem('physics_solved_exercises')) || {};

        document.addEventListener('DOMContentLoaded', () => {
            const equations = ['E = mc²', 'F = m•a', 'v = d/t', 'p = m•v', 'W = F•d', 'Ec = ½mv²', 'Ep = mgh', 'PV = nRT', 'V = I•R', 'F = k•(q₁q₂)/r²'];
            const container = document.getElementById('floating-equations');
            for (let i = 0; i < 15; i++) {
                const eq = document.createElement('div');
                eq.className = 'floating-eq';
                eq.textContent = equations[Math.floor(Math.random() * equations.length)];
                eq.style.left = `${Math.random() * 100}vw`;
                eq.style.animationDuration = `${12 + Math.random() * 15}s`;
                eq.style.animationDelay = `${Math.random() * 10}s`;
                eq.style.fontSize = `${0.65 + Math.random() * 0.5}rem`;
                container.appendChild(eq);
            }
            
            // Simulación Dinámica
            const canvas = document.getElementById('sim-canvas');
            const ctx = canvas.getContext('2d');
            const sliderForce = document.getElementById('slider-force');
            const sliderMass = document.getElementById('slider-mass');
            const valForce = document.getElementById('val-force');
            const valMass = document.getElementById('val-mass');
            const valAccel = document.getElementById('val-accel');
            const btnRunSim = document.getElementById('btn-run-sim');

            let simX = 50, simV = 0, simA = 10, isSimRunning = false, lastTime = 0;

            function updateSimulationParams() {
                const F = parseFloat(sliderForce.value);
                const m = parseFloat(sliderMass.value);
                simA = F / m;
                valForce.textContent = `${F} N`;
                valMass.textContent = `${m} kg`;
                valAccel.textContent = `${simA.toFixed(2)} m/s²`;
                drawSim(simX);
            }
            sliderForce.addEventListener('input', updateSimulationParams);
            sliderMass.addEventListener('input', updateSimulationParams);

            function drawSim(x) {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                ctx.strokeStyle = '#1a2035'; ctx.lineWidth = 4;
                ctx.beginPath(); ctx.moveTo(0, 150); ctx.lineTo(canvas.width, 150); ctx.stroke();
                const m = parseFloat(sliderMass.value);
                const size = 30 + m * 2;
                const y = 150 - size;
                ctx.fillStyle = '#00e676'; ctx.fillRect(x, y, size, size);
                const F = parseFloat(sliderForce.value);
                const arrowLen = 15 + F * 0.6;
                ctx.strokeStyle = '#ff9100'; ctx.fillStyle = '#ff9100'; ctx.lineWidth = 3;
                ctx.beginPath(); ctx.moveTo(x - arrowLen, y + size/2); ctx.lineTo(x, y + size/2); ctx.stroke();
                ctx.beginPath(); ctx.moveTo(x, y + size/2); ctx.lineTo(x - 8, y + size/2 - 5); ctx.lineTo(x - 8, y + size/2 + 5); ctx.fill();
            }

            function runSimLoop(timestamp) {
                if (!isSimRunning) return;
                if (!lastTime) lastTime = timestamp;
                const dt = (timestamp - lastTime) / 1000;
                lastTime = timestamp;
                simV += simA * dt * 25;
                simX += simV * dt;
                if (simX > canvas.width + 50) { simX = 20; simV = 0; }
                drawSim(simX);
                requestAnimationFrame(runSimLoop);
            }

            btnRunSim.addEventListener('click', () => {
                if (!isSimRunning) {
                    isSimRunning = true;
                    btnRunSim.innerHTML = '<i class="fas fa-pause"></i> Pausar Simulación';
                    lastTime = 0;
                    requestAnimationFrame(runSimLoop);
                } else {
                    isSimRunning = false;
                    btnRunSim.innerHTML = '<i class="fas fa-play"></i> Reanudar Simulación';
                }
            });
            updateSimulationParams();
            updateUI();
        });

        function verifyExercise(id) {
            const inputVal = document.getElementById(`input-${id}`).value.trim().toLowerCase();
            const feedback = document.getElementById(`feedback-${id}`);
            if (!inputVal) {
                feedback.className = 'ex-feedback error';
                feedback.innerHTML = '<i class="fas fa-exclamation-circle"></i> Ingresa una respuesta.';
                return;
            }
            if (correctAnswers[id].includes(inputVal)) {
                solvedExercises[id] = true;
                localStorage.setItem('physics_solved_exercises', JSON.stringify(solvedExercises));
                feedback.className = 'ex-feedback success';
                feedback.innerHTML = '<i class="fas fa-check-circle"></i> ¡Correcto!';
                updateUI();
            } else {
                feedback.className = 'ex-feedback error';
                feedback.innerHTML = '<i class="fas fa-times-circle"></i> Incorrecto.';
            }
        }

        function updateUI() {
            let count = 0;
            for (let i = 1; i <= totalExercises; i++) {
                const card = document.getElementById(`card-${i}`);
                if(!card) continue;
                const input = document.getElementById(`input-${i}`);
                const btn = document.getElementById(`btn-${i}`);
                const feedback = document.getElementById(`feedback-${i}`);

                if (solvedExercises[i]) {
                    card.classList.add('resolved');
                    input.value = correctAnswers[i][0];
                    input.disabled = true;
                    btn.disabled = true;
                    btn.textContent = 'Resuelto';
                    feedback.className = 'ex-feedback success';
                    feedback.innerHTML = '<i class="fas fa-check-circle"></i> ¡Completado!';
                    count++;
                } else {
                    card.classList.remove('resolved');
                    input.disabled = false;
                    btn.disabled = false;
                    btn.textContent = 'Verificar';
                }
            }
            document.getElementById('score-display').textContent = `${count}/${totalExercises}`;
            document.getElementById('score-text').textContent = `${count} / ${totalExercises}`;
            const pct = Math.round((count / totalExercises) * 100);
            document.getElementById('progress-percent').textContent = `${pct}%`;
            document.getElementById('bar-fill').style.width = `${pct}%`;
        }

        function resetProgress() {
            if (confirm('¿Reiniciar progreso?')) {
                solvedExercises = {};
                localStorage.removeItem('physics_solved_exercises');
                for (let i = 1; i <= totalExercises; i++) {
                    const el = document.getElementById(`input-${i}`);
                    if(el) {
                        el.value = '';
                        document.getElementById(`feedback-${i}`).style.display = 'none';
                    }
                }
                updateUI();
            }
        }
        function handleLogout() { localStorage.removeItem('physics_solved_exercises'); }
    </script>
</body>
</html>
