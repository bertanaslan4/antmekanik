<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

use App\Models\Boiler;
use App\Models\Heatexchanger;
//
use App\Models\Boyler;
use App\Models\Burner;
use App\Models\Circulationpump;
use App\Models\Closedexpansiontank;
use App\Models\Coldstorage;
use App\Models\Collector;
use App\Models\Fuelamount;
use App\Models\Fuelamountyearly;
use App\Models\Hydrophore;
use App\Models\Openexpansiontank;
use App\Models\Paddlebox;
use App\Models\Parkingventilation;
use App\Models\Pipeinsulation;
use App\Models\Pipepressureloss;
use App\Models\Pool;
use App\Models\Rainwater;
use App\Models\Shelterventilation;
use App\Models\Solarenergy;
use App\Models\Settings;




//
use App\Models\Project;
use App\Models\Projeler;
use App\Models\ProjelerListe;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\View;

class ProjeListesi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // $sonproje=ProjelerListe::sonProje($request);
        // session(
        //             [

        //                 'proje_id'=>$sonproje[0]->id,
        //             ]
        //         );
        $res_data = Project::Listele($request);
        $boiler_project = Boiler::BoilerProjeListele($request);
        $heatexchanger_project = Heatexchanger::heatexchangerProjeListele($request);
        //
        $Boyler = Boyler::boylerProjeListele($request);




        $Burner = Burner::BurnerProjeListele($request);
        $Circulationpump = Circulationpump::circulationpumpProjeListele($request);
        $Closedexpansiontank = Closedexpansiontank::closeexpansionProjeListele($request);
        $Coldstorage = Coldstorage::coldstorageProjeListele($request);
        $Collector = Collector::collectorProjeListele($request);
        $Fuelamount = Fuelamount::FuelAmountListele($request);
        $Fuelamountyearly = Fuelamountyearly::FuelAmountyearlyListele($request);
        $Hydrophore = Hydrophore::hydrophoreProjeListele($request);
        $Openexpansiontank = Openexpansiontank::openexpansionProjeListele($request);
        $Paddlebox = Paddlebox::paddleboxProjeListele($request);
        $Parkingventilation = Parkingventilation::parkingventilationProjeListele($request);
        $Pipeinsulation = Pipeinsulation::pipeinsulationProjeListele($request);
        $Pipepressureloss = Pipepressureloss::pipepressureProjeListele($request);
        $Pool = Pool::poolProjeListele($request);
        $Rainwater = Rainwater::rainwaterProjeListele($request);
        $Shelterventilation = Shelterventilation::shelterventilationProjeListele($request);
        $Solarenegery = Solarenergy::solarenergyProjeListele($request);
        $defaultdeger = Settings::defaultvariable($request);
        $projelerliste = Projeler::projelerliste($request);
        $bakiye = User::bakiye($request);


       $project_boiler=ProjelerListe::project_boiler($request);
       $project_heatexchanger=ProjelerListe::project_heatexchanger($request);
       $project_fuelamount=ProjelerListe::project_fuelamount($request);
       $project_fuelamountyearly=ProjelerListe::project_fuelamountyearly($request);
       $project_openexpansion=ProjelerListe::project_openexpansion($request);
       $project_closeexpansion=ProjelerListe::project_closeexpansion($request);
       $project_circulationpump=ProjelerListe::project_circulationpump($request);
       $project_boyler=ProjelerListe::project_boyler($request);
       $project_rainwater=ProjelerListe::project_rainwater($request);
       $project_hydrophore=ProjelerListe::project_hydrophore($request);
       $project_collector=ProjelerListe::project_collector($request);
       $project_solar=ProjelerListe::project_solarenergy($request);
       $project_paddle=ProjelerListe::project_paddle($request);
       $project_pool=ProjelerListe::project_pool($request);
       $project_coldstorage=ProjelerListe::project_coldstorage($request);
       $project_pipeinstulation=ProjelerListe::project_pipeinsulation($request);
       $project_parking=ProjelerListe::project_parking($request);
       $project_shelter=ProjelerListe::project_shelter($request);
       $project_pipepressure=ProjelerListe::project_pipepressure($request);
        //dd($res_data["data"][10]);
        View::share('bakiye',$bakiye);
        View::share('projelerliste',$projelerliste);
        View::share('project_boiler',$project_boiler);
        View::share('project_heatexchanger',$project_heatexchanger);
        View::share('project_fuelamount',$project_fuelamount);
        View::share('project_fuelamountyearly',$project_fuelamountyearly);
        View::share('project_openexpansion',$project_openexpansion);
        View::share('project_closeexpansion',$project_closeexpansion);
        View::share('project_circulationpump',$project_circulationpump);
        View::share('project_boyler',$project_boyler);
        View::share('project_rainwater',$project_rainwater);
        View::share('project_hydrophore',$project_hydrophore);
        View::share('project_collector',$project_collector);
        View::share('project_solar',$project_solar);
        View::share('project_paddle',$project_paddle);
        View::share('project_pool',$project_pool);
        View::share('project_coldstorage',$project_coldstorage);
        View::share('project_pipeinsulation',$project_pipeinstulation);
        View::share('project_parking',$project_parking);
        View::share('project_shelter',$project_shelter);
        View::share('project_pipepressure',$project_pipepressure);






        View::share('boiler_project',$boiler_project);
        View::share('heatexchanger_project',$heatexchanger_project);
        //
        View::share('boyler_project',$Boyler);
        View::share('burner_project',$Burner);
        View::share('circulationpump_project',$Circulationpump);
        View::share('closedexpansiontank_project',$Closedexpansiontank);
        View::share('coldstorage_project',$Coldstorage);
        View::share('collector_project',$Collector);
        View::share('fuelamount_project',$Fuelamount);
        View::share('fuelamoutyearly_project',$Fuelamountyearly);
        View::share('hydrophore_project',$Hydrophore);
        View::share('openexpansiontank_project',$Openexpansiontank);
        View::share('paddlebox_project',$Paddlebox);
        View::share('parkingventilation_project',$Parkingventilation);
        View::share('pipeinsulation_project',$Pipeinsulation);
        View::share('pipepressureloss_project',$Pipepressureloss);
        View::share('pool_project',$Pool);
        View::share('rainwater_project',$Rainwater);
        View::share('shelterventilation',$Shelterventilation);
        View::share('solarenergy',$Solarenegery);
        View::share('defaultdd',$defaultdeger);
        //


        View::share('res_data',$res_data);
        return $next($request);
    }
}
