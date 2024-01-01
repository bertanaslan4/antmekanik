@extends('layout.default')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-home bg-c-blue"></i>
                <div class="d-inline">
                    <h5>Müşteri Güncelle</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><?=__('staticmessage.MüsteriOlustur')?></a> </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="pcoded-inner-content">
     <div class="main-body">
         <div class="page-wrapper">
             <div class="page-body">
                  <div class="row">
                       <div class="col-md-6">
                         <form action="{{route('admin.customerupdate',['id'=>$musterigoster[0]["id"]])}}" method="post">
                           @csrf
                         <div class="row">
                              <div class="col-sm-8 col-lg-10">
                              <div class="input-group">
                              <span class="input-group-prepend">
                                   <label class="input-group-text">Adı Soyadı</label>
                              </span>
                              <input type="text" class="form-control" name="name" value="<?php echo  $musterigoster[0]["name"];  ?>">
                              </div>
                              </div>
                         </div>
                             <div class="row">
                                 <div class="col-sm-8 col-lg-10">
                                     <div class="input-group">
                              <span class="input-group-prepend">
                                   <label class="input-group-text">Guid</label>
                              </span>
                                         <input type="text" class="form-control" name="kilit_id" value="<?php echo  $musterigoster[0]["kilit_id"];  ?>">
                                     </div>
                                 </div>
                             </div>
                         <div class="row">
                              <div class="col-sm-8 col-lg-10">
                              <div class="input-group">
                              <span class="input-group-prepend">
                                   <label class="input-group-text">E-mail Adresi</label>
                              </span>
                              <input type="text" class="form-control" name="email" value="<?php echo  $musterigoster[0]["email"];  ?>">
                              </div>
                              </div>
                         </div>
                         <div class="row">
                              <div class="col-sm-8 col-lg-10">
                              <div class="input-group">
                              <span class="input-group-prepend">
                                   <label class="input-group-text">V.D</label>
                              </span>
                              <input type="number" class="form-control" name="vd" value="<?php echo  $musterigoster[0]["vd"];  ?>">
                              </div>
                              </div>
                         </div>
                         <div class="row">
                              <div class="col-sm-8 col-lg-10">
                              <div class="input-group">
                              <span class="input-group-prepend">
                                   <label class="input-group-text">Role</label>
                              </span>
                              <select class="form-select" aria-label="Default select example" name="role">

                                    @if ($musterigoster[0]["role"]==0)
                                    <option selected value="0">Kullanıcı</option>
                                    <option value="1">Admin</option>
                                    @else
                                    <option  value="0">Kullanıcı</option>
                                    <option selected value="1">Admin</option>
                                    @endif


                                 </select>
                              </div>
                              </div>
                         </div>
                         <div class="row">
                              <div class="col-sm-8 col-lg-10">
                              <div class="input-group">
                              <span class="input-group-prepend">
                                   <label class="input-group-text">Telefon</label>
                              </span>
                              <input type="text" class="form-control" name="telefon" value="<?php echo  $musterigoster[0]["telefon"];  ?>">
                              </div>
                              </div>
                         </div>
                         <div class="row">
                              <div class="col-sm-8 col-lg-10">
                              <div class="input-group">
                              <span class="input-group-prepend">
                                   <label class="input-group-text">Tc Numarası</label>
                              </span>
                              <input type="text" class="form-control" name="tc" value="<?php echo  $musterigoster[0]["tc"];  ?>">
                              </div>
                              </div>
                         </div>
                         <div class="row">
                              <div class="col-sm-8 col-lg-10">
                              <div class="input-group">
                              <span class="input-group-prepend">
                                   <label class="input-group-text">Firma Adı</label>
                              </span>
                              <input type="text" class="form-control" name="firma" value="<?php echo  $musterigoster[0]["firma"]; ?>" >
                              </div>
                              </div>
                         </div>
                         <div class="row">
                              <div class="col-sm-8 col-lg-10">
                              <div class="input-group">
                              <textarea rows="5" style="border-radius: 10px" cols="5" name="adres" class="form-control" placeholder="Açık Adres"><?php echo  $musterigoster[0]["adres"];?></textarea>
                              </div>
                              </div>
                         </div>
                         <div class="row">
                              <div class="col-sm-8 col-lg-10">
                                   <div class="input-group">
                                        <span class="input-group-prepend">
                                             <label class="input-group-text">Lisans Süresi</label>
                                        </span>
                                     <input name="lisanssuresi" type="date" value="<?php echo  $musterigoster[0]["lisanssuresi"];?>">
                                   </div>
                              </div>
                         </div>
                         <div class="row">
                              <div class="col-sm-8 col-lg-10">
                                   <div class="input-group">
                                   <span class="input-group-prepend">
                                   </span>
                                   <button class="btn btn-warning btn-round waves-effect waves-light">Güncelle</button>
                                   </div>
                              </div>
                         </div>

                         </form>
                       </div>

                  </div>
             </div>
         </div>
     </div>
</div>
@endsection
