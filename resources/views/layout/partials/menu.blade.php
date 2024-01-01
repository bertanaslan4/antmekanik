<nav class="pcoded-navbar">
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">
            <div class="pcoded-navigation-label">Menü</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="">
                    <a href="{{route('admin.dashboard')}}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                        <span class="pcoded-mtext"><?=__('staticmessage.Anasayfa')?></span>
                    </a>
                </li>
                <!-- <li class="">
                    <a href="{{route('admin.proje')}}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"> <i class="feather icon-layers"></i></span>
                        <span class="pcoded-mtext">Proje</span>
                    </a>
                </li> -->
                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-layers"></i>
                        </span>
                        <span class="pcoded-mtext">Projeler</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="">
                            <a href="{{route('admin.proje')}}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Proje Oluştur</span>
                            </a>
                        </li>


                        @if(!empty($projelerliste))
                             @forelse ($projelerliste as $row)
                                        <li class="">
                                            <a href="{{route('admin.projeliste',['id'=>$row->id])}}" class="waves-effect waves-dark">
                                                <i class="feather icon-layers">
                                                </i>
                                                <span>
                                                    {{$row->proje_adi}}
                                                </span>
                                            </a>
                                        </li>
                                    @empty
                                @endforelse
                            @endif


                    </ul>

                </li>
                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-sidebar"></i>
                        </span>
                        <span class="pcoded-mtext"><?=__('staticmessage.Hesapislem')?></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-sidebar"></i>
                                    </span>
                                    <span class="pcoded-mtext"><?=__('staticmessage.Boiler')?></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="{{route('admin.boiler')}}" class="waves-effect waves-dark">
                                            <i class="feather icon-plus">
                                            </i>
                                            <span>
                                                <?=__('staticmessage.Hesap')?>
                                            </span>

                                        </a>
                                    </li>

                                    @if(!empty($project_boiler))


                                    @forelse ($project_boiler as $row)

                                        <li class="">

                                            <a  class="waves-effect waves-dark">
                                                <form action="{{route('admin.boiler',['boilerid'=>$row->id])}}" method="post" name="boileredit">
                                                    @csrf
                                                    <button style="background-color:rgba(29,37,49,.5);color: #b7c0cd;border: black "><i class="feather icon-layers">

                                                        </i>
                                                        <span>
                                                    {{$row->adi}}
                                                </span></button>
                                                </form>


                                            </a>
                                        </li>

                                    @empty

                                    @endforelse

                                    @endif




                                </ul>
                            </li>
                        </li>
                        <li class="">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-sidebar"></i>
                                    </span>
                                    <span class="pcoded-mtext"><?=__('staticmessage.Isıdegistirici')?></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="{{route('admin.heatexchanger')}}" class="waves-effect waves-dark">
                                            <i class="feather icon-plus">
                                            </i>
                                            <span>
                                                <?=__('staticmessage.Hesap')?>
                                            </span>

                                        </a>
                                    </li>
                                    @forelse ($project_heatexchanger as $row)

                                        <li class="">
                                            <a href="{{route('heatexchangerhesapsonuc',['id'=>$row->id])}}" class="waves-effect waves-dark">
                                                <i class="feather icon-layers">

                                                </i>
                                                <span>
                                                    {{$row->adi}}
                                                </span>

                                            </a>
                                        </li>

                                    @empty

                                    @endforelse
                                </ul>
                            </li>


                        </li>

                        <li class="">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-sidebar"></i>
                                    </span>
                                    <span class="pcoded-mtext"><?=__('staticmessage.Brülör')?></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="{{route('admin.burner')}}" class="waves-effect waves-dark">
                                            <i class="feather icon-plus">
                                            </i>
                                            <span>
                                                <?=__('staticmessage.Hesap')?>
                                            </span>

                                        </a>
                                    </li>
                                    @forelse ($burner_project["data"] as $row)

                                        <li class="">
                                            <a href="{{route('burnerhesapsonuc',['id'=>$row['id']])}}" class="waves-effect waves-dark">
                                                <i class="feather icon-layers">

                                                </i>
                                                <span>
                                                    {{$row["adi"]}}
                                                </span>

                                            </a>
                                        </li>

                                    @empty

                                    @endforelse
                                </ul>
                            </li>

                        </li>
                        <li class="">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-sidebar"></i>
                                    </span>
                                    <span class="pcoded-mtext"><?=__('staticmessage.KazanHesabiFuelAmount')?></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="{{route('admin.fuelamount')}}" class="waves-effect waves-dark">
                                            <i class="feather icon-plus">
                                            </i>
                                            <span>
                                                <?=__('staticmessage.Hesap')?>
                                            </span>

                                        </a>
                                    </li>
                                    @forelse ($project_fuelamount as $row)

                                        <li class="">
                                            <a href="{{route('fuelamounthesapsonuc',['id'=>$row->id])}}" class="waves-effect waves-dark">
                                                <i class="feather icon-layers">

                                                </i>
                                                <span>
                                                    {{$row->adi}}
                                                </span>

                                            </a>
                                        </li>

                                    @empty

                                    @endforelse
                                </ul>
                            </li>
                        </li>
                        <li class="">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-sidebar"></i>
                                    </span>
                                    <span class="pcoded-mtext"><?=__('staticmessage.KazanHesabıFuelAmountYearly')?></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="{{route('admin.fuelamountyearly')}}" class="waves-effect waves-dark">
                                            <i class="feather icon-plus">
                                            </i>
                                            <span>
                                                <?=__('staticmessage.Hesap')?>
                                            </span>

                                        </a>
                                    </li>
                                    @forelse ($project_fuelamountyearly as $row)

                                        <li class="">
                                            <a href="{{route('fuelamountyearlyhesapsonuc',['id'=>$row->id])}}" class="waves-effect waves-dark">
                                                <i class="feather icon-layers">

                                                </i>
                                                <span>
                                                    {{$row->adi}}
                                                </span>

                                            </a>
                                        </li>

                                    @empty

                                    @endforelse
                                </ul>
                            </li>
                        </li>
                        <li class="">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-sidebar"></i>
                                    </span>
                                    <span class="pcoded-mtext"><?=__('staticmessage.Acikgenlesme')?></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="{{route('admin.openexpansion')}}" class="waves-effect waves-dark">
                                            <i class="feather icon-plus">
                                            </i>
                                            <span>
                                                <?=__('staticmessage.Hesap')?>
                                            </span>

                                        </a>
                                    </li>
                                    @forelse ($project_openexpansion as $row)

                                        <li class="">
                                            <a href="{{route('openexpansionhesapsonuc',['id'=>$row->id])}}" class="waves-effect waves-dark">
                                                <i class="feather icon-layers">

                                                </i>
                                                <span>
                                                    {{$row->adi}}
                                                </span>

                                            </a>
                                        </li>

                                    @empty

                                    @endforelse
                                </ul>
                            </li>
                        </li>
                        <li class="">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-sidebar"></i>
                                    </span>
                                    <span class="pcoded-mtext"><?=__('staticmessage.Kapaligenlesme')?></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="{{route('admin.closeexpansion')}}" class="waves-effect waves-dark">
                                            <i class="feather icon-plus">
                                            </i>
                                            <span>
                                                <?=__('staticmessage.Hesap')?>
                                            </span>

                                        </a>
                                    </li>
                                    @forelse ($project_closeexpansion as $row)

                                        <li class="">
                                            <a href="{{route('closeexpansionhesapsonuc',['id'=>$row->id])}}" class="waves-effect waves-dark">
                                                <i class="feather icon-layers">

                                                </i>
                                                <span>
                                                    {{$row->adi}}
                                                </span>

                                            </a>
                                        </li>

                                    @empty

                                    @endforelse
                                </ul>
                            </li>
                        </li>
                        <li class="">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-sidebar"></i>
                                    </span>
                                    <span class="pcoded-mtext"><?=__('staticmessage.Dolasimpompasi')?></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="{{route('admin.circulationpump')}}" class="waves-effect waves-dark">
                                            <i class="feather icon-plus">
                                            </i>
                                            <span>
                                                <?=__('staticmessage.Hesap')?>
                                            </span>

                                        </a>
                                    </li>
                                    @forelse ($project_circulationpump as $row)

                                        <li class="">
                                            <a href="{{route('circulationpumphesapsonuc',['id'=>$row->id])}}" class="waves-effect waves-dark">
                                                <i class="feather icon-layers">

                                                </i>
                                                <span>
                                                    {{$row->adi}}
                                                </span>

                                            </a>
                                        </li>

                                    @empty

                                    @endforelse
                                </ul>
                            </li>
                        </li>
                        <li class="">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-sidebar"></i>
                                    </span>
                                    <span class="pcoded-mtext"><?=__('staticmessage.Boyler')?></span>
                                </a>

                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="{{route('admin.boyler')}}" class="waves-effect waves-dark">
                                            <i class="feather icon-plus">
                                            </i>
                                            <span>
                                                <?=__('staticmessage.Hesap')?>
                                            </span>

                                        </a>
                                    </li>
                                    <?php  //dd($boyler_project["data"][0]);?>

                                    @forelse ($project_boyler as $row)

                                        <li class="">
                                            <a href="{{route('boylerhesapsonuc',['id'=>$row->id])}}" class="waves-effect waves-dark">
                                                <i class="feather icon-layers">

                                                </i>
                                                <span>
                                                    {{$row->adi}}
                                                </span>

                                            </a>
                                        </li>

                                    @empty

                                    @endforelse
                                </ul>
                            </li>
                        </li>
                        <li class="">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-sidebar"></i>
                                    </span>
                                    <span class="pcoded-mtext"><?=__('staticmessage.Yagmursuyu')?></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="{{route('admin.rainwater')}}" class="waves-effect waves-dark">
                                            <i class="feather icon-plus">
                                            </i>
                                            <span>
                                                <?=__('staticmessage.Hesap')?>
                                            </span>

                                        </a>
                                    </li>
                                    @forelse ($project_rainwater as $row)

                                        <li class="">
                                            <a href="{{route('rainwatersonuc',['id'=>$row->id])}}" class="waves-effect waves-dark">
                                                <i class="feather icon-layers">

                                                </i>
                                                <span>
                                                    {{$row->adi}}
                                                </span>

                                            </a>
                                        </li>

                                    @empty

                                    @endforelse
                                </ul>
                            </li>
                        </li>
                        <li class="">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-sidebar"></i>
                                    </span>
                                    <span class="pcoded-mtext"><?=__('staticmessage.Hidrofor')?></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="{{route('admin.hydrophore')}}" class="waves-effect waves-dark">
                                            <i class="feather icon-plus">
                                            </i>
                                            <span>
                                                <?=__('staticmessage.Hesap')?>
                                            </span>

                                        </a>
                                    </li>
                                    @forelse ($project_hydrophore as $row)

                                        <li class="">
                                            <a href="{{route('hydrophoresonuc',['id'=>$row->id])}}" class="waves-effect waves-dark">
                                                <i class="feather icon-layers">

                                                </i>
                                                <span>
                                                    {{$row->adi}}
                                                </span>

                                            </a>
                                        </li>

                                    @empty

                                    @endforelse
                                </ul>
                            </li>
                        </li>
                        <li class="">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-sidebar"></i>
                                    </span>
                                    <span class="pcoded-mtext"><?=__('staticmessage.Kollektor')?></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="{{route('admin.collector')}}" class="waves-effect waves-dark">
                                            <i class="feather icon-plus">
                                            </i>
                                            <span>
                                                <?=__('staticmessage.Hesap')?>
                                            </span>

                                        </a>
                                    </li>
                                    @forelse ($project_collector as $row)

                                        <li class="">
                                            <a href="{{route('collectorsonuc',['id'=>$row->id])}}" class="waves-effect waves-dark">
                                                <i class="feather icon-layers">

                                                </i>
                                                <span>
                                                    {{$row->adi}}
                                                </span>

                                            </a>
                                        </li>

                                    @empty

                                    @endforelse
                                </ul>
                            </li>
                        </li>
                        <li class="">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-sidebar"></i>
                                    </span>
                                    <span class="pcoded-mtext"><?=__('staticmessage.Gunes')?></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="{{route('admin.solarenergy')}}" class="waves-effect waves-dark">
                                            <i class="feather icon-plus">
                                            </i>
                                            <span>
                                                <?=__('staticmessage.Hesap')?>
                                            </span>

                                        </a>
                                    </li>
                                    @forelse ($project_solar as $row)



                                        <li class="">
                                            <a href="{{route('solarenergyhesapsonuc',['id'=>$row->id])}}" class="waves-effect waves-dark">
                                                <i class="feather icon-layers">

                                                </i>
                                                <span>
                                                    {{$row->adi}}
                                                </span>

                                            </a>
                                        </li>

                                    @empty

                                    @endforelse
                                </ul>
                            </li>
                        </li>
                        <li class="">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-sidebar"></i>
                                    </span>
                                    <span class="pcoded-mtext"><?=__('staticmessage.Davlumbaz')?></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="{{route('admin.paddlebox')}}" class="waves-effect waves-dark">
                                            <i class="feather icon-plus">
                                            </i>
                                            <span>
                                                <?=__('staticmessage.Hesap')?>
                                            </span>

                                        </a>
                                    </li>
                                    @forelse ($project_paddle as $row)

                                        <li class="">
                                            <a href="{{route('paddleboxhesapsonuc',['id'=>$row->id])}}" class="waves-effect waves-dark">
                                                <i class="feather icon-layers">

                                                </i>
                                                <span>
                                                    {{$row->adi}}
                                                </span>

                                            </a>
                                        </li>

                                    @empty

                                    @endforelse
                                </ul>
                            </li>
                        </li>
                        <li class="">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-sidebar"></i>
                                    </span>
                                    <span class="pcoded-mtext"><?=__('staticmessage.Havuz')?></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="{{route('admin.pool')}}" class="waves-effect waves-dark">
                                            <i class="feather icon-plus">
                                            </i>
                                            <span>
                                                <?=__('staticmessage.Hesap')?>
                                            </span>

                                        </a>
                                    </li>
                                    @forelse ($project_pool as $row)

                                        <li class="">
                                            <a href="{{route('poolhesapsonuc',['id'=>$row->id])}}" class="waves-effect waves-dark">
                                                <i class="feather icon-layers">

                                                </i>
                                                <span>
                                                    {{$row->adi}}
                                                </span>

                                            </a>
                                        </li>

                                    @empty

                                    @endforelse
                                </ul>
                            </li>
                        </li>
                        <li class="">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-sidebar"></i>
                                    </span>
                                    <span class="pcoded-mtext"><?=__('staticmessage.Sogukdepo')?></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="{{route('admin.coldstorage')}}" class="waves-effect waves-dark">
                                            <i class="feather icon-plus">
                                            </i>
                                            <span>
                                                <?=__('staticmessage.Hesap')?>
                                            </span>

                                        </a>
                                    </li>
                                    @forelse ($project_coldstorage as $row)

                                        <li class="">
                                            <a href="{{route('coldstoragehesapsonuc',['id'=>$row->id])}}" class="waves-effect waves-dark">
                                                <i class="feather icon-layers">

                                                </i>
                                                <span>
                                                    {{$row->adi}}
                                                </span>

                                            </a>
                                        </li>

                                    @empty

                                    @endforelse
                                </ul>
                            </li>
                        </li>
                        <li class="">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-sidebar"></i>
                                    </span>
                                    <span class="pcoded-mtext"><?=__('staticmessage.Boruyalitim')?></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="{{route('admin.pipeinsulation')}}" class="waves-effect waves-dark">
                                            <i class="feather icon-plus">
                                            </i>
                                            <span>
                                                <?=__('staticmessage.Hesap')?>
                                            </span>

                                        </a>
                                    </li>
                                    @forelse ($project_pipeinsulation as $row)

                                        <li class="">
                                            <a href="{{route('pipeinsulationhesapsonuc',['id'=>$row->id])}}" class="waves-effect waves-dark">
                                                <i class="feather icon-layers">

                                                </i>
                                                <span>
                                                    {{$row->adi}}
                                                </span>

                                            </a>
                                        </li>

                                    @empty

                                    @endforelse
                                </ul>
                            </li>
                        </li>
                        <li class="">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-sidebar"></i>
                                    </span>
                                    <span class="pcoded-mtext"><?=__('staticmessage.Otopark')?></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="{{route('admin.parkingventilation')}}" class="waves-effect waves-dark">
                                            <i class="feather icon-plus">
                                            </i>
                                            <span>
                                                <?=__('staticmessage.Hesap')?>
                                            </span>

                                        </a>
                                    </li>
                                    @forelse ($project_parking as $row)

                                        <li class="">
                                            <a href="{{route('parkingventilationhesapsonuc',['id'=>$row->id])}}" class="waves-effect waves-dark">
                                                <i class="feather icon-layers">

                                                </i>
                                                <span>
                                                    {{$row->adi}}
                                                </span>

                                            </a>
                                        </li>

                                    @empty

                                    @endforelse
                                </ul>
                            </li>
                        </li>
                        <li class="">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-sidebar"></i>
                                    </span>
                                    <span class="pcoded-mtext"><?=__('staticmessage.Siginak')?></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="{{route('admin.shelterventilation')}}" class="waves-effect waves-dark">
                                            <i class="feather icon-plus">
                                            </i>
                                            <span>
                                                <?=__('staticmessage.Hesap')?>
                                            </span>

                                        </a>
                                    </li>
                                    @forelse ($project_shelter as $row)

                                        <li class="">
                                            <a href="{{route('shelterventilationhesapsonuc',['id'=>$row->id])}}" class="waves-effect waves-dark">
                                                <i class="feather icon-layers">

                                                </i>
                                                <span>
                                                    {{$row->adi}}
                                                </span>

                                            </a>
                                        </li>

                                    @empty

                                    @endforelse
                                </ul>
                            </li>
                        </li>
                        <li class="">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-sidebar"></i>
                                    </span>
                                    <span class="pcoded-mtext"><?=__('staticmessage.Borubasinc')?></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="{{route('admin.pipepressure')}}" class="waves-effect waves-dark">
                                            <i class="feather icon-plus">
                                            </i>
                                            <span>
                                                <?=__('staticmessage.Hesap')?>
                                            </span>

                                        </a>
                                    </li>
                                    @forelse ($project_pipepressure as $row)

                                        <li class="">
                                            <a href="{{route('pipepressurehesapsonuc',['id'=>$row->id])}}" class="waves-effect waves-dark">
                                                <i class="feather icon-layers">

                                                </i>
                                                <span>
                                                    {{$row->adi}}
                                                </span>

                                            </a>
                                        </li>

                                    @empty

                                    @endforelse
                                </ul>
                            </li>
                        </li>
                <li class="">
                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-sidebar"></i>
                                    </span>
                        <span class="pcoded-mtext">Boru Çapı </span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="">
                            <a href="{{route('admin.borucapi')}}" class="waves-effect waves-dark">
                                <i class="feather icon-plus">
                                </i>
                                <span>
                                                <?=__('staticmessage.Hesap')?>
                                            </span>

                            </a>
                        </li>
{{--                        @forelse ($project_shelter as $row)--}}

{{--                            <li class="">--}}
{{--                                <a href="{{route('shelterventilationhesapsonuc',['id'=>$row->id])}}" class="waves-effect waves-dark">--}}
{{--                                    <i class="feather icon-layers">--}}

{{--                                    </i>--}}
{{--                                    <span>--}}
{{--                                                    {{$row->adi}}--}}
{{--                                                </span>--}}

{{--                                </a>--}}
{{--                            </li>--}}

{{--                        @empty--}}

{{--                        @endforelse--}}
                    </ul>
                </li>
                </li>


                    </ul>
                </li>



{{--                <li class="pcoded-hasmenu">--}}
{{--                    <a href="javascript:void(0)" class="waves-effect waves-dark">--}}
{{--                        <span class="pcoded-micon">--}}
{{--                            <i class="feather icon-layers"></i>--}}
{{--                        </span>--}}
{{--                        <span class="pcoded-mtext"><?=__('staticmessage.Ayarlar')?></span>--}}
{{--                    </a>--}}
{{--                    <ul class="pcoded-submenu">--}}
{{--                        <li class="">--}}
{{--                            <a href="{{route('admin.defaultvariable')}}" class="waves-effect waves-dark">--}}
{{--                                <span class="pcoded-mtext">Default Veriler</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                       --}}
{{--                    </ul>--}}
{{--                </li>--}}
            @if (session()->get('role')==1)
                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-layers"></i>
                        </span>
                        <span class="pcoded-mtext"><?=__('staticmessage.Müsteri')?></span>
                    </a>

                    <ul class="pcoded-submenu">
                        <li class="">
                            <a href="{{route('admin.customer')}}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext"><?=__('staticmessage.MüsteriOlustur')?></span>
                            </a>
                        </li>
                    </ul>



                </li>
            @endif
            </ul>

        </div>
    </div>
</nav>
