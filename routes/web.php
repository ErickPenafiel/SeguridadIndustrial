<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrabajadorController;
use App\Http\Controllers\CapacitacionController;
use App\Http\Controllers\DotacionEPPController;
use App\Http\Controllers\AccidenteController;
use App\Http\Controllers\MonitoreoController;
use App\Http\Controllers\ComiteMixtoController;
use App\Http\Controllers\AuditoriaController;
use App\Http\Controllers\MantenimientoMaquinariaController;
use App\Http\Controllers\FotoAuditoriaController;
use App\Http\Controllers\ExamenMedicoController;
use App\Http\Controllers\FotoMonitoreoController;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\MaquinariaController;
use App\Http\Controllers\ListaController;
use App\Http\Controllers\DetalleDotacionController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\HistorialComiteController;
use App\Http\Controllers\ReunionComiteController;
use App\Http\Controllers\ListaCapacitacionController;
use App\Http\Controllers\DetalleCapacitacionController;
use App\Http\Controllers\ControlSeguridadController;
use App\Http\Controllers\IperController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
    // return view('auth-login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('trabajador', TrabajadorController::class);
    Route::resource('capacitacion', CapacitacionController::class);
    Route::resource('dotacionepp', DotacionEPPController::class);
    Route::resource('detalleDotacion', DetalleDotacionController::class);
    Route::resource('detalleCapacitacion', DetalleCapacitacionController::class);
    Route::resource('controlseguridad', ControlSeguridadController::class);
    Route::resource('accidente', AccidenteController::class);
    Route::resource('monitoreo', MonitoreoController::class);
    Route::resource('comiteMixto', ComiteMixtoController::class);
    Route::resource('auditoria', AuditoriaController::class);
    Route::resource('mantenimiento', MantenimientoMaquinariaController::class);
    Route::resource('insumo', InsumoController::class);
    Route::resource('maquinaria', MaquinariaController::class);

    Route::get('auditoria/{auditorium}/fotos', [AuditoriaController::class, 'fotos'])->name('auditoria.fotos');
    Route::post('fotoauditoria/{auditoria_id}', [FotoAuditoriaController::class, 'store'])->name('fotoauditoria.store');
    Route::delete('fotoauditoria/{fotoAuditoria}', [FotoAuditoriaController::class, 'destroy'])->name('fotoauditoria.destroy');

    Route::get('trabajador/{trabajador}/examenes', [TrabajadorController::class, 'examenes'])->name('trabajador.examenes');
    Route::post('examenes/{trabajador_id}', [ExamenMedicoController::class, 'store'])->name('examenes.store');
    Route::delete('examenes/{examenMedico}', [ExamenMedicoController::class, 'destroy'])->name('examenes.destroy');

    Route::get('monitoreo/{monitoreo}/fotos', [MonitoreoController::class, 'fotos'])->name('monitoreo.fotos');
    Route::post('fotomonitoreo/{monitoreo_id}', [FotoMonitoreoController::class, 'store'])->name('fotomonitoreo.store');
    Route::delete('fotomonitoreo/{fotoMonitoreo}', [FotoMonitoreoController::class, 'destroy'])->name('fotomonitoreo.destroy');

    Route::get('accidentes/grafico', [AccidenteController::class, 'grafico'])->name('accidente.grafico');
    Route::get('/capacitaciones/grafico', [CapacitacionController::class, 'grafico'])->name('capacitacion.grafico');

    Route::get('dotacionepp/{dotacionepp}/lista', [DotacionEPPController::class, 'lista'])->name('dotacionepp.lista');
    Route::get('dotacionepp/{dotacionepp}/detalle', [DotacionEPPController::class, 'verDetalle'])->name('dotacionepp.detalle');
    
    Route::get('/agregar/{insumo}', [ListaController::class, 'agregarLista'])->name('lista.agregar');
    Route::get('/eliminar', [ListaController::class, 'eliminarLista'])->name('lista.eliminar');
    Route::get('/eliminarElemento', [ListaController::class, 'eliminarElemento'])->name('lista.eliminarElemento');

    Route::get('/registrarInsumos/{dotacion}', [DetalleDotacionController::class, 'registrarInsumos'])->name('detalleDotacion.registrarInsumos');

    Route::get('marcarLeidas', function(){
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    })->name('marcarLeidas');

    Route::get('/notificaciones', [NotificacionController::class, 'index'])->name('notificaciones.index');
    Route::post('/markAsRead', [NotificacionController::class, 'markAsRead'])->name('notificaciones.markAsRead');

    Route::get('comiteMixto/{comiteMixto}/historial', [ComiteMixtoController::class, 'historial'])->name('comiteMixto.historial');
    Route::delete('historialComite/{historialComite}', [HistorialComiteController::class, 'destroy'])->name('historialComite.destroy');

    Route::get('comiteMixto/{comiteMixto}/reuniones', [ComiteMixtoController::class, 'reuniones'])->name('comiteMixto.reuniones');

    Route::resource('reunionComite', ReunionComiteController::class);

    Route::get('capacitacion/{capacitacion}/lista', [CapacitacionController::class, 'lista'])->name('capacitacion.lista');
    Route::get('/agregarTrabajador/{trabajador}', [ListaCapacitacionController::class, 'agregarTrabajador'])->name('listacapacitacion.agregar');
    Route::get('/eliminarLista', [ListaCapacitacionController::class, 'eliminarListaCapacitacion'])->name('listacapacitacion.eliminar');
    Route::get('/eliminartrabajador', [ListaCapacitacionController::class, 'eliminarTrabajador'])->name('listacapacitacion.eliminarTrabajador');
    Route::get('/registrarTrabajador/{capacitacion}', [DetalleCapacitacionController::class, 'registrarTrabajadores'])->name('detalleCapacitacion.registrarTrabajadores');
    Route::get('capacitacion/{capacitacion}/detalle', [CapacitacionController::class, 'verDetalle'])->name('capacitacion.detalle');

    Route::get('accidentes/plan', function(){
        return view('accidente.plan');
    })->name('accidente.plan');

    Route::resource('iper', IperController::class);
    Route::get('iper/{area}/area', [IperController::class, 'area'])->name('iper.area');

    Route::get('/pdf_trabajador', [TrabajadorController::class, 'pdf'])->name('trabajador.pdf');
    Route::get('/pdf_accidente', [AccidenteController::class, 'pdf'])->name('accidente.pdf');
    Route::get('/pdf_auditoria', [AuditoriaController::class, 'pdf'])->name('auditoria.pdf');
    Route::get('/pdf_capacitacion', [CapacitacionController::class, 'pdf'])->name('capacitacion.pdf');
    Route::get('/pdf_comitemixto', [ComiteMixtoController::class, 'pdf'])->name('comiteMixto.pdf');
    Route::get('/pdf_controlseguridad', [ControlSeguridadController::class, 'pdf'])->name('controlseguridad.pdf');
    Route::get('/pdf_dotacionepp', [DotacionEPPController::class, 'pdf'])->name('dotacionepp.pdf');
    Route::get('/pdf_insumo', [InsumoController::class, 'pdf'])->name('insumo.pdf');
    Route::get('/pdf_iper', [IperController::class, 'pdf'])->name('iper.pdf');
    Route::get('/pdf_mantenimiento', [MantenimientoMaquinariaController::class, 'pdf'])->name('mantenimiento.pdf');
    Route::get('/pdf_maquinaria', [MaquinariaController::class, 'pdf'])->name('maquinaria.pdf');
    Route::get('/pdf_monitoreo', [MonitoreoController::class, 'pdf'])->name('monitoreo.pdf');
    Route::get('pdf_detallecapacitacion/{capacitacion}', [DetalleCapacitacionController::class, 'pdf'])->name('detalleCapacitacion.pdf');
    Route::get('pdf_detalledotacion/{dotacion}', [DetalleDotacionController::class, 'pdf'])->name('detalleDotacion.pdf');
});
