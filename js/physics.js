/* ══════════════════════════════════════════════════════════
   PhysicsAcademy — Animations & Interactions
   Partículas, ecuaciones flotantes, boot sequence
   ══════════════════════════════════════════════════════════ */

// ── Particle System (Login Background) ──
class ParticleSystem {
    constructor(canvasId) {
        this.canvas = document.getElementById(canvasId);
        if (!this.canvas) return;
        this.ctx = this.canvas.getContext('2d');
        this.particles = [];
        this.mouse = { x: null, y: null, radius: 120 };
        this.connectionDistance = 130;
        this.particleCount = 80;
        this.init();
    }

    init() {
        this.resize();
        window.addEventListener('resize', () => this.resize());
        this.canvas.addEventListener('mousemove', (e) => {
            this.mouse.x = e.x;
            this.mouse.y = e.y;
        });
        this.canvas.addEventListener('mouseleave', () => {
            this.mouse.x = null;
            this.mouse.y = null;
        });
        this.createParticles();
        this.animate();
    }

    resize() {
        this.canvas.width = window.innerWidth;
        this.canvas.height = window.innerHeight;
    }

    createParticles() {
        this.particles = [];
        for (let i = 0; i < this.particleCount; i++) {
            this.particles.push({
                x: Math.random() * this.canvas.width,
                y: Math.random() * this.canvas.height,
                vx: (Math.random() - 0.5) * 0.6,
                vy: (Math.random() - 0.5) * 0.6,
                radius: Math.random() * 2 + 0.5,
                opacity: Math.random() * 0.5 + 0.2
            });
        }
    }

    animate() {
        this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

        this.particles.forEach((p, i) => {
            // Move
            p.x += p.vx;
            p.y += p.vy;

            // Bounce
            if (p.x < 0 || p.x > this.canvas.width) p.vx *= -1;
            if (p.y < 0 || p.y > this.canvas.height) p.vy *= -1;

            // Mouse interaction
            if (this.mouse.x !== null) {
                const dx = p.x - this.mouse.x;
                const dy = p.y - this.mouse.y;
                const dist = Math.sqrt(dx * dx + dy * dy);
                if (dist < this.mouse.radius) {
                    const force = (this.mouse.radius - dist) / this.mouse.radius;
                    p.x += dx * force * 0.02;
                    p.y += dy * force * 0.02;
                }
            }

            // Draw particle
            this.ctx.beginPath();
            this.ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
            this.ctx.fillStyle = `rgba(0, 229, 255, ${p.opacity})`;
            this.ctx.fill();

            // Connect nearby particles
            for (let j = i + 1; j < this.particles.length; j++) {
                const p2 = this.particles[j];
                const dx = p.x - p2.x;
                const dy = p.y - p2.y;
                const dist = Math.sqrt(dx * dx + dy * dy);

                if (dist < this.connectionDistance) {
                    const alpha = (1 - dist / this.connectionDistance) * 0.15;
                    this.ctx.beginPath();
                    this.ctx.moveTo(p.x, p.y);
                    this.ctx.lineTo(p2.x, p2.y);
                    this.ctx.strokeStyle = `rgba(0, 229, 255, ${alpha})`;
                    this.ctx.lineWidth = 0.5;
                    this.ctx.stroke();
                }
            }
        });

        requestAnimationFrame(() => this.animate());
    }
}

// ── Floating Equations (Login & Dashboard) ──
function createFloatingEquations() {
    const container = document.querySelector('.floating-equations');
    if (!container) return;

    const equations = [
        'F = ma', 'E = mc²', 'v = d/t', 'a = Δv/Δt',
        'p = mv', 'W = Fd', 'KE = ½mv²', 'PE = mgh',
        'τ = rF sin θ', 'PV = nRT', 'F = kx', 'T = 2π√(L/g)',
        'ΔS ≥ 0', 'F = GmM/r²', 'E = hf', 'λ = h/p',
        'V = IR', 'P = IV', 'F = qE', 'Φ = BA cos θ',
        'v = fλ', 'n₁ sin θ₁ = n₂ sin θ₂', 'Q = mcΔT',
        'I = Δq/Δt', 'ω = Δθ/Δt', 'α = Δω/Δt', 'L = Iω',
        'ρ = m/V', 'P = F/A', 'η = W/Q', 'c = 3×10⁸ m/s',
        'g = 9.81 m/s²', 'ΣF = 0', 'x = v₀t + ½at²',
        'v² = v₀² + 2ax', 'P₁ + ρgh₁ = P₂ + ρgh₂',
        '|Ψ⟩ = 1/√2(|🐈⟩ + |💀⟩)', 'iℏ ∂/∂t|Ψ⟩ = Ĥ|Ψ⟩',
        'S = k ln Ω', 'e^(iπ) + 1 = 0', 'G_μν = 8πG/c⁴ T_μν',
        'R_μν - ½Rg_μν = 8πT_μν', 'Ans = 42', 'ℏ = h/2π'
    ];

    function spawnEquation() {
        const eq = document.createElement('span');
        eq.className = 'floating-eq';
        eq.textContent = equations[Math.floor(Math.random() * equations.length)];
        eq.style.left = Math.random() * 90 + 5 + '%';
        eq.style.fontSize = (Math.random() * 0.5 + 0.65) + 'em';
        eq.style.animationDuration = (Math.random() * 20 + 25) + 's';
        eq.style.animationDelay = '0s';
        container.appendChild(eq);

        // Remove after animation ends
        eq.addEventListener('animationend', () => eq.remove());
    }

    // Initial burst
    for (let i = 0; i < 12; i++) {
        setTimeout(spawnEquation, i * 800);
    }

    // Continuous spawning
    setInterval(spawnEquation, 3000);
}

// ── Boot Sequence (Login → Dashboard transition) ──
function runBootSequence(redirectUrl) {
    const boot = document.getElementById('boot-sequence');
    const form = document.getElementById('login-form');
    if (!boot || !form) return;

    form.style.display = 'none';
    boot.classList.add('active');

    const bootLines = [
        '<span style="color:#00e5ff;">[OK]</span> Inicializando sensores del laboratorio...',
        '<span style="color:#00e5ff;">[OK]</span> Calibrando instrumentos de medición...',
        '<span style="color:#00e676;">[OK]</span> Verificando constantes físicas...',
        '<span style="color:#3d5afe;">[OK]</span> Cargando módulos de simulación...',
        '<span style="color:#00e5ff;">[OK]</span> Acceso autorizado — Redirigiendo al laboratorio...',
    ];

    bootLines.forEach((line, i) => {
        setTimeout(() => {
            const el = document.createElement('div');
            el.className = 'boot-line';
            el.innerHTML = '▸ ' + line;
            boot.appendChild(el);
        }, i * 450);
    });

    setTimeout(() => {
        window.location.href = redirectUrl || 'dashboard.html';
    }, bootLines.length * 450 + 500);
}

// ── Handle Login Form ──
function handleLogin(e) {
    e.preventDefault();
    const username = document.getElementById('username-input').value.trim();
    const password = document.getElementById('password-input').value.trim();

    if (username && password) {
        // Store user info
        sessionStorage.setItem('physics_user', username.toUpperCase());
        sessionStorage.setItem('physics_logged_in', 'true');
        runBootSequence('dashboard.html');
    } else {
        const errorMsg = document.getElementById('login-error');
        if (errorMsg) {
            errorMsg.classList.add('visible');
            setTimeout(() => errorMsg.classList.remove('visible'), 3000);
        }
    }
}

// ── Card Animation on Scroll ──
function animateCardsOnScroll() {
    const cards = document.querySelectorAll('.class-card');
    if (!cards.length) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

    cards.forEach((card, i) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = `opacity 0.5s ease ${i % 4 * 0.08}s, transform 0.5s ease ${i % 4 * 0.08}s`;
        observer.observe(card);
    });
}

// ── Toggle Tasks (Homework) ──
function toggleTasks(event) {
    if (event) event.preventDefault();
    const btn = document.getElementById('btn-toggle-tasks');
    if (!btn) return;
    
    let show = localStorage.getItem('physics_show_tasks') === 'true';
    show = !show; // flip state
    localStorage.setItem('physics_show_tasks', show ? 'true' : 'false');
    
    updateTasksVisibility(show);
}

function updateTasksVisibility(show) {
    const btn = document.getElementById('btn-toggle-tasks');
    const tasks = document.querySelectorAll('.card-task');
    
    if (show) {
        if (btn) {
            btn.innerHTML = '<i class="fas fa-tasks"></i> TAREAS: VISIBLES';
            btn.style.color = 'var(--physics-green)';
            btn.style.borderColor = 'rgba(0, 230, 118, 0.4)';
            btn.style.background = 'rgba(0, 230, 118, 0.05)';
        }
        tasks.forEach(t => t.style.display = 'block');
    } else {
        if (btn) {
            btn.innerHTML = '<i class="fas fa-tasks"></i> TAREAS: OCULTAS';
            btn.style.color = '';
            btn.style.borderColor = '';
            btn.style.background = '';
        }
        tasks.forEach(t => t.style.display = 'none');
    }
}

// ── Dashboard Header User Display ──
function setupDashboard() {
    const userName = sessionStorage.getItem('physics_user') || 'ESTUDIANTE';
    const userDisplay = document.getElementById('user-display');
    if (userDisplay) {
        userDisplay.textContent = userName;
    }
}

// ── Logout ──
function handleLogout() {
    sessionStorage.clear();
    window.location.href = 'index.html';
}

// ── Init ──
document.addEventListener('DOMContentLoaded', () => {
    // Login page
    if (document.body.classList.contains('login-page')) {
        new ParticleSystem('particle-canvas');
        createFloatingEquations();
    }

    // Dashboard page
    if (document.body.classList.contains('dashboard-page')) {
        setupDashboard();
        animateCardsOnScroll();
        createFloatingEquations();
        // Check local storage task visibility
        const show = localStorage.getItem('physics_show_tasks') === 'true';
        updateTasksVisibility(show);

        // Bind Zero-Gravity to header logo click
        const brandLogo = document.querySelector('.brand');
        if (brandLogo) {
            brandLogo.style.cursor = 'pointer';
            brandLogo.addEventListener('click', toggleZeroGravity);
        }
    }
});

// ── Zero Gravity Mode Easter Egg ──
let zeroGravActive = false;
let gravCards = [];
let gravAnimationId = null;

function toggleZeroGravity() {
    zeroGravActive = !zeroGravActive;
    const cards = document.querySelectorAll('.class-card');
    
    if (zeroGravActive) {
        showFloatingNotification("⚠️ ANOMALÍA ESPACIO-TEMPORAL DETECTADA: GRAVEDAD CERO (g = 0 m/s²)");
        
        gravCards = [];
        cards.forEach((card) => {
            const rect = card.getBoundingClientRect();
            card.dataset.origStyle = card.style.cssText;
            
            const angle = Math.random() * Math.PI * 2;
            const speed = Math.random() * 1.5 + 0.8;
            
            gravCards.push({
                el: card,
                x: rect.left,
                y: rect.top,
                vx: Math.cos(angle) * speed,
                vy: Math.sin(angle) * speed,
                width: rect.width,
                height: rect.height
            });
            
            card.style.position = 'fixed';
            card.style.zIndex = '999';
            card.style.width = rect.width + 'px';
            card.style.height = rect.height + 'px';
            card.style.margin = '0';
            card.style.transition = 'none';
        });
        
        updateGravityPhysics();
    } else {
        showFloatingNotification("✅ CAMPO VECTORIAL GRAVITATORIO RESTAURADO (g = 9.81 m/s²)");
        cancelAnimationFrame(gravAnimationId);
        
        cards.forEach(card => {
            card.style.cssText = card.dataset.origStyle || '';
        });
    }
}

function updateGravityPhysics() {
    if (!zeroGravActive) return;
    
    const w = window.innerWidth;
    const h = window.innerHeight;
    
    gravCards.forEach(c => {
        c.x += c.vx;
        c.y += c.vy;
        
        // Bounce off walls
        if (c.x <= 10) {
            c.x = 10;
            c.vx = Math.abs(c.vx) * 0.95;
        } else if (c.x + c.width >= w - 10) {
            c.x = w - c.width - 10;
            c.vx = -Math.abs(c.vx) * 0.95;
        }
        
        if (c.y <= 65) { // header padding
            c.y = 65;
            c.vy = Math.abs(c.vy) * 0.95;
        } else if (c.y + c.height >= h - 10) {
            c.y = h - c.height - 10;
            c.vy = -Math.abs(c.vy) * 0.95;
        }
        
        c.el.style.left = c.x + 'px';
        c.el.style.top = c.y + 'px';
    });
    
    gravAnimationId = requestAnimationFrame(updateGravityPhysics);
}

function showFloatingNotification(msg) {
    let alertDiv = document.getElementById('physics-toast');
    if (!alertDiv) {
        alertDiv = document.createElement('div');
        alertDiv.id = 'physics-toast';
        alertDiv.style.cssText = `
            position: fixed; bottom: 25px; right: 25px;
            background: rgba(12, 16, 32, 0.9);
            border: 1px solid #00e5ff;
            color: #00e5ff; padding: 14px 28px;
            border-radius: 4px; z-index: 10005;
            box-shadow: 0 0 25px rgba(0, 229, 255, 0.4);
            font-family: monospace; font-size: 0.85em;
            transition: opacity 0.3s ease;
            pointer-events: none;
        `;
        document.body.appendChild(alertDiv);
    }
    alertDiv.textContent = msg;
    alertDiv.style.opacity = '1';
    setTimeout(() => {
        alertDiv.style.opacity = '0';
    }, 3000);
}

// Bind 'g' key to Zero Gravity
document.addEventListener('keydown', (e) => {
    if (e.key.toLowerCase() === 'g') {
        const activeTag = document.activeElement.tagName.toLowerCase();
        if (activeTag !== 'input' && activeTag !== 'textarea') {
            toggleZeroGravity();
        }
    }
});

// ── Konami Code Easter Egg (Schrödinger's Cat Quantum Superposition) ──
(function() {
    const konamiCode = ['ArrowUp', 'ArrowUp', 'ArrowDown', 'ArrowDown', 'ArrowLeft', 'ArrowRight', 'ArrowLeft', 'ArrowRight', 'b', 'a'];
    let konamiIndex = 0;

    document.addEventListener('keydown', (e) => {
        if (e.key === konamiCode[konamiIndex]) {
            konamiIndex++;
            if (konamiIndex === konamiCode.length) {
                triggerSchrodingerEgg();
                konamiIndex = 0;
            }
        } else {
            konamiIndex = 0;
        }
    });

    function triggerSchrodingerEgg() {
        if (document.getElementById('schrodinger-modal')) return;

        const modal = document.createElement('div');
        modal.id = 'schrodinger-modal';
        modal.style.cssText = `
            position: fixed;
            top: 0; left: 0; width: 100vw; height: 100vh;
            background: rgba(4, 8, 18, 0.92);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            z-index: 10000;
            display: flex; justify-content: center; align-items: center;
            color: #c8d6e5;
            font-family: 'Inter', sans-serif;
            animation: fadeIn 0.3s ease;
        `;

        modal.innerHTML = `
            <div style="
                background: rgba(12, 16, 32, 0.85);
                border: 2px solid #00e5ff;
                border-radius: 8px;
                padding: 40px;
                max-width: 500px;
                width: 90%;
                text-align: center;
                box-shadow: 0 0 35px rgba(0, 229, 255, 0.4);
                position: relative;
            ">
                <button id="close-egg-btn" style="
                    position: absolute; top: 15px; right: 15px;
                    background: none; border: none; color: #ff5252;
                    font-size: 1.8em; cursor: pointer; transition: color 0.2s;
                " onmouseover="this.style.color='#ff1744'" onmouseout="this.style.color='#ff5252'">&times;</button>
                
                <h2 style="color: #00e5ff; font-weight: 800; margin-bottom: 10px; font-size: 1.8em; text-shadow: 0 0 15px rgba(0,229,255,0.45);">
                    <i class="fas fa-cat"></i> Schrödinger's Box
                </h2>
                <p style="color: #a5b3c5; font-size: 0.9em; margin-bottom: 20px;">
                    Has ingresado la secuencia de anulación Konami. La realidad se ha desfasado y el felino se encuentra en estado de superposición coherente:
                </p>
                <div style="background: rgba(0,0,0,0.45); padding: 10px; border-radius: 4px; font-family: monospace; font-size: 0.95em; color: #ffea00; margin-bottom: 25px; border: 1px dashed rgba(0,229,255,0.2);">
                    |Ψ⟩ = 1/√2(|🐈⟩ + |💀⟩)
                </div>
                
                <div id="cat-box-graphic" style="
                    font-size: 6em; margin: 25px 0; transition: all 0.3s ease;
                    filter: drop-shadow(0 0 15px rgba(0, 229, 255, 0.25));
                ">📦</div>
                
                <p id="cat-status" style="font-weight: 700; font-size: 1.25em; height: 1.5em; margin: 15px 0; font-family: monospace;"></p>
                
                <button id="observe-cat-btn" style="
                    background: #00e5ff; color: #040812;
                    border: none; padding: 12px 28px;
                    border-radius: 4px; font-weight: bold;
                    cursor: pointer; font-size: 1em;
                    transition: all 0.25s;
                    box-shadow: 0 0 15px rgba(0,229,255,0.3);
                " onmouseover="this.style.boxShadow='0 0 25px rgba(0,229,255,0.6)'" onmouseout="this.style.boxShadow='0 0 15px rgba(0,229,255,0.3)'">
                    <i class="fas fa-eye"></i> Observar caja (Colapsar función de onda)
                </button>
            </div>
        `;

        document.body.appendChild(modal);

        const closeBtn = modal.querySelector('#close-egg-btn');
        closeBtn.onclick = () => modal.remove();

        const boxGraphic = modal.querySelector('#cat-box-graphic');
        const observeBtn = modal.querySelector('#observe-cat-btn');
        const statusText = modal.querySelector('#cat-status');

        observeBtn.onclick = () => {
            // Shake animation
            boxGraphic.style.transform = 'rotate(10deg)';
            setTimeout(() => boxGraphic.style.transform = 'rotate(-10deg)', 60);
            setTimeout(() => boxGraphic.style.transform = 'rotate(10deg)', 120);
            setTimeout(() => boxGraphic.style.transform = 'rotate(0deg)', 180);

            setTimeout(() => {
                const isAlive = Math.random() < 0.5;
                if (isAlive) {
                    boxGraphic.innerHTML = '🐈';
                    statusText.style.color = '#00e676';
                    statusText.innerHTML = '🐱 ¡VIVO! |Ψ⟩ → |🐈⟩';
                    boxGraphic.style.filter = 'drop-shadow(0 0 20px rgba(0,230,118,0.7))';
                } else {
                    boxGraphic.innerHTML = '💀';
                    statusText.style.color = '#ff5252';
                    statusText.innerHTML = '💀 ¡MUERTO! |Ψ⟩ → |💀⟩';
                    boxGraphic.style.filter = 'drop-shadow(0 0 20px rgba(255,82,82,0.7))';
                }
            }, 250);
        };
    }

    // CSS Keyframes injection
    if (!document.getElementById('schrodinger-styles')) {
        const style = document.createElement('style');
        style.id = 'schrodinger-styles';
        style.textContent = `
            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }
        `;
        document.head.appendChild(style);
    }
})();
