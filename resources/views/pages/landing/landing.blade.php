<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" href="/browser-icon.ico">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="theme-color" content="#000000">
    <meta name="description" content="Web site created using create-react-app">
    <link crossorigin=""
          href="https://fonts.googleapis.com/css2?family=Hind+Vadodara:wght@300;400;500;600;700&amp;display=swap"
          rel="stylesheet">
    <link crossorigin="" rel="stylesheet" href="/style.css">
    <link crossorigin="" rel="apple-touch-icon" href="/logo192.png">
    <link rel="manifest" href="/manifest.json">
    <title>Satya Wacana Konseling</title>
    <link href="/static/css/2.762fc1a0.chunk.css" rel="stylesheet">
    <link href="/static/css/main.adfdfad2.chunk.css" rel="stylesheet">
        {{-- Favicon --}}
        <link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />
        <link rel="stylesheet" href="/css/owl.carousel.css" />
{{--        <link rel="stylesheet" href="/css/owl.theme.default.css" />--}}
{{--         Fonts--}}
        {{ Metronic::getGoogleFontsInclude() }}

    <link rel="stylesheet" href="/css/style.bundle.css">
    <link rel="stylesheet" href="/css/app.css">
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script>
            let userId = {{Session::get('userId')}};
        </script>
        @foreach (Metronic::initThemes() as $theme)
            <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($theme)) : asset($theme) }}" rel="stylesheet" type="text/css"/>
        @endforeach



    <style type="text/css">@import url(https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500);</style>
    <style type="text/css">
        :root {
            --tooltip-backcolor: #424242;
            --tooltip-forecolor: #FAFAFA;
        }

        .fab-container {
            bottom: 10vh;
            position: fixed;
            margin: 1em;
            right: 8vw;
        }

        .fab-item {
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
            border-radius: 50%;
            border-style: none;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 56px;
            height: 56px;
            margin: 20px auto 0;
            position: relative;
            -webkit-transition: transform .1s ease-out, height 100ms ease, opacity 100ms ease;
            transition: transform .1s ease-out, height 100ms ease, opacity 100ms ease;
            text-decoration: none;
        }

        .fab-item:active,
        .fab-item:focus,
        .fab-item:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
            transition: box-shadow .2s ease;
            outline: none;
        }

        .fab-item:not(:last-child) {
            width: 40px;
            height: 0px;
            margin: 0px auto 0;
            opacity: 0;
            -webkit-transform: translateY(50px);
            -ms-transform: translateY(50px);
            transform: translateY(50px);
        }

        .fab-container:hover
        .fab-item:not(:last-child) {
            height: 40px;
            opacity: 1;
            -webkit-transform: none;
            -ms-transform: none;
            transform: none;
            margin: 15px auto 0;
        }

        .fab-item:not(:last-child) i {
            opacity: 0;
        }

        .fab-container:hover
        .fab-item:not(:last-child) i {
            opacity: 1;
        }

        .fab-item:nth-last-child(1) {
            -webkit-transition-delay: 25ms;
            transition-delay: 25ms;
            background-size: contain;
        }

        .fab-item:not(:last-child):nth-last-child(2) {
            -webkit-transition-delay: 50ms;
            transition-delay: 20ms;
            background-size: contain;
        }

        .fab-item:not(:last-child):nth-last-child(3) {
            -webkit-transition-delay: 75ms;
            transition-delay: 40ms;
            background-size: contain;
        }

        .fab-item:not(:last-child):nth-last-child(4) {
            -webkit-transition-delay: 100ms;
            transition-delay: 60ms;
            background-size: contain;
        }

        [tooltip]:before {
            bottom: 25%;
            font-family: arial;
            font-weight: 600;
            border-radius: 2px;
            background: var(--tooltip-backcolor);
            color: var(--tooltip-forecolor);
            content: attr(tooltip);
            font-size: 12px;
            visibility: hidden;
            opacity: 0;
            padding: 5px 7px;
            margin-right: 12px;
            position: absolute;
            right: 100%;
            white-space: nowrap;
        }

        [tooltip]:hover:before,
        [tooltip]:hover:after {
            visibility: visible;
            opacity: 1;
            transition: opacity .1s ease-in-out;
        }

        .fab-item:nth-last-child(1)[tooltip]:hover:before,
        .fab-item:nth-last-child(1)[tooltip]:hover:after {
            transition: opacity .1s step-end;
        }

        .fab-item.fab-rotate:active,
        .fab-item.fab-rotate:focus,
        .fab-item.fab-rotate:hover {
            transform: rotate(45deg);
            box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.19), 3px 3px 6px rgba(0, 0, 0, 0.23);
            transition: box-shadow .2s ease, transform .1s ease;
            outline: none;
        }

        .fab-item.fab-rotate:nth-last-child(1)[tooltip]:hover:before,
        .fab-item.fab-rotate:nth-last-child(1)[tooltip]:hover:after {
            transform: rotate(-45deg);
            bottom: -60%;
            right: 60%;
        }
    </style>
    <link rel="stylesheet" href="/css/landing.css">
</head>
<body style="overflow-x: visible">
<noscript>You need to enable JavaScript to run this app.</noscript>
<div id="root">
    <div class="modal fade" id="modal__register" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true" style="max-height: 100vh">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content" id="modal-content_login" >
                <div class="modal-body px-8">
                    <form class="d-flex flex-column align-items-center justify-content-center" id="form__register">
                        <div class="row w-100">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Nama <span class="text-danger">*</span></label>
                                    <input name="nama_konseli" id="input__nama" type="text" class="form-control" />
                                    <input name="name" id="input__name" type="text" class="form-control" hidden/>
                                </div>
                                <div class="form-group">
                                    <label>No. Hp <span class="text-danger">*</span></label>
                                    <input name="no_hp_konseli" id="input__nohp" type="text" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>NIM <span class="text-danger">*</span></label>
                                    <input name="nim" id="input__nim" type="text" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>Fakultas <span class="text-danger">*</span></label>
                                    <input name="fakultas" id="input__fakultas" type="text" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>Prodi <span class="text-danger">*</span></label>
                                    <input name="progdi" id="input__prodi" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin <span class="text-danger">*</span></label>
                                    <select name="jenis_kelamin" id="select__gender" class="form-control form-control-sm" id="exampleSelects">
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Agama<span class="text-danger">*</span></label>
                                    <select name="agama" id="select__agama" class="form-control form-control-sm" id="exampleSelects">
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                        <option value="Kong Hu Cu">Kong Hu Cu</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir <span class="text-danger">*</span></label>
                                    <input name="tgl_lahir_konseli" id="input__tanggallahir" class="form-control" type="date" value="" id="example-date-input"/>
                                </div>
                                <div class="form-group">
                                    <label>Suku <span class="text-danger">*</span></label>
                                    <input name="suku" id="input__suku" type="text" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>Alamat Asal <span class="text-danger">*</span></label>
                                    <input name="alamat_konseli" id="input__alamat" type="text" class="form-control" />
                                </div>
                                <input name="email" type="email" hidden id="input__email">
                            </div>
                        </div>
                        <input class="btn btn-warning" value="Simpan" type="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal__login" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true" style="max-height: 100vh">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" id="modal-content_login" >
                <div class="modal-body">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Login Sebagai</h5>
                    <div class="role-select">
                        <div id="toggle__selected" class="toggle">konseli</div>
                        <a href="#" class="active-role" style="color: #749ecd">konseli</a>
                        <a href="#" class="role" style="color: #749ecd">konselor</a>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form class="d-flex flex-column align-items-center justify-content-center" id="form__login">
                    <div class="popup-forms">
                        <input type="text" hidden value="konseli" name="role">
                        <input name="email" placeholder="NIM">
                        <input class="my-2" name="password" placeholder="Password" type="password">
                    </div>
                    <div class="button-submit px-4 mt-2+
-"><input type="Submit" class="button undefined" value="Login" style="height: 38px; background: rgb(118, 159, 205); color: white; width: 170px;"></div>
                </form>
            </div>
        </div>
    </div>
    <div style="background-color: white;">
        <div>
            <div class="">
                <header class="header border-0"><img src="/static/media/logo_baru.e44b41bb.svg" style="cursor: pointer;">
                    <div>
                        <nav>
                            <ul class="pb-0">
                                <li><a href="#pengumuman">Pengumuman</a></li>
                                <li><a href="#layanan">Layanan</a></li>
                                <li><a href="#konselor">Konselor</a></li>
                                <li><input id="button__login" type="button" class="button undefined" value="Login"
                                           style="width: 120px; height: 32px; background: rgb(78, 115, 223); color: white;">
                                </li>
                            </ul>
                        </nav>
                    </div>
                </header>
                <div class="landing-section" id="home"><img class="people"
                                                            src="/static/media/ilustrasi_landingpage.f3d0ad17.svg">
                    <div class="hero">
                        <div><h1>UKSW Peduli.</h1>
                            <div class="hero-quote">Konseling gratis oleh Campus Ministry. <br>Apapun yang menjadi
                                masalahmu, <br>dapatkan dukungan yang kamu butuhkan. <br>Saat ini juga, di Satya Wacana
                                Counseling.
                            </div>
                            <div style="max-width: 170px; margin-left: auto; margin-right: auto;"><button type="button"
                                 class="button undefined"
                                 value=""
                                 style="width: 170px; background: rgb(78, 115, 223); color: white; height: 46px;" data-toggle="modal" data-target="#modal__login">Mulai Konseling</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="pengumuman">
                    <div class="pengunguman-flash">
                        <div class="icon-pengumuman"><img src="/static/media/landingpage_icon_pengumuman.8de94192.svg">
                        </div>
                        <div class="pengunguman-wraper"
                             style="display: flex; flex-direction: column; padding-top: 24px;">
                            <div class="pengunguman-flash-title">x</div>
                            <div class="pengunguman-flash-description">x</div>
                            <a href="/pengumuman?id=12">Lihat Selengkapnya</a></div>
                        <div style="display: flex; justify-content: flex-end; width: 100%;">
                            <div style="width: 300px;"><a href="/pengumuman" style="text-decoration: none;"><input
                                        type="button" class="button undefined" value="Lihat semua pengumuman"
                                        style="background: rgb(78, 115, 223); color: white; width: 170px; height: 46px;"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="layanan">
                    <div class="landing-section container-section">
                        <div style="display: flex; justify-content: space-around; align-items: center; width: 100%;">
                            <img src="/static/media/ilustrasi_landingpage_layanan.7d0edf05.svg" style="height: 320px;">
                            <div class="section-title" style="text-align: left; width: 600px; margin-right: 120px;">
                                <div style="font-weight: normal; margin-bottom: 8px;">Layanan</div>
                                Satya Wacana Counseling selalu siap membantumu..
                                <div style="width: 100%; display: flex; justify-content: center;">
                                    <div class="yellow-bar"></div>
                                </div>
                            </div>
                        </div>
                        <div class="services">
                            <div class="service-container">
                                <div class="service-quote"><img
                                        src="/static/media/icon_landingpage_diskusi.3fc9f1d7.svg">Mendiskusikan
                                    masalahmu
                                </div>
                                <div class="service-description">Konselor di Satya Wacana Counseling akan selalu siap
                                    mendengarkan masalahmu dan berdiskusi untuk mendapatkan solusi terbaik.
                                </div>
                            </div>
                            <div class="service-container">
                                <div class="service-quote"><img
                                        src="/static/media/icon_landingpage_versiterbaik.c4f90a41.svg">Mencapai versi
                                    terbaikmu
                                </div>
                                <div class="service-description">Satya Wacana Counseling akan selalu mendukung setiap
                                    langkahmu dalam mencapai versi terbaik dirimu.
                                </div>
                            </div>
                            <div class="service-container">
                                <div class="service-quote"><img
                                        src="/static/media/icon_landingpage_percayadiri.8c532434.svg">Menjadi pribadi
                                    yang percaya diri
                                </div>
                                <div class="service-description">Setiap orang adalah spesial. Satya Wacana Counseling
                                    akan selalu siap mengingatkanmu bahwa kamu mampu, hingga kamu tidak ada alasan untuk
                                    meragukan dirimu sendiri.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="konselor">
                    <div class="landing-section container-section" style="background-color: rgb(25, 43, 69);">
                        <div class="section-title" style="color: white;">Daftar Konselor</div>
                        <div class="yellow-bar"></div>
                        <div class="conselors-section">
                            <div class="owl-carousel owl-theme">
                                @foreach($konselors as $konselor)
                                    <div class="conselors-list-card">
                                        <div class="conselors-list-avatar"><img
                                                src={{"/avatars/".$konselor->user->avatar}}>
                                        </div>
                                        <div class="conselors-list-name">{{$konselor->nama_konselor}}
                                        </div>
                                        <div class="conselors-list-profesion">{{$konselor->profesi_konselor}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div id="quote">
                    <div></div>
                </div>
                <footer class="footer" style="height: 200px; color: white; background: rgb(25, 43, 69);">
                    <div style="display: flex; width: 100%; justify-content: space-between;">
                        <div class="footer-alamat" style="display: flex; flex-direction: column;">
                            <div
                                style="display: flex; justify-content: space-between; padding: 24px; width: 280px; align-items: center;">
                                <img src="/static/media/uksw.d5473bc6.png" style="height: 92px; margin-right: 24px;">
                                <div>Jl. Diponegoro 52-60 Salatiga-Indonesia 50711 +62 813 9178 2878</div>
                            </div>
                        </div>
                        <div style="display: flex; justify-content: space-between; width: 180px; padding: 28px;"><a
                                href="https://www.facebook.com/ukswsalatiga1956?_rdc=1&amp;_rdr" target="_blank"><img
                                    src="/static/media/icon_landingpage_facebook.d5e7c814.svg"
                                    style="height: 42px;"></a><a href="https://twitter.com/uksw_salatiga"
                                                                 target="_blank"><img
                                    src="/static/media/icon_landingpage_twitter.2d4450fb.svg" style="height: 42px;"></a><a
                                href="https://instagram.com/uksw_salatiga" target="_blank"><img
                                    src="/static/media/icon_landingpage_instagram.a12b5891.svg"
                                    style="height: 42px;"></a></div>
                    </div>
                    <div style="text-align: center;">Copyright 2019 © GMIT - UKSW</div>
                </footer>
            </div>
        </div>
    </div>
</div>

@if (config('layout.page-loader.type') != '')
    @include('layout.partials._page-loader')
@endif

{{--@include('layout.base._layout')--}}

<script>var HOST_URL = "{{ route('quick-search') }}";</script>

{{-- Global Config (global config for global JS scripts) --}}
<script>
    var KTAppSettings = {!! json_encode(config('layout.js'), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES) !!};
</script>
@foreach(config('layout.resources.js') as $script)
    <script src="{{ asset($script) }}" type="text/javascript"></script>
@endforeach
<script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
<script src="/js/owl.carousel.js" type="text/javascript"></script>
<script src="/js/src/config.js" type="text/javascript"></script>
<script src="/js/src/landing.js" type="text/javascript"></script>
<script src="{{ asset('js/pages/features/miscellaneous/toastr.js') }}" type="text/javascript"></script>
<script>
    $(function () {
        console.log("show toast")
        toastr.options = {
                "closeButton": true,
                "debug": true,
                "progressBar": true,
                "preventDuplicates": false,
                "positionClass": "toast-top",
                "showDuration": "400",
                "hideDuration": "1000",
                "timeOut": "7000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["success"]("lol");
    });
</script>

</body>
</html>
