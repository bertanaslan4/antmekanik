<?php

use App\Http\Controllers\ProjectCtrl;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\ProjeListesi;
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





Route::get('/', 'Auth\AuthController@index')->name('login');//login ui
Route::post('/login', 'Auth\AuthController@login')->name('admin.post.login'); //login post methodu
Route::post('/userregister', 'Auth\AuthController@userregister')->name('admin.post.register'); //login post methodu
Route::get('/forgotpass', 'Auth\AuthController@forgotpass')->name('admin.forgotpass');
Route::post('/Sifremiunuttum', 'Auth\AuthController@Sifremiunuttum')->name('admin.Sifremiunuttum');
Route::get('/register', 'Auth\AuthController@register')->name('register');//login ui
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::group(
    ['prefix' =>LaravelLocalization::setLocale(),'middleware' =>['AuthControl',ProjeListesi::class,'localeSessionRedirect', 'localizationRedirect']],
    function () {

        Route::get('/logout','Auth\AuthController@logout')->name('admin.logout');//Çıkış işlemi
        Route::get('/dashboard','DashboardController@index')->name('admin.dashboard');//anasayfa işlemi
        Route::get('/project','ProjectController@index')->name('admin.project');//proje listeleme ve oluşturma
        Route::get('/proje','ProjectCtrl@index')->name('admin.proje');
        Route::post('/proje','ProjectCtrl@kaydet')->name('admin.projekaydet');
        Route::get('/projeliste/{id}','ProjeListeCtrl@projelistesi')->name('admin.projeliste');
        Route::post('/projeupdate','ProjectCtrl@update')->name('admin.projeupdate');
        Route::post('/projegec/{id}','ProjeListeCtrl@projegec')->name('admin.projegec');
        //boiler
        Route::get('/boiler','BoilerController@index')->name('admin.boiler');
        Route::post('/boiler/{boilerid?}','BoilerController@index')->name('admin.boiler');
        Route::get('/boilerhesapsonuc/{id}','BoilerController@ProjeDetay')->name('boilerhesapsonuc');
        Route::post('/boilerhesap/{edit?}/{id?}','BoilerController@boilerHesapla')->name('admin.boilerhesap');
        Route::post('/boilerhesapkaydet/{update?}/{id?}','BoilerController@boilerHesapkaydet')->name('admin.boilerhesapkaydet');
        Route::post('/boilerprojectdelete/{id}', 'BoilerController@destroy')->name('admin.boilerproject.destroy');
        Route::post('/boilerprojectdetail','BoilerController@boilerdetail')->name("admin.boilerdetail");

        Route::post('/pdfislemleri/{hesapturu}/{id}','ProjectController@pdfislemleri')->name('pdfislemleri');

        //burner
        Route::get('/burner','BurnerController@index')->name('admin.burner');
        Route::post('/burner/{burnerid?}','BurnerController@index')->name('admin.burner');
        Route::get('/burnerhesapsonuc/{id}','BurnerController@ProjeDetay')->name('burnerhesapsonuc');
        Route::post('/burnerhesap/{edit?}/{id?}','BurnerController@burnerhesap')->name('admin.burnerhesap');
        Route::post('/burnerhesapkaydet/{update?}/{id?}','BurnerController@burnerhesapkaydet')->name('admin.burnerhesapkaydet');
        Route::post('/burnerprojectdelete/{id}', 'BurnerController@burnerprojesil')->name('admin.burnerproject.sil');
        Route::post('/burnerprojectdetail','BurnerController@burnerdetail')->name("admin.burnerdetail");



        //fuel-amount
        Route::get('/fuelamount','FuelamountController@index')->name('admin.fuelamount');
        Route::post('/fuelamount/{fuelamountid?}','FuelamountController@index')->name('admin.fuelamount');
        Route::get('/fuelamounthesapsonuc/{id}','FuelamountController@ProjeDetay')->name('fuelamounthesapsonuc');
        Route::post('/fuelamounthesap/{edit?}/{id?}','FuelamountController@fuelamounthesap')->name('admin.fuelamounthesap');
        Route::post('/fuelamounthesapkaydet/{update?}/{id?}','FuelamountController@fuelamounthesapkaydet')->name('admin.fuelamounthesapkaydet');
        Route::post('/fuealamountprojectdetail','FuelamountController@fuelamoundetail')->name("admin.fuelamoundetail");
        Route::post('/fuelamountprojectdelete/{id}', 'FuelamountController@fuelamountprojesil')->name('admin.fuelamountproject.sil');

        //fuel-amount-yearly
        Route::get('/fuelamountyearly','FuelamountyearlyController@index')->name('admin.fuelamountyearly');
        Route::post('/fuelamountyearly/{fuelamountyearlyid?}','FuelamountyearlyController@index')->name('admin.fuelamountyearly');
        Route::get('/fuelamountyearlyhesapsonuc/{id}','FuelamountyearlyController@ProjeDetay')->name('fuelamountyearlyhesapsonuc');
        Route::post('/fuelamountyearlyhesap/{edit?}/{id?}','FuelamountyearlyController@fuelamountyearlyhesap')->name('admin.fuelamountyearlyhesap');
        Route::post('/fuelamountyearlyhesapkaydet/{update?}/{id?}','FuelamountyearlyController@fuelamountyearlyhesapkaydet')->name('admin.fuelamountyearlyhesapkaydet');
        Route::post('/fuealamountyearlyprojectdetail','FuelamountyearlyController@fuelamounyearlydetail')->name("admin.fuelamounyearlydetail");
        Route::post('/fuelamountyearlyprojectdelete/{id}', 'FuelamountyearlyController@fuelamountyearlyprojesil')->name('admin.fuelamountyearlyproject.sil');

        //open expansion
        Route::get('/openexpansion','OpenexpansiontankController@index')->name('admin.openexpansion');
        Route::post('/openexpansion/{openexpansionid?}','OpenexpansiontankController@index')->name('admin.openexpansion');
        Route::get('/openexpansionhesapsonuc/{id}','OpenexpansiontankController@ProjeDetay')->name('openexpansionhesapsonuc');
        Route::post('/openexpansiontankhesap/{edit?}/{id?}','OpenexpansiontankController@openexpansiontankhesap')->name('admin.openexpansionhesap');
        Route::post('/openexpansionhesapkaydet/{update?}/{id?}','OpenexpansiontankController@openexpansionhesapkaydet')->name('admin.openexpansionhesapkaydet');
        Route::post('/openexpansiondetail','OpenexpansiontankController@openexpansiondetail')->name("admin.openexpansiondetail");
        Route::post('/openexpansionprojectdelete/{id}', 'OpenexpansiontankController@openexpansionprojesil')->name('admin.openexpansionproject.sil');


        //close expansion
        Route::get('/closeexpansion','ClosedexpansiontankController@index')->name('admin.closeexpansion');
        Route::post('/closeexpansion/{closeexpansionid?}','ClosedexpansiontankController@index')->name('admin.closeexpansion');
        Route::get('/closeexpansionhesapsonuc/{id}','ClosedexpansiontankController@ProjeDetay')->name('closeexpansionhesapsonuc');
        Route::post('/closeexpansiontankhesap/{edit?}/{id?}','ClosedexpansiontankController@closeexpansiontankhesap')->name('admin.closeexpansionhesap');
        Route::post('/closeexpansionhesapkaydet/{update?}/{id?}','ClosedexpansiontankController@closeexpansionhesapkaydet')->name('admin.closeexpansionhesapkaydet');
        Route::post('/closeexpansiondetail','ClosedexpansiontankController@closeexpansiondetail')->name("admin.closeexpansiondetail");
        Route::post('/closeexpansionprojectdelete/{id}', 'ClosedexpansiontankController@closeexpansionprojesil')->name('admin.closeexpansionproject.sil');



        //circulationpumphesap
        Route::get('/circulationpump','CirculationpumpController@index')->name('admin.circulationpump');
        Route::post('/circulationpump/{circulationpumpid?}','CirculationpumpController@index')->name('admin.circulationpump');
        Route::get('/circulationpumphesapsonuc/{id}','CirculationpumpController@ProjeDetay')->name('circulationpumphesapsonuc');
        Route::post('/circulationpumphesap/{edit?}/{id?}','CirculationpumpController@circulationpumphesap')->name('admin.circulationpumphesap');
        Route::post('/circulationpumphesapkaydet/{update?}/{id?}','CirculationpumpController@circulationpumphesapkaydet')->name('admin.circulationpumphesapkaydet');
        Route::post('/circulationpumpdetail','CirculationpumpController@circulationpumpdetail')->name("admin.circulationpumpdetail");
        Route::post('/circulationpumpprojectdelete/{id}', 'CirculationpumpController@circulationpumpprojesil')->name('admin.circulationpumpproject.sil');

        //boyler
        Route::get('/boyler','BoylerController@index')->name('admin.boyler');
        Route::post('/boyler/{boylerid?}','BoylerController@index')->name('admin.boyler');
        Route::get('/boylerhesapsonuc/{id}','BoylerController@ProjeDetay')->name('boylerhesapsonuc');
        Route::post('/boylerhesap/{edit?}/{id?}','BoylerController@boylerhesap')->name('admin.boylerhesap');
        Route::post('/boylerhesapkaydet/{update?}/{id?}','BoylerController@boylerhesapkaydet')->name('admin.boylerhesapkaydet');
        Route::post('/boylerdetail','BoylerController@boylerdetail')->name("admin.boylerdetail");
        Route::post('/boylerprojectdelete/{id}', 'BoylerController@boylerprojesil')->name('admin.boylerproject.sil');

        //rainwater
        Route::get('/rainwater','RainwaterController@index')->name('admin.rainwater');
        Route::post('/rainwater/{rainwaterid?}','RainwaterController@index')->name('admin.rainwater');
        Route::get('/rainwatersonuc/{id}','RainwaterController@ProjeDetay')->name('rainwatersonuc');
        Route::post('/rainwaterhesap/{edit?}/{id?}','RainwaterController@rainwaterhesap')->name('admin.rainwaterhesap');
        Route::post('/rainwaterhesapkaydet/{update?}/{id?}','RainwaterController@rainwaterhesapkaydet')->name('admin.rainwaterhesapkaydet');
        Route::post('/rainwaterdetail','RainwaterController@rainwaterdetail')->name("admin.rainwaterdetail");
        Route::post('/rainwaterprojectdelete/{id}', 'RainwaterController@rainwaterprojesil')->name('admin.rainwaterproject.sil');

        //hydrophore
        Route::get('/hydrophore','HydrophoreController@index')->name('admin.hydrophore');
        Route::post('/hydrophore/{hydrophoreid?}','HydrophoreController@index')->name('admin.hydrophore');
        Route::get('/hydrophoresonuc/{id}','HydrophoreController@ProjeDetay')->name('hydrophoresonuc');
        Route::post('/hydrophorehesap/{edit?}/{id?}','HydrophoreController@hydrophorehesap')->name('admin.hydrophorehesap');
        Route::post('/hydrophorehesapkaydet/{update?}/{id?}','HydrophoreController@hydrophorehesapkaydet')->name('admin.hydrophorehesapkaydet');
        Route::post('/hydrophoredetail','HydrophoreController@hydrophoredetail')->name("admin.hydrophoredetail");
        Route::post('/hydrophoreprojectdelete/{id}', 'HydrophoreController@hydrophoreprojesil')->name('admin.hydrophoreproject.sil');

        //collector
        Route::get('/collector','CollectorController@index')->name('admin.collector');
        Route::post('/collector/{collectorid?}','CollectorController@index')->name('admin.collector');
        Route::get('/collectorsonuc/{id}','CollectorController@ProjeDetay')->name('collectorsonuc');
        Route::post('/collectorhesap/{edit?}/{id?}','CollectorController@collectorhesap')->name('admin.collectorhesap');
        Route::post('/collectorhesapkaydet/{update?}/{id?}','CollectorController@collectorhesapkaydet')->name('admin.collectorhesapkaydet');
        Route::post('/collectordetail','CollectorController@collectordetail')->name("admin.collectordetail");
        Route::post('/collectorprojectdelete/{id}', 'CollectorController@collectorprojesil')->name('admin.collectorproject.sil');

        //solarenergy
        Route::get('/solarenergy','SolarenergyController@index')->name('admin.solarenergy');
        Route::post('/solarenergy/{solarenergyid?}','SolarenergyController@index')->name('admin.solarenergy');
        Route::get('/solarenergysonuc/{id}','SolarenergyController@ProjeDetay')->name('solarenergyhesapsonuc');
        Route::post('/solarenergyhesap/{edit?}/{id?}','SolarenergyController@solarenergyhesap')->name('admin.solarenergyhesap');
        Route::post('/solarenergyhesapkaydet/{update?}/{id?}','SolarenergyController@solarenergyhesapkaydet')->name('admin.solarenergyhesapkaydet');
        Route::post('/solarenergydetail','SolarenergyController@solarenergydetail')->name("admin.solarenergydetail");
        Route::post('/solarenergyprojectdelete/{id}', 'SolarenergyController@solarenergyprojesil')->name('admin.solarenergyproject.sil');
        //paddlebox
        Route::get('/paddlebox','PaddleboxController@index')->name('admin.paddlebox');
        Route::post('/paddlebox/{paddleboxid?}','PaddleboxController@index')->name('admin.paddlebox');
        Route::get('/paddleboxhesapsonuc/{id}','PaddleboxController@ProjeDetay')->name('paddleboxhesapsonuc');
        Route::post('/paddleboxhesap/{edit?}/{id?}','PaddleboxController@paddleboxhesap')->name('admin.paddleboxhesap');
        Route::post('/paddleboxhesapkaydet/{update?}/{id?}','PaddleboxController@paddleboxhesapkaydet')->name('admin.paddleboxhesapkaydet');
        Route::post('/paddleboxdetail','PaddleboxController@paddleboxdetail')->name("admin.paddleboxdetail");
        Route::post('/paddleboxprojectdelete/{id}', 'PaddleboxController@paddleboxprojesil')->name('admin.paddleboxproject.sil');
        //pool
        Route::get('/pool','PoolController@index')->name('admin.pool');
        Route::post('/pool/{poolid?}','PoolController@index')->name('admin.pool');
        Route::get('/poolhesapsonuc/{id}','PoolController@ProjeDetay')->name('poolhesapsonuc');
        Route::post('/poolhesap/{edit?}/{id?}','PoolController@poolhesap')->name('admin.poolhesap');
        Route::post('/poolhesapkaydet/{update?}/{id?}','PoolController@poolhesapkaydet')->name('admin.poolhesapkaydet');
        Route::post('/pooldetail','PoolController@pooldetail')->name("admin.pooldetail");
        Route::post('/poolprojectdelete/{id}', 'PoolController@poolprojesil')->name('admin.poolproject.sil');

        //pipeinsulation
        Route::get('/pipeinsulation','PipeinsulationController@index')->name('admin.pipeinsulation');
        Route::post('/pipeinsulation/{pipeinsulationid?}','PipeinsulationController@index')->name('admin.pipeinsulation');
        Route::get('/pipeinsulationhesapsonuc/{id}','PipeinsulationController@ProjeDetay')->name('pipeinsulationhesapsonuc');
        Route::post('/pipeinsulationhesap/{edit?}/{id?}','PipeinsulationController@pipeinsulationhesap')->name('admin.pipeinsulationhesap');
        Route::post('/pipeinsulationhesapkaydet/{update?}/{id?}','PipeinsulationController@pipeinsulationhesapkaydet')->name('admin.pipeinsulationhesapkaydet');
        Route::post('/pipeinsulationdetail','PipeinsulationController@pipeinsulationdetail')->name("admin.pipeinsulationdetail");
        Route::post('/pipeinsulationprojectdelete/{id}', 'PipeinsulationController@pipeinsulationprojesil')->name('admin.pipeinsulationproject.sil');

        //coldstorage
        Route::get('/coldstorage','ColdstorageController@index')->name('admin.coldstorage');
        Route::get('/coldstoragehesapsonuc/{id}','ColdstorageController@ProjeDetay')->name('coldstoragehesapsonuc');
        Route::post('/coldstorage/{coldstorageid?}','ColdstorageController@index')->name('admin.coldstorage');
        Route::post('/coldstoragehesap/{edit?}/{id?}','ColdstorageController@coldstoragehesap')->name('admin.coldstoragehesap');
        Route::post('/coldstoragehesapkaydet/{update?}/{id?}','ColdstorageController@coldstoragehesapkaydet')->name('admin.coldstoragehesapkaydet');
        Route::post('/coldstoragedetail','ColdstorageController@coldstoragedetail')->name("admin.coldstoragedetail");
        Route::post('/coldstorageprojectdelete/{id}', 'ColdstorageController@coldstorageprojesil')->name('admin.coldstorageproject.sil');

        //parkingventilation
        Route::get('/parkingventilation','ParkingventilationController@index')->name('admin.parkingventilation');
        Route::get('/parkingventilationhesapsonuc/{id}','ParkingventilationController@ProjeDetay')->name('parkingventilationhesapsonuc');
        Route::post('/parkingventilation/{parkingventilationid?}','ParkingventilationController@index')->name('admin.parkingventilation');
        Route::post('/parkingventilationhesap/{edit?}/{id?}','ParkingventilationController@parkingventilationhesap')->name('admin.parkingventilationhesap');
        Route::post('/parkingventilationhesapkaydet/{update?}/{id?}','ParkingventilationController@parkingventilationhesapkaydet')->name('admin.parkingventilationhesapkaydet');
        Route::post('/parkingventilationdetail','ParkingventilationController@parkingventilationdetail')->name("admin.parkingventilationdetail");
        Route::post('/parkingventilationprojectdelete/{id}', 'ParkingventilationController@parkingventilationprojesil')->name('admin.parkingventilationproject.sil');


        //shelterventilation
        Route::get('/shelterventilation','ShelterventilationController@index')->name('admin.shelterventilation');
        Route::get('/shelterventilationhesapsonuc/{id}','ShelterventilationController@ProjeDetay')->name('shelterventilationhesapsonuc');
        Route::post('/shelterventilation/{shelterventilationid?}','ShelterventilationController@index')->name('admin.shelterventilation');
        Route::post('/shelterventilationhesap/{edit?}/{id?}','ShelterventilationController@shelterventilationhesap')->name('admin.shelterventilationhesap');
        Route::post('/shelterventilationhesapkaydet/{update?}/{id?}','ShelterventilationController@shelterventilationhesapkaydet')->name('admin.shelterventilationhesapkaydet');
        Route::post('/shelterventilationdetail','ShelterventilationController@shelterventilationdetail')->name("admin.shelterventilationdetail");
        Route::post('/shelterventilationprojectdelete/{id}', 'ShelterventilationController@shelterventilationprojesil')->name('admin.shelterventilationproject.sil');


        //pipepressure
        Route::get('/pipepressure','PipepressurelossController@index')->name('admin.pipepressure');
        Route::get('/pipepressurehesapsonuc/{id}','PipepressurelossController@ProjeDetay')->name('pipepressurehesapsonuc');
        Route::post('/pipepressure/{pipepressurelossid?}','PipepressurelossController@index')->name('admin.pipepressure');

        Route::post('/pipepressurehesap/{edit?}/{id?}','PipepressurelossController@pipepressurehesap')->name('admin.pipepressurehesap');
        Route::post('/pipepressurehesapkaydet/{update?}/{id?}','PipepressurelossController@pipepressurehesapkaydet')->name('admin.pipepressurehesapkaydet');
        Route::post('/pipepressuredetail','PipepressurelossController@pipepressuredetail')->name("admin.pipepressuredetail");
        Route::post('/pipepressureprojectdelete/{id}', 'PipepressurelossController@pipepressureprojesil')->name('admin.pipepressureproject.sil');

        //heatexchanger
        Route::get('/heatexchanger','HeatexchangerController@index')->name('admin.heatexchanger');
        Route::post('/heatexchanger/{heatexchangerid?}','HeatexchangerController@index')->name('admin.heatexchanger');//
        Route::get('/heatexchangerhesapsonuc/{id}','HeatexchangerController@ProjeDetay')->name('heatexchangerhesapsonuc');
        Route::post('/heatexchangerhesap/{edit?}/{id?}','HeatexchangerController@heatexchangerhesap')->name('admin.heatexchangerhesap');//
        Route::post('/heatexchangerhesapkaydet/{update?}/{id?}','HeatexchangerController@heatexchangerhesapkaydet')->name('admin.heatexchangerhesapkaydet');
        Route::post('/heatexchangerdetail','HeatexchangerController@heatexchangerdetail')->name("admin.heatexchangerdetail");
        Route::post('/heatexchangerprojectdelete/{id}', 'HeatexchangerController@heatexchangerprojesil')->name('admin.heatexchangerproject.sil');

        //borucapi
        Route::get('/borucapi','BoruHesabiController@index')->name('admin.borucapi');
        Route::post('/boruhesap','BoruHesabiController@hesap')->name('admin.boruhesap');

        //settings işlemleri
        Route::get('/defaultvariable','SettingsController@sabitdegiskenler')->name('admin.defaultvariable');
        Route::post('/defaultvariable-update','SettingsController@updateconst')->name('admin.updateconst');
        //customer işlemleri
        Route::get('/customer','CustomerController@index')->name('admin.customer');
        Route::post('/customercreate','CustomerController@create')->name('admin.customercreate');
        Route::post('/customeredit/{id?}','CustomerController@edit')->name('admin.customeredit');
        Route::post('/customerupdate/{id?}','CustomerController@update')->name('admin.customerupdate');
        Route::post('/customerdelete/{id}','CustomerController@delete')->name('admin.customerdelete');


        //profile işlemleri
        Route::get('/profile','ProfileController@index')->name('admin.profile');
        Route::post('/profilecreate','ProfileController@create')->name('admin.profilecreate');






    }
);
