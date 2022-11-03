<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AtestadoController;
use App\Http\Controllers\AdvertenciaController;
use App\Http\Controllers\BolsaController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\DependenteController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FeriasController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\PsiController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\SkillController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//rotas para edicao >> funcionarios
Route::post('/atestados/{atestado}/edit', [AtestadoController::class, 'edit']);
Route::post('/advertencias/{advertencia}/edit', [AdvertenciaController::class, 'edit']);
Route::post('/bolsas/{bolsa}/edit', [BolsaController::class, 'edit']);
Route::post('/dependentes/{dependente}/edit', [DependenteController::class, 'edit']);
Route::post('/feedbacks/{feedback}/edit', [FeedbackController::class, 'edit']);
Route::post('/ferias/{feria}/edit', [FeriasController::class, 'edit']);
Route::post('/funcionarios/{funcionario}/edit', [FuncionarioController::class, 'edit']);
Route::post('/skills/{skill}/edit', [SkillController::class, 'edit']);
Route::post('/skfs/{skf}/edit', [SkilFuncionarioController::class, 'edit']);

//rotas para edicao >> empresa
Route::post('/cargos/{cargo}/edit', [CargoController::class, 'edit']);
Route::post('/psis/{psi}/edit', [PsiController::class, 'edit']);
Route::post('/setores/{setor}/edit', [SetorController::class, 'edit']);

//rotas padrao >> funcionarios
Route::resource('/atestados', AtestadoController::class);
Route::resource('/advertencias', AdvertenciaController::class);
Route::resource('/bolsas', BolsaController::class);
Route::resource('/dependentes', DependenteController::class);
Route::resource('/feedbacks', FeedbackController::class);
Route::resource('/ferias', FeriasController::class);
Route::resource('/funcionarios', FuncionarioController::class);
Route::resource('/skills', SkillController::class);
Route::resource('/skfs', SkilFuncionarioController::class);

//rotas padrao >> empresa
Route::resource('/cargos', CargoController::class);
Route::resource('/psis', PsiController::class);
Route::resource('/setores', SetorController::class);



//rotas de relatorios
Route::get('/advertencias/report', [AdvertenciaController::class, 'report']);

//rotas de relatorios teste filipe
//Route::get('/report/bolsas', [RelatorioController::class, 'reportBolsas']);

Route::get('/report/bolsas', [App\Http\Controllers\RelatorioController::class, 'reportBolsas'])->name('reportBolsas');
Route::get('/report/advertencias', [App\Http\Controllers\RelatorioController::class, 'reportAdv'])->name('reportAdv');
Route::get('/report/salarios', [App\Http\Controllers\RelatorioController::class, 'reportPay'])->name('reportPay');
Route::get('/report/funcsetor', [App\Http\Controllers\RelatorioController::class, 'reportFSetor'])->name('reportFSetor');
Route::get('/report/dependentes', [App\Http\Controllers\RelatorioController::class, 'reportDepend'])->name('reportDepend');
Route::get('/report/ferias', [App\Http\Controllers\RelatorioController::class, 'reportFerias'])->name('reportFerias');

Route::get('/report/aniversariantes', [App\Http\Controllers\RelatorioController::class, 'reportAniv'])->name('reportAniv');
Route::get('/report/acasa', [App\Http\Controllers\RelatorioController::class, 'reportCasa'])->name('reportCasa');


Route::get('/report/feedback', [App\Http\Controllers\RelatorioController::class, 'reportFeed'])->name('reportFeed');

Route::get('/report/hpsi', [App\Http\Controllers\RelatorioController::class, 'reportHPsi'])->name('reportHPsi');

Route::get('/report/psiaberto', [App\Http\Controllers\RelatorioController::class, 'reportPsiAberto'])->name('reportPsiAberto');
Route::get('/report/fskils', [App\Http\Controllers\RelatorioController::class, 'reportFSkil'])->name('reportFSkil');

