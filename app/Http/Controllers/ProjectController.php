<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Project;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade as PDF;
class ProjectController extends Controller
{


  
    public function pdfislemleri($hesapturu="",$id=0,Request $request)
    {
        try {
            if(!empty($hesapturu) && !empty($id))
            {
                switch ($hesapturu) {

                    case "boiler":
                        $req = array("projeid"=>$id);
                        $boiler_detail = Project::BoilerProjectDetayPdf($request,$id);
                        
                       
                        view()->share('items',$boiler_detail);
                        /*if($request->has('download')){
                            $pdf = PDF::loadView('Hesaplar/boilerkazan');
                            return $pdf->download('pdfview.pdf');
                        }*/
                        return view('Hesaplar.boilerkazan');

                        break;
                    case "burner":
                        $req = array("projeid"=>$id);
                        $burner_detail = Project::BurnerProjectDetayPdf($request,$id);
                        view()->share('items',$burner_detail);
                        /*if($request->has('download')){
                            $pdf = PDF::loadView('Hesaplar/boilerkazan');
                            return $pdf->download('pdfview.pdf');
                        }*/
                        return view('Hesaplar.burner');
                        break;
                    case "fuelamount":
                        $req = array("projeid"=>$id);
                        $fuelamount_detail = Project::FuelamountProjectDetayPdf($request,$id);
                        view()->share('items',$fuelamount_detail);
                        /*if($request->has('download')){
                            $pdf = PDF::loadView('Hesaplar/boilerkazan');
                            return $pdf->download('pdfview.pdf');
                        }*/
                        return view('Hesaplar.fuelamount');
                        break;
                    case "fuelamountyearly":
                        $req = array("projeid"=>$id);
                        $fuelamountyearly_detail = Project::FuelamountyearlyProjectDetayPdf($request,$id);
                        view()->share('items',$fuelamountyearly_detail);
                        /*if($request->has('download')){
                            $pdf = PDF::loadView('Hesaplar/boilerkazan');
                            return $pdf->download('pdfview.pdf');
                        }*/
                        return view('Hesaplar.fuelamountyearly');
                        break;
                    case "openexpansion":
                        $req = array("projeid"=>$id);
                        $openexpansion_detail = Project::OpenexpansionProjectDetayPdf($request,$id);
                        view()->share('items',$openexpansion_detail);
                        /*if($request->has('download')){
                            $pdf = PDF::loadView('Hesaplar/boilerkazan');
                            return $pdf->download('pdfview.pdf');
                        }*/
                        return view('Hesaplar.openexpansion');
                        break;
                    case "closeexpansion":
                            $req = array("projeid"=>$id);
                            $closeexpansion_detail = Project::CloseexpansionProjectDetayPdf($request,$id);
                            view()->share('items',$closeexpansion_detail);
                            /*if($request->has('download')){
                                $pdf = PDF::loadView('Hesaplar/boilerkazan');
                                return $pdf->download('pdfview.pdf');
                            }*/
                            return view('Hesaplar.closeexpansion');
                        break;
                    case "circulationpump":
                        $req = array("projeid"=>$id);
                        $circulationpump_detail = Project::CirculationPumpProjectDetayPdf($request,$id);
                        view()->share('items',$circulationpump_detail);
                        /*if($request->has('download')){
                            $pdf = PDF::loadView('Hesaplar/boilerkazan');
                            return $pdf->download('pdfview.pdf');
                        }*/
                        return view('Hesaplar.circulationpump');
                        break;
                    case "boyler":
                            $req = array("projeid"=>$id);
                            $boyler_detail = Project::BoylerProjectDetayPdf($request,$id);
                            view()->share('items',$boyler_detail);
                            /*if($request->has('download')){
                                $pdf = PDF::loadView('Hesaplar/boilerkazan');
                                return $pdf->download('pdfview.pdf');
                            }*/
                            return view('Hesaplar.boyler');
                            break;
                    case "rainwater":
                            $req = array("projeid"=>$id);
                            $rainwater_detail = Project::RainwaterProjectDetayPdf($request,$id);
                            view()->share('items',$rainwater_detail);
                            /*if($request->has('download')){
                                $pdf = PDF::loadView('Hesaplar/boilerkazan');
                                return $pdf->download('pdfview.pdf');
                            }*/
                            return view('Hesaplar.rainwater');
                            break;
                    case "hydrophore":
                            $req = array("projeid"=>$id);
                            $rainwater_detail = Project::hydrophoreProjectDetayPdf($request,$id);
                            view()->share('items',$rainwater_detail);
                            /*if($request->has('download')){
                                $pdf = PDF::loadView('Hesaplar/boilerkazan');
                                return $pdf->download('pdfview.pdf');
                            }*/
                            return view('Hesaplar.hydrophore');
                            break;
                    case "collector":
                                $req = array("projeid"=>$id);
                                $rainwater_detail = Project::collectorProjectDetayPdf($request,$id);
                                view()->share('items',$rainwater_detail);
                                /*if($request->has('download')){
                                    $pdf = PDF::loadView('Hesaplar/boilerkazan');
                                    return $pdf->download('pdfview.pdf');
                                }*/
                                return view('Hesaplar.collector');
                            break;
                    case "solarenergy":
                                $req = array("projeid"=>$id);
                                $rainwater_detail = Project::solarenergyProjectDetayPdf($request,$id);
                                view()->share('items',$rainwater_detail);
                                /*if($request->has('download')){
                                    $pdf = PDF::loadView('Hesaplar/boilerkazan');
                                    return $pdf->download('pdfview.pdf');
                                }*/
                                return view('Hesaplar.solarenergy');
                            break;
                    case "paddlebox":
                                $req = array("projeid"=>$id);
                                $paddlebox_detail = Project::paddleboxProjectDetayPdf($request,$id);
                                view()->share('items',$paddlebox_detail);
                                /*if($request->has('download')){
                                    $pdf = PDF::loadView('Hesaplar/boilerkazan');
                                    return $pdf->download('pdfview.pdf');
                                }*/
                                return view('Hesaplar.paddlebox');
                            break;
                    case "pool":
                                $req = array("projeid"=>$id);
                                $pool_detail = Project::poolProjectDetayPdf($request,$id);
                                view()->share('items',$pool_detail);
                                /*if($request->has('download')){
                                    $pdf = PDF::loadView('Hesaplar/boilerkazan');
                                    return $pdf->download('pdfview.pdf');
                                }*/
                                return view('Hesaplar.pool');
                            break;
                    case "pipeinsulation":
                                $req = array("projeid"=>$id);
                                $pipeinsulation_detail = Project::pipeinsulationProjectDetayPdf($request,$id);
                                view()->share('items',$pipeinsulation_detail);
                                /*if($request->has('download')){
                                    $pdf = PDF::loadView('Hesaplar/boilerkazan');
                                    return $pdf->download('pdfview.pdf');
                                }*/
                                return view('Hesaplar.pipeinsulation');
                            break;
                    case "coldstorage":
                                $req = array("projeid"=>$id);
                                $coldstorage_detail = Project::coldstorageProjectDetayPdf($request,$id);
                                view()->share('items',$coldstorage_detail);
                                /*if($request->has('download')){
                                    $pdf = PDF::loadView('Hesaplar/boilerkazan');
                                    return $pdf->download('pdfview.pdf');
                                }*/
                                return view('Hesaplar.coldstorage');
                            break;
                    case "parkingventilation":
                                $req = array("projeid"=>$id);
                                $parkingventilation_detail = Project::parkingventilationProjectDetayPdf($request,$id);
                                view()->share('items',$parkingventilation_detail);
                                /*if($request->has('download')){
                                    $pdf = PDF::loadView('Hesaplar/boilerkazan');
                                    return $pdf->download('pdfview.pdf');
                                }*/
                                return view('Hesaplar.parkingventilation');
                            break;
                    case "shelterventilation":
                                $req = array("projeid"=>$id);
                                $shelterventilation_detail = Project::shelterventilationProjectDetayPdf($request,$id);
                                view()->share('items',$shelterventilation_detail);
                                /*if($request->has('download')){
                                    $pdf = PDF::loadView('Hesaplar/boilerkazan');
                                    return $pdf->download('pdfview.pdf');
                                }*/
                                return view('Hesaplar.shelterventilation');
                            break;
                    case "pipepressure":
                        $req = array("projeid"=>$id);
                        $pipepressure_detail = Project::pipepressureProjectDetayPdf($request,$id);
                        view()->share('items',$pipepressure_detail);
                        /*if($request->has('download')){
                            $pdf = PDF::loadView('Hesaplar/boilerkazan');
                            return $pdf->download('pdfview.pdf');
                        }*/
                        return view('Hesaplar.pipepressure');
                        break;
                    case "heatexchanger":
                            $req = array("projeid"=>$id);
                            $heatexchanger_detail = Project::heatexchangerProjectDetayPdf($request,$id);

                            

                            view()->share('items',$heatexchanger_detail);

                            
                            /*if($request->has('download')){
                                $pdf = PDF::loadView('Hesaplar/boilerkazan');
                                return $pdf->download('pdfview.pdf');
                            }*/
                            return view('Hesaplar.heatexchanger');
                        break;


                    default:

                    toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
                    return redirect()->back();
                }

            }else{
                toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
                return redirect()->back();
            }


        }catch (Throwable $e)
        {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
            return redirect()->back();
        }


    }





}
