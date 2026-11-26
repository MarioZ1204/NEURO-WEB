{{--
    Vista previa en vivo de la página pública con los datos del formulario sin guardar.
    Parámetros:
      form          Selector CSS del formulario a observar.
      url           Ruta POST que devuelve la página renderizada.
      targets       Selectores (en orden de prioridad) a los que se desplaza la vista previa al abrir.
      fieldTargets  (opcional) prefijo de campo => selector; al enfocar ese campo la vista se desplaza allí.
                    El selector especial «@qr» abre la ventana de pagos y donaciones.
      note          (opcional) texto de ayuda bajo la vista previa.
--}}
@php
    $lpId = 'lp' . substr(md5($url), 0, 8);
    $lpConfig = [
        'form' => $form,
        'url' => $url,
        'targets' => $targets ?? [],
        'fieldTargets' => (object) ($fieldTargets ?? []),
    ];
@endphp
<aside class="lp" id="{{ $lpId }}" data-state="idle">
    <div class="lp-bar">
        <span class="lp-title"><span class="lp-dot"></span> Vista previa en vivo</span>
        <span class="lp-status">Preparando…</span>
        <div class="lp-actions">
            <button type="button" class="lp-btn" data-device="desktop" title="Ver como computador"><i class="fa fa-desktop"></i></button>
            <button type="button" class="lp-btn" data-device="mobile" title="Ver como celular"><i class="fa fa-mobile-screen"></i></button>
            <button type="button" class="lp-btn" data-action="reload" title="Actualizar vista previa"><i class="fa fa-rotate-right"></i></button>
        </div>
    </div>
    <div class="lp-viewport"><div class="lp-empty">Cargando la página…</div></div>
    <div class="lp-note">{{ $note ?? 'Así se verá en el sitio. Los cambios solo se publican al pulsar Guardar.' }}</div>
</aside>
<script>
(function () {
    var cfg = @json($lpConfig);
    var panel = document.getElementById(@json($lpId));
    var form = document.querySelector(cfg.form);
    if (!panel || !form) return;

    var viewport = panel.querySelector('.lp-viewport');
    var statusEl = panel.querySelector('.lp-status');
    var widths = { desktop: 1280, mobile: 390 };
    var device = 'desktop';
    try { device = localStorage.getItem('adminPreviewDevice') || 'desktop'; } catch (e) {}
    var current = null;
    var timer = null;
    var seq = 0;
    var lastScroll = null;
    var pendingJump = true;
    var activeTarget = null;
    var blobs = {};

    function setState(state, text) {
        panel.setAttribute('data-state', state);
        statusEl.textContent = text;
    }

    function sizeFrame(frame) {
        if (!frame) return;
        var w = widths[device];
        var vw = viewport.clientWidth;
        var vh = viewport.clientHeight;
        var scale = Math.min(1, vw / w);
        frame.style.width = w + 'px';
        frame.style.height = Math.ceil(vh / scale) + 'px';
        frame.style.transform = 'scale(' + scale + ')';
        frame.style.left = Math.max(0, (vw - w * scale) / 2) + 'px';
    }

    function paintDevice() {
        panel.querySelectorAll('[data-device]').forEach(function (btn) {
            btn.classList.toggle('is-on', btn.getAttribute('data-device') === device);
        });
    }

    function collect() {
        var fd = new FormData(form);
        fd.delete('_method');
        form.querySelectorAll('input[type=file][name]').forEach(function (input) {
            fd.delete(input.name);
            var file = input.files && input.files[0];
            if (!file) return;
            fd.append('_preview_files[]', input.name);
            fd.append('_preview_types[' + input.name + ']', file.type || '');
            if (!blobs[input.name] || blobs[input.name].file !== file) {
                if (blobs[input.name]) URL.revokeObjectURL(blobs[input.name].url);
                blobs[input.name] = { file: file, url: URL.createObjectURL(file) };
            }
        });
        return fd;
    }

    function targetList() {
        return activeTarget ? [activeTarget] : cfg.targets;
    }

    function jump(frame) {
        var win = frame.contentWindow;
        var doc = frame.contentDocument;
        if (!win || !doc) return;
        var list = targetList();
        if (list[0] === '@qr') {
            if (typeof win.openQRModal === 'function') win.openQRModal();
            return;
        }
        if (!pendingJump && lastScroll !== null) {
            win.scrollTo(0, lastScroll);
            return;
        }
        pendingJump = false;
        for (var i = 0; i < list.length; i++) {
            var el = doc.querySelector(list[i]);
            if (!el) continue;
            if (el.hasAttribute('data-preview-focus')) {
                el.scrollIntoView({ block: 'center' });
            } else {
                var top = el.getBoundingClientRect().top + win.pageYOffset - 90;
                win.scrollTo(0, Math.max(0, top));
            }
            lastScroll = win.pageYOffset;
            return;
        }
        win.scrollTo(0, 0);
        lastScroll = 0;
    }

    function swap(html) {
        var frame = document.createElement('iframe');
        frame.className = 'lp-frame is-loading';
        frame.setAttribute('title', 'Vista previa del sitio');
        sizeFrame(frame);
        frame.addEventListener('load', function () {
            try { jump(frame); } catch (e) {}
            setTimeout(function () {
                frame.classList.remove('is-loading');
                if (current && current !== frame) current.remove();
                var empty = viewport.querySelector('.lp-empty');
                if (empty) empty.remove();
                current = frame;
                try {
                    frame.contentWindow.addEventListener('scroll', function () {
                        lastScroll = frame.contentWindow.pageYOffset;
                    }, { passive: true });
                } catch (e) {}
                setState('ok', 'Al día');
            }, 80);
        }, { once: true });
        frame.srcdoc = html;
        viewport.appendChild(frame);
    }

    function refresh() {
        var mine = ++seq;
        setState('loading', 'Actualizando…');
        var body = collect();
        fetch(cfg.url, {
            method: 'POST',
            body: body,
            credentials: 'same-origin',
            headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'text/html' }
        }).then(function (res) {
            if (!res.ok) throw new Error('HTTP ' + res.status);
            return res.text();
        }).then(function (html) {
            if (mine !== seq) return;
            html = html.replace(/(?:https?:\/\/[^"'\s)]*?)?__preview__\/([A-Za-z0-9_]+)/g, function (m, name) {
                return blobs[name] ? blobs[name].url : '';
            });
            swap(html);
        }).catch(function () {
            if (mine !== seq) return;
            setState('error', 'No se pudo actualizar');
        });
    }

    function schedule(delay) {
        clearTimeout(timer);
        timer = setTimeout(refresh, delay);
    }

    function targetForField(name) {
        if (!name) return null;
        var map = cfg.fieldTargets || {};
        var keys = Object.keys(map).sort(function (a, b) { return b.length - a.length; });
        for (var i = 0; i < keys.length; i++) {
            if (keys[i] === '*' ) continue;
            if (name.indexOf(keys[i]) === 0) return map[keys[i]];
        }
        return map['*'] || null;
    }

    form.addEventListener('input', function () { schedule(450); });
    form.addEventListener('change', function () { schedule(150); });
    form.addEventListener('focusin', function (e) {
        var target = targetForField(e.target && e.target.name);
        if (!target || target === activeTarget) return;
        var wasQr = activeTarget === '@qr';
        activeTarget = target;
        pendingJump = true;
        if (!current) return;
        if (wasQr || target === '@qr') {
            schedule(0);
        } else {
            try { jump(current); } catch (err) {}
        }
    });

    panel.querySelectorAll('[data-device]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            device = btn.getAttribute('data-device');
            try { localStorage.setItem('adminPreviewDevice', device); } catch (e) {}
            paintDevice();
            sizeFrame(current);
            pendingJump = true;
            setTimeout(function () { try { if (current) jump(current); } catch (e) {} }, 60);
        });
    });
    panel.querySelector('[data-action="reload"]').addEventListener('click', function () {
        pendingJump = true;
        schedule(0);
    });
    window.addEventListener('resize', function () { sizeFrame(current); });

    paintDevice();
    refresh();
})();
</script>
