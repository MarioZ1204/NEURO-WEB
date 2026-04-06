<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('templates/landing');
})->name('landing.inicio');

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

// Ruta de contacto PQRS
Route::post('/contact/send', [LandingController::class, 'sendContact'])
    ->name('contact.send');

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

// Trabaje con Nosotros
Route::get('/trabaje-con-nosotros/hoja-de-vida', [LandingController::class, 'hojaDeVida'])
    ->name('trabaje.hojaDeVida');
Route::post('/trabaje-con-nosotros/hoja-de-vida/enviar', [LandingController::class, 'sendHojaDeVida'])
    ->name('trabaje.hojaDeVida.send');
Route::get('/trabaje-con-nosotros/practicas', [LandingController::class, 'practicas'])
    ->name('trabaje.practicas');
Route::post('/trabaje-con-nosotros/practicas/enviar', [LandingController::class, 'sendPracticas'])
    ->name('trabaje.practicas.send');
Route::get('/trabaje-con-nosotros/convenio-institucional', [LandingController::class, 'convenioInstitucional'])
    ->name('trabaje.convenio');
Route::post('/trabaje-con-nosotros/convenio-institucional/enviar', [LandingController::class, 'sendConvenio'])
    ->name('trabaje.convenio.send');

// Páginas del FAB
Route::get('/escribanos', [LandingController::class, 'escribanos'])
    ->name('escribanos');
Route::post('/escribanos/enviar', [LandingController::class, 'sendEscribanos'])
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
