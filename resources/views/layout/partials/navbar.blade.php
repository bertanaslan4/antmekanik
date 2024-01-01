<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a href="index.html">
                <img class="img-fluid" src="{{asset('png/logo.png')}}" width="70" height="70" alt="Theme-Logo" />
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="feather icon-menu icon-toggle-right"></i>
            </a>
            <a class="mobile-options waves-effect waves-light">
                <i class="feather icon-more-horizontal"></i>
            </a>
        </div>
        <div class="navbar-container container-fluid">
            <ul class="nav-left">
                <li>
                    <a href="#!"
                        onclick="if (!window.__cfRLUnblockHandlers) return false; javascript:toggleFullScreen()"
                        class="waves-effect waves-light" data-cf-modified-d8424a08d31b5b8b406fded2-="">
                        <i class="full-screen feather icon-maximize"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav-right">
                <li class="header-notification">
                    <div class="dropdown-primary dropdown">
                        Bakiyeniz : {{$bakiye[0]->bakiye}} <img src="{{asset('coin.png')}}" height="30" width="30" alt="Bakiye" srcset="">
{{--                    <div class="dropdown-toggle" data-toggle="dropdown">--}}

{{--                            <img src="{{asset('coin.png')}}" height="30" width="30" alt="Bakiye" srcset=""> Bakiyeniz : {{$bakiye[0]->bakiye}}--}}

{{--                    </div>--}}
{{--                    <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">--}}

{{--                                <li>--}}
{{--                                    <a rel="alternate" class="dil" >--}}

{{--                                            Bakiyeniz : {{$bakiye[0]->bakiye}}--}}

{{--                                    </a>--}}
{{--                                </li>--}}


{{--                    </ul>--}}
                    </div>
                    </li>
                <li class="header-notification">
                    <div class="dropdown-primary dropdown">
                    <div class="dropdown-toggle" data-toggle="dropdown">
                        @if (LaravelLocalization::getCurrentLocale()=="tr")
                            <img src="{{asset('turkce.png')}}" height="30" width="30" alt="Türkçe Dil Desteği" srcset="">
                        @else
                            <img src="{{asset('ingilizce.png')}}" height="30" width="30" alt="Türkçe Dil Desteği" srcset="">
                        @endif
                    </div>
                    <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a rel="alternate" class="dil" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endforeach

                    </ul>
                    </div>
                    </li>

                <li class="user-profile header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('jpg/avatar-4.jpg')}}" class="img-radius" alt="User-Profile-Image">
                            <span>{{session("name")}}</span>
                            <i class="feather icon-chevron-down"></i>
                        </div>
                        <ul class="show-notification profile-notification dropdown-menu"
                            data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

                            <li>
                                <a href="{{route('admin.profile')}}">
                                    <i class="feather icon-user"></i> Profil
                                </a>
                            </li>
                            <li>
                                <a href="{{route('admin.defaultvariable')}}">
                                    <i class="feather icon-settings"></i> Ayarlar
                                </a>
                            </li>
                            <li>
                                <a href="{{route('admin.logout')}}">
                                    <i class="feather icon-log-out"></i> Çıkış Yap
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
            </ul>

        </div>
    </div>
</nav>
<style>
    .dil:hover{
        background-color: transparent !important;
    }
</style>
