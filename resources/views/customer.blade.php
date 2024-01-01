@extends('layout.default')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-home bg-c-blue"></i>
                <div class="d-inline">
                    <h5><?=__('staticmessage.MüsteriOlustur')?></h5>
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
               <form action="{{route('admin.customercreate')}}" method="post">
                    @csrf


                         <div class="row">
                              <div class="col-sm-6 col-lg-6">
                              <div class="input-group">
                              <span class="input-group-prepend">
                                   <label class="input-group-text">Unique ID</label>
                              </span>
                              <input type="text" class="form-control" name="kilit_id">
                              </div>
                              </div>
                             <div class="col-sm-6 col-lg-6">
                                 <div class="input-group">
                                   <span class="input-group-prepend">
                                   </span>
                                     <button class="btn btn-success btn-round waves-effect waves-light">Müşteri Oluştur</button>
                                 </div>
                             </div>
                         </div>


               </form>
                  <div class="col-md-12">
                    <table id="table_id" class="display ">
                         <thead>
                             <tr>
                                 <th>Unique ID</th>
                                 <th>İsim</th>
                                 <th>E Mail </th>
                                 <th>Telefon</th>

                                 <th>Düzenle</th>
                                 <th>Sil</th>
                             </tr>
                         </thead>
                         <tbody>



                                @if (!empty($Musteriliste ))
                                @foreach ($Musteriliste["data"] as $item)
                                <tr>
                                    <td>{{$item["kilit_id"]}}</td>
                                   <td>{{$item["name"]}}</td>
                                   <td>{{$item["email"]}}</td>
                                   <td>{{$item["telefon"]}}</td>

                                   <td>
                                   <form method="POST" action="{{route('admin.customeredit',['id'=>$item["id"]])}}">
                                   @csrf
                                    <button type="submit" class="btn btn-info">
                                    <i class="ti-pencil-alt"></i>
                                      </button>
                                   </form>

                                  </td>
                                   <td>
                                    <form method="POST" action="{{route('admin.customerdelete',['id'=>$item["id"]])}}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                             <i class="ti-trash"></i>
                                        </button>

                                   </form>
                              </td>

                               </tr>
                                @endforeach
                                @else
                                   <tr><td>Müşteri  Yok</td></tr>
                                @endif


                         </tbody>
                     </table>

                  </div>
             </div>
         </div>
     </div>
</div>
@endsection
@section("footerExtra")
    <script type="text/javascript">
    $(document).ready( function () {
    $('#table_id').DataTable({
    responsive: true
});

    });
    </script>
@endsection
