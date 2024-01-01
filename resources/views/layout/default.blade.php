<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
@include('layout.partials.head')
<body>
    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <!--Navbar-->
            @include('layout.partials.navbar')
            <div class="pcoded-main-container" style="background-color: white;">
                <div class="pcoded-wrapper">
                    <!--Menü-->
                    @include('layout.partials.menu')
                    <div class="pcoded-content"  style="background-color:white;">
                        @yield('content')
                    </div>
                    <div id="styleSelector">
                    </div>
                </div>
            </div>
        </div>
    </div><!--Anadiv-->
    @include('layout.partials.scripts')
    @yield('footerExtra')
    @include('sweetalert::alert')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable( {
                "pagingType": "full_numbers",
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Turkish.json'
                },
                responsive: true
            } );
        } );
    </script>
    <style>
        .full-screen {
            line-height:4 !important;
        }
        #mobile-collapse .feather{
            line-height:4 !important;
        },
        
    </style>
</body>
</html>
