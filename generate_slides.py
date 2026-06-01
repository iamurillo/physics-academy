import os

def build_slide(unit, module, title, subtitle, content_points, formula, mission_q, mission_ans_keys, mission_success, mission_fail):
    html = f"""<?php require_once '../auth.php'; ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Física {unit}.{module} — {title}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.5.0/reveal.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.5.0/theme/night.min.css">
    <link rel="stylesheet" href="../css/physics_presentation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .reveal {{ font-size: 28px; }}
        .reveal h1,.reveal h2,.reveal h3 {{ text-transform:none; color:#3d5afe; text-shadow:0 0 10px rgba(61,90,254,0.3); margin-bottom:0.4em; }}
        .reveal h1 {{ font-size:2.2em; }} .reveal h2 {{ font-size:1.5em; }}
        .reveal .slides section {{ text-align:left; padding:20px 0; }}
        .reveal .centered {{ text-align:center; }}
        .highlight {{ color:#ff5252; font-weight:bold; }}
        .accent {{ color:#00e5ff; }}
        .indigo-accent {{ color:#3d5afe; }}
        .green {{ color:#00e676; }}
        .orange {{ color:#ff9100; }}
        .box {{ background:rgba(255,255,255,0.07); padding:18px; border-radius:10px; border:1px solid #3d5afe; margin-bottom:15px; }}
        .warning-box {{ background:rgba(255,82,82,0.08); padding:14px; border-radius:8px; border:1px solid #ff5252; font-size:0.85em; margin-top:15px; }}
        .success-box {{ background:rgba(0,230,118,0.08); padding:14px; border-radius:8px; border:1px solid #00e676; font-size:0.85em; margin-top:15px; }}
        .icon-large {{ font-size:3em; margin-bottom:15px; color:#3d5afe; }}
        ul.custom-list {{ list-style:none; margin-left:0; padding-left:0; }}
        ul.custom-list li {{ margin-bottom:10px; }}
        ul.custom-list li i {{ width:25px; text-align:center; margin-right:10px; }}
        
        .btn-back-dashboard {{
            position: fixed; top: 20px; left: 20px; z-index: 9999;
            background: rgba(10, 10, 14, 0.85); border: 1px solid #3d5afe; color: #e8ecf4;
            padding: 8px 14px; font-size: 14px; font-family: 'Inter', sans-serif; text-decoration: none; border-radius: 4px;
            display: flex; align-items: center; gap: 8px; transition: all 0.3s ease; box-shadow: 0 0 10px rgba(61, 90, 254, 0.15);
        }}
        .btn-back-dashboard:hover {{ background: #3d5afe; color: #fff; box-shadow: 0 0 15px rgba(61, 90, 254, 0.4); transform: translateY(-1px); }}
        
        .mission-input {{ background: #000; border: 1px solid #3d5afe; color: #3d5afe; padding: 10px; width: 100%; font-family: monospace; font-size: 0.9em; margin-top: 10px; border-radius: 4px; }}
        .mission-btn {{ background: #3d5afe; color: #fff; border: none; padding: 10px 20px; cursor: pointer; font-weight: bold; font-family: sans-serif; margin-top: 10px; border-radius: 4px; }}
        .mission-feedback {{ margin-top: 10px; padding: 8px; border-radius: 4px; font-size: 0.85em; display: none; }}
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
            <h1>{title}</h1>
            <h3>{subtitle}</h3>
            <p class="indigo-accent">Unidad {unit} — Módulo {unit}.{module}</p>
            <hr>
            <p><small>Física Academy | 2026</small></p>
        </section>

        <section>
            <h2><i class="fas fa-book-open"></i> Conceptos Clave</h2>
            <div class="box">
                <ul class="custom-list">
                    {''.join([f'<li class="fragment"><i class="fas fa-check-circle indigo-accent"></i> <strong>{pt[0]}:</strong> {pt[1]}</li>' for pt in content_points])}
                </ul>
            </div>
            <div class="fragment success-box">
                <i class="fas fa-lightbulb green"></i> <strong>Fórmula Principal:</strong> {formula}
            </div>
        </section>

        <section>
            <h2><i class="fas fa-crosshairs highlight"></i> Mini Misión {unit}.{module}</h2>
            <div class="box">
                <p>{mission_q}</p>
            </div>
            <input type="text" id="mission-{unit}-{module}-input" class="mission-input" placeholder="Escribe tu respuesta aquí...">
            <button onclick="checkMission()" class="mission-btn">Verificar</button>
            <div id="mission-feedback" class="mission-feedback"></div>
            <script>
                function checkMission() {{
                    const ans = document.getElementById('mission-{unit}-{module}-input').value.trim().toLowerCase();
                    const fb = document.getElementById('mission-feedback');
                    const validAnswers = {mission_ans_keys};
                    fb.style.display = 'block';
                    if (validAnswers.includes(ans)) {{
                        fb.className = 'mission-feedback success-box';
                        fb.style.border = '1px solid #00e676';
                        fb.innerHTML = '<i class="fas fa-check-circle green"></i> ¡Correcto! {mission_success}';
                    }} else {{
                        fb.className = 'mission-feedback warning-box';
                        fb.style.border = '1px solid #ff5252';
                        fb.innerHTML = '<i class="fas fa-times-circle highlight"></i> Incorrecto. {mission_fail}';
                    }}
                }}
            </script>
        </section>

        <section class="homework-slide">
            <h2><i class="fas fa-edit highlight"></i> Actividad de Clase</h2>
            <div class="box">
                <p>Resuelve los ejercicios correspondientes al Módulo {unit}.{module} en tu cuaderno y preséntalos al final de la sesión.</p>
            </div>
        </section>

        <section class="centered">
            <h1>¿Preguntas?</h1>
            <i class="fas fa-arrow-right icon-large"></i>
            <p>Física Academy — Módulo {unit}.{module}</p>
        </section>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/reveal.js/4.5.0/reveal.min.js"></script>
<script>
    if (localStorage.getItem('physics_show_tasks') !== 'true') {{
        const hw = document.querySelector('.homework-slide');
        if (hw) hw.remove();
    }}
    Reveal.initialize({{
        hash: false, history: false, slideNumber: true, controls: true, progress: true, center: true, transition: 'slide'
    }});
</script>
</body>
</html>
"""
    return html

slides_data = [
    # Unidad 2
    (2, 3, "Velocidad Media e Instantánea", "Cálculo de velocidades", 
     [("Velocidad Media", "Desplazamiento total dividido por el tiempo total."), ("Velocidad Instantánea", "Velocidad en un instante específico (límite).")], 
     "v_m = Δx / Δt", "¿Cuál es la velocidad media (m/s) de un coche que recorre 100 m en 5 s?", ["20"], "100 / 5 = 20 m/s.", "Usa la fórmula v = d/t"),
    (2, 4, "Aceleración", "Cambio de velocidad en el tiempo", 
     [("Aceleración", "Tasa de cambio de la velocidad."), ("Unidades", "Se mide en m/s² en el SI.")], 
     "a = Δv / Δt", "¿Cuál es la aceleración (m/s²) si pasas de 0 a 10 m/s en 2 s?", ["5"], "10 / 2 = 5 m/s².", "Usa a = v/t"),
    (2, 5, "Ecuaciones de MRUA", "Movimiento Rectilíneo Uniformemente Acelerado", 
     [("MRUA", "La aceleración es constante."), ("Posición", "Depende del tiempo al cuadrado.")], 
     "x = x0 + v0*t + 1/2*a*t²", "Si parte del reposo con a=2 m/s², ¿qué distancia recorre en 3 s?", ["9"], "0.5 * 2 * 9 = 9 m.", "Usa x = 0.5 * a * t²"),
    (2, 6, "Análisis Gráfico", "Gráficas x-t y v-t", 
     [("Pendiente x-t", "Representa la velocidad."), ("Pendiente v-t", "Representa la aceleración.")], 
     "Pendiente = Δy / Δx", "Si la gráfica x-t es una línea recta horizontal, ¿cuál es la velocidad?", ["0", "cero"], "La posición no cambia, el objeto está en reposo.", "Si no se mueve, v=0"),
    (2, 7, "Caída Libre", "Aceleración gravitacional", 
     [("Gravedad (g)", "Aceleración constante hacia abajo (aprox 9.8 m/s²)."), ("Independencia de la Masa", "Todos los objetos caen con igual aceleración si ignoramos el aire.")], 
     "y = y0 + v0*t - 1/2*g*t²", "Si dejas caer una piedra, ¿cuál es su velocidad inicial?", ["0", "cero"], "Parte del reposo.", "Se deja caer, no se lanza"),
    (2, 8, "Movimiento en 2D", "Tiro Parabólico", 
     [("Independencia de Ejes", "El movimiento en X es independiente del movimiento en Y."), ("Trayectoria Parabólica", "Combinación de MRU (X) y MRUA (Y).")], 
     "x = v0x*t ; y = y0 + v0y*t - 1/2*g*t²", "¿Qué tipo de movimiento tiene el proyectil en el eje X?", ["mru", "rectilineo uniforme", "constante"], "La velocidad en X no cambia.", "Es un movimiento sin aceleración"),
    
    # Unidad 3
    (3, 2, "Leyes de Newton", "Fundamentos de Dinámica", 
     [("1ra Ley", "Inercia."), ("2da Ley", "F=ma."), ("3ra Ley", "Acción y Reacción.")], 
     "ΣF = m*a", "¿Cuánta fuerza (N) necesitas para acelerar 2 kg a 3 m/s²?", ["6"], "2 * 3 = 6 N.", "Multiplica masa por aceleración"),
    (3, 3, "Diagramas de Cuerpo Libre (DCL)", "Representación de Fuerzas", 
     [("DCL", "Diagrama que muestra todas las fuerzas que actúan sobre un cuerpo."), ("Vectores", "Cada fuerza se representa como una flecha.")], 
     "ΣFx = 0, ΣFy = 0 (Equilibrio)", "¿Cómo se llama la fuerza ascendente que ejerce una superficie?", ["normal", "fuerza normal"], "Actúa perpendicular a la superficie.", "Empieza con N"),
    (3, 4, "Fuerza Normal y Fricción", "Fuerzas de Contacto", 
     [("Fricción Estática", "Impide el movimiento inicial."), ("Fricción Cinética", "Se opone al movimiento en curso.")], 
     "f_k = μ_k * N", "Si N=10 N y μ_k=0.2, ¿cuál es la fricción cinética?", ["2"], "10 * 0.2 = 2 N.", "Multiplica N por mu"),
    (3, 5, "Plano Inclinado", "Descomposición de Fuerzas", 
     [("Eje paralelo", "mg * sin(θ)."), ("Eje perpendicular", "mg * cos(θ).")], 
     "F_x = mg*sin(θ)", "A mayor ángulo del plano, ¿la fuerza paralela aumenta o disminuye?", ["aumenta"], "El seno del ángulo es mayor.", "Piensa en un plano vertical"),
    (3, 6, "Tensión y Poleas", "Cuerdas y Máquinas Simples", 
     [("Tensión", "Fuerza transmitida a través de una cuerda ideal (sin masa, inextensible)."), ("Polea Ideal", "Cambia la dirección de la fuerza sin fricción.")], 
     "T1 = T2 (cuerda ideal)", "Si una polea ideal sostiene dos masas iguales en equilibrio, ¿están acelerando?", ["no"], "La fuerza neta es 0.", "Equilibrio = aceleración 0"),
    (3, 7, "Movimiento Circular Uniforme", "Dinámica Circular", 
     [("Aceleración Centrípeta", "Apunta hacia el centro de la trayectoria."), ("Fuerza Centrípeta", "Fuerza neta requerida para mantener la rotación.")], 
     "F_c = m*(v² / r)", "¿Hacia dónde apunta la fuerza centrípeta?", ["al centro", "adentro", "centro"], "Mantiene al objeto en el círculo.", "Hacia el interior"),
    
    # Unidad 4
    (4, 2, "Trabajo y Energía Cinética", "Relación Trabajo-Energía", 
     [("Trabajo Neto", "Suma de los trabajos de todas las fuerzas."), ("Teorema", "El trabajo neto equivale al cambio en la energía cinética.")], 
     "W_neto = ΔEc", "Si un objeto parte del reposo y gana 50 J de Ec, ¿cuál fue el trabajo neto?", ["50", "50 j"], "El trabajo es el cambio en Ec.", "W = Ec final - Ec inicial"),
    (4, 3, "Fuerzas Conservativas y No Conservativas", "Conservación de la Energía", 
     [("Conservativas", "El trabajo no depende de la trayectoria (ej: gravedad)."), ("No Conservativas", "Disipan energía (ej: fricción).")], 
     "W_nc = ΔEm", "¿La fricción es una fuerza conservativa o no conservativa?", ["no conservativa"], "Disipa energía en forma de calor.", "Piensa si se pierde energía"),
    (4, 4, "Energía Potencial", "Energía de Posición", 
     [("Potencial Gravitatoria", "Depende de la altura."), ("Potencial Elástica", "Almacenada en resortes deformados.")], 
     "Ep = mgh ; Epe = 1/2*k*x²", "Si subes un bloque al doble de altura, ¿qué pasa con su Ep gravitatoria?", ["se duplica", "el doble", "doble"], "Es directamente proporcional a la altura.", "h cambia a 2h"),
    (4, 5, "Conservación de la Energía Mecánica", "Transformación de Energía", 
     [("Energía Mecánica (Em)", "Suma de cinética y potencial."), ("Sistema Aislado", "Em inicial = Em final.")], 
     "Ec_i + Ep_i = Ec_f + Ep_f", "En la cima de una montaña rusa desde el reposo, ¿qué energía es máxima?", ["potencial", "ep"], "La altura es máxima, la velocidad es 0.", "Relacionada con la altura"),
    (4, 6, "Potencia", "Rapidez con que se realiza trabajo", 
     [("Potencia (P)", "Trabajo dividido por el tiempo."), ("Unidades", "Vatios (W) = Joules / segundo.")], 
     "P = W / t", "¿Si haces 100 J de trabajo en 2 s, cuál es la potencia (W)?", ["50"], "100 / 2 = 50 W.", "Divide W entre t"),
    
    # Unidad 5
    (5, 2, "Impulso y Momento", "Cambio del Momento Lineal", 
     [("Impulso (J)", "Fuerza aplicada por un intervalo de tiempo."), ("Teorema del Impulso", "El impulso es igual al cambio en el momento lineal.")], 
     "J = F * Δt = Δp", "Si aplicas 10 N por 3 s, ¿cuál es el impulso?", ["30"], "10 * 3 = 30 N·s.", "Multiplica F por t"),
    (5, 3, "Conservación del Momento", "Sistemas Aislados", 
     [("Conservación", "Si no hay fuerzas externas, el momento total del sistema es constante."), ("Aplicación", "Útil para estudiar choques y explosiones.")], 
     "P_inicial = P_final", "Un astronauta en el espacio lanza una herramienta hacia adelante. ¿Hacia dónde se mueve él?", ["atras", "hacia atras"], "Por conservación, las velocidades son opuestas.", "Piensa en el retroceso"),
    (5, 4, "Colisiones 1D", "Choques", 
     [("Elástico", "Se conserva la energía cinética y el momento."), ("Inelástico", "Se conserva el momento, se pierde Ec."), ("Totalmente Inelástico", "Los cuerpos se pegan.")], 
     "m1v1 + m2v2 = (m1+m2)vf", "¿En qué tipo de choque los objetos se quedan pegados?", ["inelasticamente perfecto", "totalmente inelastico", "perfectamente inelastico", "inelastico"], "Es la definición máxima de choque inelástico.", "Tienen la palabra inelástico")
]

for item in slides_data:
    unit, module, title, sub, pts, form, mq, m_ans, m_succ, m_fail = item
    
    html_content = build_slide(unit, module, title, sub, pts, form, mq, str(m_ans), m_succ, m_fail)
    
    dir_path = f"C:\\Users\\israe\\Desktop\\Cripto\\Physics Academy\\unidad{unit}"
    if not os.path.exists(dir_path):
        os.makedirs(dir_path)
    
    file_path = os.path.join(dir_path, f"clase{unit}_{module}.php")
    
    with open(file_path, "w", encoding="utf-8") as f:
        f.write(html_content)
    print(f"Generated: {file_path}")
