<!-- Splash Screen -->
<div id="splash-screen" class="splash-screen-container">
    <div class="splash-screen-content">
        <!-- Logo Animation -->
        <div class="splash-logo-wrapper">
            <img src="{{ asset('assets/img/LOGO.png') }}" alt="Logo" class="splash-logo">
        </div>
        
        <!-- Loading Spinner -->
        <div class="splash-spinner"></div>
        

    </div>
</div>

<style>
    /* Splash Screen Container */
    .splash-screen-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(10deg, #ffff 0%, #627371 100%);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        opacity: 1;
        transition: opacity 0.6s ease-out;
    }

    .splash-screen-container.fade-out {
        opacity: 0;
        pointer-events: none;
    }

    /* Splash Content */
    .splash-screen-content {
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 30px;
    }

    /* Logo Animation */
    .splash-logo-wrapper {
        animation: logoZoom 0.8s ease-out forwards;
    }

    .splash-logo {
        width: 300px;
        height: auto;
        filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.2));
    }

    @keyframes logoZoom {
        0% {
            transform: scale(0.8);
            opacity: 0;
        }
        50% {
            transform: scale(1.1);
        }
        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    /* Spinner Animation */
    .splash-spinner {
        width: 50px;
        height: 50px;
        border: 4px solid rgba(255, 255, 255, 0.3);
        border-top: 4px solid white;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    /* Loading Text */
    .splash-text {
        color: white;
        font-size: 18px;
        font-weight: 500;
        margin: 0;
        letter-spacing: 2px;
        animation: pulse 1.5s ease-in-out infinite;
    }

    @keyframes pulse {
        0%, 100% {
            opacity: 0.6;
        }
        50% {
            opacity: 1;
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .splash-logo {
            width: 80px;
        }

        .splash-text {
            font-size: 16px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const splashScreen = document.getElementById('splash-screen');
        
        // Mostrar splash screen por 3 segundos
        setTimeout(function() {
            splashScreen.classList.add('fade-out');
            
            // Remover del DOM después de la animación
            setTimeout(function() {
                splashScreen.style.display = 'none';
            }, 600);
        }, 1500);
    });
</script>
