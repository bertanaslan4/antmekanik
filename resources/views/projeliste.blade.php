@extends('layout.default')
@section('content')
<div class="page-header card" >
        <div class="row align-items-end">
            <div class="col-lg-6">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Proje</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="page-header-title">
                    <form method="POST" action="{{route('admin.projegec',['id'=>$projeler["data"][0]->id])}}">
                                        @csrf
                                        <button  class="btn btn-info btn-round waves-effect waves-light" >Projeye Geç</button>
                                   
                                   </form>  
                </div>
            </div>
             
        </div>
</div>
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-md-12">
                               
                            
                                           
                                       
                                                
                                                
                                        
                                            
                                    


                            <form action="{{route('admin.projeupdate')}}" method="post">
                                @csrf
                               
                                <div class="form-group row" style="display: none;">
                                        <label class="col-sm-4 col-form-label">Proje İD:</label>
                                        <div class="col-sm-4">
                                            <input class="form-control form-control-round"  type="text" id="pno" name="id" value="{{$projeler["data"][0]->id}}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Proje No:</label>
                                        <div class="col-sm-4">
                                            <input class="form-control form-control-round"  type="text" id="pno" name="pno" value="{{$projeler["data"][0]->proje_no}}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Revizyon:</label>
                                        <div class="col-sm-4">
                                            <input class="form-control form-control-round"  type="text" id="prev" name="prev" value="{{$projeler["data"][0]->proje_revizyon}}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Proje Adı:</label>
                                        <div class="col-sm-4">
                                            <input class="form-control form-control-round"  type="text" id="adi" name="adi" value=" {{$projeler["data"][0]->proje_adi}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Konu:</label>
                                        <div class="col-sm-4">
                                            <input class="form-control form-control-round"  type="text" id="konu" name="konu" value="{{$projeler["data"][0]->proje_konu}}" >
                                        </div>
                                    </div>
                                   <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Hesap:</label>
                                        <div class="col-sm-4">
                                            <input class="form-control form-control-round"  type="text" id="hesap" name="hesap" value="{{$projeler["data"][0]->proje_hesap}}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Kontrol:</label>
                                        <div class="col-sm-4">
                                            <input class="form-control form-control-round"  type="text" id="kontrol" name="kontrol" value="{{$projeler["data"][0]->proje_kontrol}}" >
                                        </div>
                                    </div>
                                   

                                 

                                

                                    

                                    <div class="form-group row">    
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-4">
                                            
                                       
                                                
                                                <button  class="btn btn-info btn-round waves-effect waves-light" >Güncelle</button>
                                        
                                            
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
@section("footerExtra")
  
@endsection
