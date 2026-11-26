<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [LandingController::class, 'inicio'])
    ->name('landing.inicio');

Route::get('/testimonios/archivo/{testimonial}', [LandingController::class, 'serveTestimonialFile'])
    ->name('testimonial.file');
Route::get('/equipo/foto/{member}', [LandingController::class, 'serveTeamPhoto'])
    ->name('team.photo');
Route::get('/archivos-publicos/{path}', [LandingController::class, 'servePublicFile'])
    ->where('path', '.*')
    ->name('public.file');

Route::get('/dejar-testimonio', [LandingController::class, 'showTestimonialForm'])
    ->name('testimonial.form');
Route::post('/dejar-testimonio', [LandingController::class, 'submitTestimonial'])
    ->middleware('throttle:5,1')
    ->name('testimonial.submit');

Route::get('/acerca-de-nosotros', [LandingController::class, 'aboutUs'])
    ->name('landing.aboutUs');

Route::get('/portafolio-de-servicios', [LandingController::class, 'portafolio'])
    ->name('landing.portafolio');

// Rutas de servicios
Route::get('/servicios/tipos-consulta', [LandingController::class, 'tiposConsulta'])
    ->name('landing.tiposConsulta');

Route::get('/servicios/tipos-terapia', [LandingController::class, 'tiposTerapia'])
    ->name('landing.tiposTerapia');

Route::get('/servicios/electrodiagnosticos', [LandingController::class, 'electrodiagnosticos'])
    ->name('landing.electrodiagnosticos');

Route::permanentRedirect('/contacto', '/escribanos')->name('contact.form');

// Solicitar cita / Lo llamamos
Route::post('/solicitar-cita/enviar', [\App\Http\Controllers\SolicitarCitaController::class, 'enviar'])
    ->middleware('throttle:5,1')
    ->name('solicitar-cita.enviar');
Route::post('/lo-llamamos/enviar', [LandingController::class, 'sendLlamamos'])
    ->middleware('throttle:5,1')
    ->name('llamamos.enviar');

// Ruta de Política de Privacidad
Route::get('/politica-privacidad', [LandingController::class, 'politicaPrivacidad'])
    ->name('politicaPrivacidad');

// Nuestra Institución
Route::get('/nuestra-institucion/marco-legal', [LandingController::class, 'marcoLegal'])
    ->name('marcoLegal');

// Consulta Especializada
Route::get('/consulta/neurologia', [LandingController::class, 'neurologia'])
    ->name('consulta.neurologia');
Route::get('/consulta/epileptologia', [LandingController::class, 'epileptologia'])
    ->name('consulta.epileptologia');
Route::get('/consulta/psiquiatria', [LandingController::class, 'psiquiatria'])
    ->name('consulta.psiquiatria');
Route::get('/consulta/neuropsicologia', [LandingController::class, 'neuropsicologia'])
    ->name('consulta.neuropsicologia');
Route::get('/consulta/psicologia', [LandingController::class, 'psicologia'])
    ->name('consulta.psicologia');
Route::get('/consulta/medicina-general', [LandingController::class, 'medicinaGeneral'])
    ->name('consulta.medicinaGeneral');
Route::get('/consulta/oftalmologia', [LandingController::class, 'oftalmologia'])
    ->name('consulta.oftalmologia');
Route::get('/consulta/oftalmologia-pediatrica', [LandingController::class, 'oftalmologiaPediatrica'])
    ->name('consulta.oftalmologiaPediatrica');
Route::get('/consulta/terapia-fisica', [LandingController::class, 'terapiaFisica'])
    ->name('consulta.terapiaFisica');
Route::get('/consulta/terapia-ocupacional', [LandingController::class, 'terapiaOcupacional'])
    ->name('consulta.terapiaOcupacional');
Route::get('/consulta/fonoaudiologia', [LandingController::class, 'fonoaudiologia'])
    ->name('consulta.fonoaudiologia');

// Servicios Complementarios
Route::get('/servicios/clinica-del-sueno', [LandingController::class, 'clinicaSueno'])
    ->name('servicios.clinicaSueno');

// Educación al Paciente
Route::get('/educacion/polisomnografia-basal', [LandingController::class, 'polisBasal'])
    ->name('educacion.polisBasal');
Route::get('/educacion/polisomnografia', [LandingController::class, 'polisomnografia'])
    ->name('educacion.polisomnografia');
Route::get('/educacion/salud-del-sueno', [LandingController::class, 'saludDelSueno'])
    ->name('educacion.saludSueno');
Route::post('/educacion/salud-del-sueno/enviar', [LandingController::class, 'sendEncuestaSueno'])
    ->middleware('throttle:8,1')
    ->name('encuestaSueno.enviar');

// Trabaje con Nosotros
Route::get('/trabaje-con-nosotros/hoja-de-vida', [LandingController::class, 'hojaDeVida'])
    ->name('trabaje.hojaDeVida');
Route::post('/trabaje-con-nosotros/hoja-de-vida/enviar', [LandingController::class, 'sendHojaDeVida'])
    ->middleware('throttle:5,1')
    ->name('trabaje.hojaDeVida.send');
Route::get('/trabaje-con-nosotros/practicas', [LandingController::class, 'practicas'])
    ->name('trabaje.practicas');
Route::post('/trabaje-con-nosotros/practicas/enviar', [LandingController::class, 'sendPracticas'])
    ->middleware('throttle:5,1')
    ->name('trabaje.practicas.send');
Route::get('/trabaje-con-nosotros/convenio-institucional', [LandingController::class, 'convenioInstitucional'])
    ->name('trabaje.convenio');
Route::post('/trabaje-con-nosotros/convenio-institucional/enviar', [LandingController::class, 'sendConvenio'])
    ->middleware('throttle:5,1')
    ->name('trabaje.convenio.send');

// Páginas del FAB
Route::get('/escribanos', [LandingController::class, 'escribanos'])
    ->name('escribanos');
Route::post('/escribanos/enviar', [LandingController::class, 'sendEscribanos'])
    ->middleware('throttle:5,1')
    ->name('escribanos.send');
Route::get('/especialidades', [LandingController::class, 'especialidades'])
    ->name('especialidades');
Route::get('/directorio-medico', [LandingController::class, 'directorioMedico'])
    ->name('directorioMedico');

// Nuevas páginas
Route::get('/articulos-y-revistas', [LandingController::class, 'articulos'])
    ->name('articulos');
Route::get('/nuestra-institucion/estados-financieros', [LandingController::class, 'estadosFinancieros'])
    ->name('estadosFinancieros');
Route::get('/busqueda', [LandingController::class, 'busqueda'])
    ->name('busqueda');

Route::get('/sitemap.xml', [LandingController::class, 'sitemap'])
    ->name('sitemap');

// ===== RUTAS DE ADMINISTRACIÓN =====

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [\App\Http\Controllers\AuthAdminController::class, 'showLogin'])
        ->name('login');
    Route::post('/login', [\App\Http\Controllers\AuthAdminController::class, 'login'])
        ->middleware('throttle:10,1')
        ->name('login.submit');
    Route::post('/logout', [\App\Http\Controllers\AuthAdminController::class, 'logout'])
        ->name('logout');
});

Route::middleware(['check.admin.auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard'])
        ->name('dashboard');

    Route::get('/ajustes', [\App\Http\Controllers\AdminSiteController::class, 'edit'])->name('settings.edit');
    Route::put('/ajustes', [\App\Http\Controllers\AdminSiteController::class, 'update'])->name('settings.update');

    Route::prefix('vista-previa')->name('preview.')->group(function () {
        Route::post('/ajustes', [\App\Http\Controllers\AdminPreviewController::class, 'settings'])->name('settings');
        Route::post('/servicio/{homeService?}', [\App\Http\Controllers\AdminPreviewController::class, 'homeService'])->name('homeService');
        Route::post('/equipo/{team?}', [\App\Http\Controllers\AdminPreviewController::class, 'team'])->name('team');
        Route::post('/banner/{banner?}', [\App\Http\Controllers\AdminPreviewController::class, 'banner'])->name('banner');
        Route::post('/testimonio/{testimonial?}', [\App\Http\Controllers\AdminPreviewController::class, 'testimonial'])->name('testimonial');
    });

    Route::prefix('servicios-inicio')->name('homeServices.')->group(function () {
        Route::get('/', [\App\Http\Controllers\AdminHomeServiceController::class, 'index'])->name('index');
        Route::get('/crear', [\App\Http\Controllers\AdminHomeServiceController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\AdminHomeServiceController::class, 'store'])->name('store');
        Route::get('/{homeService}/editar', [\App\Http\Controllers\AdminHomeServiceController::class, 'edit'])->name('edit');
        Route::put('/{homeService}', [\App\Http\Controllers\AdminHomeServiceController::class, 'update'])->name('update');
        Route::delete('/{homeService}', [\App\Http\Controllers\AdminHomeServiceController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('equipo')->name('team.')->group(function () {
        Route::get('/', [\App\Http\Controllers\AdminTeamController::class, 'index'])->name('index');
        Route::get('/crear', [\App\Http\Controllers\AdminTeamController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\AdminTeamController::class, 'store'])->name('store');
        Route::get('/{team}/editar', [\App\Http\Controllers\AdminTeamController::class, 'edit'])->name('edit');
        Route::put('/{team}', [\App\Http\Controllers\AdminTeamController::class, 'update'])->name('update');
        Route::delete('/{team}', [\App\Http\Controllers\AdminTeamController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('citas')->name('citas.')->group(function () {
        Route::get('/', [\App\Http\Controllers\AdminInboxController::class, 'citas'])->name('index');
        Route::get('/exportar', [\App\Http\Controllers\AdminInboxController::class, 'exportCitas'])->name('export');
        Route::get('/{contact}', [\App\Http\Controllers\AdminInboxController::class, 'showCita'])->name('show');
        Route::put('/{contact}', [\App\Http\Controllers\AdminInboxController::class, 'updateCita'])->name('update');
    });

    Route::prefix('mensajes')->name('mensajes.')->group(function () {
        Route::get('/', [\App\Http\Controllers\AdminInboxController::class, 'mensajes'])->name('index');
        Route::get('/exportar', [\App\Http\Controllers\AdminInboxController::class, 'exportMensajes'])->name('export');
        Route::get('/{contact}', [\App\Http\Controllers\AdminInboxController::class, 'showMensaje'])->name('show');
        Route::put('/{contact}', [\App\Http\Controllers\AdminInboxController::class, 'updateMensaje'])->name('update');
    });

    Route::prefix('job-applications')->name('jobs.')->group(function () {
        Route::get('/', [\App\Http\Controllers\AdminInboxController::class, 'jobs'])->name('index');
        Route::get('/{job}', [\App\Http\Controllers\AdminInboxController::class, 'showJob'])->name('show');
        Route::put('/{job}', [\App\Http\Controllers\AdminInboxController::class, 'updateJob'])->name('update');
        Route::get('/{job}/download', [\App\Http\Controllers\AdminInboxController::class, 'downloadJob'])->name('download');
    });

    Route::prefix('internships')->name('internships.')->group(function () {
        Route::get('/', [\App\Http\Controllers\AdminInboxController::class, 'internships'])->name('index');
        Route::get('/{internship}', [\App\Http\Controllers\AdminInboxController::class, 'showInternship'])->name('show');
        Route::put('/{internship}', [\App\Http\Controllers\AdminInboxController::class, 'updateInternship'])->name('update');
        Route::get('/{internship}/download', [\App\Http\Controllers\AdminInboxController::class, 'downloadInternship'])->name('download');
    });

    Route::prefix('convenios')->name('convenios.')->group(function () {
        Route::get('/', [\App\Http\Controllers\AdminInboxController::class, 'convenios'])->name('index');
        Route::get('/{convenio}', [\App\Http\Controllers\AdminInboxController::class, 'showConvenio'])->name('show');
        Route::put('/{convenio}', [\App\Http\Controllers\AdminInboxController::class, 'updateConvenio'])->name('update');
        Route::get('/{convenio}/download', [\App\Http\Controllers\AdminInboxController::class, 'downloadConvenio'])->name('download');
    });

    Route::prefix('testimonials')->name('testimonials.')->group(function () {
        Route::get('/', [\App\Http\Controllers\AdminController::class, 'indexTestimonials'])
            ->name('index');
        Route::get('/create', [\App\Http\Controllers\AdminController::class, 'createTestimonial'])
            ->name('create');
        Route::post('/', [\App\Http\Controllers\AdminController::class, 'storeTestimonial'])
            ->name('store');
        Route::get('/{testimonial}/edit', [\App\Http\Controllers\AdminController::class, 'editTestimonial'])
            ->name('edit');
        Route::put('/{testimonial}', [\App\Http\Controllers\AdminController::class, 'updateTestimonial'])
            ->name('update');
        Route::delete('/{testimonial}', [\App\Http\Controllers\AdminController::class, 'destroyTestimonial'])
            ->name('destroy');
    });

    Route::prefix('uploads')->name('uploads.')->group(function () {
        Route::get('/', [\App\Http\Controllers\AdminController::class, 'indexUploads'])
            ->name('index');
        Route::get('/create', [\App\Http\Controllers\AdminController::class, 'createUpload'])
            ->name('create');
        Route::post('/', [\App\Http\Controllers\AdminController::class, 'storeUpload'])
            ->name('store');
        Route::get('/{upload}/edit', [\App\Http\Controllers\AdminController::class, 'editUpload'])
            ->name('edit');
        Route::put('/{upload}', [\App\Http\Controllers\AdminController::class, 'updateUpload'])
            ->name('update');
        Route::delete('/{upload}', [\App\Http\Controllers\AdminController::class, 'destroyUpload'])
            ->name('destroy');
        Route::get('/{upload}/download', [\App\Http\Controllers\AdminController::class, 'downloadUpload'])
            ->name('download');
    });

    Route::prefix('banners')->name('banners.')->group(function () {
        Route::get('/', [\App\Http\Controllers\AdminController::class, 'indexBanners'])
            ->name('index');
        Route::get('/create', [\App\Http\Controllers\AdminController::class, 'createBanner'])
            ->name('create');
        Route::post('/', [\App\Http\Controllers\AdminController::class, 'storeBanner'])
            ->name('store');
        Route::get('/{banner}/edit', [\App\Http\Controllers\AdminController::class, 'editBanner'])
            ->name('edit');
        Route::put('/{banner}', [\App\Http\Controllers\AdminController::class, 'updateBanner'])
            ->name('update');
        Route::delete('/{banner}', [\App\Http\Controllers\AdminController::class, 'destroyBanner'])
            ->name('destroy');
    });

    Route::prefix('media')->name('media.')->group(function () {
        Route::get('/', [\App\Http\Controllers\AdminController::class, 'indexMedia'])
            ->name('index');
        Route::get('/create', [\App\Http\Controllers\AdminController::class, 'createMedia'])
            ->name('create');
        Route::post('/', [\App\Http\Controllers\AdminController::class, 'storeMedia'])
            ->name('store');
        Route::get('/{media}/edit', [\App\Http\Controllers\AdminController::class, 'editMedia'])
            ->name('edit');
        Route::put('/{media}', [\App\Http\Controllers\AdminController::class, 'updateMedia'])
            ->name('update');
        Route::delete('/{media}', [\App\Http\Controllers\AdminController::class, 'destroyMedia'])
            ->name('destroy');
    });
});
