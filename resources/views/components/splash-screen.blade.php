<div id="splash-screen" class="splash-screen-container" role="status" aria-label="Cargando" style="position:fixed;top:0;left:0;right:0;bottom:0;width:100%;height:100%;min-height:100vh;display:flex;justify-content:center;align-items:center;z-index:2147483647;opacity:1;background:radial-gradient(circle at top, rgba(255,255,255,0.6), transparent 28%), linear-gradient(135deg, #4a6b68 0%, #a7c6bd 65%, #eef5f4 100%);">
    <div class="splash-screen-content" style="text-align:center;display:flex;flex-direction:column;align-items:center;gap:30px;">
        <div class="splash-logo-wrapper" style="position:relative;width:min(320px,80vw);display:inline-flex;justify-content:center;align-items:center;">
            <div class="splash-halo"></div>
            <img src="{{ asset('assets/img/LOGO.png') }}" alt="Instituto Neurociencias de Nariño" class="splash-logo" width="300" style="width:min(300px,80vw);height:auto;z-index:1;filter:drop-shadow(0 18px 40px rgba(0,0,0,0.16));">
        </div>
        <div class="splash-spinner"></div>
    </div>
</div>

<style>
    .splash-screen-container.fade-out {
        opacity: 0 !important;
        pointer-events: none !important;
        transition: opacity 0.45s ease-out;
    }
    .splash-logo-wrapper { animation: logoZoom 0.8s ease-out forwards; }
    .splash-halo {
        position: absolute;
        width: 220px;
        height: 220px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(255,255,255,0.45) 0%, rgba(255,255,255,0) 60%);
        filter: blur(24px);
        opacity: 0.85;
        animation: haloPulse 1.8s ease-in-out infinite;
    }
    .splash-spinner {
        position: relative;
        width: 52px;
        height: 52px;
    }
    .splash-spinner::before,
    .splash-spinner::after {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 50%;
        border: 4px solid transparent;
    }
    .splash-spinner::before {
        border-top-color: rgba(255,255,255,0.82);
        animation: splashSpin 1s linear infinite;
    }
    .splash-spinner::after {
        border-bottom-color: rgba(255,255,255,0.35);
        animation: splashSpin 1.2s linear reverse infinite;
    }
    @keyframes logoZoom {
        0% { transform: scale(0.7); opacity: 0; }
        60% { transform: scale(1.15); opacity: 1; }
        100% { transform: scale(1); opacity: 1; }
    }
    @keyframes haloPulse {
        0% { transform: scale(1); opacity: 0.85; }
        50% { transform: scale(1.08); opacity: 0.65; }
        100% { transform: scale(1); opacity: 0.85; }
    }
    @keyframes splashSpin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    @media (prefers-reduced-motion: reduce) {
        .splash-logo-wrapper, .splash-halo, .splash-spinner::before, .splash-spinner::after { animation: none; }
    }
</style>

<script>
    (function () {
        var splashScreen = document.getElementById('splash-screen');
        var html = document.documentElement;
        var done = false;
        var minMs = 1100;
        var maxMs = 2800;
        var started = Date.now();

        function finish() {
            if (done) return;
            done = true;
            html.classList.remove('splash-pending');
            document.body.classList.remove('splash-active');
            document.body.style.background = '';
            document.body.style.overflow = '';
            requestAnimationFrame(function () {
                requestAnimationFrame(function () {
                    if (splashScreen) splashScreen.classList.add('fade-out');
                    window.setTimeout(function () {
                        if (splashScreen) splashScreen.style.display = 'none';
                        try { document.dispatchEvent(new CustomEvent('innar:splash-done')); } catch (e) {}
                    }, 450);
                });
            });
        }

        if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            minMs = 0;
            maxMs = 400;
        }

        window.addEventListener('load', function () {
            window.setTimeout(finish, Math.max(0, minMs - (Date.now() - started)));
        });
        window.setTimeout(finish, maxMs);
    })();
</script>
