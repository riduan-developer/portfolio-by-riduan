<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\FrontMaster\HeroController;
use App\Http\Controllers\Admin\FrontMaster\AboutController;
use App\Http\Controllers\Admin\FrontMaster\ServiceController;
use App\Http\Controllers\frontEnd\FrontEndController;
use App\Http\Controllers\Admin\FrontMaster\SkillController;
use App\Http\Controllers\Admin\FrontMaster\PortfolioController;
use App\Http\Controllers\Admin\FrontMaster\ResumeController;
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

Route::get('/', [FrontEndController::class, 'index'])->name('website');




// admin route

Route::get('/admin/login', function () {
    return view('backEnd.auth.login');
})->name('admin_login');


Route::get('/admin/register/portfolio/riduan/rahman/developer/', function () {
    return view('backEnd.auth.register');
})->name('admin_register');



Auth::routes();

Route::get('/admin/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin/form/layout', [HomeController::class, 'form_layout'])->name('form_layout');
Route::get('/admin/table/layout', [HomeController::class, 'table_layout'])->name('table_layout');


/*
    **********
    ROUTE FOR FRONT END FILE MASTERING THROUGH ADMIN DASHBOARD 
    **********
*/



// ADMIN MASTERING HERO ROUTE 

Route::get('/admin/mastering/frontEnd/hero', [HeroController::class, 'index'])->name('hero');
Route::post('/admin/mastering/frontEnd/hero/add/new', [HeroController::class, 'add_hero'])->name('add_hero');

Route::get('/admin/mastering/frontEnd/hero/update/{id}', [HeroController::class, 'hero_update'])->name('hero_update');
Route::post('/admin/mastering/frontEnd/hero/update/{id}', [HeroController::class, 'hero_update_post'])->name('hero_update_post');

Route::get('/admin/mastering/frontEnd/hero/status/change/{id}', [HeroController::class, 'hero_status'])->name('hero_status');
Route::get('/admin/mastering/frontEnd/hero/delete/{id}', [HeroController::class, 'hero_delete'])->name('hero_delete');



// ADMIN MASTERING ABOUT ROUTE
 
Route::get('/admin/mastering/frontEnd/about', [AboutController::class, 'index'])->name('about');
Route::post('/admin/mastering/frontEnd/about/add/new', [AboutController::class, 'add_about'])->name('add_about');

Route::get('/admin/mastering/frontEnd/about/update/{id}', [AboutController::class, 'about_update'])->name('about_update');
Route::post('/admin/mastering/frontEnd/about/update/{id}', [AboutController::class, 'about_update_post'])->name('about_update_post');

Route::get('/admin/mastering/frontEnd/about/status/change/{id}', [AboutController::class, 'about_status'])->name('about_status');
Route::get('/admin/mastering/frontEnd/about/delete/{id}', [AboutController::class, 'about_delete'])->name('about_delete');



// ADMIN MASTERING SERVICE ROUTE
 
Route::get('/admin/mastering/frontEnd/service', [ServiceController::class, 'index'])->name('service');
Route::post('/admin/mastering/frontEnd/service/add/new', [ServiceController::class, 'add_service'])->name('add_service');


Route::get('/admin/mastering/frontEnd/service/update/{id}', [ServiceController::class, 'service_update'])->name('service_update');
Route::post('/admin/mastering/frontEnd/service/update/{id}', [ServiceController::class, 'service_update_post'])->name('service_update_post');

Route::get('/admin/mastering/frontEnd/service/status/change/{id}', [ServiceController::class, 'service_status'])->name('service_status');
Route::get('/admin/mastering/frontEnd/service/delete/{id}', [ServiceController::class, 'service_delete'])->name('service_delete');




Route::controller(SkillController::class)
    ->prefix('/admin/mastering/frontEnd/')
    ->group(function(){

    Route::any('skill', 'index')->name('skill');
    Route::post('add/skill', 'add_skill')->name('add_skill');
    Route::get('skill/status/{id}','skill_status')->name('skill_status');
    Route::get('skill/update/{id}','skill_update')->name('skill_update');
    Route::post('skill/update/{id}','skill_update_post')->name('skill_update_post');
    Route::get('skill/delete/{id}','delete_update')->name('delete_update');


    });

Route::controller(PortfolioController::class)
        ->prefix('/admin/mastering/frontEnd/')
        ->group(function(){

    Route::any('portfolio', 'index')->name('portfolio');
    Route::post('add/potfolio', 'add_potfolio')->name('add_potfolio');
    Route::get('portfolio/status/{id}','portfolio_status')->name('portfolio_status');
    Route::get('portfolio/update/{id}','portfolio_update')->name('portfolio_update');
    Route::post('portfolio/update/{id}','portfolio_update_post')->name('portfolio_update_post');
    Route::any('portfolio/delete/{id}', 'del_portfolio')->name('del_portfolio');
});

Route::get('project/{project_link}', 'PortfolioController@link_url')->name('link_url');


Route::controller(ResumeController::class)
        ->prefix('/admin/mastering/frontEnd/')
        ->group(function(){

    Route::any('resume', 'index')->name('resume');
    Route::post('add/resume', 'add_resume')->name('add_resume');
    Route::get('resume/status/{id}','resume_status')->name('resume_status');
    Route::get('resume/update/{id}','resume_update')->name('resume_update');
    Route::post('resume/update/{id}','resume_update_post')->name('resume_update_post');
    Route::get('resume/delete/{id}','resume_delete')->name('resume_delete');


});