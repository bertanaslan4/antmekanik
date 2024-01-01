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
                    <form action="{{route('admin.profilecreate')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <div class="card">
                                    <img src="{{ asset('/avatar/ava1.png') }}" class="card-img-top" alt="Avatar 1" style="width: 150px;height: 150px;display: block;margin: auto;">
                                    <div class="card-body">
                                        <input style="width: 20px;height: 20px;" type="radio" value="avatar1.png" name="ava">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <img src="{{ asset('/avatar/ava2.png') }}" class="card-img-top" alt="Avatar 2" style="width: 150px;height: 150px;display: block;margin: auto;">
                                    <div class="card-body">
                                        <input style="width: 20px;height: 20px;" type="radio" value="avatar2.png" name="ava">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <img src="{{ asset('/avatar/ava3.png') }}" class="card-img-top" alt="Avatar 3" style="width: 150px;height: 150px;display: block;margin: auto;">
                                    <div class="card-body">
                                      <input style="width: 20px;height: 20px;" type="radio" value="avatar3.png" name="ava">
                                    </div>
                                </div>
                            </div>
                        </div>





                        <div class="row">
                            <div class="col-md-6">

                                <div class="row">
                                    <div class="col-sm-8 col-lg-10">
                                        <div class="input-group">
                              <span class="input-group-prepend">
                                   <label class="input-group-text">Adı Soyadı</label>
                              </span>
                                            <input type="text" class="form-control" name="name" value="<?php echo $res[0]->name ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8 col-lg-10">
                                        <div class="input-group">
                              <span class="input-group-prepend">
                                   <label class="input-group-text">E-mail Adresi</label>
                              </span>
                                            <input type="text" class="form-control" name="email" value="<?php echo $res[0]->email ?>" required>
                                        </div>
                                    </div>
                                </div>
{{--                                <div class="row">--}}
{{--                                    <div class="col-sm-8 col-lg-10">--}}
{{--                                        <div class="input-group">--}}
{{--                              <span class="input-group-prepend">--}}
{{--                                   <label class="input-group-text">V.D</label>--}}
{{--                              </span>--}}
{{--                                            <input type="number" class="form-control" name="vd" required>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                <div class="row">
                                    <div class="col-sm-8 col-lg-10">
                                        <div class="input-group">
                              <span class="input-group-prepend">
                                   <label class="input-group-text">Telefon</label>
                              </span>
                                            <input type="text" class="form-control" name="telefon" value="<?php echo $res[0]->telefon ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="row">
                                    <div class="col-sm-8 col-lg-10">
                                        <div class="input-group">
                              <span class="input-group-prepend">
                                   <label class="input-group-text">Tc Numarası</label>
                              </span>
                                            <input type="text" class="form-control" name="tc" value="<?php echo $res[0]->tc ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8 col-lg-10">
                                        <div class="input-group">
                              <span class="input-group-prepend">
                                   <label class="input-group-text">Firma Adı</label>
                              </span>
                                            <input type="text" class="form-control" name="firma" value="<?php echo $res[0]->firma ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8 col-lg-10">
                                        <div class="input-group">
                                            <textarea rows="5" style="border-radius: 10px" cols="5" name="adres" class="form-control" placeholder="Açık Adres" required><?php echo $res[0]->adres ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-8 col-lg-10">
                                        <div class="input-group">
                                   <span class="input-group-prepend">
                                   </span>
                                            <button class="btn btn-success btn-round waves-effect waves-light">Düzenle</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.select-avatar').click(function() {
                var imgUrl = $(this).data('avatar');
                $('#avatar_url').val(imgUrl);
                $(this).addClass('active').siblings().removeClass('active');
            });
        });
    </script>
@endsection
@section("footerExtra")

@endsection
