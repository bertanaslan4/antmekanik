@extends('layout.default')
@section('content')
<div class="page-header card" >
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Proje</h5>
                    </div>
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
                                <form action="{{route('admin.projekaydet')}}" method="post">
                                @csrf
                               
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Proje No:</label>
                                        <div class="col-sm-4">
                                            <input class="form-control form-control-round"  type="text" id="pno" name="pno" placeholder="Proje No" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Revizyon:</label>
                                        <div class="col-sm-4">
                                            <input class="form-control form-control-round"  type="text" id="prev" name="prev" placeholder="0" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Proje Adı:</label>
                                        <div class="col-sm-4">
                                            <input class="form-control form-control-round"  type="text" id="adi" name="adi" placeholder="Proje Adı" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Konu:</label>
                                        <div class="col-sm-4">
                                            <input class="form-control form-control-round"  type="text" id="konu" name="konu" placeholder="Konu" >
                                        </div>
                                    </div>
                                   <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Hesap:</label>
                                        <div class="col-sm-4">
                                            <input class="form-control form-control-round"  type="text" id="hesap" name="hesap" placeholder="Hesap" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Kontrol:</label>
                                        <div class="col-sm-4">
                                            <input class="form-control form-control-round"  type="text" id="kontrol" name="kontrol" placeholder="Kontrol" >
                                        </div>
                                    </div>
                                   

                                 

                                

                                    

                                    <div class="form-group row">    
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-4">
                                            
                                       
                                                
                                                <button  class="btn btn-info btn-round waves-effect waves-light" >Onayla</button>
                                        
                                            
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
