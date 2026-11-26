<div class="modal fade" id="solicitarCitaModal" tabindex="-1" aria-labelledby="solicitarCitaLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content sc-shell" role="dialog" aria-modal="true">
      <style>
        .sc-shell { border: none; border-radius: 18px; overflow: hidden; }
        .sc-modal-header {
          background: linear-gradient(135deg, #2e4a47, #4a6b68);
          color: #fff; padding: 22px 24px;
          display: flex; align-items: flex-start; gap: 14px;
        }
        .sc-modal-header .logo-placeholder {
          width: 52px; height: 52px; border-radius: 12px;
          background: rgba(255,255,255,0.12);
          display: flex; align-items: center; justify-content: center; flex-shrink: 0;
        }
        .sc-modal-header h5 { margin: 0; font-size: 18px; font-weight: 800; letter-spacing: -0.2px; }
        .sc-modal-sub { margin-top: 4px; color: rgba(255,255,255,0.88); font-size: 13px; line-height: 1.45; }
        .sc-body { padding: 22px 22px 8px; background: #f7faf9; }
        .sc-grid {
          display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px;
        }
        @media (max-width: 720px) { .sc-grid { grid-template-columns: 1fr; } }
        .sc-card {
          background: #fff; border-radius: 14px;
          border: 1px solid #e4efee;
          padding: 18px; display: flex; flex-direction: column; gap: 14px;
          box-shadow: 0 8px 24px rgba(46,74,71,0.06);
          height: 100%;
        }
        .sc-card-top { display: flex; gap: 12px; align-items: flex-start; }
        .sc-icon {
          width: 44px; height: 44px; border-radius: 12px; flex-shrink: 0;
          display: flex; align-items: center; justify-content: center;
          background: #eef5f4; color: #4a6b68; font-size: 18px;
        }
        .sc-card h6 {
          margin: 0 0 4px; font-size: 13px; font-weight: 800;
          color: #2e4a47; text-transform: uppercase; letter-spacing: 0.4px;
        }
        .sc-card .sc-phone {
          margin: 0; color: #2c3e3d; font-size: 18px; font-weight: 700; line-height: 1.2;
        }
        .sc-card .sc-hint { margin: 6px 0 0; color: #6b8080; font-size: 12px; line-height: 1.4; }
        .sc-actions { display: flex; gap: 8px; flex-wrap: wrap; margin-top: auto; }
        .sc-actions a, .sc-actions button {
          flex: 1 1 calc(50% - 4px); min-width: 120px;
          text-align: center; border: none; cursor: pointer;
          padding: 11px 12px; border-radius: 10px;
          font-size: 12.5px; font-weight: 700; font-family: 'Poppins', sans-serif;
          display: inline-flex; align-items: center; justify-content: center; gap: 8px;
          text-decoration: none; transition: transform 0.15s, opacity 0.15s;
        }
        .sc-actions a:hover, .sc-actions button:hover { transform: translateY(-1px); opacity: 0.92; }
        .sc-cta-wa { background: #25d366; color: #fff; }
        .sc-cta-call { background: linear-gradient(135deg, #2e4a47, #4a6b68); color: #fff; }
        .sc-cta-llamamos {
          background: linear-gradient(135deg, #1455a0, #1976d2); color: #fff;
          width: 100%;
        }
        .sc-banner {
          margin-top: 14px; background: #fff; border: 1px solid #dce8e7;
          border-radius: 14px; padding: 16px 18px;
          display: flex; gap: 14px; align-items: center; flex-wrap: wrap;
        }
        .sc-banner p { margin: 0; flex: 1 1 220px; font-size: 13px; color: #555; line-height: 1.55; }
        .sc-banner strong { color: #2e4a47; }
        .sc-footer {
          border-top: none; background: #fff; padding: 14px 22px 20px;
          display: flex; justify-content: flex-end;
        }
        .sc-footer .btn-close-sc {
          background: #eef5f4; color: #2e4a47; border: none;
          border-radius: 999px; padding: 10px 22px; font-weight: 700;
          font-size: 12.5px; font-family: 'Poppins', sans-serif;
        }
        .sc-footer .btn-close-sc:hover { background: #dce8e7; }
        @media (max-width: 420px) {
          .sc-body { padding: 14px; }
          .sc-actions a, .sc-actions button { flex: 1 1 100%; }
        }
      </style>

      <div class="sc-modal-header">
        <div class="logo-placeholder">
          <img src="{{ asset('assets/img/ABOUT.png') }}" alt="logo" style="height:34px; width:auto; opacity:0.95;">
        </div>
        <div style="flex:1; min-width:0;">
          <h5 id="solicitarCitaLabel">Solicitar cita</h5>
          <div class="sc-modal-sub">Elija el canal de su especialidad o déjenos sus datos para llamarlo.</div>
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <div class="sc-body">
        <div class="sc-grid">
          <div class="sc-card">
            <div class="sc-card-top">
              <div class="sc-icon"><i class="fa fa-brain"></i></div>
              <div>
                <h6>Neurología / Epileptología / Psiquiatría </h6>
                <p class="sc-phone">{{ setting('wa1_display') }}</p>
                <p class="sc-hint">También Neuropsicología y Psicología por este canal.</p>
              </div>
            </div>
            <div class="sc-actions">
              <a class="sc-cta-wa" href="https://wa.me/{{ setting('wa1') }}?text=%C2%A1Hola!%20Deseo%20agendar%20una%20cita." target="_blank" rel="noopener"><i class="fab fa-whatsapp"></i> WhatsApp</a>
              <a class="sc-cta-call" href="tel:{{ setting('wa1_tel') }}"><i class="fa fa-phone"></i> Llamar</a>
            </div>
          </div>

          <div class="sc-card">
            <div class="sc-card-top">
              <div class="sc-icon"><i class="fa fa-hands-helping"></i></div>
              <div>
                <h6>Psicología / Neuropsicología / Terapias </h6>
                <p class="sc-phone">{{ setting('wa2_display') }}</p>
                <p class="sc-hint">Fisioterapia, terapias y acompañamiento psicológico.</p>
              </div>
            </div>
            <div class="sc-actions">
              <a class="sc-cta-wa" href="https://wa.me/{{ setting('wa2') }}?text=%C2%A1Hola!%20Deseo%20agendar%20una%20cita." target="_blank" rel="noopener"><i class="fab fa-whatsapp"></i> WhatsApp</a>
              <a class="sc-cta-call" href="tel:{{ setting('wa2_tel') }}"><i class="fa fa-phone"></i> Llamar</a>
            </div>
          </div>

          <div class="sc-card">
            <div class="sc-card-top">
              <div class="sc-icon"><i class="fa fa-phone-alt"></i></div>
              <div>
                <h6>PBX</h6>
                <p class="sc-phone">{{ setting('phone_fixed_display') }}</p>
                <p class="sc-hint">{{ setting('hours_weekdays') }} · {{ setting('hours_saturday') }}</p>
              </div>
            </div>
            <div class="sc-actions">
              <a class="sc-cta-call" href="tel:{{ setting('phone_fixed') }}" style="flex:1 1 100%;"><i class="fa fa-phone"></i> Llamar ahora</a>
            </div>
          </div>

          <div class="sc-card" style="border-color:#c5d9f5; background:linear-gradient(180deg,#fff 0%,#f3f8ff 100%);">
            <div class="sc-card-top">
              <div class="sc-icon" style="background:#e8f1fb; color:#1455a0;"><i class="fa fa-headset"></i></div>
              <div>
                <h6 style="color:#1455a0;">¿Prefiere que lo llamemos?</h6>
                <p class="sc-hint" style="margin-top:0;">Deje sus datos y nuestro equipo lo contactará.</p>
              </div>
            </div>
            <div class="sc-actions">
              <button type="button" class="sc-cta-llamamos" data-bs-dismiss="modal" onclick="openLlamamos()">
                <i class="fa fa-phone-alt"></i> Lo llamamos
              </button>
            </div>
          </div>
        </div>

        <div class="sc-banner">
          <p>
            <strong>Tip:</strong> WhatsApp puede ser la vía más rápida.
          </p>
        </div>
      </div>

      <div class="sc-footer modal-footer">
        <button type="button" class="btn-close-sc" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
